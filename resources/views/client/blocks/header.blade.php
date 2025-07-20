<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{route('client.pages.home')}}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">sotreduch26022001@gmail.com</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                        <a class="" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('client.pages.home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('client.pages.room')}}" class="nav-item nav-link">Rooms</a>
                        <a href="{{route('client.pages.service')}}" class="nav-item nav-link">Services</a>
                        <a href="contact" class="nav-item nav-link">Contact</a>
                        <div class="nav-item dropdown">
                            <a href="https://demo.htmlcodex.com/pro/hotelier/booking-1.html#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu fade-down rounded-0 m-0">
                                <a href="https://demo.htmlcodex.com/pro/hotelier/service-1.html" class="dropdown-item">Service 1</a>
                                <a href="https://demo.htmlcodex.com/pro/hotelier/service-2.html" class="dropdown-item">Service 2</a>
                            </div>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        @if (Auth::user())
                            <a href="https://demo.htmlcodex.com/pro/hotelier/booking-1.html#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome, {{ Auth::user()->full_name }}</a>
                            <div class="dropdown-menu fade-down rounded-0 m-0" style="">
                                <a href="" class="dropdown-item">Dashboard</a>
                                <a href="" class="dropdown-item text-danger">Logout</a>
                            </div>
                        @else
                            <a href="/login" class="btn btn-primary rounded-0 px-md-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
                        @endif

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
