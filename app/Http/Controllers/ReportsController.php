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
use Illuminate\Support\Facades\Storage;
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



class ReportsController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 
  /****** View  Roles Start ******/


  public function manageGoldCollection(){

    $goldreport = DB::table('activation_details')->orderBy('id','Desc')->get();

    return view("reports.goldreports")->with('goldreport',$goldreport);
  } 

  public function manageDepositsCollection(){

    $depositsreports = DB::table('deposits_activation')->where('status',1)->get();

    return view("reports.depositsreports")->with('depositsreports',$depositsreports);
  } 




}  