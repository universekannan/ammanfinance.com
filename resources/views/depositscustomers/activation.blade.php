@extends('layout')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="card card-primary card-outline card-outline-tabs">
         <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
               <div class="col-sm-6">
                  <center>
                     @foreach($managedepositscustomer as $key=>$managedepositscustomerlist)
                     <div class="nav-link">{{ $managedepositscustomerlist->full_name }} Deposit Activation</div>
                     @endforeach
                  </center>
               </div>
               <div class="col-sm-4" style="padding-top: calc(.5rem + 0px);">
                  <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
               </div>
               <div class="col-sm-1" style="padding-top: calc(.5rem + 0px);">
                  <td>
                     @foreach($managedepositsactivation as $key => $managedepositsactivationlist)
                   @if($managedepositsactivationlist["status"] == 1)
                   &nbsp;
                       @else
                         <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#addactivation"><i class="fa fa-plus"> </i> Add</button>
                       @endif
                       @endforeach

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
                     <th>Credit Amount</th>
                     <th>Interest</th>
                     <th>Interest Amount</th>
                     <th>From Date</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($managedepositsactivation as $key => $managedepositsactivationlist)
                  <tr>
                     <td>{{ $key + 1 }}</td>
                     <td>{{ $managedepositsactivationlist["page_number"] }}</td>
                     <td>{{ $managedepositsactivationlist["credit_amount"] }}</td>
                     <td>{{ $managedepositsactivationlist["intrest"] }}</td>
                     <td>{{ $managedepositsactivationlist["intrestamount"] }}</td>
                     <td>{{ $managedepositsactivationlist["from_date"] }} </td>
                     @if($managedepositsactivationlist["status"] == 1)
                     <td>Active</td>
                     @else
                     <td>Closed</td>
                     @endif
                     <td>
                        <a class="btn btn-default btn-outline-primary btn-xs fa fa-edit" href="" data-toggle="modal" data-target="#Edit{{ $managedepositsactivationlist['id'] }}"> Edit</a>


                        <a class="btn btn-default btn-outline-info btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#View{{ $managedepositsactivationlist['id'] }}"> View</a>

                        <a class="btn btn-default btn-outline-warning btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#withdraw{{ $managedepositsactivationlist['id'] }}"> Withdraw</a>

                        <a class="btn btn-default btn-outline-danger btn-xs fa fa-eye" href="" data-toggle="modal" data-target="#delete{{ $managedepositsactivationlist['id'] }}"> Delete</a>


                        <div class="modal fade" id="Edit{{ $managedepositsactivationlist['id'] }}">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Edit Activation : 
                                       @foreach($managedepositscustomer as $key=>$managedepositscustomerlist)
                                       {{ $managedepositscustomerlist->full_name }},  
                                       @endforeach
                                       {{ $managedepositsactivationlist["item_name"] }},
                                       {{ $managedepositsactivationlist["item_details"] }},
                                       {{ $managedepositsactivationlist["measurement"] }}
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <form action="{{url('/edit_activation')}}" onsubmit="return validate_amount(event,{{ $managedepositsactivationlist['id'] }})" method="post" >
                                       {{ csrf_field() }}
                                       <div class="row">
                                          <input type="hidden" class="form-control" name="id" value="{{ $managedepositsactivationlist['id'] }}"/>
                                          <div class="col-md-6">   
                                             @foreach($managedepositscustomer as $key=>$managedepositscustomerlist)
                                             <input type="hidden" class="form-control" name="customer_id" value="{{ $managedepositscustomerlist->id }}"/>
                                             @endforeach
                                             @foreach($manageinterest as $key=>$manageinterestlist)
                                             <input type="hidden" class="form-control" name="intrest" value=""/>
                                             @endforeach
                                             <input value="{{ $managedepositsactivationlist['page_number'] }}" type="text"  class="form-control mb-3" name="page_number" placeholder="Page Number"/>
                                             <input value="{{ $managedepositsactivationlist['item_name'] }}" type="text" class="form-control mb-3" name="item_name" placeholder="Item Name"/>
                                             <textarea name='item_details' class="form-control" rows="3" placeholder="Enter Item Details..." >{{ $managedepositsactivationlist["item_details"] }}</textarea>
                                          </div>
                                          <div class="col-md-6">
                                             <input value="{{ $managedepositsactivationlist['measurement'] }}" type="text"  class="form-control mb-3" name="measurement" placeholder="Measurement"/>
                                             @if($managedepositsactivationlist["from_date"] == $thistime = date('Y-m-d') )
                                             <input value="{{ $managedepositsactivationlist['from_date'] }}" type="date"  class="form-control mb-3" name="from_date" placeholder="From Date"/>
                                             @else
                                             <input value="{{ $managedepositsactivationlist['from_date'] }}" type="hidden" name="from_date" />
                                             @endif
                                             <input value="{{ $managedepositsactivationlist['credit_amount'] }}" type="text"  class="form-control mb-3" name="credit_amount" placeholder="Credit Amount"/>
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
                        <div class="modal fade" id="View{{ $managedepositsactivationlist['id'] }}">
                           <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">View Activation : 
                                       @foreach($managedepositscustomer as $key=>$managedepositscustomerlist)
                                       {{ $managedepositscustomerlist->full_name }},  
                                       @endforeach
                                       {{ $managedepositsactivationlist["item_name"] }},
                                       {{ $managedepositsactivationlist["item_details"] }},
                                       {{ $managedepositsactivationlist["measurement"] }}
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                  <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                       <tr>
                                          <th>activation_id</th>
                                          <th>from_date</th>
                                          <th>to_date</th>
                                          <th>Credit Amount</th>
                                          <th>Pay Amount</th>
                                          <th>Credit/Debit</th>
                                          <th>Interest</th>
                                          <th>Interest Amount</th>
                                          <th>balance_amount </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($managedepositsactivationlist["details"] as $key2=>$managedepositsactivationdetailslist)
                                       <tr>
                                          <td>{{ $managedepositsactivationdetailslist["activation_id"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["from_date"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["to_date"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["credit_amount"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["pay_amount"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["credit_debit"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["intrest"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["intrest_amount"] }}</td>
                                          <td>{{ $managedepositsactivationdetailslist["balance_amount"] }}</td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>

                                 <form action="{{url('/add_deposits_activation_details')}}" onsubmit="return validate_depositamount(event,{{ $managedepositsactivationlist['id'] }})" method="post" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Credit Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly id="creditamount{{ $managedepositsactivationlist['id'] }}" value="{{ $managedepositsactivationlist['credit_amount'] }}" type="text"  class="form-control" name="credit_amount" placeholder="Credit Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>From Date</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ $managedepositsactivationlist['from_date'] }}" type="text"  class="form-control" name="from_date" placeholder="From Date"/>
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
                                                <input readonly value="{{ $managedepositsactivationlist['intrest'] }}" type="text"  class="form-control" name="intrest" placeholder="Intrest"/>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <input type="hidden" class="form-control" name="activation_id" value="{{ $managedepositsactivationlist['id']}}"/>
                                          <input type="hidden" class="form-control" name="customer_id" value="{{ $managedepositsactivationlist['customer_id'] }}"/>


                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ $managedepositsactivationlist['intrestamount'] }}" type="text" id="interestamount{{ $managedepositsactivationlist['id'] }}"  class="form-control" name="intrest_amount" placeholder="Intrest Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label Decimal"><span style="color:red"></span>Total Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ round(floatval($managedepositsactivationlist['credit_amount'])) + round(floatval($managedepositsactivationlist['intrestamount'])) }}" name="total_amount" id="total_amount{{ $managedepositsactivationlist['id'] }}" type="text" class="form-control"  placeholder="Total Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label Decimal"><span style="color:red"></span>Pay Amount</label>
                                             <div class="col-sm-8">
                                                <input onkeyup="calculate_depositamount(event,{{ $managedepositsactivationlist['id'] }})" autofocus id="payamount{{ $managedepositsactivationlist['id'] }}" type="text"  class="form-control" name="pay_amount" placeholder="Pay Amount"/>
                                             </div>
                                          </div>

                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Balance Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly id="balanceamount{{ $managedepositsactivationlist['id'] }}" type="text"  class="form-control" name="balance_amount" placeholder="Balance Amount"/>
                                             </div>
                                          </div>

                                          <div class="form-group row">
                                             <label style="color:red;font-weight:bold" id="warningmessage{{ $managedepositsactivationlist['id'] }}" class="col-sm-12 col-form-label"></label>
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
                     <div class="modal fade" id="withdraw{{ $managedepositsactivationlist['id'] }}">
                      <form action="{{url('/withdrawdeposits')}}" method="post" enctype="multipart/from-data">
                        {{ csrf_field() }}
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">Activation : 
                                    @foreach($managedepositscustomer as $key=>$managedepositscustomerlist)
                                    {{ $managedepositscustomerlist->full_name }},  
                                    @endforeach
                                    {{ $managedepositsactivationlist["item_name"] }},
                                    {{ $managedepositsactivationlist["item_details"] }},
                                    {{ $managedepositsactivationlist["measurement"] }}
                                 </h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">

                                    <div class="col-md-12">

                                      <input type="hidden" class="form-control" name="activation_id" value="{{ $managedepositsactivationlist['id'] }}"/>

                                      <input type="hidden" class="form-control" name="customer_id" value="{{ $managedepositsactivationlist['customer_id'] }}"/>


                                      <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Credit Amount</label>
                                             <div class="col-sm-8">
                                                <input readonly id="withdrawcreditamount{{ $managedepositsactivationlist['id'] }}" value="{{ $managedepositsactivationlist['credit_amount'] }}" type="text"  class="form-control" name="credit_amount" placeholder="Credit Amount"/>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>From Date</label>
                                             <div class="col-sm-8">
                                                <input readonly value="{{ $managedepositsactivationlist['from_date'] }}" type="text"  class="form-control" name="from_date" placeholder="From Date"/>
                                             </div>
                                          </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Current Date</label>
                                       <div class="col-sm-8">
                                          <input readonly  type="text"  class="form-control" name="to_date" value="{{ $thisdate = date('Y-m-d'); }} " />
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest %</label>
                                       <div class="col-sm-8">
                                          <input readonly id="intrest{{ $managedepositsactivationlist['id'] }}" type="text"  class="form-control" name="intrest" value="{{ $managedepositsactivationlist['intrest'] }}" />
                                       </div>


                                    </div>
                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest Amount</label>
                                       <div class="col-sm-8">
                                          <input readonly id="withdrawinterestamount{{ $managedepositsactivationlist['id'] }}" type="text"  class="form-control" name="intrest_amount" value="{{ $managedepositsactivationlist['intrestamount'] }} " />
                                       </div>


                                    </div>

                                    <div class="form-group row">
                                       <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Total Amount</label>
                                       <div class="col-sm-8">
                                          <input  readonly id="withdrawcreditamount{{ $managedepositsactivationlist['id'] }}" type="text"  class="form-control" name="total_amount" value="{{ round(floatval($managedepositsactivationlist['credit_amount'])) + round(floatval($managedepositsactivationlist['intrestamount'])) }} " />
                                       </div>
                                    </div>

                                    <div class="form-group row">
                                       <label for="pay_amount" class="col-sm-4 col-form-label Decimal"><span style="color:red"></span>Withdraw Amount</label>
                                       <div class="col-sm-8">
                                          <input onkeyup="calculate_withdrawamount(event,{{ $managedepositsactivationlist['id'] }})" autofocus id="withdrawpayamount{{ $managedepositsactivationlist['id'] }}" type="text"  class="form-control" name="pay_amount" placeholder="Pay Amount"/>
                                       </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                       <label for="balance_amount" class="col-sm-4 col-form-label"><span style="color:red"></span>Balance Amount</label>
                                       <div class="col-sm-8">
                                          <input readonly id="withdrawbalanceamount{{ $managedepositsactivationlist['id'] }}" type="text"  class="form-control" name="balance_amount" placeholder="Balance Amount"/>
                                       </div>
                                    </div>

                                     <div class="form-group row">
                                       <label style="color:red;font-weight:bold" id="warningmessage{{ $managedepositsactivationlist['id'] }}" class="col-sm-12 col-form-label"></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 @if($managedepositsactivationlist['credit_amount'] == 0)
                                    <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                                    @else
                                    <button type="submit" id="save" class="btn btn-primary">Submit</button>
                                      @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal fade" id="delete{{ $managedepositsactivationlist['id'] }}">
                <form action="{{url('/deletedepositsactivation')}}" method="post" enctype="multipart/from-data">
                  {{ csrf_field() }}
                  <div class="modal-dialog modal-xl">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Activation : 
                              @foreach($managedepositscustomer as $key=>$managedepositscustomerlist)
                              {{ $managedepositscustomerlist->full_name }},  
                              @endforeach
                              {{ $managedepositsactivationlist["item_name"] }},
                              {{ $managedepositsactivationlist["item_details"] }},
                              {{ $managedepositsactivationlist["measurement"] }}
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

                                <input type="hidden" class="form-control" name="id" value="{{ $managedepositsactivationlist['id'] }}"/>
                                <input type="hidden" class="form-control" name="activation_id" value="{{ $managedepositsactivationlist['id'] }}"/>

                                <input type="hidden" class="form-control" name="customer_id" value="{{ $managedepositsactivationlist['customer_id'] }}"/>

                                <div class="form-group row">
                                 <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Credit Amount</label>
                                 <label for="email" id="creditamount{{ $managedepositsactivationlist['id'] }}" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositsactivationlist["credit_amount"] }}</label>

                              </div>
                              <div class="form-group row">
                                 <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>From Date</label>
                                 <label for="email" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositsactivationlist["from_date"] }}</label>

                              </div>
                              <div class="form-group row">
                                 <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Current Date</label>
                                 <label for="email" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $thisdate = date('Y-m-d'); }}</label>
                              </div>
                              <div class="form-group row">
                                 <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest %</label>
                                 <label for="intrest" class="col-sm-8 col-form-label"><span style="color:red"></span>{{ $managedepositsactivationlist["intrest"] }} %</label>

                              </div>
                              <div class="form-group row">
                                 <label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Interest Amount</label>
                                 <label for="email" id="interestamount{{ $managedepositsactivationlist['id'] }}" class="col-sm-4 col-form-label"><span style="color:red"></span>{{ $managedepositsactivationlist["intrestamount"] }}</label>


                              </div>
                              <div class="form-group row">
                                 <label for="email" class="col-sm-4 col-form-label Decimal"><span style="color:red"></span>Total Amount</label>
                                 <label for="email" class="col-sm-8 col-form-label Decimal"><span style="color:red"></span>{{ $managedepositsactivationlist["intrestamount"] }}</label>

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

   <form action="{{url('/add_depositsactivation')}}" method="post" enctype="multipart/from-data">
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
               <div class="col-md-12">   
                  @foreach($managedepositscustomer as $key=>$managedepositscustomerlist)
                  <input type="hidden" class="form-control" name="customer_id" value="{{ $managedepositscustomerlist->id }}"/>
                  @endforeach
                  @foreach($manageinterest as $key=>$manageinterestlist)
                  <input type="hidden" class="form-control" name="intrest" value="{{ $manageinterestlist->deposits_interest_value }}"/>
                  @endforeach
                  <div class="form-group row">
                   <input type="text"  class="form-control" name="page_number" placeholder="Page Number"/>
                </div> 
                <div class="form-group row">
                  <textarea name='item_details' class="form-control" rows="3" placeholder="Enter Title..." ></textarea>
                </div>
                <div class="form-group row">
                  <input type="date"  class="form-control" name="from_date" placeholder="From Date"/>
                </div>
                 <div class="form-group row">
                  <input type="text"  class="form-control" name="credit_amount" placeholder="Credit Amount"/>
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

