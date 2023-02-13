 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
<img src="{!! asset('dist/img/AdminLTELogo.png') !!}" alt="Health Care Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
	<span class="brand-text font-weight-light">Health Care</span>
    </a>
	
    <div class="sidebar">
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{!! asset('dist/img/user2-160x160.jpg') !!}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="#" class="d-block">Alexander Pierce</a>
</div>
</div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/patients')}}" class="nav-link {{ Request::is('patients') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage Patients</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{url('/users')}}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage User</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>