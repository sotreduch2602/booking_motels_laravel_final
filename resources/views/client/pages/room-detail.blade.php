@extends('client.layouts.master')

@section('carousel')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('client_assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Room List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="https://demo.htmlcodex.com/pro/hotelier/room-list.html#">Home</a></li>
                        <li class="breadcrumb-item"><a href="https://demo.htmlcodex.com/pro/hotelier/room-list.html#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Room List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
@endsection

@section('booking')
    <!-- Booking Start -->
    <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="container">
            <div class="bg-white shadow" style="padding: 35px;">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check in" data-target="#date1" data-toggle="datetimepicker">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check out" data-target="#date2" data-toggle="datetimepicker">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected="">Adult</option>
                                    <option value="1">Adult 1</option>
                                    <option value="2">Adult 2</option>
                                    <option value="3">Adult 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected="">Child</option>
                                    <option value="1">Child 1</option>
                                    <option value="2">Child 2</option>
                                    <option value="3">Child 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->
@endsection

@section('room')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Detail Start -->
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
                    <h1 class="mb-0">Junior Suite</h1>
                    <div class="ps-3">
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                    </div>
                </div>

                <div class="d-flex flex-wrap pb-4 m-n1">
                    <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                    <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                    <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                    <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-tv text-primary me-2"></i>TV</small>
                    <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-fan text-primary me-2"></i>AC</small>
                    <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-user-cog text-primary me-2"></i>Laundry</small>
                    <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-utensils text-primary me-2"></i>Dinner</small>
                </div>

                <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                    magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                    amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                    sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                    aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                    sit stet no diam kasd vero.
                </p>
                <p class="mb-5">Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores
                    vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                    nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                    ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et,
                    clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat
                    justo dolore sit invidunt.
                </p>

                <div class="tab-class wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
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
                                <h6 class="mb-0">Reviews(3)</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                                magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                                amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                                sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                                aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                                sit stet no diam kasd vero.
                            </p>
                            <p>Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores
                                vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                                nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                                ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et,
                                clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat
                                justo dolore sit invidunt.
                            </p>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <p>Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores
                                vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                                nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                                ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et,
                                clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat
                                justo dolore sit invidunt.
                            </p>
                            <div class="row g-4">
                                <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                    <span>Nightly:</span>
                                    <hr class="flex-grow-1 my-0 mx-3">
                                    <span>$100</span>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                    <span>Weekly:</span>
                                    <hr class="flex-grow-1 my-0 mx-3">
                                    <span>$100</span>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                    <span>Monthly:</span>
                                    <hr class="flex-grow-1 my-0 mx-3">
                                    <span>$100</span>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                    <span>Weekends:</span>
                                    <hr class="flex-grow-1 my-0 mx-3">
                                    <span>$100</span>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                    <span>Additional Guest:</span>
                                    <hr class="flex-grow-1 my-0 mx-3">
                                    <span>$100</span>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                    <span>Security Deposit:</span>
                                    <hr class="flex-grow-1 my-0 mx-3">
                                    <span>$100</span>
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
                            <iframe class="position-relative rounded w-100 h-100" src="./Hotelier - Hotel HTML Template_files/embed.html" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="mb-4">
                                <h4 class="mb-4">3 Reviews</h4>
                                <div class="d-flex mb-4">
                                    <img src="./Hotelier - Hotel HTML Template_files/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                                    <div class="ps-3">
                                        <h6>John Doe <small class="text-body fw-normal fst-italic">01 Jan 2045</small></h6>
                                        <div class="mb-2">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                        <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                        <a href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html"><i class="fa fa-reply me-2"></i> Reply</a>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <img src="./Hotelier - Hotel HTML Template_files/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                                    <div class="ps-3">
                                        <h6>John Doe <small class="text-body fw-normal fst-italic">01 Jan 2045</small></h6>
                                        <div class="mb-2">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                        <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                        <a href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html"><i class="fa fa-reply me-2"></i> Reply</a>
                                    </div>
                                </div>
                                <div class="d-flex ms-5 mb-4">
                                    <img src="./Hotelier - Hotel HTML Template_files/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                                    <div class="ps-3">
                                        <h6>John Doe <small class="text-body fw-normal fst-italic">01 Jan 2045</small></h6>
                                        <div class="mb-2">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                        <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                        <a href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html"><i class="fa fa-reply me-2"></i> Reply</a>
                                    </div>
                                </div>
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
                                        <div class="col-12 col-sm-6">
                                            <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;">
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
            <!-- Detail End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Booking Start -->
                <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
                        <span class="align-top fs-4 lh-base">$</span>
                        <span class="align-middle fs-1 lh-sm fw-bold">49.00</span>
                        <span class="align-bottom fs-6 lh-lg">/ Night</span>
                    </div>
                    <div class="row g-3 p-4 pt-2">
                        <div class="col-12">
                            <div class="date" id="date3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Check in" data-target="#date3" data-toggle="datetimepicker">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="date" id="date4" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Check out" data-target="#date4" data-toggle="datetimepicker">
                            </div>
                        </div>
                        <div class="col-12">
                            <select class="form-select">
                                <option selected="">Adult</option>
                                <option value="1">Adult 1</option>
                                <option value="2">Adult 2</option>
                                <option value="3">Adult 3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="form-select">
                                <option selected="">Child</option>
                                <option value="1">Child 1</option>
                                <option value="2">Child 2</option>
                                <option value="3">Child 3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="form-select">
                                <option selected="">Night</option>
                                <option value="1">Night 1</option>
                                <option value="2">Night 2</option>
                                <option value="3">Night 3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 w-100">Book Now</button>
                        </div>
                    </div>
                </div>
                <!-- Booking End -->

                <!-- Category Start -->
                <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h4 class="section-title text-start mb-4">Category</h4>
                    <a class="d-block position-relative mb-3" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">
                        <img class="img-fluid" src="{{ asset('client_assets/img/cat-1.jpg') }}" alt="">
                        <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3" style="background: rgba(0,0,0,.3);">
                            <h5 class="text-white m-0 mt-auto">luxury Room</h5>
                        </div>
                    </a>
                    <a class="d-block position-relative mb-3" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">
                        <img class="img-fluid" src="{{ asset('client_assets/img/cat-2.jpg') }}" alt="">
                        <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3" style="background: rgba(0,0,0,.3);">
                            <h5 class="text-white m-0 mt-auto">Couple Room</h5>
                        </div>
                    </a>
                    <a class="d-block position-relative" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">
                        <img class="img-fluid" src="{{ asset('client_assets/img/cat-3.jpg') }}" alt="">
                        <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3" style="background: rgba(0,0,0,.3);">
                            <h5 class="text-white m-0 mt-auto">Single Room</h5>
                        </div>
                    </a>
                </div>
                <!-- Category End -->

                <!-- Support Start -->
                <div class="border p-1 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="border p-4">
                        <h4 class="section-title text-start mb-4">Help &amp; Support</h4>
                        <p>Lorem sed erat elitr magna magna labore duo elitr ipsum duo. Et sed duo rebum lorem sed stet sed</p>
                        <div class="bg-primary text-center p-3">
                            <h4 class="text-white m-0">+012 345 67890</h4>
                        </div>
                    </div>
                </div>
                <!-- Support End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
@endsection

@section('service')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
            <h6 class="section-title text-center text-primary text-uppercase">Related Rooms</h6>
            <h1 class="mb-5">Explore More <span class="text-primary text-uppercase">Rooms</span></h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
                <div class="room-item rounded">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('client_assets/img/room-1.jpg') }}" alt="">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$100/Night</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">Junior Suite</h5>
                            <div class="ps-2">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                            <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                        </div>
                        <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">View Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: hidden; animation-delay: 0.3s; animation-name: none;">
                <div class="room-item rounded">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('client_assets/img/room-1.jpg') }}" alt="">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$100/Night</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">Executive Suite</h5>
                            <div class="ps-2">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                            <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                        </div>
                        <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">View Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                <div class="room-item rounded">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('client_assets/img/room-1.jpg') }}" alt="">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$100/Night</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">Super Deluxe</h5>
                            <div class="ps-2">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                            <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                        </div>
                        <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">View Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.9s" style="visibility: hidden; animation-delay: 0.9s; animation-name: none;">
                <a href="https://demo.htmlcodex.com/pro/hotelier/room-detail.html" class="btn btn-primary py-3 px-5">Explore All Rooms</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('testimonial')
<div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="owl-carousel testimonial-carousel py-5">
            <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('client_assets/img/testimonial-1.jpg') }}" style="width: 45px; height: 45px;">
                    <div class="ps-3">
                        <h6 class="fw-bold mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
                <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
            </div>
            <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('client_assets/img/testimonial-2.jpg') }}" style="width: 45px; height: 45px;">
                    <div class="ps-3">
                        <h6 class="fw-bold mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
                <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
            </div>
            <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('client_assets/img/testimonial-3.jpg') }}" style="width: 45px; height: 45px;">
                    <div class="ps-3">
                        <h6 class="fw-bold mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
                <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
            </div>
        </div>
    </div>
</div>
@endsection
