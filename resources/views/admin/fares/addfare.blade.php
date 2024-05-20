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
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header-tab-animation card-header">
                                    <div class="card-header-title">
                                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                        Add Fare
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif

                                            <form method="POST" action="{{ url('admin/addfare') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label>Zone From</label>
                                                    <select name="zone_from" class="form-control">
                                                        <option value="" disabled selected>Select Zone From</option>
                                                        @foreach($zones as $zone)
                                                            <option value="{{ $zone->id }}">{{ $zone->zone }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Zone To</label>
                                                    <select name="zone_to" class="form-control">
                                                        <option value="" disabled selected>Select Zone To</option>
                                                        @foreach($zones as $zone)
                                                            <option value="{{ $zone->id }}">{{ $zone->zone }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>


                                                <div class="form-group">
                                                    <label>Car Name</label>
                                                    <select name="car_name" class="form-control">
                                                        <option value="" disabled selected>Select Car</option>
                                                        @foreach($cars as $car)
                                                            <option value="{{$car->id}}">{{$car->car_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>


                                                <div class="form-group">
                                                    <label>Fare</label>
                                                    <input type="number" name="fare" class="form-control" >
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
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
</body>

</html>
