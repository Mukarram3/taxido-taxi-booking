@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{url('driver/accept-ride-confirmed')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!--  ride details section starts-->
    <div class="location-map position-relative w-100 h-100" id="map"></div>

    <div class="ride-content-bg">
        <div class="profile-head mt-0 mb-sm-3 mb-2">
            <img class="img-fluid profile-img" src="{{ $userriderequest->user->profile ? asset('storage/'.$userriderequest->user->profile) : asset('assets/images/profile/p4.png')}}" alt="profile">
            <div class="profile-content">
                <div>
                    <div class="flex-align-center gap-1">
                        <h5>{{ $userriderequest->user->name }}</h5>
                    </div>

                    <div class="flex-align-center gap-1">
                        <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                        <h5 class="fw-normal title-color">4.8</h5>
                        <span class="content-color fw-normal">(127)</span>
                    </div>
                </div>

                <div class="flex-align-center gap-2">
                    <a href="{{url('driver/chatting')}}" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                    </a>
                    <a href="tel:+4733378901" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="call">
                    </a>
                </div>

            </div>
        </div>

        <form class="theme-form verification-part mt-0" method="post" action="{{url('driver/otp-successfully')}}">
            @csrf
            <input type="hidden" name="userriderequest_id" value="{{ $userriderequest->id }}">
            <div class="form-group mt-0">
                <label class="form-label mb-2" for="Inputotp">OTP Verification</label>
                <input type="number" class="form-control" id="Inputotp" name="otp" placeholder="Enter otp">
            </div>
            <button type="submit" class="btn theme-btn w-100 mt-3">Accept Fare on ${{ $userriderequest->fare }}</button>
        </form>
    </div>

@endsection
@section('script')

    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="{{asset('assets/js/custom-map.js')}}"></script>
@endsection
