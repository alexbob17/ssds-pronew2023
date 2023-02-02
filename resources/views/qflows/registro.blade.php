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
				<h3 class="box-title">Datos del Caso</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
        	{!! Form::open(['url' => '/qflows/registro', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}
				<div class="box-body">
					<div class="form-group-container">
						{!! Form::inputWithIcon('fa-ticket', 6, 'no_caso_qflow', $errors, trans('qflows/registro.no_caso_qflow'), null, trans('qflows/registro.ph_no_caso_qflow')) !!}
						{!! Form::dateWithIcon(6, 'fecha_registro', $errors, trans('qflows/registro.fecha_registro')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::dateWithIcon(6, 'fecha_recibido', $errors, trans('qflows/registro.fecha_recibido')) !!}					
						{!! Form::inputWithIcon('fa-user', 6, 'asesor', $errors, trans('qflows/registro.asesor'), null, trans('qflows/registro.ph_asesor')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::selection(6, 'id_tienda', $errors, $tiendas, null, trans('qflows/registro.id_tienda'), trans('qflows/registro.ph_id_tienda')) !!}
						{!! Form::selection(6, 'tipo_servicio', $errors, $tipos_servicio, null, trans('qflows/registro.tipo_servicio'), trans('qflows/registro.ph_tipo_servicio')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::inputWithIcon('fa-square', 6, 'no_producto', $errors, trans('qflows/registro.no_producto'), null, trans('qflows/registro.ph_no_producto')) !!}
						{!! Form::inputWithIcon('fa-square', 6, 'no_dano_solicitud', $errors, trans('qflows/registro.no_dano_solicitud'), null, trans('qflows/registro.ph_no_dano_solicitud')) !!}				
					</div>
					<div class="form-group-container">
						{!! Form::selection(6, 'tipo_caso', $errors, $tipos_casos, null, trans('qflows/registro.tipo_caso'), trans('qflows/registro.ph_tipo_caso')) !!}
						{!! Form::selection(6, 'tipologia', $errors, $tipologias, null, trans('qflows/registro.tipologia'), trans('qflows/registro.ph_tipologia')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::selection(6, 'workflow', $errors, $workflow, null, trans('qflows/registro.workflow'), trans('qflows/registro.ph_workflow')) !!}
						{!! Form::selection(6, 'medio_ingreso', $errors, $medios_ingreso, null, trans('qflows/registro.medio_ingreso'), trans('qflows/registro.ph_medio_ingreso')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::inputTextArea(12, 'observaciones', $errors, null, null, trans('qflows/registro.ph_observaciones'), 4) !!}
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

<!-- boostrap-fileinput -->
<script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript"></script>
<!-- User definided -->
<script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
@endsection
