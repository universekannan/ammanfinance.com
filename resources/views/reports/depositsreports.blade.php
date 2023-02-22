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
                  <input type="date" class="form-control" name="from" >
               </div>
               <div class="col-sm-5" style="padding-top: calc(.1rem + 0px);">
                  <input type="date" class="form-control" name="to" >
               </div>
               <div class="col-sm-2" style="padding-top: calc(.2rem + 0px);">
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
 @foreach($depositsreports as $key=>$depositsreportslist)
                        <tr>

                           <td>{{ $key + 1 }}</td>
                           <td>{{ $depositsreportslist->page_number }}</td>
                           <td>{{ $depositsreportslist->item_name }}</td>
                           <td>{{ $depositsreportslist->measurement }}</td>
                           <td>{{ $depositsreportslist->credit_amount }}</td>
                           <td>{{ $depositsreportslist->intrest }}</td>
                           <td>{{ $depositsreportslist->from_date }}</td>

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
                        </tr>
                     </tbody>
                  </table>        
	</div>
</section>
<!-- /.content -->
</div>
@endsection
