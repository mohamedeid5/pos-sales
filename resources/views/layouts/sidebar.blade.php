<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview {{ openMenu(['admin/settings', 'admin/treasuries']) }}">
                    <a href="#" class="nav-link {{ request()->is('admin/settings*') || request()->is('admin/treasuries*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            General Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}" class="nav-link {{ activeUrl('admin/settings*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Settings</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.treasuries.index') }}" class="nav-link {{ activeUrl('admin/treasuries*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Treasuries</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview {{ openMenu(['admin/account-types*', 'admin/accounts*']) }}">
                    <a href="#" class="nav-link {{  activeUrl(['admin/account-types*', 'admin/accounts*']) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            accounts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.account-types.index') }}" class="nav-link {{ activeUrl('admin/account-types*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>accounts types</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.accounts.index') }}" class="nav-link {{ activeUrl('admin/accounts*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>accounts </p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview {{ openMenu(['admin/sales-material-types*', 'admin/stores*', 'admin/uoms*', 'admin/item-categories*', 'admin/item-cards*']) }} ">
                    <a href="#" class="nav-link {{ activeUrl(['admin/sales-material-types', 'admin/stores*', 'admin/uoms*', 'admin/item-categories*', 'admin/item-cards*']) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Treasuries Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sales-material-types.index') }}" class="nav-link {{ activeUrl('admin/sales-material-types*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>sales material types</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.stores.index') }}" class="nav-link {{ activeUrl('admin/stores*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>stores</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.uoms.index') }}" class="nav-link {{ activeUrl('admin/uoms*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uoms</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.item-categories.index') }}" class="nav-link {{ activeUrl('admin/item-categories*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>item categories</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.item-cards.index') }}" class="nav-link {{ activeUrl('admin/item-cards*') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>item cards</p>
                            </a>
                        </li>

                    </ul>
                </li>


            </ul>



        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
