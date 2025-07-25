@extends('admin.layouts.master')

@section('main-content')
    {{-- Main Content --}}
    <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Dashboard</h1>

                {{-- Statistics Cards --}}
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Bookings</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $totalBookings }}</h1>
                                <div class="mb-0">
                                    <span class="text-success">
                                        <i class="mdi mdi-arrow-bottom-right"></i> {{ $completedBookings }} Completed
                                    </span>
                                    <span class="text-muted"> | {{ $cancelBookings }} cancelled</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Users</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $totalUsers }}</h1>
                                <div class="mb-0">
                                    <span class="text-success">
                                        <i class="mdi mdi-arrow-bottom-right"></i> Active users
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Paid Bookings</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $paidBookings }}</h1>
                                <div class="mb-0">
                                    <span class="text-success">
                                        <i class="mdi mdi-arrow-bottom-right"></i> ${{ number_format($totalRevenue, 2) }}
                                    </span>
                                    <span class="text-muted"> total revenue</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Pending Awaiting</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $pendingBookings }}</h1>
                                <div class="mb-0">
                                    <span class="text-warning">
                                        <i class="mdi mdi-arrow-bottom-right"></i> Awaiting confirmation
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Navigation Tabs --}}
                <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="booking-tab" data-bs-toggle="tab" data-bs-target="#booking" type="button" role="tab" aria-controls="booking" aria-selected="true">
                            <i class="fas fa-calendar-check me-2"></i>Bookings ({{ $bookings->count() }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="false">
                            <i class="fas fa-users me-2"></i>Users ({{ $users->count() }})
                        </button>
                    </li>
                </ul>

                {{-- Tab Content --}}
                <div class="tab-content" id="dashboardTabsContent">
                    {{-- Booking Tab --}}
                    <div class="tab-pane fade show active" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Booking Management</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($bookings->count() > 0)
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Room Number</th>
                                                        <th>Room Type</th>
                                                        <th>Guest Name</th>
                                                        <th>Check-in</th>
                                                        <th>Check-out</th>
                                                        <th>Total Price</th>
                                                        <th>Status</th>
                                                        <th>Payment Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bookings as $booking)
                                                        <tr>
                                                            <td>{{ $booking->id }}</td>
                                                            <td>{{ $booking->room->room_number ?? 'N/A' }}</td>
                                                            <td>{{ $booking->room->RoomType->name ?? 'N/A' }}</td>
                                                            <td>{{ $booking->user->full_name ?? 'N/A' }}</td>
                                                            <td>{{ $booking->check_in ? date('Y-m-d', strtotime($booking->check_in)) : 'N/A' }}</td>
                                                            <td>{{ $booking->check_out ? date('Y-m-d', strtotime($booking->check_out)) : 'N/A' }}</td>
                                                            <td>${{ number_format($booking->total_price, 2) }}</td>
                                                            <td>
                                                                @if($booking->status == 'completed')
                                                                    <span class="badge bg-success">Completed</span>
                                                                @elseif($booking->status == 'pending')
                                                                    <span class="badge bg-warning">Pending</span>
                                                                @elseif($booking->status == 'cancelled')
                                                                    <span class="badge bg-danger">Cancelled</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-secondary">{{ ucfirst($booking->payment_status ?? 'N/A') }}</span>
                                                            </td>
                                                            <td>
                                                                <button
                                                                    class="btn btn-sm btn-primary view-receipt-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#bookingDetailModal"
                                                                >
                                                                    View
                                                                </button>
                                                                @if ($booking->status == 'pending')
                                                                    <button class="btn btn-sm btn-success">Confirm</button>
                                                                    <button class="btn btn-sm btn-danger">Cancel</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="text-center py-4">
                                                <p class="text-muted">No bookings found.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Users Tab --}}
                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">User Management</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($users->count() > 0)
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Created Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->full_name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>
                                                                @if($user->role == 1)
                                                                    <span class="badge bg-primary">Admin</span>
                                                                @else
                                                                    <span class="badge bg-secondary">User</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($user->email_verified_at)
                                                                    <span class="badge bg-success">Active</span>
                                                                @else
                                                                    <span class="badge bg-warning">Pending</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-info">Edit</button>
                                                                @if($user->email_verified_at)
                                                                    <button class="btn btn-sm btn-warning">Suspend</button>
                                                                @else
                                                                    <button class="btn btn-sm btn-success">Activate</button>
                                                                @endif
                                                                <button class="btn btn-sm btn-danger">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="text-center py-4">
                                                <p class="text-muted">No users found.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <div class="modal fade" id="bookingDetailModal" tabindex="-1" aria-labelledby="bookingDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingReceiptModalLabel">Booking Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Room Number:</strong>{{ $booking->room->room_number}}</p>
                <p><strong>Room Type:</strong>{{ $booking->room->RoomType->name ?? 'N/A' }} </p>
                <p><strong>Check-in:</strong> {{ $booking->check_in }}</p>
                <p><strong>Check-out:</strong>{{ $booking->check_out }}</p>
                <p><strong>Total Price:</strong>{{ $booking->total_price }}</p>
                <p><strong>Status:</strong>{{ ucfirst($booking->status) }}</p>
                <p><strong>Payment Status:</strong>{{ $booking->payment_status }}</p>
                <p><strong>Created At:</strong> {{ $booking->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $booking->updated_at }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endsection
