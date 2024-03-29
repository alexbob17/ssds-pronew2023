<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>SSD | {!! $page_title !!}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <!-- <link href="{{ asset('/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- Ionicons 2.0.1 -->
    <!-- <link href="{{ asset('/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" /> -->

    <link rel="icon" type="image/x-icon" href="{{ asset('../public/img/img/logo.ico') }}">

    <link href="{{ asset('/plugins/CdnMigraciones/FontAll.min.css') }}" rel="stylesheet" type="text/css" />


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <link href="{{ asset('/plugins/CdnMigraciones/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- jQuery -->
    <script src="{{ asset('/plugins/CdnMigraciones/jquery3.5.1.min.js') }}"></script>


    <link href="{{ asset('/plugins/iCheck/flat/red.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('/plugins/CdnMigraciones/Poppinscss2.css') }}" rel="stylesheet" type="text/css" />

    <!-- Popper.js -->

    <script src="{{ asset('/plugins/CdnMigraciones/popper.min.js') }}">
    </script>


    <!-- Bootstrap JavaScript -->

    <script src="{{ asset('/plugins/CdnMigraciones/bootstrap.min.js') }}"></script>



    <!-- Bootstrap Table JavaScript -->
    <script src="{{ asset('/plugins/CdnMigraciones/bootstrap-table.min.js') }}"></script>

    <script src="{{ asset('/plugins/CdnMigraciones/bootstrap-table-es-MX.min.js') }}"></script>



    <!-- Bootstrap Table CSS -->

    <link href="{{ asset('/plugins/CdnMigraciones/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />



    <!-- ... -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ... -->


    <link rel="shortcut icon" href="{{ asset('../public/img/logo.ico') }}">

    <link rel="icon" type="image/png" href="{{ asset('../public/img/logo.ico') }}">

    <!-- iCheck -->
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{{ asset('/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/iCheck/flat/red.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
    <!-- Theme style -->
    <link href="{{ asset('/dist/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('/dist/css/skins/_all-skins.css') }}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


</head>

<body class="skin-black-light">
    <div class="wrapper">
        @include('includes.header')
        @include('includes.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>{{{ $page_title }}}</h1>
                <ol class="breadcrumb">
                    <li>{!! Html::decode(link_to('/','<i class="fa fa-dashboard"></i> Inicio')) !!}</li>
                    @if(Request::is('tecnicos/guardar'))
                    <li onclick="goBack()" class="btnGoback"><i class="fa fa-arrow-left"></i> Volver</li>
                    @endif

                    @if (isset($breadcrumb))
                    @foreach ($breadcrumb as $url_link)
                    @if(isset($url_link['route']))
                    <li>{!! link_to($url_link['route'], $url_link['name']) !!}</li>
                    @else
                    <li class="active">{!! $url_link['name'] !!}</li>
                    @endif
                    @endforeach
                    @endif
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        @include('includes.footer')
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.3 -->


    <script>
    function goBack() {
        window.history.back();
    }
    </script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/plugins/jQueryUI/jquery-ui-1.11.4.min.js') }}" type="text/javascript"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- Popper -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript">
    </script>
    <!-- iCheck -->
    <script src="{{ asset('/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.js') }}" type="text/javascript"></script>


    <script type="text/javascript">
    var APP_URL = "{!! url('/') !!}";
    </script>
    @yield('scripts')
</body>

</html>