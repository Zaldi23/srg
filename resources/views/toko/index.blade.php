@extends('toko.partials.master')

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
	
	
	@include('toko.partials.header')
	
	<!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0"   class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('toko/images/banner1.png')}}" alt="First slide">
                    <div class="carousel-caption d-md-block text-white">
                        <h5>Kisah Sukses Petani Cabai</h5>
                        <p class=" text-white"> <a class="nav-link" data-toggle="tab" href="#women" role="tab">Baca selengkapnya...</a></p>  
                    </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('toko/images/banner2.png')}}" alt="Second slide">
                    <div class="carousel-caption d-md-block text-white">
                    <h5>Kisah Sukses Petani Cabai Omset 10 Juta</h5>
                    <p class=" text-white"> <a class="nav-link" data-toggle="tab" href="#women" role="tab">Baca selengkapnya...</a></p>  
                    </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('toko/images/banner3.png')}}" alt="Third slide">
                    <div class="carousel-caption d-md-block text-white">
                    <h5>Kisah Sukses Petani Cabai Rawit</h5>
                    <p class=" text-white"> <a class="nav-link" data-toggle="tab" href="#women" role="tab">Baca selengkapnya...</a></p>  
                    </div>
            </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
	
	<!-- Start Small Banner  -->
	<section class="small-banner section">
		<div class="container-fluid">
			<div class="row">
			</div>
		</div>
	</section>
	<!-- End Small Banner -->
	
	<!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Produk Cabai Kebumen</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-bg-success">
                        <div class="nav-main">
                            {{-- <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Cabai Keriting</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Cabai Rawit Merah</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Cabai Rawit Hijau</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accessories" role="tab">Produk Hasil Tani</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#essential" role="tab">Produk Hasil Kelompok Tani</a></li>
                            </ul>
                            <!--/ End Tab Nav --> --}}
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        @foreach ($komoditas as $item)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a>
                                                            @switch($item->kategori_komoditas_detail_id)
                                                                @case(1)
                                                                    <img class="default-img" src="{{asset('toko/images/produk1.png')}}" alt="#">
                                                                    @break
                                                                @case(2)
                                                                    <img class="default-img" src="{{asset('toko/images/produk2.png')}}" alt="#">
                                                                    @break
                                                                @case(3)
                                                                    <img class="default-img" src="{{asset('toko/images/produk3.png')}}" alt="#">
                                                                    @break
                                                                @case(4)
                                                                    <img class="default-img" src="{{asset('toko/images/produk4.png')}}" alt="#">
                                                                    @break
                                                                @case(5)
                                                                    <img class="default-img" src="{{asset('toko/images/produk5.png')}}" alt="#">
                                                                    @break
                                                                @case(6)
                                                                    <img class="default-img" src="{{asset('toko/images/produk6.png')}}" alt="#">
                                                                    @break
                                                                @default
                                                                    
                                                            @endswitch
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action-2">
                                                                Hasil tani Bpk.{{$item->user_info->nama}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        {{$item->kategori_komoditas_detail->keterangan}} dengan mutu <button class="btn-sm btn-success">{{$item->verifikasi_kualitas->mutu}}</button>
                                                        <br>
                                                        kuantitas = {{$item->kuantitas-$item->terjual}} Kg
                                                        @if ($item->terjual == true)
                                                            <br>
                                                            <button class="btn-sm btn-danger">Terjual</button>
                                                        @endif
                                                        <div class="product-price">
                                                            <span>Rp.{{$item->harga_jual}}</span>
                                                        </div>
                                                        @if ($item->terjual == true)
                                                            <a target="_blank" href="https://api.whatsapp.com/send?phone={{$item->user_info->user->nomor_hp}}" class="btn btn-primary">
                                                                Hubungi Petani
                                                            </a>
                                                        @else
                                                            <a target="_blank" href="https://api.whatsapp.com/send?phone={{$item->user_info->user->nomor_hp}}&text=Saya%20%20ingin%20membeli%20{{$item->kategori_komoditas_detail->keterangan}}%20dengan%20kuantitas%20{{$item->kuantitas}}kg%20dengan%20kode%20komoditas%20{{$item->id}}" class="btn btn-primary">
                                                                Hubungi Petani
                                                            </a>
                                                        @endif
                                                        <style>
                                                            a:visited{
                                                                color: #FFF;
                                                            }
                                                        </style>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Product Area -->
@endsection