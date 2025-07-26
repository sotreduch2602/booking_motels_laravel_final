<div style="font-family: Arial, sans-serif; color: #333;">
    <h2>Thông báo đặt phòng mới</h2>
    <p>Xin chào Admin,</p>
    <p>Một khách hàng vừa đặt phòng với các thông tin sau:</p>
    <ul>
        <li><strong>Họ tên khách:</strong> {{ $booking->user->full_name}}</li>
        <li><strong>Email:</strong> {{ $booking->user->email }}</li>
        <li><strong>Số điện thoại:</strong> {{ $booking->user->phone }}</li>
        <li><strong>Số phòng:</strong> {{ $booking->room->room_number }}</li>
        <li><strong>Khách sạn:</strong> {{ $booking->room->Hotel->name }}</li>
        <li><strong>Ngày nhận phòng:</strong> {{ $booking->check_in }}</li>
        <li><strong>Ngày trả phòng:</strong> {{ $booking->check_out }}</li>
        <li><strong>Tổng tiền:$</strong> {{ number_format($booking->total_price, 0, ',', '.') }}</li>
    </ul>
    <p>Vui lòng kiểm tra và xác nhận đơn đặt phòng này.</p>
    <p>Trân trọng,<br>Hệ thống Booking Motel</p>
</div>
