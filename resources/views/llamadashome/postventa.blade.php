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
                <!-- <img src="{{ asset('../public/img/postventa.png') }}" alt=""> -->

            </div>
            <!-- FORMULARIO #1 POSTVENTAS -->


            <form action="{{ route('registro_postventa.store') }}" method="post" id="form1"
                style="border-bottom:3px solid rgb(62, 105, 214);padding-top:15px">

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
                    <div class="form-group col-md-2" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" placeholder="POSTVENTA" value="POSTVENTA"
                            readonly="true" id="motivo_llamada" name="motivo_llamada"
                            style="color: #3e69d6; background: white; text-align: center;" />
                    </div>
                    <div class="form-group col-md-3" id="select_ordenhide">
                        <label for="Select_Postventa">TIPO POSTVENTA</label>
                        <select class="form-control" id="Select_Postventa" style="width: 100%;" name="Select_Postventa"
                            tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                            <option value="TRASLADO">TRASLADO</option>
                            <option value="ADICION">ADICION</option>
                            <option value="CAMBIO DE EQUIPO">CAMBIO DE EQUIPO</option>
                            <option value="MIGRACION">MIGRACION</option>
                            <option value="RECONEXION / RETIRO">RECONEXION / RETIRO</option>
                            <option value="CAMBIO NUMERO COBRE">CAMBIO NUMERO COBRE</option>
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

                    <div class="form-group col-md-2" id="select_ordenhide">
                        <label for="select_orden">Tipo Orden</label>
                        <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden"
                            tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>


                    <div>

                    </div>
                </div>

                <!-- POSTVENTAS TRASLADOS -->
                <div class="form-group-container">

                    <!-- POSTVENTAS TRASLADOS HFC -->
                    <div class="form-group-container HiddenTrasladoHfc postventa-traslados" id="PostventaTrasladosHfc">
                        <div class="form-group col-md-3" style="padding-top:1.5rem">
                            <label for="TipoActividadTrasladoHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoHfc" id="TipoActividadTrasladoHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <div class="TrasladoHfcHidden" id="RealizadaTrasladoHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES HFC </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTvTrasladoHfc">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenTvTrasladoHfc"
                                            name="OrdenTvTrasladoHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInternetTrasladoHfc">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon"
                                            id="OrdenInternetTrasladoHfc" name="OrdenInternetTrasladoHfc" />
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaTrasladoHfc">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaTrasladoHfc"
                                            name="OrdenLineaTrasladoHfc" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-container">
                                <div class="form-group col-md-9">
                                    <label for="ObservacionesTrasladoHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesTrasladoHfc"
                                            name="ObservacionesTrasladoHfc"
                                            placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="TrabajadoTrasladoHfc" name="TrabajadoTrasladoHfc" />
                                            <label class="form-check-label" for="">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="RecibeHfcRealizado">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfcRealizado" name="RecibeHfcRealizado" />
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
                                                <label for="NodoTrasladoHfc">
                                                    Nodo
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="NodoTrasladoHfc"
                                                        name="NodoTrasladoHfc" placeholder="Ingresa Nodo" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="TapTrasladoHfc">
                                                    TAP
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="TapTrasladoHfc"
                                                        name="TapTrasladoHfc" placeholder="Ingresa TAP" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="PosicionTrasladoHfc">
                                                    Posicion
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="PosicionTrasladoHfc"
                                                        name="PosicionTrasladoHfc" placeholder="Ingresa Posicion" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="MaterialesTrasladoHfc">
                                                    Materiales
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="MaterialesTrasladoHfc"
                                                        name="MaterialesTrasladoHfc" placeholder="Comentarios..." />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="TrasladoHfcHidden" id="ObjetadaTrasladoHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES HFC</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTvObjetadoTrasladoHfc">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon"
                                            id="OrdenTvObjetadoTrasladoHfc" name="OrdenTvObjetadoTrasladoHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenIntObjTrasladoHfc">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenIntObjTrasladoHfc"
                                            name="OrdenIntObjTrasladoHfc" />
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaObjetadoTrasladoHfc">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon"
                                            id="OrdenLineaObjetadoTrasladoHfc" name="OrdenLineaObjetadoTrasladoHfc" />
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoHfc" tabindex="-1"
                                            id="MotivoObjTrasladoHfc" aria-hidden="true">
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
                                                    id="TrabajadoObjTrasladoHfc" name="TrabajadoObjTrasladoHfc" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsObjTrasladoHfc">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsObjTrasladoHfc"
                                                name="ObvsObjTrasladoHfc"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjTrasladoHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjTrasladoHfc"
                                                name="ComentariosObjTrasladoHfc" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="TrasladoHfcHidden" id="TransferidoTrasladoHfc">
                            <div class="" id="RealizadaTrasladoHfc">
                                <div class="form-group-container">
                                    <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                        <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES HFC</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTvTransferidoHfc">Orden Tv</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenTvTransferidoHfc" name="OrdenTvTransferidoHfc" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenInternetTransferidoHfc">Orden Internet</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenInternetTransferidoHfc" name="OrdenInternetTransferidoHfc" />
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="OrdenLineaTransferidoHfc">Orden Linea</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenLineaTransferidoHfc" name="OrdenLineaTransferidoHfc" />
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group-container">
                                    <div class="form-group col-md-9">
                                        <label for="MotivoTransTrasladoHfc">Motivo Transferido</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="MotivoTransTrasladoHfc"
                                                name="MotivoTransTrasladoHfc" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoTransTrasladoHfc" name="TrabajadoTransTrasladoHfc" />
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="ComentarioTrasladoTransHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioTrasladoTransHfc"
                                                name="ComentarioTrasladoTransHfc" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-container TrasladoHfcHidden" id="AnuladaTrasladoHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES HFC</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTvAnulTraslHfc">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenTvAnulTraslHfc"
                                            name="OrdenTvAnulTraslHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInterAnulTraslHfc">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenInterAnulTraslHfc"
                                            name="OrdenInterAnulTraslHfc" />
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaAnulTraslHfc">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaAnulTraslHfc"
                                            name="OrdenLineaAnulTraslHfc" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAnuladaTraslado_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAnuladaTraslado_Hfc" tabindex="-1"
                                            id="MotivoAnuladaTraslado_Hfc" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED FISICA INSTALADA
                                                PERO NO ACTIVA
                                            </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA) </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAnuladaTraslado_Hfc" name="TrabajadoAnuladaTraslado_Hfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComenAnuladaTraslado_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComenAnuladaTraslado_Hfc"
                                            name="ComenAnuladaTraslado_Hfc"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTAS TRASLADOS GPON -->
                    <div class="form-group-container HiddenTrasladoGpon postventa-traslados"
                        id="PostventaTrasladosGpon">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoGpon">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoGpon" id="TipoActividadTrasladoGpon" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="TrasladoGponHidden" id="RealizadaTrasladoGpon">
                            <div class="form-group-container col-md-12">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES GPON </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTvTrasladoGpon">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenTvTrasladoGpon"
                                            name="OrdenTvTrasladoGpon" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInternetTrasladoGpon">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon"
                                            id="OrdenInternetTrasladoGpon" name="OrdenInternetTrasladoGpon" />
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaTrasladoGpon">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaTrasladoGpon"
                                            name="OrdenLineaTrasladoGpon" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-container">
                                <div class="form-group col-md-9">
                                    <label for="ObvsTrasladoGpon">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsTrasladoGpon"
                                            name="ObvsTrasladoGpon" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="TrabajadoTrasladoGpon" name="TrabajadoTrasladoGpon" />
                                            <label class="form-check-label" for="">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="RecibeTrasladoGpon">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeTrasladoGpon" name="RecibeTrasladoGpon" />
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
                                                <label for="NodoTrasladoGpon">
                                                    Nodo
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="NodoTrasladoGpon"
                                                        name="NodoTrasladoGpon" placeholder="Ingresa Nodo" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="TapTrasladoGpon">
                                                    TAP
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="TapTrasladoGpon"
                                                        name="TapTrasladoGpon" placeholder="Ingresa TAP" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="PosicionTrasladoGpon">
                                                    Posicion
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="PosicionTrasladoGpon"
                                                        name="PosicionTrasladoGpon" placeholder="Ingresa Posicion" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="MaterialesTrasladoGpon">
                                                    Materiales
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="MaterialesTrasladoGpon"
                                                        name="MaterialesTrasladoGpon" placeholder="Comentarios..." />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="TrasladoGponHidden" id="ObjetadaTrasladoGpon">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES GPON</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTvTrasladoObjGpon">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenTvTrasladoObjGpon"
                                            name="OrdenTvTrasladoObjGpon" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInterObjTraslGpon">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenInterObjTraslGpon"
                                            name="OrdenInterObjTraslGpon" />
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaTraslObjGpon">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaTraslObjGpon"
                                            name="OrdenLineaTraslObjGpon" />
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoGpon">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoGpon" tabindex="-1"
                                            id="MotivoObjTrasladoGpon" aria-hidden="true">
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
                                                    id="TrabajadoTrasladoObjGpon" name="TrabajadoTrasladoObjGpon" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsTrasladoObjGpon">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsTrasladoObjGpon"
                                                name="ObvsTrasladoObjGpon"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentTrasladoObjGpon">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentTrasladoObjGpon"
                                                name="ComentTrasladoObjGpon" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <div class="TrasladoGponHidden" id="TransferidoTrasladoGpon">
                            <div class="form-group-container">
                                <div class="col-md-12">
                                    <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                        <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES GPON</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTvTrasladoTransGpon">Orden Tv</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenTvTrasladoTransGpon" name="OrdenTvTrasladoTransGpon" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenIntTransladoGpon">Orden Internet</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenIntTransladoGpon" name="OrdenIntTransladoGpon" />
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="OrdenLineaTrasladoTransGpon">Orden Linea</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenLineaTrasladoTransGpon" name="OrdenLineaTrasladoTransGpon" />
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-9">
                                    <label for="MotivoTransTrasladoGpon">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransTrasladoGpon"
                                            name="MotivoTransTrasladoGpon" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTraslTransGpon"
                                                name="TrabajadoTraslTransGpon" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentTrasladoTransGpon">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentTrasladoTransGpon"
                                            name="ComentTrasladoTransGpon" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoGponHidden" id="AnuladaTrasladoGpon">
                            <div class="form-group-container">
                                <div class="col-md-12">
                                    <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                        <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES GPON</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTvTraslAnuladoGpon">Orden Tv</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenTvTraslAnuladoGpon" name="OrdenTvTraslAnuladoGpon" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenIntTrasladoAnulGpon">Orden Internet</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenIntTrasladoAnulGpon" name="OrdenIntTrasladoAnulGpon" />
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="OrdenLineaTraslAnulGpon">Orden Linea</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenLineaTraslAnulGpon" name="OrdenLineaTraslAnulGpon" />
                                        </div>
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Gpon">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Gpon" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Gpon" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN
                                                CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAnuladaTraslado_gpon"
                                                name="TrabajadoAnuladaTraslado_gpon" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTrasladoAnulada_Gpon">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTrasladoAnulada_Gpon"
                                            name="ComentarioTrasladoAnulada_Gpon"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- POSTVENTAS TRASLADOS ADSL -->
                    <div class="form-group-container HiddenTrasladoAdsl postventa-traslados"
                        id="PostventaTrasladosAdsl">

                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoAdsl">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoAdsl" id="TipoActividadTrasladoAdsl" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="TrasladoAdslHidden" id="RealizadaTrasladoAdsl">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="NOrdenTrasladosAdsl">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenTrasladosAdsl"
                                            placeholder="N° Orden" name="NOrdenTrasladosAdsl" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="GeorefTrasladoAdsl">Georeferencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="GeorefTrasladoAdsl"
                                            name="GeorefTrasladoAdsl" placeholder="Latitud,Longitud" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="MaterialesTrasladoAdsl">
                                        Materiales
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MaterialesTrasladoAdsl"
                                            name="MaterialesTrasladoAdsl" placeholder="Comentarios..." />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTrasladoAdsl"
                                                name="TrabajadoTrasladoAdsl" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsTrasladoAdsl">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsTrasladoAdsl"
                                            name="ObvsTrasladoAdsl" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="RecibeTrasladoAdsl">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeTrasladoAdsl" name="RecibeTrasladoAdsl" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="TrasladoAdslHidden" id="ObjetadaTrasladoAdsl">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoAdsl">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoAdsl" tabindex="-1"
                                            id="MotivoObjTrasladoAdsl" aria-hidden="true">
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
                                        <label for="OrdenObjTrasladoAdsl">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjTrasladoAdsl"
                                                placeholder="N° Orden" name="OrdenObjTrasladoAdsl" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoTrasladoObjAdsl" name="TrabajadoTrasladoObjAdsl" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsTrasladoObjAdsl">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsTrasladoObjAdsl"
                                                name="ObvsTrasladoObjAdsl"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosTrasladosObjAdsl">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosTrasladosObjAdsl"
                                                name="ComentariosTrasladosObjAdsl" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="TrasladoAdslHidden" id="AnuladaTrasladoAdsl">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTransferidoAdsl">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenTransferidoAdsl"
                                                placeholder="N° Orden" name="OrdenTransferidoAdsl" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTransferidoAdsl" name="TrabajadoTransferidoAdsl" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoTransferidoTrasladoAdsl">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransferidoTrasladoAdsl"
                                            name="MotivoTransferidoTrasladoAdsl" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosTrasladoTransAdsl">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosTrasladoTransAdsl"
                                            name="ComentariosTrasladoTransAdsl" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoAdslHidden" id="AnuladaTrasladoAdsl">
                            <div class="form-group-container">

                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Adsl">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Adsl" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Adsl" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN
                                                CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenTrasladosAnulAdsl">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenTrasladosAnulAdsl"
                                            placeholder="N° Orden" name="NOrdenTrasladosAnulAdsl" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoAnulada_Adsl"
                                                name="TrabajadoAnulada_Adsl" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTrasladoAnulada_Adsl">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTrasladoAnulada_Adsl"
                                            name="ComentarioTrasladoAnulada_Adsl"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTAS TRASLADOS COBRE -->
                    <div class="form-group-container HiddenTrasladoCobre postventa-traslados"
                        id="PostventaTrasladosCobre">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoCobre">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoCobre" id="TipoActividadTrasladoCobre" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="TrasladoCobreHidden" id="RealizadaTrasladoCobre">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladoCobre">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenTrasladoCobre"
                                            placeholder="N° Orden" name="OrdenTrasladoCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="GeorefTrasladoCobre">Georeferencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="GeorefTrasladoCobre"
                                            name="GeorefTrasladoCobre" placeholder="Latitud,Longitud" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="MaterialesTrasladoCobre">
                                        Materiales
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MaterialesTrasladoCobre"
                                            name="MaterialesTrasladoCobre" placeholder="Comentarios..." />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTrasladoCobre"
                                                name="TrabajadoTrasladoCobre" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsTrasladoCobre">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsTrasladoCobre"
                                            name="ObvsTrasladoCobre" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="RecibeTrasladoCobre">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeTrasladoCobre" name="RecibeTrasladoCobre" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="TrasladoCobreHidden" id="ObjetadaTrasladoCobre">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoCobre">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoCobre" tabindex="-1"
                                            id="MotivoObjTrasladoCobre" aria-hidden="true">
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
                                        <label for="OrdenTrasladoObjCobres">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTrasladoObjCobres"
                                                placeholder="N° Orden" name="OrdenTrasladoObjCobres" />
                                        </div>
                                    </div>


                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoTrasladoObjCobre" name="TrabajadoTrasladoObjCobre" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObsObjTrasladoCobre">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObsObjTrasladoCobre"
                                                name="ObsObjTrasladoCobre"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjTrasladoCobre">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjTrasladoCobre"
                                                name="ComentariosObjTrasladoCobre" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="TrasladoCobreHidden" id="AnuladaTrasladoCobre">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTransTrasladoCobre" name="TrabajadoTransTrasladoCobre" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladoTranfCobre">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenTrasladoTranfCobre"
                                            placeholder="N° Orden" name="OrdenTrasladoTranfCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoTransTrasladoCobre">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransTrasladoCobre"
                                            name="MotivoTransTrasladoCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTransTrasladoCobre">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTransTrasladoCobre"
                                            name="ComentarioTransTrasladoCobre" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoCobreHidden" id="AnuladaTrasladoCobre">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Cobre">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Cobre" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Cobre" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN
                                                CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="NO HAY NUMERACION EN CONCENTRADOR">NO HAY NUMERACION EN
                                                CONCENTRADOR
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD MAL REGISTRADA">SOLICITUD MAL REGISTRADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladosCobre">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenTrasladosCobre"
                                            placeholder="N° Orden" name="OrdenTrasladosCobre" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoAnulada_Cobre"
                                                name="TrabajadoAnulada_Cobre" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTrasladoAnulada_Cobre">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTrasladoAnulada_Cobre"
                                            name="ComentarioTrasladoAnulada_Cobre"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTA TRASLADOS DTH -->
                    <div class="form-group-container HiddenTrasladoDth postventa-traslados" id="PostventaTrasladosDth">

                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoDth">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoDth" id="TipoActividadTrasladoDth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="TrasladoDthHidden" id="RealizadaTrasladoDth">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladoDth">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenTrasladoDth"
                                            placeholder="N° Orden" name="OrdenTrasladoDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="GeorefTrasladoDth">Georeferencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="GeorefTrasladoDth"
                                            name="GeorefTrasladoDth" placeholder="Latitud,Longitud" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="MaterialesTrasladoDth">
                                        Materiales
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MaterialesTrasladoDth"
                                            name="MaterialesTrasladoDth" placeholder="Comentarios..." />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTrasladoDth"
                                                name="TrabajadoTrasladoDth" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsTrasladoDth">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsTrasladoDth"
                                            name="ObvsTrasladoDth" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="RecibeTrasladoDth">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeTrasladoDth" name="RecibeTrasladoDth" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="TrasladoDthHidden" id="ObjetadaTrasladoDth">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoDth">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoDth" tabindex="-1"
                                            id="MotivoObjTrasladoDth" aria-hidden="true">
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
                                        <label for="OrdenTrasladoObjDth">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTrasladoObjDth"
                                                placeholder="N° Orden" name="OrdenTrasladoObjDth" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoTrasladoObj_Dth" name="TrabajadoTrasladoObj_Dth" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsTrasladoObjDth">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsTrasladoObjDth"
                                                name="ObvsTrasladoObjDth"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosTrasladoObjDth">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosTrasladoObjDth"
                                                name="ComentariosTrasladoObjDth" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="TrasladoDthHidden" id="AnuladaTrasladoDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTransferidoDth"
                                                name="TrabajadoTransferidoDth" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladoTranfDth">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenTrasladoTranfDth"
                                            placeholder="N° Orden" name="OrdenTrasladoTranfDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivioTrasnTrasladoDth">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivioTrasnTrasladoDth"
                                            name="MotivioTrasnTrasladoDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTrasnferidoTrasladoDth">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTrasnferidoTrasladoDth"
                                            name="ComentarioTrasnferidoTrasladoDth" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoDthHidden" id="AnuladaTrasladoDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Dth">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Dth" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Dth" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL REGISTRADA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA) </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladosDth">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenTrasladosDth"
                                            placeholder="N° Orden" name="OrdenTrasladosDth" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTrasladoAnulada_Hfc" name="TrabajadoTrasladoAnulada_Hfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTrasladoAnulada_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTrasladoAnulada_Hfc"
                                            name="ComentarioTrasladoAnulada_Hfc"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- POSTVENTAS ADICION -->
                <div class="form-group-container">

                    <!-- POSTVENTA ADICION HFC -->
                    <div class="form-group-container postventa-adicion" id="PostventaAdicionHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadAdicionHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadAdicionHfc" id="TipoActividadAdicionHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaAdicionHfcHidden " id="RealizadaAdicionHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipos Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc1"
                                            name="equipostvAdicionHfc1" placeholder="Equipo Tv 1" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc2"
                                            name="equipostvAdicionHfc2" placeholder="Equipo Tv 2" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc3"
                                            name="equipostvAdicionHfc3" placeholder="Equipo Tv 3" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc4"
                                            name="equipostvAdicionHfc4" placeholder="Equipo Tv 4" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc5"
                                            name="equipostvAdicionHfc5" placeholder="Equipo Tv 5" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="NOrdenAdicionHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenAdicionHfc"
                                            placeholder="N° Orden" name="NOrdenAdicionHfc" />
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-left:20px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoAdicionHfc"
                                            name="TrabajadoAdicionHfc" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>


                                <div class="col-md-9">
                                    <label for="obvsAdicionHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="obvsAdicionHfc"
                                            name="obvsAdicionHfc" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>


                                <div class="form-group col-md-9" style="padding-top: 10px;">
                                    <label for="RecibeAdicionHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeAdicionHfc" name="RecibeAdicionHfc" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaAdicionHfcHidden" id="ObjetadaAdicionHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjAdicionHfc">Motivo Objetada</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjAdicionHfc" tabindex="-1"
                                            id="MotivoObjAdicionHfc" aria-hidden="true">
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
                                        <label for="OrdenAdicionObjHfc">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenAdicionObjHfc"
                                                placeholder="N° Orden" name="OrdenAdicionObjHfc" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjAdicionHfc" name="TrabajadoObjAdicionHfc" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsAdicionObjHfc">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsAdicionObjHfc"
                                                name="ObvsAdicionObjHfc"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjAdicionHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjAdicionHfc"
                                                name="ComentariosObjAdicionHfc" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="PostventaAdicionHfcHidden" id="AnuladaAdicionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAdicionTransferidoHfc"
                                                name="TrabajadoAdicionTransferidoHfc" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenTranfHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenTranfHfc"
                                            placeholder="N° Orden" name="OrdenTranfHfc" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivioTransferidoAdicionHfc">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivioTransferidoAdicionHfc"
                                            name="MotivioTransferidoAdicionHfc" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTransferidoAdicionHfc">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTransferidoAdicionHfc"
                                            name="ComentarioTransferidoAdicionHfc" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULADA -->
                        <div class="form-group-container PostventaAdicionHfcHidden" id="AnuladaAdicionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionAnulada_Hfc" tabindex="-1"
                                            id="MotivoAdicionAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED FISICA INSTALADA
                                                PERO NO ACTIVA
                                            </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA) </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenAdicionAnuladaHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenAdicionAnuladaHfc"
                                            placeholder="N° Orden" name="NOrdenAdicionAnuladaHfc" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAdicionAnulada_Hfc" name="TrabajadoAdicionAnulada_Hfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="ComentarioAdicionAnulada_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioAdicionAnulada_Hfc"
                                            name="ComentarioAdicionAnulada_Hfc"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- POSTVENTA ADICION GPON -->
                    <div class="form-group-container postventa-adicion" id="PostventaAdicionGpon">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadAdicionGpon">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadAdicionGpon" id="TipoActividadAdicionGpon" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>

                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaAdicionGponHidden" id="RealizadaAdicionGpon">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipos Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon1"
                                            name="equipostvAdicionGpon1" placeholder="Equipo Tv 1" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon2"
                                            name="equipostvAdicionGpon2" placeholder="Equipo Tv 2" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon3"
                                            name="equipostvAdicionGpon3" placeholder="Equipo Tv 3" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon4"
                                            name="equipostvAdicionGpon4" placeholder="Equipo Tv 4" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon5"
                                            name="equipostvAdicionGpon5" placeholder="Equipo Tv 5" />
                                    </div>
                                </div>



                                <div class=" col-md-3">
                                    <label for="NOrdenAdicionGpon">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenAdicionGpon"
                                            placeholder="N° Orden" name="NOrdenAdicionGpon" />
                                    </div>
                                </div>
                                <div class=" col-md-3" style="padding-left:18px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoAdicionGpon"
                                            name="TrabajadoAdicionGpon" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>

                                <div class=" col-md-9">
                                    <label for="ObvsAdicionGpon">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsAdicionGpon"
                                            name="ObvsAdicionGpon" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9" style="padding-top:10px">
                                    <label for="RecibeAdicionGpon">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeAdicionGpon" name="RecibeAdicionGpon" />
                                    </div>
                                </div>




                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaAdicionGponHidden" id="ObjetadaAdicionGpon">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionObjGpon">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionObjGpon" tabindex="-1"
                                            id="MotivoAdicionObjGpon" aria-hidden="true">
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
                                        <label for="NOrdenAdicionObjGpon">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="NOrdenAdicionObjGpon"
                                                placeholder="N° Orden" name="NOrdenAdicionObjGpon" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoAdicionObjGpon" name="TrabajadoAdicionObjGpon" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsAdicionObjGpon">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsAdicionObjGpon"
                                                name="ObvsAdicionObjGpon"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosAdicionObjGpon">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosAdicionObjGpon"
                                                name="ComentariosAdicionObjGpon" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="PostventaAdicionGponHidden" id="AnuladaAdicionGpon">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTransferidoAdicionGpon"
                                                name="TrabajadoTransferidoAdicionGpon" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenAdicionTranfGpon">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenAdicionTranfGpon"
                                            placeholder="N° Orden" name="OrdenAdicionTranfGpon" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoTransferidoAdicionGpon">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransferidoAdicionGpon"
                                            name="MotivoTransferidoAdicionGpon" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTransferidoAdicionGpon">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTransferidoAdicionGpon"
                                            name="ComentarioTransferidoAdicionGpon" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULADA -->
                        <div class="form-group-container PostventaAdicionGponHidden" id="AnuladaAdicionGpon">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionAnulada_Gpon">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionAnulada_Gpon" tabindex="-1"
                                            id="MotivoAdicionAnulada_Gpon" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN
                                                CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>

                                <div class=" col-md-3">
                                    <label for="NOrdenAdicionAnuladaGpon">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenAdicionAnuladaGpon"
                                            placeholder="N° Orden" name="NOrdenAdicionAnuladaGpon" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAdicionAnulada_Gpon" name="TrabajadoAdicionAnulada_Gpon" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioAdicionAnulada_Gpon">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioAdicionAnulada_Gpon"
                                            name="ComentarioAdicionAnulada_Gpon"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- POSTVENTA ADICION DTH -->
                    <div class="form-group-container postventa-adicion" id="PostventaAdicionDth">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadAdicionDth">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadAdicionDth" id="TipoActividadAdicionDth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaAdicionDthHidden" id="RealizadaAdicionDth">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipos Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth1"
                                            name="equipostvAdicionDth1" placeholder="Equipo Tv 1" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth2"
                                            name="equipostvAdicionDth2" placeholder="Equipo Tv 2" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth3"
                                            name="equipostvAdicionDth3" placeholder="Equipo Tv 3" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth4"
                                            name="equipostvAdicionDth4" placeholder="Equipo Tv 4" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth5"
                                            name="equipostvAdicionDth5" placeholder="Equipo Tv 5" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenAdicionDth">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenAdicionDth"
                                            placeholder="N° Orden" name="NOrdenAdicionDth" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class=" col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoAdicionDth"
                                                name="TrabajadoAdicionDth" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>


                                <div class=" col-md-9">
                                    <label for="ObvsAdicionDth">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsAdicionDth"
                                            name="ObvsAdicionDth" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class=" col-md-9" style="padding-top:8px">
                                    <label for="RecibeAdicionDth">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeAdicionDth" name="RecibeAdicionDth" />
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaAdicionDthHidden" id="ObjetadaAdicionDth">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjAdicionDth">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjAdicionDth" tabindex="-1"
                                            id="MotivoObjAdicionDth" aria-hidden="true">
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
                                        <label for="NOrdenAdicionObjDth">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="NOrdenAdicionObjDth"
                                                placeholder="N° Orden" name="NOrdenAdicionObjDth" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoAdicionObjDth" name="TrabajadoAdicionObjDth" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsAdicionObjDth">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsAdicionObjDth"
                                                name="ObvsAdicionObjDth"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosAdicionObjDth">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosAdicionObjDth"
                                                name="ComentariosAdicionObjDth" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="PostventaAdicionDthHidden" id="AnuladaAdicionDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTransAdicionDth" name="TrabajadoTransAdicionDth" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenAdicionTranfDth">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenAdicionTranfDth"
                                            placeholder="N° Orden" name="OrdenAdicionTranfDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoTransAdicionDth">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransAdicionDth"
                                            name="MotivoTransAdicionDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosTransferidoAdicionDth">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosTransferidoAdicionDth"
                                            name="ComentariosTransferidoAdicionDth" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULADA DTH -->
                        <div class="PostventaAdicionDthHidden" id="AnuladaAdicionDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionAnulada_Dth">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionAnulada_Dth" tabindex="-1"
                                            id="MotivoAdicionAnulada_Dth" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL REGISTRADA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA) </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenAdicionAnulada_Dth">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenAdicionAnulada_Dth"
                                            name="OrdenAdicionAnulada_Dth" placeholder="Ingresa N° Orden" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAdicionAnulada_Dth" name="TrabajadoAdicionAnulada_Dth" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioAdicionAnulada_Dth">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioAdicionAnulada_Dth"
                                            name="ComentarioAdicionAnulada_Dth"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- POSTVENTAS CAMBIOS DE EQUIPOS -->

                <div class="form-group-container">
                    <!-- POSTVENTA CAMBIO DE EQUIPO HFC -->
                    <div class="form-group-container" id="PostventaCambioHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioHfc" id="TipoActividadCambioHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaCambioHfcHidden" id="RealizadaCambioHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="InstalacionEquipoHfc">Equipo Instalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="InstalacionEquipoHfc"
                                            name="InstalacionEquipoHfc" placeholder="N° Equipo Instalar" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="DesinstalarEquipoHfc">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoHfc"
                                            name="DesinstalarEquipoHfc" placeholder="N° Equipo Desinstalar" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="NOrdenEquipoHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenEquipoHfc"
                                            placeholder="N° Orden" name="NOrdenEquipoHfc" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsEquipoHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsEquipoHfc" name="ObvsEquipoHfc"
                                            placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="RecibeEquipoHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeEquipoHfc" name="RecibeEquipoHfc" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoHfc"
                                                name="TrabajadoEquipoHfc" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaCambioHfcHidden" id="ObjetadaCambioHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoObjHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoObjHfc" tabindex="-1"
                                            id="MotivoEquipoObjHfc" aria-hidden="true">
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
                                        <label for="NordenObjEquipoHfc">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="NordenObjEquipoHfc"
                                                placeholder="N° Orden" name="NordenObjEquipoHfc" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjEquipoHfc" name="TrabajadoObjEquipoHfc" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsObjEquipoHfc">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsObjEquipoHfc"
                                                name="ObvsObjEquipoHfc"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjHfc"
                                                name="ComentsEquipoObjHfc" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ANULACION -->
                        <div class="PostventaCambioHfcHidden" id="AnuladaCambioHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoAnulada_Hfc" tabindex="-1"
                                            id="MotivoEquipoAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL REGISTRADA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA) </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenAnuladaEquipoHfc">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenAnuladaEquipoHfc"
                                            name="OrdenAnuladaEquipoHfc" placeholder="Ingresa N° Orden" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Hfc" name="TrabajadoEquipoAnulada_Hfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioAnuladaEquipoHfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioAnuladaEquipoHfc"
                                            name="ComentarioAnuladaEquipoHfc"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTA CAMBIO DE EQUIPO GPON -->
                    <div class="form-group-container " id="PostventaCambioGpon">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioGpon">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioGpon" id="TipoActividadCambioGpon" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaCambioGponHidden" id="RealizadaCambioGpon">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipo Instalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="InstalacionEquipoGpon"
                                            name="InstalacionEquipoGpon" placeholder="N° Equipo Instalar" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoGpon"
                                            name="DesinstalarEquipoGpon" placeholder="N° Equipo Desinstalar" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenEquipoGpon">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenEquipoGpon"
                                            placeholder="N° Orden" name="NOrdenEquipoGpon" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsEquipoGpon">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsEquipoGpon"
                                            name="ObvsEquipoGpon" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="RecibeEquipoGpon">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeEquipoGpon" name="RecibeEquipoGpon" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoGpon"
                                                name="TrabajadoEquipoGpon" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaCambioGponHidden" id="ObjetadaCambioGpon">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="MotivoObjEquipoGpon">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjEquipoGpon" tabindex="-1"
                                            id="MotivoObjEquipoGpon" aria-hidden="true">
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
                                        <label for="NOrdenObjEquipoGpon">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="NOrdenObjEquipoGpon"
                                                placeholder="N° Orden" name="NOrdenObjEquipoGpon" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjEquipoGpon" name="TrabajadoObjEquipoGpon" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsEquipoObjGpon">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsEquipoObjGpon"
                                                name="ObvsEquipoObjGpon"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjGpon">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjGpon"
                                                name="ComentsEquipoObjGpon" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ANULACION -->
                        <div class="PostventaCambioGponHidden" id="AnuladaCambioGpon">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAnuladaObj_Gpon">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAnuladaObj_Gpon" tabindex="-1"
                                            id="MotivoAnuladaObj_Gpon" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN
                                                CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenEquipoAnuladaGpon">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenEquipoAnuladaGpon"
                                            placeholder="N° Orden" name="OrdenEquipoAnuladaGpon" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Gpon" name="TrabajadoEquipoAnulada_Gpon" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioEquipoAnulada_Gpon">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioEquipoAnulada_Gpon"
                                            name="ComentarioEquipoAnulada_Gpon"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTA CAMBIO DE EQUIPO ADSL -->
                    <div class="form-group-container " id="PostventaCambioAdsl">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioAdsl">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioAdsl" id="TipoActividadCambioAdsl" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaCambioAdslHidden" id="RealizadaCambioAdsl">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="InstalacionEquipoAdsl">Equipo Instalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="InstalacionEquipoAdsl"
                                            name="InstalacionEquipoAdsl" placeholder="N° Equipo Instalar" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="DesinstalarEquipoAdsl">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoAdsl"
                                            name="DesinstalarEquipoAdsl" placeholder="N° Equipo Instalar" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenEquipoAdsl">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenEquipoAdsl"
                                            placeholder="N° Orden" name="OrdenEquipoAdsl" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsEquipoAdsl">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsEquipoAdsl"
                                            name="ObvsEquipoAdsl" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="RecibeEquipoAdsl">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeEquipoAdsl" name="RecibeEquipoAdsl" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoAdsl"
                                                name="TrabajadoEquipoAdsl" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaCambioAdslHidden" id="ObjetadaCambioAdsl">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoObjAdsl">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoObjAdsl" tabindex="-1"
                                            id="MotivoEquipoObjAdsl" aria-hidden="true">
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
                                        <label for="OrdenEquipoObjAdsl">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenEquipoObjAdsl"
                                                placeholder="N° Orden" name="OrdenEquipoObjAdsl" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoEquipoObjAdsl" name="TrabajadoEquipoObjAdsl" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsEquipoObjAdsl">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsEquipoObjAdsl"
                                                name="ObvsEquipoObjAdsl"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjAdsl">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjAdsl"
                                                name="ComentsEquipoObjAdsl" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ANULACIONES -->
                        <div class="PostventaCambioAdslHidden" id="AnuladaCambioAdsl">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoAnulada_Adsl">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoAnulada_Adsl" tabindex="-1"
                                            id="MotivoEquipoAnulada_Adsl" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN
                                                CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenAnuladaEquipoAdsl">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenAnuladaEquipoAdsl"
                                            name="OrdenAnuladaEquipoAdsl" placeholder="Ingresa N° Orden" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Adsl" name="TrabajadoEquipoAnulada_Adsl" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentsEquipoAnulada_Adsl">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentsEquipoAnulada_Adsl"
                                            name="ComentsEquipoAnulada_Adsl"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTA CAMBIO DE EQUIPO DTH -->
                    <div class="form-group-container " id="PostventaCambioDth">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioDth">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioDth" id="TipoActividadCambioDth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaCambioDthHidden" id="RealizadaCambioDth">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="">Equipo Instalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="InstalacionEquipoDth"
                                            name="InstalacionEquipoDth" placeholder="N° Equipo Instalar" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoDth"
                                            name="DesinstalarEquipoDth" placeholder="N° Equipo Instalar" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenEquipoDth">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenEquipoDth"
                                            placeholder="N° Orden" name="OrdenEquipoDth" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsEquipoDth">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsEquipoDth" name="ObvsEquipoDth"
                                            placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="RecibeEquipoDth">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeEquipoDth" name="RecibeEquipoDth" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoDth"
                                                name="TrabajadoEquipoDth" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaCambioDthHidden" id="ObjetadaCambioDth">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjEquipoDth">MOTIVO OBJETADO</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjEquipoDth" tabindex="-1"
                                            id="MotivoObjEquipoDth" aria-hidden="true">
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
                                        <label for="OrdenEquipoObjDth">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenEquipoObjDth"
                                                placeholder="N° Orden" name="OrdenEquipoObjDth" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoEquipoObjDth" name="TrabajadoEquipoObjDth" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsEquipoObjDth">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsEquipoObjDth"
                                                name="ObvsEquipoObjDth"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjDth">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjDth"
                                                name="ComentsEquipoObjDth" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ANULACION -->
                        <div class="PostventaCambioDthHidden" id="AnuladaCambioDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoAnulada_Dth">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoAnulada_Dth" tabindex="-1"
                                            id="MotivoEquipoAnulada_Dth" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL REGISTRADA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA) </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenEquipoAnulada_Dth">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenEquipoAnulada_Dth"
                                            name="OrdenEquipoAnulada_Dth" placeholder="Ingresa N° Orden" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Dth" name="TrabajadoEquipoAnulada_Dth" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioEquipoAnulada_Dth">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioEquipoAnulada_Dth"
                                            name="ComentarioEquipoAnulada_Dth"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTA CAMBIO DE EQUIPO COBRE -->
                    <div class="form-group-container " id="PostventaCambioCobre">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioCobre">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioCobre" id="TipoActividadCambioCobre" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <div class="PostventaCambioCobreHidden" id="RealizadaCambioCobre">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquipoTvC_EquipoInstalarCobre">Equipo Instalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc"
                                            id="EquipoTvC_EquipoInstalarCobre" name="EquipoTvC_EquipoInstalarCobre"
                                            placeholder="N° Equipo Instalar" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquipoTvC_EquipoDesinstalarCobre">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc"
                                            id="EquipoTvC_EquipoDesinstalarCobre"
                                            name="EquipoTvC_EquipoDesinstalarCobre"
                                            placeholder="N° Equipo Desinstalar" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenC_EquiposCobre">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenC_EquiposCobre"
                                            placeholder="N° Orden" name="OrdenC_EquiposCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsC_EquipoCobre">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsC_EquipoCobre"
                                            name="ObvsC_EquipoCobre" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="RecibeC_EquipoCobre">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeC_EquipoCobre" name="RecibeC_EquipoCobre" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoC_EquipoCobre"
                                                name="TrabajadoC_EquipoCobre" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="PostventaCambioCobreHidden" id="ObjetadaCambioCobre">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="MotivoObjC_EquipoCobre">MOTIVO OBJETADO</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjC_EquipoCobre" tabindex="-1"
                                            id="MotivoObjC_EquipoCobre" aria-hidden="true">
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
                                        <label for="OrdenC_EquiposObjCobre">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenC_EquiposObjCobre"
                                                placeholder="N° Orden" name="OrdenC_EquiposObjCobre" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjC_EquipoCobre" name="TrabajadoObjC_EquipoCobre" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsObjC_EquipoCobre">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsObjC_EquipoCobre"
                                                name="ObvsObjC_EquipoCobre"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjC_EquipoCobre">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjC_EquipoCobre"
                                                name="ComentariosObjC_EquipoCobre" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="PostventaCambioCobreHidden" id="AnuladaCambioCobre">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAnulC_EquipoCobre" name="TrabajadoAnulC_EquipoCobre" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenC_EquiposAnulCobre">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenC_EquiposAnulCobre"
                                            placeholder="N° Orden" name="OrdenC_EquiposAnulCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoAnulC_EquipoCobre">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoAnulC_EquipoCobre"
                                            name="MotivoAnulC_EquipoCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosAnulC_EquipoCobre">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosAnulC_EquipoCobre"
                                            name="ComentariosAnulC_EquipoCobre" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- POSTVENTAS MIGRACION HFC -->
                <div class="form-group-container">
                    <div class="form-group-container" id="PostventaMigracionHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadMigracionHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadMigracionHfc" id="TipoActividadMigracionHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaMigracionHfcHidden" id="RealizadaMigracionHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipos Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion1"
                                            name="equipotvmigracion1" placeholder="Equipo Tv 1" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion2"
                                            name="equipotvmigracion2" placeholder="Equipo Tv 2" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion3"
                                            name="equipotvmigracion3" placeholder="Equipo Tv 3" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion4"
                                            name="equipotvmigracion4" placeholder="Equipo Tv 4" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion5"
                                            name="equipotvmigracion5" placeholder="Equipo Tv 5" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="NOrdenMigracionHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenMigracionHfc"
                                            placeholder="N° Orden" name="NOrdenMigracionHfc" />
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="SyrengMigracionHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="SyrengMigracionHfc"
                                            name="SyrengMigracionHfc" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="SapMigracionHfc">SAP</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="SapMigracionHfc"
                                            name="SapMigracionHfc" />
                                    </div>
                                </div>


                                <div class="form-group col-md-9">
                                    <label for="ObvsMigracionHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsMigracionHfc"
                                            name="ObvsMigracionHfc" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoMigracionHfc"
                                                name="TrabajadoMigracionHfc" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="RecibeMigracionHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeMigracionHfc" name="RecibeMigracionHfc" />
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
                                                    <label for="NodoMigracionHfc">
                                                        Nodo
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-square"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="NodoMigracionHfc"
                                                            name="NodoMigracionHfc" placeholder="Ingresa Nodo" />
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="TapMigracionRealizadaHfc">
                                                        TAP
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-square"></i>
                                                        </div>
                                                        <input type="number" class="form-control"
                                                            id="TapMigracionRealizadaHfc"
                                                            name="TapMigracionRealizadaHfc" placeholder="Ingresa TAP" />
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="PosicionMigracionHfc">
                                                        Posicion
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-square"></i>
                                                        </div>
                                                        <input type="number" class="form-control"
                                                            id="PosicionMigracionHfc" name="PosicionMigracionHfc"
                                                            placeholder="Ingresa Posicion" />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="GeorefMigracionHfc">
                                                        Georeferencia
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="GeorefMigracionHfc"
                                                            name="GeorefMigracionHfc" />
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="MaterialesMigracionHfc">
                                                        Materiales
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-edit"></i>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            id="MaterialesMigracionHfc" name="MaterialesMigracionHfc"
                                                            placeholder="Comentarios..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaMigracionHfcHidden" id="ObjetadaMigracionHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoMigracionObjHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoMigracionObjHfc" tabindex="-1"
                                            id="MotivoMigracionObjHfc" aria-hidden="true">
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
                                        <label for="OrdenMigracionHfcObj">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenMigracionHfcObj"
                                                placeholder="N° Orden" name="OrdenMigracionHfcObj" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoMigracionObjHfc" name="TrabajadoMigracionObjHfc" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsMigracionObjHfc">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsMigracionObjHfc"
                                                name="ObvsMigracionObjHfc"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsMigracionObjHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsMigracionObjHfc"
                                                name="Come" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <div class="PostventaMigracionHfcHidden" id="TranferidaMigracionHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenMigracionTranfHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenMigracionTranfHfc"
                                            placeholder="N° Orden" name="OrdenMigracionTranfHfc" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoMigracionTransHfc" name="TrabajadoMigracionTransHfc" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group col-md-12">
                                    <label for="MotivoTransMigracionHfc">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransMigracionHfc"
                                            name="MotivoTransMigracionHfc" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentsMigracionTransHfc">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentsMigracionTransHfc"
                                            name="ComentsMigracionTransHfc" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ANULACION -->
                        <div class="PostventaMigracionHfcHidden" id="AnuladaMigracionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoMigracionAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoMigracionAnulada_Hfc" tabindex="-1"
                                            id="MotivoMigracionAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED FISICA INSTALADA
                                                PERO NO ACTIVA
                                            </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA) </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenMigracionAnuladaHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenMigracionAnuladaHfc"
                                            placeholder="N° Orden" name="NOrdenMigracionAnuladaHfc" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoMigracionAnulada_Hfc"
                                                name="TrabajadoMigracionAnulada_Hfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioMigracionAnulada_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioMigracionAnulada_Hfc"
                                            name="ComentarioMigracionAnulada_Hfc"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- POSTVENTA RECONEXION RETIRO HFC-->
                <div class="form-group-container">
                    <div class="form-group-container" id="PostventaReconexionHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadReconexionHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadReconexionHfc" id="TipoActividadReconexionHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaReconexionHfcHidden" id="RealizaReconexionHfc">
                            <div class="form-group-container">

                                <div class="form-group col-md-3" id="hiddenEquipoRetirar">
                                    <label for="EquipoModemRetiroHfc">
                                        Equipo a retirar
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="EquipoModemRetiroHfc"
                                            placeholder="N° Equipo" name="EquipoModemRetiroHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenRetiroHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenRetiroHfc"
                                            placeholder="N° Orden" name="OrdenRetiroHfc" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoRetiroHfc"
                                                name="TrabajadoRetiroHfc" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group col-md-12">
                                    <label for="ObvsRetiroHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsRetiroHfc" name="ObvsRetiroHfc"
                                            placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="RecibeRetiroHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeRetiroHfc" name="RecibeRetiroHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="MaterialesRetiroHfc">
                                        Materiales
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MaterialesRetiroHfc"
                                            name="MaterialesRetiroHfc" placeholder="Comentarios..." />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaReconexionHfcHidden" id="ObjetadaReconexionHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjRetiroHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjRetiroHfc" tabindex="-1"
                                            id="MotivoObjRetiroHfc" aria-hidden="true">
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
                                        <label for="OrdenRetiroObjHfc">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenRetiroObjHfc"
                                                placeholder="N° Orden" name="OrdenRetiroObjHfc" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjRetiroHfc" name="TrabajadoObjRetiroHfc" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="ObvsObjRetiroHfc">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsObjRetiroHfc"
                                                name="ObvsObjRetiroHfc"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosRetiroObjHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosRetiroObjHfc"
                                                name="ComentariosRetiroObjHfc" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="PostventaReconexionHfcHidden" id="AnuladaReconexionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTransferidoRetiroHfc"
                                                name="TrabajadoTransferidoRetiroHfc" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenRetiroTranfHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenRetiroTranfHfc"
                                            placeholder="N° Orden" name="OrdenRetiroTranfHfc" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoTransferidoRetiroHfc">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransferidoRetiroHfc"
                                            name="MotivoTransferidoRetiroHfc" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosTranfRetiroHfc">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosTranfRetiroHfc"
                                            name="ComentariosTranfRetiroHfc" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULACION -->
                        <div class="PostventaReconexionHfcHidden" id="AnuladaReconexionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoRetiroAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoRetiroAnulada_Hfc" tabindex="-1"
                                            id="MotivoRetiroAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED FISICA INSTALADA
                                                PERO NO ACTIVA
                                            </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA) </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenRetiroAnulacionHfc">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenRetiroAnulacionHfc"
                                            placeholder="N° Orden" name="OrdenRetiroAnulacionHfc" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoRetiroAnulada_Hfc" name="TrabajadoRetiroAnulada_Hfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentsRetiroAnulada_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentsRetiroAnulada_Hfc"
                                            name="ComentsRetiroAnulada_Hfc"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- POSTVENTA CAMBIO NUMERO DE COBRE -->
                <div class="form-group-container">
                    <div class="form-group-container" id="PostventaCambioNumeroCobre">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioNumeroCobre">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioNumeroCobre" id="TipoActividadCambioNumeroCobre" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="ANULACION">ANULACION</option>

                                <!-- <option value="TRANSFERIDA">TRANSFERIDA</option> -->
                            </select>
                        </div>
                        <!-- REALIZADA -->
                        <div class="PostventaCambioNumeroCobreHidden" id="RealizaCambioNumeroCobre">
                            <div class="form-group-container">

                                <div class="form-group col-md-3">
                                    <label for="NumeroCobreCambio">
                                        Numero Cobre </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NumeroCobreCambio"
                                            placeholder="N° Cobre" name="NumeroCobreCambio" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenCambioCobre">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenCambioCobre"
                                            placeholder="N° Orden" name="OrdenCambioCobre" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoCambioCobre"
                                                name="TrabajadoCambioCobre" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObvsCambioCobre">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsCambioCobre"
                                            name="ObvsCambioCobre" placeholder="Ingresa las observaciones del caso" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="RecibeCambioCobre">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeCambioCobre" name="RecibeCambioCobre" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- OBJETADA -->
                        <div class="PostventaCambioNumeroCobreHidden" id="ObjetadaCambioNumeroCobre">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjCambioCobre">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjCambioCobre" tabindex="-1"
                                            id="MotivoObjCambioCobre" aria-hidden="true">
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
                                        <label for="OrdenObjCambioCobre">
                                            Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                                placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                        </div>
                                    </div>
                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjCambioCobre" name="TrabajadoObjCambioCobre" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsObjCambioCobre">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsObjCambioCobre"
                                                name="ObvsObjCambioCobre"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosCambioCobre">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosCambioCobre"
                                                name="ComentariosCambioCobre" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSFERIDA -->
                        <!-- <div class="PostventaCambioNumeroCobreHidden" id="AnuladaCambioNumeroCobre">
                            <div class="form-group-container">

                                <div class="form-group col-md-3">
                                    <label for="OrdenCambioNumeroTranfCobre">
                                        Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenCambioNumeroTranfCobre"
                                            placeholder="N° Orden" name="OrdenCambioNumeroTranfCobre" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTransfCambioCobre" name="TrabajadoTransfCambioCobre" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoTranfCambioCobre">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTranfCambioCobre"
                                            name="MotivoTranfCambioCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioCambioCobre">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioCambioCobre"
                                            name="ComentarioCambioCobre" />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- ANULACION -->
                        <div class="PostventaCambioNumeroCobreHidden" id="AnuladaCambioNumeroCobre">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAnuladaCambioCobre">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAnuladaCambioCobre" tabindex="-1"
                                            id="MotivoAnuladaCambioCobre" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN
                                                CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="NO HAY NUMERACION EN CONCENTRADOR">NO HAY NUMERACION EN
                                                CONCENTRADOR
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD MAL REGISTRADA">SOLICITUD MAL REGISTRADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenAnuladaCambioCobre">
                                        Orden
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenAnuladaCambioCobre"
                                            name="OrdenAnuladaCambioCobre" step="any" pattern="^[0-9]+([.][0-9]+)?$"
                                            placeholder="Ingresa N° Orden" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAnuladaCambioCobre" name="TrabajadoAnuladaCambioCobre" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioAnuladaCambioCobre">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioAnuladaCambioCobre"
                                            name="ComentarioAnuladaCambioCobre"
                                            placeholder="Ingresa comentarios del caso" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box-footer" id="btn-submit"
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
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(function(checkbox) {
        actualizarTextoCheckbox(checkbox);

        checkbox.addEventListener('change', function() {
            actualizarTextoCheckbox(checkbox);
        });
    });

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
<script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"></script>

<!-- <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script> -->
<script src="{{asset('/js/instalaciones/ValoresTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/PostventaValidacionSelect.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/postventas/ValidacionFormularioPostventa.js')}}" type="text/javascript"></script>





@endsection