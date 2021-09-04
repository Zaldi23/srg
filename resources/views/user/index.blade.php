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
                                    <i class="fa fa-archive"></i>
                                </div>
                                <a href="{{route('komoditas.index')}}" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
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
                                    <p>Komoditas yang menunggu</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="{{route('komoditas.status',Crypt::encrypt('wait'))}}" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
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
                                    <i class="fa fa-map"></i>
                                </div>
                                <a href="{{route('komoditas.status',Crypt::encrypt('acc'))}}" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                @break
            @case(2)                    {{-- LPK --}}
                
                @break
            @case(3)                    {{-- PENGELOLA GUDANG --}}
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>300</h3>
                        
                                    <p>Komoditas yang diajukan petani</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53</h3>
                                    <p>Petani Yang Terdaftar</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                        
                                    <p>Kecamatan</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-map"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                        
                                    <p>Desa</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <a href="#" class="small-box-footer">
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
                                    <h3>10</h3>
                        
                                    <p>Gudang</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53</h3>
                                    <p>Kelompok Tani</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>4</h3>
                        
                                    <p>Jenis Cabai</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-map"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Info Selanjutnya <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                    
                                <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                                </p>
                    
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                            </div>
                    
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                        
                                    <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's
                                    content.
                                    </p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div><!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Special title treatment</h6>
                        
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                    
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Special title treatment</h6>
                        
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                @break
            @default
                
        @endswitch
    </section>
    
@endsection