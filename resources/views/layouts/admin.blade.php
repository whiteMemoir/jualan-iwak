<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset("adminlte/plugins/fontawesome-free/css/all.min.css") }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href={{ asset("adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset("adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
    <!-- JQVMap -->
    <link rel="stylesheet" href={{ asset("adminlte/plugins/jqvmap/jqvmap.min.css") }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("adminlte/dist/css/adminlte.min.css") }}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{ asset("adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}>
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{ asset("adminlte/plugins/daterangepicker/daterangepicker.css") }}>
    <!-- summernote -->
    <link rel="stylesheet" href={{ asset("adminlte/plugins/summernote/summernote-bs4.min.css") }}>

    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src={{ asset("adminlte/dist/img/AdminLTELogo.png") }} alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://www.lautanikan.com" class="nav-link" target="_blank">Lihat Web</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('admin/dashboard') }}" class="brand-link">
                <img src= {!! asset('assets/img/logo-admin.png') !!}  alt="AdminLTE Logo"
                    class="brand-image">
                <span class="brand-text font-weight-light">Lautan Ikan Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                @yield('sidebar-menu')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                @yield('box')
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="#">Jualan-Ikan</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src={{ asset("adminlte/plugins/jquery/jquery.min.js") }}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset("adminlte/plugins/jquery-ui/jquery-ui.min.js") }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset("adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <!-- ChartJS -->
    <script src={{ asset("adminlte/plugins/chart.js/Chart.min.js") }}></script>
    <!-- Sparkline -->
    <script src={{ asset("adminlte/plugins/sparklines/sparkline.js") }}></script>
    <!-- JQVMap -->
    <script src={{ asset("adminlte/plugins/jqvmap/jquery.vmap.min.js") }}></script>
    <script src={{ asset("adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js") }}></script>
    <!-- jQuery Knob Chart -->
    <script src={{ asset("adminlte/plugins/jquery-knob/jquery.knob.min.js") }}></script>
    <!-- daterangepicker -->
    <script src={{ asset("adminlte/plugins/moment/moment.min.js") }}></script>
    <script src={{ asset("adminlte/plugins/daterangepicker/daterangepicker.js") }}></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src={{ asset("adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script>
    <!-- Summernote -->
    <script src={{ asset("adminlte/plugins/summernote/summernote-bs4.min.js") }}></script>
    <!-- overlayScrollbars -->
    <script src={{ asset("adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset("adminlte/dist/js/adminlte.js") }}></script>
    <!-- AdminLTE for demo purposes -->
    <script src={{ asset("adminlte/dist/js/demo.js") }}></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset("adminlte/dist/js/pages/dashboard.js") }}></script>
    @yield('datatable-script')
</body>

</html>
