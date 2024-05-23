<!DOCTYPE html>
<html lang="en">

<head>
    {{-- ... (Your head content) ... --}}
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Language" content="en" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Portal | Limousine Reservation</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="" />
    <link href="{{ asset('assets/admin/assets/css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- Include Header --}}

        @include('admin.layouts.header')

        <div class="app-main">
            {{-- Include Sidebar --}}
            @include('admin.layouts.sidebar')

            {{-- Content Area --}}
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <div>Admin Dashboard</div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header-tab-animation card-header">
                                    <div class="card-header-title">
                                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                        Add Booking
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">
                                            <form method="POST" action="{{ route('admin.submit.booking') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Route Type</label>
                                                    <select name="route_type" class="form-control">

                                                        <option selected value="2">Location</option>
                                                        <option value="1">Round Trip</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Car Name</label>
                                                    <select name="car_id" class="form-control">
                                                        @foreach ($cars as $car)
                                                            <option value="{{ $car->id }}">{{ $car->car_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hourly Package Name</label>
                                                    <select name="hourly_package_id" class="form-control">
                                                        @foreach ($hourly_package as $hourly)
                                                            <option value="{{ $hourly->id }}">
                                                                {{ $hourly->package_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Booking Date</label>
                                                    <input type="text" name="datepicker"
                                                        class="form-control datepickertext" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Booking Time</label>
                                                    <input type="text" name="timepicker"
                                                        class="form-control timepickertext" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>From Location</label>
                                                    <input type="text" name="start_address" class="form-control"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>To Location</label>
                                                    <input type="text" name="end_address" class="form-control"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Max Capacity Luggage</label>
                                                    <input type="number" min="1" name="luggage_count"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Max Capacity Luggage</label>
                                                    <input type="number" min="1" name="person_count"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Total Price</label>
                                                    <input type="number" min="1" name="total_price"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">

                                                        <option selected value="unpaid">Unpaid</option>
                                                        <option value="paid">Paid</option>

                                                    </select>
                                                </div>


                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Include Footer --}}
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".datepickertext").flatpickr();

        $(".timepickertext").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    </script>
</body>

</html>
