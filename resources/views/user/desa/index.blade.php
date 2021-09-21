@extends('user.partials.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('alert'))
                <div class="row alert alert-secondary alert-dismissible fade show" role="alert">
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
                                <a class="btn btn-sm btn-success" id="tambah-desa">+ Tambah Desa</a>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">List Desa yang ada di Kebumen</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabel_desa" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama desa</th>
                                                    <th>Kecamatan</th>
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
                    {{-- Modal Tambah Desa --}}
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="#" method="POST" id="form-tambah">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Desa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="kecamatan">Kecamatan</label>
                                                    <select name="kecamatan" id="kecamatan" required class="form-control" style="width: 100%;">
                                                        <option selected disabled>Pilih salah satu</option>
                                                        @foreach ($kecamatan as $item)
                                                            <option value="{{$item->id}}">{{$item->nama_kecamatan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="nama_desa">Nama desa</label>
                                                    <input class="form-control" type="nama_desa" id="nama_desa" name="nama_desa" placeholder="Nama desa">
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
                    {{-- End Modal Tambah Desa --}}
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
            var tabel_desa = $("#tabel_desa").DataTable({
                bAutoWidth: true,
                // processing: true,
                serverSide: true,
                ajax: "{{ route('json.desa') }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'nama_desa', name: 'nama_desa'},
                    {data: 'kecamatan.nama_kecamatan', name: 'kecamatan.nama_kecamatan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
            $('body').on('click', '#tambah-desa', function(){
                $('#modalAdd').modal('show');
                // var url = "{{route('komoditas.destroy', '')}}"+"/"+id;
                var url = "{{route('desa.store')}}";
                $('#form-tambah').attr('action', url);
                $('#form-tambah').trigger('reset');
                $('#action_row').show();
            });
        });
    </script>
@endsection