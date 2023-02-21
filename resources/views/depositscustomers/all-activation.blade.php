@extends('layout')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="card card-primary card-outline card-outline-tabs">
         <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
               <div class="col-sm-6">
                  <center>
				  Gold Loans All Activations List
                  </center>
               </div>
               <div class="col-sm-4" style="padding-top: calc(.5rem + 0px);">
                  <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
               </div>
               <div class="col-sm-1" style="padding-top: calc(.5rem + 0px);">
                  <td>
                     <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#addactivation"><i class="fa fa-plus"> </i> Add</button>
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
			 <table id="example2" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>#ID</th>
                           <th>Page ID</th>
                           <th>Item Name</th>
                           <th>Measurement</th>
                           <th>Credit Amount</th>
                           <th>Interest</th>
                           <th>From Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
 @foreach($managedepositsactivations as $key=>$managedepositsactivationlist)
                        <tr>

                           <td>{{ $key + 1 }}</td>
                           <td>{{ $managedepositsactivationlist->page_number }}</td>
                           <td>{{ $managedepositsactivationlist->item_name }}</td>
                           <td>{{ $managedepositsactivationlist->measurement }}</td>
                           <td>{{ $managedepositsactivationlist->credit_amount }}</td>
                           <td>{{ $managedepositsactivationlist->intrest }}</td>
                           <td>{{ $managedepositsactivationlist->from_date }}</td>

                           <td>
                              <a class="btn btn-default btn-outline-danger btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#View{{ $managedepositsactivationlist->id }}"> View</a>
                              <a class="btn btn-default btn-outline-danger btn-xs fa fa-edit" href="" data-toggle="modal" data-target="#Edit{{ $managedepositsactivationlist->id }}"> Edit</a>
                            
 </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>        
	</div>
</section>
<!-- /.content -->
</div>
<div class="modal fade" id="addactivation">
         <form action="{{url('/add_activation')}}" method="post" enctype="multipart/from-data">
            {{ csrf_field() }}
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Add Activation</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-6">   
         <input type="hidden" class="form-control" name="id" value=""/>
         <input type="hidden" class="form-control" name="customer_id" value=""/>

                          <input type="text"  class="form-control mb-3" name="page_number" placeholder="Page Number"/>

                          <input type="text" class="form-control mb-3" name="things" placeholder="Things"/>
                        
                          <input type="text"  class="form-control mb-3" name="things_type" placeholder="Things Type"/>

                     </div>
                    <div class="col-md-6">   
                    <input type="text"  class="form-control mb-3" name="measurement" placeholder="Measurement"/>
                     <input type="text"  class="form-control mb-3" name="credit_amount" placeholder="Credit Amount"/>
                                          
                    <input type="text"  class="form-control mb-3" name="from_date" placeholder="From Bate"/>
                    <div class="custom-file">
<input type="file" class="custom-file-input" id="customFile">
<label class="custom-file-label" for="customFile">Things file</label>
</div>
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
@endsection
