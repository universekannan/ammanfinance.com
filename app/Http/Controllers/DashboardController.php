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
use DateTime;
use Carbon\CarbonPeriod;
use PDF;
use DateInterval;

class DashboardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /******   dashboard Start ******/

        public function dashboard(){
			$today = date('Y-m-d');
			
            $sql = " select count(*) as Customers from customers where status='1'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $Customers = $result[0]->Customers;
            }
			
            $sql = " select count(*) as Activations from activation where status='1'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $Activations = $result[0]->Activations;
            }	

			
            $sql = "SELECT SUM(credit_amount) as TotalGoldLoans FROM activation WHERE status = '1'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $TotalGoldLoans = $result[0]->TotalGoldLoans;
            }

            $sql = " select count(*) as GoldLoansRemind from customers where follow_date='$today'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $GoldLoansRemind = $result[0]->GoldLoansRemind;
            }
			
            $sql = " select count(*) as InvestmentCustomers from deposits_customers where status='1'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $InvestmentCustomers = $result[0]->InvestmentCustomers;
            }
			
			$sql = " select count(*) as InvestmentActivations from deposits_activation where status='1'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $InvestmentActivations = $result[0]->InvestmentActivations;
            }
			
			
            $sql = "SELECT SUM(credit_amount) as TotaInvestment FROM deposits_activation WHERE status = '1'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $TotaInvestment = $result[0]->TotaInvestment;
            }
			
			
            $sql = " select count(*) as InvestmentRemind from customers where follow_date='$today'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $InvestmentRemind = $result[0]->InvestmentRemind;
            }
			
			  $sql = "SELECT SUM(credit_amount) as  todaygold FROM activation WHERE from_date = '$today'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $todaygold = $result[0]->todaygold;
            }
			
       $sql = "SELECT SUM(credit_amount) as  todaydeposits FROM deposits_activation WHERE from_date = '$today'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $todaydeposits = $result[0]->todaydeposits;
            }
      
			
			
			$sql = " select count(*) as Users from users where status='1'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
              $Users = $result[0]->Users;
            }


			
            return view("dashboard", compact('Customers','Activations','Users','GoldLoansRemind','TotalGoldLoans','TotaInvestment','InvestmentCustomers','InvestmentCustomers','InvestmentActivations','InvestmentRemind','todaygold','todaydeposits'));

        }

    /******   dashboard end ******/

}
