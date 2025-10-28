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
                <h3>Withdraw</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- top up section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <h4 class="fw-medium title-color mb-3">Bank Details</h4>

            <ul class="bank-details-list">
                <li class="w-100">
                    <h5 class="fw-medium title-color">Ac No.</h5>
                    <h5>1256 2635 8956</h5>
                </li>
                <li class="w-100">
                    <h5 class="fw-medium title-color">IFSC</h5>
                    <h5>DBSS0IN0000</h5>
                </li>
                <li class="w-100">
                    <h5 class="fw-medium title-color">Bank Name</h5>
                    <h5>Capital One</h5>
                </li>
                <li class="w-100">
                    <h5 class="fw-medium title-color">Name</h5>
                    <h5>Zain dorwart</h5>
                </li>
            </ul>

            <h4 class="fw-medium title-color amount-title w-100">Add Topup Balance</h4>

            <form class="theme-form">
                <div class="form-group mt-2">
                    <label class="form-label fw-normal mb-2 title-color" for="Inputamount">Enter Amount</label>
                    <div class="position-relative">
                        <input type="number" class="form-control title-color with-icon white-background"
                            id="Inputamount" placeholder="Enter amount">
                        <i class="iconsax dollar-icon" data-icon="dollar-circle"> </i>
                    </div>
                </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('driver/wallet')}}" class="btn theme-btn w-100 mt-0 auth-btn">Withdraw Amount</a>
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