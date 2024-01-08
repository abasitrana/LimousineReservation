@extends('admin.layouts.header')
<div class="wrapper">

{{-- @extends('admin.layouts.sidebar') --}}
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
            <form method="POST" action="{{url('admin/add/fleet')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Car Name</label>
                  <input type="text" name="car_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Car Make</label>
                    <input type="text" name="car_make" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Car Model</label>
                    <input type="text" name="car_model" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Car Description</label>
                    <input type="text" name="car_description" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Max Capacity Persons</label>
                    <input type="number" min="1" name="max_capacity_person" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Max Capacity Luggage</label>
                    <input type="number" min="1" name="max_capacity_luggage" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Car Picture</label>
                    <input type="file" name="car_picture" class="form-control" required>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
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
