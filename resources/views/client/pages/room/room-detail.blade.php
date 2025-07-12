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
@endsection
