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
                @case(2)
                    LPK
                    @break
                @case(3)
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-7">
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                </nav>
                            </div>
                            <div class="col-lg-6 col-5 text-right">
                                <a class="btn btn-sm btn-success" id="tambah-kecamatan">+ Tambah Kecamatan</a>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">List Kecamatan yang ada di Kebumen</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabel_kecamatan" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kecamatan</th>
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
                    {{-- Modal Tambah Kecamatan --}}
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="#" method="POST" id="form-tambah">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kecamatan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="nama_kecamatan">Nama kecamatan</label>
                                                    <input class="form-control" type="nama_kecamatan" id="nama_kecamatan" name="nama_kecamatan" placeholder="Nama Kecamatan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" id="action_row">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Tambah Kecamatan --}}
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
    <script>
        $(document).ready(function(){
            var tabel_kecamatan = $("#tabel_kecamatan").DataTable({
                bAutoWidth: true,
                // processing: true,
                serverSide: true,
                ajax: "{{ route('json.kecamatan') }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'nama_kecamatan', name: 'nama_kecamatan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('body').on('click', '#tambah-kecamatan', function(){
                $('#modalAdd').modal('show');
                // var url = "{{route('komoditas.destroy', '')}}"+"/"+id;
                var url = "{{route('kecamatan.store')}}";
                $('#form-tambah').attr('action', url);
                $('#form-tambah').trigger('reset');
                $('#action_row').show();
            });
        });
    </script>
@endsection