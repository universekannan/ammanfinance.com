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
use Illuminate\Support\Facades\Hash;

use Exception;
use App\Models\Core\Images;
use Validator;
use Auth;
use ZipArchive;
use File;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class TestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
		
        
/******   Manage Users  Start ******/
		
        public function manageTest(){
		
	        return view("test.index");
        }
/******   Manage Users End ******/


/******   Add Users  Start ******/
		
		
/******   Add Users End ******/

/******   Edit Users  Start ******/

        public function editUser(Request $request){

            $edituser = DB::table('users')->where('id',$request->id)->update([
                'full_name'             =>   $request->full_name,
                'email'	                =>   $request->email,
                'mobile_number'	        =>   $request->mobile_number,
                'district_name'	        =>   $request->district_name,
                'village_name'	        =>   $request->village_name,
                'city'	                =>   $request->city,
                'gender'		        =>   $request->gender,
                'role_id'		        =>   $request->role_id,
                'status'		        =>   $request->status,
                'updated_at'	        =>	 date('Y-m-d H:i:s'),
                ]);
				            //Print_r($edituser);die();

                return redirect()->back(); 
            }
/******   Edit Users End ******/

/******    Delete Users  Start ******/

        public function deleteUser(Request $request){
            $deluser = DB::table('users')->where('id',$request->id)->delete();
            return redirect()->back(); 
        }

/******   Delete Users  End ******/

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
