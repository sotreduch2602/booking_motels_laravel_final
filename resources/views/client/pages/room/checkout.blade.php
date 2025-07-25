@extends('client.layouts.master')

@section('carousel')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('client_assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
@endsection

@section('booking')
    <!-- Booking Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
                <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('client_assets/img/about-1.jpg') }}" style="margin-top: 25%; visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('client_assets/img/about-2.jpg') }}" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('client_assets/img/about-3.jpg') }}" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('client_assets/img/about-4.jpg') }}" style="visibility: visible; animation-delay: 0.7s; animation-name: zoomIn;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- You can add more hidden fields if needed -->
                    <div class="card shadow p-4">
                        <h4 class="mb-4 text-primary">Checkout Receipt</h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Guest Name:</span>
                                <strong>{{ $booking['name'] }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Room:</span>
                                <strong>{{ $booking['room_type'] }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Room Number:</span>
                                <strong>{{ $booking['room_number'] }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Check-in:</span>
                                <strong>{{ $booking['check_in'] }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Check-out:</span>
                                <strong>{{ $booking['check_out'] }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Price per Night:</span>
                                <strong>${{ number_format($room->price_per_night, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Nights:</span>
                                <strong>
                                    @php
                                        $checkin = isset($booking['check_in']) ? \Carbon\Carbon::parse($booking['check_in']) : null;
                                        $checkout = isset($booking['check_out']) ? \Carbon\Carbon::parse($booking['check_out']) : null;
                                        $nights = number_format(($checkin && $checkout) ? $checkin->diffInDays($checkout) : null, 0);
                                    @endphp
                                    {{ $nights }}
                                </strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Price:</span>
                                <strong>
                                    @php
                                        $total = ($room->price_per_night) * $nights;
                                    @endphp
                                    ${{ number_format($total, 2) }}
                                </strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Payment:</span>
                                <strong>
                                    {{ $booking['payment'] }}
                                </strong>
                            </li>
                        </ul>

                        <div class="text-center">
                            <form action="{{ route('client.pages.checkout.store', ['room' => $room]) }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $booking['user_id'] }}">
                                <input type="hidden" name="room_id" value="{{ $booking['room_id'] }}">
                                <input type="hidden" name="check_in" value="{{ $booking['check_in'] }}">
                                <input type="hidden" name="check_out" value="{{ $booking['check_out'] }}">
                                <input type="hidden" name="payment" value="{{ $booking['payment'] }}">
                                <input type="hidden" name="total_price" value="{{ $total }}">
                                <button type="submit" class="btn btn-primary px-4">Confirm & Pay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->
@endsection
