<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <title>Car Booking | Limousine Reservation</title>
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
    <div class="d-flex justify-content-center flex-column align-items-center" style="min-height: 60vh">
        <h1>Booking Cancelled</h1>
        <p><a class="custom-submit-style px-4 mt-4" href="/">Go to Home</a></p>
    </div>
</body>

</html>
