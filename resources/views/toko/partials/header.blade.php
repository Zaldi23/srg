<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-time"></i>Selasa, 31 Agustus 2021 - 20:30 WIB</li>
                        </ul>
                    </div>
                   
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                         <ul class="list-inline pull-right col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <li class="hidden-xs col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                <marquee style="padding-top: 4px; color: rgb(32, 158, 21);">Selamat Datang di Aplikasi SRG (Sistem Resi Gudang) - Dinas Perindustrian dan Perdagangan Kabupaten Kebumen</marquee>
                            </li>
                        </ul>
        
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('toko/images/logo.png')}}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <div class="mobile-nav"></div>
                </div>
                
                <div class="col-lg-6 col-md-3 col-12">
                    <div class="right-bar">
                        <div class="sinlge-bar shopping">
                            <a href="{{route('login')}}" class="single-icon">MASUK </a>
                            <!-- Shopping Item -->
                            
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner bg-success">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                                <li class="active"><a href="#">Beranda</a></li>
                                                <li><a href="#">Produk Kami</a></li>
                                                <li><a href="{{url('berita')}}">Berita</a>
                                                </li>
                                                <li><a href="{{route('statistik.index')}}">Statistik</a>
                                                </li>
                                                <li><a href="#">Kontak Kami<i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop-grid.html">+6282296669383<i class="ti-headphone-alt"></i></a> 
                                                        </li>
                                                    </ul>
                                                </li>
                                            
                                            </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->