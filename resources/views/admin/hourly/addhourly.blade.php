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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                        Add Hourly Package
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

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif


                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">
                                            <form method="POST" action="{{ url('admin/addhourly') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Package Name</label>
                                                    <input type="text" name="package_name" value=""
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Package Description</label>
                                                    <input type="text" name="package_description"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Car</label>
                                                    <select name="car_id" class="form-control">
                                                        @foreach ($cars as $car)
                                                            <option value="{{ $car->id }}">{{ $car->car_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Default Hours</label>
                                                    <input type="number" min="1" value="3"
                                                        name="default_hours" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Base Fare</label>
                                                    <input type="number" min="1" name="hourly_rate"
                                                        class="form-control" required>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header-tab-animation card-header">
                                    <div class="card-header-title">
                                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                        Add Extra Hourly Prices
                                    </div>
                                </div>
                                <div id="hourlySlabsMessage">

                                </div>

                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">
                                            <form method="POST" action="{{ url('admin/addhourly') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div id="inputFieldsContainer" class="form-group">

                                                    <button type="button" id="addInputField"
                                                        class="btn btn-primary pull-right mb-3">Add Hourly
                                                        Price</button>
                                                </div>


                                            </form>

                                            <button type="button" id="addExtraHourlyInfo" class="btn btn-primary">Add
                                                Extra Hourly
                                                Prices</button>

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
    <script src="{{ asset('assets/js/plugin.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();


            var inputFieldCounter = 1;


            function addInputField() {
                var inputFieldHtml = '<div class="input-field">' +
                    '<input type="text" class="form-control mb-2" name="hourly_slaps[]" placeholder="Hourly Slabs ' +
                    inputFieldCounter + '">' +
                    '<input type="number" class="form-control" name="extra_hourly_rate[]" placeholder="Hourly Price ' +
                    inputFieldCounter + '">' +
                    '<button class="removeInputField btn btn-primary pull-right mt-3 mb-3">Remove</button>' +
                    '</div>';

                $('#inputFieldsContainer').append(inputFieldHtml);
                inputFieldCounter++;

                updateButtonState();
            }

            function updateButtonState() {
                var button = $('#addExtraHourlyInfo');
                var inputFields = $('#inputFieldsContainer .input-field');
                if (inputFields.length > 0) {
                    button.prop('disabled', false);
                } else {
                    button.prop('disabled', true);
                }
            }

            $(document).on('click', '.removeInputField', function() {
                $(this).parent('.input-field').remove();
                updateButtonState();
            });

            $('#addInputField').on('click', function() {
                addInputField();
            });

            updateButtonState();


            $("#addExtraHourlyInfo").on("click", function(event) {
                event.preventDefault();


                var inputFields = $(
                    '#inputFieldsContainer input[type="text"], #inputFieldsContainer input[type="number"]'
                );
                var isEmpty = false;
                inputFields.each(function() {
                    if ($(this).val().trim() === '') {
                        isEmpty = true;
                        return false;
                    }
                });

                if (isEmpty) {

                    var errorMsg = '<p class="alert alert-danger">1 or more Fields are required!</p>';
                    $("#hourlySlabsMessage").html(errorMsg);
                    return;
                }

                var formData = $("#inputFieldsContainer").find(
                    'input[name="hourly_slaps[]"], input[name="extra_hourly_rate[]"]').serialize();

                $.ajax({
                    type: "post",
                    url: "{{ route('admin.getSlabsData') }}",
                    data: {
                        "_token": '{{ csrf_token() }}',
                        "data": formData
                    },
                    dataType: "json",
                    success: function(response) {
                        var successMsg = '<p class="alert alert-success">' + response.message +
                            '</p>';
                        $("#hourlySlabsMessage").html(successMsg);
                    },
                    error: function(xhr, status, error) {

                        console.error(xhr.responseText);
                        var errorMsg = '<p class="alert alert-danger">' + xhr.responseText +
                            '</p>';
                        $("#hourlySlabsMessage").html(errorMsg);
                    }
                });
            });
        });
    </script>

</body>

</html>
