<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car Booking | Limousine Reservation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/datetimepicker.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <div class="container-fluid">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/logo.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 pr-0">
                    <div class="site-navigation mobile-navigation">
                        <ul>
                            <li><a href="{{ url('/') }}"><img src="assets/images/icon/icon-home.svg" /></a></li>
                            <li><a href="{{ url('services') }}">Services</a></li>
                            <li><a href="{{ url('about-us') }}">About</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact</a></li>
                            <li><a href="javascript:;"><i class="fas fa-phone-alt"></i> <span>Text /
                                        Call</span><strong>+123 456 7890</strong></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <input type="hidden" id="route_type" name="route_type"
            value="{{ session('bookingData')['route_type'] ?? '2' }}">
        <input type="hidden" id="carIdInput" name="car" required>
        <input type="hidden" id="carPriceInput" required>
        <input type="hidden" id="hourlyPriceInput">
        <input type="hidden" id="hourlySlapPriceInput" name="extraHourlySlapPrice">
        <input type="hidden" id="fromToPrice" value="{{ session('bookingData')['total_fare'] ?? '' }}">
        <input type="hidden" id="fareIdInput" name="fare_id" value="{{ session('bookingData')['fare_id'] ?? '' }}">
        <input type="hidden" id="totalPriceInput" name="total_price">
        <input type="hidden" id="hourly-price" name='hourly_package_id'
            data-hourly-price="{{ $HourlyPackage->hourly_rate ?? '0' }}"
            value="{{ session('bookingData')['hourly_package_id'] ?? '' }}">
        <section class="form-styling spacing__x pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12"
                                style=" {{ isset(session('bookingData')['route_type']) == 1 ? '' : 'display:none;' }}">

                                <div class="alert alert-warning">
                                    For round trip routes, a fixed duration of 7 hours applies.
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="c-form-group">
                                    <i class="fa fas fa-calendar-alt"></i>
                                    <input type="text" name="datepicker"
                                        value="{{ $bookingData ? $bookingData['datepicker'] : '' }}"
                                        class="input-style hasDatepicker" placeholder="Select Date" id="datePicker"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="c-form-group">
                                    <i class="fa far fa-clock"></i>
                                    <input type="text" name="timepicker"
                                        value="{{ $bookingData ? $bookingData['timepicker'] : '' }}"
                                        class="input-style" placeholder="Select Time" id="timePicker" required="">
                                </div>
                            </div>


                            {{-- <div class="col-lg-4"
                                style=" {{ isset(session('bookingData')['route_type']) == 1 ? 'display:none;' : '' }}">
                                <div class="c-form-group s2">
                                    <i class="fas fa-clock"></i>
                                    <select class="input-style" name="hourly_package_id" required=""
                                        id="hourly-price">
                                        @foreach ($HourlyPackage as $key => $hpkg)
                                            <option {{ $loop->iteration == 1 ? 'selected' : '' }}
                                                value="{{ $hpkg->id }}"
                                                data-hourly-price="{{ $hpkg->hourly_rate }}">
                                                {{ $hpkg->package_name }}
                                            </option>
                                        @endforeach
                                    </select>


                                </div>
                            </div> --}}
                            @php
                                $csrfToken1 = csrf_token();
                            @endphp



                            <div class="col-lg-4">
                                <div class="c-form-group">
                                    <i class="fas fa-user-friends"></i>
                                    <select class="input-style" name="person_count" required="">
                                        <option value="1"
                                            {{ $bookingData && $bookingData['max_persons'] == 1 ? 'selected' : '' }}>1
                                        </option>
                                        <option value="2"
                                            {{ $bookingData && $bookingData['max_persons'] == 2 ? 'selected' : '' }}>2
                                        </option>
                                        <option value="3"
                                            {{ $bookingData && $bookingData['max_persons'] == 3 ? 'selected' : '' }}>3
                                        </option>
                                        <option value="4"
                                            {{ $bookingData && $bookingData['max_persons'] == 4 ? 'selected' : '' }}>4
                                        </option>
                                        <option value="5"
                                            {{ $bookingData && $bookingData['max_persons'] == 5 ? 'selected' : '' }}>5
                                        </option>
                                        <option value="6"
                                            {{ $bookingData && $bookingData['max_persons'] == 6 ? 'selected' : '' }}>6
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="c-form-group">
                                    <i class="fas fa-suitcase-rolling"></i>
                                    <select class="input-style" name="luggage_count" required="">
                                        <option value="1"
                                            {{ $bookingData && $bookingData['max_luggage'] == 1 ? 'selected' : '' }}>1
                                        </option>
                                        <option value="2"
                                            {{ $bookingData && $bookingData['max_luggage'] == 2 ? 'selected' : '' }}>2
                                        </option>
                                        <option value="3"
                                            {{ $bookingData && $bookingData['max_luggage'] == 3 ? 'selected' : '' }}>3
                                        </option>
                                        <option value="4"
                                            {{ $bookingData && $bookingData['max_luggage'] == 4 ? 'selected' : '' }}>4
                                        </option>
                                        <option value="5"
                                            {{ $bookingData && $bookingData['max_luggage'] == 5 ? 'selected' : '' }}>5
                                        </option>
                                        <option value="6"
                                            {{ $bookingData && $bookingData['max_luggage'] == 6 ? 'selected' : '' }}>6
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4"
                                style=" {{ isset(session('bookingData')['route_type']) == 1 ? 'display:none;' : '' }}">


                                <div class="input-group counter">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-warning btn-number"
                                            onclick="decreaseCount()">
                                            <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" name="hours" class="form-control input-number"
                                        id="hourly-slaps-price" value="3" index="0" readonly>
                                    <span class="input-group-btn">

                                        <button type="button" class="btn btn-success btn-number"
                                            onclick="increaseCount()">
                                            <span class="fa fa-plus"></span>
                                        </button>

                                    </span>
                                </div>

                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="spacing__x">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="headingstyle1 text-center">

                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>
                            @endif




                            <h3>Select your car</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <div class="center-mode-slider"> --}}
                        <div class="grid"
                            style="max-height:600px;overflow-y:auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));grid-template-rows: 200px; grid-auto-rows:200px;gap:8px">
                            @foreach ($cars as $key => $car)
                                <div class="hc-slide-box w-100 car-selection">
                                    <div class="d-flex justify-content-end" style="position: absolute; right:10px;">
                                        <input type="radio" style="width:auto" class="select-car" name='car'
                                            required value='{{ $car->id }}' data-car-id="{{ $car->id }}"
                                            data-car-price="{{ $car->car_base_fare }}">
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center" style="gap:10px">
                                        <div class="img-box" style="flex-grow: 1">
                                            <img width="200"
                                                src="{{ asset($car->car_pictures->first()?->car_picture_path) }}" />
                                        </div>
                                        <div class="text-box"
                                            style="display: flex;min-width: 125px;height:150px;overflow-y: auto;flex-direction: column;justify-content: center; flex-grow:2">
                                            <h3>{{ $car->car_name }}</h3>
                                            <ul>
                                                <li><i class="fas fa-user-friends"></i> <span>Max
                                                        {{ $car->max_capacity }}</span></li>
                                                <li><i class="fas fa-suitcase-rolling"></i> <span>Max
                                                        {{ $car->max_luggage }}</span></li>
                                            </ul>
                                            <ul class="mt-1">
                                                <li>
                                                    <i class='fas fa-user-friends'></i><span>Base Fare:
                                                        {{ $car->car_base_fare }}</span>
                                                </li>
                                            </ul>
                                            <ul class="mt-1"
                                                style="{{ isset(session('bookingData')['route_type']) == 1 ? 'display:none;' : '' }}">
                                                <li>
                                                    <i class='fas fa-user-friends'><span> Extra Hourly Rate:
                                                        </span><span class="extra-hourly-rate"></span></i>
                                                </li>
                                            </ul>
                                            {{-- <a href="javascript:void(0);" class="btn btn-primary btn-sm select-car mt-4"
                                            data-car-id="{{ $car->id }}"
                                            data-car-price="{{ $car->car_base_fare }}">Select Car</a> --}}
                                            {{-- <div style="display: block">
                                            <input type="radio"
                                                class="btn btn-primary form-check-input btn-sm select-car mt-4"
                                                name='car' value='{{ $car->id }}'
                                                data-car-id="{{ $car->id }}"
                                                data-car-price="{{ $car->car_base_fare }}">
                                            <label class="form-check-label" for="car">Select Car</label>
                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- </div> --}}
                    </div>
                </div>


            </div>
        </section>

        <section class="form-styling spacing__x">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="headingstyle1 text-center">
                            <h3>Routing</h3>
                        </div>
                    </div>
                </div>

                <div class="row just@y-content-center">
                    <div class="col-lg-12">
                        {{-- <div class="c-form-group s2">

                            <select disabled name="route_type" class="input-style" id="route_type">
                                <option value="1"
                                    {{ isset($bookingData) && isset($bookingData['route_type']) == 1 ? 'selected' : '' }}>
                                    Zonal
                                </option>
                                <option value="2"
                                    {{ isset($bookingData) && isset($bookingData['route_type']) == 2 ? 'selected' : '' }}>
                                    Location
                                </option>
                            </select>
                            <span class="right-align">Route Type</span>

                        </div> --}}

                        <div class="c-form-group s2">
                            {{-- <span class="left-align">From</span> --}}
                            {{-- <input type="text" name="booking_date_from" value="{{ $bookingData ? $bookingData['pickup_address'] : '' }}" class="input-style" placeholder=""> --}}

                            <input type="text" name="pickup_address" class="input-style" disabled
                                style="padding:0px 25px 0px 50px" id="zone_from"
                                value="{{ $bookingData && $bookingData['pickup_address'] ? $bookingData['pickup_address'] : '' }}"
                                placeholder="Pickup Address" required>
                            <span class="right-align">From</span>

                        </div>

                        <div class="c-form-group s2">
                            {{-- <span class="left-align">To</span> --}}
                            {{-- <input type="text" name="booking_date_to" value="{{ $bookingData ? $bookingData['dropoff'] : '' }}" class="input-style" placeholder=""> --}}
                            <input type="text" name="dropoff" disabled
                                value="{{ $bookingData && $bookingData['dropoff'] ? $bookingData['dropoff'] : '' }}"
                                class="input-style"style="padding:0px 25px 0px 50px" placeholder="Dropoff Address"
                                id="zone_to" required>

                            <span class="right-align">To</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="spacing__x pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="headingstyle1 text-center">
                            <h3>Main Passenger</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-user"></i>
                            <input type="text" class="c-input-style" name="first_name" placeholder="First Name"
                                required />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-user"></i>
                            <input type="text" class="c-input-style" name="last_name" placeholder="Last Name"
                                required />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" class="c-input-style" placeholder="Email"
                                value="{{ old('email') }}" required />
                        </div>


                    </div>
                    {{--
                        <div class="col-lg-4">
                            <div class="c-form-group h-icon mb-4">
                                <i class="fas fa-user"></i>
                                <input type="text" class="c-input-style" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="c-form-group h-icon mb-4">
                                <i class="fas fa-user"></i>
                                <input type="text" class="c-input-style" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="c-form-group h-icon mb-4">
                                <i class="fas fa-user"></i>
                                <input type="text" class="c-input-style" placeholder="" required/>
                            </div>
                        </div> --}}


                    {{-- <div class="col-lg-12">
                        <div class="c-form-group mb-5 mt-5 text-center">
                            <button type="button" class="btn btn-lg btn-toggle" data-toggle="button"
                                aria-pressed="false" autocomplete="off">
                                <div class="switch"></div>
                            </button>
                        </div>
                    </div> --}}
                </div>

                {{-- <div class="row" style="display: none;">
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-user"></i>
                            <input type="text" class="c-input-style" placeholder="First Name" required />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-user"></i>
                            <input type="text" class="c-input-style" placeholder="Last Name" required />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-envelope"></i>
                            <input type="email" class="c-input-style" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-user"></i>
                            <input type="text" class="c-input-style" placeholder="" required />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-user"></i>
                            <input type="text" class="c-input-style" placeholder="" required />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="c-form-group h-icon mb-4">
                            <i class="fas fa-user"></i>
                            <input type="text" class="c-input-style" placeholder="" required />
                        </div>
                    </div>
                </div>
                 --}}
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="final-pricing bg-color-2">
                            <h3 class="total-price">$0.00 <i class="far fa-info-circle"></i></h3>
                        </div>
                        <div class="final-pricing-btn position-absolute">
                            <div class="c-form-group">
                                <input type="submit" class="input-type-submit" value="Verify reservation">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyrights">
                        <p>© {{ date('Y') }} Limousine. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <ul class="inline-block">
                            <li><a href="javascript:;"><i class="fab fa-discord"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/plugin.min.js') }}"></script>
    <script src="{{ asset('assets/js/datetimepicker.full.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.5.1/slick/slick.min.js"></script>



    <script src="{{ asset('assets/js/custom.js') }}"></script>


    <script>
        $(document).ready(function() {
            // let packagePriceData = [];
            $('.center-mode-slider').slick({
                slidesToShow: 2,
                centerMode: true,
                centerPadding: '50px',
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 320,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '10px',
                            slidesToShow: 1
                        }
                    }
                ]
            });


            var hourlyPackagePriceData = {};
            $("#hourly-price").on("change", function() {

                hourlyPackagePrice()
            });

            function hourlyPackagePrice() {
                var pckgId = $("#hourly-price").val();
                var csrfToken1 = $('meta[name="csrf-token"]').attr('content');
                // console.log(pckgId)

                $.ajax({
                    type: "post",
                    url: '{{ route('get-slaps-price') }}',
                    data: {
                        _token: csrfToken1,
                        pckgid: pckgId,
                    },
                    dataType: "json",
                    success: function(response) {

                        hourlyPackagePriceData = response.hourlyPrice
                        $("#hourly-slaps-price").attr("min", 3);
                        console.log(hourlyPackagePriceData.length)
                        if (hourlyPackagePriceData.length) {

                            $(".extra-hourly-rate").html(hourlyPackagePriceData[0].extra_hourly_price)
                        } else {
                            $(".extra-hourly-rate").html(0)
                        }
                        updateTotalPrice()
                    }
                });
            }


            hourlyPackagePrice()

            window.increaseCount = function() {

                var counter = document.getElementById('hourly-slaps-price');
                // console.log(counter.value)
                if (counter.value <= 50) {

                    counter.value = parseInt(counter.value) + 1
                    updateTotalPrice();

                }
            }
            window.decreaseCount = function() {
                var counter = document.getElementById('hourly-slaps-price');
                if (counter.value > 3) {

                    counter.value = parseInt(counter.value) - 1
                    updateTotalPrice();
                }
            };

            function updatePrice(count, csrfToken1) {
                var price = getPriceForCount(count, csrfToken1);
                document.getElementById('hourly-slaps-price').value = price;
            }


            function getPriceForCount(count) {
                var pckgId = $("#hourly-price").val();
                var selectedPrice = 0;
                var hourlyPriceData = null;
                var csrfToken1 = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "post",
                    url: '{{ route('get-slaps-price') }}',
                    data: {
                        _token: csrfToken1,
                        pckgid: pckgId,
                    },
                    dataType: "json",
                    async: false,
                    success: function(response) {
                        hourlyPriceData = response.hourlyPrice;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                for (var i = 0; i < hourlyPriceData.length; i++) {
                    if (parseInt(hourlyPriceData[i].hourly_slap) === count) {
                        selectedPrice = hourlyPriceData[i].extra_hourly_price;
                        break;
                    }
                }
                return selectedPrice;
            }

            $('#zone_from, #zone_to').change(function() {
                let route_type = $('#route_type').val();
                console.log(route_type)
                if (route_type == 2) {
                    return 0;
                }
                console.log('test')
                var zone_from = $('#zone_from').val();
                var zone_to = $('#zone_to').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('get-fare') }}',
                    data: {
                        _token: csrfToken,
                        zone_from: zone_from,
                        zone_to: zone_to
                    },
                    dataType: 'json',
                    success: function(response) {

                        $('#fromToPrice').val(response.fare_price);
                        $('#fromToPrice').val();
                        $('#fareIdInput').val(response.fare_id);
                        updateTotalPrice();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#fromToPrice').on('change', function() {
                updateTotalPrice();
            });

            var fromToPrice = parseInt($("#fromToPrice").val() || 0);

            if (fromToPrice > 0) {
                // updateTotalPrice();
            }

            $('#hourly-price').on('change', function() {
                var hourlyPrice = parseInt($(this).val() || 0);
                $('#hourlyPriceInput').val(hourlyPrice);
                updateTotalPrice();
            });

            $('#hourly-slaps-price').on('change', function() {
                // var hourlySlapPrice = parseInt($(this).find(':selected').data('extra-price') || 0);
                var hourlySlapPrice = parseInt($(this).val());
                $('#hourlySlapPriceInput').val(hourlySlapPrice);
                updateTotalPrice();
            });

            const carSelectionElements = document.querySelectorAll('.car-selection');

            carSelectionElements.forEach(carSelection => {
                carSelection.addEventListener('click', () => {
                    const radio = carSelection.querySelector('input[type="radio"]');
                    radio.click()
                });
            });



            $('.select-car').click(function(event) {
                // event.preventDefault();
                var carId = $(this).data('car-id');
                $('#carIdInput').val(carId);
                var carPrice = parseInt($(this).data('car-price') || 0);
                $('#carPriceInput').val(carPrice);

                updateTotalPrice();
            });


            function updateTotalPrice() {
                var carPrice = parseInt($('#carPriceInput').val() || 0);
                var hourlyPrice = parseInt($('#hourly-price').data('hourly-price') || 0);
                var hoursCount = parseInt($('#hourly-slaps-price').val() || 0);
                console.log(carPrice, hourlyPrice, hoursCount)
                console.log(hourlyPackagePriceData)
                var extraHourlyPrice = 0
                if (hourlyPackagePriceData.length) {

                    var extraHourlyPrice = (hoursCount - 3) * hourlyPackagePriceData[0].extra_hourly_price
                }
                $("#hourlySlapPriceInput").val(extraHourlyPrice)
                var fromToPrice = 0;
                let route_type = $('#route_type').val();
                console.log(route_type)
                if (route_type == 1) {
                    console.log($("#fromToPrice"))
                    fromToPrice = parseInt($("#fromToPrice").val());
                }
                console.log("Car Price: " + carPrice, "Hourly Price: " + hourlyPrice, "Hours Count: " + hoursCount,
                    "From To price: " + fromToPrice)
                var totalPrice = carPrice + hourlyPrice + fromToPrice + extraHourlyPrice;
                $('#totalPriceInput').val(totalPrice);
                $('.total-price').text('$' + totalPrice);
            }





            $("#route_type").on("change", function($event) {

                $event.preventDefault();

                var routeType = $(this).find(':selected').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "post",
                    url: "{{ route('getRouteType') }}",
                    data: {
                        "data": routeType,
                        "_token": csrfToken
                    },
                    dataType: "json",
                    success: function(response) {
                        var zoneFromSelect = $('#zone_from');
                        zoneFromSelect.empty();
                        zoneFromSelect.append($('<option>').text('Select Pickup Address').attr(
                            'disabled', true).attr('selected', true));
                        response.zonals.forEach(function(zone) {
                            zoneFromSelect.append($('<option>').val(zone.id).text(zone
                                .zone));
                        });

                        var zoneToSelect = $('#zone_to');
                        zoneToSelect.empty();
                        zoneToSelect.append($('<option>').text('Select Drop-off').attr(
                            'disabled', true).attr('selected', true));
                        response.zonals.forEach(function(zone) {
                            zoneToSelect.append($('<option>').val(zone.id).text(zone
                                .zone));
                        });
                    },

                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);


                    }

                });
            });

        });
    </script>





</body>

</html>
