@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header pb-0">
        <div class="custom-container">
            <div class="header-panel pb-0">
                <a href="{{url('user/forgot-password')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- forgot password page start -->
    <div class="auth-image">
        <img class="img-fluid auth-img" src="{{asset('assets/images/otp.svg')}}" alt="otp">
    </div>
    <div class="auth-bg-image-box auth-bg-image-box-inner">
        <div class="auth-content-bg auth-content-bg-bottom mt-0">
            <div class="custom-container">
                <div class="auth-title mt-0">
                    <div class="loader-line"></div>
                    <h2>OTP Verification</h2>
                    <h6>Verify with the OTP sent to your email/phone.</h6>
                </div>

                <form class="otp-form mt-4" method="post" action="{{url('user/reset-password')}}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" name="otp" id="full_otp">
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control active" placeholder="0" id="five1"
                            onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five2"
                            onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five3"
                            onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five4"
                            onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five5"
                            onkeyup="onKeyUpEvent(5, event)" onfocus="onFocusEvent(5)">
                    </div>
                    <div class="fixed-btn">
                        <div class="custom-container">
                            <button type="submit" class="btn theme-btn w-100">Send</button>
                        </div>
                        <h6 class="title-color fw-semibold mt-3 text-center"> <span class="content-color fw-medium">Not Received
                        Yet
                        ? </span> <a href="{{url('user/verification')}}" class="title-color fw-medium">Resend it</a> </h6>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <!-- forgot password page end -->

@endsection

@section('script')

    <!-- otp js -->
    <script src="{{asset('assets/js/otp.js')}}"></script>
    <script>
        document.querySelector('.otp-form').addEventListener('submit', function(e) {
            const otp = [
                document.getElementById('five1').value,
                document.getElementById('five2').value,
                document.getElementById('five3').value,
                document.getElementById('five4').value,
                document.getElementById('five5').value
            ].join('');

            document.getElementById('full_otp').value = otp;
        });
    </script>
@endsection
