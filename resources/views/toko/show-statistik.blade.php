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
	
	<!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        @if (isset($petani))
                            <h2>Statistik Hasil Cabai {{ucfirst($petani->nama)}}</h2>
                        @else
                            <h2>Statistik Hasil Cabai Desa {{ucfirst($desa->nama_desa)}}</h2>
                        @endif
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2">No</th>
                        <th scope="col" rowspan="2">Nama Barang</th>
                        <th scope="col" colspan="{{$totalDay}}" class="text-center">Bulan {{$waktu[1]}} Tahun {{$waktu[0]}}</th>
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= $totalDay; $i++)
                            <th class="text-center" scope="col" rowspan="2">{{$i}}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <th scope="row">1</th>
                        <td>Cabai Rawit</td>
                        @foreach ($komoditasCabaiRawit as $key => $item)
                            @if ($item->kuantitas === '-')
                                <td class="text-center">-</td>
                            @else
                                <td class="text-center">{{$item->kuantitas}} <small>Kg</small></td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Cabai Keriting</td>
                        @foreach ($komoditasCabaiKeriting as $key => $item)
                            @if ($item->kuantitas === '-')
                                <td class="text-center">-</td>
                            @else
                                <td class="text-center">{{$item->kuantitas}} <small>Kg</small></td>
                            @endif
                        @endforeach
                    </tr>
                    <tr class="table-active">
                        <th scope="row">3</th>
                        <td>Cabai Merah</td>
                        @foreach ($komoditasCabaiMerah as $key => $item)
                            @if ($item->kuantitas === '-')
                                <td class="text-center">-</td>
                            @else
                                <td class="text-center">{{$item->kuantitas}} <small>Kg</small></td>
                            @endif
                        @endforeach
                    </tr>
                    <tr class="table-active">
                        <th scope="row">4</th>
                        <td>Cabai Putih</td>
                        @foreach ($komoditasCabaiPutih as $key => $item)
                            @if ($item->kuantitas === '-')
                                <td class="text-center">-</td>
                            @else
                                <td class="text-center">{{$item->kuantitas}} <small>Kg</small></td>
                            @endif
                        @endforeach
                    </tr>
                    <tr class="table-active">
                        <th scope="row">5</th>
                        <td>Cabai Bubuk</td>
                        @foreach ($komoditasCabaiBubuk as $key => $item)
                            @if ($item->kuantitas === '-')
                                <td class="text-center">-</td>
                            @else
                                <td class="text-center">{{$item->kuantitas}} <small>Kg</small></td>
                            @endif
                        @endforeach
                    </tr>
                    <tr class="table-active">
                        <th scope="row">6</th>
                        <td>Cabai Paprika</td>
                        @foreach ($komoditasCabaiPaprika as $key => $item)
                            @if ($item->kuantitas === '-')
                                <td class="text-center">-</td>
                            @else
                                <td class="text-center">{{$item->kuantitas}} <small>Kg</small></td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
	<!-- End Product Area -->
@endsection