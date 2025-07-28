<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboardView(){
        // Lấy tất cả bookings với thông tin room và user
        $bookings = Booking::with(['room.RoomType', 'user'])->latest()->get();

        // Lấy tất cả users bao gồm SoftDelete User
        $users = User::withTrashed()->latest()->get();

        // Thống kê tổng quan
        $totalBookings = $bookings->count();
        $totalUsers = User::latest()->get()->count();
        $completedBookings = $bookings->where('status', 'completed')->count();
        $pendingBookings = $bookings->where('status', 'pending')->count();
        $cancelBookings = $bookings->where('status', 'cancelled')->count();
        $paidBookings = $bookings->where('status', 'completed')->count();
        $totalRevenue = $bookings->where('status', 'completed')->sum('total_price');

        return view('admin.pages.admin.dashboard', [
            'title' => 'dashboardView',
            'bookings' => $bookings,
            'users' => $users,
            'totalBookings' => $totalBookings,
            'totalUsers' => $totalUsers,
            'completedBookings' => $completedBookings,
            'pendingBookings' => $pendingBookings,
            'cancelBookings' => $cancelBookings,
            'paidBookings' => $paidBookings,
            'totalRevenue' => $totalRevenue
        ]);
    }

    public function confirmBooking(Booking $booking)
    {
        try {
            DB::beginTransaction();

            $booking->status = 'completed';
            $booking->updated_at = now();
            $booking->save();

            DB::commit();
            return redirect()->route('admin.pages.dashboard')->with('success', 'Booking đã được xác nhận thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.pages.dashboard')->with('error', 'Có lỗi xảy ra khi xác nhận booking: ' . $e->getMessage());
        }
    }

    public function cancelBooking(Booking $booking)
    {
        try {
            DB::beginTransaction();

            $booking->status = 'cancelled';
            $booking->updated_at = now();
            $booking->save();

            // Cập nhật lại trạng thái phòng về available = 1
            $room = $booking->room;
            if ($room) {
                $room->available = 1;
                $room->updated_at = now();
                $room->save();
            }

            DB::commit();
            return redirect()->route('admin.pages.dashboard')->with('success', 'Booking đã được hủy thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.pages.dashboard')->with('error', 'Có lỗi xảy ra khi hủy booking: ' . $e->getMessage());
        }
    }

    public function changeAvailableBooking(Booking $booking)
    {
        try {
            DB::beginTransaction();

            $room = $booking->room;
            if ($room && $room->available == 0) {
                $room->available = 1;
                $room->updated_at = now();
                $room->save();
                DB::commit();
                return redirect()->route('admin.pages.dashboard')->with('success', 'Trạng thái phòng đã được chuyển sang available!');
            } else {
                DB::rollBack();
                return redirect()->route('admin.pages.dashboard')->with('error', 'Phòng không tồn tại hoặc đã ở trạng thái available!');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.pages.dashboard')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
