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
               <div class="col-sm-4"></div>
                <!--<div class="col-sm-4" style="padding-top: calc(.5rem + 0px);">
                  <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
               </div>-->
               <div class="col-sm-1" style="padding-top: calc(.5rem + 0px);">
                  <td>
                     <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-plus"> </i> Add</button>
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
            <div class="tab-content" id="custom-tabs-four-tabContent">
               <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
				 <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
<table id="example1" class="table table-bordered table-striped">

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
                        @foreach($managecustomers as $key=>$managecustomerslist)
                        <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>{{ $managecustomerslist->full_name }}</td>
						   @if($managecustomerslist->gender == 1)
                           <td>Male</td>
                           @else
                           <td>Female</td>
                           @endif

                           <td>{{ $managecustomerslist->age }}</td>
                           <td>{{ $managecustomerslist->mobile_number }}</td>
                           <td>{{ $managecustomerslist->id_proof }}</td>
                           @if($managecustomerslist->status == 1)
                           <td>Active</td>
                           @else
                           <td>Inactive</td>
                           @endif
                           <td>
                              <a class="btn btn-default btn-outline-info btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#View{{ $managecustomerslist->id }}"> View</a>
                              <a class="btn btn-default btn-outline-primary btn-xs fa fa-edit" href="" data-toggle="modal" data-target="#Edit{{ $managecustomerslist->id }}"> Edit</a>
                              <div class="modal fade" id="Edit{{ $managecustomerslist->id }}">
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
                                                   <input type="hidden" class="form-control" name="id" value="{{ $managecustomerslist->id }}"/>
                                                   <input value="{{ $managecustomerslist->full_name }}" type="text"  class="form-control mb-3" name="full_name" placeholder="Full Name"/>
                                                   <input value="{{ $managecustomerslist->mobile_number }}" type="text"  class="form-control mb-3" name="mobile_number" placeholder="Mobile Number"/>
                                                   <input value="{{ $managecustomerslist->id_proof }}" type="text" class="form-control mb-3" name="id_proof" placeholder="Id Proof"/>
                                                   <select name="gender" class="form-control">
                                                      <option value="Male" <?php if($managecustomerslist->gender == 1){ echo "selected"; }?>>Male</option>
                                                      <option value="Female" <?php if($managecustomerslist->gender == 2){ echo "selected"; }?>>Female</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-6">
                                                   <select name="status" class="form-control mb-3">
                                                      <option value="1" <?php if($managecustomerslist->status == 1){ echo "selected"; }?>>Active</option>
                                                      <option value="0" <?php if($managecustomerslist->status == 0){ echo "selected"; }?>>Inactive</option>
                                                   </select>
                                                   <input value="{{ $managecustomerslist->age }}" type="text" class="form-control mb-3" name="age" id="resultBday" placeholder="Age"/>
                                                   <textarea name='address' class="form-control" rows="3" placeholder="Enter Address..." >{{ $managecustomerslist->address }}</textarea>
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
                              <div class="modal fade" id="View{{ $managecustomerslist->id }}">
									<form action="{{url('/activation')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-dialog">
                                           <input type="hidden" class="form-control" name="customer_id" value="{{ $managecustomerslist->id }}"/>
												
												
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title">View Gold Loans Customers</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <input type="hidden" class="form-control" name="id" value="{{ $managecustomerslist->id }}"/>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Accound ID</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>AF{{ $managecustomerslist->id }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Full Name</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managecustomerslist->full_name }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
                                                @if($managecustomerslist->status == 1)
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>Male</label>
                                                @else
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>Female</label>
                                                @endif
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Age</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managecustomerslist->age }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>ID Proof</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managecustomerslist->id_proof }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managecustomerslist->mobile_number }}</label>
                                             </div>
                                             <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Address</label>
                                                <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managecustomerslist->address }}</label>
                                             </div>
											 <form action="{{url('/activation')}}" method="post" enctype="multipart/from-data">
                                              <input type="hidden" class="form-control" name="id" value="{{ $managecustomerslist->id }}"/>
												   
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<a href="{{url('/activation')}}/{{ $managecustomerslist->id }}" class="btn btn-primary">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

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
         <form action="{{url('/add_customer')}}" method="post" enctype="multipart/from-data">
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
