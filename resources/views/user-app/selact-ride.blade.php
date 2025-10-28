@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
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
    <style>
        .form-step {
            display: none;
            transition: all 0.3s ease;
        }

        .form-step.active {
            display: block;
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
    </style>

@endsection

@section('content')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const steps = document.querySelectorAll('.form-step');
            let current = 0;

            function showStep(index) {
                steps.forEach((el, i) => {
                    el.classList.toggle('active', i === index);
                });
            }

            function setupStepLogic() {
                steps.forEach((step, i) => {
                    const input = step.querySelector('input, select, textarea');
                    if (input) {
                        input.addEventListener('change', () => {
                            if (input.value.trim() !== '' && steps[i + 1]) {
                                showStep(i + 1);
                            }
                        });
                    }
                });
            }

            showStep(0);
            setupStepLogic();
        });
    </script>

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="flex-spacing gap-2 w-100">
                    <a href="{{url('user/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>

                    <h3 class="fw-medium title-color">Fill in the information of votre</h3>
                    <a href="{{url('user/chatting')}}">
                        <i class="iconsax icon-btn" data-icon="messages-2"> </i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- option section starts -->
    <section class="pt-0 section-b-space d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 80px);">
        <div class="px-1 pt-5 w-100" style="max-width: 600px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
{{--                theme-form--}}
                <form class="mt-0" method="post" action="{{ route('user.driver_fare_request') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pickup_location" value="{{ $request->pickup_location }}">
                    <input type="hidden" name="pickup_location_latitude" id="pickup_location_latitude">
                    <input type="hidden" name="pickup_location_longitude" id="pickup_location_longitude">
                    @foreach ($request->destination_location as $location)
                        <input type="hidden" name="destination_location[]" value="{{ $location }}">
                    @endforeach
                    <input type="hidden" name="distance" value="{{ $request->distance }}">
                    <!-- Step 1 -->
{{--                    <div class="form-group mt-0 form-step">--}}
{{--                        <label for="departure_date">Date and time of Departure</label>--}}
{{--                        <input type="text" class="form-control white-background" name="departure_date" id="departure_date">--}}
{{--                    </div>--}}
{{--                    <div class="form-group form-step mt-3">--}}
{{--                        <label class="form-label mb-2" for="Inputpassenger">Distance of Route</label>--}}
{{--                        <input type="number" class="form-control white-background" id="Inputpassenger" name="distance"--}}
{{--                               placeholder="Enter Distance in Km">--}}
{{--                    </div>--}}
                    <!-- Step 2 -->
{{--                    <div class="form-group mt-0 form-step">--}}
{{--                        <label class="form-label mb-2" for="arrival_date">Date and time of Arrival</label>--}}
{{--                        <input type="text" class="form-control white-background" name="arrival_date" id="arrival_date">--}}
{{--                    </div>--}}
                    <div class="form-group mt-3 form-step">
                        <label for="transport_title">Title of Transport</label>
                        <input type="text" class="form-control white-background" id="transport_title" name="transport_title"
                               placeholder="Enter Transport Title">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label for="is_urgent">Is Urgent</label>
                        <input type="checkbox" value="is_urgent" id="is_urgent" name="is_urgent">
                        <br>
                        <label for="is_professional">Is Professional</label>
                        <input type="checkbox" class="" value="is_professional" id="is_professional" name="is_professional">
                    </div>
{{--                    <div class="form-group mt-3 form-step">--}}
{{--                        <label for="length_of_package">Parcel pick-up time</label>--}}
{{--                        <input type="text" class="form-control white-background" id="pick_up_time" name="pick_up_time"--}}
{{--                               placeholder="Enter Package Pick-Up-Time">--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-3 form-step">--}}
{{--                        <label for="length_of_package">Parcel delivery time</label>--}}
{{--                        <input type="text" class="form-control white-background" id="delivery_time" name="delivery_time"--}}
{{--                               placeholder="Enter Package Delivery-Time">--}}
{{--                    </div>--}}

                    <!-- Step 2 -->
                    <div class="form-group mt-3 form-step">
                        <label for="type_of_package">Select Type of Package</label>
                        <select class="form-control white-background" id="type_of_package" name="type_of_package">
                            <option>Please select package category</option>
                            @foreach(\App\Models\ParcelCategory::all() as $parcel_category)
                                <option value="{{ $parcel_category->id }}">{{ $parcel_category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Step 3 -->
                    <div class="form-group mt-3 form-step">
                        <label for="sub_type_of_package">Select Type of Package</label>
                        <select class="form-control white-background" id="sub_type_of_package" name="sub_type_of_package">
                            <option>Please select package sub category</option>
                        </select>
                    </div>
                    <!-- Step 4 -->
                    <div class="form-group mt-3 form-step">
                        <label for="length_of_package">Enter Length of Package</label>
                        <input type="text" class="form-control white-background" id="length_of_package" name="length_of_package"
                               placeholder="Enter Package Length">
                    </div>
                    <div class="form-group form-step mt-3">
                        <label class="form-label mb-2" for="width_of_package">Enter Width of Package</label>
                        <input type="text" class="form-control white-background" id="width_of_package" name="width_of_package"
                               placeholder="Enter Package Width">
                    </div>
{{--                    <div class="form-group form-step mt-3">--}}
{{--                        <label class="form-label mb-2" for="volume_of_package">Enter Volume of Package (Meters)</label>--}}
{{--                        <input type="number" class="form-control white-background" id="volume_of_package" name="volume_of_package"--}}
{{--                               placeholder="Enter Package Volume">--}}
{{--                    </div>--}}
                    <div class="form-group form-step mt-3">
                        <label class="form-label mb-2" for="weight_of_package">Enter Weight of Package</label>
                        <input type="text" class="form-control white-background" id="weight_of_package" name="weight_of_package"
                               placeholder="Enter Package Weight">
                    </div>
                    <div class="form-group form-step mt-3">
                        <label class="form-label mb-2" for="quantity_of_package">Enter Quantity of Package</label>
                        <input type="number" class="form-control white-background" id="quantity_of_package" name="quantity_of_package"
                               placeholder="Enter Package Quantity">
                    </div>

                    <div class="row">
                        <!-- Step 5 -->
                        <div class="form-group mt-3 form-step">
                            <label for="Inputofferrate">Enter your offer rate</label>
                            <input type="number" class="form-control white-background" id="Inputofferrate" name="fare" value=""
                                   placeholder="Estimated fare is {{ $request->distance * 2 }}, you can change it">
                        </div>
                        <!-- Step 6 -->
                        <div class="form-group mt-3 form-step">
                            <label for="currency_offerrate">Select your fare currency</label>
                            <select class="form-control white-background" id="currency_offerrate" name="fare_currency">
                                <option value="$">United State Dollar</option>
                                <option value="€" selected>Euro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-step mt-3">
                        <h5 class="fw-medium title-color mb-2">Parcel Pictures (1 * front, 1 * back, 1 * top)</h5>
                        <div id="output" class="upload-image">
                            <input id="file" class="form-control upload-file" type="file" name="parcel_pictures[]" multiple>
                            <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                            <h5>Upload</h5>
                        </div>
                    </div>

{{--                    <div class="form-group form-step mt-3">--}}
{{--                        <label class="form-label mb-2" for="travel_company">Enter Travel Company</label>--}}
{{--                        <input type="text" class="form-control white-background" id="travel_company" name="travel_company"--}}
{{--                               placeholder="Enter Travel Company">--}}
{{--                    </div>--}}
                    <div class="form-group mt-0 form-step">
                        <label class="form-label mb-2" for="deadline_date">Date and time of Deadline</label>
                        <input type="text" class="form-control white-background" name="deadline_date" id="deadline_date">
                    </div>
                    <div class="form-group form-step mt-3">
                        <label class="form-label mb-2" for="comments">Comments</label>
                        <textarea class="form-control white-background" id="comments" name="comments"
                                  placeholder="Enter comments" rows="3"></textarea>
                    </div>
                    <div class="form-group form-step mt-3">
                        <label class="form-label mb-2">Receiver Details</label>
                        <br>
                        <label class="form-label mb-2" for="receiver_name">Name</label>
                        <input type="text" class="form-control white-background" id="receiver_name" name="receiver_name"
                               placeholder="Enter Receiver Name">
                    </div>
                    <div class="form-group form-step mt-3">
                        <label class="form-label mb-2" for="receiver_email">Email</label>
                        <input type="email" class="form-control white-background" id="receiver_email" name="receiver_email"
                               placeholder="Enter Receiver Email">
                    </div>
                    <div class="form-group form-step mt-3">
                        <label class="form-label mb-2" for="receiver_phone">Phone</label>
                        <input type="number" class="form-control white-background" id="receiver_phone" name="receiver_phone"
                               placeholder="Enter Receiver Phone">
                    </div>
                    <!-- Step 7 -->
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2">Payment Method</label>
                        <div class="form-check form-check3">
                            <input class="form-check-input" type="radio" name="payment_method" checked value="online" id="fixed469" />
                            <label class="form-check-label" for="fixed469">
                                <span class="check-box"></span>
                                <span class="name">Online-Payment (After Delivery)</span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">Previous</button>
                        <button type="button" class="btn theme-btn w-100 auth-btn" id="nextBtn">Next</button>
                    </div>
                </form>
        </div>
    </section>
    <!-- option section end -->

@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        // $('#pickup_location_latitude').val('32.0740');
        // $('#pickup_location_longitude').val('72.6861');

        navigator.geolocation.watchPosition(position => {

            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            $('#pickup_location_latitude').val(lat);
            $('#pickup_location_longitude').val(lng);

        }, error => {
            console.error("Geolocation error:", error);
        },
            {
            enableHighAccuracy: true,
            maximumAge: 5000,
            timeout: 10000
        });

    </script>
    <script>
        $(document).ready(function (){
            // flatpickr("#arrival_date", {
            //     enableTime: true,
            //     dateFormat: "Y-m-d H:i",
            //     minDate: "today"  // Optional: disables past dates
            // });
            //
            // flatpickr("#departure_date", {
            //     enableTime: true,
            //     dateFormat: "Y-m-d H:i",
            //     minDate: "today"  // Optional: disables past dates
            // });

            flatpickr("#deadline_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });

            $('#type_of_package').on('change', function (){

                $.ajax({
                    url: `/user/get-package-sub_categories?category_id=` + $(this).val(),
                    method: 'GET',
                    success: function(response) {
                        console.log(response.category);

                        if (response && response.category && response.category.sub_category.length) {
                            let html = '<option value="">Please select package sub category</option>';

                            response.category.sub_category.forEach(item => {
                                html += `<option value="${item.id}">${item.title}</option>`;
                            });

                            $('#sub_type_of_package').html(html);
                        } else {
                            $('#sub_type_of_package').html('<option value="">No Sub Category available</option>');
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching sub categories:", xhr.responseText);
                    }
                });

            });
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.form-step');
            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');
            let currentStep = 0;

            function showStep(step) {
                steps.forEach((el, i) => {
                    el.style.display = i === step ? 'block' : 'none';
                });

                prevBtn.style.display = step > 0 ? 'inline-block' : 'none';
                nextBtn.textContent = step === steps.length - 1 ? 'Book Ride' : 'Next';
            }

            nextBtn.addEventListener('click', () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    // Submit the form
                    nextBtn.closest('form').submit();
                }
            });

            prevBtn.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
        });
    </script>

@endsection
