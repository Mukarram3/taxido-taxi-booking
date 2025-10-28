@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/rental-selact-ride')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Your Rentals Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- vehicle details section starts -->
    <section class="section-b-space">
        <div class="text-center mb-4">
            <img class="vehicle-image w-75 img-fluid" src="{{asset('assets/images/svg/shared-img.svg')}}" alt="shared">
        </div>

        <div class="vehicle-content">
            <div class="content-title">
                <h4 class="fw-medium title-color">What's incorporated</h4>
                <div class="flex-align-center gap-1">
                    <img class="img-fluid members" src="{{asset('assets/images/svg/profile-fill.svg')}}" alt="profile">
                    <h5 class="fw-medium title-color">8</h5>
                </div>
            </div>
            <ul class="details-list">
                <li>
                    <h5>9:00 am to 11:00 am</h5>
                    <h6>As soon as the driver starts the journey</h6>
                </li>
                <li>
                    <h5>2 hours included</h5>
                    <h6>$1 minute for extra time</h6>
                </li>
                <li>
                    <h5>20 km inluded</h5>
                    <h6>$10 km for extra distance</h6>
                </li>
            </ul>

        </div>
        <div class="condition-part">
            <h4 class="fw-medium title-color">Policies & fees</h4>
            <ul class="condition-list">
                <li>
                    <h5>Tolls and surcharges</h5>
                    <p>Any additional charges will be billed after your trip is completed.</p>
                </li>
                <li>
                    <h5>Non refundable fare</h5>
                    <p>You’ll be charged the full upfront amount even if your trip is shorter than booked time or
                        included mileage.</p>
                </li>
            </ul>
        </div>
    </section>
    <!-- vehicle details section end -->

@section('script')


@endsection