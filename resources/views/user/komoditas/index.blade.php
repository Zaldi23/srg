@extends('user.partials.master')

@section('content')
    <section class="content">
        @switch(Auth::user()->role_id)
            @case(1)                {{-- PETANI --}}
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
                                            <th>Nama Tani</th>
                                            <th>Jenis Cabai</th>
                                            <th>Harga harapan</th>
                                            <th>Kuantitas</th>
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
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Tani</th>
                                                <th>Jeni Cabai</th>
                                                <th>Desa</th>
                                                <th>Kuota Gudang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Handoko</td>
                                                <td>Cabai Keriting
                                                </td>
                                                <td>Gombong</td>
                                                <td>20</td>
                                                <td><button class="btn btn-info" disabled>ACC</button>
                                                    <button class="btn btn-warning">Cek Detail</button>
                                                </td>
                                            </tr>
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