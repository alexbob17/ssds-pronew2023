@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('error_message'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>{{ session('error_message') }}</p>
            </div>
        </div>
        @endif
        @if (session()->has('success_message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('success_message') }}</p>
        </div>
        @endif
        <!-- general form elements -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Datos del Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url' => '/penalizaciones/editar/' . $id, 'autocomplete' => 'off', 'enctype' =>
            'multipart/form-data', 'method' => 'put']) !!}
            {!! Form::hidden('id', $id) !!}
            <div class="box-body">
                <div class="form-group-container">
                    {!! Form::selection(6, 'nivel', $errors, $niveles, $nivel, trans('penalizaciones/registro.nivel'),
                    trans('penalizaciones/registro.ph_nivel')) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-file', 6, 'nombre', $errors,
                    trans('penalizaciones/registro.nombre_agente'), $nombre) !!}
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
<link rel="stylesheet" href="{{ asset('/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" type="text/css"
    media="all" />
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}">
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
<script src="{{ asset('/js/penalizaciones/editar-agente.js') }}" type="text/javascript"></script>
@endsection