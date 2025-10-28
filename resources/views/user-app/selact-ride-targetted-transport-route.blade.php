@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')
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
                    <a href="{{url('user/search-location')}}">
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
    <section class="pt-0 section-b-space">
        <div class="px-1 pt-5">
            <div id="error-messages"></div>

{{--                theme-form--}}
            <form id="fareForm" class="mt-0" method="post" action="{{ route('user.targetted_driver_fare_request') }}" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" value="1" name="is_targetted">
                    <input type="hidden" value="{{ $request->driver_id }}" name="driver_id">
                    <input type="hidden" name="pickup_location" value="{{ $request->pickup_location }}">
                    <input type="hidden" name="pickup_location_latitude" id="pickup_location_latitude">
                    <input type="hidden" name="pickup_location_longitude" id="pickup_location_longitude">
                    <input type="hidden" name="destination_location[]" value="{{ $request->destination_location }}">
                    <input type="hidden" name="distance" value="{{ $request->distance }}">
{{--                    <div class="form-group mt-0 form-step">--}}
{{--                        <label class="form-label mb-2" for="departure_date">Date and time of Departure</label>--}}
{{--                        <input type="text" class="form-control white-background" name="departure_date" id="departure_date">--}}
{{--                    </div>--}}

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
{{--                <div class="form-group mt-3 form-step">--}}
{{--                    <label for="means_of_transport">Mean Of Transport</label>--}}
{{--                    <select class="form-control white-background" multiple="multiple" name="means_of_transport[]" id="means_of_transport">--}}
{{--                        <option>Select Means of Transport</option>--}}
{{--                        @foreach(\App\Models\Mean_of_transport::where('status','1')->get() as $mean_of_transport)--}}
{{--                            <option value="{{ $mean_of_transport->id }}">{{ $mean_of_transport->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="type_of_package">Select Type of Package</label>
                        <select class="form-control white-background" id="type_of_package" name="type_of_package">
                            <option>Please select package category</option>
                            @foreach(\App\Models\ParcelCategory::all() as $parcel_category)
                                <option value="{{ $parcel_category->id }}">{{ $parcel_category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="sub_type_of_package">Select Sub Type of Package</label>
                        <select class="form-control white-background" id="sub_type_of_package" name="sub_type_of_package">
                            <option>Please select package sub category</option>
                        </select>
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="length_of_package">Enter Length of Package</label>
                        <input type="text" class="form-control white-background" id="length_of_package" name="length_of_package"
                               placeholder="Enter Package Length">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="width_of_package">Enter Width of Package</label>
                        <input type="text" class="form-control white-background" id="width_of_package" name="width_of_package"
                               placeholder="Enter Package Width">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="weight_of_package">Enter Weight of Package</label>
                        <input type="text" class="form-control white-background" id="weight_of_package" name="weight_of_package"
                               placeholder="Enter Package Weight">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="quantity_of_package">Enter Quantity of Package</label>
                        <input type="number" class="form-control white-background" id="quantity_of_package" name="quantity_of_package"
                               placeholder="Enter Package Quantity">
                    </div>

                    <div class="row">
                        <div class="form-group mt-3 form-step">
                            <label class="form-label mb-2" for="Inputofferrate">Enter your offer rate</label>
                            <input type="number" class="form-control white-background" id="Inputofferrate" name="fare" value=""
                                   placeholder="Estimated fare is {{ $request->distance * 2 }}, you can change it">
                        </div>
                        <div class="form-group mt-3 form-step">
                            <label class="form-label mb-2" for="currency_offerrate">Select your fare currency</label>
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
                    <div class="form-group mt-0 form-step">
                        <label class="form-label mb-2" for="deadline_date">Date and time of Arrival</label>
                        <input type="text" class="form-control white-background" name="deadline_date" id="deadline_date">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="comments">Comments</label>
                        <textarea class="form-control white-background" id="comments" name="comments"
                                  placeholder="Enter comments" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2">Receiver Details</label>
                        <br>
                        <label class="form-label mb-2" for="receiver_name">Name</label>
                        <input type="text" class="form-control white-background" id="receiver_name" name="receiver_name"
                               placeholder="Enter Receiver Name">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="receiver_email">Email</label>
                        <input type="email" class="form-control white-background" id="receiver_email" name="receiver_email"
                               placeholder="Enter Receiver Email">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label class="form-label mb-2" for="receiver_phone">Phone</label>
                        <input type="number" class="form-control white-background" id="receiver_phone" name="receiver_phone"
                               placeholder="Enter Receiver Phone">
                    </div>
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

        let currentStep = 0;
        let steps = [];
        let nextBtn, prevBtn;

        function showStep(step) {
            steps.forEach((el, i) => {
                el.style.display = i === step ? 'block' : 'none';
            });

            prevBtn.style.display = step > 0 ? 'inline-block' : 'none';
            nextBtn.textContent = step === steps.length - 1 ? 'Book Ride' : 'Next';
        }

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


            flatpickr("#deadline_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });

        });

        $('#fareForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            let actionUrl = $(this).attr('action');

            $.ajax({
                url: actionUrl,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        toastr.success('Ride requested successfully!');

                        // ✅ Reset form
                        $('#fareForm')[0].reset();

                        // ✅ Reset Select2 (if you’re using it)
                        // $('#means_of_transport').val(null).trigger('change');

                        // ✅ Clear error messages
                        $('#error-messages').html('');

                        // ✅ Return to step 1
                        currentStep = 0;
                        showStep(currentStep);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorHtml = '<ul class="text-danger">';
                        $.each(errors, function (key, messages) {
                            $.each(messages, function (index, message) {
                                errorHtml += '<li>' + message + '</li>';
                            });
                        });
                        errorHtml += '</ul>';
                        $('#error-messages').html(errorHtml);
                    }
                }
            });
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            steps = document.querySelectorAll('.form-step');
            nextBtn = document.getElementById('nextBtn');
            prevBtn = document.getElementById('prevBtn');

            showStep(currentStep);

            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();

                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    // ✅ Instead of .submit(), manually trigger AJAX
                    $('#fareForm').trigger('submit');
                }
            });

            prevBtn.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);

            // $('#means_of_transport').select2();
        });

    </script>

@endsection
