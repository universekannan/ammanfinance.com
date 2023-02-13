<style>
  .dropdown-item {
    display: inline-block !important;
    width: 100%;
    padding: .25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: normal !important;
    background-color: transparent;
    border: 0;
  }
</style>
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <div class="user-panel d-flex" style="margin-top:3px">
        <div class="image">
          <img src="{!! asset('dist/img/user2-160x160.jpg') !!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a style="color:#fff" href="{{url('/profile')}}" class="d-block">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</a>
        </div>
      </div>

      <?php 
        $currentdateTime = date('Y-m-d');
        $dayaftertomorrow = date('Y-m-d',strtotime("+3 days"));
        $domainExpiry = DB::table('tb_user')->whereDate('end_date',$dayaftertomorrow)->get(); 
        foreach($domainExpiry as $domExpiry){
          $noticheck = DB::table('notification')->where('shop_id',$domExpiry->id)->where('comments','Domain Expired')->whereDate('created_at',$currentdateTime)->count(); 
          if($noticheck == 0){
            $domainNoti = DB::table('notification')->insert([
              'shop_id' => $domExpiry->id,
              'shop_name' => $domExpiry->shop_name,
              'comments' => 'Domain Expired',
              'created_at'=> date('Y-m-d H:i:s'),
              'status'=> 1,
            ]);
          }
        }
      ?>

    
    <?php $permission = DB::table('user_permission')->where('user_types_id',auth()->user()->role_id)->first(); ?>
      @if($permission->notification == 1)
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge" id="ajaxNotiCount"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div id="ajaxNoti"></div>
          </div>
          
        </li>
      @endif
      
      <li class="nav-item">
        <a class="nav-link" href="{{url('/logout')}}" >
          <i class="fas fa-lock"></i>
        </a>
      </li>
    </ul>
  </nav>

