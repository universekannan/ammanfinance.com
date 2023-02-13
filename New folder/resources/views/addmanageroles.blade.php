@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6 col-sm-12">
            <h1>Add Manage Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Manage Roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form action="{{url('/add_roles')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="user_types_id" value="{{ $role_id }}"/>
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title"> Dashboard</h3>
                        </div>
						<?php print_r($role_id);die(); ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                          <div class="card-body">
                            <div class="form-group clearfix">
                              <label class="col-sm-6">Dashboard View</label>
                              <div class="icheck-success d-inline col-sm-3">
                                <input type="radio" name="dashboard_view"  value="1" <?php if($roles->dashboard_view == 1){ ?> checked <?php} ?>  id="radioSuccess1">
                                <label for="radioSuccess1">Yes</label>
                              </div>
							  
                              <div class="icheck-success d-inline col-sm-3">
                                <input type="radio" name="dashboard_view" value="0"  <?php if($roles->dashboard_view == 0){ ?> checked <?php} ?>   id="radioSuccess2">
                                <label for="radioSuccess2">No</label>
                              </div>
                            </div>dashboard
                          </div>
                        <!-- /.card-body -->
                      </div>
                    </div>

                      

                        


                      </div>


                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection