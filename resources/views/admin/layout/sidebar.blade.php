      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Manage Data</li>
            <li class="dropdown {{ Route::is('users-admin.*') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Manage Users</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('users-admin.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user-admin.index') }}">Admin</a></li>
                <li class="{{ Route::is('') ? 'active' : '' }}"><a class="nav-link" href="index.html">Pengguna</a></li>
              </ul>
            </li>
            <li class="{{ Request::is('product.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('product.index') }}"><i class="far fa-square"></i> <span>Property</span></a></li>
            <li class="{{ Request::is('') ? 'active' : '' }}"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>News</span></a></li>

            <li class="menu-header">Setting</li>
            <li class="{{ Request::is('') ? 'active' : '' }}"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Aplication Config</span></a></li>
      </div>