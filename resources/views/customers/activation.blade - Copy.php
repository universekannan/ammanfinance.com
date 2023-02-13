@extends('layout')
@section('content')
<div class="content-wrapper">
<section class="content">
   <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
         <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <div class="col-sm-6">
               <center>
                  @foreach($managecustomer as $key=>$managecustomerlist)
                  <div class="nav-link">{{ $managecustomerlist->full_name }} Gold Loans  Activation</div>
                  @endforeach
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
                  <th>Interest Amount</th>
                  <th>From Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($manageactivation as $key=>$manageactivationlist)
               <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $manageactivationlist->page_number }}</td>
                  <td>{{ $manageactivationlist->item_name }}</td>
                  <td>{{ $manageactivationlist->measurement }}</td>
                  <td>{{ $manageactivationlist->credit_amount }}</td>
                  <td>{{ $manageactivationlist->intrest }}</td>
                  <td>{{ $manageactivationlist->intrestamount }}</td>
                  <td>{{ $manageactivationlist->from_date }}</td>
                  <td>
                     <a class="btn btn-default btn-outline-danger btn-xs fa fa-edit" href="" data-toggle="modal" data-target="#Edit{{ $manageactivationlist->id }}"> Edit</a>


                     <a class="btn btn-default btn-outline-danger btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#View{{ $manageactivationlist->id }}"> View</a>

                     <a class="btn btn-default btn-outline-danger btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#delete{{ $manageactivationlist->id }}"> Delete</a>


                     <div class="modal fade" id="Edit{{ $manageactivationlist->id }}">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">Edit Activation : 
                                    @foreach($managecustomer as $key=>$managecustomerlist)
                                    {{ $managecustomerlist->full_name }},  
                                    @endforeach
                                    {{ $manageactivationlist->item_name }},
                                    {{ $manageactivationlist->item_details }},
                                    {{ $manageactivationlist->measurement }}
                                 </h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form enctype="multipart/from-data" action="{{url('/edit_activation')}}" onsubmit="return validate_amount(event,{{ $manageactivationlist->id }})" method="post" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                       <input type="hidden" class="form-control" name="id" value="{{ $manageactivationlist->id }}"/>
                                       <div class="col-md-6">   
                                          @foreach($managecustomer as $key=>$managecustomerlist)
                                          <input type="hidden" class="form-control" name="customer_id" value="{{ $managecustomerlist->id }}"/>
                                          @endforeach
                                          @foreach($manageinterest as $key=>$manageinterestlist)
                                          <input type="hidden" class="form-control" name="intrest" value="{{ $manageinterestlist->interest_value }}"/>
                                          @endforeach
                                          <input value="{{ $manageactivationlist->page_number }}" type="text"  class="form-control mb-3" name="page_number" placeholder="Page Number"/>
                                          <input value="{{ $manageactivationlist->item_name }}" type="text" class="form-control mb-3" name="item_name" placeholder="Item Name"/>
                                          <textarea name='item_details' class="form-control" rows="3" placeholder="Enter Item Details..." >{{ $manageactivationlist->item_details }}</textarea>
                                       </div>
                                       <div class="col-md-6">
                                          <input value="{{ $manageactivationlist->measurement }}" type="text"  class="form-control mb-3" name="measurement" placeholder="Measurement"/>
                                          @if($manageactivationlist->from_date == $thistime = date('Y-m-d') )
                                          <input value="{{ $manageactivationlist->from_date }}" type="date"  class="form-control mb-3" name="from_date" placeholder="From Date"/>
                                          @else
                                          <input value="{{ $manageactivationlist->from_date }}" type="hidden" name="from_date" />
                                          @endif
                                          <input value="{{ $manageactivationlist->credit_amount }}" type="text"  class="form-control mb-3" name="credit_amount" placeholder="Credit Amount"/>
                                          <div class="custom-file">
                                             <input type="file" class="custom-file-input" id="customFile">
                                             <label class="custom-file-label" for="customFile">Things file</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       <button type="submit" id="save" class="btn btn-primary">Submit</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal fade" id="View{{ $manageactivationlist->id }}">
                        <div class="modal-dialog modal-xl">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">View Activation : 
                                    @foreach($managecustomer as $key=>$managecustomerlist)
                                    {{ $managecustomerlist->full_name }},  
                                    @endforeach
                                    {{ $manageactivationlist->item_name }},
                                    {{ $manageactivationlist->item_details }},
                                    {{ $manageactivationlist->measurement }}
                                 </h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form enctype="multipart/from-data" action="{{url('/add_activationdetails')}}" onsubmit="return validate_amount(event,{{ $manageactivationlist->id }})" method="post" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                       <div class="col-md-6">
                                          <center>Page Number</center>
                                          <hr>
                                          <img  src="{!! asset('dist/img/AdminLTELogo.png') !!}" alt="HC" height="500" width="500">
                                       </div>
                                       <div class="col-md-6">
                                          <input type="hidden" class="form-control" name="activation_id" value="{{ $manageactivationlist->id }}"/>
                                          <input type="hidden" class="form-control" name="customer_id" value="{{ $manageactivationlist->customer_id }}"/>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Credit Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly id="creditamount{{ $manageactivationlist->id }}" value="{{ $manageactivationlist->credit_amount }}" type="text"  class="form-control" name="credit_amount" placeholder="Credit Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>From Date</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ $manageactivationlist->from_date }}" type="text"  class="form-control" name="from_date" placeholder="From Date"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Current Date</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ $thisdate = date('Y-m-d'); }}" type="text"  class="form-control" name="current_date" placeholder="Current Date"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest %</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ $manageactivationlist->intrest }}" type="text"  class="form-control" name="intrest" placeholder="Intrest"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ $manageactivationlist->intrestamount }}" type="text" id="interestamount{{ $manageactivationlist->id }}"  class="form-control" name="intrest_amount" placeholder="Intrest Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label Decimal"><span style="color:red"></span>Total Amount</label>
                                             <div class="col-sm-8">
                                                <input value="{{ floatval($manageactivationlist->credit_amount) + floatval($manageactivationlist->intrestamount) }}" name="total_amount" id="total_amount{{ $manageactivationlist->id }}" type="text" class="form-control"  placeholder="Total Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label Decimal"><span style="color:red"></span>Pay Amount</label>
                                             <div class="col-sm-8">
                                                <input onkeyup="calculate_amount(event,{{ $manageactivationlist->id }})" autofocus id="payamount{{ $manageactivationlist->id }}" type="text"  class="form-control" name="pay_amount" placeholder="Pay Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label style="color:red;font-weight:bold" id="warningmessage{{ $manageactivationlist->id }}" class="col-sm-12 col-form-label"></label>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Balance Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly id="balanceamount{{ $manageactivationlist->id }}" type="text"  class="form-control" name="balance_amount" placeholder="Balance Amount"/>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       <button type="submit" id="save" class="btn btn-primary">Submit</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal fade" id="delete{{ $manageactivationlist->id }}">
                      <form action="{{url('/deleteactivation')}}" method="post" enctype="multipart/from-data">
                        {{ csrf_field() }}
                        <div class="modal-dialog modal-xl">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">Activation : 
                                    @foreach($managecustomer as $key=>$managecustomerlist)
                                    {{ $managecustomerlist->full_name }},  
                                    @endforeach
                                    {{ $manageactivationlist->item_name }},
                                    {{ $manageactivationlist->item_details }},
                                    {{ $manageactivationlist->measurement }}
                                 </h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <center>Page Number</center>
                                       <hr>
                                       <img  src="{!! asset('dist/img/AdminLTELogo.png') !!}" alt="HC" height="500" width="500">
                                    </div>
                                    <div class="col-md-6">

                                      <input type="hidden" class="form-control" name="id" value="{{ $manageactivationlist->id }}"/>

                                      <input type="hidden" class="form-control" name="customer_id" value="{{ $manageactivationlist->customer_id }}"/>

                                      <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Credit Amount</label>
                                       <label for="email" id="creditamount{{ $manageactivationlist->id }} class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $manageactivationlist->credit_amount }}</label>

                                    </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>From Date</label>
                                       <label for="email" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $manageactivationlist->from_date }}</label>

                                    </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Current Date</label>
                                       <label for="email" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $thisdate = date('Y-m-d'); }}</label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest %</label>
                                       <label for="intrest" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $manageactivationlist->intrest }} %</label>

                                    </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest Amount</label>
                                       <label for="email" id="interestamount{{ $manageactivationlist->id }}" class="col-sm-4 col-form-label"><span style="color:red"></span>{{ $manageactivationlist->intrestamount }}</label>


                                    </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label Decimal"><span style="color:red"></span>Total Amount</label>
                                       <label for="email" class="col-sm-8 col-form-label Decimal"><span style="color:red"></span>Total Amount</label>

                                    </div>
                                 </br>
                              </br>
                           </br>
                        </br>
                        <center><h1 class="modal-title">Are you sure Delete </h1></br>
                           <button type="submit" id="save" class="btn btn-primary">Delete</button>
                        </center>

                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
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
</section>
<!-- /.content -->
</div>
<div class="modal fade" id="addactivation">

<form action="{{url('/add_activation')}}" method="post" enctype="multipart/from-data">
  @csrf
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
                  @foreach($managecustomer as $key=>$managecustomerlist)
                  <input type="hidden" class="form-control" name="customer_id" value="{{ $managecustomerlist->id }}"/>
                  @endforeach
                  @foreach($manageinterest as $key=>$manageinterestlist)
                  <input type="hidden" class="form-control" name="intrest" value="{{ $manageinterestlist->interest_value }}"/>
                  @endforeach
                  <input type="hidden" class="form-control" name="id" value=""/>
                  <input type="text"  class="form-control mb-3" name="page_number" placeholder="Page Number"/>
                  <input type="text" class="form-control mb-3" name="item_name" placeholder="Item Name"/>
                  <textarea name='item_details' class="form-control" rows="3" placeholder="Enter Item Details..." ></textarea>
               </div>
               <div class="col-md-6">
                  <input type="text"  class="form-control mb-3" name="measurement" placeholder="Measurement"/>
                  <input type="date"  class="form-control mb-3" name="from_date" placeholder="From Date"/>
                  <input type="text"  class="form-control mb-3" name="credit_amount" placeholder="Credit Amount"/>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" name="item_image" id="item_image">
                     <label class="custom-file-label" for="item_image">Things file</label>
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