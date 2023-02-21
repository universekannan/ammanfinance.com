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
                        </tr>
                     </thead>
                     <tbody>
 @foreach($goldreport as $key=>$gold)
                        <tr>

                           <td>{{ $key + 1 }}</td>
                           <td>{{ $gold->page_number }}</td>
                           <td>{{ $gold->item_name }}</td>
                           <td>{{ $gold->measurement }}</td>
                           <td>{{ $gold->credit_amount }}</td>
                           <td>{{ $gold->intrest }}</td>
                           <td>{{ $gold->from_date }}</td>

                        </tr>
                        @endforeach
                     </tbody>
                  </table>        
	</div>
</section>
<!-- /.content -->
</div>
@endsection
