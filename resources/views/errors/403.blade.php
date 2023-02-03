<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>SSD | Error 404</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="{{ asset('/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.1 -->
    <link href="{{ asset('/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/dist/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/x-icon" href="{{ asset('../public/img/img/logo.ico') }}">
    <link rel="shortcut icon" href="{{ asset('../public/img/logo.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('../public/img/logo.ico') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
	folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
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
                <h1>Error 404</h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="error-page">
                    <h2 class="headline text-yellow">404</h2>
                    <div class="error-content">
                        <h3><i class="fa fa-warning text-yellow"></i> Oops! Página no encontrada.</h3>
                        <p>
                            No se ha localizado la URL solicitada en este servidor.
                            Si usted ha introducido la URL manualmente, por favor revise su ortografía e inténtelo de
                            nuevo
                            o puede regresar a la página de {!! link_to('/','inicio') !!}
                        </p>
                    </div>
                    <!-- /.error-content -->
                </div>
                <!-- /.error-page -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/plugins/jQueryUI/jquery-ui-1.11.4.min.js') }}" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript">
    </script>
    <!-- Slimscroll -->
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js') }}" type="text/javascript"></script>
</body>

</html>