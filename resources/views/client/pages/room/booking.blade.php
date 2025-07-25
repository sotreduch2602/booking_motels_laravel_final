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
                    <div class="wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <form method="get" action="{{ route('client.pages.checkout', ['room' => $room]) }}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input disabled type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{Auth::user()->full_name}}">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email', Auth::user()->email) }}">
                                        <label for="email">Your Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input @error('check_in') is-invalid @enderror" id="check_in" name="check_in" placeholder="Check In" data-target="#date3" data-toggle="datetimepicker" value="{{ old('check_in') }}">
                                        <label for="check_in">Check In</label>
                                        @error('check_in')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date4" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input @error('check_out') is-invalid @enderror" id="check_out" name="check_out" placeholder="Check Out" data-target="#date4" data-toggle="datetimepicker" value="{{ old('check_out') }}">
                                        <label for="check_out">Check Out</label>
                                        @error('check_out')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input disabled class="form-select" id="select1" value="{{ $room->Hotel->city }}">
                                        <label for="select1">Location</label>
                                        <input type="hidden" name="city" value="{{ $room->Hotel->city }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input disabled class="form-select" id="select2" value="{{ $room->RoomType->name }}">
                                        <label for="select2">Room Types</label>
                                        <input type="hidden" name="room_type" value="{{ $room->RoomType->name }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input disabled type="text" class="form-select" id="select3" value="{{ $room->room_number }}">
                                        <label for="select3">Room Number</label>
                                        <input type="hidden" name="room_number" value="{{ $room->room_number }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select @error('payment') is-invalid @enderror" id="select4" name="payment">
                                            <option value="">Chọn phương thức thanh toán</option>
                                            <option value="COD" {{ old('payment') == 'COD' ? 'selected' : '' }}>Cash on delivery</option>
                                            <option value="VNPay" {{ old('payment') == 'VNPay' ? 'selected' : '' }}>VN Pay</option>
                                        </select>
                                        <label for="select4">Payment method</label>
                                        @error('payment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->
@endsection
