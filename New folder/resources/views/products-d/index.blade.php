@extends('layout')
@section('content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 4px;
}

tr:nth-child(even) {
  background-color:aqua;
}
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
</style>

                 <div class="content-wrapper">
                 <section class="content">
                 <div class="card card-primary card-outline card-outline-tabs">
                 <div class="card-header p-0 border-bottom-0">
                 <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                 <li class="nav-item">
                 <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Product</a>
                 </li>
                 <li class="nav-item">
                 <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Product Name</a>
                 </li>
	             <div class="col-sm-4">
				 <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Enter Product Name">
				 </div>
				 <div class="col-sm-1">
				 <td>
                 <button type="button" class="btn btn-block btn-secondary" 
                  data-toggle="modal" data-target="#addproduct">
				  <i class="fa fa-plus"></i>Add</button>
                 </td>
					 </div>
                     </ul>
                     </div>
                     <div class="card-body">
                     <div class="tab-content" id="custom-tabs-four-tabContent">
                     <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <table id="example1" class="table table-bordered table-hover">
<thead>
<tr>
					<th>Code</th>
					<th>Product Code</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Generic Name</th>
					<th>Company</th>
					<th>Mini Order Qty</th>
					<th>Location</th>
					<th>Action</th>
</tr>
</thead>
<tbody>
 @foreach($manageproducts as $key=>$manageproductslist)
                <tr id="arrayorder_<?php echo $manageproductslist->id?>">
                <td>{{ $key + 1 }}</td>
                <td>{{ $manageproductslist->product_code }}</td>
                <td>{{ $manageproductslist->product_name }}</td>
                <td>{{ $manageproductslist->category }}</td>
                <td>{{ $manageproductslist->generic_name }}</td>
                <td>{{ $manageproductslist->company }}</td>
				<td>{{ $manageproductslist->mini_order_qty }}</td>
				<td>{{ $manageproductslist->location }}</td>
                                                
				<td>    
                <div class="row">
			    <a type="button" data-toggle="modal" data-target="#edit{{ $manageproductslist->id }}"class="col-md-4 btn btn-block btn-lg">
				<i class="fa fa-eye"></i></a>           
				</div>						
                </td>
			
			    <div class="modal fade" id="edit{{ $manageproductslist->id }}"> 
			    <form action="{{url('/edit_product')}}" method="post">
{{ csrf_field() }}
                <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                <h4  class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
				
			    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
				
<!--hiden-->     <input type="hidden" class="form-control" name="id" 
                value="{{ $manageproductslist->id }}"/>
				
        	    <div class="row">
			    <div class="col-md-6">   
	            <div class="form-group row">
				<label for="product_code" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Product Code</label>
				<div class="col-sm-8">
				<input  value="{{ $manageproductslist->id }}" required="required" type="text" class="form-control"
				name="product_code" id="product_code" maxlength="50" 
				placeholder="product_Code">
				</div>
				</div>
				
                <div class="form-group row">
				<label for="product_name" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Product Name</label>
				<div class="col-sm-8">
				<input  value="{{ $manageproductslist->id }}" required="required" 
				type="text" class="form-control" 
				name="product_name" id="product_name" maxlength="50" 
				placeholder="Product_Name">
				</div>
				</div>
			 
				<div class="form-group row">
				<label for="category" class="col-sm-4 col-form-label"><span style="color:red"></span>Category</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="category" id="category" style="width: 100%;" required="required">
				
				<option value="">Saturing</option>
				<option value="sssssss">sssssss</option>
				<option value="svn">svn</option>
				<option value="tab">tab</option>
				<option value="syrp">syrp</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>				
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="generic_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Generic Name</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="generic_name" 
				id="generic_name" style="width: 100%;" required="required">
				
				<option value="">Ethilon</option>
				<option value="aaaaaa">aaaaaa</option>
			    <option value="cnc">cnc</option>
				<option value="hod">hod</option>
				<option value="wwwwww">wwwwww</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="packing_type" class="col-sm-4 col-form-label"><span style="color:red"></span>Packing Type</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="packing_type"
				id="packing_type" style="width: 100%;" required="required">
				
				<option value="">Other</option>
				<option value="kg">kg</option>
				<option value="gilo">gilo</option>
				<option value="milli">milli</option>
                <option value="ooo">ooo</option>
				</select>
				</div>			
                <p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
                <div class="col-sm-1">				
				</div>
				</div>
				
				<div class="form-group row">
				<label for="medicine_category" class="col-sm-4 col-form-label"><span style="color:red"></span>Medicine Category</label>
				<div class="col-sm-7 custom-file">
				<select class="form-control select2bs4" name="medicine_category" 
				id="medicine_category" style="width: 100%;" required="required">
				
				<option value="">OT</option>
				<option value="mmmm">mmmm</option>
			    <option value="time">time</option>
				<option value="Product">Product</option>
				<option value="ppp">ppp</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>
				<div class="col-sm-1">
				<!--<a href="#" onClick="MyWindow=window.open('http://www.google.com','MyWindow','width=600,height=300'); return false;"><i class="fa fa-plus aria-hidden="true"></i></a>-->
				</div>
				</div>
				
				<div class="form-group row">
				<label for="packing_qty" class="col-sm-4 col-form-label"><span style="color:red"></span>Packing Qty</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="packing_qty"id="packing_qty 
				style="width: 100%;" required="required">
				
				<option value="">QTY</option>
				<option value="01">01</option>
			    <option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				</select>
				</div>
				</div>
				
			    <div class="form-group row">
				<label for="max_dosage" class="col-sm-4 col-form-label"><span style="color:red"></span>Max Dosage</label>
				<div class="col-sm-6">
				<input value="{{ $manageproductslist->id }}" required="required" type="text" class="form-control"
				name="max_dosage" id="max_dosage"
				maxlength="50" placeholder="Max_Dosage">
				</div>
			    <label for="(Mg)" class="col-sm-2 col-form-label"><span style="color:red"></span>(Mg)</label>
				</div>
				
				<div class="form-group row">
				<label for="dosage_per_kg" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Dosage Per Kg</label>
				<div class="col-sm-6">
				<input value="{{ $manageproductslist->id }}" required="required" type="text" class="form-control"
				name="dosage_per kg" id="dosage_per_kg"
				maxlength="50" placeholder="Number">
				</div>
			    <label for="(Mg)" class="col-sm-2 col-form-label"><span style="color:red"></span>(Mg)</label>
			    </div>
				</div>
				
				<div class="col-md-6">  
				<div class="form-group row">
				<label for="food_interaction" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Food Interaction</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="food_interaction"
				id="food_interaction" style="width: 100%;" required="required">
				
				<option value="">After Food</option>
				<option value="Idl">Idl</option>
				<option value="cof">cof</option>
				<option value="jui">jui</option>
				<option value="Dos">Dos</option>
				<option value="Tea">Tea</option>
				</select>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="company" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Company</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="company"
				id="company" style="width: 100%;" required="required">
				
				<option value="">Ethicon</option>
				<option value="mnc">mnc</option>
				<option value="coo">coo</option>
				<option value="sss">sss</option>
				<option value="cts">cts</option>
				<option value="tss">tss</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">				
				</div>
				</div>
				
				<div class="form-group row">
				<label for="mini_order_qty" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Mini Order Qty</label>
				<div class="col-sm-8">
				<input value="{{ $manageproductslist->id }}" required="required" type="text" class="form-control" 
				name="mini_order_qty" id="mini_order_qty" maxlength="50" 
				placeholder="Mini_Order_Qty">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="location" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Location</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="location"
				id="location" style="width: 100%;" required="required">
				
				<option value="">Racks</option>
				<option value="Rack1">Rack1</option>
				<option value="Rack2">Rack2</option>
				<option value="Rack3">Rack3</option>
				<option value="Rack4">Rack4</option>
				<option value="Rack5">Rack5</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">				
				</div>
				</div>
				
				<div class="form-group row">
				<label for="sgst(%)" class="col-sm-4 col-form-label">
				<span style="color:red"></span>SGST(%)</label>
				<div class="col-sm-8">
				<input value="{{ $manageproductslist->id }}" required="required" type="text" class="form-control" 
				name="sgst" id="sgst" maxlength="50" 
				placeholder="SGST">
				</div>
				</div>
			  
			    <div class="form-group row">
				<label for="cgst(%)" class="col-sm-4 col-form-label">
				<span style="color:red"></span>CGST(%)</label>
				<div class="col-sm-8">
				<input value="{{ $manageproductslist->id }}" required="required" type="text" class="form-control" 
				name="cgst" id="cgst" maxlength="50" 
				placeholder="CGST">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="hsn_code" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Hsn Code</label>
				<div class="col-sm-8">
				<input value="{{ $manageproductslist->id }}" required="required" type="text" class="form-control" 
				name="hsn_code" id="hsn_code" maxlength="50" 
				placeholder="Code">
				</div>
				</div>
	            </div>		
				</div>
			    </div>   
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" 
				data-dismiss="modal">Next</button>					
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>	
                </div>
                </div>
                </form>
                </div>
				</tr>					
				 @endforeach  
                </tbody>
                </table>
                </div>              
                </div>
                </div> 	
<!-- edit product end-->					
<!-- add product start-->	  

	                <div class="modal fade" id="addproduct">
                    <form action="{{url('/add_product')}}" method="post">
{{ csrf_field() }}

                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h4  class="modal-title">Product Details</h4>
                    <button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
              
			       <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

        	    <div class="row">
			    <div class="col-md-6">   
	            <div class="form-group row">
				<label for="product_code" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Product Code</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control"
				name="product_code" id="product_code" maxlength="50" 
				placeholder="product_Code">
				</div>
				</div>
				
                <div class="form-group row">
				<label for="product_name" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Product Name</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" 
				name="product_name" id="product_name" maxlength="50" 
				placeholder="Product_Name">
				</div>
				</div>
			 
				<div class="form-group row">
				<label for="category" class="col-sm-4 col-form-label"><span style="color:red"></span>Category</label>
<!--popo up-->	
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="category" id="category" style="width: 100%;" required="required">
				<option value="">Saturing</option>
				<option value="sssssss">sssssss</option>
				<option value="svn">svn</option>
				<option value="tab">tab</option>
				<option value="syrp">syrp</option>
				</select>
				</div>
				<p>
				
				<!--<input onclick="window.open()"type="button" class="fa fa-plus" class="btn btn-default btn-sm"style="font-size:24px" /><i class="fa fa-plus"></i>-->
				
<button 
       onclick="window.open('https://www.google.com/','MY Window','height=300,width=300,top=200,centeralign=200,right=300')"type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
				
                </button>
                </p>	
				</div>
				<!--<button style="font-size:24px">Button <i class="fa fa-plus"></i></button>-->
				
				<div class="form-group row">
				<label for="generic_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Generic Name</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="generic_name" 
				id="generic_name" 
				style="width: 100%;" required="required">
				
				<option value="">Ethilon</option>
				<option value="aaaaaa">aaaaaa</option>
			    <option value="cnc">cnc</option>
				<option value="hod">hod</option>
				<option value="wwwwww">wwwwww</option>
				</select>
				</div>
				<p>
                <button onclick="openWindow()"type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="packing_type" class="col-sm-4 col-form-label"><span style="color:red"></span>Packing Type</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="packing_type"
				id="packing_type" style="width: 100%;" required="required">
				
				<option value="">Other</option>
				<option value="kg">kg</option>
				<option value="gilo">gilo</option>
				<option value="milli">milli</option>
                <option value="ooo">ooo</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">				
				</div>
				</div>
				
				<div class="form-group row">
				<label for="medicine_category" class="col-sm-4 col-form-label"><span style="color:red"></span>Medicine Category</label>
				<div class="col-sm-7 custom-file">
				<select class="form-control select2bs4" name="medicine_category" 
				id="medicine_category" style="width: 100%;" required="required">
				
				<option value="">OT</option>
				<option value="mmmm">mmmm</option>
			    <option value="vicks">Vicks</option>
				<option value="tablet">Tablet</option>
				<option value="ppp">ppp</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="packing_qty" class="col-sm-4 col-form-label"><span style="color:red"></span>Packing Qty</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="packing_qty" 
				id="packing_qty" 
				style="width: 100%;" required="required">
				<option value="">QTY</option>
				<option value="01">01</option>
			    <option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				</select>
				</div>
				</div>
				
			    <div class="form-group row">
				<label for="max_dosage" class="col-sm-4 col-form-label"><span style="color:red"></span>Max Dosage</label>
				<div class="col-sm-6">
				<input required="required" type="text" class="form-control"
				name="max_dosage" id="max_dosage"
				maxlength="50" placeholder="max_dosage">
				</div>
			    <label for="(mg)" class="col-sm-2 col-form-label"><span style="color:red"></span>(Mg)</label>
				</div>
				
				<div class="form-group row">
				<label for="dosage_per_kg" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Dosage Per Kg</label>
				<div class="col-sm-6">
				<input required="required" type="text" class="form-control"
				name="dosage_per kg" id="dosage_per_kg"
				maxlength="50" placeholder="Number">
				</div>
			    <label for="(Mg)" class="col-sm-2 col-form-label"><span style="color:red"></span>(Mg)</label>
			    </div>
				</div>
				
				<div class="col-md-6">  
				<div class="form-group row">
				<label for="food_interaction" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Food Interaction</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="food_interaction"
				id="food_interaction" style="width: 100%;" required="required">
				
				<option value="">After Food</option>
				<option value="Idl">Idl</option>
				<option value="cof">cof</option>
				<option value="jui">jui</option>
				<option value="Dos">Dos</option>
				<option value="Tea">Tea</option>
				</select>
				</div>
				</div>
				
				<div class="form-group row">
				<label for="company" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Company</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="company"
				id="company" style="width: 100%;" required="required">
				
				<option value="">Ethicon</option>
				<option value="mnc">mnc</option>
				<option value="coo">coo</option>
				<option value="sss">sss</option>
				<option value="cts">cts</option>
				<option value="tss">tss</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="mini_order_qty" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Mini Order Qty</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" 
				name="mini_order_qty" id="mini_order_qty" maxlength="50" 
				placeholder="Mini_Order_Qty">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="location" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Location</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="location"
				id="location" style="width: 100%;" required="required">
				
				<option value="">Racks</option>
				<option value="Rack1">Rack1</option>
				<option value="Rack2">Rack2</option>
				<option value="Rack3">Rack3</option>
				<option value="Rack4">Rack4</option>
				<option value="Rack5">Rack5</option>
				</select>
				</div>
				<p>
                <button type="button" class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:24px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="sgst(%)" class="col-sm-4 col-form-label">
				<span style="color:red"></span>SGST(%)</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" 
				name="sgst" id="sgst" maxlength="50" 
				placeholder="SGST">
				</div>
				</div>
			  
			    <div class="form-group row">
				<label for="cgst(%)" class="col-sm-4 col-form-label">
				<span style="color:red"></span>CGST(%)</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" 
				name="cgst" id="cgst" maxlength="50" 
				placeholder="CGST">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="hsn_code" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Hsn Code</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" 
				name="hsn_code" id="hsn_code" maxlength="50" 
				placeholder="Code">
				</div>
				</div>
	            </div>		
				</div>
			    </div> 
			    </form>    
				
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" 
				data-dismiss="modal">Next</button>					
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>	
                </div>
                </div>
                </form>
                </div>
                </div>
                </div>
                </section>
                </div>
  <!-- add product ending-->
@endsection
                <script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
                <script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
function myFunction() {
  const input = document.getElementById("myInput");
  const inputStr = input.value.toUpperCase();
  document.querySelectorAll('#example2 tr:not(.header)').forEach((tr) => {
    const anyMatch = [...tr.children]
      .some(td => td.textContent.toUpperCase().includes(inputStr));
    if (anyMatch) tr.style.removeProperty('display');
    else tr.style.display = 'none';
  });
}
JavaScript
function openWindow() {
  var win = window.open
  ("", "Title", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=780,height=200, top="+(screen.height-400)+", left="+(screen.width-840));
  win.document.body.innerHTML = "Product Details";
}
</script>
</script>
</script>
