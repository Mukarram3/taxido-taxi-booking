@php use Illuminate\Support\Facades\Auth; @endphp
@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar{
            top: 220.667px !important;
            left: 0px !important;
            right: 0px !important;
        }
    </style>
@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header inner-page-header white-background pb-3">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/driver-document-verify')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- header starts -->
    <form method="POST" class="auth-form" action="{{route('driver.vehicle-registration')}}" enctype="multipart/form-data">

        @php
            $user_id = $user_id ?? (Auth::guard('driver')->check() ? Auth::guard('driver')->id() : null);
        @endphp

        @if($user_id)
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @php
                $user = Auth::guard('driver')->user();
                 $selectedMeans = $user->means_of_transport;
                 // Decode if it's a string
                if (is_string($selectedMeans)) {
                    $selectedMeans = json_decode($selectedMeans, true);
                }
                // Ensure it's an array
                $selectedMeans = is_array($selectedMeans) ? $selectedMeans : [];
                $registerDate = \Carbon\Carbon::parse($user->registeration_date)->format('Y-m-d');
                $selectedRules = json_decode($user->rules ?? '[]', true);
                $rules = [
                'Max, 2 in the back',
                'Food is not allowed to be eaten in cars.',
                'I apologize, but this is not a pet',
                'Please, no smoking in the car',
                'No alcohol closed/open'
            ];
            @endphp
        @else
            <script>window.location.href = "{{ url('driver/signup') }}";</script>
        @endif
    <section class="auth-content-bg">
        <div class="custom-container">
            <ul class="line-design">
                <li class="active"></li>
                <li class="active"></li>
                <li></li>
            </ul>

{{--            <div class="auth-title">--}}
{{--                <h2>Vehicle Registration</h2>--}}
{{--                <h6>Explore your life by joining with Ride.</h6>--}}
{{--            </div>--}}

{{--            <ul class="vehicle-types-list">--}}
{{--                <li>--}}
{{--                    <input type="radio" class="btn-check" name="options" id="btn-check-1">--}}
{{--                    <label class="btn vehicle-type-button" for="btn-check-1"> <img class="img-fluid vehicle-img"--}}
{{--                            src="{{asset('assets/images/svg/bike-img2.svg')}}" alt="bike">--}}
{{--                        Bike--}}
{{--                    </label>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <input type="radio" class="btn-check" name="options" id="btn-check-2">--}}
{{--                    <label class="btn vehicle-type-button" for="btn-check-2"> <img class="img-fluid vehicle-img"--}}
{{--                            src="{{asset('assets/images/svg/car-img2.svg')}}" alt="car">--}}
{{--                        Car--}}
{{--                    </label>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <input type="radio" class="btn-check" name="options" id="btn-check-3">--}}
{{--                    <label class="btn vehicle-type-button" for="btn-check-3"> <img class="img-fluid vehicle-img"--}}
{{--                            src="{{asset('assets/images/svg/van-img2.svg')}}" alt="van">--}}
{{--                        Van--}}
{{--                    </label>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <input type="radio" class="btn-check" name="options" id="btn-check-4">--}}
{{--                    <label class="btn vehicle-type-button" for="btn-check-4"> <img class="img-fluid vehicle-img"--}}
{{--                            src="{{asset('assets/images/svg/bus-img2.svg')}}" alt="bus">--}}
{{--                        Bus--}}
{{--                    </label>--}}
{{--                </li>--}}
{{--            </ul>--}}

            <div class="form-group mt-0">
                <label class="form-label mb-2" for="means_of_transport">Means of Transport</label>
                <div class="position-relative">
                    <select class="form-control white-background" multiple="multiple" name="means_of_transport[]" id="means_of_transport">
                        <option>Select Means of Transport</option>
                        @foreach(\App\Models\Mean_of_transport::where('status','1')->get() as $mean_of_transport)
                        <option value="{{ $mean_of_transport->id }}" {{ in_array((string) $mean_of_transport->id, $selectedMeans) ? 'selected' : '' }}>{{ $mean_of_transport->name }}</option>
                        @endforeach
                    </select>
{{--                    <i class="iconsax icon" data-icon="car"></i>--}}
                </div>
            </div>

                @csrf
                <div class="form-group mt-0">
                    <label class="form-label mb-2" for="Inputname">Vehicle Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" name="vehicle_name" id="Inputname"
                            placeholder="Enter vehicle name" value="{{ $user->vehicle_name }}">
                        <i class="iconsax icon" data-icon="car"></i>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="form-label mb-2" for="Inputdate">Registration Date</label>
                    <div class="position-relative">
                        <input type="date" class="form-control white-background" value="{{ $registerDate }}" name="registeration_date" id="registeration_date">
                        <i class="iconsax icon" data-icon="calendar-1"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="InputVehicle">Select Vehicle Type</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" value="{{ $user->vehicle_type }}" name="vehicle_type" id="InputVehicle"
                            placeholder="Enter vehicle type">
                        <i class="iconsax icon" data-icon="car"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="InputColor">Vehicle Color</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" value="{{ $user->vehicle_color }}" name="vehicle_color" id="InputColor"
                            placeholder="Enter vehicle color">
                        <i class="iconsax icon" data-icon="color-filter"></i>
                    </div>
                </div>

            <div class="form-group form-step mt-3">
                <h5 class="fw-medium title-color mb-2">Vehicle Pictures</h5>
                <div id="output" class="upload-image">
                    <input id="file" class="form-control upload-file" type="file" name="vehicle_pictures[]" multiple>
                    <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                    <h5>Upload</h5>
                </div>
            </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputseats">Maximum Seats</label>
                    <div class="position-relative">
                        <input type="number" class="form-control white-background" value="{{ $user->max_seats }}" name="max_seats" id="Inputseats"
                            placeholder="Enter maximum seats">
                        <i class="iconsax icon" data-icon="users"></i>
                    </div>
                </div>
        </div>
    </section>

    <section class="rules-section pt-0 section-b-space">
        <div class="custom-container">
            <h3 class="fw-semibold title-color mb-3">Select Your Rule</h3>
            @foreach ($rules as $i => $rule)
                <div class="form-check mb-2">
                    <label class="form-check-label" for="check{{ $i + 1 }}">
                        {{ $rule }}
                    </label>
                    <input class="form-check-input"
                           type="checkbox"
                           name="rule[]"
                           id="check{{ $i + 1 }}"
                           value="{{ $rule }}"
                           @if(in_array($rule, $selectedRules)) checked @endif>
                </div>
            @endforeach
        </div>
    </section>
    <div class="fixed-btn">
        <div class="custom-container">
            <button type="submit" class="btn theme-btn w-100 mt-0 auth-btn">Next</button>
        </div>
    </div>
    </form>
    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {

            $('#means_of_transport').select2({
            });

            flatpickr("#registeration_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                maxDate: "today"  // Optional: disables past dates
            });

        });
    </script>

@endsection
