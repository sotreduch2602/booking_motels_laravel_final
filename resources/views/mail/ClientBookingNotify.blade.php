<div style="font-family: Arial, sans-serif; color: #333;">
    <h2>Thông báo đặt phòng thành công!</h2>
    <p>Xin chào {{ $booking->user->full_name ?? 'Quý khách' }},</p>
    <p>
        Cảm ơn bạn đã đặt phòng tại <strong>{{ $booking->room->Hotel->name ?? 'Khách sạn của chúng tôi' }}</strong>.<br>
        Thông tin đặt phòng của bạn như sau:
    </p>
    <ul>
        <li><strong>Mã đặt phòng:</strong> {{ $booking->id }}</li>
        <li><strong>Khách sạn:</strong> {{ $booking->room->Hotel->name ?? '' }}</li>
        <li><strong>Phòng:</strong> {{ $booking->room->room_number ?? '' }}</li>
        <li><strong>Loại phòng:</strong> {{ $booking->room->roomType->name ?? '' }}</li>
        <li><strong>Ngày nhận phòng:</strong> {{ $booking->check_in }}</li>
        <li><strong>Ngày trả phòng:</strong> {{ $booking->check_out }}</li>
        <li><strong>Tổng tiền:$</strong> {{ number_format($booking->total_price, 0, ',', '.') }}</li>
    </ul>
    <p>Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại hỗ trợ.</p>
    <p>Chúc bạn có một kỳ nghỉ tuyệt vời!</p>
    <hr>
    <p style="font-size: 12px; color: #888;">Đây là email tự động, vui lòng không trả lời email này.</p>
</div>
