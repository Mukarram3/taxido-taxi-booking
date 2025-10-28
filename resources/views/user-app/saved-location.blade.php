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
                <a href="{{url('user/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Saved Location</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- location section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="location-list">
                <li class="w-100 mb-3">
                    <div class="address-box">
                        <div class="location-head">
                            <div class="location-icon">
                                <i class="iconsax icon" data-icon="home-2"> </i>
                            </div>
                            <div class="location-head-content">
                                <div>
                                    <h5>Home</h5>
                                    <h6>+1-212 25632 56931</h6>
                                </div>
                                <div class="flex-align-center gap-3">
                                    <a href="#">
                                        <i class="iconsax icon" data-icon="edit-2"> </i>
                                    </a>
                                    <a href="#">
                                        <i class="iconsax icon error-icon" data-icon="trash"> </i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <ul class="pickup-location-listing">
                            <li class="location-box">
                                <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                                <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                            </li>

                            <li class="location-box">
                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                <h5 class="fw-light title-color border-0">20, Yonge St, Toronto, Canada</h5>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="w-100">
                    <div class="address-box">
                        <div class="location-head">
                            <div class="location-icon">
                                <i class="iconsax icon" data-icon="safebox-1"> </i>
                            </div>
                            <div class="location-head-content">
                                <div>
                                    <h5>Work</h5>
                                    <h6>+1-212 25632 56931</h6>
                                </div>
                                <div class="flex-align-center gap-3">
                                    <a href="#">
                                        <i class="iconsax icon" data-icon="edit-2"> </i>
                                    </a>
                                    <a href="#">
                                        <i class="iconsax icon error-icon" data-icon="trash"> </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="pickup-location-listing">
                            <li class="location-box">
                                <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                                <h5 class="fw-light title-color">35, Neilson St, Toronto, Canada</h5>
                            </li>

                            <li class="location-box">
                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                <h5 class="fw-light title-color border-0">20, Yonge St, Toronto, Canada</h5>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- location section end -->

@endsection

@section('script')


@endsection