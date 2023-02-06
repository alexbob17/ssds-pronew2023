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
            <form action="" method="post" class="box-body">

                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefono">Teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tecnico">Técnico</label>
                        <input type="text" class="form-control" id="tecnico" name="tecnico" required>
                    </div>
                </div>

                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="motivo_llamada">Tecnologia</label>
                        <input type="text" class="form-control" id="tecnologia" name="tecnologia" disabled
                            placeholder="HFC">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="motivo_llamada">Motivo de la llamada</label>
                        <input type="text" class="form-control" id="tecnologia" name="tecnologia" disabled
                            placeholder="INSTALACION">
                    </div>

                    <div class="from-group col-md-3">
                        <label for="motivo_llamada">Motivo de la Llamada</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%"
                            name="tipo_servicio" tabindex="-1" aria-hidden="true">
                            <option selected="selected" value="">Seleccione una opción</option>
                            <option value="INSTALACIONES">INSTALACIONES</option>
                            <option value="INTERNET ADSL">POSTVENTAS</option>
                            <option value="INTERNET HFC">REPARACIONES</option>
                            <option value="LINEA COBRE">CONSULTAS</option>
                            <option value="LINEA HFC">ANULACION</option>
                            <option value="TV DTH">REACTIVACION TRIPLE</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="motivo_llamada">Tipo De Orden</label>
                        <input type="text" class="form-control" id="tecnologia" name="tecnologia" disabled
                            placeholder="INSTALACION">
                    </div>



                </div>

                <div class="form-group">
                    <label for="tipo_orden">Tipo de Orden</label>
                    <input type="text" class="form-control" id="tipo_orden" name="tipo_orden" required>
                </div>
                <div class="form-group">
                    <label for="orden_tv">Orden TV</label>
                    <input type="text" class="form-control" id="orden_tv" name="orden_tv" required>
                </div>
                <div class="form-group">
                    <label for="orden_internet">Orden Internet</label>
                    <input type="text" class="form-control" id="orden_internet" name="orden_internet" required>
                </div>
                <div class="form-group">
                    <label for="orden_linea">Orden Línea</label>
                    <input type="text" class="form-control" id="orden_linea" name="orden_linea" required>
                </div>
                <div class="form-group">
                    <label for="motivo_actividad">Motivo de la Actividad</label>
                    <input type="text" class="form-control" id="motivo_actividad" name="motivo_actividad" required>
                </div>
                <div class="form-group">
                    <label for="syreng">SYRENG</label>
                    <input type="number" class="form-control" id="syre" </div>
                </div>
                @endsection

                @section('styles')
                <!-- Select2 -->
                <link rel=" stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css">
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
                <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript">
                </script>
                <script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"
                    type="text/javascript"></script>
                <!-- Select2 -->
                <script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
                <script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
                <!-- InputMask -->
                <script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
                <script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript">
                </script>
                <script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript">
                </script>
                <script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript">
                </script>

                <!-- boostrap-fileinput -->
                <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript">
                </script>
                <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}"
                    type="text/javascript"></script>
                <!-- User definided -->
                <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
                @endsection