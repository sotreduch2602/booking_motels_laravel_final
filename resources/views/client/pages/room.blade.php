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
                        <li class="breadcrumb-item text-white active" aria-current="page">Room</li>
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
    <!-- Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Room List Start -->
                <div class="col-lg-8">
                    <div class="row room-item m-0 mb-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="col-md-5 col-lg-12 col-xl-5 p-0" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="{{ asset('client_assets/img/room-1.jpg') }}" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12 col-xl-7 h-100 px-0">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <small class="bg-primary text-white rounded py-1 px-3">$100/Night</small>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <h5 class="mb-3">Junior Suite</h5>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top mt-auto p-4">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="room">View Detail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="room">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="row room-item m-0 mb-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="col-md-5 col-lg-12 col-xl-5 p-0" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="./Hotelier - Hotel HTML Template_files/room-2.jpg" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12 col-xl-7 h-100 px-0">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <small class="bg-primary text-white rounded py-1 px-3">$100/Night</small>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <h5 class="mb-3">Junior Suite</h5>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top mt-auto p-4">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">View Detail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="row room-item m-0 mb-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="col-md-5 col-lg-12 col-xl-5 p-0" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="./Hotelier - Hotel HTML Template_files/room-3.jpg" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12 col-xl-7 h-100 px-0">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <small class="bg-primary text-white rounded py-1 px-3">$100/Night</small>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <h5 class="mb-3">Junior Suite</h5>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top mt-auto p-4">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">View Detail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="row room-item m-0 mb-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="col-md-5 col-lg-12 col-xl-5 p-0" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="./Hotelier - Hotel HTML Template_files/room-1.jpg" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12 col-xl-7 h-100 px-0">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <small class="bg-primary text-white rounded py-1 px-3">$100/Night</small>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <h5 class="mb-3">Junior Suite</h5>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top mt-auto p-4">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">View Detail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="row room-item m-0 mb-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="col-md-5 col-lg-12 col-xl-5 p-0" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="./Hotelier - Hotel HTML Template_files/room-2.jpg" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12 col-xl-7 h-100 px-0">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <small class="bg-primary text-white rounded py-1 px-3">$100/Night</small>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <h5 class="mb-3">Junior Suite</h5>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top mt-auto p-4">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">View Detail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="row wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center m-0">
                                <li class="page-item disabled">
                                    <a class="page-link rounded-0" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html#">1</a></li>
                                <li class="page-item"><a class="page-link" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html#">2</a></li>
                                <li class="page-item"><a class="page-link" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link rounded-0" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html#" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                    </a>
                                </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Room List End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Booking Start -->
                    <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
                            <span class="align-middle fs-1 lh-sm fw-bold">Search</span>
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
                        <h4 class="mb-4">Category</h4>
                        <a class="d-block position-relative mb-3" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">
                            <img class="img-fluid" src="./Hotelier - Hotel HTML Template_files/cat-1.jpg" alt="">
                            <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3" style="background: rgba(0,0,0,.3);">
                                <h5 class="text-white m-0 mt-auto">luxury Room</h5>
                            </div>
                        </a>
                        <a class="d-block position-relative mb-3" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">
                            <img class="img-fluid" src="./Hotelier - Hotel HTML Template_files/cat-2.jpg" alt="">
                            <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3" style="background: rgba(0,0,0,.3);">
                                <h5 class="text-white m-0 mt-auto">Couple Room</h5>
                            </div>
                        </a>
                        <a class="d-block position-relative" href="https://demo.htmlcodex.com/pro/hotelier/room-list.html">
                            <img class="img-fluid" src="./Hotelier - Hotel HTML Template_files/cat-3.jpg" alt="">
                            <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3" style="background: rgba(0,0,0,.3);">
                                <h5 class="text-white m-0 mt-auto">Single Room</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Category End -->

                    <!-- Support Start -->
                    <div class="border p-1 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="border p-4">
                            <h4 class="mb-4">Help &amp; Support</h4>
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
    <!-- Room End -->
@endsection

