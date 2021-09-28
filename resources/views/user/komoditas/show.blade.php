@extends('user.partials.master')

@section('title')
    {{-- Komoditas --}}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('alert'))
                <div class="row alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('alert')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Detail Komoditas
                                @if (Auth::user()->role_id == 3)
                                    milik Bapak. {{$komoditas->user_info->nama}}
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select disabled name="kategori" id="kategori" class="form-control" style="width: 100%;">
                                            <option selected="selected" disabled>
                                                {{$komoditas->kategori_komoditas_detail->kategori_komoditas->keterangan}}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="detail_kategori">Detail Kategori</label>
                                        <select disabled class="form-control" name="detail_kategori" id="detail_kategori" style="width: 100%;">
                                            <option selected="selected" disabled>
                                                {{$komoditas->kategori_komoditas_detail->keterangan}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="kuantitas">Kuantitas</label>
                                    <div class="input-group">
                                        <input type="number" disabled value="{{old('kuantitas',$komoditas->kuantitas)}}" name="kuantitas" class="form-control" id="kuantitas" placeholder="Kuantitas dalam kilogram">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="harga">Harga minimal</label>
                                    <div class="input-group">
                                        <input type="number" disabled value="{{old('harga',$komoditas->harga_minimal)}}" name="harga" class="form-control" id="harga" placeholder="Harga minimal Perkilogram">
                                        <div class="input-group-append">
                                            <span class="input-group-text">/Kg</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="harga">Harga maksimal</label>
                                    <div class="input-group">
                                        <input type="number" disabled value="{{old('harga',$komoditas->harga_maksimal)}}" name="harga" class="form-control" id="harga" placeholder="Harga maksimal Perkilogram">
                                        <div class="input-group-append">
                                            <span class="input-group-text">/Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if ($komoditas->status_uji_kualitas == 2)
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="kuantitas">Mutu</label>
                                        <select disabled name="kategori" id="kategori" class="form-control" style="width: 100%;">
                                            <option selected="selected" disabled>
                                                {{$komoditas->verifikasi_kualitas->mutu}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                            @if (Auth::user()->role_id == 3)                                {{-- KALO PENGELOLA GUDANG --}}
                                @if ($komoditas->status_pengajuan == 1)                     {{-- STATUS KOMODITAS BELUM DIAPA-APAKAN OLEH PGUDANG --}}

                                    <input type="hidden" name="komoditas" value="{{$komoditas->id}}">
                                    <br>
                                    <h4>Penggudangan</h4>
                                    
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAksi">Submit</button>
                                        <a class="btn btn-danger" id="tolak">Tolak</a>
                                    </div>

                                    {{-- Modal AKSI --}}
                                    <div class="modal fade" id="modalAksi" tabindex="-1" role="dialog" aria-labelledby="modalAksi" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form method="POST" action="{{route('komoditas.penggudangan')}}" id="form-aksi">
                                                    @csrf
                                                    <input type="hidden" name="komoditas" value="{{$komoditas->id}}">
                                                    <div class="modal-header">
                                                        <span id="modal_title"></span>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="harga">Harga Jual</label>
                                                                    <div class="input-group-append">
                                                                        <input type="number" step="500" min="0" name="harga_jual" id="harga_jual" class="form-control" placeholder="Harga Jual Perkilogram">
                                                                        <span class="input-group-text">/Kg</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="gudang">Gudang</label>
                                                                    <select name="gudang" id="gudang" class="form-control">
                                                                        <option disabled selected>Pilih salah satu</option>
                                                                        @foreach ($gudang as $item)
                                                                            <option value="{{$item->id}}">{{$item->nama_gudang}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Keseragaman Warna</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="warna" id="warna95" value="95">
                                                                        <label class="form-check-label" for="warna95">
                                                                        Merah > 94%
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="warna" id="warna94" value="94">
                                                                        <label class="form-check-label" for="warna94">
                                                                        < 94%
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Keseragaman</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="seragam" id="seragam98" value="98">
                                                                        <label class="form-check-label" for="seragam98">
                                                                        Seragam => 98%
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="seragam" id="seragam96" value="96">
                                                                        <label class="form-check-label" for="seragam96">
                                                                        Seragam 96% - 97%
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="seragam" id="seragam95" value="95">
                                                                        <label class="form-check-label" for="seragam95">
                                                                        Seragam <= 95%
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label" for="panjang">Panjang buah</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="panjang" id="panjang12" value="12">
                                                                        <label class="form-check-label" for="panjang12">
                                                                        > 11 cm
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="panjang" id="panjang9" value="9">
                                                                        <label class="form-check-label" for="panjang9">
                                                                        9-11 cm
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="panjang" id="panjang8" value="8">
                                                                        <label class="form-check-label" for="panjang8">
                                                                        < 9 cm
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label" for="pangkal">Garis tengah pangkal</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="pangkal" id="pangkal3" value="1.4">
                                                                        <label class="form-check-label" for="pangkal3">
                                                                        > 1,3 cm
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="pangkal" id="pangkal2" value="1.0">
                                                                        <label class="form-check-label" for="pangkal2">
                                                                        1,0-1,3 cm
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="pangkal" id="pangkal1" value="0.9">
                                                                        <label class="form-check-label" for="pangkal1">
                                                                        < 1,0 cm
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label" for="kotor">Kadar kotoran</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="kotor" id="kotor1" value="1">
                                                                        <label class="form-check-label" for="kotor1">
                                                                        1%
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="kotor" id="kotor2" value="2">
                                                                        <label class="form-check-label" for="kotor2">
                                                                        2%
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="kotor" value="3" id="kotor3">
                                                                        <label class="form-check-label" for="kotor3">
                                                                        3%
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label" for="busuk">Tingkat kerusakan dan busuk</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="busuk" value="0" id="busuk0">
                                                                        <label class="form-check-label" for="busuk0">
                                                                        0%
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="busuk" value="1" id="busuk1">
                                                                        <label class="form-check-label" for="busuk1">
                                                                        1%
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="busuk" id="busuk2" value="2">
                                                                        <label class="form-check-label" for="busuk2">
                                                                        2%
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                    
                                                    </div>
                                                    <div class="modal-footer" id="action_row">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal AKSI --}}

                                    {{-- Modal Tolak --}}
                                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('komoditas.tolak',$komoditas->id)}}" method="POST" id="form-tolak">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p id="kategori">Apakah anda akan menolak komoditas {{$komoditas->kategori_komoditas_detail->keterangan}} dengan kuantitas {{$komoditas->kuantitas}} yang diajukan {{$komoditas->user_info->nama}}</p>
                                                            </div>
                                                        </div>                    
                                                    </div>
                                                    <div class="modal-footer" id="action_row">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary tolak" type="submit">Tolak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal Tolak --}}
                                @elseif($komoditas->status_pengajuan == 3)                                                       {{-- STATUS KOMODITAS MASUK GUDANG --}}
                                    <br>
                                    <h4>Penggudangan</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="harga">Harga Jual</label>
                                            <div class="input-group-append">
                                                <input type="number" disabled value="{{$komoditas->harga_jual}}" step="100" min="0" name="harga_jual" id="harga_jual" class="form-control" placeholder="Harga Jual Perkilogram">
                                                <span class="input-group-text">/Kg</span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="desa">Desa</label>
                                            <select name="desa" disabled id="desa" class="form-control" style="width: 100%;">
                                                <option selected value="{{$komoditas->user_info->desa->id}}">{{$komoditas->user_info->desa->nama_desa}}</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gudang">gudang</label>
                                                <select class="form-control" disabled name="gudang" id="gudang" style="width: 100%;">
                                                    <option value="{{$komoditas->gudang->id}}">{{$komoditas->gudang->nama_gudang}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif(Auth::user()->role_id == 1)         {{-- PETANI --}}
                                @if (!in_array($komoditas->status_pengajuan,[1,2])) {{-- STATUS KOMODITAS MASUK GUDANG --}}
                                    <br>
                                    <h4>Penggudangan</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="harga">Harga Jual</label>
                                            <div class="input-group-append">
                                                <input type="number" disabled value="{{$komoditas->harga_jual}}" step="100" min="0" name="harga_jual" id="harga_jual" class="form-control" placeholder="Harga Jual Perkilogram">
                                                <span class="input-group-text">/Kg</span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="desa">Desa</label>
                                            <select name="desa" disabled id="desa" class="form-control" style="width: 100%;">
                                                <option selected value="{{$komoditas->user_info->desa->id}}">{{$komoditas->user_info->desa->nama_desa}}</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gudang">gudang</label>
                                                <select class="form-control" disabled name="gudang" id="gudang" style="width: 100%;">
                                                    <option value="{{$komoditas->gudang->id}}">{{$komoditas->gudang->nama_gudang}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('datatableScript')
<script>
    document.getElementById("tolak").addEventListener('click',function () {
        $('#form-tolak').trigger('reset');
        $('#action_row').show();
        $('#modalAdd').modal('show');
    });
</script>
@endsection