<!DOCTYPE html>
<html lang="id">
    <head>
        @include('toko.partials.head')
    </head>
    <body class="js">
        @yield('konten')
        <!-- Modal end -->
        
        <!-- Start Footer Area -->
        <footer class="footer">
            @include('toko.partials.footer')
        </footer>
        <!-- /End Footer Area -->
    
        @include('toko.partials.script')
    </body>
</html>