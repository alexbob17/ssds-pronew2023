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
            <!-- FORMULARIO #1 INICIAL CAMPOS NECESARIOS -->
            <form action="{{ route('registro_llamadas.store') }}" method="POST" id="form1" class="formulario box-body"
                style="border-bottom: 3px solid #3e69d6;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="selected_fields" id="selected-fields">


                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                                id="codigo_tecnico" name="codigo_tecnico"
                                oninput="this.value = this.value.toUpperCase()" />
                        </div>
                    </div>

                    <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                        <button type="button" id="btn_busqueda" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                        <button type="button" id="btn_reiniciar" class="btn btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>

                    <div class="form-group">
                        <div class="form-group col-md-2">
                            <label for="telefono">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <input type="text" placeholder="Numero" class="form-control" id="telefono"
                                    name="telefono" readonly="true" />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tecnico">Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" placeholder="Nombre Tecnico" class="form-control" id="tecnico"
                                    name="tecnico" readonly="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-3" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" placeholder="INSTALACION" value="INSTALACION"
                            readonly="true" id="motivo_llamada" name="motivo_llamada"
                            style="color: white; background: #3e69d6; text-align: center;" />
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
                        <label for="select_orden">Tipo Orden</label>
                        <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden"
                            tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>

                    <!-- FORMULARIO #2 HFC -->

                    <div id="form2" class="form-group-container formulario">
                        <div class="form-group-container" style="margin-top: 2.5rem;">
                            <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="orden_tv_hfc">Orden Tv</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control OrdenHfc" id="orden_tv_hfc"
                                        name="orden_tv_hfc" disabled />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="orden_internet_hfc">Orden Internet</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control OrdenHfc" id="orden_internet_hfc"
                                        name="orden_internet_hfc" disabled />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="orden_linea_hfc">Orden Linea</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control OrdenHfc" id="orden_linea_hfc"
                                        name="orden_linea_hfc" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 2.5rem;">
                                <div class="form-group col-md-3">
                                    <label for="tipo_actividad">TIPO ACTIVIDAD</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="tipo_actividad" tabindex="-1" id="tipo_actividad" aria-hidden="true">
                                        <option selected=" selected">SELECCIONE UNA OPCION</option>
                                        <option value="REALIZADA">REALIZADA</option>
                                        <option value="OBJETADA">OBJETADA</option>
                                        <option value="TRANSFERIDA" class="ocultar">TRANSFERIDA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC REALIZADA -->

                        <div class="form-group-container box-warning FormHfc_Hidden" id="formHfc_Realizada">
                            <div class="form-group col-md-3" id="hideEquipoTv">
                                <label for="EquiposTv_Hfc">Equipos Tv</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv1"
                                        name="equipostv1" placeholder="Equipo Tv 1" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv2"
                                        name="equipostv2" placeholder="Equipo Tv 2" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv3"
                                        name="equipostv3" placeholder="Equipo Tv 3" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv4"
                                        name="equipostv4" placeholder="Equipo Tv 4" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv5"
                                        name="equipostv5" placeholder="Equipo Tv 5" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="syrengHfc">SYRENG</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="syrengHfc" name="syrengHfc" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="sapHfc">SAP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="sapHfc" name="sapHfc" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="EquipoModem_Hfc">
                                    Equipo Modem
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-rss"></i>
                                    </div>
                                    <input type="text" class="form-control" id="EquipoModem_Hfc"
                                        name="EquipoModem_Hfc" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numeroVoip_hfc">
                                    Numero Voip
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="numeroVoip_hfc"
                                        name="numeroVoip_hfc" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="GeorefHfc">
                                    Georeferencia
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="GeorefHfc" name="GeorefHfc" />
                                </div>
                            </div>
                            <div class="from-group col-md-3">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoHfc"
                                                name="TrabajadoHfc" />
                                            <label class="form-check-label" for="TrabajadoHfc">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="RecibeHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfc" name="RecibeHfc" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group-container">
                                    <h4 class="box-title"
                                        style="color: #3e69d6; text-align: center; font-weight: bold;">
                                        ELEMENTOS RED
                                    </h4>
                                    <div class="" style="margin: botton 12px; border-top: 1px solid #c0bfbf;">
                                        <div class="form-group-container" style="margin-top: 1rem;">
                                            <div class="form-group col-md-3">
                                                <label for="NodoHfc">
                                                    Nodo
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="NodoHfc" name="NodoHfc"
                                                        placeholder="Ingresa Nodo" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="TapHfc">
                                                    TAP
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="TapHfc" name="TapHfc"
                                                        placeholder="Ingresa TAP" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="PosicionHfc">
                                                    Posicion
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="PosicionHfc"
                                                        name="PosicionHfc" placeholder="Ingresa Posicion" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="MaterialesHfc">
                                                    Materiales
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="MaterialesHfc"
                                                        name="MaterialesHfc" placeholder="Comentarios..." />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INPUTS HFC OBJETADA -->

                        <div class="form-group-container FormHfc_Hidden" id="formHfc_Objetada">
                            <div class="from-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="MotivoObjetada_Hfc">MOTIVO OBJETADO</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option selected="selected">SELECCIONE UNA OPCION</option>
                                            <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="NO SE LOCALIZA AL CLIENTE">NO SE LOCALIZA AL CLIENTE
                                            </option>
                                            <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                                INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                            <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="VANDALISMO"> VANDALISMO </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObjetadaHfc"
                                                name="TrabajadoObjetadaHfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosObjetados_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosObjetados_Hfc"
                                            name="ComentariosObjetados_Hfc" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC TRANSFERIDA -->

                        <div class="form-group-container FormHfc_Hidden" id="formHfc_Transferida">
                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoTransferido_Hfc"
                                            name="TrabajadoTransferido_Hfc" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="MotivoTransferidoHfc">
                                    Motivo Transferido
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MotivoTransferidoHfc"
                                        name="MotivoTransferidoHfc" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentariosTransferida_Hfc">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentariosTransferida_Hfc"
                                        name="ComentariosTransferida_Hfc" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FORMULARIO #3 ADSL -->
                <div id="form3" class="form-group-container formulario">
                    <div class="form-group col-md-3">
                        <label for="tipo_actividadAdsl">Tipo Actividad</label>
                        <select class="form-control tipo_actividad" style="width: 100%;" name="tipo_actividadAdsl"
                            id="tipo_actividadAdsl" tabindex="-1" aria-hidden="true">
                            <option selected="selected">SELECCIONE UNA OPCION</option>
                            <option value="REALIZADA">REALIZADA</option>
                            <option value="OBJETADA">OBJETADA</option>
                            <option value="TRANSFERIDA">TRANSFERIDA</option>
                        </select>
                    </div>
                    <!-- TIPO ACTIVIDAD REALIZADA (ADSL) -->
                    <div class="form-group-container FormAdsl_Hidden" id="formAdsl_Realizada">
                        <div class="form-group-container">
                            <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES</label>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="orden_internet_adsl">Orden Internet</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="orden_internet_adsl"
                                        name="orden_internet_adsl" placeholder="Ingresa N° Orden" />
                                    <span class="span_check checkValid" id="checkValid"><i
                                            class="fa-solid fa-circle-check"></i></span>

                                    <span class="span_error checkError" id="checkError"><i
                                            class="fa-sharp fa-solid fa-circle-exclamation"></i></span>
                                </div>
                                <!-- <span class="span_error_mensaje" id="ErrorOrdenInternetAdsl">Debes de ingresar 8
                                    digitos</span> -->

                            </div>

                            <div class="form-group col-md-3">
                                <label for="Georeferencia_Adsl">Georeferencia</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="Georeferencia_Adsl"
                                        name="Georeferencia_Adsl" placeholder="Latitud, Longitud" />


                                </div>
                            </div>


                            <div class="form-group col-md-3">
                                <div class="form-check" style="display:flex;padding-top: 21px;">
                                    <input class="form-check-input" type="checkbox" value="" id="TrabajadoAdsl"
                                        name="TrabajadoAdsl" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trabajado
                                    </label>
                                </div>


                            </div>
                            <div class="form-group-container">
                                <div class="form-group col-md-12">
                                    <label for="Obvservaciones_Adsl">Observaciones</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="Obvservaciones_Adsl"
                                            name="Obvservaciones_Adsl" placeholder="Observaciones del caso" />

                                        <span class="span_check checkValid" id="checkValid1"><i
                                                class="fa-solid fa-circle-check"></i></span>

                                        <span class="span_error checkError" id="checkError1"><i
                                                class="fa-sharp fa-solid fa-circle-exclamation"></i></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Recibe_Adsl">Recibe</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Ingresa quien recibe"
                                            id="Recibe_Adsl" name="Recibe_Adsl" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Materiales_Adsl">Materiales</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="Materiales_Adsl"
                                            name="Materiales_Adsl" placeholder="Comentarios..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD OBJETADA (ADSL) -->
                    <div id="formAdsl_Objetada" class="form-group-container FormAdsl_Hidden">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="MotivoObjetada_Adsl">MOTIVO OBJETADA</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    name="MotivoObjetada_Adsl" tabindex="-1" id="MotivoObjetada_Adsl"
                                    aria-hidden="true">
                                    <option selected="selected">SELECCIONE UNA OPCION</option>
                                    <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                    <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                    <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                    </option>
                                    <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                    </option>
                                    <option value="NO SE LOCALIZA AL CLIENTE">NO SE LOCALIZA AL CLIENTE
                                    </option>
                                    <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                        INEXISTENTE </option>
                                    <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                        OPEN </option>
                                    <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                    <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                    <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                    <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                    </option>
                                    <option value="VANDALISMO"> VANDALISMO </option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="OrdenAdsl_Objetada">
                                    Orden
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="OrdenAdsl_Objetada"
                                        name="OrdenAdsl_Objetada" placeholder="Ingresa N° Orden" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Trabajado"
                                            id="TrabajadoAdslObjetado" name="TrabajadoAdslObjetado" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="ComentariosObjetada_Adsl">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentariosObjetada_Adsl"
                                        name="ComentariosObjetada_Adsl" placeholder="Comentarios del caso" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD TRANSFERIDA (ADSL) -->
                    <div class="form-group-container FormAdsl_Hidden" id="formAdsl_Transferida">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="OrdenAdsl_Transferida">
                                    Orden
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="OrdenAdsl_Transferida"
                                        name="OrdenAdsl_Transferida" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="TrabajadoTransferido_Adsl" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trabajado
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="MotivoTransferidoAdsl">
                                    Motivo Transferido
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MotivoTransferidoAdsl"
                                        name="MotivoTransferidoAdsl" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentariosAdsl_Transferidos">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentariosAdsl_Transferidos"
                                        name="ComentariosAdsl_Transferidos" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FORMULARIO #4 DTH -->
                <div id="form4" class="form-group-container">
                    <div class="form-group-container" style="margin-top: 2.5rem;">
                        <div class="form-group col-md-3">
                            <label for="tipo_actividadDth">Tipo Actividad</label>
                            <select class="form-control" style="width: 100%;" name="tipo_actividadDth"
                                id="tipo_actividadDth" tabindex="-1" aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>

                        <!-- ACTIVIDAD REALIZADA DTH -->

                        <div class="FormDth_Hidden" id="formDth_Realizada">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES</label>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="ordenTv_Dth">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" placeholder="Ingresa N° Orden Tv" class="form-control"
                                            id="ordenTv_Dth" name="ordenTv_Dth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="SyrengDth">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" placeholder="Ingresa N° Syreng" class="form-control"
                                            id="SyrengDth" name="SyrengDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="GeoreferenciaDth">Georeferencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="GeoreferenciaDth"
                                            name="GeoreferenciaDth" placeholder="Latidud, Longitud" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="sap_dth">SAP</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa SAP" class="form-control" id="sap_dth"
                                            name="sap_dth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="TrabajadoDth"
                                            name="TrabajadoDth" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <label for="Smarcard">Smarcard</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="SmarcardDth1" name="SmarcardDth1"
                                            placeholder="Smarcard 1" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="SmarcardDth2" name="SmarcardDth2"
                                            placeholder="Smarcard 2" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="SmarcardDth3" name="SmarcardDth3"
                                            placeholder="Smarcard 3" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="SmarcardDth4" name="SmarcardDth4"
                                            placeholder="Smarcard 4" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="SmarcardDth5" name="SmarcardDth5"
                                            placeholder="Smarcard 5" />
                                    </div>
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <label for="StbDth">STB</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" placeholder="STB 1" class="form-control" id="StbDth1"
                                            name="StbDth1" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" placeholder="STB 2" class="form-control" id="StbDth2"
                                            name="StbDth2" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" placeholder="STB 3" class="form-control" id="StbDth3"
                                            name="StbDth3" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" placeholder="STB 4" class="form-control" id="StbDth4"
                                            name="StbDth4" />
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" placeholder="STB 5" class="form-control" id="StbDth5"
                                            name="StbDth5" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesDth">Observaciones</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesDth"
                                            name="ObservacionesDth" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="RecibeDth">Recibe</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe" class=" form-control"
                                            id="RecibeDth" name="RecibeDth" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="MaterialesDth">Materiales</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MaterialesDth" name="MaterialesDth"
                                            placeholder="Comentarios..." />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVIDAD OBJETADA DTH -->
                        <div class="FormDth_Hidden" id="formDth_Objetada">
                            <div class="from-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="MotivoObjetada_Dth">MOTIVO OBJETADO</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Dth" tabindex="-1"
                                            id="MotivoObjetada_Dth" aria-hidden="true">
                                            <option selected="selected">SELECCIONE UNA OPCION</option>
                                            <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="NO SE LOCALIZA AL CLIENTE">NO SE LOCALIZA AL CLIENTE
                                            </option>
                                            <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                                INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                            <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="VANDALISMO"> VANDALISMO </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenObj_Dth">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObj_Dth" name="OrdenObj_Dth"
                                            placeholder="Ingresa N° Orden" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObj_Dth"
                                                name="TrabajadoObj_Dth" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioObjetado_Dth">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioObjetado_Dth"
                                            name="ComentarioObjetado_Dth" placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--ACTIVIDAD TRANSFERIDA DTH  -->
                        <!-- <div class="FormDth_Hidden" id="formDth_Transferida">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenTransferida_Dth">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenTransferida_Dth"
                                            name="OrdenTransferida_Dth" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTransferido_Dth" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoTransferidoDth">
                                        Motivo Transferido
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransferidoDth"
                                            name="MotivoTransferidoDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosTransferidos_Dth">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosTransferidos_Dth"
                                            name="ComentariosTransferidos_Dth" />
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- FORMULARIO #5 COBRE-->
                <div id="form5" class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="tipo_actividadCobre">Tipo Actividad</label>
                        <select class="form-control" style="width: 100%;" name="tipo_actividadCobre"
                            id="tipo_actividadCobre" tabindex="-1" aria-hidden="true">
                            <option selected="selected">SELECCIONE UNA OPCION</option>
                            <option value="REALIZADA">REALIZADA</option>
                            <option value="OBJETADA">OBJETADA</option>
                            <!-- <option value="TRANSFERIDA">TRANSFERIDA</option> -->
                        </select>
                    </div>

                    <!-- TIPO ACTIVIDAD REALIZADA COBRE -->
                    <div class="form-group-container FormCobre_Hidden" id="formCobre_Realizada">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="OrdenLineaCobre">Orden Linea</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="OrdenLineaCobre"
                                        name="OrdenLineaCobre" placeholder="Ingrese N° Orden" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="NumeroCobre">Numero</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone-square"></i>
                                    </div>
                                    <input type="number" placeholder="Ingresa Numero Cobre" class="form-control"
                                        id="NumeroCobre" name="NumeroCobre" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="GeoreferenciaCobre">Georeferencia</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="GeoreferenciaCobre"
                                        name="GeoreferenciaCobre" placeholder="Latitud, Longitud" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="sap_cobre">SAP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" placeholder="Ingresa Sap" class="form-control" id="sap_cobre"
                                        name="sap_cobre" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="TrabajadoCobre"
                                        name="TrabajadoCobre" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trabajado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-container">
                            <div class="form-group col-md-12">
                                <label for="ObservacionesCobre">Observaciones</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ObservacionesCobre"
                                        name="ObservacionesCobre" placeholder="Ingresa las observaciones del caso" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="RecibeCobre">Recibe</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ingresa quien recibe el caso"
                                        id="RecibeCobre" name="RecibeCobre" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="MaterialesCobre">Materiales</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MaterialesCobre" name="MaterialesCobre"
                                        placeholder="Comentarios..." />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD OBJETADA COBRE -->

                    <div class="form-group-container FormCobre_Hidden" id="formCobre_Objetada">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="MotivoObjetada_Cobre">Motivo Objetada</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    name="MotivoObjetada_Cobre" tabindex="-1" id="MotivoObjetada_Cobre"
                                    aria-hidden="true">
                                    <option selected="selected">SELECCIONE UNA OPCION</option>
                                    <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                    <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                    <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                    </option>
                                    <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                    </option>
                                    <option value="NO SE LOCALIZA AL CLIENTE">NO SE LOCALIZA AL CLIENTE
                                    </option>
                                    <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                        INEXISTENTE </option>
                                    <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                        OPEN </option>
                                    <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                    <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                    <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                    <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                    </option>
                                    <option value="VANDALISMO"> VANDALISMO </option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="OrdenCobre_Objetada">
                                    Orden
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="OrdenCobre_Objetada"
                                        name="OrdenCobre_Objetada" placeholder="Ingresa N° Orden" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="TrabajadoCobre_Objetado" name="TrabajadoCobre_Objetado" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group col-md-12">
                                <label for="ComentariosCobre_Objetados">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentariosCobre_Objetados"
                                        name="ComentariosCobre_Objetados" placeholder="Ingresa comentarios del caso" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD TRANSFERIDA COBRE -->

                    <div class="form-group-container FormCobre_Hidden" id="formCobre_Transferida">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="OrdenTransferidad_Cobre">
                                    Orden
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="OrdenTransferidad_Cobre"
                                        name="OrdenTransferidad_Cobre" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajoTransferido_Cobre" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="MotivoTransferidoCobre">
                                    Motivo Transferido
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MotivoTransferidoCobre"
                                        name="MotivoTransferidoCobre" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentariosTransferida_Cobre">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentariosTransferida_Cobre"
                                        name="ComentariosTransferida_Cobre" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FORMULARIO #6 GPON-->
                <div id="form6" class="form-group-container">
                    <div class="form-group-container">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                            <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenInternet_Gpon">Orden Internet</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="number" class="form-control OrdenGpon" id="OrdenInternet_Gpon"
                                    name="OrdenInternet_Gpon" placeholder="N° Orden Internet" disabled />
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenTv_Gpon">Orden Tv</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="number" class="form-control OrdenGpon" id="OrdenTv_Gpon"
                                    name="OrdenTv_Gpon" placeholder="N° Orden Gpon" disabled />
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="OrdenLinea_Gpon">Orden Linea</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="number" class="form-control OrdenGpon" id="OrdenLinea_Gpon"
                                    name="OrdenLinea_Gpon" placeholder="N° Orden Linea" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-container">
                        <div class="form-group col-md-3 TipoActividad_Hidden">
                            <label for="tipo_actividadGpon">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;" name="tipo_actividadGpon"
                                id="tipo_actividadGpon" tabindex="-1" aria-hidden="true">
                                <option selected=" selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                    </div>

                    <!-- CAMBIO DE TIPO ACTIVIDAD REALIZADA GPON-->
                    <div class="form-group-container FormGpon_Hidden" id="formGpon_Realizada">
                        <div class="from-group-container">
                            <div class="form-group col-md-3" id="hideEquipoTv">
                                <label for="EquiposTv_Gpon">Equipos Tv</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvGpon" id="equipotv1Gpon"
                                        name="equipotv1Gpon" placeholder="Equipo Tv 1" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvGpon" id="equipotv2Gpon"
                                        name="equipotv2Gpon" placeholder="Equipo Tv 2" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvGpon" id="equipostv3Gpon"
                                        name="equipostv3Gpon" placeholder="Equipo Tv 3" />
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvGpon" id="equipostv4Gpon"
                                        name="equipostv4Gpon" placeholder="Equipo Tv 4" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvGpon" id="equipostv5Gpon"
                                        name="equipostv5Gpon" placeholder="Equipo Tv 5" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="EqModenGpon">
                                    Equipo Modem
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-rss"></i>
                                    </div>
                                    <input type="text" class="form-control" id="EqModenGpon"
                                        placeholder="N° Equipo Modem" name="EqModenGpon" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="GeoreferenciaGpon">Georeferencia</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="GeoreferenciaGpon"
                                        name="GeoreferenciaGpon" placeholder="Latitud,Longitud" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="SapGpon">SAP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="SapGpon" placeholder="Ingrese SAP"
                                        name="SapGpon" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="NumeroGpon">Numero Gpon</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="number" class="form-control" id="NumeroGpon"
                                        placeholder="Ingresa N° Gpon" name="NumeroGpon" />
                                </div>
                            </div>

                            <!-- <div class="form-group col-md-3">
                                <label for="SapGpon">Numero Voip</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="VoipGpon" name="VoipGpon" />
                                </div>
                            </div> -->

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoGpon"
                                            name="TrabajadoGpon" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-container">
                            <div class="form-group col-md-12">
                                <label for="ObservacionesGpon">Observaciones</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ObservacionesGpon"
                                        name="ObservacionesGpon" placeholder="Ingresa las observaciones del caso" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="RecibeGpon">Recibe</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="RecibeGpon" name="RecibeGpon"
                                        placeholder="Ingresa quien recibe el caso" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group-container">
                            <div class="form-group-container">
                                <h4 class="box-title" style="color: #3e69d6; text-align: center; font-weight: bold;">
                                    ELEMENTOS RED
                                </h4>
                                <div class="" style="margin: botton 12px; border-top: 1px solid #c0bfbf;">
                                    <div class="form-group-container" style="margin-top: 1rem;">
                                        <div class="form-group col-md-3">
                                            <label for="NodoGpon">
                                                Nodo
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-square"></i>
                                                </div>
                                                <input type="text" class="form-control" id="NodoGpon" name="NodoGpon"
                                                    placeholder="Ingresa N° Nodo" />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="CajaGpon">
                                                Caja
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-square"></i>
                                                </div>
                                                <input type="number" class="form-control" id="CajaGpon" name="CajaGpon"
                                                    placeholder="Ingresa N° Caja" />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="PuertoGpon">
                                                Puerto
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-square"></i>
                                                </div>
                                                <input type="number" class="form-control" id="PuertoGpon"
                                                    name="PuertoGpon" placeholder="Ingresa Puerto" />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="MaterialesRedGpon">
                                                Materiales
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-edit"></i>
                                                </div>
                                                <input type="text" class="form-control" id="MaterialesRedGpon"
                                                    name="MaterialesRedGpon" placeholder="Comentarios..." />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD OBJETADA GPON -->

                    <div class="form-group-container FormGpon_Hidden" id="formGpon_Objetada">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="MotivoObjetado_Gpon">MOTIVO OBJETADO</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    name="MotivoObjetado_Gpon" tabindex="-1" id="MotivoObjetado_Gpon"
                                    aria-hidden="true">
                                    <option selected="selected">SELECCIONE UNA OPCION</option>
                                    <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                    <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                    <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                    </option>
                                    <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                    </option>
                                    <option value="NO SE LOCALIZA AL CLIENTE">NO SE LOCALIZA AL CLIENTE
                                    </option>
                                    <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                        INEXISTENTE </option>
                                    <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                        OPEN </option>
                                    <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                    <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                    <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                    <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                    </option>
                                    <option value="VANDALISMO"> VANDALISMO </option>
                                </select>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="TrabajadoGpon_Objetado" name="TrabajadoGpon_Objetado" />
                                        <label class="form-check-label" for="">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ObsGpon_Objetada">Observaciones</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ObsGpon_Objetada"
                                        name="ObsGpon_Objetada" placeholder="Ingresa las observaciones del caso" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentariosGpon_Objetada">Comentarios</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentariosGpon_Objetada"
                                        name="ComentariosGpon_Objetada" placeholder="Comentarios..." />
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- TIPO ACTIVIDAD TRANSFERIDA GPON -->
                    <div class="form-group-container FormGpon_Hidden" id="formGpon_Transferida">
                        <div class="form-group-container">

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoTransferido_Gpon"
                                            name="TrabajadoTransferido_Gpon" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="MotivoTransferidoGpon">Motivo Transferido</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MotivoTransferidoGpon"
                                        name="MotivoTransferidoGpon" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentarioTransferido_Gpon">Comentarios</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentarioTransferido_Gpon"
                                        name="ComentarioTransferido_Gpon" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer" id="btn-submitForm"
                    style="text-align: center; display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk"
                            style="padding-right:8px"></i>GUARDAR
                        REGISTRO</button>
                </div>

            </form>
        </div>
    </div>
</div>



@if(isset($message))
<script>
Swal.fire({
    icon: "success",
    title: "{{$message}}",
    text: "{{$messages}}",
    showConfirmButton: false,
    timer: 1800,
});

// window.location = window.location;
</script>
@endif

@endsection @section('styles')



<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" />







<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById("form1");
    const selectedFieldsInput = document.querySelector('#selected-fields');
    const inputs = form.querySelectorAll('input[type="text"], input[type="number"], input[type="checkbox"]');


    let selectedFields = [];

    inputs.forEach(input => {
        input.addEventListener('change', () => {
            if (input.checked) {
                selectedFields.push(input.name);
            } else {
                const index = selectedFields.indexOf(input.name);
                if (index !== -1) {
                    selectedFields.splice(index, 1);
                }
            }
            selectedFieldsInput.value = JSON.stringify(selectedFields);
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var checkbox = document.getElementById('TrabajadoAdsl');
    actualizarTextoCheckbox(checkbox);

    checkbox.addEventListener('change', function() {
        actualizarTextoCheckbox(checkbox);
    });

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }

    var checkboxAdslObjetado = document.getElementById('TrabajadoAdslObjetado');
    actualizarTextoCheckbox(checkboxAdslObjetado);


    checkboxAdslObjetado.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxAdslObjetado);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }

    var checkboxCobre = document.getElementById('TrabajadoCobre');
    actualizarTextoCheckbox(checkboxCobre);


    checkboxCobre.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxCobre);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }


    var checkboxCobreObjetado = document.getElementById('TrabajadoCobre_Objetado');
    actualizarTextoCheckbox(checkboxCobreObjetado);


    checkboxCobreObjetado.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxCobreObjetado);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }

    var checkboxDth = document.getElementById('TrabajadoDth');
    actualizarTextoCheckbox(checkboxDth);


    checkboxDth.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxDth);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }

    var checkboxGpon = document.getElementById('TrabajadoGpon');
    actualizarTextoCheckbox(checkboxGpon);


    checkboxGpon.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxGpon);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }

    var checkboxGponObjetado = document.getElementById('TrabajadoGpon_Objetado');
    actualizarTextoCheckbox(checkboxGponObjetado);


    checkboxGponObjetado.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxGponObjetado);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }


    var checkboxGponTransferido = document.getElementById('TrabajadoTransferido_Gpon');
    actualizarTextoCheckbox(checkboxGponTransferido);


    checkboxGponTransferido.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxGponTransferido);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }

    var checkboxGponTrabajadoHfc = document.getElementById('TrabajadoHfc');
    actualizarTextoCheckbox(checkboxGponTrabajadoHfc);


    checkboxGponTrabajadoHfc.addEventListener('change', function() {
        actualizarTextoCheckbox(checkboxGponTrabajadoHfc);
    })

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = 'TRABAJADO';
        } else {
            checkbox.value = 'PENDIENTE';
        }
    }


});
</script>







<!-- Select2 -->
<link rel=" stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}" />
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}" />

@endsection @section('scripts')
<!-- datepicker -->
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
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
<!-- <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script> -->
<script src="{{asset('/js/instalaciones/validacionesSelect.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/ValoresTecnico.js')}}" type="text/javascript"></script>

<script src="{{asset('/js/instalaciones/ValidacionFormulario.js')}}" type="text/javascript"> </script>

@endsection