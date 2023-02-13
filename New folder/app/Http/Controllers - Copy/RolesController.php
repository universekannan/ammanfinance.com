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
use Carbon\Carbon;



class RolesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
     /****** Add Manage Roles Action Start ******/

        public function managePermissions($id){

            $roles = DB::table('user_permission')->where('user_types_id',$id)->first();
            return view("permissions.index")->with('roles', $roles)->with('role_id',$id);
        
        }
		
		
        public function addManageRolesAction(Request $request){

            $mangeRolesUpdate = DB::table('user_permission')->where('user_types_id',$request->user_types_id)->update([
                'roles'                     => $request->roles,
                'addrole'                   => $request->addrole,
                'editrole'                  => $request->editrole,
                'deleterole'                => $request->deleterole,
                'dashboard'                 => $request->dashboard,
                'users'                     => $request->users,
                'adduser'                   => $request->adduser,
                'edituser'                  => $request->edituser,
                'deleteuser'                => $request->deleteuser,
                'patients'                  => $request->patients,
                'addpatient'                => $request->addpatient,
                'editpatient'               => $request->editpatient,
                'deletepatient'             => $request->deletepatient,
                'blocks'                    => $request->blocks,
                'addblock'                  => $request->addblock,
                'editblock'                 => $request->editblock,
                'deleteblock'               => $request->deleteblock,
                'rooms'                     => $request->rooms,
                'addroom'                   => $request->addroom,
                'editroom'                  => $request->editroom,
                'deleteroom'                => $request->deleteroom,
				]);

                return redirect()->back();
        }

    /******  Add Manage  Roles Action end ******/

    /** Add  Manage Roles Start **/

        public function managePermissions($id){

            $roles = DB::table('user_permission')->where('user_types_id',$id)->first();
            return view("permissions.index")->with('roles', $roles)->with('role_id',$id);
        
        }

    /**   Add  Manage Roles end **/


}
