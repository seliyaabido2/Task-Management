<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <link rel="icon" href="{{ asset('admin/dist/img/AdminLogo.png') }}" type="image/png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dropify/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/sweetalert2.min.css') }}">

    <!-- iziToast CSS -->
    <link rel="stylesheet" href="{{ asset('admin/iziToast/css/iziToast.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

</head>

{{-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('admin/dist/img/AdminLogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('task.partial.header')

    @include('task.partial.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('task.partial.footer')
</div>
 
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- Dropify JS Scripts -->
<script src="{{ asset('admin/dropify/dropify.min.js') }}"></script>
<!-- iziToast JS Scripts -->
<script src="{{ asset('admin/iziToast/js/iziToast.min.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert2.min.js') }}"></script>

@stack('js')
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $(".alert").slideUp(function () {
                    $(this).remove();
                });
            }, 5000);
        });
    </script>
     
    @if(Session::has('success'))
        <script>
            iziToast.success({
                title: 'Success',
                message: "<?= Session::get('success') ?>",
                position: 'topRight'
            });
        </script>
    @endif

    @if(Session::has('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: "<?= Session::get('error') ?>",
                position: 'topRight'
            });
        </script>
    @endif

</body>
</html>
