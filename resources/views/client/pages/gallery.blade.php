@extends('client.layouts.master')

<?php
    use Illuminate\Support\Facades\File;
    $imagesGallery = File::files(public_path('client_assets/image/gallery'));
?>

@section('banner_area')

<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Gallery</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Gallery</li>
            </ol>
        </div>
    </div>
</section>

<section class="gallery_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Royal Hotel Gallery</h2>
            <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <div class="row imageGallery1" id="gallery">
            @foreach ($imagesGallery as $image)
                @php
                    $filename = $image->getFilename();
                    $path = 'client_assets/image/gallery/' . $filename;
                @endphp

                <div class="col-md-4 gallery_item">
                    <div class="gallery_img">
                        <img src="{{ asset($path) }}" alt="{{ $filename }}"">
                        <div class="hover">
                            <a class="light" href="{{ asset($path) }}""><i class="fa fa-expand"></i></a>
                        </div>
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
    <script src="{{ asset('client_assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('client_assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('client_assets/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('client_assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('client_assets/js/stellar.js') }}"></script>
    <script src="{{ asset('client_assets/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('client_assets/js/custom.js') }}"></script>
@endsection
