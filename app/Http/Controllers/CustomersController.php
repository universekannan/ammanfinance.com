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
use Illuminate\Support\Facades\Input;
use Exception;
use App\Models\Core\Images;
use Validator;
use Hash;
use Auth;
use ZipArchive;
use File;
use Carbon\Carbon;



class CustomersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /****** View  Roles Start ******/

        public function manageCustomers(){
		  $managecustomers = DB::table('customers')->orderBy('id','Asc')->get();
            return view("customers.index")->with('managecustomers', $managecustomers);
        }

    /******   View Roles  end ******/


              public function addCustomer(Request $request){
                $addcustomer = DB::table('customers')->insert([
                'full_name'		 	    	=>   $request->full_name,
                'mobile_number'			  	=>   $request->mobile_number,
                'id_proof'                  =>   $request->id_proof,
                'gender'                    =>   $request->gender,
                'age'                       =>   $request->age,
                'address'                   =>   $request->address,
                'status'                    =>   1,
                'created_at'                =>   date('Y-m-d H:i:s'),
                'login_id'                  =>   auth()->user()->id,
               
                ]);

                return redirect('/customers')->with('success', 'Customer Created Successfully');
        }

    
 
     /****** Edit  Roles Start ******/

             public function editCustomer(Request $request){
             $editcustomer = DB::table('customers')->where('id',$request->id)->update([
                'full_name'		 	    	=>   $request->full_name,
                'mobile_number'			  	=>   $request->mobile_number,
                'id_proof'                  =>   $request->id_proof,
                'gender'                    =>   $request->gender,
                'age'                       =>   $request->age,
                'address'                   =>   $request->address,
                'status'                    =>   $request->status,
                'updated_at'                =>   date('Y-m-d H:i:s'),
                'login_id'                  =>   auth()->user()->id,
                ]);

                return redirect('/customers')->with('success', 'Customer Updated Successfully'); 
            }
			
		public function manageCustomer(){
		  $managecustomer = DB::table('customers')->orderBy('id','Asc')->get();
            return view("customers.activation")->with('managecustomer', $managecustomer);
        }

        public function manageDepositsCustomers(){
		  $managedepositscustomers = DB::table('deposits_customers')->orderBy('id','Asc')->get();
            return view("customers.deposits_customers")->with('managedepositscustomers', $managedepositscustomers);
        }
}
