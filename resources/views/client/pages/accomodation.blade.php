@extends('client.layouts.master')

@section('banner_area')
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Accomodation</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Accomodation</li>
            </ol>
        </div>
    </div>
</section>
@endsection


<?php
    $popularRoomTypes = [
        ['image' => 'client_assets/image/room1.jpg','name' => 'Double Deluxe Room', 'price' => 250, 'description' => 'A comfortable room with modern amenities.'],
        ['image' => 'client_assets/image/room2.jpg','name' => 'Single Deluxe Room', 'price' => 200, 'description' => 'Perfect for solo travelers with all essential facilities.'],
        ['image' => 'client_assets/image/room3.jpg','name' => 'Honeymoon Suite', 'price' => 750, 'description' => 'Luxury suite designed for couples with a romantic setting.'],
        ['image' => 'client_assets/image/room4.jpg','name' => 'Economy Double', 'price' => 200, 'description' => 'Affordable double room with basic amenities.'],
    ];

    $roomTypes = [
        ['image' => 'client_assets/image/room1.jpg','name' => 'Double Deluxe Room', 'price' => 250, 'description' => 'A comfortable room with modern amenities.'],
        ['image' => 'client_assets/image/room2.jpg','name' => 'Single Deluxe Room', 'price' => 200, 'description' => 'Perfect for solo travelers with all essential facilities.'],
        ['image' => 'client_assets/image/room3.jpg','name' => 'Honeymoon Suite', 'price' => 750, 'description' => 'Luxury suite designed for couples with a romantic setting.'],
        ['image' => 'client_assets/image/room4.jpg','name' => 'Economy Double', 'price' => 200, 'description' => 'Affordable double room with basic amenities.'],
        ['image' => 'client_assets/image/room1.jpg','name' => 'Double Deluxe Room', 'price' => 250, 'description' => 'A comfortable room with modern amenities.'],
        ['image' => 'client_assets/image/room2.jpg','name' => 'Single Deluxe Room', 'price' => 200, 'description' => 'Perfect for solo travelers with all essential facilities.'],
        ['image' => 'client_assets/image/room3.jpg','name' => 'Honeymoon Suite', 'price' => 750, 'description' => 'Luxury suite designed for couples with a romantic setting.'],
        ['image' => 'client_assets/image/room4.jpg','name' => 'Economy Double', 'price' => 200, 'description' => 'Affordable double room with basic amenities.'],
    ];
?>

@section('accommodation_area')
    <section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
        <h2 class="title_color">Popular Accomodation</h2>
        <p>
            We all live in an age that belongs to the young at heart. Life that
            is becoming extremely fast,
        </p>
        </div>
        <div class="row mb_30">
            @foreach ($popularRoomTypes as $name)
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset($name['image']) }}" alt="" />
                        <a href="#" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="#"><h4 class="sec_h4">{{ $name['name'] }}</h4></a>
                    <h5>{{ $name['price'] }}<small>/night</small></h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </section>
    <section class="hotel_booking_area">
        <div class="container">
          <div class="row hotel_booking_table">
            <div class="col-md-3">
              <h2>
                Book<br />
                Your Room
              </h2>
            </div>
            <div class="col-md-9">
              <div class="boking_table">
                <div class="row">
                  <div class="col-md-4">
                    <div class="book_tabel_item">
                      <div class="form-group">
                        <div class="input-group date" id="datetimepicker11">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Arrival Date"
                          />
                          <span class="input-group-addon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group date" id="datetimepicker1">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Departure Date"
                          />
                          <span class="input-group-addon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="book_tabel_item">
                      <div class="input-group">
                        <select class="wide">
                          <option data-display="Adult">Adult</option>
                          <option value="1">Old</option>
                          <option value="2">Younger</option>
                          <option value="3">Potato</option>
                        </select>
                      </div>
                      <div class="input-group">
                        <select class="wide">
                          <option data-display="Child">Child</option>
                          <option value="1">Child</option>
                          <option value="2">Baby</option>
                          <option value="3">Child</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="book_tabel_item">
                      <div class="input-group">
                        <select class="wide">
                          <option data-display="Child">Number of Rooms</option>
                          <option value="1">Room 01</option>
                          <option value="2">Room 02</option>
                          <option value="3">Room 03</option>
                        </select>
                      </div>
                      <a class="book_now_btn button_hover" href="#">Book Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Normal Accomodation</h2>
                <p>
                    We all live in an age that belongs to the young at heart. Life that
                    is becoming extremely fast,
                </p>
            </div>
            <div class="row accomodation_two">
                @foreach ($roomTypes as $room )
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="{{ asset($room['image']) }}" alt="" />
                            <a href="#" class="btn theme_btn button_hover">Book Now</a>
                        </div>
                        <a href="#"><h4 class="sec_h4">{{ $room['name'] }}</h4></a>
                        <h5>{{ $room['price'] }}<small>/night</small></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{ asset('client_assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('client_assets/js/popper.js') }}"></script>
<script src="{{ asset('client_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client_assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client_assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('client_assets//vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('client_assets/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ asset('client_assets/js/mail-script.js') }}"></script>
<script src="{{ asset('client_assets/js/stellar.js') }}"></script>
<script src="{{ asset('client_assets/vendors/lightbox/simpleLightbox.min.js') }}"></script>
<script src="{{ asset('client_assets/js/custom.js') }}"></script>
@endsection
