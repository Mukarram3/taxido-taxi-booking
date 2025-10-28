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
                <a href="#" onclick="history.back()">
                    <i class="iconsax icon-btn" data-icon="chevron-left"></i>
                </a>

                <h3 class="fw-medium  title-color">Payment Method</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- payment method section starts -->
    <section class="section-b-space">
        <div class="auth-content-bg mt-0">
            <div class="custom-container">
                <ul class="payment-method-list pt-0">
                    <li class="w-100">
                        <div class="payment-list-box">
                            <label class="form-check-label" for="flexRadioDefault"> <img class="img-fluid img"
                                    src="{{asset('assets/images/svg/mastercard.svg')}}" alt="mastercard"> Mastercard</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault">
                        </div>
                    </li>
                    <li class="w-100">
                        <div class="payment-list-box">
                            <label class="form-check-label" for="flexRadioDefault1"> <img class="img-fluid img"
                                    src="{{asset('assets/images/svg/visa.svg')}}" alt="visa"> Visa</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        </div>
                    </li>
                    <li class="w-100">
                        <div class="payment-list-box">
                            <label class="form-check-label" for="flexRadioDefault2"> <img class="img-fluid img"
                                    src="{{asset('assets/images/svg/paypal.svg')}}" alt="paypal"> Paypal</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                        </div>
                    </li>

                    <li class="w-100">
                        <div class="payment-list-box">
                            <label class="form-check-label" for="flexRadioDefault3"> <img class="img-fluid img"
                                    src="{{asset('assets/images/svg/google-pay.svg')}}" alt="google-pay"> Google Pay</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                                checked>
                        </div>
                    </li>

                    <li class="w-100">
                        <div class="payment-list-box">
                            <label class="form-check-label" for="flexRadioDefault4"> <img class="img-fluid img"
                                    src="{{asset('assets/images/svg/apple-pay.svg')}}" alt="apple-pay"> Apple Pay</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                        </div>
                    </li>
                    <li class="w-100">
                        <div class="payment-list-box">
                            <label class="form-check-label" for="flexRadioDefault5"> <img class="img-fluid img"
                                    src="{{asset('assets/images/svg/cash.svg')}}" alt="cash"> Cash</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('user/payment-details')}}" class="btn theme-btn w-100 mt-0 auth-btn">Select Payment</a>
            </div>
        </div>
    </section>

    <!-- payment method section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @section('script')

    @endsection