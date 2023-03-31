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
            <form action="" method="POST" id="form1" class="formulario box-body"
                style="border-bottom: 3px solid #3e69d6; padding-top: 15px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="selected_fields" id="selected-fields" />

                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                                id="codigo_tecnico" name="codigo_tecnico"
                                oninput="this.value = this.value.toUpperCase()" required />
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
                                    name="telefono" readonly="true" required />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tecnico">Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" placeholder="Nombre Tecnico" class="form-control" id="tecnico"
                                    name="tecnico" readonly="true" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-3" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" placeholder="DAÑO" value="DAÑO" readonly="true"
                            id="motivo_llamada" name="motivo_llamada"
                            style="color: #3e69d6; background: #fbfbfb; text-align: center;" />
                    </div>
                    <div class="form-group col-md-2" id="tec_input">
                        <label for="tecnologia">Tecnologia</label>
                        <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1"
                            id="tecnologia" aria-hidden="true" required>
                            <option selected="selected" value="">SELECCIONE</option>
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
                            <option value="">SELECCIONE UNA OPCION</option>
                            <option value="TV">TV</option>
                            <option value="LINEA">LINEA</option>
                            <option value="INTERNET">INTERNET</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true" required>
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>

                    <!-- FORMULARIO HFC -->

                    <div id="reparacionesHfc" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionHfc">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionHfc" tabindex="-1" id="TipoActividadReparacionHfc"
                                        aria-hidden="true">
                                        <option selected=" selected">SELECCIONE UNA OPCION</option>
                                        <option value="REALIZADA">REALIZADA</option>
                                        <option value="OBJETADA">OBJETADA</option>
                                        <!-- <option value="ANULACION">ANULACION</option> -->
                                        <option value="TRANSFERIDA" class="ocultar">TRANSFERIDA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC REALIZADA -->

                        <div class="form-group-container box-warning ReparacionHiddenHfc" id="RealizadaReparacionHfc">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva hfc</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="CodigoCausaHfc"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="CodigoCausaHfc"
                                            placeholder="Codigo Causa" name="CodigoCausaHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="btnSearchCausa" class="btn btn btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="btnDeleteCausa" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>



                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="CodigoTipoDañoHfc">Tipo Daño</label>
                                        <select class="form-control " style="width: 100%;" name="CodigoTipoDañoHfc"
                                            tabindex="-1" id="CodigoTipoDañoHfc" aria-hidden="true">
                                            <option select value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-3">
                                        <label for="CodigoUbicacionDañoHfc">Ubicación Daño</label>
                                        <select class="form-control " style="width: 100%;" name="CodigoUbicacionDañoHfc"
                                            tabindex="-1" id="CodigoUbicacionDañoHfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group-container">
                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionCausaDañoHfc">Descripción</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionCausaDañoHfc" tabindex="-1" id="DescripcionCausaDañoHfc"
                                            aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionTipoDañoHfc">Descripción</label>
                                        <select class="form-control " style="width: 100%;" name="DescripcionTipoDañoHfc"
                                            tabindex="-1" id="DescripcionTipoDañoHfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionUbicacionHfc">Descripción</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionUbicacionHfc" tabindex="-1" id="DescripcionUbicacionHfc"
                                            aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengHfc"
                                            placeholder="Ingresa SYRENG" name="syrengHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfc" name="RecibeHfc"
                                            oninput="this.value = this.value.toUpperCase()" />
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
                            </div>
                        </div>
                        <!-- INPUTS HFC OBJETADA -->

                        <div class="form-group-container ReparacionHiddenHfc" id="ObjetadaReparacionHfc">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva hfc</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Hfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
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
                                            name="ComentariosObjetados_Hfc" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC TRANSFERIDA -->

                        <div class="form-group-container ReparacionHiddenHfc" id="TransferidoReparacionHfc">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA hfc</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjCambioCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                                placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentarioAnulada_Hfc">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioAnulada_Hfc">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
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
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- FORMULARIO GPON -->

                    <div id="reparacionesGpon" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionGpon">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionGpon" tabindex="-1"
                                        id="TipoActividadReparacionGpon" aria-hidden="true">
                                        <option selected=" selected">SELECCIONE UNA OPCION</option>
                                        <option value="REALIZADA">REALIZADA</option>
                                        <option value="OBJETADA">OBJETADA</option>
                                        <!-- <option value="ANULACION">ANULACION</option> -->
                                        <option value="TRANSFERIDA" class="ocultar">TRANSFERIDA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS GPON REALIZADA -->

                        <div class="form-group-container box-warning ReparacionHiddenGpon" id="RealizadaReparacionGpon">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva Gpon</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="CodigoCausaGpon"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="CodigoCausaGpon"
                                            placeholder="Codigo Causa" name="CodigoCausaGpon" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="btnSearchCausaGpon" class="btn btn btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="btnDeleteCausaGpon" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>



                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="CodigoTipoDañoGpon">Tipo Daño</label>
                                        <select class="form-control " style="width: 100%;" name="CodigoTipoDañoGpon"
                                            tabindex="-1" id="CodigoTipoDañoGpon" aria-hidden="true">
                                            <option select value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-3">
                                        <label for="CodigoUbicacionDañoGpon">Ubicación Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="CodigoUbicacionDañoGpon" tabindex="-1" id="CodigoUbicacionDañoGpon"
                                            aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group-container">
                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionCausaDañoGpon">Descripción</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionCausaDañoGpon" tabindex="-1" id="DescripcionCausaDañoGpon"
                                            aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionTipoDañoGpon">Descripción</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionTipoDañoGpon" tabindex="-1" id="DescripcionTipoDañoGpon"
                                            aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionUbicacionGpon">Descripción</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionUbicacionGpon" tabindex="-1" id="DescripcionUbicacionGpon"
                                            aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengHfc"
                                            placeholder="Ingresa SYRENG" name="syrengHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfc" name="RecibeHfc"
                                            oninput="this.value = this.value.toUpperCase()" />
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
                            </div>
                        </div>
                        <!-- INPUTS GPON OBJETADA -->


                        <div class="form-group-container ReparacionHiddenGpon" id="ObjetadaReparacionGpon">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva gpon</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Hfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
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
                                            name="ComentariosObjetados_Hfc" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS GPON TRANSFERIDA -->

                        <div class="form-group-container ReparacionHiddenGpon" id="TransferidoReparacionGpon">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA GPON</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjCambioCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                                placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentarioAnulada_Hfc">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioAnulada_Hfc">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
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
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- FORMULARIO DTH -->

                    <div id="reparacionesDth" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionDth">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionDth" tabindex="-1" id="TipoActividadReparacionDth"
                                        aria-hidden="true">
                                        <option selected=" selected">SELECCIONE UNA OPCION</option>
                                        <option value="REALIZADA">REALIZADA</option>
                                        <option value="OBJETADA">OBJETADA</option>
                                        <!-- <option value="ANULACION">ANULACION</option> -->
                                        <option value="TRANSFERIDA" class="ocultar">TRANSFERIDA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS DTH REALIZADA -->

                        <div class="form-group-container box-warning ReparacionHiddenDth" id="RealizadaReparacionDth">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva DTH</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="Codigo Causa" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="" class="btn btn btn-info"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                    <button type="button" id="" class="btn btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Tipo Daño</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-o"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Tipo Daño" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Ubicación Daño</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Ubicación Daño" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengHfc"
                                            placeholder="Ingresa SYRENG" name="syrengHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfc" name="RecibeHfc"
                                            oninput="this.value = this.value.toUpperCase()" />
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
                            </div>
                        </div>
                        <!-- INPUTS DTH OBJETADA -->

                        <div class="form-group-container ReparacionHiddenDth" id="ObjetadaReparacionDth">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva DTH</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Hfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
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
                                            name="ComentariosObjetados_Hfc" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS DTH TRANSFERIDA -->

                        <div class="form-group-container ReparacionHiddenDth" id="TransferidoReparacionDth">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA DTH</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjCambioCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                                placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentarioAnulada_Hfc">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioAnulada_Hfc">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
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
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- FORMULARIO ADSL-->

                    <div id="reparacionesAdsl" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionAdsl">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionAdsl" tabindex="-1"
                                        id="TipoActividadReparacionAdsl" aria-hidden="true">
                                        <option selected=" selected">SELECCIONE UNA OPCION</option>
                                        <option value="REALIZADA">REALIZADA</option>
                                        <option value="OBJETADA">OBJETADA</option>
                                        <!-- <option value="ANULACION">ANULACION</option> -->
                                        <option value="TRANSFERIDA" class="ocultar">TRANSFERIDA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS ADSL REALIZADA -->

                        <div class="form-group-container box-warning ReparacionHiddenAdsl" id="RealizadaReparacionAdsl">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva Adsl</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="Codigo Causa" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="" class="btn btn btn-info"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                    <button type="button" id="" class="btn btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Tipo Daño</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-o"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Tipo Daño" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Ubicación Daño</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Ubicación Daño" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengHfc"
                                            placeholder="Ingresa SYRENG" name="syrengHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfc" name="RecibeHfc"
                                            oninput="this.value = this.value.toUpperCase()" />
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
                            </div>
                        </div>
                        <!-- INPUTS ADSL OBJETADA -->

                        <div class="form-group-container ReparacionHiddenAdsl" id="ObjetadaReparacionAdsl">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva adsl</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Hfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
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
                                            name="ComentariosObjetados_Hfc" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS ADSL TRANSFERIDA -->

                        <div class="form-group-container ReparacionHiddenAdsl" id="TransferidoReparacionAdsl">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA Adsl</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjCambioCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                                placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentarioAnulada_Hfc">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioAnulada_Hfc">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FORMULARIO COBRE-->

                    <div id="reparacionesCobre" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionCobre">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionCobre" tabindex="-1"
                                        id="TipoActividadReparacionCobre" aria-hidden="true">
                                        <option selected=" selected">SELECCIONE UNA OPCION</option>
                                        <option value="REALIZADA">REALIZADA</option>
                                        <option value="OBJETADA">OBJETADA</option>
                                        <!-- <option value="ANULACION">ANULACION</option> -->
                                        <option value="TRANSFERIDA" class="ocultar">TRANSFERIDA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS COBRE REALIZADA -->

                        <div class="form-group-container box-warning ReparacionHiddenCobre"
                            id="RealizadaReparacionCobre">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva COBRE</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="Codigo Causa" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="" class="btn btn btn-info"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                    <button type="button" id="" class="btn btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Tipo Daño</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-o"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Tipo Daño" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Ubicación Daño</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Ubicación Daño" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="OrdenObjCambioCobre"> Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            readonly="true" placeholder="Descripción del daño"
                                            name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                            placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengHfc"
                                            placeholder="Ingresa SYRENG" name="syrengHfc" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfc" name="RecibeHfc"
                                            oninput="this.value = this.value.toUpperCase()" />
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
                            </div>
                        </div>
                        <!-- INPUTS COBRE OBJETADA -->

                        <div class="form-group-container ReparacionHiddenCobre" id="ObjetadaReparacionCobre">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva cobre</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Hfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjCambioCobre"> Orden </label>
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
                                            name="ComentariosObjetados_Hfc" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS COBRE TRANSFERIDA -->

                        <div class="form-group-container ReparacionHiddenCobre" id="TransferidoReparacionCobre">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA COBRE</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjCambioCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                                placeholder="N° Orden" name="OrdenObjCambioCobre" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentarioAnulada_Hfc">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioAnulada_Hfc">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                                name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" />
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
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="box-footer" id="btn-submitForm"
                    style="text-align: center; display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"
                            style="padding-right: 8px;"></i>GUARDAR REGISTRO</button>
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
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("form1");
    const selectedFieldsInput = document.querySelector("#selected-fields");
    const inputs = form.querySelectorAll('input[type="text"], input[type="number"], input[type="checkbox"]');

    let selectedFields = [];

    inputs.forEach((input) => {
        input.addEventListener("change", () => {
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
document.addEventListener("DOMContentLoaded", function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(function(checkbox) {
        actualizarTextoCheckbox(checkbox);

        checkbox.addEventListener("change", function() {
            actualizarTextoCheckbox(checkbox);
        });
    });

    function actualizarTextoCheckbox(checkbox) {
        if (checkbox.checked) {
            checkbox.value = "TRABAJADO";
        } else {
            checkbox.value = "PENDIENTE";
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
<!-- <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script> -->
<script src="{{asset('/js/reparaciones/reparacionesSelect.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/ValoresTecnico.js')}}" type="text/javascript"></script>

<!-- <script src="{{asset('/js/instalaciones/ValidacionFormulario.js')}}" type="text/javascript"></script> -->
<script src="{{asset('/js/reparaciones/fetchReparaciones.js')}}" type="text/javascript"></script>


@endsection