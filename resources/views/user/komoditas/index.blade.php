@extends('user.partials.master')

@section('content')
    <section class="content">
        @switch(Auth::user()->role_id)
            @case(1)                {{-- PETANI --}}
                <div class="container-fluid">
                    
                    @if (Session::has('alert'))
                        <div class="row alert alert-secondary alert-dismissible fade show" role="alert">
                            {{Session::get('alert')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row align-items-center">
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
                    </div>
                </div>
                @break
            @case(2)
                LPK
                @break
            @case(3)
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
                                                <th>Harga harapan/Kg</th>
                                                <th>Harga jual</th>
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
                @break
            @default
                
        @endswitch
      
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
                            {data: 'kuantitas', name: 'kuantitas'},
                            {data: 'harga_harapan', name: 'harga_harapan'},
                            {data: 'status_pengajuan', name: 'status_pengajuan', orderable: false, searchable: false},
                            {data: 'status_uji_kualitas', name: 'status_uji_kualitas', orderable: false, searchable: false},
                            {data: 'harga_jual', name: 'harga_jual'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });
                });
            </script>
            @break
        @case(2))               {{-- LPK --}}
            
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
                            {data: 'kuantitas', name: 'kuantitas'},
                            {data: 'harga_harapan', name: 'harga_harapan'},
                            {data: 'status_pengajuan', name: 'status_pengajuan', orderable: false, searchable: false},
                            {data: 'status_uji_kualitas', name: 'status_uji_kualitas', orderable: false, searchable: false},
                            {data: 'harga_jual', name: 'harga_jual'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });
        
                    // $('body').on('click', '.edit-cut-off-time', function(){
                    //     var id = this.id;
                    //     $('#form-add').attr('action', "#");
                    //     $('#form-add').trigger('reset');
                    //     $('#action_row').show();
        
                    //     $.ajax({
                    //         url: "{{ url('setup/get-cut-off-time-setting') }}/"+id,
                    //         type: "GET",
                    //         success: function(response){
                    //             $("#transaction_id").val(response.id);
                    //             $('#jenis_transaksi').val(response.jenis_transaksi);
                    //             $('#jenis_transaksi').prop('disabled', true);
                    //             $('#waktu_berakhir').val(checkTimeNull(response.cut_off_time_cms.start_time));
                    //             $('#waktu_mulai').val(checkTimeNull(response.cut_off_time_cms.end_time));
                    //             $('input[id="checkbox-primary-1"]').prop('checked', response.cut_off_time_cms.business_day_only);
                    //             $('#checkbox-primary-1').change(function(){
                    //                 if(this.checked){
                    //                     $(this).val(true);
                    //                 }else{
                    //                     $(this).val(false);
                    //                 }
                    //             });
                    //             $('#modalAdd').modal('show');
                    //         },
                    //         error: function(response){
                    //             alert('Error'+response);
                    //         }
                    //     });
                    // });
        
                });
            </>
            @break
        @default
            
    @endswitch
@endsection