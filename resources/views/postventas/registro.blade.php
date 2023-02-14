@extends('app') @section('content')
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
            <!-- FORMULARIO #1 -->
            <form action="" id="form1" method="post" class="box-body">
                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <input type="text" class="form-control" placeholder="Ingrese Codigo Tecnico" id="codigo_tecnico"
                            name="codigo_tecnico" oninput="this.value = this.value.toUpperCase()" />
                    </div>
                    <div class="form-group col-md-2" style="margin-top:2.5rem; width:auto;">
                        <button type="button" id="btn_busqueda" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                        <button type="button" id="btn_reiniciar" class="btn btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" readonly="true" />
                    </div>
                    <div class="form-group col-md-5">
                        <label for="tecnico">Técnico</label>
                        <input type="text" class="form-control" id="tecnico" name="tecnico" readonly="true" />
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-3" id="view-container">
                        <label for="motivo_llamada">Motivo de la llamada</label>
                        <select class="form-control" style="width: 100%;" name="motivo_llamada" tabindex="-1"
                            id="motivo_llamada" aria-hidden="true">
                            <option selected="selected">SELECCIONE UNA OPCION</option>
                            <option value="INSTALACION">INSTALACION</option>
                            <option value="POSTVENTA">POSTVENTA</option>
                            <option value="ADSL">REPARACIONES</option>
                            <option value="COBRE">CONSULTAS</option>
                            <option value="ANULACIONES">ANULACIONES</option>
                            <option value="REACTIVACION">REACTIVACION</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2" id="tec_input">
                        <label for="tecnologia">Tecnologia</label>
                        <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1"
                            id="tecnologia" aria-hidden="true">
                            <option selected="selected">SELECCIONE</option>
                            <option value="HFC">HFC</option>
                            <option value="GPON">GPON</option>
                            <option value="ADSL">ADSL</option>
                            <option value="COBRE">COBRE</option>
                            <option value="DTH">DTH</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" id="select_ordenhide">
                        <label for="select_orden">Tipo De Orden</label>
                        <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden"
                            tabindex="-1" aria-hidden="true">
                            <option>SELECCIONE UNA OPCION</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>
                    <div class="box-footer" id="btn-save" style="text-align: center;">
                        <button type="submit" class="btn btn-warning">Guardar Caso </button>
                    </div>
                </div>
            </form>


            @endsection @section('styles')
            <!-- Select2 -->
            <link rel=" stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css" />
            <link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}" />
            <!-- User definided -->
            <link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}" />
            <style>
            [type="submit"]:disabled {
                cursor: default;
            }
            </style>
            @endsection @section('scripts')
            <!-- datepicker -->
            <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript">
            </script>
            <script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript">
            </script>
            <!-- Select2 -->
            <script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
            <script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
            <!-- InputMask -->
            <script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
            <script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript">
            </script>
            <script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript">
            </script>
            <script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
            <!-- boostrap-fileinput -->
            <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript">
            </script>
            <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript">
            </script>
            <!-- User definided -->
            <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
            <script src="{{asset('/js/instalaciones/validacionesSelect.js')}}" type="text/javascript"></script>
            <!-- <script src="{{asset('/js/instalaciones/registro.js')}}" type="text/javascript"> </script> -->
            <script src="{{asset('/js/instalaciones/changePage.js')}}" type="text/javascript"> </script>

            @endsection