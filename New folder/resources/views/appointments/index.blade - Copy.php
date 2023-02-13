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
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">OP Patient</a>
                  </li>
				  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">IP Patient</a>
                  </li>
				  
					<div class="col-sm-5">
                   <center> <div class="nav-link">Patients List</div></center>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
					</div>
					<div class="col-sm-1">
						<td>
<button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#addPatient"><i class="fa fa-plus"></i> Add</button>
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
<th>PatientId</th>
<th>Title</th>
<th>Patient Name</th>
<th>Gender</th>
<th>Age</th>
<th>RelationName</th>
<th>RoomNo</th>
<th>Village</th>
<th>Token#</th>
<th>Fees</th>
</tr>
</thead>
<tbody>
                @foreach($manageoppatients as $key=>$manageoppatientslist)
                      <tr id="arrayorder_<?php echo $manageoppatientslist->id ?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageoppatientslist->disease_name }}</td>
						 <td><a href="" data-toggle="modal" data-target="#edit{{ $manageoppatientslist->userID }}" >{{ $manageoppatientslist->full_name }}</a></td>
				    @if($manageoppatientslist->gender == 1)
                            <td>Male</td>
                        @else
                            <td>Female</td>
                    @endif  
                        <td>{{ $manageoppatientslist->age }}</td>
                        <td>{{ $manageoppatientslist->relation_name }}</td>
                        <td>{{ $manageoppatientslist->relation_name }}</td>
                        <td>{{ $manageoppatientslist->village_id }}</td>
                        <td>HC{{ $manageoppatientslist->id }}</td>
                        <td>{{ $manageoppatientslist->fees }}</td>
                      </tr>
					  
			<div class="modal fade" id="edit{{ $manageoppatientslist->userID }}">
				<form action="{{url('/edit_patient')}}" method="post">
				{{ csrf_field() }}
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Edit Patients</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{ $manageoppatientslist->id }}"/>

        	    <div class="row">
			    <div class="col-md-6">   
	  
                <div class="form-group row">
				<label for="profile_status" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Name</label>
									
				<div class="col-sm-3 custom-file">
				<select class="form-control select2bs4" name="profile_status" id="profile_status" style="width: 100%;">
				<option value="{{ $manageoppatientslist->profile_status }}">{{ $manageoppatientslist->full_name }}</option>
				<option value="Mr">Mr</option>
				<option value="Ms">Ms</option>
				<option value="Daughter">Daughter</option>
				</select>
				</div>

				<div class="col-sm-5">
				<input  value="{{ $manageoppatientslist->full_name }}" required="required" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Patient Full Name">
				</div>
				</div>
				<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Date Of Birth</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->year }}" required="required" type="text" class="form-control" name="year" id="year" maxlength="50" placeholder="YYYY">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->month }}" required="required" type="text" class="form-control" name="month" id="month" maxlength="50" placeholder="MM">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->days }}" required="required" type="text" class="form-control" name="days" id="days" maxlength="50" placeholder="DD">
				</div>
				</div>
				<div class="form-group row">
				<label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
				<div class="col-sm-4">
				<select class="form-control select2bs4" name="gender" id="gender" style="width: 100%;" required="required">
				<option value="{{ $manageoppatientslist->gender }}">{{ $manageoppatientslist->full_name }}</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Transgender">Transgender</option>
				</select>
				</div>
				<label for="age" class="col-sm-2 col-form-label"><span style="color:red"></span>Age</label>
				<div class="col-sm-2">
				<input  value="{{ $manageoppatientslist->age }}" required="required" type="text" class="form-control" name="age" id="age" maxlength="50" placeholder="Ent">
				</div>
				</div>
				<div class="form-group row">
				<label for="relation_name" class="col-sm-4 col-form-label"><span style="color:red"></span>
					Realation Name</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->relation_name }}" required="required" type="text" class="form-control" name="relation_name" id="relation_name" maxlength="50" placeholder="Relation Name">
				</div>
				<div class="col-sm-4 custom-file">
				<select class="form-control select2bs4" name="relationship" id="relationship" style="width: 100%;" required="required">
				<option value="{{ $manageoppatientslist->relationship }}">{{ $manageoppatientslist->relationship }}</option>
				<option value="">Select RelationShip</option>
				<option value="Brother">Brother</option>
			    <option value="Brother-In-Law">Brother-In-Law</option>
				<option value="Daughter">Daughter</option>
				<option value="Father">Father</option>
				<option value="Father-In-Law">Father-In-Law</option>
				<option value="Grand Daughter">Grand Daughter</option>
				<option value="Grand Father">Grand Father</option>
				<option value="Grand Mother">Grand Mother</option>
				<option value="Grand Son">Grand Son</option>
				<option value="Husband">Husband</option>
				<option value="Mother">Mother</option>
				<option value="Mother-In-Law">Mother-In-Law</option>
				<option value="Nephew">Nephew</option>
				<option value="Niece">Niece</option>
				<option value="Sister">Sister</option>
				<option value="Sister-In-Law">Sister-In-Law</option>
				<option value="Son">Son</option>
				<option value="Spouse">Spouse</option>
				<option value="Wife">Wife</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="street" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Street</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->street }}" required="required" type="text" class="form-control" name="street" id="street" maxlength="50" placeholder="Street">
				</div>
				</div>
			    <div class="form-group row">
				<label for="locality" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Locality</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->locality }}" required="required" type="text" class="form-control" name="locality" id="locality"
				maxlength="50" placeholder="locality">
				</div>
				</div>
				<div class="form-group row">
				<label for="village_id" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Village/CityName</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->village_id }}" required="required" type="text" class="form-control" name="village_id" id="village_id"
				maxlength="50" placeholder="village City Name">
				</div>
				</label>
			    </div>
				<div class="form-group row">
				<label for="city_id" class="col-sm-4 col-form-label">
				<span style="color:red"></span>city_id	</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->city_id }}" required="required" type="text" class="form-control" name="city_id" id="city_id"
				maxlength="50" placeholder="city_id	">
				</div>
				</label>
			    </div>
				<div class="form-group row">
				<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->aadhaar_no }}" required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
				</div>
				<div class="col-sm-4 custom-file">
				<input value="{{ $manageoppatientslist->aadhaarfile }}" type="file" class="custom-file-input" name="aadhaarfile" id="aadhaarfile">
				<label class="custom-file-label" for="aadhaarfile">Choose file</label>
					</div>
				    </div>	
					  <div class="form-group row">
				<label for="mobile_number" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Contact Number</label>
				<div class="col-sm-4">
				<input  value="{{ $manageoppatientslist->mobile_number }}"required="required" type="text" class="form-control" name="mobile_number" id="mobile_number"
				maxlength="50" placeholder="Mobile Number">
				</div>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->phone }}" required="required" type="text" class="form-control" name="phone" id="phone"
				maxlength="50" placeholder="Phone Number">
				</div>
				</div>
				</div>
				<div class="col-md-6">   
				<div class="form-group row">
				<label for="blood_group" class="col-sm-4 col-form-label"><span style="color:red"></span>Blood Group</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="blood_group" id="blood_group" style="width: 100%;" required="required">
				<option value="{{ $manageoppatientslist->blood_group }}">{{ $manageoppatientslist->blood_group }}</option>
				<option value="A+">A+</option>
				<option value="A1+">A1+</option>
				<option value="A2+">A2+</option>
				<option value="A-">A-</option>
				<option value="A1-">A1-</option>
				<option value="A2-">A2-</option>
				<option value="AB+">AB+</option>
				<option value="A1B+">A1B+</option>
				<option value="A2B+">A2B+</option>
				<option value="AB-">AB-</option>
				<option value="A1B-">A1B-</option>
				<option value="A2B-">A2B-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="company" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Company</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->company }}" required="required" type="text" class="form-control" name="company" id="company" maxlength="50" placeholder="Company">
				</div>
				</div>
				<div class="form-group row">
				<label for="employe_id" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Employe Id</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->employe_id }}" required="required" type="text" class="form-control" name="employe_id" id="employe_id" maxlength="50" placeholder="Employe_id">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Disease</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="disease" id="disease" style="width: 100%;" required="required">
				<option>Blood Group</option>
				</select>
				</div>
				</div>
               <div class="form-group row">
				<label for="other_details" class="col-sm-4
				col-form-label">
				<span style="color:red"></span>Other Details</label>
				<div class="col-sm-8">
				<textarea row="3" required="required" type="text" class="form-control" name="other_details"
						id="other_details" maxlength="50" placeholder="Other Details">{{ $manageoppatientslist->other_details }}</textarea>
				</div>
				</div>
				
					</div>		
				    </div>
					</div>
					
			        </form>
                   
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>
@endforeach

</tbody>
</table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                     <table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>PatientId</th>
<th>Title</th>
<th>Patient Name</th>
<th>Gender</th>
<th>Age</th>
<th>RelationName</th>
<th>RoomNo</th>
<th>Village</th>
<th>Token#</th>
<th>Fees</th>
</tr>
</thead>
<tbody>
 @foreach($manageippatients as $key=>$manageippatientslist)
                      <tr id="arrayorder_<?php echo $manageippatientslist->id?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageippatientslist->disease_name }}</td>
						 <td><a href="" data-toggle="modal" data-target="#edit{{ $manageippatientslist->id }}" >{{ $manageippatientslist->full_name }}</a></td>
						 @if($manageippatientslist->gender == 1)
                            <td>Male</td>
                        @else
                            <td>Female</td>
                        @endif  
												
                        <td>{{ $manageippatientslist->age }}</td>
                        <td>{{ $manageippatientslist->relation_name }}</td>
                        <td>{{ $manageippatientslist->relation_name }}</td>
                        <td>{{ $manageippatientslist->village_id }}</td>
                        <td>HC{{ $manageippatientslist->id }}</td>
                        <td>{{ $manageippatientslist->fees }}</td>
                      </tr> 
					  
					  <!-- edit product start -->
                          <div class="modal fade" id="edit{{ $manageippatientslist->userID }}">
					     	<form action="{{url('/edit_user')}}" method="post">
					     	{{ csrf_field() }}
					        	<div class="modal-dialog modal-xl">
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
                                        <input type="hidden" class="form-control" name="id" value="{{ $manageippatientslist->id }}"/>
										
                                        <input type="text" class="form-control mb-3" name="full_name" value="{{ $manageippatientslist->full_name }}" placeholder="Enter Name"/>
										
                                        <input type="text" class="form-control mb-3" name="email" value="{{ $manageippatientslist->email }}" placeholder="Enter email"/>
                                        <input type="text" class="form-control mb-3" name="phone" value="{{ $manageippatientslist->phone }}" placeholder="Enter phone"/>
										<input type="text" class="form-control mb-3" value="{{ $manageippatientslist->district_id }}" name="district_id" placeholder="Enter district"/>
											 </div>	
											 <div class="col-md-6">   
                                        <input type="text" class="form-control mb-3" value="{{ $manageippatientslist->village_id }}" name="village_id" placeholder="Enter village"/>
										
										<input type="text" class="form-control mb-3" value="{{ $manageippatientslist->city_id }}" name="city_id" placeholder="Enter city"/>
				  

                                        <select name="gender" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="Mail" <?php if($manageippatientslist->gender == 1){ echo "selected"; }?>>Mail</option>
                                            <option value="Femail" <?php if($manageippatientslist->gender == 0){ echo "selected"; }?>>Femail</option>
                                        </select>
										</br>
                                        <select name="role_id" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="1" <?php if($manageippatientslist->role_id == 1){ echo "selected"; }?>>Admin</option>
                                            <option value="2" <?php if($manageippatientslist->role_id == 0){ echo "selected"; }?>>Doctor</option>
                                            <option value="3" <?php if($manageippatientslist->role_id == 0){ echo "selected"; }?>>Resaptionist</option>
                                        </select>
										</br>
                                        <select name="status" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="1" <?php if($manageippatientslist->status == 1){ echo "selected"; }?>>Active</option>
                                            <option value="0" <?php if($manageippatientslist->status == 0){ echo "selected"; }?>>Inactive</option>
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
              <!-- /.card -->
            </div>
          </div>
    </section>
    <!-- /.content -->
					



<div class="modal fade" id="addPatient">
<form action="{{url('/add_patient')}}" method="post">
		{{ csrf_field() }}
 <div class="modal-dialog modal-xl">
   <div class="modal-content">
    <div class="modal-header">
		<h4 class="modal-title">Patients Registration</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
		</button>
    </div>
        <div class="modal-body">
	    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="row">
			    <div class="col-md-6">   
                   <div class="form-group row">
				    <label for="profile_status" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Name</label>
									
				   <div class="col-sm-3 custom-file">
					  <select class="form-control select2bs4" name="profile_status" id="profile_status" style="width: 100%;" required="required">
						  <option value="">Profile Status</option>
						  <option value="Mr">Mr</option>
						  <option value="Ms">Ms</option>
						  <option value="Daughter">Daughter</option>
					   </select>
					</div>

					<div class="col-sm-5">
						<input  required="required" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Patient Full Name">
					</div>
				</div>
				<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Date Of Birth</label>
				<div class="col-sm-4">
				<input  required="required" type="text" class="form-control" name="year" id="year" maxlength="50" placeholder="YYYY">
				</div>
				<div class="col-sm-2">
				<input  required="required" type="text" class="form-control" name="month" id="month" maxlength="50" placeholder="MM">
				</div>
				<div class="col-sm-2">
				<input  required="required" type="text" class="form-control" name="date" id="date" maxlength="50" placeholder="DD">
				</div>
				</div>
				<div class="form-group row">
				<label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
				<div class="col-sm-4">
				<select class="form-control select2bs4" name="gender" id="gender" style="width: 100%;" required="required">
				<option>Select Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Transgender">Transgender</option>
				</select>
				</div>
				<label for="age" class="col-sm-2 col-form-label"><span style="color:red"></span>Age</label>
				<div class="col-sm-2">
				<input  required="required" type="text" class="form-control" name="age" id="age" maxlength="50" placeholder="Ent">
				</div>
				</div>
				<div class="form-group row">
				<label for="relation_name" class="col-sm-4 col-form-label"><span style="color:red"></span>
					Realation Name</label>
				<div class="col-sm-4">
				<input  required="required" type="text" class="form-control" name="relation_name" id="relation_name" maxlength="50" placeholder="Relation Name">
				</div>
				<div class="col-sm-4 custom-file">
				<select class="form-control select2bs4" name="relationship" id="relationship" style="width: 100%;" required="required">
				<option value="">Select RelationShip</option>
				<option value="Brother">Brother</option>
			    <option value="Brother-In-Law">Brother-In-Law</option>
				<option value="Daughter">Daughter</option>
				<option value="Father">Father</option>
				<option value="Father-In-Law">Father-In-Law</option>
				<option value="Grand Daughter">Grand Daughter</option>
				<option value="Grand Father">Grand Father</option>
				<option value="Grand Mother">Grand Mother</option>
				<option value="Grand Son">Grand Son</option>
				<option value="Husband">Husband</option>
				<option value="Mother">Mother</option>
				<option value="Mother-In-Law">Mother-In-Law</option>
				<option value="Nephew">Nephew</option>
				<option value="Niece">Niece</option>
				<option value="Sister">Sister</option>
				<option value="Sister-In-Law">Sister-In-Law</option>
				<option value="Son">Son</option>
				<option value="Spouse">Spouse</option>
				<option value="Wife">Wife</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="street" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Street</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" name="street" id="street" maxlength="50" placeholder="Street">
				</div>
				</div>
			    <div class="form-group row">
				<label for="locality" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Locality</label>
				<div class="col-sm-8">
				<input required="required" type="text" class="form-control" name="locality" id="locality"
				maxlength="50" placeholder="locality">
				</div>
				</div>
				<div class="form-group row">
				<label for="village_city_name" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Village/CityName</label>
				<div class="col-sm-8">
				<input required="required" type="text" class="form-control" name="village_city_name" id="village_city_name"
				maxlength="50" placeholder="village City Name">
				</div>
				</label>
			    </div>
				<div class="form-group row">
				<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
				<div class="col-sm-4">
				<input  required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
				</div>
				<div class="col-sm-4 custom-file">
				<input type="file" class="custom-file-input" name="aadhaarfile" id="aadhaarfile">
				<label class="custom-file-label" for="aadhaarfile">Choose file</label>
					</div>
				    </div>	
					  <div class="form-group row">
				<label for="mobile_number" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Contact Number</label>
				<div class="col-sm-4">
				<input required="required" type="text" class="form-control" name="mobile_number" id="mobile_number"
				maxlength="50" placeholder="Mobile Number">
				</div>
				<div class="col-sm-4">
				<input required="required" type="text" class="form-control" name="phone_number" id="phone_number"
				maxlength="50" placeholder="Phone Number">
				</div>
				</div>
				</div>
							    <div class="col-md-6">   

				
			  
				<div class="form-group row">
				<label for="blood_group" class="col-sm-4 col-form-label"><span style="color:red"></span>Blood Group</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="blood_group" id="blood_group" style="width: 100%;" required="required">
				<option>Blood Group</option>
				<option value="A+">A+</option>
				<option value="A1+">A1+</option>
				<option value="A2+">A2+</option>
				<option value="A-">A-</option>
				<option value="A1-">A1-</option>
				<option value="A2-">A2-</option>
				<option value="AB+">AB+</option>
				<option value="A1B+">A1B+</option>
				<option value="A2B+">A2B+</option>
				<option value="AB-">AB-</option>
				<option value="A1B-">A1B-</option>
				<option value="A2B-">A2B-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="company" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Company</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" name="company" id="company" maxlength="50" placeholder="Company">
				</div>
				</div>
				<div class="form-group row">
				<label for="employe_id" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Employe Id</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" name="employe_id" id="employe_id" maxlength="50" placeholder="Employe_id">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Disease</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="disease" id="disease" style="width: 100%;" required="required">
				<option>Blood Group</option>

				</select>
				</div>
				</div>
               <div class="form-group row">
				<label for="other_details" class="col-sm-4
				col-form-label">
				<span style="color:red"></span>Other Details</label>
				<div class="col-sm-8">
				<textarea row="3" required="required" type="text" class="form-control" name="other_details"
						id="other_details" maxlength="50" placeholder="Other Details"></textarea>
				</div>
				</div>
				
					</div>		
				    </div>
					</div>
				   
			        </form>
                   
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>

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
