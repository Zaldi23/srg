<!DOCTYPE html>
<html lang="en">
    <head>
        @include('user.partials.head')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Navbar -->
            @include('user.partials.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('user.partials.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">
                                    @yield('title')
                                </h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('user.partials.footer')
            <!-- ./wrapper -->
        </div>
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        @include('user.partials.script')
    </body>
</html>
