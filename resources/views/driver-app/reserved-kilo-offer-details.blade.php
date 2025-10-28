@extends('user-app.layout')


@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/my-rides')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">{{ $ride_detail->status }} Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- complete ride details section starts -->
    <section class="pt-0">
        <div class="custom-container">
            <div class="accept-ride-details-box mt-3">
                <div class="my-ride-details-page p-0 mt-0">
                    <div class="profile-head">
                        <img class="img-fluid profile-img" src="{{ $ride_detail->driver->profile ? asset('storage/'.$ride_detail->driver->profile) : asset('assets/images/profile/p5.png')}}" alt="profile">
                        <div class="profile-content">
                            <div>
                                <h5>{{ $ride_detail->driver->name }}</h5>
                                <div class="flex-align-center gap-1">
                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h5 class="fw-normal title-color">4.8</h5>
                                    <span class="content-color fw-normal">(127)</span>
                                </div>
                            </div>
                            @php
                                $color = '';
                                switch ($ride_detail->status){
                                    case 'completed':
                                    $color = 'success-color';
                                        break;
                                        case 'active':
                                    $color = 'info-color';
                                        break;
                                    case 'cancelled':
                                        $color = 'error-color';
                                        break;
                                    case 'pending':
                                    $color = 'secondary-color';
                                        break;
                                }
                            @endphp
                            <span class="status {{ $color }} fw-normal">{{ $ride_detail->status }}</span>
                        </div>
                    </div>
                    @if($ride_detail->status == 'completed')
                        <div class="rating-part">
                            <h5 class="fw-medium title-color mt-3 mb-2">Rate Us</h5>
                            <div class="rating-box mb-0">
                                <ul class="rating-list">
                                    <li>
                                        <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    </li>
                                    <li>
                                        <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    </li>
                                    <li>
                                        <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    </li>
                                    <li>
                                        <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    </li>
                                    <li>
                                        <img class="img-fluid star" src="{{asset('assets/images/svg/star-plan.svg')}}"
                                             alt="star-plan">
                                    </li>
                                </ul>
                                <h4 class="fw-medium title-color">4/5</h4>
                            </div>
                        </div>
                    @endif
                    @if($ride_detail->status == 'pending')
                        <div class="payment-method-part">
                            <div class="d-flex align-content-center justify-content-between mt-2 mt-sm-3">
                                <h6 class="title-color fw-normal">Payment method : {{ $ride_detail->payment_method }}</h6>
                                <h4 class="success-color fw-semibold">{{ $ride_detail->fare_currency}} {{ $ride_detail->fare }}</h4>
                            </div>
                            <p class="mt-1 fw-normal content-color">The total of $24 has a GST of $2 included.</p>
                        </div>
                    @endif

                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Travel Category</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->travel_category }}</h5>
                    </div>
                    @if($ride_detail->maritimes)
                        <div class="d-flex align-content-center justify-content-between mt-3">
                            <h6 class="content-color fw-normal">Maritimes</h6>
                            <h5 class="title-color fw-normal">{{ $ride_detail->maritimes }}</h5>
                        </div>
                    @endif
                    @if($ride_detail->airline)
                        <div class="d-flex align-content-center justify-content-between mt-3">
                            <h6 class="content-color fw-normal">Airline</h6>
                            <h5 class="title-color fw-normal">{{ $ride_detail->airline }}</h5>
                        </div>
                    @endif
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Distance</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->distance }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Total Fare</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->price_currency }}{{ $ride_detail->totale_fare }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Price Per Kilo</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->price_per_kilo }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Total Transport Capacity</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->total_transport_capacity }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Available Transport Capacity</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->available_transport_capacity }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Package Receiving Method</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->package_receiving_method }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Excluded Packages</h6>
                        <h5 class="title-color fw-normal">
                            @foreach($ride_detail->excluded_packages as $excluded_package)
                                {{ $excluded_package }}@if(!$loop->last),@endif
                            @endforeach
                        </h5>
                    </div>

                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Departure Date</h6>
                        <h5 class="title-color fw-normal">{{ \Carbon\Carbon::parse($ride_detail->departure_date)->format("d M’y,h:i A") }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Arrival Date</h6>
                        <h5 class="title-color fw-normal">{{ \Carbon\Carbon::parse($ride_detail->arrival_datetime)->format("d M’y,h:i A") }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">End Reservation Date</h6>
                        <h5 class="title-color fw-normal">{{ \Carbon\Carbon::parse($ride_detail->end_reservation_date)->format("d M’y,h:i A") }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">End Booking Date</h6>
                        <h5 class="title-color fw-normal">{{ \Carbon\Carbon::parse($ride_detail->endbooking_datetime)->format("d M’y,h:i A") }}</h5>
                    </div>

                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Other Excluded</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->other_excluded }}</h5>
                    </div>
                    <div class="d-flex align-content-center justify-content-between mt-3">
                        <h6 class="content-color fw-normal">Payment Method</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->payment_method }}</h5>
                    </div>
{{--                    <div class="d-flex align-content-center justify-content-between mt-2">--}}
{{--                        <h6 class="content-color fw-normal">Type of Package</h6>--}}
{{--                        <h5 class="title-color fw-normal">{{ $ride_detail->packagetype?->title }}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex align-content-center justify-content-between mt-2">--}}
{{--                        <h6 class="content-color fw-normal">Length of Package</h6>--}}
{{--                        <h5 class="title-color fw-normal">{{ $ride_detail->length_of_package }}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex align-content-center justify-content-between mt-2">--}}
{{--                        <h6 class="content-color fw-normal">Width of Package</h6>--}}
{{--                        <h5 class="title-color fw-normal">{{ $ride_detail->width_of_package }}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex align-content-center justify-content-between mt-2">--}}
{{--                        <h6 class="content-color fw-normal">Weight of Package</h6>--}}
{{--                        <h5 class="title-color fw-normal">{{ $ride_detail->weight_of_package }}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex align-content-center justify-content-between mt-2">--}}
{{--                        <h6 class="content-color fw-normal">Quantity of Package</h6>--}}
{{--                        <h5 class="title-color fw-normal">{{ $ride_detail->quantity_of_package }}</h5>--}}
{{--                    </div>--}}
                    <div class="d-flex align-content-center justify-content-between mt-2">
                        <h6 class="content-color fw-normal">Carrier Phone</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->driver->phone }}</h5>
                    </div>

                    <ul class="ride-location-listing driver-location-list position-relative mt-3 p-3">

                        <p>Collection Addresses</p>

                        @foreach($ride_detail->collection_address as $collection_address)
                            <li>
                                <div class="location-box">
                                    <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                    <h5 class="fw-light title-color border-0">{{ $collection_address }}</h5>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="d-flex align-content-center justify-content-between mt-2">
                        <h6 class="content-color fw-normal">Delivery Addresses</h6>
                        <h5 class="title-color fw-normal">{{ $ride_detail->delivery_address }}</h5>
                    </div>
                </div>
                <img class="img-fluid route-map w-100 mt-3" src="{{asset('assets/images/route-map.png')}}" alt="map">
            </div>

            <img class="img-fluid hangging-img1" src="{{asset('assets/images/svg/hangging.svg')}}" alt="hangging">
            <img class="img-fluid hangging-img2" src="{{asset('assets/images/svg/hangging.svg')}}" alt="hangging">
            <ul class="ride-location-listing driver-location-list position-relative mt-3 p-3">
                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                        <h5 class="fw-light title-color">{{ $ride_detail->pickup_location }}</h5>
                    </div>
                </li>
                @foreach($ride_detail->destination_location as $location)
                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                        <h5 class="fw-light title-color border-0">{{ $location }}</h5>
                    </div>
                </li>
                @endforeach
            </ul>

            @if($ride_detail->status == 'cancelled')
                <div class="reason-part mt-3">
                    <h4 class="fw-medium error-color">Reason :</h4>
                    <p>I apologize to inform you that there is a mechanical problem with my car, making it unsafe for me
                        to continue. I can't compromise on my issue.</p>
                </div>
            @endif

        </div>

        @if($ride_detail->status == 'completed')
            <div class="bill-details">
                <div class="custom-container">
                    <h5 class="fw-medium title-color bill-title">Bill Details</h5>
                    <div class="total-detail mt-2">
                        <div class="sub-total pb-3">
                            <h5 class="fw-normal title-color">Ride Fare</h5>
                            <h5 class="fw-normal title-color">${{ $ride_detail->fare }}</h5>
                        </div>

                        <div class="sub-total pb-3">
                            <h5 class="fw-normal title-color">Total Access Fee</h5>
                            <h5 class="fw-normal title-color">$0</h5>
                        </div>
                        <div class="sub-total pb-3">
                            <h5 class="fw-normal title-color">Coupon Savings</h5>
                            <h5 class="fw-normal error-color">-$0</h5>
                        </div>
                        <div class="grand-total">
                            <h5 class="fw-normal title-color">Total Bill</h5>
                            <h5 class="fw-normal amount success-color">${{ $ride_detail->fare }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bill-details">
                <div class="custom-container">
                    <h5 class="fw-medium title-color bill-title">Payment Method</h5>
                    <div class="total-detail mt-2">
                        <div class="sub-total pb-3">
                            <h5 class="fw-normal title-color">Payment ID</h5>
                            <h5 class="fw-normal title-color">#0111</h5>
                        </div>

                        <div class="sub-total pb-3">
                            <h5 class="fw-normal title-color">Method type</h5>
                            <h5 class="fw-normal title-color">{{ $ride_detail->payment_method }}</h5>
                        </div>
                        <div class="sub-total">
                            <h5 class="fw-normal title-color">Status</h5>
                            <h5 class="fw-normal success-color">Paid</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fixed-btn">
                <div class="custom-container">
                    <a href="#" class="btn gray-btn download-btn w-100" id="print" onclick="window.print();">
                        <i class="iconsax icon" data-icon="logout-2"> </i> Download Invoice</a>
                </div>
            </div>
        @endif
    </section>
    <!-- complete ride details section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection

@section('script')

    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>

    <!-- sticky-header js -->
    <script src="{{asset('assets/js/sticky-header.js')}}"></script>

@endsection
