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
                <form>
               <div class="col-sm-3" style="padding-top: calc(.5rem + 0px);">
                  <input type="date" class="form-control" name="from" >
               </div>
               <div class="col-sm-3" style="padding-top: calc(.5rem + 0px);">
                  <input type="date" class="form-control" name="to" >
               </div>
               <div class="col-sm-1" style="padding-top: calc(.5rem + 0px);">
                     <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#addactivation"><i class="fa fa-plus"> </i> Add</button>
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
						<tr>
                           <td>wwwww</td>
                           <td>wwwww</td>
                           <td>wwwww</td>
                           <td>wwwww</td>
                           <td>wwwww</td>
                           <td>wwwww</td>
                           <td>wwwww</td>
                           <td>wwwww</td>
                           <td>wwwww</td>
                        </tr>
                     </tbody>
                  </table>        
	</div>
</section>
<!-- /.content -->
</div>
@endsection
