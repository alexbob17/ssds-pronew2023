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
    <link href="{{ asset('/plugins/iCheck/square/red.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <p><strong>S</strong>istema de <strong>S</strong>eguimiento<br> de <strong>D</strong>espacho
        </p>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<ul>
			@foreach ($errors->all() as $error)
			  <li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
        <p class="login-box-msg">Actualizar contraseña</p>
        	{!! Form::open(['url' => '/cambiar_contrasena', 'method' => 'put']) !!}
          <div class="form-group has-feedback">
            {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Contraseña actual']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Contraseña nueva']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
           <div class="form-group has-feedback">
            {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repita la contraseña nueva']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              {!! Form::submit('Guardar', ['class' => 'btn btn-warning btn-block btn-flat']) !!}
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
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-orange',
          radioClass: 'iradio_square-orange',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
