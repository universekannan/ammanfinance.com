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
                 <a class="nav-link"id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Product Name</a>
                 </li>

	             <div class="col-sm-8">
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
					<th>#</th>
					<th>Code</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Generic</th>
					<th>Company</th>
					<th>Supplier</th>
					<th>MOQ</th>
					<th>Location</th>
					<th>Action</th>
</tr>
</thead>
<tbody>
 @foreach($manageproduct as $key=>$manageproductslist)
                <tr id="arrayorder_<?php echo $manageproductslist->id?>">
                <td>{{ $key + 1 }}</td>
                <td>{{ $manageproductslist->product_code }}</td>
                <td>{{ $manageproductslist->product_name }}</td>
                <td>{{ $manageproductslist->category_name }}</td>
                <td>{{ $manageproductslist->generic_name }}</td>
                <td>{{ $manageproductslist->company_name }}</td>
				<td>{{ $manageproductslist->supplier_name }}</td>
				<td>{{ $manageproductslist->mini_order_qty }}</td>
				<td>{{ $manageproductslist->rack_name }}</td>
                                                
				<td>    
                <div class="row">
			    <a type="button" data-toggle="modal" data-target="#edit{{ $manageproductslist->id }}"class="col-md-4 btn btn-block btn-lg">
				<i class="fa fa-edit"></i></a> 
				
                <div class="row">
			    <a type="button" data-toggle="modal" data-target="#edit{{ $manageproductslist->id }}"class="col-md-4 btn btn-block btn-lg">
				<i class="fa fa-eye"></i></a>           
				</div>				
				</div>				
                </td>
			
			    <div class="modal fade" id="edit{{ $manageproductslist->id }}"> 
			    <form action="{{url('/pharmacy/edit_product')}}" method="post">
				
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
				
				
                <input type="hidden" class="form-control" name="id" 
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
				<label for="category_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Category</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="category_id" 
				id="category_id" style="width: 100%;" required="required">
				
				@foreach($managecategory as $key=>$managecategorys)
				 <option value="{{ $managecategorys->id }}" <?php if($managecategorys->id == $manageproductslist->category_id){ echo "selected"; }?>>{{ $managecategorys->category_name }}</option>
				 @endforeach
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/category')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>				
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="generic_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Generic Name</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="generic_id" 
				id="generic_id" style="width: 100%;" required="required">
				
				@foreach($managegenerics as $key=>$managegenericss)
				 <option value="{{ $managegenericss->id }}" <?php if($managegenericss->id == $manageproductslist->generic_id){ echo "selected"; }?>>{{ $managegenericss->generic_name }}</option>
				 @endforeach
			
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/generics')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="packing_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Packing Type</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="packing_id"
				id="packing_id" style="width: 100%;" required="required">
				
				@foreach($managepackings as $key=>$managepackingss)
				 <option value="{{ $managepackingss->id }}" <?php if($managepackingss->id == $manageproductslist->packing_id){ echo "selected"; }?>>{{ $managepackingss->packing_name }}</option>
				 @endforeach
				 
				</select>
				</div>			
                <p>
                <button 
                onclick="window.open('{{url('/pharmacy/packings')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>	
                <div class="col-sm-1">				
				</div>
				</div>
				
				<div class="form-group row">
				<label for="medicine_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Medicine Category</label>
				<div class="col-sm-7 custom-file">
				<select class="form-control select2bs4" name="medicine_id" 
				id="medicine_id" style="width: 100%;" required="required">
				
				@foreach($managemedicines as $key=>$managemediciness)
				 <option value="{{ $managemediciness->id }}" <?php if($managemediciness->id == $manageproductslist->medicine_id){ echo "selected"; }?>>{{ $managemediciness->medicine_name }}</option>
				 @endforeach
				 
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/medicines')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="packing_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Packing Qty</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="packing_id"id="packing_id
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
				<label for="company_id" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Company</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="company_id"
				id="company_id" style="width: 100%;" required="required">

			@foreach($managecompany as $key=>$managecompanys)
				 <option value="{{ $managecompanys->id }}" <?php if($managecompanys->id 
				 == $manageproductslist->company_id){ echo "selected"; }?>>{{ $managecompanys->company_name }}</option>
				 @endforeach
				 
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/company')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>	
				<div class="col-sm-1">				
				</div>
				</div>
				
				<div class="form-group row">
				<label for="supplier_id" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Supplier</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="supplier_id"
				id="supplier_id" style="width: 100%;" required="required">

			@foreach($managesupplier as $key=>$managesuppliers)
				 <option value="{{ $managesuppliers->id }}" <?php if($managesuppliers->id 
				 == $manageproductslist->supplier_id){ echo "selected"; }?>>{{ $managesuppliers->supplier_name }}</option>
				 @endforeach
				 
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/supplier')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
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
				<label for="location_id" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Location</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="location_id"
				id="location_id" style="width: 100%;" required="required">
		
				@foreach($managelocations as $key=>$managelocationss)
			 <option value="{{ $managelocationss->id }}" <?php if($managelocationss->id 
				 == $manageproductslist->location_id){ echo "selected"; }?>>{{ $managelocationss->rack_name }}</option>
				 @endforeach
				
				</select>
				</div>
				<p>
               <button 
                onclick="window.open('{{url('/pharmacy/locations')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
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
                    <form action="{{url('/pharmacy/add_product')}}" method="post">
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
				<label for="category_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Category</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="category_id" 
				id="category_id" style="width: 100%;" required="required">
				
				<option value="">Saturing</option>
				 @foreach($managecategory as $key=>$managecategory)
				<option value="{{ $managecategory->id }}">
				{{ $managecategory->category_name }}</option>
				  @endforeach
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/category')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>	
				</div>
				
				<div class="form-group row">
				<label for="generic_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Generic Name</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="generic_id" 
				id="generic_id" 
				style="width: 100%;" required="required">
				
				<option value="">Ethilon</option>
			    @foreach($managegenerics as $key=>$managegenerics)
				<option value="{{ $managegenerics->id }}">
				{{ $managegenerics->generic_name }}</option>
				  @endforeach
				</select>
				</div>
				<p>
                 <button 
                onclick="window.open('{{url('/pharmacy/generics')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="packing_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Packing Type</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="packing_id"
				id="packing_id" style="width: 100%;" required="required">
				
				<option value="">Other</option>
				@foreach($managepackings as $key=>$managepackings)
				<option value="{{ $managepackings->id }}">
				{{ $managepackings->packing_name }}</option>
				  @endforeach
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/packings')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>	
				<div class="col-sm-1">				
				</div>
				</div>
				
				<div class="form-group row">
				<label for="medicine_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Medicine Category</label>
				<div class="col-sm-7 custom-file">
				<select class="form-control select2bs4" name="medicine_id" 
				id="medicine_id" style="width: 100%;" required="required">
				
				<option value="">OT</option>
				@foreach($managemedicines as $key=>$managemedicines)
				<option value="{{ $managemedicines->id }}">
				{{ $managemedicines->medicine_name }}</option>
				  @endforeach
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/medicines')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
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
				<label for="company_id" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Company</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="company_id"
				id="company_id" style="width: 100%;" required="required">
				
				<option value="">Ethicon</option>
                @foreach($managecompany as $key=>$managecompany)
		        <option value="{{ $managecompany->id }}">
		        {{ $managecompany->company_name }}</option>
				  @endforeach
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/company')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
                </button>
                </p>	
				<div class="col-sm-1">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="supplier_id" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Supplier</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="supplier_id"
				id="supplier_id" style="width: 100%;" required="required">
				
				<option value="">Ethicon</option>
				<option value="">iron</option>
                @foreach($managesupplier as $key=>$managesupplier)
		        <option value="{{ $managesupplier->id }}">
		        {{ $managesupplier->supplier_name }}</option>
				  @endforeach
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/supplier')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
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
				<label for="location_id" class="col-sm-4 col-form-label"><span 
				style="color:red"></span>Location</label>
				<div class="col-sm-7">
				<select class="form-control select2bs4" name="location_id"
				id="location_id" style="width: 100%;" required="required">
				
				<option value="">Racks</option>
				@foreach($managelocations as $key=>$managelocations)
	            <option value="{{ $managelocations->id }}">
	            {{ $managelocations->rack_name  }}</option>
				  @endforeach
				</select>
				</div>
				<p>
                <button 
                onclick="window.open('{{url('/pharmacy/locations')}}','MY Window','height=600,width=500,top=200,centeralign=200,right=300')"
				type="button" 
				class="btn btn-default btn-sm">
                <span class="fa fa-plus"style="font-size:22px"></span>
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
