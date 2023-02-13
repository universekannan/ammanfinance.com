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


class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
		
        
/******   Manage Users  Start ******/
		
        public function manageUsers(){
			$manageusers = DB::table('users')->select('users.*','user_groups.*','users.id as userID')
                ->Join('user_groups', 'user_groups.id', '=', 'users.role_id')
                ->orderBy('users.id','Asc')->get();

			$managenurse = DB::table('users')->select('users.*','user_groups.*','users.id as userID')
                ->Join('user_groups', 'user_groups.id', '=', 'users.role_id')
                ->where('users.role_id', '=','3')->orderBy('users.id','Asc')->get();

            $userrole = DB::table('user_groups')->where('status', '=','1')->where('id', '!=','1')->orderBy('id','Asc')->get();

            return view("users.index")->with('manageusers', $manageusers)->with('managenurse', $managenurse)->with('userrole', $userrole);

        }

    public function usersAttendance($id){
            $attendance = DB::table('attendances')->select('attendances.*','users.*','attendances.id as userID')
                ->Join('users', 'users.id', '=', 'attendances.user_id')
                ->orderBy('attendances.id','Asc')->get();
            return view("users.attendance")->with('attendance', $attendance);
        }
        

/****** Manage Users End ******/


/******   Add Users  Start ******/
		
        public function addUser(Request $request){

            $adduser = DB::table('users')->insertGetId([
                'full_name'             =>   $request->full_name,
                'email'	                =>   $request->email,
                'password'	            =>   Hash::make($request->password),
                'mobile_number'	        =>   $request->mobile_number,
                'district_name'	        =>   $request->district_name,
                'village_name'	        =>   $request->village_name,
                'city'	                =>   $request->city,
                'gender'		        =>   $request->gender,
                'role_id'		        =>   $request->role_id,
                'status'		        =>   $request->status,
                'created_at'	        =>	 date('Y-m-d H:i:s'),
                ]);
				            //Print_r($adduser);die();

            $addUserRoles = DB::table('user_permission')->insert([
                'user_id'         =>   $adduser,
                'role_id'		        =>   $request->role_id,
                'Login_id'              =>   auth()->user()->id,
                ]);
				  
            return redirect()->back(); 
        }
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
