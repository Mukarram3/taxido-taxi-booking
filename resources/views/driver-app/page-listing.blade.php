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
        <div class="flex-align-center gap-2">
          <a href="home.blade.php">
            <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
          </a>
          <h3>Page Listing</h3>
        </div>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- page listing start -->
  <section class="pt-0 section-b-space">
    <div class="custom-container">
      <div class="element-title">
        <h3>Onboarding & Authentication</h3>
      </div>

      <div class="element-menu">
        <ul class="navigation">
          <li class="pages">
            <a href="index.blade.php">Onboarding<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="login.blade.php">Login<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="otp.blade.php">OTP<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>

          <li class="pages">
            <a href="signup.blade.php">Sign Up <i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="driver-document-verify.blade.php">Document Verify<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="vehicle-registration.blade.php">Vehicle Registration<i class="iconsax"
                                                                            data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="driver-bank-details.blade.php">Bank Details Page<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
        </ul>
      </div>

      <div class="element-title">
        <h3>Main Pages</h3>
      </div>
      <div class="element-menu">
        <ul class="navigation">
          <li class="pages">
            <a href="home.blade.php">Home Page<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="accept-ride.blade.php">Accept Ride<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="accept-ride-details.blade.php">Ride Details<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="accept-ride-confirmed.blade.php">Ride Confirmed<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="active-ride.blade.php">Active Ride<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="chatting.blade.php">Chatting Page<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="notification.blade.php">Notification Page<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="otp-successfully.blade.php">OTP Verified Successfully<i class="iconsax"
                                                                             data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="ride-verification.blade.php"> Ride Verification<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="ride-on-way.blade.php"> Ride On Way<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="ride-details.blade.php"> Ride Details<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
        </ul>
      </div>

      <div class="element-title">
        <h3>My Ride Pages</h3>
      </div>

      <div class="element-menu">
        <ul class="navigation">
          <li class="pages">
            <a href="my-rides.blade.php">My Ride<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="pending-ride-details.blade.php">Pending Ride Details<i class="iconsax"
                                                                            data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="complete-ride-details.blade.php">Complete Ride Details<i class="iconsax"
                                                                              data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="cancel-ride-details.blade.php">Cancel Ride Details<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
        </ul>
      </div>

      <div class="element-title">
        <h3>Profile, Settings Pages</h3>
      </div>

      <div class="element-menu">
        <ul class="navigation">
          <li class="pages">
            <a href="setting.blade.php">Setting<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="profile-setting.blade.php">Profile Setting<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="app-setting.blade.php">App Setting<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="offer.blade.php">Offer List<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="edit-offer.blade.php">Edit Offer<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="app-setting.blade.php">App Setting<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="driver-registration-document.blade.php">Document Registration<i class="iconsax"
                                                                                     data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="driver-vehicle-details.blade.php">Vehicle Registration<i class="iconsax"
                                                                              data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="driver-bank-registration-details.blade.php">Bank Details<i class="iconsax"
                                                                                data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="topup-wallet.blade.php">Topup Wallet<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="wallet.blade.php">Wallet<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
          <li class="pages">
            <a href="withdraw.blade.php">Withdraw<i class="iconsax" data-icon="chevron-right"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- page listing start -->

@endsection
@section('script')

@endsection