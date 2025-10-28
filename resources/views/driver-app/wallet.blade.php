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
                <a href="{{url('driver/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>My Wallet</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- wallet section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="balance-details">
                <div>
                    <h6>Total Balance</h6>
                    <h4 class="mt-2">$ {{ Auth::guard('driver')->user()->available_balance }}</h4>
                </div>
                <a href="{{url('driver/topup-wallet')}}" class="btn theme-btn balance-btn mt-0">Topup Wallet</a>
            </div>

            <ul class="nav nav-pills my-ride-tab w-100 border-0 mt-4" id="Tab" role="tablist">
                <li class="nav-item  w-50" role="presentation">
                    <button class="nav-link active " id="pill-trip-tab" data-bs-toggle="pill"
                        data-bs-target="#trip-tab">Trip History</button>
                </li>
                <li class="nav-item  w-50" role="presentation">
                    <button class="nav-link" id="pill-withdraw-tab" data-bs-toggle="pill"
                        data-bs-target="#withdraw-tab">Withdraw History</button>
                </li>
            </ul>

            <div class="tab-content" id="TabContent">
                <div class="tab-pane fade active show" id="trip-tab">
                    <ul class="earning-list">
                        @forelse($ridebookeds as $ridebooked)

                            <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="{{asset('assets/images/profile/p1.png')}}" alt="p1">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="{{url('driver/ride-details?ride_id='.$ridebooked->id)}}">
                                            <h6 class="title-color fw-medium">{{ $ridebooked->user->name }}</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> ${{ $ridebooked->fare }}</h5>
                                    </div>
                                    <div class="flex-spacing mt-1">
                                        <h6 class="fw-medium content-color">#{{ $ridebooked->id }}</h6>
                                        <h6 class="fw-normal content-color">{{ \Carbon\Carbon::parse($ridebooked->arrival_date)->format('d F, Y') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty

                        @endforelse
                    </ul>
                </div>

                <div class="tab-pane fade" id="withdraw-tab">
                    <ul class="earning-list">
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/mastercard.svg')}}" alt="p1">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">15 March, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $250</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/paypal.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">22 March, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $268</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/google-pay.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#WTP148830</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">3 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $155</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/apple-pay.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">8 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $130</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/mastercard.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">12 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $190</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/visa.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">16 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $225</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/google-pay.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">21 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $275</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/paypal.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">25 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $220</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/visa.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">5 May, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $120</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="{{asset('assets/images/svg/mastercard.svg')}}" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="{{url('driver/ride-details?ride_id=')}}">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">13 May, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $180</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('driver/withdraw')}}" class="btn theme-btn w-100">withdraw</a>
            </div>
        </div>
    </section>
    <!-- wallet section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')


@endsection
