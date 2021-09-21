@extends('user.partials.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        @switch(Auth::user()->role_id)
            @case(1)                    {{-- PETANI --}}
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        {{count(Auth::user()->user_info->komoditas)}}
                                    </h3>
                        
                                    <p>Komoditas yang diajukan</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-upload"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        {{count(Auth::user()->user_info->komoditas_menunggu)}}
                                    </h3>
                                    <p>Komoditas yang ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        {{count(Auth::user()->user_info->komoditas_disetujui)}}
                                    </h3>
                        
                                    <p>Komoditas disetujui</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                        {{count(Auth::user()->user_info->komoditas_dihapus)}}
                                    </h3>
                        
                                    <p>Komoditas dihapus</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                @break
            @case(2)                    {{-- LPK --}}
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-5 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="total_komoditas">{{$totalKomoditas}}</h3>
                        
                                    <p>Komoditas yang mengajukan uji kualitas</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <a href="{{route('komoditas.index')}}" id="url_komoditas_index" class="small-box-footer">Info Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @break
            @case(3)                    {{-- PENGELOLA GUDANG --}}
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="total_komoditas">{{$totalKomoditas}}</h3>
                        
                                    <p>Komoditas Petani</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-upload"></i>
                                </div>
                                <a href="{{route('komoditas.index')}}" id="url_komoditas_index" class="small-box-footer">Info Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="total_petani">{{$totalPetani}}</h3>
                                    <p>Petani Yang Terdaftar</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="{{route('petani.index')}}" id="url_petani_index" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3 id="total_kecamatan">{{$totalKecamatan}}</h3>
                        
                                    <p>Kecamatan</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-map"></i>
                                </div>
                                <a href="{{route('kecamatan.index')}}" id="url_kecamatan_index" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 id="total_komoditas">{{$totalDesa}}</h3>
                        
                                    <p>Desa</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <a href="{{route('desa.index')}}" id="url_desa_index" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
        
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="total_gudang">{{$totalGudang}}</h3>
                        
                                    <p>Gudang</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <a href="{{route('gudang.index')}}" id="url_gudang_index" class="small-box-footer">Info Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="total_kelompok_tani">{{$totalKelompokTani}}</h3>
                                    <p>Kelompok Tani</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="{{route('kelompok-tani.index')}}" id="url_kelompok_tani_index" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3 id="total_jenis_cabai">{{$totalJenisCabai}}</h3>
                        
                                    <p>Jenis Cabai</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <a href="{{route('jenis-cabai.index')}}" id="url_jenis_cabai_index" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
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
@endsection