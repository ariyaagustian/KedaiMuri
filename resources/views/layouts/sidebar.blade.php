<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="Kedai Muri" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Kedai Muri</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- Master --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('master.bahan.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('master.menu.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('master.kategori.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('master.pegawai.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('master.user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('master.tax-services.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tax & Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('master.merchants.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Merchants</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Transaksi --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('transaksi.kasir.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kasir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('transaksi.biaya-lain-lain.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Biaya Lain Lain</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Laporan --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laba Rugi</p>
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
