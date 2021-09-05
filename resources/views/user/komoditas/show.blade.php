@extends('user.partials.master')

@section('title')
    Komoditas
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
                            <h3 class="card-title">Detail Komoditas</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="quickForm" method="POST" action="{{route('komoditas.penggudangan')}}">
                            @csrf
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
                                    
                                    <div class="col-md-6">
                                        <label for="harga">Harga Harapan</label>
                                        <div class="input-group">
                                            <input type="number" disabled value="{{old('harga',$komoditas->harga_harapan)}}" name="harga" class="form-control" id="harga" placeholder="Harga Harapan Perkilogram">
                                            <div class="input-group-append">
                                                <span class="input-group-text">/Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <h4>Penggudangan</h4>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="desa">Desa</label>
                                        <select name="desa" id="desa" class="form-control" style="width: 100%;">
                                            <option selected="selected" disabled>Pilih salah satu</option>
                                            <option value="{{Auth::user()->user_info->desa->id}}">{{Auth::user()->user_info->desa->nama_desa}}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                                        <script>
                                            $(document).ready(function(){
                                                $('#desa').on('change', function(){
                                                    let id = $(this).val();
                                                    console.log(id);
                                                    var route = "{{ url('gudang-desa') }}/"+id;
                                                    $('#gudang').empty();
                                                    $('#gudang').append(`<option value="0" disabled selected>Memproses...</option>`);
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: route,
                                                        success: function(response){
                                                            var response = JSON.parse(response);
                                                            console.log(response);
                                                            $('#gudang').empty();
                                                            $('#gudang').append(`<option value="0" disabled selected>Pilih Salah Satu</option>`);
                                                            response.forEach(element => {
                                                                $('#gudang').append(`<option value="${element['id']}">${element['nama_gudang']}</option>`);
                                                            });
                                                        }
                                                    })
                                                })
                                            });
                                        </script>

                                        <div class="form-group">
                                            <label for="gudang">Pilih gudang</label>
                                            <select class="form-control" name="gudang" id="gudang" style="width: 100%;"></select>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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