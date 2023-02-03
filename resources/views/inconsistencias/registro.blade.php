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
            {!! Form::open(['url' => '/inconsistencias/registro', 'autocomplete' => 'off', 'enctype' =>
            'multipart/form-data']) !!}
            <div class="box-body">
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-ticket', 6, 'no_incidente', $errors,
                    trans('inconsistencias/registro.no_incidente'), null,
                    trans('inconsistencias/registro.ph_no_incidente')) !!}
                    {!! Form::selection(6, 'catalogo_auditoria', $errors, $catalogo_auditorias, null,
                    trans('inconsistencias/registro.catalogo_auditoria'),
                    trans('inconsistencias/registro.ph_catalogo_auditoria')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::selection(6, 'tipo_servicio', $errors, $tipos_servicios, null,
                    trans('inconsistencias/registro.tipo_servicio'), trans('inconsistencias/registro.ph_tipo_servicio'))
                    !!}
                    {!! Form::selection(6, 'tipo_inconsistencia', $errors, $inconsistencias, null,
                    trans('inconsistencias/registro.tipo_inconsistencia'),
                    trans('inconsistencias/registro.ph_tipo_inconsistencia')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::dateWithIcon(6, 'fecha_incidente', $errors,
                    trans('inconsistencias/registro.fecha_incidente')) !!}
                    {!! Form::inputWithIcon('fa-square', 6, 'otra_inconsistencia', $errors,
                    trans('inconsistencias/registro.otra_inconsistencia'), null,
                    trans('inconsistencias/registro.ph_otra_inconsistencia')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-square', 6, 'codigo_tecnico', $errors,
                    trans('inconsistencias/registro.codigo_tecnico'), null,
                    trans('inconsistencias/registro.ph_codigo_tecnico')) !!}
                    {!! Form::inputWithIcon('fa-ticket', 6, 'no_orden', $errors,
                    trans('inconsistencias/registro.no_orden'), null, trans('inconsistencias/registro.ph_no_orden')) !!}
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
<script src="{{ asset('/js/inconsistencias/registro.js?2.5.0') }}" type="text/javascript"></script>
<script type="text/javascript">
@if(old('tipo_inconsistencia')) var old_tipo_inconsistencia = "{!! old('tipo_inconsistencia') !!}";
@endif
</script>
@endsection