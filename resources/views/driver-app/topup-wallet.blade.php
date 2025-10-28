@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/wallet')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Topup Wallet</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- top up section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <h4 class="fw-medium title-color">Select Method</h4>

            <ul class="payment-list">
                <li class="payment-box">
                    <div class="payment-detail">
                        <div class="form-check flex-spacing w-100 ps-0">
                            <label class="form-check-label w-100 fw-normal title-color flex-align-center gap-2"
                                for="payment1">
                                <img class="img-fluid payment-img" src="{{asset('assets/images/svg/paypal.svg')}}"
                                    alt="mastercard"> Pay Pal</label>
                            <input class="form-check-input" type="radio" id="payment1" name="flexRadioDefault">
                        </div>
                    </div>
                </li>
                <li class="payment-box">
                    <div class="payment-detail">
                        <div class="form-check flex-spacing w-100 ps-0">
                            <label class="form-check-label w-100 fw-normal title-color flex-align-center gap-2"
                                for="payment2">
                                <img class="img-fluid  payment-img" src="{{asset('assets/images/svg/apple-pay.svg')}}"
                                    alt="apple-pay"> Apple Pay</label>
                            <input class="form-check-input" type="radio" id="payment2" name="flexRadioDefault">
                        </div>
                    </div>
                </li>

                <li class="payment-box">
                    <div class="payment-detail">
                        <div class="form-check flex-spacing w-100 ps-0">
                            <label class="form-check-label w-100 fw-normal title-color flex-align-center gap-2"
                                for="payment3">
                                <img class="img-fluid payment-img" src="{{asset('assets/images/svg/google-pay.svg')}}"
                                    alt="google-pay"> Google Pay</label>
                            <input class="form-check-input" type="radio" id="payment3" name="flexRadioDefault">
                        </div>
                    </div>
                </li>
            </ul>

            <h4 class="fw-medium title-color">Add Topup Balance</h4>

            <form class="theme-form">
                <div class="form-group mt-3">
                    <label class="form-label fw-normal mb-2 title-color" for="Inputamount">Enter Amount</label>
                    <div class="position-relative">
                        <input type="number" class="form-control title-color with-icon white-background"
                            id="Inputamount" placeholder="Enter amount">
                        <i class="iconsax dollar-icon" data-icon="dollar-circle"> </i>
                    </div>
                </div>
            </form>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('driver/wallet')}}" class="btn theme-btn w-100 mt-0 auth-btn">Add Balance</a>
            </div>
        </div>
    </section>
    <!-- top up section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')


@endsection