<style type="text/css">
  #response {
  padding:10px;
  background-color:#00bc8c;
  margin:20px 0px;
}
</style>

@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Manage Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Manage Plan</li>
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
                <div  class="col-md-3"><button type="button" data-toggle="modal" data-target="#modal-default"  class="btn btn-block btn-success">Add Manage Plan</button></div>

                <div id="response"></div> 

                <table id="example2" class="table table-bordered table-hover table_sorting">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Domain Request Count</th>
                    <th style="width:20%">Description</th>
                    <th>Amount ( RM )</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($manageplan as $key=>$manageplanlist)
                      <tr id="arrayorder_<?php echo $manageplanlist->id?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageplanlist->name }}</td>
                        <td>{{ $manageplanlist->domain_req_count }}</td>
                        <td>{{ $manageplanlist->description }}</td>
                        <td>{{ $manageplanlist->amount }}</td>
                        @if($manageplanlist->status == 1)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif
                        <td>{{ $manageplanlist->created_at }}</td>
                        <td>
                            <div class="row">
                                <button type="button" data-toggle="modal" data-target="#editproduct{{ $manageplanlist->id }}"  class="col-md-6 btn btn-block btn-info"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;
                                <!-- <button type="button" data-toggle="modal" data-target="#deleteproduct{{ $manageplanlist->id }}"  class="col-md-4 btn btn-block btn-danger"><i class="fa fa-trash"></i></button> -->
                            </div>
                        </td>
                      </tr>

                      <!-- edit product start -->
                        <div class="modal fade" id="editproduct{{ $manageplanlist->id }}">
                            <form action="{{url('/edit_plan')}}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Plan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id" value="{{ $manageplanlist->id }}"/>
                                        <input type="text" class="form-control mb-3" name="name" value="{{ $manageplanlist->name }}" placeholder="Enter Plan Name"/>
                                        <input type="text" class="form-control mb-3" name="domain_req_count" value="{{ $manageplanlist->domain_req_count }}" placeholder="Enter Domain Request Count"/>
                                        <textarea rows="5" type="text" class="form-control mb-3" name="description" placeholder="Enter Description">{{ $manageplanlist->description }}</textarea>
                                        <input type="text" class="form-control mb-3" name="amount" value="{{ $manageplanlist->amount }}" placeholder="Enter Amount"/>
                                        <select name="status" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="1" <?php if($manageplanlist->status == 1){ echo "selected"; }?>>Active</option>
                                            <option value="0" <?php if($manageplanlist->status == 0){ echo "selected"; }?>>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    <!-- edit product end -->

                    <!-- delete product start -->
                      <div class="modal fade" id="deleteproduct{{ $manageplanlist->id }}">
                        <form action="{{url('/delete_plan')}}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Delete Plan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are You sure you want to delete plan...</p>
                                    <input type="hidden" class="form-control" name="id" value="{{ $manageplanlist->id }}"/>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                     </div>
                    <!-- delete product end -->

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-default">
        <form action="{{url('/add_plan')}}" method="post">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Add Plan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <input type="text" class="form-control mb-3" name="name" placeholder="Enter Plan Name"/>
                  <input type="text" class="form-control mb-3" name="domain_req_count" placeholder="Enter Domain Request Count"/>
                  <textarea rows="5" type="text" class="form-control mb-3" name="description" placeholder="Enter Description"></textarea>
                  <input type="text" class="form-control mb-3" name="amount" placeholder="Enter Amount"/>
                  <select  class="form-control mb-3" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                  </select>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </div>

  </div>
  @endsection