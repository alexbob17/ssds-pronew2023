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

            <!-- FORMULARIO #1 -->
            <form action="POST" id="form1" method="post" class="box-body">

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
                        <input type="text" class="form-control" id="motivollamada" name="motivollamada"
                            readonly="readonly" placeholder="INSTALACION" style="background:#f9f936">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tecnologia">Tecnologia</label>
                        <select class="form-control" style="width: 100%" name="tecnologia" tabindex="-1"
                            aria-hidden="true">
                            <option selected="selected">Seleccione una opción</option>
                            <option value="HFC">HFC</option>
                            <option value="GPON">GPON</option>
                            <option value="ADSL">ADSL</option>
                            <option value="COBRE">COBRE</option>
                            <option value="DTH">DTH</option>
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="tipoorden">Tipo De Orden</label>
                        <select class="form-control " style="width: 100%" name="tipo_servicio" tabindex="-1"
                            aria-hidden="true">
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

            <!-- FORMULARIO #2 -->
            <div class="box box-warning">
                <form action="POST" id="form2" method="post" class="box-body">

                    <div class="form-group-container" style="margin-top:2.5rem">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align:center;">
                            <label for="" style="color:#3E69D6;font-size:18px;">Solicitudes</label>
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
                            <label for="tipo_actividad">Tipo De Actividad</label>
                            <select class="form-control " style="width: 100%" name="tipo_servicio" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="">Seleccione una opción</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefono">Motivo de actividad</label>
                            <select class="form-control " style="width: 100%" name="tipo_servicio" tabindex="-1"
                                aria-hidden="true">
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

                    <div class="from-group-container">
                        <div class="form-group col-md-3">
                            <label for="equipostv">Equipo Tv</label>
                            <div class="box_equipostv">
                                <div>
                                    <p>Tv 1</p>

                                </div>
                                <input type="text" class="form-control" id="equipotv1" name="equipotv1">
                            </div>
                            <div class="box_equipostv">
                                <p>Tv 2</p>
                                <input type="text" class="form-control" id="equipostv2" name="equipostv2">

                            </div>

                            <div class="box_equipostv">
                                <p>Tv 3</p> <input type="text" class="form-control" id="equipostv3" name="equipostv3">
                            </div>
                            <div class="box_equipostv">
                                <p>Tv 4</p> <input type="text" class="form-control" id="equipostv" name="equipostv4">
                            </div>
                            <div class="box_equipostv">
                                <p>Tv 5</p> <input type="text" class="form-control" id="equipostv5" name="equipostv5">
                            </div>

                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="EModem">
                                    Equipo Modem
                                </label>
                                <input type="number" class="form-control" id="equipomodem" name="equipomodem" required>
                            </div>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="EModem">
                                    Numero Voip
                                </label>
                                <input type="text" class="form-control" id="numerovoip" name="numerovoip" required>
                            </div>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="EModem">
                                    Georeferencia
                                </label>
                                <input type="text" class="form-control" id="georeferencia" name="georeferencia"
                                    required>
                            </div>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trabajado
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-9">
                                <label for="EModem">
                                    Observaciones
                                </label>
                                <input type="number" class="form-control" id="equipomodem" name="equipomodem" required>
                            </div>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-9">
                                <label for="EModem">
                                    Recibe
                                </label>
                                <input type="number" class="form-control" id="equipomodem" name="equipomodem" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-container">
                        <h4 class="box-title" style="color:#3E69D6;text-align:center;font-weight:bold;">Elementos de red
                        </h4>
                        <div class="box box-warning" style="margin: botton 12px;">
                            <div class="form-group-container" style="margin-top:1rem">
                                <div class="form-group col-md-3">
                                    <label for="Nodo">
                                        Nodo
                                    </label>
                                    <input type="number" class="form-control" id="nodo" name="nodo" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="tap">
                                        TAP
                                    </label>
                                    <input type="number" class="form-control" id="tap" name="tap" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tap">
                                        Posicion
                                    </label>
                                    <input type="number" class="form-control" id="tap" name="tap" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="tap">
                                        Materiales
                                    </label>
                                    <input type="number" class="form-control" id="tap" name="tap" required>
                                </div>
                            </div>

                            <div class="box-footer" style="text-align:  center;">
                                {!! Form::submit('Guardar Caso', ['class' => 'btn btn-warning']) !!}
                            </div>
                        </div>
                </form>
            </div>

            <!-- FORMULARIO #3 -->
            <form action="POST" id="form3" method="post" class="box-body">

                <div class="form-group-container">
                    <div class="form-group col-md-3" style="margin-top: 3rem; text-align:center;">
                        <label for="" style="color:#3E69D6;font-size:18px;">Solicitudes</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Orden Internet</label>
                        <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefono">SAP</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipoactividadadsl">Tipo Actividad</label>
                        <select class="form-control" style="width: 100%" name="tipoactividadadsl" tabindex="-1"
                            aria-hidden="true">
                            <option selected="selected">Seleccione una opción</option>
                            <option value="REALIZADA">REALIZADA</option>
                            <option value="OBJETADA">OBJETADA</option>
                            <option value="TRANSFERIDA">TRANSFERIDA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Trabajado
                            </label>
                        </div>
                    </div>

                    <div class="form-group-container">
                        <div class="form-group col-md-12">
                            <label for="telefono">Observaciones</label>
                            <input type="number" class="form-control" id="observaciones-form3"
                                name="observaciones-form3" required>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="telefono">Materiales</label>
                            <input type="text" class="form-control" id="materiales-form3" name="materiales-form3"
                                required placeholder="Comentarios...">
                        </div>
                    </div>
            </form>

            <!-- FORMULARIO #4 -->
            <div class="box box-warning">
                <form action="POST" id="form4" method="post" class="box-body">
                    <h3>FORMULARIO 4</h3>
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
            <script src="{{asset('/js/instalaciones/registro.js')}}" type="text/javascript"></script>

            <script>

            </script>

            @endsection