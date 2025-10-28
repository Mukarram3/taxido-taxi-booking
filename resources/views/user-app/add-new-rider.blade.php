@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('content')

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/choose-rider')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Add New Rider</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- new rider section start -->
    <section>
        <div class="custom-container">
            <p class="fw-normal title-color">Your device's address book will not contain this contact. </p>
            <div class="rider-details-box">
                <div class="theme-form">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputfirstname">First Name</label>
                        <input type="text" class="form-control" id="Inputfirstname" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputlastname">Last Name</label>
                        <input type="text" class="form-control" id="Inputlastname" placeholder="Enter your number">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="validationDefault01">Mobile Number</label>
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle mt-0" href="#" data-bs-toggle="dropdown">
                                    +1-212
                                    <i class="iconsax dropdown-icon" data-icon="chevron-down"> </i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">+1-212</a></li>
                                    <li><a href="#" class="dropdown-item">+1-213</a></li>
                                    <li><a href="#" class="dropdown-item">+1-702</a></li>
                                    <li><a href="#" class="dropdown-item">+1-312</a></li>
                                    <li><a href="#" class="dropdown-item">+1-617</a></li>
                                </ul>
                            </div>
                            <div class="form-input w-100">
                                <input type="number" class="form-control" id="validationDefault01"
                                    placeholder="Enter your number" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('user/choose-rider')}}" class="btn theme-btn w-100">Add Rider</a>
            </div>
        </div>
    </section>
    <!-- new rider section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection

@section('script')



@endsection