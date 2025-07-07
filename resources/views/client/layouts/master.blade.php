<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Royal Hotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('client_assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('client_assets/vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('client_assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('client_assets/vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('client_assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('client_assets/vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('client_assets/vendors/owl-carousel/owl.carousel.min.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('client_assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('client_assets/css/responsive.css') }}">
        <!-- Icon -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- GSAP -->
    </head>
    <body>
        <!--================Header Area =================-->
        @include('client.blocks.header')
        <!--================Header Area =================-->


        <!--================Banner Area =================-->
        @yield('banner_area');
        <!--================Banner Area =================-->

        <!--================ Accomodation Area  =================-->
        @yield('accommodation_area')
        <!--================ Accomodation Area  =================-->

        <!--================ Facilities Area  =================-->
        @yield('facilities_area')
        <!--================ Facilities Area  =================-->



        <!--================ About History Area  =================-->
        @yield('about_history_area')

        <!--================ About History Area  =================-->

        <!--================ Testimonial Area  =================-->
        @yield('testimonial_area')
        <!--================ Testimonial Area  =================-->

        <!--================ Latest Blog Area  =================-->
        @yield('latest_blog_area')
        <!--================ Recent Area  =================-->

        <!--================ start footer Area  =================-->
        @include('client.blocks.footer')
		<!--================ End footer Area  =================-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        @yield('scripts')
    </body>
</html>
