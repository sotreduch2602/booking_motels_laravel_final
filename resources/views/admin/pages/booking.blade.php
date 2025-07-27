@extends('admin.layouts.master')

@section('main-content')
    {{-- Main Content --}}
    <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Booking List</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h5 class="card-title mb-0">Empty card</h5> --}}
                                @if(session('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('msg') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Room Number</th>
                                            <th>Room Type</th>
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
                                                <td>{{ $booking->room->room_number }}</td>
                                                <td>{{ $booking->room->RoomType->name ?? 'N/A' }}</td>
                                                <td>{{ $booking->check_in}}</td>
                                                <td>{{ $booking->check_out }}</td>
                                                <td>${{ $booking->total_price }}</td>
                                                <td>
                                                    @if($booking->status == 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($booking->status == 'cancelled')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @elseif($booking->status == 'completed')
                                                        <span class="badge bg-success">Completed</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$booking->payment_status}}
                                                </td>
                                                <td>
                                                    <button
                                                        class="btn btn-sm btn-primary view-receipt-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#bookingReceiptModal"
                                                        data-room-number="{{ $booking->room->room_number }}"
                                                        data-room-type="{{ $booking->room->RoomType->name ?? 'N/A' }}"
                                                        data-check-in="{{ $booking->check_in }}"
                                                        data-check-out="{{ $booking->check_out }}"
                                                        data-total-price="{{ $booking->total_price }}"
                                                        data-status="{{ ucfirst($booking->status) }}"
                                                        data-payment-status="{{ $booking->payment_status }}"
                                                        data-created-at="{{ $booking->created_at }}"
                                                        data-updated-at="{{ $booking->updated_at }}"
                                                    >
                                                        View
                                                    </button>
                                                    @if ($booking->status==="pending")
                                                        <button
                                                            class="btn btn-sm btn-danger cancel-booking-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#cancelBookingModal"
                                                            data-cancel-url="{{ route('admin.pages.booking.cancel', ['booking' => $booking]) }}">
                                                            Cancel
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>

    <!-- Booking Receipt Modal -->
    <div class="modal fade" id="bookingReceiptModal" tabindex="-1" aria-labelledby="bookingReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingReceiptModalLabel">Booking Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Room Number:</strong> <span id="modalRoomNumber"></span></p>
                <p><strong>Room Type:</strong> <span id="modalRoomType"></span></p>
                <p><strong>Check-in:</strong> <span id="modalCheckIn"></span></p>
                <p><strong>Check-out:</strong> <span id="modalCheckOut"></span></p>
                <p><strong>Total Price:</strong> $<span id="modalTotalPrice"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Payment Status:</strong> <span id="modalPaymentStatus"></span></p>
                <p><strong>Created At:</strong> <span id="modalCreatedAt"></span></p>
                <p><strong>Updated At:</strong> <span id="modalUpdatedAt"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Cancel Booking Modal -->
    <div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelBookingModalLabel">Xác nhận hủy booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn hủy booking này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <a href="#" id="confirmCancelBookingBtn" class="btn btn-danger">Xác nhận hủy</a>
                </div>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var bookingModal = document.getElementById('bookingReceiptModal');
    bookingModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        document.getElementById('modalRoomNumber').textContent = button.getAttribute('data-room-number');
        document.getElementById('modalRoomType').textContent = button.getAttribute('data-room-type');
        document.getElementById('modalCheckIn').textContent = button.getAttribute('data-check-in');
        document.getElementById('modalCheckOut').textContent = button.getAttribute('data-check-out');
        document.getElementById('modalTotalPrice').textContent = button.getAttribute('data-total-price');
        document.getElementById('modalStatus').textContent = button.getAttribute('data-status');
        document.getElementById('modalPaymentStatus').textContent = button.getAttribute('data-payment-status');
        document.getElementById('modalCreatedAt').textContent = button.getAttribute('data-created-at');
        document.getElementById('modalUpdatedAt').textContent = button.getAttribute('data-updated-at');
    });

    // Modal xác nhận hủy booking
    var cancelModal = document.getElementById('cancelBookingModal');
    var confirmBtn = document.getElementById('confirmCancelBookingBtn');
    var cancelUrl = '';
    document.querySelectorAll('.cancel-booking-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            cancelUrl = btn.getAttribute('data-cancel-url');
            confirmBtn.setAttribute('href', cancelUrl);
        });
    });
});
</script>
@endsection
