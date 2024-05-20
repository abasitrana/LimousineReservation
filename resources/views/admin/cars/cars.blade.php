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

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs-eg-77">
                                            <table id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Registration</th>
                                                        <th>Description</th>
                                                        <th>Category</th>
                                                        <th>Base Fare</th>
                                                        <th>Capacity</th>
                                                        <th>Luggage</th>
                                                        <th>Action</th>
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
    <script src="https://maps.google.com/maps/api/js"></script>
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

    });
    new DataTable('#datatable', {
        ajax: '{{ url('admin/carsdata') }}',
        columns: [{
                data: 'car_name'
            },
            {
                data: 'car_registration_number'
            },
            {
                data: 'car_description'
            },
            {
                data: 'car_category.category_name'
            },
            {
                data: 'car_base_fare'
            },
            {
                data: 'max_capacity'
            },
            {
                data: 'max_luggage'
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
        if (confirm('Are you sure you want to delete this item?')) {
            window.location.href = 'delete/car/' + id;

        }
    }
</script>