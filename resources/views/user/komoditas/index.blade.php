@extends('user.partials.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('alert'))
                <div class="row alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('alert')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @switch(Auth::user()->role_id)
                @case(1)                {{-- PETANI --}}
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            @if (isset(Auth::user()->user_info->luas_lahan, Auth::user()->user_info->kelompok_tani_id))
                                <a href="{{route('komoditas.create')}}" class="btn btn-sm btn-success">+ Tambah Komoditas</a>
                            @else
                                <a href="{{route('petani.detail')}}" class="btn btn-sm btn-info">+ Lengkapi data</a>
                            @endif
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="col-lg-6 col-7">
                                        <h4>List Komoditas</h4>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel_komoditas" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Cabai</th>
                                                <th>Kuantitas (Kg)</th>
                                                <th>Detail Kuantitas (Kg)</th>
                                                <th>Harga harapan minimal/Kg (Rp)</th>
                                                <th>Harga harapan maksimal/Kg (Rp)</th>
                                                <th>Status Pengajuan</th>
                                                <th>Status Kualitas</th>
                                                <th>Harga jual (Rp)</th>
                                                <th>Mutu</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>

                    {{-- Modal Hapus --}}
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="#" method="POST" id="form-hapus">
                                    @method('DELETE')
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
                                                <p id="kategori"></p>
                                            </div>
                                        </div>                    
                                    </div>
                                    <div class="modal-footer" id="action_row">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Hapus --}}

                    {{-- Modal Terjual --}}
                    <div class="modal fade" id="modalJual" tabindex="-1" role="dialog" aria-labelledby="modalJual" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="#" method="POST" id="form-jual">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Komoditas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <p id="keterangan_komoditas"></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="terjual">Terjual</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" id="max_terjual" name="terjual" placeholder="Terjual">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">/Kg</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" id="action_row">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Buat</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Terjual --}}
                    @break
                @case(2)
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">List Komoditas Cabai Mengajukan Uji Kualitas</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabel_komoditas" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Tani</th>
                                                    <th>Jenis Cabai</th>
                                                    <th>Kuantitas (Kg)</th>
                                                    <th>Mutu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal AKSI --}}
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form action="#" method="POST" id="form-aksi">
                                    @csrf
                                    <div class="modal-header">
                                        <span id="modal_title"></span>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
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
                                        <button class="btn btn-primary" type="submit">Cek kualitas</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal AKSI --}}
                    @break
                @case(3)                {{--PEGUDANG--}}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">List Komoditas Tani Cabai Kebumen</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabel_komoditas" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Tani</th>
                                                    <th>Jenis Cabai</th>
                                                    <th>Kuantitas (Kg)</th>
                                                    <th>Kuantitas Detail(Kg)</th>
                                                    <th>Harga Jual (Kg)</th>
                                                    <th>Status</th>
                                                    <th>Mutu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Hapus --}}
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="#" method="POST" id="form-hapus">
                                    @method('DELETE')
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
                                                <p id="kategori"></p>
                                            </div>
                                        </div>                    
                                    </div>
                                    <div class="modal-footer" id="action_row">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Hapus --}}
                    @break
                @default
                    
            @endswitch
        </div>
    </section>
@endsection

@section('datatableScript')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    @switch(Auth::user()->role_id)
        @case(1)                {{-- PETANI --}}
            <script>
                $(document).ready(function(){
                    var tabel_komoditas = $("#tabel_komoditas").DataTable({
                        bAutoWidth: true,
                        // processing: true,
                        serverSide: true,
                        ajax: "{{ route('json.komoditas') }}",
                        
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                            {data: 'kategori_komoditas_detail.keterangan', name: 'kategori_komoditas_detail.keterangan'},
                            {data: 'kuantitas_tersisa', name: 'kuantitas_tersisa'},
                            {data: 'telah_terjual', name: 'telah_terjual'},
                            {data: 'harga_minimal', name: 'harga_minimal'},
                            {data: 'harga_maksimal', name: 'harga_maksimal'},
                            {data: 'status_pengajuan', name: 'status_pengajuan', orderable: false, searchable: false},
                            {data: 'status_uji_kualitas', name: 'status_uji_kualitas', orderable: false, searchable: false},
                            {data: 'harga_jual', name: 'harga_jual'},
                            {data: 'mutu', name: 'mutu'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });

                    $('body').on('click', '.hapus', function(){
                        var id = this.id;
                        var url = "{{route('komoditas.destroy', '')}}"+"/"+id;
                        $('#form-hapus').attr('action', url);
                        $('#form-hapus').trigger('reset');
                        $('#action_row').show();

                        $.ajax({
                            url: "{{ url('json-komoditas') }}/"+id,
                            type: "GET",
                            success: function(response){
                                $('#kategori').text("Apakah anda yakin menghapus "+response.kategori_komoditas_detail.keterangan+" dengan kuantitas "+response.kuantitas+" Kilogram");
                                $('#kuantitas').text(response.kuantitas+" Kg");
                                $('#modalAdd').modal('show');
                            },
                            error: function(response){
                                console.log('Error : '+response);
                            }
                        });
                    });

                    $('body').on('click', '.jual', function(){
                        var id = this.id;
                        var url = "{{route('komoditas.jual', '')}}"+"/"+id;
                        $('#form-jual').attr('action', url);
                        $('#form-jual').trigger('reset');
                        $('#action_row').show();

                        $.ajax({
                            url: "{{ url('json-komoditas') }}/"+id,
                            type: "GET",
                            success: function(response){
                                $('#keterangan_komoditas').text("Komoditas "+response.kategori_komoditas_detail.keterangan+" dengan kuantitas "+response.kuantitas+" Kilogram telah terjual");
                                $('#kuantitas').text(response.kuantitas+" Kg");
                                $('#max_terjual').attr({
                                    "max" : response.kuantitas,
                                    "min" : 1
                                });
                                $('#modalJual').modal('show');
                            },
                            error: function(response){
                                console.log('Error : '+response);
                            }
                        });
                    });
                });
            </script>
            @break
        @case(2))               {{-- LPK --}}
            <script>
                $(document).ready(function(){
                    var tabel_komoditas = $("#tabel_komoditas").DataTable({
                        bAutoWidth: true,
                        // processing: true,
                        serverSide: true,
                        ajax: "{{ route('json.komoditas') }}",
                        
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                            {data: 'user_info.nama', name: 'user_info.nama'},
                            {data: 'kategori_komoditas_detail.keterangan', name: 'kategori_komoditas_detail.keterangan'},
                            {data: 'kuantitas', name: 'kuantitas'},
                            {data: 'mutu', name: 'mutu'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });

                    $('body').on('click', '.aksi', function(){
                        $("#modalAdd").modal("show");
                        $("#form-add").trigger('reset');
                        var id = this.id;
                        console.log(id);
                        var url = "{{route('komoditas.uji', '')}}"+"/"+id;
                        $('#form-aksi').attr('action', url);
                        $('#form-aksi').trigger('reset');
                        $('#action_row').show();
                    });
                });
            </script>
            @break
        @case(3))                {{-- PGUDANG --}}
            <script>
                $(document).ready(function(){
                    var tabel_komoditas = $("#tabel_komoditas").DataTable({
                        bAutoWidth: true,
                        // processing: true,
                        serverSide: true,
                        ajax: "{{ route('json.komoditas') }}",
                        
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                            {data: 'user_info.nama', name: 'user_info.nama'},
                            {data: 'kategori_komoditas_detail.keterangan', name: 'kategori_komoditas_detail.keterangan'},
                            {data: 'kuantitas_tersisa', name: 'kuantitas_tersisa'},
                            {data: 'telah_terjual', name: 'telah_terjual'},
                            {data: 'harga_jual', name: 'harga_jual'},
                            {data: 'status_komoditas', name: 'status_komoditas'},
                            {data: 'mutu', name: 'mutu'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });

                    $('body').on('click', '.hapus', function(){
                        var id = this.id;
                        console.log(id);
                        var url = "{{route('komoditas.destroy', '')}}"+"/"+id;
                        $('#form-hapus').attr('action', url);
                        $('#form-hapus').trigger('reset');
                        $('#action_row').show();

                        $.ajax({
                            url: "{{ url('json-komoditas') }}/"+id,
                            type: "GET",
                            success: function(response){
                                $('#kategori').text("Apakah anda yakin menghapus "+response.kategori_komoditas_detail.keterangan+" dengan kuantitas "+response.kuantitas+" Kilogram");
                                $('#kuantitas').text(response.kuantitas+" Kg");
                                $('#modalAdd').modal('show');
                            },
                            error: function(response){
                                console.log('Error : '+response);
                            }
                        });
                    });
                });
            </script>
            @break
        @default
            
    @endswitch
@endsection