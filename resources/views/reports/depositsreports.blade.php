@extends('layout')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="card card-primary card-outline card-outline-tabs">
         <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
               <div class="col-sm-5">
                  <center>
				  Deposits All Activations List
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
                     <input onclick="load_depositreport()" type="button"  value="Apply" class="form-control text-center btn btn-block btn-outline-info btn-sm" />
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
                           <th>Credit/Debit</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($depositsreports as $key=>$depositsreportslist)
                        <tr>

                           <td>{{ $depositsreportslist->activation_id }}</td>
                           <td>{{ $depositsreportslist->from_date }}</td>
                           <td>{{ $depositsreportslist->to_date }}</td>
                           <td>{{ $depositsreportslist->intrest }}</td>
                           <td>{{ $depositsreportslist->credit_amount }}</td>
                           <td>{{ $depositsreportslist->intrest_amount }}</td>
                           <td>{{ $depositsreportslist->total_amount }}</td>
                           <td>{{ $depositsreportslist->pay_amount }}</td>
                           <td>{{ $depositsreportslist->balance_amount }}</td>
                           <td>{{ $depositsreportslist->credit_debit }}</td>
                        </tr>
                        @endforeach
                     </tbody>
                      <tfoot>
                     <tr>
                         <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">Total Intrest : {{ $depositintrest }}</td> 
                        <td colspan="2">Credit Amount : {{ $depositcredit }}</td>
                        <td colspan="2">Debit Amount :  {{ $depositdebit }}</td>
                       
                     </tr>
                  </tfoot>
                  </table>        
	</div>
</section>
<!-- /.content -->
</div>
@endsection
