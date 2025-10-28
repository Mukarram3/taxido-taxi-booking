@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="flex-spacing gap-2 w-100">
                    <a href="{{url('user/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>

                    <h3 class="fw-medium title-color">Out Station</h3>
                    <a href="{{url('user/chatting')}}">
                        <i class="iconsax icon-btn" data-icon="messages-2"> </i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- note section starts -->
    <div class="notes-part">
        <i class="iconsax icon" data-icon="driving"></i>
        <h6>Fares don’t include tolls</h6>
    </div>
    <!-- note section end -->

    <!-- option section starts -->
    <section class="pt-0 section-b-space">
        <div class="rider-options pb-3">
            <div class="custom-container">
                <h3 class="fw-medium title-color">Select Option</h3>
                <ul class="nav nav-pills ride-tab outstation-ride-tab w-100" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <div class="nav-link active" id="bike" data-bs-toggle="tab" data-bs-target="#bike-pane">
                            <img class="img-fluid vehicle-img" src="{{asset('assets/images/svg/shared-img.svg')}}"
                                alt="shared">
                            <h6 class="text-center">Shared</h6>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        <div class="nav-link" id="car-tab" data-bs-toggle="tab" data-bs-target="#car-tab-pane">
                            <img class="img-fluid vehicle-img" src="{{asset('assets/images/svg/parcel-img.svg')}}"
                                alt="parcel">
                            <h6 class="text-center">Parcel</h6>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        <div class="nav-link" id="auto-tab" data-bs-toggle="tab" data-bs-target="#auto-tab-pane">
                            <img class="img-fluid vehicle-img" src="{{asset('assets/images/svg/freight-img.svg')}}"
                                alt="freight">
                            <h6 class="text-center">Freight</h6>
                        </div>
                    </li>
                </ul>

                <p class="price-content w-100">Minimum price for this fare is <span class=" fw-semibold">$80</span> per
                    ride. you can bid your price below.
                </p>
            </div>
        </div>

        <div class="custom-container">
            <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="bike-pane" role="tabpanel" aria-labelledby="bike"
                    tabindex="0">
                    <form class="theme-form mt-0">
                        <div class="form-group mt-0">
                            <label class="form-label mb-2" for="Inputdatetime">Date and time</label>
                            <input type="datetime-local" class="form-control white-background" id="Inputdatetime">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="Inputpassenger">Number of Passenger</label>
                            <input type="number" class="form-control white-background" id="Inputpassenger"
                                placeholder="Enter passengers">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="Inputofferrate">Enter your offer rate</label>
                            <input type="number" class="form-control white-background" id="Inputofferrate"
                                placeholder="Enter offer rate">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="InputComments">Comments</label>
                            <textarea class="form-control white-background" id="InputComments"
                                placeholder="Enter comments" rows="3"></textarea>
                        </div>
                        <h5 class="p-0 mt-3 mb-2 fw-medium title-color">Payment Method</h5>
                        <div class="order-type">
                            <div class="flex-spacing gap-3 w-100">
                                <div class="form-check form-check3">
                                    <input class="form-check-input" type="radio" name="RadioDefault" id="fixed45"
                                        checked />
                                    <label class="form-check-label" for="fixed45">
                                        <span class="check-box"></span>
                                        <span class="name">Cash</span>
                                    </label>
                                </div>

                                <div class="form-check form-check3">
                                    <input class="form-check-input" type="radio" name="RadioDefault" id="fixed469" />
                                    <label class="form-check-label" for="fixed469">
                                        <span class="check-box"></span>
                                        <span class="name">Online-Payment</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="{{url('user/finding-driver')}}" class="btn theme-btn w-100 mt-3 auth-btn">Book Ride</a>
                </div>
                <div class="tab-pane fade" id="car-tab-pane" role="tabpanel" aria-labelledby="car-tab" tabindex="0">
                    <form class="theme-form mt-0">
                        <div class="form-group mt-0">
                            <label class="form-label mb-2" for="Inputdatetime1">Date and time</label>
                            <input type="datetime-local" class="form-control white-background" id="Inputdatetime1">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="InputWeight">Weight</label>
                            <input type="number" class="form-control white-background" id="InputWeight"
                                placeholder="Enter weight">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="Inputofferrate1">Enter your offer rate</label>
                            <input type="number" class="form-control white-background" id="Inputofferrate1"
                                placeholder="Enter offer rate">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="InputComments1">Comments</label>
                            <textarea class="form-control white-background" id="InputComments1"
                                placeholder="Enter comments" rows="3"></textarea>
                        </div>
                        <h5 class="p-0 mt-3 mb-2 fw-medium title-color">Payment Method</h5>
                        <div class="order-type">
                            <div class="flex-spacing gap-3 w-100">
                                <div class="form-check form-check3">
                                    <input class="form-check-input" type="radio" name="RadioDefault" id="fixed951"
                                        checked />
                                    <label class="form-check-label" for="fixed951">
                                        <span class="check-box"></span>
                                        <span class="name">Cash</span>
                                    </label>
                                </div>

                                <div class="form-check form-check3">
                                    <input class="form-check-input" type="radio" name="RadioDefault" id="fixed437" />
                                    <label class="form-check-label" for="fixed437">
                                        <span class="check-box"></span>
                                        <span class="name">Online-Payment</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="finding-driver.blade.php" class="btn theme-btn w-100 mt-3 auth-btn">Book Ride</a>
                </div>
                <div class="tab-pane fade" id="auto-tab-pane" role="tabpanel" tabindex="0">
                    <form class="theme-form mt-0">
                        <div class="form-group mt-0">
                            <label class="form-label mb-2" for="Inputdatetime2">Date and time</label>
                            <input type="datetime-local" class="form-control white-background" id="Inputdatetime2">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="Inputpassenger2">Vehicle type</label>
                            <input type="text" class="form-control white-background" id="Inputpassenger2"
                                placeholder="Enter vehicle type">
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="InputDescription">Description</label>
                            <textarea class="form-control white-background" id="InputDescription"
                                placeholder="Enter description" rows="3"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2">Picture of your cargo</label>
                            <div class="upload-image">
                                <input class="form-control upload-file" type="file" id="formFileLg">
                                <i class="iconsax upload-icon" data-icon="import-2"> </i>
                                <h6 class="mb-0">Upload</h6>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="Inputofferrate23456">Enter your offer rate</label>
                            <input type="text" class="form-control white-background" id="Inputofferrate23456"
                                placeholder="Enter offer rate">
                        </div>
                        <h5 class="p-0 mt-3 mb-2 fw-medium title-color">Payment Method</h5>
                        <div class="order-type">
                            <div class="flex-spacing gap-3 w-100">
                                <div class="form-check form-check3">
                                    <input class="form-check-input" type="radio" name="RadioDefault" id="fixed4123"
                                        checked />
                                    <label class="form-check-label" for="fixed4123">
                                        <span class="check-box"></span>
                                        <span class="name">Cash</span>
                                    </label>
                                </div>

                                <div class="form-check form-check3">
                                    <input class="form-check-input" type="radio" name="RadioDefault" id="fixed469" />
                                    <label class="form-check-label" for="fixed469">
                                        <span class="check-box"></span>
                                        <span class="name">Online-Payment</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="{{url('user/finding-driver')}}" class="btn theme-btn w-100 mt-3 auth-btn">Book Ride</a>
                </div>
            </div>
        </div>
    </section>
    <!-- option section end -->

@endsection

@section('script')


@endsection
