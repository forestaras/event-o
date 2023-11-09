<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ CRUDBooster::getSetting('appname') }}@yield('title')</title>
    <link href="/{{ CRUDBooster::getSetting('favicon') }}" rel="icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.css">

</head>

<body class="sidebar-collapse hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">
        @include('live.includ.menu')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">@yield('map_site')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">

                @if (Route::current()->getName() == 'live' or Route::current()->getName() == 'event')
                    <div class="container-fluid d-none d-sm-block">
                        @include('live.includ.dani')
                    </div>
                @endif

                <div class="row">
                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-12 col-md-4"></div>
                </div>

                <section class="content"> 
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                            <div class="col-md-3 row">
                                @if (!str_contains($_SERVER['REQUEST_URI'], 'split'))
                                    <div class="col-6 col-md-12">
                                        @include('live.includ.week_event')
                                    </div>
                                    <div class="col-6 col-md-12" >
                                        @include('live.includ.reclam')
                                    </div>
                                    

                                    
                                    @include('live.show_widget.widget_partneri')
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <footer class="main-footer">
            <strong>Copyright &copy; 2022-2023 <a href="https://event-o.net">event-o.net</a>.</strong> All
            rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>EVENTO</b> 2.1
            </div>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- jQuery Mapael -->
    <script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/plugins/raphael/raphael.min.js"></script>
    <script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <script src="/dist/js/pages/dashboard2.js"></script>

</body>

</html>
