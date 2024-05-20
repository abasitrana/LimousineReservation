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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
                                        Edit Car
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ url('admin/updatezone', $zone->id) }}">
                                                @csrf

                                                <input type="hidden" value="{{ $zone->id }}">


                                                <div class="form-group">
                                                    <label>States</label>
                                                    <select name="state_code" class="form-control" id="state_select">
                                                        <option value="" disabled selected>Select State</option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->code }}">{{ $state->state }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>City</label>


                                                    <label>City</label>
                                                    <select name="city_id" class="form-control" id="city_select">
                                                        <option value="" disabled selected>Select City</option>
                                                    </select>

                                                </div>

                                                <div class="form-group">
                                                    <label>Route Type</label>
                                                    <select name="route_type" class="form-control" id="route_type">
                                                        <option value="1" selected>Round Trip</option>
                                                        <option value="2">Location</option>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label>Zone Name</label>
                                                    <input type="text" class="form-control" name="zone"
                                                        id="zone" required value="{{ old('zone', $zone->zone) }}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="text" class="form-control" name="postal"
                                                        value="{{ old('postal', $zone->postal) }}">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Update</button>
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


    <script>
        $(document).ready(function() {

            $('#state_select').change(function() {
                var stateCode = $(this).val();

                if (stateCode) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('get-cities') }}',
                        data: {
                            state_code: stateCode
                        },
                        success: function(response) {

                            $('#city_select').empty();
                            $('#city_select').append(
                                '<option value="" disabled selected>Select City</option>');
                            $.each(response, function(index, city) {
                                $('#city_select').append('<option value="' + city.id +
                                    '">' + city.city + " - " + city.code_state +
                                    '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#city_select').empty();
                    $('#city_select').append('<option value="" disabled selected>Select City</option>');
                }
            });


        });
    </script>



</body>

</html>
