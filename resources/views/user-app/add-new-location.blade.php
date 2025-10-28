@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/location')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Add New Location</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- new location page starts -->
    <section>
        <div class="categories-types">
            <div class="custom-container">
                <h5 class="title-color fw-medium mb-2">Select Category</h5>
                <ul class="categories-listing flex-spacing gap-3 w-100">
                    <li class="form-check form-check3">
                        <input class="form-check-input" type="radio" name="RadioDefault" id="fixed45" checked>
                        <label class="form-check-label" for="fixed45">
                            <span class="check-box"></span>
                            <span class="name title-color">Home</span>
                        </label>
                    </li>
                    <li class="form-check form-check3">
                        <input class="form-check-input" type="radio" name="RadioDefault" id="fixed123">
                        <label class="form-check-label" for="fixed123">
                            <span class="check-box"></span>
                            <span class="name title-color">Work</span>
                        </label>
                    </li>
                    <li class="form-check form-check3">
                        <input class="form-check-input" type="radio" name="RadioDefault" id="fixed469">
                        <label class="form-check-label" for="fixed469">
                            <span class="check-box"></span>
                            <span class="name title-color">Other</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="auth-content-bg auth-content-bg-bottom auth-location-bg mt-0 pb-0">
            <div class="custom-container">
                <form class="auth-form mt-0 pb-3">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputstreet">Street</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="Inputstreet" placeholder="Enter street">
                            <i class="iconsax icon" data-icon="route-1"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputcity">City</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="Inputcity" placeholder="Enter city">
                            <i class="iconsax icon" data-icon="globe"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="InputState">State</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="InputState" placeholder="Enter state">
                            <i class="iconsax icon" data-icon="map-2"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputcountry">Country</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="Inputcountry" placeholder="Enter country">
                            <i class="iconsax icon" data-icon="location"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputid">Zip</label>
                        <div class="position-relative">
                            <input type="number" class="form-control" id="Inputid" placeholder="Enter zip">
                            <i class="iconsax icon" data-icon="gps"></i>
                        </div>
                    </div>

                    <a href="{{url('user/location')}}" class="btn theme-btn w-100 auth-btn">Add Location</a>
                </form>
            </div>
        </div>
    </section>
    <!-- new location page end -->

@endsection