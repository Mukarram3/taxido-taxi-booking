@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Promo Code</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- coupon section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="promo-code-list">
                <li>
                    <div class="promo-code-box">
                        <img class="img-fluid coupon-bg" src="{{asset('assets/images/background/promo-bg.png')}}"
                            alt="promo-bg">
                        <div class="flex-spacing">
                            <h4>20% OFF</h4>
                            <h6 class="code">#ABH452</h6>
                        </div>
                        <p>Fare price must be more than $50</p>
                        <div class="flex-spacing mt-3">
                            <h6 class="validity">Valid till : 12/4/2025</h6>
                            <a href="#" class="use-btn">USE NOW</a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="promo-code-box">
                        <img class="img-fluid coupon-bg" src="{{asset('assets/images/background/promo-bg.png')}}"
                            alt="promo-bg">

                        <div class="flex-spacing">
                            <h4>30% OFF</h4>
                            <h6 class="code">#ABC567</h6>
                        </div>
                        <p>Fare price must be more than $50</p>
                        <div class="flex-spacing mt-3">
                            <h6 class="validity">Valid till : 19/5/2025</h6>
                            <a href="#" class="use-btn">USE NOW</a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="promo-code-box">
                        <img class="img-fluid coupon-bg" src="{{asset('assets/images/background/promo-bg.png')}}"
                            alt="promo-bg">

                        <div class="flex-spacing">
                            <h4>50% OFF</h4>
                            <h6 class="code">#BHM135</h6>
                        </div>
                        <p>Fare price must be more than $50</p>
                        <div class="flex-spacing mt-3">
                            <h6 class="validity">Valid till : 23/5/2025</h6>
                            <a href="#" class="use-btn">USE NOW</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- coupon section starts -->

@endsection

@section('script')


@endsection