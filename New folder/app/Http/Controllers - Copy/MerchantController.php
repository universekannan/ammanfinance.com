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


class MerchantController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


   

    /******   Manage Plan  Start ******/

        public function managePlan(){
            $manageplan = DB::table('manage_plan')->orderBy('sort_order','Asc')->get();
            return view("merchant.manage_plan")->with('manageplan', $manageplan);
        }

    /******   Manage Plan End ******/


    /******   Add Plan  Start ******/

        public function addPlan(Request $request){

    

            $addplan = DB::table('manage_plan')->insert([
                'name'                  =>   $request->name,
                'plan_method'           =>   'plan',
                'domain_req_count'	    =>   $request->domain_req_count,
                'description'	        =>   $request->description,
                'amount'	            =>   $request->amount,
                'status'		        =>   $request->status,
                'sort_order'            =>   '1',
                'created_at'	        =>	 date('Y-m-d H:i:s'),
                ]);

            return redirect()->back(); 
        }

    /******   Add Plan End ******/

     /******   Edit Plan  Start ******/

        public function editPlan(Request $request){

            $editplan = DB::table('manage_plan')->where('id',$request->id)->update([
                'name'                  =>   $request->name,
                'domain_req_count'	    =>   $request->domain_req_count,
                'description'	        =>   $request->description,
                'amount'	            =>   $request->amount,
                'status'		        =>   $request->status,
                'updated_at'	        =>	 date('Y-m-d H:i:s'),
                ]);

            return redirect()->back(); 
        }

    /******   Edit Plan End ******/

     /******    Delete Plan  Start ******/

        public function deletePlan(Request $request){

            $delplan = DB::table('manage_plan')->where('id',$request->id)->delete();
            return redirect()->back(); 

        }

    /******   Delete Plan  End ******/


    /******    Sorting Plan  Start ******/

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

    /******    Sorting Plan  End ******/


}
