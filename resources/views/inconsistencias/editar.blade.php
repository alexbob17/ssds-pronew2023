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
            {!! Form::open(['url' => '/inconsistencias/editar/' . $id, 'autocomplete' => 'off', 'enctype' =>
            'multipart/form-data', 'method' => 'put']) !!}
            {!! Form::hidden('id', $id) !!}
            <div class="box-body">
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-ticket', 6, 'no_incidente', $errors,
                    trans('inconsistencias/registro.no_incidente'), $no_incidente,
                    trans('inconsistencias/registro.ph_no_incidente')) !!}
                    {!! Form::selection(6, 'catalogo_auditoria', $errors, $catalogo_auditorias, $catalogo_auditoria,
                    trans('inconsistencias/registro.catalogo_auditoria'),
                    trans('inconsistencias/registro.ph_catalogo_auditoria')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::selection(6, 'tipo_servicio', $errors, $tipos_servicio, $tipo_servicio,
                    trans('inconsistencias/registro.tipo_servicio'), trans('inconsistencias/registro.ph_tipo_servicio'))
                    !!}
                    {!! Form::selection(6, 'tipo_inconsistencia', $errors, $inconsistencias, $tipo_inconsistencia,
                    trans('inconsistencias/registro.tipo_inconsistencia'),
                    trans('inconsistencias/registro.ph_tipo_inconsistencia')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-calendar', 6, 'fecha_incidente', $errors,
                    trans('inconsistencias/registro.fecha_incidente'), $fecha_incidente) !!}
                    {!! Form::inputWithIcon('fa-square', 6, 'otra_inconsistencia', $errors,
                    trans('inconsistencias/registro.otra_inconsistencia'), null,
                    trans('inconsistencias/registro.ph_otra_inconsistencia')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-square', 6, 'codigo_tecnico', $errors,
                    trans('inconsistencias/registro.codigo_tecnico'), $codigo_tecnico,
                    trans('reclamos/registro.ph_codigo_tecnico')) !!}
                    {!! Form::inputWithIcon('fa-ticket', 6, 'no_orden', $errors,
                    trans('inconsistencias/registro.no_orden'), $no_orden,
                    trans('inconsistencias/registro.ph_no_orden')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::selection(6, 'resolucion', $errors, $resoluciones, null,
                    trans('inconsistencias/registro.resolucion'), trans('inconsistencias/registro.ph_resolucion')) !!}
                    {!! Form::selection(6, 'accion', $errors, $acciones, null, trans('inconsistencias/registro.accion'),
                    trans('inconsistencias/registro.ph_accion')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputTextArea(12, 'observaciones', $errors, null, null,
                    trans('inconsistencias/registro.ph_observaciones'), 4) !!}
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit('Cerrar Caso', ['class' => 'btn btn-primary']) !!}
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
[type="submit"]:disabled {
    cursor: default;
}
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
<script src="{{ asset('/js/inconsistencias/editar.js?2.5.0') }}" type="text/javascript"></script>
@endsection