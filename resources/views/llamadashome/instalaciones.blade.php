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
            <form action="" id="form1" class="formulario box-body">
                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <input type="search" class="form-control" placeholder="Ingrese Codigo Tecnico"
                            id="codigo_tecnico" name="codigo_tecnico" pattern="^[A-Za-z0-9]+$" maxlength="20"
                            oninput="this.value = this.value.toUpperCase()" required />
                    </div>
                    <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                        <button type="button" id="btn_busqueda" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                        <button type="button" id="btn_reiniciar" class="btn btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="telefono">Teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" readonly="true"
                            required />
                    </div>
                    <div class="form-group col-md-5">
                        <label for="tecnico">Técnico</label>
                        <input type="text" class="form-control" id="tecnico" name="tecnico" readonly="true" required />
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-3" id="view-container">
                        <label for="motivo_llamada">Motivo de la llamada</label>
                        <input type="text" class="form-control" placeholder="INSTALACION" disabled readonly="true" />
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
                        <label for="select_orden">Tipo De Orden</label>
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
                                <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="orden_tv_hfc">Orden Tv</label>
                                <input type="number" class="form-control" id="orden_tv_hfc" name="orden_tv_hfc"
                                    pattern="^\d{8,}$" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="orden_internet_hfc">Orden Internet</label>
                                <input type="number" class="form-control" id="orden_internet_hfc"
                                    name="orden_internet_hfc" pattern="^\d{8,}$" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="orden_linea_hfc">Orden Linea</label>
                                <input type="number" class="form-control" id="orden_linea_hfc" name="orden_linea_hfc"
                                    pattern="^\d{8,}$" />
                            </div>
                        </div>
                        <div class="form-group-container" style="margin-top: 2.5rem;">
                            <div class="form-group col-md-3">
                                <label for="tipo_actividad">Tipo De Actividad</label>
                                <select class="form-control" style="width: 100%;" name="tipo_actividad" tabindex="-1"
                                    id="tipo_actividad" aria-hidden="true">
                                    <option selected="selected" value="">Seleccione una opción</option>
                                    <option value="REALIZADA">REALIZADA</option>
                                    <option value="OBJETADA">OBJETADA</option>
                                    <option value="TRANSFERIDA">TRANSFERIDA</option>
                                </select>
                            </div>
                        </div>

                        <!-- INPUTS HFC REALIZADA -->

                        <div class="form-group-container box-warning" id="formHfc_Realizada">
                            <div class="form-group col-md-3">
                                <label for="equipostv">Equipo Tv</label>
                                <div class="box_equipostv">
                                    <div>
                                        <p>Tv 1</p>
                                    </div>
                                    <input type="number" class="form-control" id="equipotv1" name="equipotv1" />
                                </div>
                                <div class="box_equipostv">
                                    <p>Tv 2</p>
                                    <input type="number" class="form-control" id="equipostv2" name="equipostv2" />
                                </div>
                                <div class="box_equipostv">
                                    <p>Tv 3</p>
                                    <input type="number" class="form-control" id="equipostv3" name="equipostv3" />
                                </div>
                                <div class="box_equipostv">
                                    <p>Tv 4</p>
                                    <input type="number" class="form-control" id="equipostv" name="equipostv4" />
                                </div>
                                <div class="box_equipostv">
                                    <p>Tv 5</p>
                                    <input type="number" class="form-control" id="equipostv5" name="equipostv5" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="syrengHfc">SYRENG</label>
                                <input type="number" class="form-control" id="syrengHfc" name="syrengHfc" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sapHfc">SAP</label>
                                <input type="number" class="form-control" id="sapHfc" name="sapHfc" />
                            </div>

                            <div class="from-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="EquipoModem_Hfc">
                                            Equipo Modem
                                        </label>
                                        <input type="number" class="form-control" id="EquipoModem_Hfc"
                                            name="EquipoModem_Hfc" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="numeroVoip_hfc">
                                            Numero Voip
                                        </label>
                                        <input type="number" class="form-control" id="numerovoip" name="numerovoip" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="GeorefHfc">
                                            Georeferencia
                                        </label>
                                        <input type="text" class="form-control" id="GeorefHfc" name="GeorefHfc" />
                                    </div>
                                </div>
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
                                <div class="from-group-container">
                                    <div class="form-group col-md-9">
                                        <label for="ObservacionesHfc">
                                            Observaciones
                                        </label>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-9">
                                        <label for="RecibeHfc">
                                            Recibe
                                        </label>
                                        <input type="text" class="form-control" id="RecibeHfc" name="RecibeHfc" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group-container">
                                    <h4 class="box-title"
                                        style="color: #3e69d6; text-align: center; font-weight: bold;">
                                        Elementos de red
                                    </h4>
                                    <div class="box box-warning" style="margin: botton 12px;">
                                        <div class="form-group-container" style="margin-top: 1rem;">
                                            <div class="form-group col-md-3">
                                                <label for="NodoHfc">
                                                    Nodo
                                                </label>
                                                <input type="text" class="form-control" id="NodoHfc" name="NodoHfc" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="TapHfc">
                                                    TAP
                                                </label>
                                                <input type="number" class="form-control" id="TapHfc" name="TapHfc" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="PosicionHfc">
                                                    Posicion
                                                </label>
                                                <input type="number" class="form-control" id="PosicionHfc"
                                                    name="PosicionHfc" />
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="MaterialesHfc">
                                                    Materiales
                                                </label>
                                                <input type="number" class="form-control" id="MaterialesHfc"
                                                    name="MaterialesHfc" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INPUTS HFC OBJETADA -->

                        <div class="form-group-container" id="formHfc_Objetada">
                            <div class="from-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="MotivoObjetada_Hfc">Motivo Objetada</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option selected="selected">Seleccione una opción</option>
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
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjetada_Hfc">
                                            Orden
                                        </label>
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
                                <div class="from-group-container">
                                    <div class="form-group col-md-12">
                                        <label for="ProblematicaObjetada_Hfc">
                                            Problematica
                                        </label>
                                        <input type="text" class="form-control" id="ProblematicaObjetada_Hfc"
                                            name="ProblematicaObjetada_Hfc" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjetados_Hfc">
                                            Comentarios
                                        </label>
                                        <input type="text" class="form-control" id="ComentariosObjetados_Hfc"
                                            name="ComentariosObjetados_Hfc" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC TRANSFERIDA -->

                        <div class="form-group-container" id="formHfc_Transferida">
                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenTransferida_Hfc">
                                        Orden
                                    </label>
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
                            <div class="from-group-container">
                                <div class="form-group col-md-12">
                                    <label for="ProblematicaTransferida_Hfc">
                                        Problematica
                                    </label>
                                    <input type="text" class="form-control" id="ProblematicaTransferida_Hfc"
                                        name="ProblematicaTransferida_Hfc" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-12">
                                    <label for="ComentariosTransferida_Hfc">
                                        Comentarios
                                    </label>
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
                        <select class="form-control" style="width: 100%;" name="tipo_actividadAdsl"
                            id="tipo_actividadAdsl" tabindex="-1" aria-hidden="true">
                            <option selected="selected">Seleccione una opción</option>
                            <option value="REALIZADA">REALIZADA</option>
                            <option value="OBJETADA">OBJETADA</option>
                            <option value="TRANSFERIDA">TRANSFERIDA</option>
                        </select>
                    </div>
                    <!-- TIPO ACTIVIDAD REALIZADA (ADSL) -->
                    <div class="form-group-container" id="formAdsl_Realizada">
                        <div class="form-group-container">
                            <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="orden_internetadsl">Orden Internet</label>
                                <input type="text" class="form-control" id="orden_internetadsl"
                                    name="orden_internetadsl" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sap_adsl">SAP</label>
                                <input type="text" class="form-control" id="sap_adsl" name="sap_adsl" />
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
                                    <input type="text" class="form-control" id="obv_adsl" name="obv_adsl" />
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="telefono">Materiales</label>
                                    <input type="text" class="form-control" id="materiale_-adsl" name="materiales_adsl"
                                        placeholder="Comentarios..." />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD OBJETADA (ADSL) -->

                    <div id="formAdsl_Objetada" class="form-group-container">
                        <div class="form-group col-md-3">
                            <label for="MotivoObjetada_Adsl">Motivo Objetada</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                name="MotivoObjetada_Adsl" tabindex="-1" id="MotivoObjetada_Adsl" aria-hidden="true">
                                <option selected="selected">Seleccione una opción</option>
                                <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP </option>
                                <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP </option>
                                <option value="NO SE LOCALIZA AL CLIENTE">EQUIPOS CON PROBLEMAS EN SAP </option>
                                <option value=" NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                    INEXISTENTE </option>
                                <option value=" PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO OPEN
                                </option>
                                <option value=" RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                <option value=" RED NO HABILITADA">RED NO HABILITADA </option>
                                <option value=" ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                <option value=" TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA </option>
                                <option value=" VANDALISMO"> VANDALISMO </option>
                            </select>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="OrdenAdsl_Objetada">
                                    Orden
                                </label>
                                <input type="number" class="form-control" id="OrdenAdsl_Objetada"
                                    name="OrdenAdsl_Objetada" />
                            </div>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="TrabajadoAdsl_Adsl" />
                                    <label class="form-check-label">
                                        Trabajado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="ProblematicaObjetada_Adsl">
                                    Problematica
                                </label>
                                <input type="text" class="form-control" id="ProblematicaObjetada_Adsl"
                                    name="ProblematicaObjetada_Adsl" />
                            </div>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="ComentariosObjetada_Adsl">
                                    Comentarios
                                </label>
                                <input type="number" class="form-control" id="ComentariosObjetada_Adsl"
                                    name="ComentariosObjetada_Adsl" />
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD TRANSFERIDA (ADSL) -->
                    <div class="form-group-container" id="formAdsl_Transferida">
                        <div class="form-group col-md-3">
                            <label for="OrdenAdsl_Transferida">
                                Orden
                            </label>
                            <input type="text" class="form-control" id="numerovoip" name="numerovoip" />
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="TrabajadoAdsl_Transferido" />
                                    <label class="form-check-label">
                                        Trabajado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="ProblematicaAdsl_Transferida">
                                    Problematica
                                </label>
                                <input type="text" class="form-control" id="ProblematicaAdsl_Transferida"
                                    name="ProblematicaAdsl_Transferida" />
                            </div>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="ComentariosAdsl_Transferido">
                                    Comentarios
                                </label>
                                <input type="number" class="form-control" id="ComentariosAdsl_Trasnferidos"
                                    name="ComentariosAdsl_Trasnferidos" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORMULARIO #4 -->
                <div id="form4" class="form-group-container">
                    <div class="form-group-container" style="margin-top: 2.5rem;">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                            <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
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
                        <div class="form-group col-md-3">
                            <label for="tipoactividaddth">Tipo Actividad</label>
                            <select class="form-control" style="width: 100%;" name="tipoactividaddth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">Seleccione una opción</option>
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
                            <option selected="selected">Seleccione una opción</option>
                            <option value="REALIZADA">REALIZADA</option>
                            <option value="OBJETADA">OBJETADA</option>
                            <option value="TRANSFERIDA">TRANSFERIDA</option>
                        </select>
                    </div>

                    <!-- TIPO ACTIVIDAD REALIZADA COBRE -->
                    <div class="form-group-container" id="formCobre_Realizada">
                        <div class="form-group-container">
                            <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="codigo_tecnico">Orden Linea</label>
                                <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="telefono">Numero</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" />
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

                    <!-- TIPO ACTIVIDAD OBJETADA COBRE -->

                    <div class="form-group-container" id="formCobre_Objetada">
                        <div class="form-group col-md-3">
                            <label for="MotivoObjetada_Cobre">Motivo Objetada</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                name="MotivoObjetada_Cobre" tabindex="-1" id="MotivoObjetada_Cobre" aria-hidden="true">
                                <option selected="selected">Seleccione una opción</option>
                                <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP </option>
                                <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP </option>
                                <option value="NO SE LOCALIZA AL CLIENTE">EQUIPOS CON PROBLEMAS EN SAP </option>
                                <option value=" NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                    INEXISTENTE </option>
                                <option value=" PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO OPEN
                                </option>
                                <option value=" RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                <option value=" RED NO HABILITADA">RED NO HABILITADA </option>
                                <option value=" ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                <option value=" TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA </option>
                                <option value=" VANDALISMO"> VANDALISMO </option>
                            </select>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="OrdenCobre_Objetada">
                                    Orden
                                </label>
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
                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="ProblematicaObjetada_Adsl">
                                    Problematica
                                </label>
                                <input type="text" class="form-control" id="ProblematicaObjetada_Adsl"
                                    name="ProblematicaObjetada_Adsl" />
                            </div>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="ComentariosObjetada_Adsl">
                                    Comentarios
                                </label>
                                <input type="number" class="form-control" id="ComentariosObjetada_Adsl"
                                    name="ComentariosObjetada_Adsl" />
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD TRANSFERIDA COBRE -->

                    <div class="form-group-container" id="formCobre_Transferida">
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="EModem">
                                    Orden
                                </label>
                                <input type="text" class="form-control" id="numerovoip" name="numerovoip" />
                            </div>
                        </div>
                        <div class="from-group-container">
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
                            <div class="form-group col-md-12">
                                <label for="EModem">
                                    Problematica
                                </label>
                                <input type="text" class="form-control" id="georeferencia" name="georeferencia" />
                            </div>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="EModem">
                                    Comentarios
                                </label>
                                <input type="number" class="form-control" id="equipomodem" name="equipomodem" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORMULARIO #6-->
                <div id="form6" class="form-group-container">
                    <div class="form-group-container" style="margin-top: 2.5rem;">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                            <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenInternet_Gpon">Orden Internet</label>
                            <input type="number" class="form-control" id="OrdenInternet_Gpon" name="OrdenInternet_Gpon"
                                disabled />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenTv_Gpon">Orden Tv</label>
                            <input type="text" class="form-control" id="OrdenTv_Gpon" name="OrdenTv_Gpon" disabled />
                        </div>

                        <div class="form-group col-md-3">
                            <label for="OrdenLinea_Gpon">Orden Linea</label>
                            <input type="text" class="form-control" id="OrdenLinea_Gpon" name="OrdenLinea_Gpon"
                                disabled />
                        </div>
                    </div>
                    <div class="form-group-container" style="margin-top: 2.5rem;">
                        <div class="form-group col-md-3">
                            <label for="tipo_actividadGpon">Tipo De Actividad</label>
                            <select class="form-control" style="width: 100%;" name="tipo_actividadGpon"
                                id="tipo_actividadGpon" tabindex="-1" aria-hidden="true">
                                <option selected="selected" value="">Seleccione una opción</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                    </div>

                    <!-- CAMBIO DE TIPO ACTIVIDAD REALIZADA GPON-->
                    <div class="form-group-container" id="formGpon_Realizada">
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="equipostv">Equipo Tv</label>
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
                            <div class="form-group col-md-3">
                                <label for="tecnico">Equipo Modem</label>
                                <input type="text" class="form-control" id="tecnico" name="tecnico" required />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="tecnico">Georeferencia</label>
                                <input type="text" class="form-control" id="tecnico" name="tecnico" required />
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
                        </div>
                        <div class="form-group-container">
                            <div class="form-group col-md-12">
                                <label for="telefono">Observaciones</label>
                                <input type="number" class="form-control" id="observaciones-form3"
                                    name="observaciones-form3" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telefono">Recibe</label>
                                <input type="text" class="form-control" id="materiales-form3" name="materiales-form3"
                                    required placeholder="" />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telefono">Materiales</label>
                                <input type="text" class="form-control" id="materiales-form3" name="materiales-form3"
                                    required placeholder="Comentarios..." />
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD OBJETADA GPON -->

                    <div class="form-group-container" id="formGpon_Objetada">
                        <div class="form-group col-md-3">
                            <label for="tipo_actividad">Motivo Objetada</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                name="tipo_actividad" tabindex="-1" id="tipo_actividad" aria-hidden="true">
                                <option selected="selected">Seleccione una opción</option>
                                <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP </option>
                                <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP </option>
                                <option value="NO SE LOCALIZA AL CLIENTE">EQUIPOS CON PROBLEMAS EN SAP </option>
                                <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM INEXISTENTE
                                </option>
                                <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO OPEN </option>
                                <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA </option>
                                <option value="VANDALISMO"> VANDALISMO </option>
                            </select>
                        </div>
                        <div class="from-group-container">
                            <div class="form-group col-md-3">
                                <label for="EModem">
                                    Orden
                                </label>
                                <input type="text" class="form-control" id="numerovoip" name="numerovoip" />
                            </div>
                        </div>
                        <div class="from-group-container">
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
                            <div class="form-group col-md-12">
                                <label for="EModem">
                                    Observaciones
                                </label>
                                <input type="text" class="form-control" id="georeferencia" name="georeferencia" />
                            </div>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="EModem">
                                    Comentarios
                                </label>
                                <input type="number" class="form-control" id="equipomodem" name="equipomodem" />
                            </div>
                        </div>
                    </div>

                    <!-- TIPO ACTIVIDAD TRANSFERIDA GPON -->
                    <div class="form-group-container" id="formGpon_Transferida">
                        <div class="form-group col-md-3">
                            <label for="EModem">
                                Orden
                            </label>
                            <input type="text" class="form-control" id="numerovoip" name="numerovoip" />
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
                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="EModem">
                                    Problematica
                                </label>
                                <input type="text" class="form-control" id="georeferencia" name="georeferencia" />
                            </div>
                        </div>

                        <div class="from-group-container">
                            <div class="form-group col-md-12">
                                <label for="EModem">
                                    Comentarios
                                </label>
                                <input type="number" class="form-control" id="equipomodem" name="equipomodem" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer" id="" style="text-align: center; display: flex; justify-content: center;">
                    <button id="btn-submit" type="submit" class="btn btn-warning">Guardar Caso</button>
                </div>
            </form>
        </div>

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
        <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript">
        </script>
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
        <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript">
        </script>
        <!-- User definided -->
        <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
        <script src="{{asset('/js/instalaciones/validacionesSelect.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/registro/validacionesregistro.js')}}" type="text/javascript"></script>
        <!-- <script src="{{asset('/js/instalaciones/registro.js')}}" type="text/javascript"> </script> -->

        @endsection
    </div>
</div>