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
                <a href="{{url('user/payment-details')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">How was your ride?</h3>
                <a href="{{url('user/home')}}">
                    <span>Skip</span>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- driver review section starts -->
    <section class="auth-content-bg section-b-space profile-setting-section">
        <div class="custom-container">
            <div class="profile-section">
                <div class="profile-image">
                    <img class="img-fluid profile-pic mt-0" src="{{asset('assets/images/profile/p8.png')}}" alt="p8">
                </div>
                <h3 class="profile-name mt-0">Jonathan Higgins</h3>
                <h6 class="fw-normal content-color mt-1 text-center">jonathanhiggins001@gmail.com</h6>

                <h5 class="fw-medium title-color mt-3 mb-2">Rate Us</h5>
                <div class="rating-box">
                    <ul class="rating-list gap-3">
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
                            <img class="img-fluid star" src="{{asset('assets/images/svg/star-plan.svg')}}" alt="star-plan">
                        </li>
                    </ul>
                    <h4 class="fw-medium title-color">4/5</h4>
                </div>

                <div class="tip-part">
                    <h5 class="fw-medium title-color mt-3">Do you want to give a tip your driver?</h5>

                    <div class="tip-list">
                        <div class="tip-amount-box">
                            <input class="form-control" type="radio" id="amount1" name="amount" value="">
                            <label class="check-label" for="amount1">$5</label>
                        </div>

                        <div class="tip-amount-box">
                            <input class="form-control" type="radio" id="amount2" name="amount" value="">
                            <label class="check-label" for="amount2">$10</label>
                        </div>

                        <div class="tip-amount-box">
                            <input class="form-control" type="radio" id="amount3" name="amount" value="">
                            <label class="check-label" for="amount3">$15</label>
                        </div>

                        <div class="tip-amount-box">
                            <input class="form-control" type="radio" id="other" name="amount" value="">
                            <label class="check-label" for="other">Custom</label>
                        </div>
                    </div>
                    <input type="text" class="form-control mt-3" id="other-field" name="amount" value=""
                        placeholder="custom tip">

                    <div class="theme-form mt-3">
                        <div class="form-group mt-0">
                            <label class="form-label mb-2" for="Inputname">Add Comments</label>
                            <textarea class="form-control white-background" id="Inputname" rows="3"
                                placeholder="Enter comment"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('user/home')}}" class="btn theme-btn w-100">Submit Review</a>
            </div>
        </div>
    </section>
    <!-- driver review section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection

@section('script')

    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>

    <!-- custom tip js -->
    <script src="{{asset('assets/js/custom-tip.js')}}"></script>

@endsection