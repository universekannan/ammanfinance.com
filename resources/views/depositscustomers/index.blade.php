@extends('layout')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="card card-primary card-outline card-outline-tabs">
         <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">All Customers</a>
               </li>
               <div class="col-sm-5">
                  <center>
                     <div class="nav-link">Gold Loans Customers List</div>
                  </center>
               </div>
               <div class="col-sm-4" style="padding-top: calc(.5rem + 0px);">
                  <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
               </div>
               <div class="col-sm-1" style="padding-top: calc(.5rem + 0px);">
                  <td>
                     <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-plus"> </i> Add</button>
                  </td>
               </div>
            </ul>
         </div>
         <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable">
               <a href="#" style="color:white !important" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong> {{ session('success') }} </strong>
            </div>
            @endif
             @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissable">
               <a href="#" style="color:white !important" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong> {{ session('error') }} </strong>
            </div>
            @endif
            <div class="tab-content" id="custom-tabs-four-tabContent">
               <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  <table id="myTable" class="table table-bordered table-hover">
				 <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->

                     <thead>
                        <tr>
                           <th>#ID</th>
                           <th>Full Name</th>
                           <th>Gender</th>
                           <th>Age</th>
                           <th>Phone</th>
                           <th>Id Proof</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        @foreach($managedepositscustomers as $key=>$managedepositscustomerslist)
                        <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>{{ $managedepositscustomerslist->full_name }}</td>
						   @if($managedepositscustomerslist->gender == 1)
                           <td>Male</td>
                           @else
                           <td>Female</td>
                           @endif

                           <td>{{ $managedepositscustomerslist->age }}</td>
                           <td>{{ $managedepositscustomerslist->mobile_number }}</td>
                           <td>{{ $managedepositscustomerslist->id_proof }}</td>
                           @if($managedepositscustomerslist->status == 1)
                           <td>Active</td>
                           @else
                           <td>Inactive</td>
                           @endif
                           <td>
                              <a class="btn btn-default btn-outline-danger btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#View{{ $managedepositscustomerslist->id }}"> View</a>
                              <a class="btn btn-default btn-outline-danger btn-xs fa fa-edit" href="" data-toggle="modal" data-target="#Edit{{ $managedepositscustomerslist->id }}"> Edit</a>
                              <div class="modal fade" id="Edit{{ $managedepositscustomerslist->id }}">
                                 <form action="{{url('/edit_customer')}}" method="post" enctype="multipart/from-data">
                                    {{ csrf_field() }}
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Edit Customer</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <input type="hidden" class="form-control" name="id" value="{{ $managedepositscustomerslist->id }}"/>
                                                   <input value="{{ $managedepositscustomerslist->full_name }}" type="text"  class="form-control mb-3" name="full_name" placeholder="Full Name"/>
                                                   <input value="{{ $managedepositscustomerslist->mobile_number }}" type="text"  class="form-control mb-3" name="mobile_number" placeholder="Mobile Number"/>
                                                   <input value="{{ $managedepositscustomerslist->id_proof }}" type="text" class="form-control mb-3" name="id_proof" placeholder="Id Proof"/>
                                                   <select name="gender" class="form-control">
                                                      <option value="Male" <?php if($managedepositscustomerslist->gender == 1){ echo "selected"; }?>>Male</option>
                                                      <option value="Female" <?php if($managedepositscustomerslist->gender == 2){ echo "selected"; }?>>Female</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-6">
                                                   <select name="status" class="form-control mb-3">
                                                      <option value="1" <?php if($managedepositscustomerslist->status == 1){ echo "selected"; }?>>Active</option>
                                                      <option value="0" <?php if($managedepositscustomerslist->status == 0){ echo "selected"; }?>>Inactive</option>
                                                   </select>
                                                   <input value="{{ $managedepositscustomerslist->age }}" type="text" class="form-control mb-3" name="age" id="resultBday" placeholder="Age"/>
                                                   <textarea name='address' class="form-control" rows="3" placeholder="Enter Address..." >{{ $managedepositscustomerslist->address }}</textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                             <button type="submit" id="save" class="btn btn-primary">Submit</button>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="modal fade" id="View{{ $managedepositscustomerslist->id }}">
									<form action="{{url('/activation')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-dialog">
                                           <input type="hidden" class="form-control" name="customer_id" value="{{ $managedepositscustomerslist->id }}"/>
												
												
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title">View Gold Loans Customers</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <input type="hidden" class="form-control" name="id" value="{{ $managedepositscustomerslist->id }}"/>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Accound ID</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>AF{{ $managedepositscustomerslist->id }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Full Name</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositscustomerslist->full_name }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
                                                @if($managedepositscustomerslist->status == 1)
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>Male</label>
                                                @else
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>Female</label>
                                                @endif
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Age</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositscustomerslist->age }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>ID Proof</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositscustomerslist->id_proof }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositscustomerslist->mobile_number }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Address</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositscustomerslist->address }}</label>
                                             </div>
											 <form action="{{url('/activation')}}" method="post" enctype="multipart/from-data">
                                              <input type="hidden" class="form-control" name="id" value="{{ $managedepositscustomerslist->id }}"/>
												   
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<a href="{{url('/depositsactivation')}}/{{ $managedepositscustomerslist->id }}" class="btn btn-primary">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         </form>
      </div>
      <div class="modal fade" id="addCustomer">
         <form action="{{url('/add_depositcustomer')}}" method="post" enctype="multipart/from-data">
            {{ csrf_field() }}
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Add Customer</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text"  class="form-control mb-3" name="full_name" placeholder="Full Name"/>
                           <input type="text"  class="form-control mb-3" name="mobile_number" placeholder="Mobile Number"/>
                           <input type="text" class="form-control mb-3" name="id_proof" placeholder="Id Proof"/>
                           <select  class="form-control mb-3" name="gender">
                              <option>Select Gender</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                           </select>
                        </div>
                        <div class="col-md-6">   
                           <input type="text" class="form-control mb-3" name="age" id="resultBday" placeholder="Age"/>
                           <textarea name='address' class="form-control" rows="3" placeholder="Enter Address..." ></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" id="save" class="btn btn-primary">Submit</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
</div>
</div>
</section>
<!-- /.content -->
</div>
@endsection

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>