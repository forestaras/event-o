<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.css">
</head>

<body class="sidebar-collapse hold-transition dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        @include('live.includ.menu')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">lIVE</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">@yield('map_site')</li>
                                {{-- <li class="breadcrumb-item"><a href="#">Волинська осінт</a></li>
                                <li class="breadcrumb-item">Ч-21</li> --}}
                                <!-- <li class="breadcrumb-item active"></li> -->
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">

                <div class="container-fluid">
                    @if (Route::current()->getName() == 'live')
                        @include('live.includ.dani')
                    @endif
                </div>
                <div class="row">

                    <!-- /.col -->

                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-12 col-md-4">
                        {{-- <div class="info-box mb-3"> --}}
                        {{-- @livewire('online-finisher', ['cid' =>66]) --}}

                        {{-- <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                                

                                <div class="info-box-content">
                                    <span class="info-box-text">10:45:33 <a href="">(Ч-21)</a> Мельник Тарас <a
                                            href="">ЛФСО</a></span>
                                    <span class="info-box-text">10:45:33 <a href="">(Ч-21)</a> Мельник Тарас <a
                                            href="">ЛФСО</a></span>
                                    <span class="info-box-text">10:45:33 <a href="">(Ч-21)</a> Мельник Тарас <a
                                            href="">ЛФСО</a></span>
                                    <span class="info-box-text">10:45:33 <a href="">(Ч-21)</a> Мельник Тарас <a
                                            href="">ЛФСО</a></span> --}}
                        <!-- <span class="info-box-text">10:45:33 <a href="">(Ч-21)</a>  Мельник Тарас <a href="">ЛФСО</a></span> -->
                        <!-- <span class="info-box-number">2,000</span> -->
                        {{-- </div> --}}
                        <!-- /.info-box-content -->
                        {{-- </div> --}}
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>


                <section class="content">
                    <div class="container-fluid">
                        <!-- Info boxes -->


                        <!-- /.r
                            <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            @yield('content')
                            <!-- /.col -->

                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->



                                <!-- /.info-box -->

                                <!-- /.card -->

                                <!-- PRODUCT LIST -->
                                {{-- @livewire('online-finisher', ['cid' =>$cid]) --}}
                                @if (!str_contains($_SERVER['REQUEST_URI'], 'split'))
                                    @include('live.includ.week_event')
                                    @include('live.includ.reclam')
                                @endif

                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!--/. container-fluid -->
                </section>
                <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All
            rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/plugins/raphael/raphael.min.js"></script>
    <script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    {{-- <script src="/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard2.js"></script>
</body>

</html>
