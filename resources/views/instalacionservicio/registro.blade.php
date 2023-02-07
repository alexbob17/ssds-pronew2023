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
                        <label for="motivo_llamada">Motivo de la llamada</label>
                        <input type="text" class="form-control" id="tecnologia" name="tecnologia" readonly="readonly"
                            placeholder="INSTALACION">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="motivo_llamada">Tecnologia</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%"
                            name="tipo_servicio" tabindex="-1" aria-hidden="true">
                            <option selected="selected">Seleccione una opción</option>
                            <option value="HFC">HFC</option>
                            <option value="GPON">GPON</option>
                            <option value="ADSL">ADSL</option>
                            <option value="COBRE">COBRE</option>
                            <option value="DTH">DTH</option>
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="motivo_llamada">Tipo De Orden</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%"
                            name="tipo_servicio" tabindex="-1" aria-hidden="true">
                            <option selected="selected" value="">Seleccione una opción</option>
                            <option value="TV">TV</option>
                            <option value="TV DIG">TV DIG</option>
                            <option value="INTERNET">INTERNET</option>
                            <option value="LINEA HFC">TV + LHFC</option>
                            <option value="">TV + INTERNET</option>
                            <option value="INTERNET">INTERNET + LINEA HFC</option>
                            <option value="REACTIVACION TRIPLE">REACTIVACION TRIPLE</option>
                            <option value="REACTIVACION DOBLE">REACTIVACION DOBLE</option>
                            <option value="REACTIVACION INDIVUAL">REACTIVACION INDIVIDUAL</option>
                            <option value="INDIVIDUAL INTERNET">INDIVIDUAL INTERNET</option>
                            <option value="GPON IPTV">GPON IPTV</option>
                            <option value="LINEA GPON">LINEA GPON</option>
                            <option value="INDIVIDUAL">INDIVIDUAL</option>
                            <option value="REACTIVACION">REACTIVACION</option>
                        </select>
                    </div>
                </div>
            </form>

            <div class="box box-warning">
                <form action="POST">

                    <div class="form-group-container" style="margin-top:2.5rem">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align:center;">
                            <label for="" style="color:#3E69D6">Solicitudes</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="codigo_tecnico">Orden Tv</label>
                            <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefono">Orden Internet</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tecnico">Orden Linea</label>
                            <input type="text" class="form-control" id="tecnico" name="tecnico" required>
                        </div>
                    </div>


                    <div class="form-group-container" style="margin-top:2.5rem">

                        <div class="form-group col-md-3">
                            <label for="motivo_llamada">Tipo De Actividad</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%"
                                name="tipo_servicio" tabindex="-1" aria-hidden="true">
                                <option selected="selected" value="">Seleccione una opción</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefono">Motivo de actividad</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%"
                                name="tipo_servicio" tabindex="-1" aria-hidden="true">
                                <option selected="selected" value="">Seleccione una opción</option>
                                <option value=" AGENDAMIENTO_INST"> AGENDAMIENTO_INST</option>
                                <option value=" AGENDAMIENTO_REP"> AGENDAMIENTO_REP</option>
                                <option value=" AUTORIZADO POR N2"> AUTORIZADO POR N2</option>
                                <option value="  CAMBIO DE EQUIPOS"> CAMBIO DE EQUIPOS</option>
                                <option value="   COMPLETAR GESTION"> COMPLETAR GESTION</option>
                                <option value="  CONFIRMAR AGENDAMIENTO"> CONFIRMAR AGENDAMIENTO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tecnico">SYRENG</label>
                            <input type="text" class="form-control" id="tecnico" name="tecnico" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tecnico">SAP</label>
                            <input type="text" class="form-control" id="tecnico" name="tecnico" required>
                        </div>
                    </div>

                </form>
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
            <script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript">
            </script>

            <!-- boostrap-fileinput -->
            <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript">
            </script>
            <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript">
            </script>
            <!-- User definided -->
            <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
            @endsection