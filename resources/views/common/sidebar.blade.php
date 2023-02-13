 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
<img src="{!! asset('dist/img/AdminLTELogo.png') !!}" alt="Amman Finance Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Amman Finance</span>
    </a>
    <div class="sidebar">
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{!! asset('dist/img/user2-160x160.jpg') !!}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="#" class="d-block">{{auth()->user()->full_name}}</a>
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

          <li class="nav-item has-treeview {{ Request::is('users') || Request::is('users') || Request::is('users') || Request::is('users') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{url('/users')}}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>

            </ul>
          </li>

            <li class="nav-item has-treeview {{ Request::is('customers') || Request::is('customers') || Request::is('customers') || Request::is('customers') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{url('/customers')}}" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>

            </ul>
          </li>
            <li class="nav-item has-treeview {{ Request::is('customers') || Request::is('customers') || Request::is('customers') || Request::is('customers') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{url('/blocks')}}" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blocks</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview {{ Request::is('customers') || Request::is('customers') || Request::is('customers') || Request::is('customers') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Profail
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{url('/customers')}}" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profail</p>
                </a>
              </li>
			<li class="nav-item">
            <a href="{{url('/customers')}}" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup</p>
                </a>
              </li>
			<li class="nav-item">
            <a href="{{url('/customers')}}" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
            <a href="{{url('/logout')}}" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>
            </ul>
          </li>
		  
        </ul>
      </nav>
    </div>
  </aside>


