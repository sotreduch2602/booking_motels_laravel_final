@extends('client.layouts.room')

@section('rooms')
    <div class="col-lg-8">
        @foreach ($room as $item)
        <div class="row room-item m-0 mb-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="col-md-5 col-lg-12 col-xl-5 p-0" style="min-height: 300px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{ asset('client_assets/img/'.$item->RoomType->image_preview) }}" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-md-7 col-lg-12 col-xl-7 h-100 px-0">
                <div class="p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <small class="bg-primary text-white rounded py-1 px-3">${{ $item->price_per_night }}/Night</small>
                        <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                    </div>
                    <h5 class="mb-3">{{ $item->roomType->name }} - {{ $item->hotel ? $item->hotel->city : 'N/A' }}</h5>
                    <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>{{ $item->max_people }} Bed</small>
                        <small class="border-end me-3 pe-3"><i class="fa fa-tv text-primary me-2"></i>TV</small>
                        <small ><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                    </div>
                    <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                </div>
                <div class="d-flex justify-content-between border-top mt-auto p-4">
                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{ route('client.pages.detail', ['room'=> $item]) }}">View Detail</a>
                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('client.pages.booking', ['room'=> $item])  }}">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    {{-- <ul class="pagination justify-content-center m-0">
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
                    </ul> --}}
                    <div class="pagination justify-content-center m-0">
                        {{ $room->links('pagination::bootstrap-4') }}
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('rooms-sidebar')
    <div class="col-lg-4">
        <!-- Booking Start -->
        <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
                <span class="align-middle fs-1 lh-sm fw-bold">Filter</span>
            </div>
            <form action="{{route('client.pages.room')}}" method="get">
                <div class="row g-3 p-4 pt-2">
                    <div class="col-12">
                        <input type="range" class="form-range" id="budget" name="budget" min="0" max="1000" value="1000"
                        oninput="document.getElementById('budgetValue').textContent = '$' + this.value">
                        <label for="budget" class="form-label">
                            Budget:
                            <span id="budgetValue">$0 - $1000</span>
                        </label>
                    </div>
                    <div class="col-12">
                        <select class="form-select" name="city">
                            <option selected value="">-- Location --</option>
                            @foreach ($hotel as $h )
                                <option name='city' value="{{ $h->city }}">{{ $h->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <select class="form-select" name='room_type'>
                            <option selected value="">-- Room Types --</option>
                            @foreach ($roomTypes as $types )
                                <option value="{{ $types->name }}" {{ request('room_type') == $types->name ? 'selected' : '' }}>
                                    {{ $types->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary py-3 w-100" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Booking End -->

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
