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
            {!! Form::open(['url' => '/nodos/editar/' . $id, 'autocomplete' => 'off', 'enctype' =>
            'multipart/form-data', 'method' => 'put']) !!}
            {!! Form::hidden('consecutivo', $id) !!}
            <div class="box-body">
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-user', 6, 'nombre_cliente', $errors,
                    trans('nodos/registro.nombre_cliente'), $nombre_cliente, trans('nodos/registro.ph_nombre_cliente'))
                    !!}
                    {!! Form::inputWithIcon('fa-square', 6, 'no_contrato', $errors, trans('nodos/registro.no_contrato'),
                    $no_contrato, trans('nodos/registro.ph_no_contrato')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-map-o', 6, 'ubicacion_geografica', $errors,
                    trans('nodos/registro.ubicacion_geografica'), $ubicacion_geografica,
                    trans('nodos/registro.ph_ubicacion_geografica')) !!}
                    {!! Form::inputWithIcon('fa-map-o', 6, 'barrio', $errors, trans('nodos/registro.barrio'), $barrio,
                    trans('nodos/registro.ph_barrio')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-map-o', 6, 'direccion', $errors, trans('nodos/registro.direccion'),
                    $direccion, trans('nodos/registro.ph_direccion')) !!}
                    {!! Form::inputWithIcon('fa-square', 6, 'codigo_dano', $errors, trans('nodos/registro.codigo_dano'),
                    $codigo_dano, trans('nodos/registro.ph_codigo_dano')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::dateWithIcon(6, 'fecha_registro_dano', $errors,
                    trans('nodos/registro.fecha_registro_dano'), $fecha_registro_dano) !!}
                    {!! Form::inputWithIcon('fa-square', 6, 'nodo_saturado', $errors,
                    trans('nodos/registro.nodo_saturado'), $nodo_saturado, trans('nodos/registro.ph_nodo_saturado')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-square', 6, 'nomenclatura_nodo', $errors,
                    trans('nodos/registro.nomenclatura_nodo'), $nomenclatura_nodo,
                    trans('nodos/registro.ph_nomenclatura_nodo')) !!}
                    {!! Form::selection(6, 'estado_gestion', $errors, $estados, $estado_gestion,
                    trans('nodos/registro.estado_gestion'), trans('nodos/registro.ph_estado_gestion')) !!}
                </div>

                <div class="form-group-container">
                    {!! Form::dateWithIcon(6, 'fecha_fin_afectacion', $errors,
                    trans('nodos/registro.fecha_fin_afectacion')) !!}
                </div>
                <div class="form-group-container">
                    @if ($comentarios != null)
                    {!! Form::inputTextArea(12, 'historial', $errors, trans('nodos/registro.historial'), $comentarios,
                    null, 4) !!}
                    @endif
                    {!! Form::inputTextArea(12, 'comentarios', $errors, null, null,
                    trans('nodos/registro.ph_comentarios'), 4) !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Guardar Caso', ['class' => 'btn btn-primary']) !!}
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

    [name="historial"] {
        color: #000;
        cursor: inherit !important;
        font-weight: 600;
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

    <!-- boostrap-fileinput -->
    <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript"></script>
    <!-- User definided -->
    <script src="{{ asset('/js/nodos/editar.js?2.3.0') }}" type="text/javascript"></script>
    @endsection