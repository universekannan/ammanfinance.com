@extends('layout')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="card card-primary card-outline card-outline-tabs">
         <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
               <div class="col-sm-5">
                  <center>
                     Gold Loans All Activations List
                  </center>
               </div>
               <form class="row col-sm-7" action="" onsubmit="" method="post" >

                  <div class="col-sm-5" style="padding-top: calc(.1rem + 0px);">
                     <input type="date" id="from" value="{{ $from }}" class="form-control" name="from" >
                  </div>
                  <div class="col-sm-5" style="padding-top: calc(.1rem + 0px);">
                     <input type="date" id="to" value="{{ $to }}" class="form-control" name="to" >
                  </div>
                  <div class="col-sm-2" style="padding-top: calc(.2rem + 0px);">
                     <input onclick="load_report()" type="button"  value="Apply" class="form-control text-center btn btn-block btn-outline-info btn-sm" />
                  </div>
               </form>
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
                     <th>Activation ID</th>
                     <th>From Date</th>
                     <th>To Date</th>
                     <th>Intrest</th>
                     <th>Credit Amount</th>
                     <th>Interest Amount</th>
                     <th>Total Amount</th>
                     <th>Pay Amount</th>
                     <th>Balance Amount</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($goldreport as $key=>$gold)
                  <tr>
                     <td>{{ $gold->activation_id }}</td>
                     <td>{{ $gold->from_date }}</td>
                     <td>{{ $gold->to_date }}</td>
                     <td>{{ $gold->intrest }}</td>
                     <td>{{ $gold->credit_amount }}</td>
                     <td>{{ $gold->intrest_amount }}</td>
                     <td>{{ $gold->total_amount }}</td>
                     <td>{{ $gold->pay_amount }}</td>
                     <td>{{ $gold->balance_amount }}</td>

                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="5">Total :</td>
                        <td style="color:red;">{{ $TotalGoldLoans }}</td>
                        <td></td>
                        <td>{{ $payamount }}</td>
                        <td></td>
                     </tr>
                  </tfoot>
                  
               </table>        
            </div>
         </section>
         <!-- /.content -->
      </div>
      @endsection
