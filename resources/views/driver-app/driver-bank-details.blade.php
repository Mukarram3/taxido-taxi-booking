@php use Illuminate\Support\Facades\Auth; @endphp
@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header inner-page-header white-background pb-3">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/vehicle-registeration')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- bank details section starts -->
    <section class="auth-content-bg">
        <div class="custom-container">
            <ul class="line-design">
                <li class="active"></li>
                <li class="active"></li>
                <li class="active"></li>
            </ul>

            <div class="auth-title">
                <h2>Bank Details</h2>
                <h6>Explore your life by joining with Ride.</h6>
            </div>

            <form method="POST" class="auth-form" action="{{route('driver.driver_bank_details')}}" enctype="multipart/form-data">
                @php
                    $user_id = $user_id ?? (Auth::guard('driver')->check() ? Auth::guard('driver')->id() : null);
                @endphp

                @if($user_id)
                    @php
                    $user = Auth::guard('driver')->user();
                    @endphp
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                @else
                    <script>window.location.href = "{{ url('driver/signup') }}";</script>
                @endif
                @csrf
                <div class="form-group mt-0">
                    <label class="form-label mb-2" for="Inputname">Bank Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" name="bank_name" id="Inputname"
                            placeholder="Enter bank name" value="{{ $user->bank_name }}">
                        <i class="iconsax icon" data-icon="bank"></i>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="form-label mb-2" for="Inputholder">Holder Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" name="holder_name" id="Inputholder"
                            placeholder="Enter holder name" value="{{ $user->holder_name }}">
                        <i class="iconsax icon" data-icon="user-1"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label mb-2" for="Inputnumner">Account No.</label>
                    <div class="position-relative">
                        <input type="number" class="form-control white-background" name="account_number" id="Inputnumner"
                            placeholder="Enter your account no" value="{{ $user->account_number }}">
                        <i class="iconsax icon" data-icon="wallet-2"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputbranch">Branch Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" name="branch_name" id="Inputbranch"
                            placeholder="Enter branch name" value="{{ $user->branch_name }}">
                        <i class="iconsax icon" data-icon="building-1"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputcode">IFSC code</label>
                    <div class="position-relative">
                        <input type="email" class="form-control white-background" name="ifsc_code" id="Inputcode"
                            placeholder="Enter ifsc code" value="{{ $user->ifsc_code }}">
                        <i class="iconsax icon" data-icon="code-2"></i>
                    </div>
                </div>

            <div class="fixed-btn">
                <div class="custom-container">
                    <button type="submit" class="btn theme-btn w-100 mt-0 auth-btn">Next</button>
                </div>
            </div>
            </form>
        </div>
    </section>
    <!-- bank details section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')

@endsection
