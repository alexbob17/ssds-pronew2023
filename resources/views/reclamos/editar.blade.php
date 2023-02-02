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
        	{!! Form::open(['url' => '/reclamos/editar/' . $id, 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}
				{!! Form::hidden('ticket', $id) !!}
				<div class="box-body">
					<div class="form-group-container">					
						{!! Form::selection(6, 'tipo_tecnico', $errors, $tipos_tecnicos, $tipo_tecnico, trans('reclamos/registro.tipo_tecnico'), trans('reclamos/registro.ph_tipo_tecnico')) !!}
						{!! Form::inputWithIcon('fa-square', 6, 'codigo_tecnico', $errors, trans('reclamos/registro.codigo_tecnico'), $codigo_tecnico, trans('reclamos/registro.ph_codigo_tecnico')) !!}
					</div>
					<div class="form-group-container">					
						{!! Form::inputWithIcon('fa-user', 6, 'nombre_tecnico', $errors, trans('reclamos/registro.nombre_tecnico'), $nombre_tecnico, trans('reclamos/registro.ph_nombre_tecnico')) !!}
						{!! Form::selection(6, 'tecnologia', $errors, $tecnologias, $tecnologia, trans('reclamos/registro.tecnologia'), trans('reclamos/registro.ph_tecnologia')) !!}
					</div>
					<div class="form-group-container">					
						{!! Form::inputWithIcon('fa-square', 6, 'id_producto', $errors, trans('reclamos/registro.id_producto'), $id_producto, trans('reclamos/registro.ph_id_producto')) !!}
						{!! Form::inputWithIcon('fa-square', 6, 'id_solicitud', $errors, trans('reclamos/registro.id_solicitud'), $id_solicitud, trans('reclamos/registro.ph_id_solicitud')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::inputWithIcon('fa-user', 6, 'lider_tecnica', $errors, trans('reclamos/registro.lider_tecnica'), $lider_tecnica, trans('reclamos/registro.ph_lider_tecnica')) !!}
						{!! Form::selection(6, 'causa_reclamo', $errors, $causas_reclamos, $causa_reclamo, trans('reclamos/registro.causa_reclamo'), trans('reclamos/registro.ph_causa_reclamo')) !!}
					</div>
					<div class="form-group-container">
						{!! Form::inputTextArea(6, 'observaciones', $errors, null, $observaciones, trans('reclamos/registro.ph_observaciones'), 4) !!}
						{!! Form::inputTextArea(6, 'resolucion_tecnica', $errors, null, null, trans('reclamos/registro.ph_resolucion_tecnica'), 4) !!}		
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					{!! Form::submit('Guardar y Cerrar', ['class' => 'btn btn-warning']) !!}
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
[type="submit"]:disabled, [type="text"]:disabled { cursor: default; }
[name="observaciones"] {
	color: #000;
	cursor: inherit !important;
	font-weight: 600;
}
</style>
@endsection 

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
<!-- InputMask -->
<script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<!-- User definided -->
<script src="{{ asset('/js/reclamos/editar.js?2.4.0') }}" type="text/javascript"></script>
@endsection
