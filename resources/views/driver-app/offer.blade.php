@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
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
                <a href="{{url('driver/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Offer List</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- offer section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="offer-listing">
                <li class="w-100">
                    <div class="offer-box">
                        <div class="offer-head">
                            <h4>30% OFF </h4>
                            <div class=" flex-align-center gap-2">
                                <a href="{{url('driver/edit-offer')}}">
                                    <i class="iconsax icon" data-icon="edit-2"> </i>
                                </a>
                                <a href="#">
                                    <i class="iconsax icon error-icon" data-icon="trash"> </i>
                                </a>
                            </div>
                        </div>

                        <div class="offer-content">
                            <h6 class="fw-normal title-color">Up to 10 km from Wankover city area</h6>
                            <div class="flex-spacing flex-wrap gap-2 mt-sm-3 mt-2">
                                <div class="flex-align-center">
                                    <ul class="ride-info-list">
                                        <li class="info-content">
                                            <i class="iconsax icon" data-icon="car"> </i>
                                            <span>sedan</span>
                                        </li>
                                        <li class="info-content">
                                            <i class="iconsax icon" data-icon="user-1"> </i>
                                            <span>4 person</span>
                                        </li>
                                    </ul>
                                </div>
                                <h6 class="validity"> Valid : 20/4/2025</h6>
                            </div>
                        </div>

                        <div class="active-part">
                            <h6 class="fw-normal title-color">Active Status</h6>
                            <div class="switch-btn">
                                <input type="checkbox" checked>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="w-100">
                    <div class="offer-box">
                        <div class="offer-head">
                            <h4>30% OFF </h4>
                            <div class=" flex-align-center gap-2">
                                <a href="{{url('driver/edit-offer')}}">
                                    <i class="iconsax icon" data-icon="edit-2"> </i>
                                </a>
                                <a href="#">
                                    <i class="iconsax icon error-icon" data-icon="trash"> </i>
                                </a>
                            </div>
                        </div>

                        <div class="offer-content">
                            <h6 class="fw-normal title-color">Up to 10 km from Wankover city area</h6>
                            <div class="flex-spacing flex-wrap gap-2 mt-sm-3 mt-2">
                                <div class="flex-align-center">
                                    <ul class="ride-info-list">
                                        <li class="info-content">
                                            <i class="iconsax icon" data-icon="car"> </i>
                                            <span>sedan</span>
                                        </li>
                                        <li class="info-content">
                                            <i class="iconsax icon" data-icon="user-1"> </i>
                                            <span>6 person</span>
                                        </li>
                                    </ul>
                                </div>
                                <h6 class="validity"> Valid till : 10/5/2025</h6>
                            </div>
                        </div>

                        <div class="active-part">
                            <h6 class="fw-normal title-color">Active Status</h6>
                            <div class="switch-btn">
                                <input type="checkbox" checked>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="w-100">
                    <div class="offer-box">
                        <div class="offer-head">
                            <h4>30% OFF </h4>
                            <div class=" flex-align-center gap-2">
                                <a href="{{url('driver/edit-offer')}}">
                                    <i class="iconsax icon" data-icon="edit-2"> </i>
                                </a>
                                <a href="#">
                                    <i class="iconsax icon error-icon" data-icon="trash"> </i>
                                </a>
                            </div>
                        </div>

                        <div class="offer-content">
                            <h6 class="fw-normal title-color">Up to 10 km from Wankover city area</h6>
                            <div class="flex-spacing flex-wrap gap-2 mt-sm-3 mt-2">
                                <div class="flex-align-center">
                                    <ul class="ride-info-list">
                                        <li class="info-content">
                                            <i class="iconsax icon" data-icon="car"> </i>
                                            <span>sedan</span>
                                        </li>
                                        <li class="info-content">
                                            <i class="iconsax icon" data-icon="user-1"> </i>
                                            <span>4 person</span>
                                        </li>
                                    </ul>
                                </div>
                                <h6 class="validity"> Valid till : 20/5/2025</h6>
                            </div>
                        </div>

                        <div class="active-part">
                            <h6 class="fw-normal title-color">Active Status</h6>
                            <div class="switch-btn">
                                <input type="checkbox" checked>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- offer section starts -->



@endsection
@section('script')

@endsection