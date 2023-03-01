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


  public function manageGoldCollection($from,$to){

    $goldreport = DB::table('activation_details')->where('to_date','>=',$from)->where('to_date','<=',$to)->orderBy('id','Desc')->get();


    $sql = "SELECT SUM(intrest_amount) as TotalGoldLoans FROM activation_details where to_date >= '$from' and to_date <= '$to'";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $TotalGoldLoans = $result[0]->TotalGoldLoans;
    }

    $sql = "SELECT SUM(pay_amount) as payamount FROM activation_details where to_date >= '$from' and to_date <= '$to'";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $payamount = $result[0]->payamount;
    }

    return view('reports.goldreports',compact('goldreport','from','to','TotalGoldLoans','payamount'));
  } 

  public function manageDepositsCollection($from,$to){

    $depositsreports = DB::table('deposits_activation_details')->where('to_date','>=',$from)->where('to_date','<=',$to)->orderBy('id','Desc')->get();
    

    $sql = "SELECT SUM(intrest_amount) as depositintrest FROM deposits_activation_details where to_date >= '$from' and to_date <= '$to'";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $depositintrest = $result[0]->depositintrest;
    }

    $sql = "SELECT SUM(pay_amount) as depositcredit FROM deposits_activation_details where to_date >= '$from' and to_date <= '$to' and credit_debit = 'Credit' ";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $depositcredit = $result[0]->depositcredit;
    }

    $sql = "SELECT SUM(pay_amount) as depositdebit FROM deposits_activation_details where to_date >= '$from' and to_date <= '$to' and credit_debit = 'Debit' ";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $depositdebit = $result[0]->depositdebit;
    }

    return view('reports.depositsreports',compact('depositsreports','from','to','depositintrest','depositcredit','depositdebit'));
  } 




}  