<!DOCTYPE html>
<html lang="en">

<head>
    {{-- ... (Your head content) ... --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
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

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">
                                            <table id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Car Name</th>
                                                        <th>Hourly Package Name</th>
                                                        <th>Booking Date</th>
                                                        <th>Booking Time</th>
                                                        <th>Total Fare</th>
                                                        <th>Luggage Count</th>
                                                        <th>Person Count</th>
                                                        <th>Total Count</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                            </table>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

    });
    new DataTable('#datatable', {
        ajax: '{{ url('admin/bookingdata') }}',
        columns: [{
                data: 'cars.car_name'
            },
            {
                data: 'hourly_package.package_name'
            },
            {
                data: 'datepicker'
            },
            {
                data: 'timepicker'
            },
            {
                data: 'total_price'
            },
            {
                data: 'luggage_count'
            },
            {
                data: 'person_count'
            },
            {
                data: 'total_price'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn btn-primary" onclick="editFunction(' + data.id +
                        ')">Edit</button>' +
                        ' <button class="btn btn-danger" onclick="deleteFunction(' + data.id +
                        ')">Delete</button>';
                }
            }
        ]
    });

    function editFunction(id) {
        // Implement your edit logic here
        window.location.href = 'editcars/' + id;
    }

    function deleteFunction(id) {
        // Implement your delete logic here
        window.location.href = 'admin/delete/fleet/' + id;
    }
</script>
