<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('Gambar/Admin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            {{Auth::user()->role->keterangan}}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('Gambar/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('beranda')}}" class="d-block">
                    {{ucwords(Auth::user()->name)}}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @switch(Auth::user()->role_id)
                @case(1)                  {{-- PETANI --}}  
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('komoditas.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Komoditas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('petani.detail')}}" class="nav-link">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Akun
                                </p>
                            </a>
                        </li>
                    </ul>
                    @break
                @case(2)                    {{-- LPK --}}
                    
                    @break
                @case(3)                    {{-- PENGELOLA GUDANG --}}
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('komoditas.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-upload"></i>
                                <p>
                                    Komoditas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('petani.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Petani
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('kecamatan.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-map"></i>
                                <p>
                                    Kecamatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('desa.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Desa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('gudang.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-archive"></i>
                                <p>
                                    Gudang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('kelompok-tani.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Kelompok Tani
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('jenis-cabai.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Jenis Cabai
                                </p>
                            </a>
                        </li>
                    </ul>
                    @break
                @default
                    
            @endswitch
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>