<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::any('{query}', function() { return view('404'); })->where('query', '.*');

Route::fallback(function () {
    return view("404");
}); 
Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', 'App\Http\Controllers\AdminController@login');
Route::post('/checkLogin', 'App\Http\Controllers\AdminController@checkLogin');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

Route::get('/not_allowed', 'App\Http\Controllers\CommonController@notAllowed');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard');
    Route::post('/add_roles', 'App\Http\Controllers\RolesController@addManageRolesAction');
    Route::get('/permissions/{id}', 'App\Http\Controllers\RolesController@managePermissions');
    
    Route::get('/users', 'App\Http\Controllers\UsersController@manageUsers');
    Route::post('/add_user', 'App\Http\Controllers\UsersController@addUser');
    Route::post('/edit_user', 'App\Http\Controllers\UsersController@editUser');
    Route::post('/delete_user', 'App\Http\Controllers\UsersController@deleteUser');
    Route::post('/checkemail', 'App\Http\Controllers\UsersController@checkemail');
    
    Route::get('/users/attendance/{id}', 'App\Http\Controllers\UsersController@usersAttendance');

    Route::get('/users/permissions', 'App\Http\Controllers\PermissionsController@manageusers');
    Route::get('/userrole', 'App\Http\Controllers\PermissionsController@userrole');
    Route::post('/roles', 'App\Http\Controllers\PermissionsController@roles');
    Route::post('/addroles', 'App\Http\Controllers\PermissionsController@addRoles');
   
   Route::get('/customers', 'App\Http\Controllers\CustomersController@manageCustomers');
    Route::post('/add_customer', 'App\Http\Controllers\CustomersController@addCustomer');
    Route::post('/edit_customer', 'App\Http\Controllers\CustomersController@editCustomer');
    Route::post('/delete_customerr', 'App\Http\Controllers\CustomersController@deleteCustomer');
    
  
	Route::get('/activations', 'App\Http\Controllers\ActivationController@manageActivations');
	Route::post('/add_activation', 'App\Http\Controllers\ActivationController@addActivation');

	Route::get('/activation/{id}', 'App\Http\Controllers\ActivationController@manageActivation');
    Route::post('/edit_activation', 'App\Http\Controllers\ActivationController@editActivation');
	Route::post('/deleteactivation', 'App\Http\Controllers\ActivationController@deleteActivation');

    Route::post('/add_activationdetails', 'App\Http\Controllers\ActivationController@addActivationDetails');
	
//Deposits
	
    Route::get('/depositscustomers', 'App\Http\Controllers\DepositsCustomersController@manageDepositsCustomers');

	Route::get('/depositsactivation/{id}', 'App\Http\Controllers\DepositsActivationController@manageDepositsActivation');
   	Route::get('/depositsactivations', 'App\Http\Controllers\DepositsActivationController@manageDepositsActivations');

	Route::post('/add_depositsactivation', 'App\Http\Controllers\DepositsActivationController@addDepositsActivation');
    Route::post('/edit_deposits_activation', 'App\Http\Controllers\DepositsActivationController@editDepositsActivation');
	Route::post('/deletedepositsactivation', 'App\Http\Controllers\DepositsActivationController@deleteDepositsActivation');

    Route::post('/add_deposits_activation_details', 'App\Http\Controllers\DepositsActivationController@addDepositsActivationDetails');

	Route::post('/deletedepositsactivation', 'App\Http\Controllers\DepositsActivationController@deleteDepositsActivation');















    
});


