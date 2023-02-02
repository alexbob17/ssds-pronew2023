@extends('app') 

@section('content')
<div class="row">
	<div class="col-md-12">
		@if (session()->has('success_message'))  
            <div class="alert alert-success alert-dismissable">
             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>{{ session('success_message') }}</p>
			</div>
		@endif
		<!-- general form elements -->
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title">Datos del Registro</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
        	{!! Form::open(['url' => '/penalizaciones/registro', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}
				<div class="box-body">
					<div class="form-group-container">
						{!! Form::dateWithIcon(6, 'fecha_reporte', $errors, trans('penalizaciones/registro.fecha_reporte')) !!}
						{!! Form::selection(6, 'nivel', $errors, $niveles, null, trans('penalizaciones/registro.nivel'), trans('penalizaciones/registro.ph_nivel')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::selection(6, 'nombre_agente', $errors, $agentes, null, trans('penalizaciones/registro.nombre_agente'), trans('penalizaciones/registro.ph_nombre_agente')) !!}
						{!! Form::selection(6, 'catalogo_auditoria', $errors, $catalogos, null, trans('penalizaciones/registro.catalogo_auditoria'), trans('penalizaciones/registro.ph_catalogo_auditoria')) !!}
						</div>
					<div class="form-group-container">
						{!! Form::selection(6, 'aplicativo', $errors, $aplicativos, null, trans('penalizaciones/registro.aplicativo'), trans('penalizaciones/registro.ph_aplicativo')) !!}
						{!! Form::selection(6, 'tecnologia', $errors, $tecnologias, null, trans('penalizaciones/registro.tecnologia'), trans('penalizaciones/registro.ph_tecnologia')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::selection(6, 'clasificacion_gestion', $errors, $clasificaciones, null, trans('penalizaciones/registro.clasificacion_gestion'), trans('penalizaciones/registro.ph_clasificacion_gestion')) !!}
						{!! Form::inputWithIcon('fa-ticket', 6, 'no_solicitud', $errors, trans('penalizaciones/registro.no_solicitud'), null, trans('penalizaciones/registro.ph_no_solicitud')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::selection(6, 'mal_proceso', $errors, $malos_procesos, null, trans('penalizaciones/registro.mal_proceso'), trans('penalizaciones/registro.ph_mal_proceso')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::inputTextArea(12, 'observaciones', $errors, null, null, trans('penalizaciones/registro.ph_observaciones'), 6) !!}
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					{!! Form::submit('Guardar Caso', ['class' => 'btn btn-warning']) !!}
				</div>
			{!! Form::close() !!}
		</div>
		<!-- /.box -->
	</div>
</div>
@endsection 

@section('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}">
<style>
[type="submit"]:disabled { cursor: default; }
</style>
@endsection 

@section('scripts')
<!-- datepicker -->
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
<!-- InputMask -->
<script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<!-- User definided -->
<script src="{{ asset('/js/penalizaciones/registro.js?2.4.1') }}" type="text/javascript"></script>
@endsection
