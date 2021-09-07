@extends('toko.partials.master')
 <!-- Bootstrap -->

@section('konten')
    
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<div class="spinner-grow text-success" style="width: 5rem; height: 5rem;" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
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
													<li><a href="#">Berita</a>
													</li>
                                                    <li><a href="#">Statistik</a>
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
	
	<!-- Slider Area -->
	<!-- START ALERTS AND CALLOUTS -->
    <div class="container">
    <!-- Content here -->      <br>      <br>
			<div class="row">
                <div class="col-md-8">
            <div class="card card-default">
            <div class="card-header bg-white">
                <h4 class="card-title"><i class="ti-menu-alt"></i>
                    List Berita
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="line-style"></div>
				<blockquote class="testimonial-success" style="margin-bottom: 10px; margin-top: 10px;">
                <a href="#">
                <img src="{{asset('/Toko/images/gambar1.png')}}" class="img-thumbnail" style="width: 150px; margin-right: 11px;" align="left">
                </a>
                <h4 style="margin-top: 0px;"><a href="#" style="color: #19a34e;">PETANI CABAI INI SAPAI OMSET 10 JUTA PERBULAN</a></h4>
                <div style="margin-top: -5px;">
                <span style="font-size: 11px; margin-right: 13px;"><i class="fa fa-book"></i> Berita Terbaru</span>
                <span style="font-size: 11px; margin-right: 13px;"><i class="fa fa-calendar"></i> 07 Mei 2021 10:43:31 WIB</span>
                <span style="font-size: 11px; margin-right: 13px;"><i class="fa fa-user"></i> Administrator</span>
                </div>
                <div style="margin-top: 15px; font-size: 13px;">
                <p>&nbsp; &nbsp; Kebumen - Selasa, 4 Mei 2021 telah dilaksanakan kegiatan sembako murah. kegiatan ini&nbsp; merupakan program inisiasi dari DPRD Provinsi Jawa Tengah bekerja
				sama dengan Dinas Perindustrian dan Perdagangan Provinsi Jawa Tengah dengan
				metode lelang / dipihak ketigakan yang dilaksanakan di beberapa Kabupaten di
				Provinsi Jawa Tengah.&nbsp;Penerima
				paket sembako&#8230;</p>  
                <a href="#"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
                </div>
            </blockquote>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <div class="card card-default">
            <div class="card-header bg-white">
                <h5 class="card-title"><i class="ti-folder"></i>
                Arsip Berita Terbaru
                </h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="callout callout-danger">
				<ul class="list-group"  type="button" type="button" active">
				<li class="list-group-item d-flex justify-content-between align-items-center">
					September 2021
					<span class="badge badge-primary bg-primary badge-pill">14 Artikel</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					Oktober 2021
					<span class="badge badge-primary bg-primary badge-pill">2 Artikel</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					Desember 2020
					<span class="badge badge-primary bg-primary badge-pill">1 Artikel</span>
				</li>
				</ul>
                </div>

            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ALERTS AND CALLOUTS -->
        </div>
        <br>      <br>
@endsection