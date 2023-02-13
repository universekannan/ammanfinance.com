<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;


use App\Models\Core\Setting;
use App\Models\Admin\Admin;
use App\Models\Core\Order;
use App\Models\Core\Customers;
use App\Models\Core\Drivers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Exception;
use App\Models\Core\Images;
use Validator;
use Hash;
use Auth;
use ZipArchive;
use File;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ProductsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
/******   Manage Products Start ******/
		
      /* public function manageProducts(){
			$manageproducts = DB::table('products')->select('products.*','product_groups.*','product.id as productID')
                ->Join('product_groups', 'product_groups.id', '=', 'products.role_id')
                ->where('products.role_id', '=','2')->orderBy('products.id','Asc')->get();
	        return view("products.index")->with('manageproducts', $manageproducts);

        }*/
/****** Manage Products End ******/

        public function manageProducts(){
            $manageproduct   = DB::table('products')
              ->Join('category', 'category.id', '=', 'products.category_id')
			  ->Join('generics', 'generics.id', '=', 'products.generic_id')
			  ->Join('locations', 'locations.id', '=', 'products.location_id')
			  ->Join('company', 'company.id', '=', 'products.company_id')
			  ->Join('supplier', 'supplier.id', '=', 'products.supplier_id')
			  ->orderBy('products.id','Asc')->get();
			  
			$managecategory  = DB::table('category')->orderBy('id','Asc')->get();
			$managegenerics  = DB::table('generics')->orderBy('id','Asc')->get();
			$managepackings  = DB::table('packings')->orderBy('id','Asc')->get();
			$managemedicines = DB::table('medicines')->orderBy('id','Asc')->get();
		    $managecompany   = DB::table('company')->orderBy('id','Asc')->get();
			$managesupplier  = DB::table('supplier')->orderBy('id','Asc')->get();
		    $managelocations = DB::table('locations')->orderBy('id','Asc')->get();
			
			
   return view("pharmacy/products.index")->with('manageproduct', $manageproduct)->with('managecategory', $managecategory)->with('managecompany', $managecompany)->with
   ('managesupplier', $managesupplier)->with('managegenerics', $managegenerics)->with
   ('managepackings', $managepackings)->with('managemedicines', $managemedicines)->with('managelocations', $managelocations);
        }

/******   Add Products  Start ******/

        public function addProduct(Request $request){

            $addproduct = DB::table('products')->insert([
                'product_code'	        =>   $request->product_code,
                'product_name'	        =>   $request->product_name,
                'category_id'	        =>   $request->category_id,
                'generic_id'	        =>   $request->generic_id,
				'company_id'            =>   $request->company_id,
				'supplier_id'           =>   $request->supplier_id,
				'mini_order_qty'        =>   $request->mini_order_qty,
				'location_id'           =>   $request->location_id,	
                'packing_id'	        =>   $request->packing_id,
                'medicine_id'		    =>   $request->medicine_id,
				'packing_qty'	        =>   $request->packing_qty,
                'max_dosage'	        =>   $request->max_dosage,
                'dosage_per_kg'	        =>   $request->dosage_per_kg,
                'food_interaction'		=>   $request->food_interaction, 
				'sgst'                  =>   $request->sgst,
				'cgst'                  =>   $request->cgst,
				'hsn_code'              =>   $request->hsn_code,
				'created_at'	        =>	 date('Y-m-d H:i:s'),
                ]);
				//Print_r($addproduct);die();

            return redirect()->back(); 
        }

/******   Add Product End ******/

/******   Edit Product Start ******/

        public function editProduct(Request $request){

            $editProduct = DB::table('products')->where('id',$request->id)->update([
                'product_code'	        =>   $request->product_code,
                'product_name'	        =>   $request->product_name,
                'category_id'	        =>   $request->category_id,
                'generic_id'	        =>   $request->generic_id,
				'company_id'            =>   $request->company_id,
				'supplier_id'           =>   $request->supplier_id,
				'mini_order_qty'        =>   $request->mini_order_qty,
				'location_id'           =>   $request->location_id,	
                'packing_id'	        =>   $request->packing_id,
                'medicine_id'		    =>   $request->medicine_id,
				'packing_qty'	        =>   $request->packing_qty,
                'max_dosage'	        =>   $request->max_dosage,
                'dosage_per_kg'	        =>   $request->dosage_per_kg,
                'food_interaction'		=>   $request->food_interaction, 
				'sgst'                  =>   $request->sgst,
				'cgst'                  =>   $request->cgst,
				'hsn_code'              =>   $request->hsn_code,
				'created_at'	        =>	 date('Y-m-d H:i:s'),
                ]);
            return redirect()->back(); 
        }

/******   Edit Product End ******/

/******    Delete Users  Start ******/

        public function deleteUser(Request $request){

            $deluser = DB::table('users')->where('id',$request->id)->delete();
            return redirect()->back(); 

        }

/******   Delete Users  End ******/

/******   Delete Patients  Start ******/
       public function managePatients(){
			$managepatients = DB::table('users')
                ->Join('patient_disease', 'patient_disease.id', '=', 'users.disease_id')
                ->where('users.role_id', '=','2')->get();
            return view("patients.index")->with('managepatients', $managepatients);

        }
/******   Delete Patients  End ******/
/******    Sorting Users  Start ******/

        public function planSorting(Request $request)
        {
            $array  = $request->arrayorder;
            //Print_r($array);die();
            if($request->update == "update")
            {
                $count = 1;
                
                foreach ($array as $idval)
                {
                    //$data=array('sort_order'=> $count);
                    $sortPlan = DB::table('manage_plan')->where('id',$idval)->update(['sort_order' =>   $count]);
                    $count ++;
                }
            }
            
            echo 'Manage Plan Order Change Successfully....!';
        }

/******    Sorting Users  End ******/


}
