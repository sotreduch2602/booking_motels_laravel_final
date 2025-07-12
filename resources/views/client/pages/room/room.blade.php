@extends('client.layouts.room')

@section('rooms')
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
@endsection
