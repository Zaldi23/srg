@extends('user.partials.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @switch(Auth::user()->role_id)
                @case(1)                {{-- PETANI --}}
                    {{-- <div class="row align-items-center">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{route('komoditas.create')}}" class="btn btn-sm btn-success">+ Tambah Komoditas</a>
                        </div>
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
                                                <th>Harga harapan/Kg (Rp)</th>
                                                <th>Status Pengajuan</th>
                                                <th>Status Uji Kualitas</th>
                                                <th>Harga jual (Rp)</th>
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
                    </div> --}}

                    {{-- Modal Hapus --}}
                    {{-- <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
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
                    </div> --}}
                    {{-- End Modal Hapus --}}
                    @break
                @case(2)
                    LPK
                    @break
                @case(3)
                    <div class="container-fluid">
                        @if (Session::has('alert'))
                            <div class="row alert alert-success alert-dismissible fade show" role="alert">
                                {{Session::get('alert')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-7">
                                <h4>Detail Akun</h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-7">
                                email : {{$userInfo->user->email}}
                            </div>
                            <div class="col-lg-6 col-5 text-right">
                                <a class="btn btn-sm btn-warning" id="reset-password">Reset Kata Sandi</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">List Komoditas dari Bapak {{$userInfo->nama}}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabel_komoditas" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Cabai</th>
                                                    <th>Kuantitas (Kg)</th>
                                                    <th>Harga harapan/Kg (Rp)</th>
                                                    <th>Status Pengajuan</th>
                                                    <th>Status Uji Kualitas</th>
                                                    <th>Harga jual (Rp)</th>
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
                    {{-- Modal REset Pass --}}
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{route('petani.reset-password',$userInfo->user->id)}}" method="POST" id="form-reset">
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
                                                <p id="kategori">Apakah anda yakin mereset ulang kata sandi ?</p>
                                            </div>
                                        </div>                    
                                    </div>
                                    <div class="modal-footer" id="action_row">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Iya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal REset Pass --}}
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
        @case(2))               {{-- LPK --}}
            
            @break
        @case(3))                {{-- PGUDANG --}}
            <script>
                $(document).ready(function(){
                    var id = '{{$userInfo->id}}';
                    var tabel_komoditas = $("#tabel_komoditas").DataTable({
                        bAutoWidth: true,
                        // processing: true
                        serverSide: true,
                        ajax: "{{ route('json.petani.detail','') }}"+"/"+id,
                        
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                            {data: 'kategori_komoditas_detail.keterangan', name: 'kategori_komoditas_detail.keterangan'},
                            {data: 'kuantitas', name: 'kuantitas'},
                            {data: 'harga_harapan', name: 'harga_harapan'},
                            {data: 'status_pengajuan', name: 'status_pengajuan', orderable: false, searchable: false},
                            {data: 'status_uji_kualitas', name: 'status_uji_kualitas', orderable: false, searchable: false},
                            {data: 'harga_jual', name: 'harga_jual'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });

                    $('body').on('click', '#reset-password', function(){
                        $('#modalAdd').modal('show');
                        $('#form-reset').trigger('reset');
                        $('#action_row').show();
                    });
                });
            </script>
            @break
        @default
            
    @endswitch
@endsection