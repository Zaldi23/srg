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
                        <h2>Statistik Hasil Tani Per Petani</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('statistik.show')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="petani">Petani</label>
                        <div class="input-group">
                            <select name="petani" id="petani" class="form-control" style="width: 100%;">
                                <option selected="selected" disabled>Pilih salah satu</option>
                                @foreach ($userInfo as $item)
                                    <option value="{{$item->id}}" @if (old('petani')==$item->id) selected @endif>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="bulan">Bulan</label>
                        <div class="input-group">
                            <input type="month" name="bulan" id="bulan" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label></label>
                            <div class="input-group">
                                <button type="submit" class="btn btn-success btn-xs">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<!-- End Product Area -->
@endsection