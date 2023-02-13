<style>
   .dropdown-content {
   display: none;
   position: absolute;
   background-color: #f9f9f9;
   min-width: 160px;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
   z-index: 1;
   }
   .dropdown-content a {
   color: black;
   padding: 7px 7px;
   text-decoration: none;
   text-align: left;
   display: block;
   }
   .dropdown-content a:hover {background-color: #f1f1f1}
   .dropdown:hover .dropdown-content {
   display: block;
   }
   legend {
   font-size: 14px;
   font-weight: bold;
   margin-bottom: 0px;
   width: 100%;
   border: 1px solid #c5cbfc;
   border-radius: 5px;
   padding: 5px 5px 5px 10px;
   background-color: #343a40;
   }
   legend {
   border: 0;
   padding: 0;
</style>
<?php
   $permission = DB::table('user_permission')->where('user_id',auth()->user()->id)->first();
   ?>
<div class="preloader flex-column justify-content-center align-items-center">
   <img class="animation__shake" src="{!! asset('dist/img/AdminLTELogo.png') !!}" alt="AdminLTELogo" height="60" width="60">
</div>
<center>
   <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <!-- Left navbar links -->
      <legend class="scheduler-border">
      <ul class="navbar-nav">
         <div>
            <div class="row">
               <a href="#" class="navbar-toggler order-1">
               <img src="http://127.0.0.1:8000/images/fleetopslogo.png" alt="AdminLTE Logo">
               </a>
               <li class="navbar-toggler order-1">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
            </div>
         </div>
         <?php if($permission->dashboard == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="{{url('/dashboard')}}">
            <img src="{!! asset('dist/img/icon/opd.png') !!}" style="width:50px"></br>
            <label>Dashboard</label>
            </a>
         </li>
         <?php } else{
            redirect()->intended('/login');
            } ?>
         <?php if($permission->users == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="{{url('/users')}}">
            <img src="{!! asset('dist/img/icon/user.png') !!}" style="width:50px"></br>
            <label>Users</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->users == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="{{url('/customers')}}">
            <img src="{!! asset('dist/img/icon/customers.png') !!}" style="width:50px"></br>
            <label>G Customers</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->billing == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="{{url('/activations')}}">
            <img src="{!! asset('dist/img/icon/gold-loan.png') !!}" style="width:50px"></br>
            <label>Gold Loans </label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->users == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="{{url('/depositscustomers')}}">
            <img src="{!! asset('dist/img/icon/customers.png') !!}" style="width:50px"></br>
            <label>D Customers</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->pharmacy == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="{{url('/depositsactivations')}}">
            <img src="{!! asset('dist/img/icon/deposit.png') !!}" style="width:50px"></br>
            <label>Deposits</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->investigation == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="">
            <img src="{!! asset('dist/img/icon/appointment.png') !!}" style="width:50px"></br>
            <label>Investigation</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->ot == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="">
            <img src="{!! asset('dist/img/icon/appointment.png') !!}" style="width:50px"></br>
            <label>OT</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->mrd == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="">
            <img src="{!! asset('dist/img/icon/appointment.png') !!}" style="width:50px"></br>
            <label>Expanse</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->appointments == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="">
            <img src="{!! asset('dist/img/icon/appointment.png') !!}" style="width:50px"></br>
            <label>Remind</label>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->dashboard == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <a href="">
               <img src="{!! asset('dist/img/icon/setting.png') !!}" style="width:50px"></br>
               <div class="dropdown">
            <a class="dropbtn">
            <label>Setting</label></a>
            <div class="dropdown-content">
            <a href="{{url('/users/userstype')}}">User Type</a>
            <a href="{{url('/users/setting')}}">Setting</a>
            <a href="{{url('/users/permissions')}}">Permissions</a>
            </div>
            </div>
            </a>
         </li>
         <?php } ?>
         <?php if($permission->dashboard == 1){ ?>
         <li class="nav-item d-none d-sm-inline-block col-md-1">
            <img src="{!! asset('dist/img/icon/logout.png') !!}" style="width:50px"></br>
            <div class="dropdown">
               <a class="dropbtn"><label>Log Out</label></a>
               <div class="dropdown-content">
                  <a href=""> User Details</a>
                  <a href="">Backup</a>
                  <a href="">Change Password</a>
                  <a href="{{url('/logout')}}">Log Out</a>
               </div>
            </div>
         </li>
         <?php } ?>
      </ul>
   </nav>
</center>