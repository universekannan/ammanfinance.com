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



class DepositsActivationController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 
  /****** View  Roles Start ******/
  public function manageDepositsCustomers(){
    $managesdepositscustomers = DB::table('deposits_activation')->where('status',1)->get();

    return view("depositscustomers.all-activation")->with('managesdepositscustomers',$managesdepositscustomers);
  }


  public function manageDepositsActivation ($id){
    $managedepositscustomer = DB::table('deposits_customers')->where('id',$id)->get();
    //$manageactivationdetails = DB::table('activation_details')->where('customer_id',$id)->get();
    $manageinterest = DB::table('deposits_interest')->where('status',1)->get();
    $managedepositsactivation = DB::table('deposits_activation')->where('customer_id',$id)->get();

    $managedepositsactivation = json_decode(json_encode($managedepositsactivation),true);

    foreach($managedepositsactivation as $key1 => $result){
      $activation_id = $result["id"];
      $today = date("Y-m-d");
      $from_date = $result["from_date"];
      $interest = $result["intrest"];
      $credit_amount = $result["credit_amount"];
      $datediff = strtotime($today)  - strtotime($from_date);
      $days = round($datediff / (60 * 60 * 24));
      $intrestamount = $credit_amount * (($interest/365)*$days)/100;
      $intrestamount = number_format($intrestamount,2);
      $amount = str_replace( ',', '', $intrestamount );
      if( is_numeric( $amount ) ) {
      $intrestamount = $amount;
      }
      $managedepositsactivation[$key1]["intrestamount"] = $intrestamount;

      $sql_details = "select * from deposits_activation_details where activation_id = $activation_id";
      $details = DB::select(DB::raw($sql_details));
      $details = json_decode(json_encode($details),true);

      $managedepositsactivation[$key1]["details"] = $details;
    }

    //echo "<pre>";print_r($manageactivation);echo "</pre>";die;


    return view("depositscustomers.activation")->with('managedepositscustomer',$managedepositscustomer)->with('managedepositsactivation',$managedepositsactivation)->with('manageinterest',$manageinterest);
  }
  public function addDepositsActivation(Request $request){

    $depositsactivation = DB::table('deposits_activation')->insertGetId([
      'page_number'		 	    =>   $request->page_number,
      'customer_id'			  	=>   $request->customer_id,
      'item_name'                 =>   $request->item_name,
      'item_details'              =>   $request->item_details,
      'measurement'               =>   $request->measurement,
      'credit_amount'             =>   $request->credit_amount,
      'intrest'                   =>   $request->intrest,
      'from_date'                 =>   $request->from_date,
      'status'                    =>   1,
      'created_at'                =>   date('Y-m-d H:i:s'),
      'login_id'                  =>   $request->login_id,
    ]);
    
  

    return redirect("/depositsactivation/".$request->customer_id)->with('success', 'Activation Created Successfully');

  }

  public function editDepositsActivation(Request $request){
    $depositsactivation = DB::table('deposits_activation')->where('id',$request->id)->update([
      'page_number'		 	    =>   $request->page_number,
      'customer_id'			  	=>   $request->customer_id,
      'item_name'                 =>   $request->item_name,
      'item_details'              =>   $request->item_details,
      'measurement'               =>   $request->measurement,
      'credit_amount'             =>   $request->credit_amount,
      'intrest'                   =>   $request->intrest,
      'from_date'                 =>   $request->from_date,
      'status'                    =>   $request->status,
      'updated_at'                =>   date('Y-m-d H:i:s'),
      'login_id'                  =>   $request->login_id,
    ]);
                            //Print_r($edituser);die();
    return redirect("/depositsactivation/".$request->customer_id)->with('success', 'Activation Updated Successfully');
  }

  public function addDepositsActivationDetails(Request $request){
    $balance_amount = $request->balance_amount;
    if($balance_amount < 0) $balance_amount = 0;
    $adddepositsactivationdetails = DB::table('deposits_activation_details')->insert([
      'customer_id'               =>   $request->customer_id,
      'activation_id'             =>   $request->activation_id,
      'customer_id'               =>   $request->customer_id,
      'intrest'                   =>   $request->intrest,
      'from_date'                 =>   $request->from_date,
      'to_date'                   =>   date('Y-m-d'),
      'credit_amount'             =>   $request->credit_amount,
      'intrest_amount'            =>   $request->intrest_amount,
      'pay_amount'                =>   $request->pay_amount,
      'total_amount'              =>   $request->total_amount,
      'balance_amount'            =>   $balance_amount,
      'status'                    =>   $request->status,
      'credit_debit'              =>   "Credit",
      'created_at'                =>   date('Y-m-d H:i:s'),
      'login_id'                  =>   $request->login_id,
    ]);

    $editdepositsactivation = DB::table('deposits_activation')->where('id',$request->activation_id)->update([
      'status'                    =>   1,
      'credit_amount'             =>   round($request->balance_amount),
      'from_date'                 =>   date('Y-m-d'),
      'updated_at'                =>   date('Y-m-d H:i:s'),
      'login_id'                  =>   auth()->user()->id,
   ]);
    return redirect("/depositsactivation/".$request->customer_id)->with('success', 'Activation Created Successfully');
  }


public function WithdrawDeposits(Request $request){
    $balance_amount = $request->balance_amount;
    if($balance_amount < 0) $balance_amount = 0;
     if($request->balance_amount == '0') {
         $status = 2;
  } else {
    $status = 1;
  }
    $WithdrawDeposits = DB::table('deposits_activation_details')->insert([
      'customer_id'               =>   $request->customer_id,
      'activation_id'             =>   $request->activation_id,
      'customer_id'               =>   $request->customer_id,
      'intrest'                   =>   $request->intrest,
      'from_date'                 =>   $request->from_date,
      'to_date'                   =>   date('Y-m-d'),
      'credit_amount'             =>   $request->credit_amount,
      'intrest_amount'            =>   $request->intrest_amount,
      'pay_amount'                =>   $request->pay_amount,
      'total_amount'              =>   $request->total_amount,
      'balance_amount'            =>   $balance_amount,
      'status'                    =>   $status,
      'credit_debit'              =>   "Debit",
      'created_at'                =>   date('Y-m-d H:i:s'),
      'login_id'                  =>   $request->login_id,
    ]);

    $Withdraw = DB::table('deposits_activation')->where('id',$request->activation_id)->update([
      'status'                    =>   $status,
      'credit_amount'             =>   round($request->balance_amount),
      'from_date'                 =>   date('Y-m-d'),
      'updated_at'                =>   date('Y-m-d H:i:s'),
      'login_id'                  =>   auth()->user()->id,
   ]);
  
    return redirect("/depositsactivation/".$request->customer_id)->with('success', 'Activation Created Successfully');
  }


  public function deleteDepositsActivation(Request $request){
    $deletedepositsactivation = DB::table('deposits_activation')->where('id',$request->id)->delete();
    $deletedepositsActivationDetails = DB::table('deposits_activation_details')->where('activation_id',$request->id)->delete();

    return redirect("/depositsactivation/".$request->customer_id)->with('success', 'Activation Delete Successfully');
  }
}
