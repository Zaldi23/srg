@extends('user.partials.master')

@section('title')
    {{-- petani --}}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Akun Detail</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        @if (isset($petani->desa_id))
                            <form id="quickForm" method="POST" action="{{route('petani.update',$petani->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nama">Nama Lengkap</label>
                                            <div class="input-group">
                                                <input type="text" value="{{old('nama',$petani->nama)}}" name="nama" class="form-control" id="nama" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan</label>
                                                <select name="kecamatan" id="kecamatan" disabled class="form-control" style="width: 100%;">
                                                    <option selected="selected" disabled>{{$petani->desa->kecamatan->nama_kecamatan}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <label for="desa">Desa</label>
                                                <select disabled class="form-control" name="desa" id="desa" style="width: 100%;">
                                                    <option selected>{{$petani->desa->nama_desa}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kelompok_tani">Kelompok tani</label>
                                                <select class="form-control" disabled name="kelompok_tani" id="kelompok_tani" style="width: 100%;">
                                                    <option value="">{{$petani->kelompok_tani->keterangan}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="luas_lahan">Luas lahan</label>
                                            <div class="input-group">
                                                <input type="number" readonly value="{{old('luas_lahan',$petani->luas_lahan)}}" name="luas_lahan" class="form-control" id="luas_lahan" placeholder="Luas lahan yang dimiliki dalam Meter">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">M<sup>2</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </form>
                        @else
                            <form id="quickForm" method="POST" action="{{route('petani.update',$petani->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nama">Nama Lengkap</label>
                                            <div class="input-group">
                                                <input type="text" value="{{old('nama',$petani->nama)}}" name="nama" class="form-control" id="nama" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan</label>
                                                <select name="kecamatan" id="kecamatan" class="form-control" style="width: 100%;">
                                                    <option selected="selected" disabled>Pilih salah satu</option>
                                                    @foreach ($kecamatan as $item)
                                                        <option value="{{$item->id}}" @if (old('kecamatan')==$item->id) selected @endif>{{$item->nama_kecamatan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                                            <script>
                                                $(document).ready(function(){
                                                    $('#kecamatan').on('change', function(){
                                                        let id = $(this).val();
                                                        $('#desa').empty();
                                                        $('#desa').append(`<option value="0" disabled selected>Memproses...</option>`);
                                                        $.ajax({
                                                            type: 'GET',
                                                            url: "{{route('get-desa-by-kecamatan', '')}}"+"/"+id,
                                                            success: function(response){
                                                                var response = JSON.parse(response);
                                                                console.log(response);
                                                                $('#desa').empty();
                                                                $('#desa').append(`<option value="0" disabled selected>Pilih Salah Satu</option>`);
                                                                response.forEach(element => {
                                                                    $('#desa').append(`<option value="${element['id']}">${element['nama_desa']}</option>`);
                                                                });
                                                            }
                                                        })
                                                    })
                                                });
                                            </script>

                                            <div class="form-group">
                                                <label for="desa">Desa</label>
                                                <select class="form-control" name="desa" id="desa" style="width: 100%;"></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <script>
                                                $(document).ready(function(){
                                                    $('#desa').on('change', function(){
                                                        let id = $(this).val();
                                                        $('#kelompok_tani').empty();
                                                        $('#kelompok_tani').append(`<option value="0" disabled selected>Memproses...</option>`);
                                                        $.ajax({
                                                            type: 'GET',
                                                            url: "{{route('get-kelompok-tani-by-desa', '')}}"+"/"+id,
                                                            success: function(response){
                                                                var response = JSON.parse(response);
                                                                console.log(response);
                                                                $('#kelompok_tani').empty();
                                                                $('#kelompok_tani').append(`<option value="0" disabled selected>Pilih Salah Satu</option>`);
                                                                response.forEach(element => {
                                                                    $('#kelompok_tani').append(`<option value="${element['id']}">${element['keterangan']}</option>`);
                                                                });
                                                            }
                                                        })
                                                    })
                                                });
                                            </script>

                                            <div class="form-group">
                                                <label for="kelompok_tani">Kelompok tani</label>
                                                <select class="form-control" name="kelompok_tani" id="kelompok_tani" style="width: 100%;"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="luas_lahan">Luas lahan</label>
                                            <div class="input-group">
                                                <input type="number" value="{{old('luas_lahan',$petani->luas_lahan)}}" name="luas_lahan" class="form-control" id="luas_lahan" placeholder="Luas lahan yang dimiliki dalam Meter">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">M<sup>2</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </form>
                        @endif
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