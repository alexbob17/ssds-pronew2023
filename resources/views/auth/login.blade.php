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

</head>

<body class="hold-transition login-page" style="display: flex;
    justify-content: center;
    align-items: center;">
    <div class="login-box">
        <div class="login-logo" ">
            <!-- <p style=" color:white"><strong>S</strong>istema de <strong>S</strong>eguimiento<br> de
            <strong>D</strong>espacho
            </p> -->
            <img src="https://1000marcas.net/wp-content/uploads/2021/02/Claro-Logo.png" alt=""
                style="width: 300px;margin-bottom: 1rem;">
        </div><!-- /.login-logo -->
        <div class=" login-box-body login-update" style="
              height: 420px;
              width: 360px;
              display: flex;
              color: white;
              background-color: rgba(255, 255, 255, 0.13);
              /* position: absolute;
              transform: translate(-50%, -50%);
              top: 50%;
              left: 50%; */
              border-radius: 10px;
              border: 2px solid rgba(255, 255, 255, 0.1);
              box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
              padding: 50px 35px;
              flex-direction: column;
              align-content: center;
              justify-content: center;
              align-items: stretch;">
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
                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Usuario','style' =>
                'display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.07);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;'])
                !!}
                <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña','style' =>
                'display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.07);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;'])
                !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck" style="padding:20px">
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Mantener la sesión
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="">
                    {!! Form::submit('Entrar', ['class' => 'btn btn-warning btn-block ','style' => ' margin-top:
                    6rem;
                    /* width: 90%; */
                    background-color: #ffffff;
                    color: #080710;
                    padding: 15px 0;
                    font-size: 18px;
                    font-weight: 600;
                    border:1px solid black;
                    border-radius: 5px;
                    cursor: pointer; ']) !!}
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