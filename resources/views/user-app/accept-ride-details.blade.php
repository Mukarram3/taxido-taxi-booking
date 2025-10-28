@extends('user-app.layout')

    @section('title')
    <title>Taxido - User App </title>
    @endsection

    @section('style')
{{--        <script src="https://js.pusher.com/beams/2.1.0/push-notifications-cdn.js"></script>--}}
{{--        <script>--}}
{{--            const beamsClient = new PusherPushNotifications.Client({--}}
{{--                instanceId: '0af32e5a-264b-43c5-b0ce-826d71dd6ecb',--}}
{{--            });--}}

{{--            beamsClient.start()--}}
{{--                .then(() => beamsClient.addDeviceInterest('hello'))--}}
{{--                .then(() => console.log('Successfully registered and subscribed!'))--}}
{{--                .catch(console.error);--}}
{{--        </script>--}}
    @endsection

@section('content')

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{url('user/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!--  ride details section starts-->
    <div class="location-map position-relative w-100 h-100" id="map"></div>
    <div class="driver-info-box">
        <div>
            <h5 class="fw-medium">The driver’s on the way</h5>
            <h6 class="mt-1 fw-normal text-white text-opacity-75">Please don’t be late</h6>
        </div>
        <h3>6 min</h3>
    </div>

    <a href="#safety" data-bs-toggle="modal">
        <img class="img-fluid security-icon" src="{{asset('assets/images/svg/shield-security.svg')}}" alt="shield-security">
    </a>
    <!--  ride details section ends-->

    <div class="ride-content-bg">
        <div class="profile-head mt-0">
            <img class="img-fluid profile-img" src="{{ $ridesbooked->driver->profile ? asset('storage/'.$ridesbooked->driver->profile) : asset('assets/images/profile/p8.png')}}" alt="profile">
            <div class="profile-content">
                <div>
                    <div class="flex-align-center gap-1">
                        <a href="{{url('user/driver-details')}}" class="flex-align-center gap-2">
                            <h5>{{ $ridesbooked->driver->name }}</h5><i class="iconsax icon" data-icon="info-circle"> </i>
                        </a>
                    </div>
                    <div class="flex-align-center gap-1">
                        <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                        <h5 class="fw-normal title-color">4.8</h5>
                        <span class="content-color fw-normal">(127)</span>
                    </div>
                </div>

                <div class="flex-align-center gap-2">
                    <a href="{{ url('user/chatting') }}" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                    </a>
                    <a href="tel:+4733378901" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="car">
                    </a>
                </div>
            </div>
        </div>

        <div class="vehicle-info">
            <div>
                <div class="flex-align-center gap-1">
                    <h4 class="fw-medium title-color">{{ $ridesbooked->driver->vehicle_color }}</h4>
                    <i class="iconsax icon" data-icon="car"> </i>
                </div>
                <h5 class="fw-normal content-color mt-1">{{ $ridesbooked->driver->vehicle_type }}</h5>
            </div>
            <div>
                <ul class="pin-code">
                    <li>2</li>
                    <li>9</li>
                    <li>6</li>
                    <li>8</li>
                </ul>
                <h6 class="fw-normal title-color mt-1">Start Ride PIN</h6>
            </div>
        </div>

        <div class="location-part ">
            <div class="flex-align-center gap-2">
                <img class="img-fluid icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location-fill">
                <div>
                    <h5 class="fw-medium title-color">{{ $ridesbooked->destination_location }}</h5>
                    <div class="flex-align-center gap-3 mt-1">
                        <h6 class="content-color fw-normal">{{ $ridesbooked->departure_date }}</h6>
                        <h6 class="content-color fw-normal location">Drop off</h6>
                    </div>
                </div>
            </div>
            <a href="{{url('user/search-location')}}">
                <span class="fw-medium title-color">Changes</span>
            </a>
        </div>

        <div class="amount-part">
            <div class="total flex-spacing">
                <h4 class="fw-medium title-color">Total Fare <span class="fw-medium">${{ $ridesbooked->fare }}</span></h4>
                <a href="#share" data-bs-toggle="modal" class="flex-align-center gap-1">
                    <img class="share-icon" src="{{asset('assets/images/svg/forward.svg')}}" alt="forward">
                    <h6 class="fw-normal title-color">Share Trip</h6>
                </a>
            </div>
            <div class="location-part fare-amount">
                <div class="flex-align-center gap-2">
                    <i class="iconsax dollar-icon" data-icon="dollar-square"> </i>
                    <div>
                        <h5 class="fw-medium title-color">{{ $ridesbooked->payment_method }}</h5>
                        <h6 class="fw-normal content-color">Pay when the ride end</h6>
                    </div>
                </div>
                <a href="{{url('user/payment-method')}}">
                    <span class="fw-medium title-color">Changes</span>
                </a>
            </div>
        </div>
    </div>
    <!-- ride details section end -->

    <!-- add modal starts -->
    <div class="modal fade add-modal" id="share" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <h3>Share App</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <ul class="media-list">
                        <li>
                            <a href="#" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/whatsapp.svg')}}"
                                        alt="whatsapp">
                                </div>
                                <h5>Whatsapp</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/facebook.svg')}}"
                                        alt="facebook">
                                </div>
                                <h5>Facebook</h5>
                            </a>
                        </li>

                        <li>
                            <a href="https://slack.com/signin#/signin" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/instagram.svg')}}"
                                        alt="instagram">
                                </div>
                                <h5>Instagram</h5>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/accounts/login/" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/twitter.svg')}}" alt="twitter">
                                </div>
                                <h5>Twitter</h5>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/accounts/login/" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/gmail.svg')}}" alt="gmail">
                                </div>
                                <h5>Email</h5>
                            </a>
                        </li>
                        <li>
                            <a href="https://telegr.am/user_mgt/login" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/telegram.svg')}}"
                                        alt="telegram">
                                </div>
                                <h5>Telegram</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- add modal end -->

    <!-- reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reasons">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <ul class="reasons-list">
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed01">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-cross.svg')}}"
                                    alt="user-cross"> Driver asks for extra fare</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed01" checked>
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed02">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-speak.svg')}}"
                                    alt="user-speak"> Driver asked me to cancel</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed02">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed03">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/security-time.svg')}}"
                                    alt="security"> Driver asked to go directly</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed03">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed04">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/timer.svg')}}" alt="timer">
                                Wait time was too long</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed04">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed05">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/message-remove.svg')}}"
                                    alt="messages"> Driver doesn’t answer</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed05">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed06">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/driving-fill.svg')}}"
                                    alt="driving">Complaint about the rider</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed06">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed07">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/clock-circle.svg')}}"
                                    alt="clock">Driver getting closer</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed07">
                        </div>
                    </li>
                </ul>
                <div class="mt-5">
                    <a href="{{url('user/home')}}" class="btn theme-btn w-100 mt-0">Close</a>
                </div>
            </div>
        </div>
    </div>
    <!-- reasons offcanvas end -->

    <!-- delete account modal starts -->
    <div class="modal delete-modal fade" id="safety" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body rounded-1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    <h3 class="mt-4">Keep yourself safe</h3>
                    <ul class="safety-list">
                        <li class="safety-box">
                            <img class="img-fluid safety-icon" src="{{asset('assets/images/svg/security.svg')}}"
                                alt="security">
                            <h6>Call the police</h6>
                        </li>
                        <li class="safety-box">
                            <img class="img-fluid safety-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="call">
                            <h6>Call safety support</h6>
                        </li>
                        <li class="safety-box">
                            <img class="img-fluid safety-icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                alt="location">
                            <h6>Track your location</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- delete account modal end -->

    </div>


    @endsection

    @section('script')

        <!-- map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
        <script src="{{asset('assets/js/custom-map.js')}}"></script>

@endsection
