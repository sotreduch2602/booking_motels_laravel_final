<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Reviews;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticController extends Controller
{
    public function analyticView()
    {
        // Lấy tất cả bookings với thông tin room và user
        $bookings = Booking::with(['room.RoomType', 'user'])->latest()->get();

        // Lấy tất cả users
        $users = User::latest()->get();

        // Lấy tất cả reviews
        $reviews = Reviews::with(['Users', 'Hotel'])->latest()->get();

        // Lấy tất cả hotels
        $hotels = Hotel::all();

        // Thống kê tổng quan
        $totalBookings = $bookings->count();
        $totalUsers = $users->count();
        $totalReviews = $reviews->count();
        $totalHotels = $hotels->count();

        // Thống kê theo trạng thái booking
        $completedBookings = $bookings->where('status', 'completed')->count();
        $pendingBookings = $bookings->where('status', 'pending')->count();
        $cancelledBookings = $bookings->where('status', 'cancelled')->count();

        // Tổng doanh thu từ bookings completed
        $totalRevenue = $bookings->where('status', 'completed')->sum('total_price');

        // Dữ liệu cho Recent Movement (Total Price theo tháng)
        $monthlyRevenue = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthName = $month->format('M');
            $monthRevenue = $bookings->where('status', 'completed')
                ->where('created_at', '>=', $month->startOfMonth())
                ->where('created_at', '<=', $month->endOfMonth())
                ->sum('total_price');
            $monthlyRevenue[$monthName] = $monthRevenue;
        }

        // Dữ liệu cho Browser Usage (Location Booking - theo thành phố)
        $locationBookings = [];
        foreach ($hotels as $hotel) {
            $bookingCount = $bookings->where('room.hotel_id', $hotel->id)->count();
            if ($bookingCount > 0) {
                $locationBookings[$hotel->city] = $bookingCount;
            }
        }

        // Sắp xếp theo số lượng booking giảm dần và lấy top 5
        arsort($locationBookings);
        $topLocations = array_slice($locationBookings, 0, 5, true);

        return view('admin.pages.admin.analytic', [
            'title' => 'analyticView',
            'totalBookings' => $totalBookings,
            'totalUsers' => $totalUsers,
            'totalReviews' => $totalReviews,
            'totalHotels' => $totalHotels,
            'completedBookings' => $completedBookings,
            'pendingBookings' => $pendingBookings,
            'cancelledBookings' => $cancelledBookings,
            'totalRevenue' => $totalRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'topLocations' => $topLocations,
            'bookings' => $bookings,
            'users' => $users,
            'reviews' => $reviews,
            'hotels' => $hotels
        ]);
    }
}
