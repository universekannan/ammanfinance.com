@extends('layout')
@section('content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 4px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div class="content-wrapper">
   <section class="content">
    <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">All Users</a>
                  </li>

                  <div class="col-sm-5">
                   <center> <div class="nav-link">User List</div></center>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
                    </div>
                    <div class="col-sm-1">
                        <td>
<button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus"></i> Add</button>
</td>
                    </div>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <table id="example1" class="table table-bordered table-hover">
<thead>
<tr>
                    <th>UserId</th>
                    <th>User Type</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
</tr>
</thead>
<tbody>
 @foreach($manageusers as $key=>$manageuserslist)
                      <tr id="arrayorder_<?php echo $manageuserslist->id?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageuserslist->groups_name }}</td>
                         <td><a href="" data-toggle="modal" data-target="#edit{{ $manageuserslist->userID }}" >{{ $manageuserslist->full_name }}</a></td>
                        <td>{{ $manageuserslist->gender }}</td>
                        <td>{{ $manageuserslist->email }}</td>
                        <td>{{ $manageuserslist->mobile_number}}</td>
                        @if($manageuserslist->status == 1)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif     
                         <td>
                           <div class="btn-group dropdown">
<button type="button" class="btn btn-default fa fa-eye" data-toggle="dropdown">
</button>
<button type="button" class="btn btn-default">Action</button>

<div class="dropdown-content">
<a href="" data-toggle="modal" data-target="#edit{{ $manageuserslist->userID }}">Edit Profile</a>
<a href="{{url('/users/attendance/'.$manageuserslist->id)}}" > Attendance</a>
</div>
</div>
                        </td>
                         </tr>
                        <div class="modal fade" id="edit{{ $manageuserslist->userID }}">
                            <form action="{{url('/edit_user')}}" method="post">
                            {{ csrf_field() }}
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                    <h4 class="modal-title">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>

                                    <div class="modal-body">
                                      <div class="row">
                                         <div class="col-md-6">   
                                        <input type="hidden" class="form-control" name="id" value="{{ $manageuserslist->userID }}"/>
                                        
                                        <input type="text" class="form-control mb-3" name="full_name" value="{{ $manageuserslist->full_name }}" placeholder="Enter Name"/>
                                        
                                        <input type="email" class="form-control mb-3" name="email" value="{{ $manageuserslist->email }}" placeholder="Enter Email"/>
                                        
                                        <input type="text" class="form-control mb-3" name="mobile_number" value="{{ $manageuserslist->mobile_number }}" placeholder="Enter phone"/>
                                        
                                        <input type="text" class="form-control mb-3" value="{{ $manageuserslist->district_name }}" name="district_name" placeholder="Enter district"/>
                                         </div> 
                                         
                                        <div class="col-md-6">   
                                        <input type="text" class="form-control mb-3" value="{{ $manageuserslist->village_name }}" name="village_name" placeholder="Enter village"/>
                                        
                                        <input type="text" class="form-control mb-3" value="{{ $manageuserslist->city }}" name="city" placeholder="Enter city"/>
                  

                                        <select name="gender" class="form-control">
                                            <option value="Mail" <?php if($manageuserslist->gender == 1){ echo "selected"; }?>>Mail</option>
                                            <option value="Femail" <?php if($manageuserslist->gender == 0){ echo "selected"; }?>>Femail</option>
                                        </select>
                                        </br>
                                        <select name="role_id" class="form-control">
                                             @foreach($userrole as $key=>$userroleS)
                                                 <option value="{{ $userroleS->id }}" <?php if($userroleS->id == $manageuserslist->role_id){ echo "selected"; }?>>{{ $userroleS->groups_name }}</option>
                                             @endforeach
                                        </select>
                                        </br>
                                        <select name="status" class="form-control">
                                            <option value="1" <?php if($manageuserslist->status == 1){ echo "selected"; }?>>Active</option>
                                            <option value="0" <?php if($manageuserslist->status == 0){ echo "selected"; }?>>Inactive</option>
                                        </select>
                                    </div>
                                    </div>
                                    </div>
             <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
             </div>
                                </div>
                            </div>
                            </form>
                        </div>



                      @endforeach

</tbody>
</table>
                  </div>
                </div>
              </div>

<div class="modal fade" id="adduser">
<form action="{{url('/add_user')}}" method="post">
{{ csrf_field() }}
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add User</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-6">   
                  <input type="text" class="form-control mb-3" name="full_name" placeholder="full_name"/>
                  <input type="email" class="form-control mb-3" name="email" placeholder="Email"/>

                  <input type="text" class="form-control mb-3" name="Password" placeholder="Password"/>

                  <select  class="form-control mb-3" name="gender">
                      <option value="">Select</option>
                      <option value="Mail">Mail</option>
                      <option value="Femail">Femail</option>
                  </select>
                  <input type="text" class="form-control mb-3" name="mobile_number" placeholder="Enter Phone"/>

                </div>
                <div class="col-md-6">   
                  <input type="text" class="form-control mb-3" name="district_name" placeholder="Enter District"/>
                  <input type="text" class="form-control mb-3" name="village_name" placeholder="Enter village"/>
                  <input type="text" class="form-control mb-3" name="city" placeholder="Enter City"/>

                  <select  class="form-control mb-3" name="role_id">
                      <option value="">Select</option>
                   @foreach($userrole as $key=>$userrole)
                      <option value="{{ $userrole->id }}">{{ $userrole->groups_name }}</option>
                  @endforeach
                  </select>
                  <select class="form-control mb-3" name="status">
                      <option value="">Select</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                  </select>
                </div>      
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>
</div>
</div>
 </form>
</div>
                      
    
              <!-- /.card -->
            </div>
          </div>
    </section>
    <!-- /.content -->
 

  </div>
@endsection



<script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
function myFunction() {
  const input = document.getElementById("myInput");
  const inputStr = input.value.toUpperCase();
  document.querySelectorAll('#example2 tr:not(.header)').forEach((tr) => {
    const anyMatch = [...tr.children]
      .some(td => td.textContent.toUpperCase().includes(inputStr));
    if (anyMatch) tr.style.removeProperty('display');
    else tr.style.display = 'none';
  });
}
</script>
