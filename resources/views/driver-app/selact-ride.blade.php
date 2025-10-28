@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
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
        .select2-container {
            width: 100% !important;
        }
        /* Force Select2 choices to display as blocks (full row) */
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            float: left !important;
            display: inline-block !important;
            width: auto !important;
            margin: 4px 6px 0 0 !important;
        }

        /* Ensure dropdown is full width */
        #excluded_packages + .select2-container { width: 100% !important; }

        /* One option per row, occupy full width */
        .select2-container--default .select2-results__option {
            display: block !important;
            width: 100% !important;
            white-space: normal;      /* let long labels wrap neatly */
            box-sizing: border-box;
            padding: 8px 10px;        /* nicer row spacing (optional) */
        }

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
    <style>
        .custom-container{
            padding: 0px 0px !important;
        }
        .location-section{
            padding-bottom: 0px;
        }
    </style>

@endsection

@section('content')

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="flex-spacing gap-2 w-100">
                    <a href="{{url('driver/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>

                    <h3 class="fw-medium title-color">Fill in the information of votre</h3>
                    <a href="{{url('driver/chatting')}}">
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
                <form class="mt-0" method="post" action="{{ route('driver.driver_fare_request') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden fields remain same -->
                    <input type="hidden" name="pickup_location" value="{{ $request->pickup_location }}">
                    <input type="hidden" name="pickup_location_latitude" id="pickup_location_latitude">
                    <input type="hidden" name="pickup_location_longitude" id="pickup_location_longitude">
                    @foreach ($request->destination_location as $location)
                        <input type="hidden" name="destination_location[]" value="{{ $location }}">
                    @endforeach
                    <input type="hidden" name="distance" value="{{ $request->distance }}">

                    <!-- Category Selection -->
                    <div class="form-group mt-3 form-step">
                        <label for="travel_category">Select Travel Category</label>
                        <select class="form-control white-background select2" id="travel_category" name="travel_category" required>
                            <option value="">Select Category</option>
                            <option value="air_travel">Air Travel - offer kilos of luggage for sale</option>
                            <option value="sea_travel">Sea Travel, book your parcel shipments</option>
                        </select>
                    </div>

                    <div class="form-group mt-3 form-step airline" id="airlineformstep">
                        <label for="airline">Select Airline</label>
                        <select class="form-control white-background select2" id="airline" name="airline">
                            <option value="">Select Airline</option>
                            <option value="Air France">Air France</option>
                            <option value="Corsair">Corsair</option>
                            <option value="Air Algérie">Air Algérie</option>
                            <option value="Tassili Airlines">Tassili Airlines</option>
                            <option value="Royal Air Maroc">Royal Air Maroc</option>
                            <option value="RAM Express">RAM Express</option>
                            <option value="Tunisair">Tunisair</option>
                            <option value="Nouvelair Tunisie">Nouvelair Tunisie</option>
                            <option value="EgyptAir">EgyptAir</option>
                            <option value="Nile Air">Nile Air</option>
                            <option value="Libyan Airlines">Libyan Airlines</option>
                            <option value="Air Sénégal">Air Sénégal</option>
                            <option value="Air Côte d'Ivoire">Air Côte d'Ivoire</option>
                            <option value="ASKY Airlines">ASKY Airlines</option>
                            <option value="Mauritania Airlines">Mauritania Airlines</option>
                            <option value="Air Burkina">Air Burkina</option>
                            <option value="Camair-Co">Camair-Co</option>
                            <option value="Ethiopian Airlines">Ethiopian Airlines</option>
                            <option value="Kenya Airways">Kenya Airways</option>
                            <option value="RwandAir">RwandAir</option>
                            <option value="Uganda Airlines">Uganda Airlines</option>
                            <option value="Air Mauritius">Air Mauritius</option>
                            <option value="Air Madagascar / Madagascar Airlines">Air Madagascar / Madagascar Airlines</option>
                            <option value="South African Airways">South African Airways</option>
                            <option value="Air Austral">Air Austral</option>
                            <option value="Cabo Verde Airlines">Cabo Verde Airlines</option>
                        </select>
                    </div>

                    <div class="form-group mt-3 form-step" id="maritimesformstep">
                        <label for="maritimes">Select Voyages Maritimes</label>
                        <select class="form-control white-background select2" id="maritimes" name="maritimes">
                            <option value="">Select Voyages Maritimes</option>
                            <option value="CMA CGM">CMA CGM</option>
                            <option value="AGL (Africa Global Logistics / ex Bolloré Africa Logistics)">AGL (Africa Global Logistics / ex Bolloré Africa Logistics)</option>
                            <option value="Maersk Line">Maersk Line</option>
                            <option value="MSC – Mediterranean Shipping Company">MSC – Mediterranean Shipping Company</option>
                            <option value="Hapag-Lloyd">Hapag-Lloyd</option>
                            <option value="Grimaldi Lines">Grimaldi Lines</option>
                            <option value="Delmas">Delmas</option>
                            <option value="NileDutch">NileDutch</option>
                            <option value="PIL – Pacific International Lines">PIL – Pacific International Lines</option>
                            <option value="Arkas Line">Arkas Line</option>
                            <option value="Messina Line">Messina Line</option>
                            <option value="Safmarine">Safmarine</option>
                        </select>
                    </div>

                    <div class="form-group mt-3 form-step">
                        <label for="departure_datetime">Date & Time of Departure</label>
                        <input type="datetime-local" class="form-control white-background" id="departure_datetime" name="departure_datetime">
                    </div>

                    <div class="form-group mt-3 form-step">
                        <label for="arrival_datetime">Date & Time of Arrival</label>
                        <input type="datetime-local" class="form-control white-background" id="arrival_datetime" name="arrival_datetime">
                    </div>

                    <div class="form-group mt-3 form-step">
                        <label for="endbooking_datetime">End Date of Booking</label>
                        <input type="datetime-local" class="form-control white-background" id="endbooking_datetime" name="endbooking_datetime">
                    </div>

                    <div class="form-group mt-3 form-step">
                        <label for="end_reservation_date">End Date of Reservation</label>
                        <input type="date" class="form-control white-background" id="end_reservation_date" name="end_reservation_date">
                    </div>

                    <!-- Transport Capacity & Pricing -->
                    <div class="form-group mt-3 form-step">
                        <label for="total_transport_capacity">Total Capacity (kg)</label>
                        <input type="number" class="form-control white-background" id="total_transport_capacity" name="total_transport_capacity"
                               placeholder="Enter Total Capacity (kg)" min="0" max="10000">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label for="price_per_kilo">Price per Kilogram</label>
                        <input type="number" class="form-control white-background" id="price_per_kilo" name="price_per_kilo"
                               placeholder="Enter Price per Kilo" min="3" max="100">
                    </div>

                    <div class="form-group mt-3 form-step">
                        <label for="price_currency">Price Currency</label>
                        <select class="form-control white-background select2" id="price_currency" name="price_currency" required>
                            <option value="">Select Currency</option>
                            <option value="$">Dollar</option>
                            <option value="€" selected>Euro</option>
                        </select>
                    </div>

{{--                    <!-- Sender Reservation -->--}}
{{--                    <div class="form-group mt-3 form-step">--}}
{{--                        <label for="available_transport_capacity">kilos available for reservation (kg)</label>--}}
{{--                        <input type="number" class="form-control white-background" id="available_transport_capacity" name="available_transport_capacity"--}}
{{--                               placeholder="Enter Available Kilos that can be reserved">--}}
{{--                    </div>--}}

                    <!-- Package Handling -->
                    <div class="form-group mt-3 form-step">
                        <label for="collection_address">Address for Collecting Packages</label>
                        <section class="location-section pt-0">
                            <div class="custom-container">
                                <ul class="pickup-location-listing" id="location-list">
                                    <li>
                                        <div class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                            <input type="text" required id="pac-input2" class="form-control border-0"
                                                   placeholder="Address for Collecting Packages" name="collection_address[]">
                                            <i class="iconsax add-stop" data-icon="add"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>

                    <div class="form-group mt-3 form-step">
                        <label for="delivery_address">Place/Address for Handing Over Package</label>
                        <input type="text" class="form-control white-background google-autocomplete" id="delivery_address" name="delivery_address"
                               placeholder="Enter Delivery Address">
                    </div>
                    <div class="form-group mt-3 form-step">
                        <label for="package_receiving_method">Method of Receiving Package</label>
                        <select class="form-control white-background select2" id="package_receiving_method" name="package_receiving_method">
                            <option value="">Select Method</option>
                            <option value="hand">Hand Delivery</option>
                            <option value="postal">Postal Delivery</option>
                        </select>
                    </div>

                    <!-- Excluded Packages -->
                    <div class="form-group mt-3 form-step">
                        <label for="excluded_packages">Excluded Packages (Not Allowed for Transport)</label>
                        <select class="form-control white-background select2 w-100"
                                id="excluded_packages"
                                name="excluded_packages[]" multiple>
                            <option value="explosives">Explosives</option>
                            <option value="flammable_liquids">Flammable Liquids</option>
                            <option value="weapons">Weapons</option>
                            <option value="drugs">Drugs</option>
                            <option value="perishable_foods">Perishable Foods</option>
                            <option value="chemicals">Toxic Chemicals</option>
                            <option value="radioactive_materials">Radioactive Materials</option>
                            <option value="other">Other (specify below)</option>
                        </select>
                    </div>

                    <div class="form-group mt-3 form-step">
                        <label for="other_excluded">Other Excluded Items</label>
                        <textarea class="form-control white-background" id="other_excluded" name="other_excluded"
                                  placeholder="Enter any other excluded items" rows="2"></textarea>
                    </div>

                    <!-- Payment -->
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

                    <!-- Buttons -->
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

            flatpickr("#end_reservation_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });
            flatpickr("#departure_datetime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });
            flatpickr("#arrival_datetime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });
            flatpickr("#endbooking_datetime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentStep = 0;
            const steps = document.querySelectorAll(".form-step");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");
            const travelCategory = document.getElementById("travel_category");

            // Initially hide all steps except the first
            steps.forEach((step, index) => {
                if (index !== 0) step.style.display = "none";
            });

            function showStep(stepIndex) {
                steps.forEach((step, i) => {
                    step.style.display = i === stepIndex ? "block" : "none";
                });

                prevBtn.style.display = stepIndex === 0 ? "none" : "inline-block";
                nextBtn.textContent = stepIndex === steps.length - 1 ? "Submit" : "Next";
            }

            function getNextStep(index) {
                let nextIndex = index + 1;

                // Skip airline step if sea_travel
                if (steps[nextIndex] && steps[nextIndex].id === "airlineformstep" && travelCategory.value === "sea_travel") {
                    return getNextStep(nextIndex);
                }

                // Skip maritimes step if air_travel
                if (steps[nextIndex] && steps[nextIndex].id === "maritimesformstep" && travelCategory.value === "air_travel") {
                    return getNextStep(nextIndex);
                }

                return nextIndex;
            }

            function getPrevStep(index) {
                let prevIndex = index - 1;

                // Skip airline step if sea_travel
                if (steps[prevIndex] && steps[prevIndex].id === "airlineformstep" && travelCategory.value === "sea_travel") {
                    return getPrevStep(prevIndex);
                }

                // Skip maritimes step if air_travel
                if (steps[prevIndex] && steps[prevIndex].id === "maritimesformstep" && travelCategory.value === "air_travel") {
                    return getPrevStep(prevIndex);
                }

                return prevIndex;
            }

            nextBtn.addEventListener("click", function () {
                if (currentStep === steps.length - 1) {
                    // Last step → submit form
                    document.querySelector("form").submit();
                } else {
                    currentStep = getNextStep(currentStep);
                    showStep(currentStep);
                }
            });

            prevBtn.addEventListener("click", function () {
                currentStep = getPrevStep(currentStep);
                showStep(currentStep);
            });

            // Reset logic when category changes
            travelCategory.addEventListener("change", function () {
                if (travelCategory.value === "air_travel") {
                    document.getElementById("airlineformstep").style.display = "block";
                    document.getElementById("maritimesformstep").style.display = "none";
                } else if (travelCategory.value === "sea_travel") {
                    document.getElementById("airlineformstep").style.display = "none";
                    document.getElementById("maritimesformstep").style.display = "block";
                }
            });

            showStep(currentStep);



            $('.select2').select2({
                width: '100%',
                placeholder: 'Select excluded packages',
                closeOnSelect: true
            });
            $('#airline').select2({
                width: '100%',
                closeOnSelect: true
            });
            $('#maritimes').select2({
                width: '100%',
                closeOnSelect: true
            });

            const priceInput = document.getElementById("price_per_kilo");
            const total_transport_capacityInput = document.getElementById("total_transport_capacity");
            // const available_transport_capacityInput = document.getElementById("available_transport_capacity");

            priceInput.addEventListener("input", function () {
                let value = parseInt(this.value, 10);

                if (value > 100) {
                    this.value = 100;
                } else if (value < 3 && this.value !== "") {
                    this.value = 3;
                }
            });
            total_transport_capacityInput.addEventListener("input", function () {
                let value = parseInt(this.value, 10);

                available_transport_capacityInput.value = value;

                if (value > 10000) {
                    this.value = 10000;
                } else if (value < 0 && this.value !== "") {
                    this.value = 0;
                }
            });
            // available_transport_capacityInput.addEventListener("input", function () {
            //     let value = parseInt(this.value, 10);
            //     let total = parseInt(total_transport_capacityInput.value, 10);
            //
            //     if (value > 10000 || value > total) {
            //         this.value = total_transport_capacityInput.value;
            //     } else if (value < 0 && this.value !== "") {
            //         this.value = 0;
            //     }
            // });

        });

        let stopCounter = 1;
        let collection_address = null;
        let delivery_address = null;
        const stopLocations = [];

        function preventFormSubmitOnEnter(inputElement) {
            inputElement.addEventListener("keydown", function (e) {
                if (e.key === "Enter") e.preventDefault();
            });
        }

        function initMap(){

            const input2 = document.getElementById("pac-input2");
            preventFormSubmitOnEnter(input2);
            const autocomplete2 = new google.maps.places.Autocomplete(input2, {
                fields: ["geometry", "formatted_address"],
            });
            autocomplete2.addListener("place_changed", () => {
                const place = autocomplete2.getPlace();
                if (!place.geometry) return;
                collection_address = place;
            });

            // Final Destination
            const input4 = document.getElementById("delivery_address");
            preventFormSubmitOnEnter(input4);
            const autocomplete4 = new google.maps.places.Autocomplete(input4, {
                fields: ["geometry", "formatted_address"],
            });
            autocomplete4.addListener("place_changed", () => {
                const place = autocomplete4.getPlace();
                if (!place.geometry) return;
                delivery_address = place;
            });


            // Add stop handler
            document.querySelector('.add-stop').addEventListener('click', function () {
                stopCounter++;
                const newStop = document.createElement('li');
                newStop.classList.add('destination-stop');
                newStop.innerHTML = `
                <div class="location-box">
                    <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                    <input type="text" id="pac-input${stopCounter}" class="form-control border-0" placeholder="Address for Collecting Packages" name="collection_address[]">
                    <i class="fas fa-times remove-stop"></i>
                </div>
            `;
                document.getElementById('location-list').appendChild(newStop);

                const input = newStop.querySelector(`#pac-input${stopCounter}`);
                preventFormSubmitOnEnter(input);

                const autocomplete = new google.maps.places.Autocomplete(input, {
                    fields: ["geometry", "formatted_address"],
                });

                autocomplete.addListener("place_changed", () => {
                    const place = autocomplete.getPlace();
                    if (!place.geometry) return;
                    stopLocations[stopCounter] = place;
                });

                // Remove stop
                newStop.querySelector('.remove-stop').addEventListener('click', () => {
                    stopLocations[stopCounter] = null;
                    newStop.remove();
                });
            });

        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>
@endsection
