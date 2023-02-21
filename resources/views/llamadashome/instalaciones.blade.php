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
            <form action="" method="post" id="form1" class="formulario box-body"
                style="border-bottom: 3px solid #3e69d6;">
                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingrese Codigo Tecnico"
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
                                <input type="text" class="form-control" id="telefono" name="telefono" readonly="true" />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tecnico">Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" class="form-control" id="tecnico" name="tecnico" readonly="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-3" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" placeholder="INSTALACION" value="INSTALACION" disabled
                            readonly="true" style="color: white; background: #3e69d6; text-align: center;" />
                    </div>
                    <div class="form-group col-md-2" id="tec_input">
                        <label for="tecnologia">Tecnologia</label>
                        <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1"
                            id="tecnologia" aria-hidden="true" required>
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
                            tabindex="-1" aria-hidden="true" required>
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
                                    <input type="text" class="form-control OrdenHfc" id="orden_tv_hfc"
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
                                        <option value="TRANSFERIDA">TRANSFERIDA</option>
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
                                    <input type="number" class="form-control" id="sapHfc" name="sapHfc" />
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
                                    <input type="number" class="form-control" id="EquipoModem_Hfc"
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
                                            <input class="form-check-input" type="checkbox" id="TrabajadoHfc" />
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
                                            name="ObservacionesHfc" />
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
                                        <input type="text" class="form-control" id="RecibeHfc" name="RecibeHfc" />
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
                                                    <input type="text" class="form-control" id="NodoHfc"
                                                        name="NodoHfc" />
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
                                                    <input type="number" class="form-control" id="TapHfc"
                                                        name="TapHfc" />
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
                                                        name="PosicionHfc" />
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
                                                    <input type="number" class="form-control" id="MaterialesHfc"
                                                        name="MaterialesHfc" />
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
                                            <option value="NO SE LOCALIZA AL CLIENTE">EQUIPOS CON PROBLEMAS EN SAP
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
                                    <label for="OrdenObjetada_Hfc">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenObjetada_Hfc"
                                            name="OrdenObjetada_Hfc" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObjetadaHfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ProblematicaObjetada_Hfc">
                                        Problematica
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ProblematicaObjetada_Hfc"
                                            name="ProblematicaObjetada_Hfc" />
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
                            <div class="form-group col-md-3">
                                <label for="OrdenTransferida_Hfc">
                                    Orden
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="OrdenTransferida_Hfc"
                                        name="OrdenTransferida_Hfc" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoTransferido_Hfc" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ProblematicaTransferida_Hfc">
                                    Problematica
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ProblematicaTransferida_Hfc"
                                        name="ProblematicaTransferida_Hfc" />
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
                                <label for="orden_internetadsl">Orden Internet</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="orden_internetadsl"
                                        name="orden_internetadsl" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="sap_adsl">SAP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="sap_adsl" name="sap_adsl" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input id="trabajado_adsl" class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trabajado
                                    </label>
                                </div>
                            </div>
                            <div class="form-group-container">
                                <div class="form-group col-md-12">
                                    <label for="obv_adsl">Observaciones</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="obv_adsl" name="obv_adsl" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="telefono">Materiales</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="materiale_-adsl"
                                            name="materiales_adsl" placeholder="Comentarios..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD OBJETADA (ADSL) -->
                    <div id="formAdsl_Objetada" class="form-group-container FormAdsl_Hidden">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="MotivoObjetada_Adsl">Motivo Objetada</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    name="MotivoObjetada_Adsl" tabindex="-1" id="MotivoObjetada_Adsl"
                                    aria-hidden="true">
                                    <option selected="selected">SELECCIONE UNA OPCION</option>
                                    <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                    <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                    <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                    </option>
                                    <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP </option>
                                    <option value="NO SE LOCALIZA AL CLIENTE">EQUIPOS CON PROBLEMAS EN SAP </option>
                                    <option value=" NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                        INEXISTENTE </option>
                                    <option value=" PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO OPEN
                                    </option>
                                    <option value=" RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                    <option value=" RED NO HABILITADA">RED NO HABILITADA </option>
                                    <option value=" ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                    <option value=" TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                    </option>
                                    <option value=" VANDALISMO"> VANDALISMO </option>
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
                                        name="OrdenAdsl_Objetada" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="TrabajadoAdsl_Adsl" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ProblematicaObjetada_Adsl">
                                    Problematica
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ProblematicaObjetada_Adsl"
                                        name="ProblematicaObjetada_Adsl" />
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
                                        name="ComentariosObjetada_Adsl" />
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
                                    <input type="text" class="form-control" id="numerovoip" name="numerovoip" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input id="trabajado_adsl" class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trabajado
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ProblematicaAdsl_Transferida">
                                    Problematica
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ProblematicaAdsl_Transferida"
                                        name="ProblematicaAdsl_Transferida" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentariosAdsl_Transferido">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="number" class="form-control" id="ComentariosAdsl_Trasnferidos"
                                        name="ComentariosAdsl_Transferidos" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- FORMULARIO #4 DTH -->
                <div id="form4" class="form-group-container">
                    <div class="form-group-container" style="margin-top: 2.5rem;">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                            <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudess</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="codigo_tecnico">Orden Tv</label>
                            <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefono">SYRENG</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tecnico">SAP</label>
                            <input type="text" class="form-control" id="tecnico" name="tecnico" />
                        </div>
                        <div class="form-group col-md-3 TipoActividad_Hidden">
                            <label for="tipoactividaddth">Tipo Actividad</label>
                            <select class="form-control" style="width: 100%;" name="tipoactividaddth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tecnico">Georeferencia</label>
                            <input type="text" class="form-control" id="tecnico" name="tecnico" />
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Trabajado
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="from-group-container">
                        <div class="form-group col-md-3">
                            <label for="equipostv">Smarcard</label>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipotv1" name="equipotv1" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv2" name="equipostv2" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv3" name="equipostv3" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv" name="equipostv4" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv5" name="equipostv5" />
                            </div>
                        </div>
                    </div>

                    <div class="from-group-container">
                        <div class="form-group col-md-3">
                            <label for="equipostv">STB</label>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipotv1" name="equipotv1" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv2" name="equipostv2" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv3" name="equipostv3" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv" name="equipostv4" />
                            </div>
                            <div class="box_equipostv">
                                <input type="text" class="form-control" id="equipostv5" name="equipostv5" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group-container">
                        <div class="form-group col-md-12">
                            <label for="telefono">Observaciones</label>
                            <input type="number" class="form-control" id="observaciones-form3"
                                name="observaciones-form3" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="telefono">Recibe</label>
                            <input type="text" class="form-control" id="materiales-form3" name="materiales-form3"
                                placeholder="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="telefono">Materiales</label>
                            <input type="text" class="form-control" id="materiales-form3" name="materiales-form3"
                                placeholder="Comentarios..." />
                        </div>
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
                            <option value="TRANSFERIDA">TRANSFERIDA</option>
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
                                    <input type="text" class="form-control" id="OrdenLineaCobre"
                                        name="OrdenLineaCobre" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="NumeroCobre">Numero</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone-square"></i>
                                    </div>
                                    <input type="text" class="form-control" id="NumeroCobre" name="NumeroCobre" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="GeoCobreMap">Georeferencia</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="GeoCobreMap" name="GeoCobreMap" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trabajado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-container">
                            <div class="form-group col-md-12">
                                <label for="ObsCobre">Observaciones</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ObsCobre" name="ObsCobre" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="RecibeCobre">Recibe</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="RecibeCobre" name="RecibeCobre" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="MaterialesCobre">Materiales</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MaterialesCobre"
                                        name="MaterialesCobre" />
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
                                    <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP </option>
                                    <option value="NO SE LOCALIZA AL CLIENTE">EQUIPOS CON PROBLEMAS EN SAP </option>
                                    <option value=" NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                        INEXISTENTE </option>
                                    <option value=" PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO OPEN
                                    </option>
                                    <option value=" RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                    <option value=" RED NO HABILITADA">RED NO HABILITADA </option>
                                    <option value=" ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                    <option value=" TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                    </option>
                                    <option value=" VANDALISMO"> VANDALISMO </option>
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
                                    <input type="number" class="form-control" id="OrdenCobre
                                _Objetada" name="OrdenCobre_Objetada" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="TrabajadoCobre_Objetado" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ProblematicaObjetada_Adsl">
                                    Problematica
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ProblematicaObjetada_Adsl"
                                        name="ProblematicaObjetada_Adsl" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ProblematicaObjetada_Adsl">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="number" class="form-control" id="ComentariosObjetada_Adsl"
                                        name="ComentariosObjetada_Adsl" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD TRANSFERIDA COBRE -->

                    <div class="form-group-container FormCobre_Hidden" id="formCobre_Transferida">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="OrdenTransferida_Hfc">
                                    Orden
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="OrdenTransferida_Hfc"
                                        name="OrdenTransferida_Hfc" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoTransferido_Hfc" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ProblematicaTransferida_Hfc">
                                    Problematica
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ProblematicaTransferida_Hfc"
                                        name="ProblematicaTransferida_Hfc" />
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

                <!-- FORMULARIO #6 GPON-->
                <div id="form6" class="form-group-container">
                    <div class="form-group-container">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                            <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenTv_Gpon">Orden Tv</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="text" class="form-control OrdenGpon" id="OrdenTv_Gpon" name="OrdenTv_Gpon"
                                    disabled />
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenInternet_Gpon">Orden Internet</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="number" class="form-control OrdenGpon" id="OrdenInternet_Gpon"
                                    name="OrdenInternet_Gpon" disabled />
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenLinea_Gpon">Orden Linea</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="text" class="form-control OrdenGpon" id="OrdenLinea_Gpon"
                                    name="OrdenLinea_Gpon" disabled />
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
                                <label for="EquiposTv_Hfc">Equipos Tv</label>
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
                                    <input type="text" class="form-control equipotvGpon" id="equipotv1Gpon"
                                        name="equipotv1Gpon" placeholder="Equipo Tv 2" />
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
                                    <input type="text" class="form-control" id="EqModenGpon" name="EqModenGpon"
                                        required />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="GeoRefGpon">Georeferencia</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="GeoRefGpon" name="GeoRefGpon"
                                        required />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="SapGpon">SAP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="SapGpon" name="SapGpon" required />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="SapGpon">Numero Gpon</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control" id="NumeroGpon" name="NumeroGpon"
                                        required />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="SapGpon">Numero Voip</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="VoipGpon" name="VoipGpon" required />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoGpon" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-container">
                            <div class="form-group col-md-12">
                                <label for="telefono">Observaciones</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <input type="number" class="form-control" id="ObservacionesGpon"
                                        name="ObservacionesGpon" required />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telefono">Recibe</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="RecibeGpon" name="RecibeGpon" required
                                        placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD OBJETADA GPON -->

                    <div class="form-group-container FormGpon_Hidden" id="formGpon_Objetada">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="tipo_actividad">MOTIVO OBJETADO</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    name="tipo_actividad" tabindex="-1" id="tipo_actividad" aria-hidden="true">
                                    <option selected="selected">SELECCIONE UNA OPCION</option>
                                    <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                    <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                    <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                    </option>
                                    <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                    </option>
                                    <option value="NO SE LOCALIZA AL CLIENTE">EQUIPOS CON PROBLEMAS EN SAP </option>
                                    <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                        INEXISTENTE </option>
                                    <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO OPEN
                                    </option>
                                    <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                    <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                    <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                    <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                    </option>
                                    <option value="VANDALISMO"> VANDALISMO </option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="OrdenGpon_Objetada">Orden</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="OrdenGpon_Objetada"
                                        name="OrdenGpon_Objetada" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
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
                                        name="ObsGpon_Objetada" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComGpon_Objetada">Comentarios</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComGpon_Objetada"
                                        name="ComGpon_Objetada" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD TRANSFERIDA GPON -->
                    <div class="form-group-container FormGpon_Hidden" id="formGpon_Transferida">
                        <div class="form-group-container">
                            <div class="form-group col-md-3">
                                <label for="OrdenTrans_Gpon">Orden</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" class="form-control" id="OrdenTrans_Gpon"
                                        name="OrdenTrans_Gpon" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="OrdenTrans_Gpon">Comentarios</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComsTrasn_Gpon" name="ComsTrasn_Gpon" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer" id="" style="text-align: center; display: flex; justify-content: center;">
                    <button id="btn-submit" type="submit" class="btn btn-warning">GUARDAR REGISTRO</button>
                </div>
        </div>
        </form>

    </div>
</div>
</div>

@endsection @section('styles')

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" />

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
<script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/validacionesSelect.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/ValoresTecnico.js')}}" type="text/javascript"></script>

<!-- <script src="{{asset('/js/instalaciones/registro.js')}}" type="text/javascript"> </script> -->

@endsection