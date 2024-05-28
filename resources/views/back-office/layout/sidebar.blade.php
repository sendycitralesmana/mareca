<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/back-office/dashboard" class="brand-link">
        <div class="d-flex ">
            <div>
                <img src="{{ asset('images/mareca-logo.png') }}" alt="AdminLTE Logo" class="brand-image"
                    style="opacity: .8; width: 100%">
            </div>
            <div class="ml-2">
                <span class="brand-text" style="text-transform: uppercase"> <b>Mareca</b> </span>
            </div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 mb-3 text-center">

            <div class="info">
                <p style="text-transform: uppercase">
                    <b>{{ auth()->user()->role->role }}</b>
                </p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/back-office/dashboard"
                        class="nav-link {{ request()->is('back-office/dashboard', 'back-office/dashboard/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                {{-- @if (auth()->user()->role_id == 1) --}}

                    <li class="nav-item has-treeview {{ request()->is('back-office/user-data/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('back-office/user-data/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chalkboard-user"></i>
                            <p>
                                Data Pengguna
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/back-office/user-data/role"
                                    class="nav-link {{ request()->is('back-office/user-data/role', 'back-office/user-data/role/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Peran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/back-office/user-data/user"
                                    class="nav-link {{ request()->is('back-office/user-data/user', 'back-office/user-data/user/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Pengguna</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                {{-- @endif --}}

                @if (auth()->user()->role_id == 2)
                    <li class="nav-item">
                        <a href="/back-office/service"
                            class="nav-link {{ request()->is('back-office/service', 'back-office/service/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-file-signature"></i>
                            <p>
                                Layanan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/back-office/portfolio"
                            class="nav-link {{ request()->is('back-office/portfolio', 'back-office/portfolio/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Proyek
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('back-office/blog-data/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('back-office/blog-data/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Data Blog
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/back-office/blog-data/category"
                                    class="nav-link {{ request()->is('back-office/blog-data/category', 'back-office/blog-data/category/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/back-office/blog-data/blog"
                                    class="nav-link {{ request()->is('back-office/blog-data/blog', 'back-office/blog-data/blog/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Blog</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/back-office/client"
                            class="nav-link {{ request()->is('back-office/client', 'back-office/client') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users-rectangle"></i>
                            <p>
                                Klien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/back-office/message"
                            class="nav-link {{ request()->is('back-office/message', 'back-office/message') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>
                                Pesan
                            </p>
                        </a>
                    </li>
                @endif

                {{-- @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                <li class="nav-item has-treeview {{ request()->is('back-office/pengguna/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('back-office/pengguna/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-user"></i>
                        <p>
                            Akun Pengguna
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/back-office/pengguna/admin"
                                class="nav-link {{ request()->is('back-office/pengguna/admin', 'back-office/pengguna/admin/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/back-office/pengguna/dosen"
                                class="nav-link {{ request()->is('back-office/pengguna/dosen', 'back-office/pengguna/dosen/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/back-office/pengguna/mahasiswa"
                                class="nav-link {{ request()->is('back-office/pengguna/mahasiswa', 'back-office/pengguna/mahasiswa/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Mahasiswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
