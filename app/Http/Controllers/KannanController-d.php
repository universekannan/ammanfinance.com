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



class ActivationController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  /****** View  Roles Start ******/
  public function manageActivations(){
    $manageactivations = DB::table('activation')->where('status',1)->get();

    return view("customers.all-activation")->with('manageactivations',$manageactivations);
  }

  public function manageActivation($id){
    $managecustomer = DB::table('customers')->where('id',$id)->get();
    $manageactivationdetails = DB::table('activation_details')->where('customer_id',$id)->get();
    $manageinterest = DB::table('interest')->where('status',1)->get();
    $manageactivation = DB::table('activation')->where('customer_id',$id)->get();

			//echo "<pre>";print_r($manageactivation);echo "</pre>";die;
    foreach($manageactivation as $result){
      $today = date("Y-m-d");
      $from_date = $result->from_date;
      $interest = $result->intrest;
      $credit_amount = $result->credit_amount;
      $datediff = strtotime($today)  - strtotime($from_date);
      $days = round($datediff / (60 * 60 * 24));
      $intrestamount = $credit_amount * (($interest/365)*$days)/100;
      $intrestamount = number_format($intrestamount,2);
      $result->intrestamount = $intrestamount;
    }
    return view("customers.activation")->with('managecustomer',$managecustomer)->with('manageactivation',$manageactivation)->with('manageactivationdetails',$manageactivationdetails)->with('manageinterest',$manageinterest);
  }

  public function addActivation(Request $request){
    $addactivation = DB::table('activation')->insertGetId([
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
    
    $item_image = "";
    if ($request->hasFile('item_image')) {
      echo "yess";
      $item_image =  $addactivation.'.'.pathinfo($request->item_image, PATHINFO_EXTENSION); 
      //$filepath = public_path('uploads'.DIRECTORY_SEPARATOR);
      $file = $request->file('item_image');
      $file->move(public_path() . "uploads", $item_image);
      //move_uploaded_file($_FILES['item_image']['tmp_name'], $filepath.$item_image);
    }else{
      echo "nooo";
    }
    die;

    $sql = "update activation set item_image='$item_image' where id=$addactivation";
    DB::update(DB::raw($sql));

    return redirect("/activation/".$request->customer_id)->with('success', 'Activation Created Successfully');

  }

  public function editActivation(Request $request){
    $editactivation = DB::table('activation')->where('id',$request->id)->update([
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
    return redirect("/activation/".$request->customer_id)->with('success', 'Activation Updated Successfully');
  }

  public function addActivationDetails(Request $request){
    $balance_amount = $request->balance_amount;
    if($balance_amount < 0) $balance_amount = 0;
    $addactivationdetails = DB::table('activation_details')->insert([
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
      'created_at'                =>   date('Y-m-d H:i:s'),
      'login_id'                  =>   $request->login_id,
    ]);
    return redirect("/activation/".$request->customer_id)->with('success', 'Activation Created Successfully');
  }


  public function deleteActivation(Request $request){
    $deleteActivation = DB::table('activation')->where('id',$request->id)->delete();

    return redirect("/activation/".$request->customer_id)->with('success', 'Activation Delete Successfully');
  }

    return redirect("/activation/".$request->customer_id)->with('success', 'Activation Created Successfully');
  }
}
