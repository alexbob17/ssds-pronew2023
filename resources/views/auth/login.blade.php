<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SSD | Iniciar Sesión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="{{ asset('/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/dist/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('/plugins/iCheck/square/orange.css') }}" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/x-icon" href="{{ asset('../public/img/img/logo.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('../public/img/logo.ico') }}">

</head>

<body class="hold-transition login-page" style="display: flex;
    justify-content: center;
    align-items: center;">
    <div class="login-box">
        <div class="login-logo" ">
            
            <img src=" {{ asset('../public/img/Claro-logo.png') }}" alt="Logo Claro" style="width: 250px;">
            <p class="text-stroke"> SISTEMA SEGUIMIENTO DESPACHO</p>
        </div><!-- /.login-logo -->
        <div class=" login-box-body login-update" style="">
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissable" style="padding:0px !important">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <p class="login-box-msg">Iniciar Sesion</p>
            {!! Form::open(['url' => 'login']) !!}
            <div class="form-group has-feedback">
                {!! Form::text('username', null, ['class' => 'form-control input-login', 'placeholder' =>
                'Usuario'])
                !!}
                <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control input-login', 'placeholder' =>
                'Contraseña'])
                !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8" style="">
                    <div class="checkbox icheck" style="padding:20px">
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Mantener la sesión
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="" style="height: 55px !important;">
                    {!! Form::submit('Ingresar', ['class' => 'btn-block btn-login']) !!}
                </div><!-- /.col -->
            </div>
            {!! Form::close() !!}
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
        if ($("input.flat")[0]) {
            $(document).ready(function() {
                $('input.flat').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });
            });
        }
    });
    </script>
</body>

</html>