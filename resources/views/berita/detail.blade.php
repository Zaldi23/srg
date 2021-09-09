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
                        Berita / Detail
                        </h4>
                    </div>
                <!-- /.card-header -->
                <div class="card-body">
			<div class="line-style"></div>
                <div style="margin-top: 10px;">
                    <h4 style="color: #19a34e; font-size: 20px;">PETANI CABAI INI SAPAI OMSET 10 JUTA PERBULAN
                    </h4>
                    <div style="margin-top: -5px; margin-bottom: 10px;">
                        <span style="font-size: 11px; margin-right: 10px;"><i class="fa fa-book"></i> Berita Terbaru</span>
                        <span style="font-size: 11px; margin-right: 10px;"><i class="fa fa-calendar"></i> 07 Mei 2021 10:43:31 WIB</span>
                        <span style="font-size: 11px; margin-right: 10px;"><i class="fa fa-user"></i> Administrator</span>
                    </div>
                    <div class="separator bottom"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="#">
                            <div data-toggle="tooltip" data-placement="top"     data-original-title="Share Berita ke Facebook" class="facebook-hover social-slide">
                            </div>
                        </a>
                        <a href="#" >
                            <div data-toggle="tooltip" data-placement="top" data-original-title="Share Berita ke Twitter" class="twitter-hover social-slide">
                            </div>
                        </a>
                        <a href="#" >
                            <div data-toggle="tooltip" data-placement="top" data-original-title="Share Berita ke Google+" class="google-hover social-slide">
                            </div>
                        </a>
                </div>
            </div>
            
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-right: 0;">
                <div class="carousel-inner">
                    <div class="item active">
                        <img id="view-image" class="img-thumbnail" src="{{asset('/Toko/images/gambar1.png')}}" alt="" style="width:100%; height: 100%;">
                        <div class="image-description"></div>
                    </div>           
                </div>
            </div>
            <div style="border-top: 1px dotted #cccccc; margin-top: 10px; margin-bottom: 10px;"></div>
                <p class="MsoListParagraphCxSpFirst" style="margin-left:35.55pt;mso-add-space:<br />
                auto;text-align:justify;text-indent:-.25in;line-height:115%;mso-list:l0 level1 lfo1"><span style="font-size:12.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp; &nbsp; Kebumen - Selasa, 4 Mei 2021 telah dilaksanakan kegiatan sembako murah. kegiatan ini&nbsp; merupakan program inisiasi dari DPRD Provinsi Jawa Tengah bekerja<br />
                sama dengan Dinas Perindustrian dan Perdagangan Provinsi Jawa Tengah dengan<br />
                metode lelang / dipihak ketigakan yang dilaksanakan di beberapa Kabupaten di<br />
                Provinsi Jawa Tengah.&nbsp;</span><span style="text-indent: -0.25in; font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;">Penerima<br />
                paket sembako murah difasilitasi oleh masing-masing anggota DPRD Provinsi Jawa<br />
                Tengah sesuai daerah pemilihan.</span><span style="text-indent: -0.25in; font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;"><span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span><span style="text-indent: -0.25in; font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;">Paket<br />
                sembako murah berisi: Beras medium 5kg, minyak goreng 1liter dan gula pasir 1kg.&nbsp;</span><span style="text-indent: -0.25in; font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;">Untuk<br />
                mempermudah distribusi paket sembako murah pelaksanaan dilakukan di Dinas<br />
                Perindustrian dan Perdagangan Kabupaten.&nbsp;</span><span style="text-indent: -0.25in; font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;">Total<br />
                paket yang didistribusikan di Dinas Perindustrian dan Perdagangan Kabupaten<br />
                Kebumen sebanyak 8.300 paket selanjutnya dilakukan serah terima dari Ibu Muktiyo<br />
                Rini (Dinas Perindustrian dan Perdangan Provinsi Jawa tengah) dengan utusan anggota Dewan dengan disaksikan Rud Tomico<br />
                El Umam (Dinas Perindustrian dan Perdagangan Kab. Kebumen).&nbsp;</span><span style="text-indent: -0.25in; font-family: Arial, sans-serif; font-size: 12pt;">Total<br />
                paket tersebut kemudian didistribusikan lagi ke Banjarnegara sebanyak 1.850<br />
                paket dibawa oleh masing-masing utusan anggota DPRD, sehingga total paket<br />
                sembako yang didistribusikan di Dinas Perindustrian dan Perdagangan sebanyak<br />
                6.450 paket.</span>              
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
                        <li class="list-group-item d-flex justify-content-between   align-items-center">
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
        <br><br>
@endsection