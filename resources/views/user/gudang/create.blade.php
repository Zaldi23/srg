@extends('user.partials.master')

@section('title')
    Gudang
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
                            <h3 class="card-title">Buat Gudang</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="quickForm" method="POST" action="{{route('gudang.store')}}">
                            @csrf
                            <div class="card-body">
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
                                        <label for="keterangan">Nama gudang</label>
                                        <div class="input-group">
                                            <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Harga Harapan Perkilogram">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="kuota">Daya tampung</label>
                                        <div class="input-group">
                                            <input type="number" name="kuota" class="form-control" id="kuota" placeholder="Daya tampung gudang dalam kilogram">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Kg</span>
                                            </div>
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