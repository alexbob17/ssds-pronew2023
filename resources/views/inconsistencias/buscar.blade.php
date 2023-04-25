@extends('app')

@section('content')

{!! Form::modal('Advertencia', 'Ingrese el valor a buscar.', 'Aceptar') !!}

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box" style:"">
            <div class="box-header with-border">
                <h3 class="box-title">Búsqueda de Casos Atendidos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-group-container">
                    {!! Form::selection(4, 'opcion_busqueda', $errors, $opciones_busqueda) !!}
                    {!! Form::inputWithIcon('fa-newspaper-o', 4, 'patron_busqueda', $errors) !!}
                    {!! Form::button('Buscar', ['id' => 'buscar', 'class' => 'btn btn-primary', 'style' => 'margin-left:
                    15px']) !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="resultados" class="box box-warning box-solid">
            <div class="box-header">
                <h3 class="box-title">Resultados</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover table-result">
                    <thead>
                        <tr>
                            <th>{!! trans('inconsistencias/buscar.consecutivo') !!}</th>
                            <th>{!! trans('inconsistencias/buscar.fecha_atencion') !!}</th>
                            <th>{!! trans('inconsistencias/buscar.no_incidente') !!}</th>
                            <th>{!! trans('inconsistencias/buscar.tipo_servicio') !!}</th>
                            <th>{!! trans('inconsistencias/buscar.tipo_inconsistencia') !!}</th>
                            <th>{!! trans('inconsistencias/buscar.fecha_incidente') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.no_orden') !!}</th>
                            <th>{!! trans('inconsistencias/buscar.login_usuario') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-empty" colspan="8">Ingrese los datos de la búsqueda</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}">
<link rel="stylesheet" href="{{ asset('/css/inconsistencias/buscar.css') }}">
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
<!-- User definided -->
<script src="{{ asset('/js/inconsistencias/buscar.js?2.4.0') }}" type="text/javascript"></script>
@endsection