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



class DepositsCustomersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /****** View  Roles Start ******/

        public function manageDepositsCustomers(){
		  $managedepositscustomers = DB::table('deposits_customers')->orderBy('id','Asc')->get();
            return view("depositscustomers.index")->with('managedepositscustomers', $managedepositscustomers);
        }

    /******   View Roles  end ******/


              public function addDepositsCustomer(Request $request){
               $mobile_number = trim($request->get('mobile_number'));
                $emailcheck = DB::table('deposits_customers')->select('mobile_number')->where('mobile_number','=',$mobile_number)->get();

               if(count($emailcheck) > 0){
            return redirect('/depositscustomers')->with('error', 'This User already Exist');
        }else{

                $adddepositscustomer = DB::table('deposits_customers')->insert([
                'full_name'		 	    	=>   $request->full_name,
                'mobile_number'			  	=>   $request->mobile_number,
                'id_proof'                  =>   $request->id_proof,
                'gender'                    =>   $request->gender,
                'age'                       =>   $request->age,
                'address'                   =>   $request->address,
                'status'                    =>   1,
                'date'                      =>   date('Y-m-d H:i:s'),
                'login_id'                  =>   $request->login_id,
               
                ]);

                return redirect('/depositscustomers')->with('success', 'Customer Created Successfully');
        }
			  }
    
 
     /****** Edit  Roles Start ******/

             public function editDepositsCustomer(Request $request){
             $editdepositscustomer = DB::table('deposits_customers')->where('id',$request->id)->update([
                'full_name'		 	    	=>   $request->full_name,
                'mobile_number'			  	=>   $request->mobile_number,
                'id_proof'                  =>   $request->id_proof,
                'gender'                    =>   $request->gender,
                'age'                       =>   $request->age,
                'address'                   =>   $request->address,
                'status'                    =>   $request->status,
                'date'                      =>   date('Y-m-d H:i:s'),
                'login_id'                  =>   $request->login_id,
                ]);

                return redirect('/depositscustomers')->with('success', 'Customer Updated Successfully'); 
            }
			
		public function manageDepositsCustomer(){
		  $managedepositscustomer = DB::table('deposits_customers')->orderBy('id','Asc')->get();
            return view("depositscustomers.activation")->with('managedepositscustomer', $managedepositscustomer);
        }

}
