<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
      
      <img src="{{ asset('admin/dist/img/AdminLogo.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="text-transform: uppercase"><b>{{ env('APP_NAME') }}</b></span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
  </aside>
