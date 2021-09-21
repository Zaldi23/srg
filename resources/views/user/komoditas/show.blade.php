@extends('user.partials.master')

@section('title')
    {{-- Komoditas --}}
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

                            @if (Auth::user()->role_id == 3)                                {{-- KALO PENGELOLA GUDANG --}}
                                @if ($komoditas->status_pengajuan == 1)                     {{-- STATUS KOMODITAS BELUM DIAPA-APAKAN OLEH PGUDANG --}}
                                    <form id="quickForm" method="POST" action="{{route('komoditas.penggudangan')}}">
                                        @csrf
                                        <input type="hidden" name="komoditas" value="{{$komoditas->id}}">
                                        <br>
                                        <h4>Penggudangan</h4>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="harga">Harga Jual</label>
                                                <div class="input-group-append">
                                                    <input type="number" step="100" min="0" name="harga_jual" id="harga_jual" class="form-control" placeholder="Harga Jual Perkilogram">
                                                    <span class="input-group-text">/Kg</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="desa">Desa</label>
                                                <select name="desa" id="desa" class="form-control" style="width: 100%;">
                                                    <option selected="selected" disabled>Pilih salah satu</option>
                                                    <option value="{{$komoditas->user_info->desa->id}}">{{$komoditas->user_info->desa->nama_desa}}</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-4">
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
                                                                        $('#gudang').append(`<option value="${element['id']}">${element['nama_gudang']}|<small>Kuota tersisa = ${element['kuota']-element['terisi']}</small></option>`);
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
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-danger" id="tolak">Tolak</a>
                                        </div>
                                    </form>

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