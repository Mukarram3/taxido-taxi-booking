@php use App\Models\Ridesbooked;use Illuminate\Support\Carbon;use Illuminate\Support\Facades\Auth; @endphp
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
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Setting</h3>
            </div>
        </div>
    </header>
    <!-- header end -->
    @php
        $driver = \Illuminate\Support\Facades\Auth::guard('driver')->user();
    @endphp
        <!-- profile section starts -->
    <section class="setting-section">
        <div class="custom-container">
            <div class="profile-section white-background rounded-2 p-3">
                <div class="flex-align-center gap-2">
                    <div class="profile-image m-0">
                        <img class="img-fluid profile-pic"
                             src="{{ $driver->profile ? asset('storage/'.$driver->profile) : asset('assets/images/profile/p8.png') }}"
                             alt="p8">
                    </div>
                    <div class="profile-content">
                        <h3 class="profile-name">{{ $driver->name }}</h3>
                        <h6 class="fw-normal content-color mt-1">{{ $driver->email}}</h6>
                    </div>
                </div>
                <div class="wallet-part">
                    <h6>My Wallet Balance</h6>
                    <h5>${{ $driver->available_balance }} </h5>

                </div>
            </div>
        </div>

        <!-- earning section starts -->
        <section>
            <div class="custom-container">
                @php
                    $pending_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
                        ->where('status', 'active')
                        ->where('message','Accepted, waiting for support')
                        ->where('departure_date', '>=', Carbon::now())
                        ->count();
                    $active_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
                    ->where('status', 'active')
                    ->where( function ($query) {
                        $query->where('message', 'On the way to pickup')
                            ->orwhere('message', 'delivery in progress')
                            ->orwhere('message', 'package delivered');
                    })
                    ->count();
                    $completed_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
                        ->where('status', 'completed')
                        ->with('driver', 'user')
                        ->count();
                @endphp
                <ul class="total-ride-list mt-0 p-0">
                    <li>
                        <a href="{{url('driver/wallet')}}" class="ride-box">
                            <div class="flex-spacing gap-1">
                                <h4>${{ \Illuminate\Support\Facades\Auth::guard('driver')->user()->total_balance }}</h4>
                                <div class="ride-icon">
                                    <i class="iconsax icon" data-icon="wallet-open"> </i>
                                </div>
                            </div>
                            <div class="flex-spacing gap-1 mt-1">
                                <h6 class="d-flex flex-wrap">Total Earnings</h6>
                                <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('driver/my-rides')}}" class="ride-box">
                            <div class="flex-spacing gap-1">
                                <h4>{{ $completed_rides }}</h4>
                                <div class="ride-icon">
                                    <i class="iconsax icon" data-icon="smart-car"> </i>
                                </div>
                            </div>
                            <div class="flex-spacing gap-1 mt-1">
                                <h6 class="d-flex flex-wrap">My Transports Made</h6>
                                <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('driver/my-rides')}}" class="ride-box">
                            <div class="flex-spacing gap-1">
                                <h4>{{ $active_rides }}</h4>
                                <div class="ride-icon">
                                    <i class="iconsax icon" data-icon="car"> </i>
                                </div>
                            </div>
                            <div class="flex-spacing gap-1 mt-1">
                                <h6 class="d-flex flex-wrap">My Current Transports</h6>
                                <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('driver/my-rides')}}" class="ride-box">
                            <div class="flex-spacing gap-1">
                                <h4>{{ $pending_rides }}</h4>
                                <div class="ride-icon">
                                    <i class="iconsax icon" data-icon="driving"> </i>
                                </div>
                            </div>
                            <div class="flex-spacing gap-1 mt-1">
                                <h6 class="d-flex flex-wrap"> My Transport on Hold</h6>
                                <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- earning section end -->


        <div class="custom-container">
            <h4 class="fw-medium title-color text-capitalize mt-4 mb-2">General</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="{{url('driver/profile-setting')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Profile settings</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="{{url('driver/wallet')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="location"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>My wallet </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="{{url('driver/offer')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="ticket-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Offer list</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="{{url('driver/app-setting')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="password-check"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>App setting </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>

            <h4 class="fw-medium title-color text-capitalize mt-4 mb-2">Registration details</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="{{url('driver/driver-document-verify')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="document-upload"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Document registration</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="{{url('driver/vehicle-registeration')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="car"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Vehicle registration</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="{{url('driver/driver-bank-details')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="bank"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Bank details</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <a href="{{ url('user/index') }}" class="driver-banner-part">
                <div class="driver-img">
                    <img class="img-fluid driver-icon" src="{{asset('assets/images/svg/user-vector-img.svg')}}" alt="">
                </div>
                <div class="driver-content">
                    <h4 class="theme-color fw-medium">Become a user</h4>
                    <i class="iconsax icon" data-icon="chevron-right"> </i>
                </div>
            </a>

            <h4 class="fw-medium error-color text-capitalize mt-4 mb-2">Alert zone</h4>
            <div class="profile-list alert-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="#delete" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-2-remove"> </i>
                            </div>
                            <div class="setting-content">
                                <h5 class="error-color">Delete account</h5>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="#logout" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="logout-2"> </i>
                            </div>
                            <div class="setting-content">
                                <h5 class="error-color">Logout</h5>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    @include('driver-app.partials.bottom-navbar')
    <!-- bottom navbar end -->

    <!-- delete account modal starts -->
    <div class="modal delete-modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid icon" src="{{asset('assets/images/svg/alert.svg')}}" alt="alert">
                    <h4>Delete Your Account</h4>
                    <p>You will lost your data By delete your account.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{url('driver/setting')}}" class="btn gray-btn w-50 m-0" data-bs-dismiss="modal">No, Keep
                        it</a>
                    <a href="{{url('driver/login')}}" class="btn theme-btn w-50 m-0">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- delete account modal end -->

    <!-- logout modal starts -->
    <div class="modal delete-modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid icon" src="{{asset('assets/images/svg/logout.svg')}}" alt="alert">
                    <h4>Come Back Soon</h4>
                    <p>Are you sure You want to Logout?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{url('driver/setting')}}" class="btn gray-btn w-50 m-0" data-bs-dismiss="modal">Stay,
                        logged in</a>
                    <a href="{{url('driver/logout')}}" class="btn theme-btn w-50 m-0">Yes, Logout </a>
                </div>
            </div>
        </div>
    </div>
    <!-- logout modal end -->

    <!-- sidebar starts -->
    @include('driver-app.partials.sidebar')
    <!-- sidebar end -->

@endsection
@section('script')


@endsection
