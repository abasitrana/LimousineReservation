@extends('admin.layouts.header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"/>
<div class="wrapper">

@extends('admin.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="col-md-12">
            <table id="datatable">
                <thead>
                    <tr>
                        <th>Car Name</th>
                        <th>Car Make</th>
                        <th>Car Model</th>
                        <th>Car Description.</th>
                        <th>Max Persons</th>
                        <th>Max Luggage</th>
                        <th>Car Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
@extends('admin.layouts.footer')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){

});
new DataTable('#datatable', {
    ajax: '{{url('getfleetdata')}}',
    columns: [
        { data: 'car_name' },
        { data: 'car_make' },
        { data: 'car_model' },
        { data: 'car_description' },
        { data: 'max_capacity_person' },
        { data: 'max_capacity_luggage' },
        { data: 'car_picture' },
        {
                    data: null,
                    render: function (data, type, row) {
                        return '<button class="btn btn-primary" onclick="editFunction(' + data.id + ')">Edit</button>' +
                               ' <button class="btn btn-danger" onclick="deleteFunction(' + data.id + ')">Delete</button>';
                    }
                }
    ]
});
function editFunction(id) {
        // Implement your edit logic here
        window.location.href='admin/edit/fleet/'+id;
    }

    function deleteFunction(id) {
        // Implement your delete logic here
        window.location.href='admin/delete/fleet/'+id;
    }
</script>