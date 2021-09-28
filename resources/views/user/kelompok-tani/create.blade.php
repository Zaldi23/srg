@extends('user.partials.master')

@section('title')
    Kelompok Tani
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
                            <h3 class="card-title">Buat Kelompok Tani Baru</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="quickForm" method="POST" action="">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="keterangan">Nama Kelompok Tani</label>
                                        <div class="input-group">
                                            <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Nama Kelompok Tani">
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
            </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection