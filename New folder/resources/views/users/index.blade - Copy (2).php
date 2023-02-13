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
        <div class="col-12">
          <div class="form-group row">									
					<div class="col-sm-2 custom-file">
						<select class="form-control select2bs4" id="myInput" onkeyup="myFunction()" style="width: 100%;">
							<option value="">OP / select</option>
							<option value="OP">OP</option>
							<option value="IP">IP</option>
						</select>
					</div>
					<div class="col-sm-4">
					<input  required="required" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Customer Full Name">
					</div>
					<div class="col-sm-1">
					   <td>
                         <button type="button" class="btn btn-block btn-secondary"> Search</button>
                       </td>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
					</div>
					<div class="col-sm-1">
						<td>
                            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add</button>
                        </td>
				    </div>
				    </div>
					<table id="example2" class="table table-bordered table-hover">
					<thead>
					<tr>
					<th>UserId</th>
					<th>User Type</th>
					<th>Full Name</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Status</th>
					</tr>
					</thead>
					<tbody>
					 @foreach($manageusers as $key=>$manageuserslist)
                      <tr id="arrayorder_<?php echo $manageuserslist->id?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageuserslist->role_id }}</td>
                        <td><a href="" data-toggle="modal" data-target="#editproduct{{ $manageuserslist->id }}" >{{ $manageuserslist->full_name }}</a></td>
                        <td>{{ $manageuserslist->gender }}</td>
                        <td>{{ $manageuserslist->email }}</td>
                        <td>{{ $manageuserslist->phone }}</td>
                        @if($manageuserslist->status == 1)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif                       
                      </tr>
					  
					   <!-- edit product start -->
                        <div class="modal fade" id="editproduct{{ $manageuserslist->id }}">
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
                                        <input type="hidden" class="form-control" name="id" value="{{ $manageuserslist->id }}"/>
										
                                        <input type="text" class="form-control mb-3" name="full_name" value="{{ $manageuserslist->full_name }}" placeholder="Enter Name"/>
										
                                        <input type="text" class="form-control mb-3" name="email" value="{{ $manageuserslist->email }}" placeholder="Enter email"/>
                                        <input type="text" class="form-control mb-3" name="phone" value="{{ $manageuserslist->phone }}" placeholder="Enter phone"/>
										
										<input type="text" class="form-control mb-3" value="{{ $manageuserslist->district_id }}" name="district_id" placeholder="Enter district"/>
										<input type="text" class="form-control mb-3" value="{{ $manageuserslist->village_id }}" name="village_id" placeholder="Enter village"/>
										<input type="text" class="form-control mb-3" value="{{ $manageuserslist->city_id }}" name="city_id" placeholder="Enter city"/>
				  

                                        <select name="gender" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="Mail" <?php if($manageuserslist->gender == 1){ echo "selected"; }?>>Mail</option>
                                            <option value="Femail" <?php if($manageuserslist->gender == 0){ echo "selected"; }?>>Femail</option>
                                        </select>
										</br>
                                        <select name="role_id" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="1" <?php if($manageuserslist->role_id == 1){ echo "selected"; }?>>Admin</option>
                                            <option value="2" <?php if($manageuserslist->role_id == 0){ echo "selected"; }?>>Doctor</option>
                                            <option value="3" <?php if($manageuserslist->role_id == 0){ echo "selected"; }?>>Resaptionist</option>
                                        </select>
										</br>
                                        <select name="status" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="1" <?php if($manageuserslist->status == 1){ echo "selected"; }?>>Active</option>
                                            <option value="0" <?php if($manageuserslist->status == 0){ echo "selected"; }?>>Inactive</option>
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
					   @endforeach
					 </tbody>
				  </table>
				</div>
			 </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
<div class="modal fade" id="modal-default">
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
                  <input type="text" class="form-control mb-3" name="full_name" placeholder="full_name"/>
				  
                  <input type="email" class="form-control mb-3" name="email" placeholder="email"/>
				  
				  <input type="text" class="form-control mb-3" name="phone" placeholder="Enter phone"/>
				  <input type="text" class="form-control mb-3" name="district_id" placeholder="Enter district"/>
				  <input type="text" class="form-control mb-3" name="village_id" placeholder="Enter village"/>
				  <input type="text" class="form-control mb-3" name="city_id" placeholder="Enter city"/>
				  
                  <select  class="form-control mb-3" name="gender">
                      <option value="Mail">Mail</option>
                      <option value="Femail">Femail</option>
                  </select>
				  <select  class="form-control mb-3" name="role_id">
                      <option value="1">Admin</option>
                      <option value="2">Doctor</option>
                      <option value="3">Resaptionist</option>
                  </select>
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

<script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
