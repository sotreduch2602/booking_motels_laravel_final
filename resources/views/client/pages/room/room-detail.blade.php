@extends('client.layouts.room')

@section('rooms')
    <div class="col-lg-8">
        <div id="room-carousel" class="carousel slide mb-5 wow fadeIn" data-bs-ride="carousel" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('client_assets/img/carousel-2.jpg') }}" alt="Image">
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('client_assets/img/carousel-3.jpg') }}" alt="Image">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#room-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#room-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="d-flex align-items-center mb-4">
            <h1 class="mb-0">{{ $room->RoomType->name }}</h1>
            <div class="ps-3">
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
            </div>
            <div class="ms-auto">
                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="room">Book Now</a>
            </div>
        </div>

        <div class="d-flex flex-wrap pb-4 m-n1">
            @php
                $amenities = Str::of($room->RoomType->amenities)->explode(', ')->all();
            @endphp
            <small class="bg-light rounded py-1 px-3 m-1">{{ $room->max_people }} People</small>
            @foreach ($amenities as $item )
                <small class="bg-light rounded py-1 px-3 m-1">{{ $item }}</small>
            @endforeach
        </div>

        <div class="tab-class wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            @php
                $Reviews = $room->Hotel->Review;
                // dd($Reviews)
            @endphp
            <ul class="nav nav-pills d-flex justify-content-between border-bottom mb-4">
                <li class="nav-item">
                    <a class="d-flex align-items-center py-3 active" data-bs-toggle="pill" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html#tab-1">
                        <i class="fa fa-eye text-primary me-2"></i>
                        <h6 class="mb-0">Overview</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center py-3" data-bs-toggle="pill" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html#tab-2">
                        <i class="fa fa-dollar text-primary me-2"></i>
                        <h6 class="mb-0">Pricing</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center py-3" data-bs-toggle="pill" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html#tab-3">
                        <i class="fa fa-map-marker-alt text-primary me-2"></i>
                        <h6 class="mb-0">Location</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center py-3" data-bs-toggle="pill" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html#tab-4">
                        <i class="fa fa-star text-primary me-2"></i>
                        <h6 class="mb-0">Reviews({{ $Reviews->count() }})</h6>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <p>
                        {{ $room->description }}
                    </p>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <span>Price Per Night:</span>
                            <hr class="flex-grow-1 my-0 mx-3">
                            <span>${{ $room->price_per_night }}</span>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4 mb-4">
                        <div class="col-md-4 d-flex align-items-center">
                            <div class="flex-shrink-0 border rounded p-1 me-3" style="width: 45px; height: 45px;">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-map-marker-alt text-primary"></i>
                                </div>
                            </div>
                            <span>123 Street, New York, USA</span>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <div class="flex-shrink-0 border rounded p-1 me-3" style="width: 45px; height: 45px;">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                            </div>
                            <span>+012 345 67890</span>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <div class="flex-shrink-0 border rounded p-1 me-3" style="width: 45px; height: 45px;">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-envelope text-primary"></i>
                                </div>
                            </div>
                            <span>info@example.com</span>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.54073840944!2d106.36555953170755!3d10.754618127805522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1752932404730!5m2!1svi!2s" width="832" height="351" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div id="tab-4" class="tab-pane fade show p-0">
                    <div class="mb-4">
                        <h4 class="mb-4">{{ $Reviews->count() }} Reviews</h4>
                        @foreach ($Reviews as $review )
                            <div class="d-flex mb-4">
                                <img src="{{ asset('client_assets/img/team-1.jpg') }}" class="img-fluid rounded" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6>{{ $review->Users->full_name }} <small class="text-body fw-normal fst-italic">{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</small></h6>
                                    <div class="mb-2">
                                        @for ($j = 1; $j <= $review->rating; $j++)
                                            <small class="fa fa-star text-primary"></small>
                                        @endfor

                                        @for ($i = 1; $i <= 5 - $review->rating; $i++ )
                                            <small class="fa fa-star text-secondary"></small>
                                        @endfor
                                    </div>
                                    <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                    {{-- <a href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html"><i class="fa fa-reply me-2"></i> Reply</a> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="bg-light p-4 p-md-5">
                        <h4 class="mb-4">Leave A Review</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 d-flex align-items-center">
                                    <h6 class="mb-0 me-2">Rate Me:</h6>
                                    <div id="halfstarsReview" class="fs-3 me-2" rating="true" style="color: rgb(254, 161, 22);"><i class="far fa-star" style="cursor: pointer;"></i><i class="far fa-star" style="cursor: pointer;"></i><i class="far fa-star" style="cursor: pointer;"></i><i class="far fa-star" style="cursor: pointer;"></i><i class="far fa-star" style="cursor: pointer;"></i></div>
                                    <input type="text" value="" readonly="" id="halfstarsInput" class="border-0 bg-transparent" style="width: 30px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('rooms-sidebar')
    <div class="col-lg-4">
        <!-- Category Start -->
        <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h4 class="mb-4">Room Types</h4>
            @foreach ($roomTypes as $types )
                <a class="d-block position-relative mb-3" href="{{ route('client.pages.room', [
                        'room_type' => $types->name
                    ]) }}">
                    <img class="img-fluid" style="height: 120px" src="{{asset('client_assets/img/'.$types->image_preview)}}" alt="{{ $types->image_preview }}">
                    <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3" style="background: rgba(0,0,0,.3);">
                        <h5 class="text-white m-0 mt-auto">{{ $types->name }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
        <!-- Category End -->

        <!-- Support Start -->
        <div class="border p-1 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="border p-4">
                <h4 class="mb-4">Help &amp; Support</h4>
                <p>We’re here to assist you with any questions or issues you may have. Our team is dedicated to providing quick and effective solutions to ensure your experience is smooth and hassle-free. Contact us anytime for support or guidance.</p>
                <div class="bg-primary text-center p-3">
                    <h4 class="text-white m-0">+012 345 67890</h4>
                </div>
            </div>
        </div>
        <!-- Support End -->
    </div>
@endsection
