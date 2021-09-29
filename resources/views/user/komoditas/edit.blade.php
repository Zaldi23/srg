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
                            <h3 class="card-title">Edit Komoditas</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="quickForm" method="POST" action="{{route('komoditas.update',$komoditas->id)}}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control" style="width: 100%;">
                                                <option selected="selected" disabled>Pilih salah satu</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{$item->id}}" @if (old('kategori')==$item->id) selected @endif>{{$item->keterangan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                                        <script>
                                            $(document).ready(function(){
                                                $('#kategori').on('change', function(){
                                                    let id = $(this).val();
                                                    $('#detail_kategori').empty();
                                                    $('#detail_kategori').append(`<option value="0" disabled selected>Memproses...</option>`);
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: "{{url('komoditas/get-detail-kategori')}}/"+id,
                                                        success: function(response){
                                                            var response = JSON.parse(response);
                                                            console.log(response);
                                                            $('#detail_kategori').empty();
                                                            $('#detail_kategori').append(`<option value="0" disabled selected>Pilih Salah Satu</option>`);
                                                            response.forEach(element => {
                                                                $('#detail_kategori').append(`<option value="${element['id']}">${element['keterangan']}</option>`);
                                                            });
                                                        }
                                                    })
                                                })
                                            });
                                        </script>

                                        <div class="form-group">
                                            <label for="detail_kategori">Detail Kategori</label>
                                            <select class="form-control" name="detail_kategori" id="detail_kategori" style="width: 100%;"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="kuantitas">Kuantitas</label>
                                        <div class="input-group">
                                            <input type="number" value="{{old('kuantitas',$komoditas->kuantitas)}}" name="kuantitas" class="form-control" id="kuantitas" placeholder="Kuantitas dalam kilogram">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="harga_minimal">Harga Minimal</label>
                                        <div class="input-group">
                                            <input type="number" value="{{old('harga_minimal',$komoditas->harga_minimal)}}" name="harga_minimal" class="form-control" id="harga_minimal" placeholder="Harga Harapan minimal Perkilogram">
                                            <div class="input-group-append">
                                                <span class="input-group-text">/Kg</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="harga_maksimal">Harga Maksimal</label>
                                        <div class="input-group">
                                            <input type="number" value="{{old('harga_maksimal',$komoditas->harga_maksimal)}}" name="harga_maksimal" class="form-control" id="harga_maksimal" placeholder="Harga Harapan maksimal Perkilogram">
                                            <div class="input-group-append">
                                                <span class="input-group-text">/Kg</span>
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