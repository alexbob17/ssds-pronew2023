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
        <div class="box box-warning" style="border-top:none !important">
            <div class="box-header with-border" style=" background: rgba(255, 255, 255, 0.15) !important;
            border-bottom: 0.1px solid #337ab7;
            color: #337ab7 !important;
            border-top: 1px solid white;">
                <h3 class="box-title">Editar Caso</h3>
            </div>
            <!-- FORMULARIO #1 INICIAL CAMPOS NECESARIOS -->
            <form action="{{ route('actualizarDatosReparaciones', $registro->id) }}" method="POST" id="form1"
                class="formulario box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="selected_fields" id="selected-fields" />

                <input type="hidden" name="_method" value="PUT">

                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                                id="codigo_tecnico" name="codigo_tecnico"
                                oninput="this.value = this.value.toUpperCase()" required
                                value="{{ $registro->codigo_tecnico}}" autocomplete="off" />
                        </div>
                    </div>


                    <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                        <button type="button" id="btn_busqueda" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                        <button type="button" id="btn_clean" class="btn btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>

                        <input type="hidden" id="btn_reiniciar">
                    </div>

                    <div class="form-group">
                        <div class="form-group col-md-2">
                            <label for="telefono">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <input type="text" placeholder="Numero" class="form-control" id="telefono"
                                    name="telefono" readonly="true" required autocomplete="off"
                                    value="{{ $registro->telefono}}" />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tecnico">Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" placeholder="Nombre Tecnico" class="form-control" id="tecnico"
                                    name="tecnico" readonly="true" required autocomplete="off"
                                    value="{{ $registro->tecnico}}" />
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
                            <option selected="selected" value="{{ $registro->tecnologia}}">{{ $registro->tecnologia}}
                            </option>

                        </select>
                    </div>
                    <div class="form-group col-md-3" id="select_ordenhide">
                        <label for="select_orden">Tipo Orden</label>
                        <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden"
                            tabindex="-1" aria-hidden="true" required>


                            @if ($registro->tecnologia === 'HFC')
                            <option value="{{ $registro->select_orden}}">{{ $registro->select_orden}}</option>
                            <option value="TV">TV</option>
                            <option value="LINEA">LINEA</option>
                            <option value="INTERNET">INTERNET</option>
                            @endif

                            @if ($registro->tecnologia === 'GPON')
                            <option value="{{ $registro->select_orden}}">{{ $registro->select_orden}}</option>
                            <option value="TV">TV</option>
                            <option value="LINEA">LINEA</option>
                            <option value="INTERNET">INTERNET</option>
                            @endif

                            @if ($registro->tecnologia === 'DTH')
                            <option value="{{ $registro->select_orden}}">{{ $registro->select_orden}}</option>
                            @endif

                            @if ($registro->tecnologia === 'ADSL')
                            <option value="{{ $registro->select_orden}}">{{ $registro->select_orden}}</option>
                            @endif

                            @if ($registro->tecnologia === 'COBRE')
                            <option value="{{ $registro->select_orden}}">{{ $registro->select_orden}}</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true" required>
                            <option value="{{ $registro->dpto_colonia}}">{{ $registro->dpto_colonia}}</option>
                        </select>
                    </div>

                    <!-- FORMULARIO HFC -->

                    @if ($registro->tecnologia === 'HFC')

                    <div id=" reparacionesHfc" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionHfc">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionHfc" tabindex="-1" id="TipoActividadReparacionHfc"
                                        aria-hidden="true">
                                        <option selected="selected" value="{{ $registro->TipoActividadReparacionHfc}}">
                                            {{ $registro->TipoActividadReparacionHfc}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC REALIZADA -->

                        @if ($registro->TipoActividadReparacionHfc === 'REALIZADA')

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
                                            placeholder="Codigo Causa" name="CodigoCausaHfc" autocomplete="off"
                                            value="{{ $registro->CodigoCausaHfc}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="btnSearchCausa" class="btn btn btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="btnDeleteCausa" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>


                            </div>
                            <div class="form-group-container">
                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionCausaDañoHfc">Tipo Causa</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionCausaDañoHfc" tabindex="-1" id="DescripcionCausaDañoHfc"
                                            aria-hidden="true">
                                            <option value="{{ $registro->DescripcionCausaDañoHfc}}">
                                                {{ $registro->DescripcionCausaDañoHfc}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionTipoDañoHfc">Tipo Daño</label>
                                        <select class="form-control " style="width: 100%;" name="DescripcionTipoDañoHfc"
                                            tabindex="-1" id="DescripcionTipoDañoHfc" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionTipoDañoHfc}}">
                                                {{ $registro->DescripcionTipoDañoHfc}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionUbicacionHfc">Ubicacion Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionUbicacionHfc" tabindex="-1" id="DescripcionUbicacionHfc"
                                            aria-hidden="true">
                                            <option value="{{ $registro->DescripcionUbicacionHfc}}">
                                                {{ $registro->DescripcionUbicacionHfc}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenHfc"
                                            value="{{ $registro->OrdenHfc}}" placeholder="N° Orden" name="OrdenHfc"
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengHfc"
                                            placeholder="Ingresa SYRENG" name="syrengHfc"
                                            value="{{ $registro->syrengHfc}}" autocomplete="off" />
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
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObservacionesHfc}}" />
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
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeHfc}}" />
                                    </div>
                                </div>

                                <div class="from-group col-md-3">
                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoHfcRealizado" name="TrabajadoHfcRealizado"
                                                    {{ $registro->TrabajadoHfcRealizado === 'TRABAJADO' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="TrabajadoHfcRealizado">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif
                        <!-- INPUTS HFC OBJETADA -->

                        @if ($registro->TipoActividadReparacionHfc === 'OBJETADA')

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
                                            <option value="{{ $registro->MotivoObjetada_Hfc}}">
                                                {{ $registro->MotivoObjetada_Hfc}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO
                                                EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS
                                                EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON
                                                DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA /
                                                PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjHfc"
                                            placeholder="N° Orden" name="OrdenObjHfc"
                                            value="{{ $registro->OrdenObjHfc}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoReparacionesObjetadaHfc"
                                                name="TrabajadoReparacionesObjetadaHfc"
                                                {{ $registro->TrabajadoReparacionesObjetadaHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentariosObjetados_Hfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

                        <!-- INPUTS HFC TRANSFERIDA -->

                        @if ($registro->TipoActividadReparacionHfc === 'TRANSFERIDA')

                        <div class="form-group-container ReparacionHiddenHfc" id="TransferidoReparacionHfc">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA hfc</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTransfHfc"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTransfHfc"
                                                placeholder="N° Orden" name="OrdenTransfHfc"
                                                value="{{ $registro->OrdenTransfHfc}}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsTransfHfc">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsTransfHfc"
                                                name="ObvsTransfHfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsTransfHfc}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioTransfHfc">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioTransfHfc"
                                                name="ComentarioTransfHfc" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentarioTransfHfc}}" />
                                        </div>
                                    </div>

                                    <div class="from-group col-md-3">
                                        <div class="from-group-container">
                                            <div class="form-group col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="TrabajadoTransfHfc" name="TrabajadoTransfHfc"
                                                        {{ $registro->TrabajadoTransfHfc === 'TRABAJADO' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="TrabajadoTransfHfc">
                                                        Trabajado
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>
                    @endif

                    <!-- FORMULARIO GPON -->
                    @if ($registro->tecnologia === 'GPON')

                    <div id="reparacionesGpon" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionGpon">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionGpon" tabindex="-1"
                                        id="TipoActividadReparacionGpon" aria-hidden="true">
                                        <option selected=" selected"
                                            value="{{ $registro->TipoActividadReparacionGpon}}">
                                            {{ $registro->TipoActividadReparacionGpon}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS GPON REALIZADA -->
                        @if ($registro->TipoActividadReparacionGpon === 'REALIZADA')
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
                                            placeholder="Codigo Causa" name="CodigoCausaGpon" autocomplete="off"
                                            value="{{ $registro->CodigoCausaGpon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="btnSearchCausaGpon" class="btn btn btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="btnDeleteCausaGpon" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>


                            </div>

                            <div class="form-group-container">
                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionCausaDañoGpon">Tipo Causa</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionCausaDañoGpon" tabindex="-1" id="DescripcionCausaDañoGpon"
                                            aria-hidden="true">
                                            <option value="{{ $registro->DescripcionCausaDañoGpon}}">
                                                {{ $registro->DescripcionCausaDañoGpon}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionTipoDañoGpon">Tipo Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionTipoDañoGpon" tabindex="-1" id="DescripcionTipoDañoGpon"
                                            aria-hidden="true">
                                            <option value="{{ $registro->DescripcionTipoDañoGpon}}">
                                                {{ $registro->DescripcionTipoDañoGpon}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionUbicacionGpon">Ubicacion Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionUbicacionGpon" tabindex="-1" id="DescripcionUbicacionGpon"
                                            aria-hidden="true">
                                            <option value="{{ $registro->DescripcionUbicacionGpon}}">
                                                {{ $registro->DescripcionUbicacionGpon}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenRealizadoGpon"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenRealizadoGpon"
                                            placeholder="N° Orden" name="OrdenRealizadoGpon"
                                            value="{{ $registro->OrdenRealizadoGpon}}" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengGpon">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengGpon"
                                            placeholder="Ingresa SYRENG" name="syrengGpon" autocomplete="off"
                                            value="{{ $registro->syrengGpon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesGpon">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesGpon"
                                            name="ObservacionesGpon" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObservacionesGpon}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeGpon">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeGpon" name="RecibeGpon"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeGpon}}" />
                                    </div>
                                </div>

                                <div class="from-group col-md-3">
                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoReparacionesGpon" name="TrabajadoReparacionesGpon"
                                                    {{ $registro->TrabajadoReparacionesGpon === 'TRABAJADO' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="TrabajadoReparacionesGpon">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INPUTS GPON OBJETADA -->
                        @endif

                        @if ($registro->TipoActividadReparacionGpon === 'OBJETADA')
                        <div class="form-group-container ReparacionHiddenGpon" id="ObjetadaReparacionGpon">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva gpon</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Gpon">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Gpon" tabindex="-1"
                                            id="MotivoObjetada_Gpon" aria-hidden="true">
                                            <option value="{{ $registro->MotivoObjetada_Gpon}}">
                                                {{ $registro->MotivoObjetada_Gpon}}</option>
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
                                    <label for="OrdenObjGpon"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjGpon"
                                            placeholder="N° Orden" name="OrdenObjGpon"
                                            value="{{ $registro->OrdenObjGpon}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObjetadaGpon"
                                                name="TrabajadoObjetadaGpon"
                                                {{ $registro->TrabajadoObjetadaGpon === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosObjGpon">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosObjGpon"
                                            name="ComentariosObjGpon" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentariosObjGpon}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- INPUTS GPON TRANSFERIDA -->
                        @if ($registro->TipoActividadReparacionGpon === 'TRANSFERIDA')
                        <div class="form-group-container ReparacionHiddenGpon" id="TransferidoReparacionGpon">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA GPON</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTransGpon"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTransGpon"
                                                placeholder="N° Orden" value="{{ $registro->OrdenTransGpon}}"
                                                name="OrdenTransGpon" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsTransfGpon">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsTransfGpon"
                                                name="ObvsTransfGpon" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsTransfGpon}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioTransfGpon">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioTransfGpon"
                                                name="ComentarioTransfGpon" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentarioTransfGpon}}" />
                                        </div>
                                    </div>

                                    <div class="from-group col-md-3">
                                        <div class="from-group-container">
                                            <div class="form-group col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="TrabajadoTransfGpon" name="TrabajadoTransfGpon"
                                                        {{ $registro->TrabajadoTransfGpon === 'TRABAJADO' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="TrabajadoTransfGpon">
                                                        Trabajado
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    @endif

                    <!-- FORMULARIO DTH -->

                    @if ($registro->tecnologia === 'DTH')

                    <div id="reparacionesDth" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionDth">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionDth" tabindex="-1" id="TipoActividadReparacionDth"
                                        aria-hidden="true">
                                        <option selected=" selected" value="{{ $registro->TipoActividadReparacionDth}}">
                                            {{ $registro->TipoActividadReparacionDth}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS DTH REALIZADA -->
                        @if ($registro->TipoActividadReparacionDth === 'REALIZADA')
                        <div class="form-group-container box-warning ReparacionHiddenDth" id="RealizadaReparacionDth">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva DTH</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="CodigoCausaDth"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="CodigoCausaDth"
                                            placeholder="Codigo Causa" name="CodigoCausaDth"
                                            value="{{ $registro->CodigoCausaDth}}" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="btnSearchCausaDth" class="btn btn btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="btnDeleteCausaDth" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>

                            </div>

                            <div class="form-group-container">
                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionCausaDth">Tipo Causa</label>
                                        <select class="form-control " style="width: 100%;" name="DescripcionCausaDth"
                                            tabindex="-1" id="DescripcionCausaDth" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionCausaDth}}">
                                                {{ $registro->DescripcionCausaDth}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionTipoDañoDth">Tipo Daño</label>
                                        <select class="form-control " style="width: 100%;" name="DescripcionTipoDañoDth"
                                            tabindex="-1" id="DescripcionTipoDañoDth" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionTipoDañoDth}}">
                                                {{ $registro->DescripcionTipoDañoDth}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionUbicacionDañoDth">Ubicacion Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionUbicacionDañoDth" tabindex="-1"
                                            id="DescripcionUbicacionDañoDth" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionUbicacionDañoDth}}">
                                                {{ $registro->DescripcionUbicacionDañoDth}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenDthRealizada"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenDthRealizada"
                                            placeholder="N° Orden" name="OrdenDthRealizada"
                                            value="{{ $registro->OrdenDthRealizada}}" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengDthRealizado">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengDthRealizado"
                                            placeholder="Ingresa SYRENG" value="{{ $registro->syrengDthRealizado}}"
                                            name="syrengDthRealizado" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesDth">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesDth"
                                            name="ObservacionesDth" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObservacionesDth}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeDth">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeDth" name="RecibeDth"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeDth}}" />
                                    </div>
                                </div>

                                <div class="from-group col-md-3">
                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="TrabajadoDth"
                                                    name="TrabajadoDth"
                                                    {{ $registro->TrabajadoDth === 'TRABAJADO' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="TrabajadoDth">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INPUTS DTH OBJETADA -->
                        @endif

                        @if ($registro->TipoActividadReparacionDth === 'OBJETADA')
                        <div class="form-group-container ReparacionHiddenDth" id="ObjetadaReparacionDth">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva DTH</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Dth">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Dth" tabindex="-1"
                                            id="MotivoObjetada_Dth" aria-hidden="true">
                                            <option value="{{ $registro->MotivoObjetada_Dth}}">
                                                {{ $registro->MotivoObjetada_Dth}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN
                                                SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN
                                                SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA
                                                ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjDth"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjDth"
                                            placeholder="N° Orden" name="OrdenObjDth"
                                            value="{{ $registro->OrdenObjDth}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObjetadaDth"
                                                name="TrabajadoObjetadaDth"
                                                {{ $registro->TrabajadoObjetadaDth === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosObjetadosDth">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosObjetadosDth"
                                            name="ComentariosObjetadosDth" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()"
                                            value="{{ $registro->ComentariosObjetadosDth}}" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadReparacionDth === 'TRANSFERIDA')
                        <!-- INPUTS DTH TRANSFERIDA -->
                        <div class="form-group-container ReparacionHiddenDth" id="TransferidoReparacionDth">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA DTH</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTransferidoDth"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTransferidoDth"
                                                placeholder="N° Orden" name="OrdenTransferidoDth"
                                                value="{{ $registro->OrdenTransferidoDth}}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsTransferidoDth">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsTransferidoDth"
                                                name="ObvsTransferidoDth" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()"
                                                value="{{ $registro->ObvsTransferidoDth}}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioTransferidoDth">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioTransferidoDth"
                                                name="ComentarioTransferidoDth"
                                                placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()"
                                                value="{{ $registro->ComentarioTransferidoDth}}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="from-group col-md-3">
                                        <div class="from-group-container">
                                            <div class="form-group col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="TrabajadoTransferidoDth" name="TrabajadoTransferidoDth"
                                                        {{ $registro->TrabajadoTransferidoDth === 'TRABAJADO' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="TrabajadoTransferidoDth">
                                                        Trabajado
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- FORMULARIO ADSL-->

                    @if ($registro->tecnologia === 'ADSL')

                    <div id="reparacionesAdsl" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionAdsl">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionAdsl" tabindex="-1"
                                        id="TipoActividadReparacionAdsl" aria-hidden="true">
                                        <option selected="selected" value="{{ $registro->TipoActividadReparacionAdsl}}">
                                            {{ $registro->TipoActividadReparacionAdsl}}</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS ADSL REALIZADA -->
                        @if ($registro->TipoActividadReparacionAdsl === 'REALIZADA')

                        <div class="form-group-container box-warning ReparacionHiddenAdsl" id="RealizadaReparacionAdsl">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva Adsl</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="CodigoCausaAdsl"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="CodigoCausaAdsl"
                                            placeholder="Codigo Causa" name="CodigoCausaAdsl" autocomplete="off"
                                            value="{{ $registro->CodigoCausaAdsl}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="btnSearchCausaAdsl" class="btn btn btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="btnDeleteCausaAdsl" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionCausaAdsl">Tipo Causa</label>
                                        <select class="form-control " style="width: 100%;" name="DescripcionCausaAdsl"
                                            tabindex="-1" id="DescripcionCausaAdsl" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionCausaAdsl}}">
                                                {{ $registro->DescripcionCausaAdsl}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionTipoDañoAdsl">Tipo Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionTipoDañoAdsl" tabindex="-1" id="DescripcionTipoDañoAdsl"
                                            aria-hidden="true">
                                            <option value="{{ $registro->DescripcionTipoDañoAdsl}}">
                                                {{ $registro->DescripcionTipoDañoAdsl}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionUbicacionDañoAdsl">Ubicacion Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionUbicacionDañoAdsl" tabindex="-1"
                                            id="DescripcionUbicacionDañoAdsl" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionUbicacionDañoAdsl}}">
                                                {{ $registro->DescripcionUbicacionDañoAdsl}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenAdslRealizado"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenAdslRealizado"
                                            placeholder="N° Orden" value="{{ $registro->OrdenAdslRealizado}}"
                                            name="OrdenAdslRealizado" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengAdsl">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengAdsl"
                                            placeholder="Ingresa SYRENG" value="{{ $registro->syrengAdsl}}"
                                            name="syrengAdsl" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesAdsl">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesAdsl"
                                            name="ObservacionesAdsl" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObservacionesAdsl}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeAdsl">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeAdsl" name="RecibeAdsl"
                                            oninput="this.value = this.value.toUpperCase()"
                                            value="{{ $registro->RecibeAdsl}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group col-md-3">
                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoReparacionAdsl" name="TrabajadoReparacionAdsl"
                                                    {{ $registro->TrabajadoReparacionAdsl === 'TRABAJADO' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="TrabajadoReparacionAdsl">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INPUTS ADSL OBJETADA -->
                        @endif

                        @if ($registro->TipoActividadReparacionAdsl === 'OBJETADA')
                        <div class="form-group-container ReparacionHiddenAdsl" id="ObjetadaReparacionAdsl">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva adsl</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Adsl">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Adsl" tabindex="-1"
                                            id="MotivoObjetada_Adsl" aria-hidden="true">
                                            <option value="{{ $registro->MotivoObjetada_Adsl}}">
                                                {{ $registro->MotivoObjetada_Adsl}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO
                                                EN
                                                SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS
                                                EN
                                                SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON
                                                DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA /
                                                PROGRAMA
                                                ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjAdsl"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjAdsl"
                                            placeholder="N° Orden" name="OrdenObjAdsl"
                                            value="{{ $registro->OrdenObjAdsl}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObjetadaAdsl"
                                                name="TrabajadoObjetadaAdsl"
                                                {{ $registro->TrabajadoObjetadaAdsl === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentsObjAdsl">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentsObjAdsl"
                                            name="ComentsObjAdsl" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()"
                                            value="{{ $registro->ComentsObjAdsl}}" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- INPUTS ADSL TRANSFERIDA -->
                        @if ($registro->TipoActividadReparacionAdsl === 'TRANSFERIDA')
                        <div class="form-group-container ReparacionHiddenAdsl" id="TransferidoReparacionAdsl">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA Adsl</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTransferidoAdsl"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTransferidoAdsl"
                                                placeholder="N° Orden" name="OrdenTransferidoAdsl" autocomplete="off"
                                                value="{{ $registro->OrdenTransferidoAdsl}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsAdslTransferido">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsAdslTransferido"
                                                name="ObvsAdslTransferido" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsAdslTransferido}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentsTransferidoAdsl">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsTransferidoAdsl"
                                                name="ComentsTransferidoAdsl" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentsTransferidoAdsl}}" />
                                        </div>
                                    </div>

                                    <div class="from-group col-md-3">
                                        <div class="from-group-container">
                                            <div class="form-group col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="TrabajadoTransferidoAdsl" name="TrabajadoTransferidoAdsl"
                                                        {{ $registro->TrabajadoTransferidoAdsl === 'TRABAJADO' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="TrabajadoTransferidoAdsl">
                                                        Trabajado
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    @endif

                    <!-- FORMULARIO COBRE-->

                    @if ($registro->tecnologia === 'COBRE')

                    <div id="reparacionesCobre" class="form-group-container">
                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 1rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionCobre">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionCobre" tabindex="-1"
                                        id="TipoActividadReparacionCobre" aria-hidden="true">
                                        <option selected=" selected"
                                            value="{{ $registro->TipoActividadReparacionCobre}}">
                                            {{ $registro->TipoActividadReparacionCobre}}
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS COBRE REALIZADA -->
                        @if ($registro->TipoActividadReparacionCobre === 'REALIZADA')
                        <div class="form-group-container box-warning ReparacionHiddenCobre"
                            id="RealizadaReparacionCobre">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva Cobre</h4>

                            <div class="form-group-container" style="border-top: 1px solid
                                #d4d1d1;padding-top:2.5rem">
                                <div class="form-group col-md-3">
                                    <label for="CodigoCausaCobre"> Codigo Causa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="number" class="form-control" id="CodigoCausaCobre"
                                            placeholder="Codigo Causa" value="{{ $registro->CodigoCausaCobre}}"
                                            name="CodigoCausaCobre" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                                    <button type="button" id="btnSearchCausaCobre" class="btn btn btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="btnDeleteCausaCobre" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionCausaCobre">Tipo Causa</label>
                                        <select class="form-control " style="width: 100%;" name="DescripcionCausaCobre"
                                            tabindex="-1" id="DescripcionCausaCobre" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionCausaCobre}}">
                                                {{ $registro->DescripcionCausaCobre}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionTipoDañoCobre">Tipo Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionTipoDañoCobre" tabindex="-1" id="DescripcionTipoDañoCobre"
                                            aria-hidden="true">
                                            <option value="{{ $registro->DescripcionTipoDañoCobre}}">
                                                {{ $registro->DescripcionTipoDañoCobre}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="TipoActividad_Hidden">
                                    <div class="form-group col-md-4">
                                        <label for="DescripcionUbicacionDañoCobre">Ubicacion Daño</label>
                                        <select class="form-control " style="width: 100%;"
                                            name="DescripcionUbicacionDañoCobre" tabindex="-1"
                                            id="DescripcionUbicacionDañoCobre" aria-hidden="true">
                                            <option value="{{ $registro->DescripcionUbicacionDañoCobre}}">
                                                {{ $registro->DescripcionUbicacionDañoCobre}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="OrdenReparacionCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenReparacionCobre"
                                            placeholder="N° Orden" value="{{ $registro->OrdenReparacionCobre}}"
                                            name="OrdenReparacionCobre" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 1.5rem;">
                                    <label for="syrengReparacionCobre">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="syrengReparacionCobre"
                                            placeholder="Ingresa SYRENG" value="{{ $registro->syrengReparacionCobre}}"
                                            name="syrengReparacionCobre" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesCobre">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesCobre"
                                            name="ObservacionesCobre" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObservacionesCobre}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="RecibeCobre">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeCobre" name="RecibeCobre"
                                            oninput="this.value = this.value.toUpperCase()"
                                            value="{{ $registro->RecibeCobre}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group col-md-3">
                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoReparacionCobre" name="TrabajadoReparacionCobre"
                                                    {{ $registro->TrabajadoReparacionCobre === 'TRABAJADO' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="TrabajadoReparacionCobre">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INPUTS COBRE OBJETADA -->
                        @endif

                        @if ($registro->TipoActividadReparacionCobre === 'OBJETADA')
                        <div class="form-group-container ReparacionHiddenCobre" id="ObjetadaReparacionCobre">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.3rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                Reparacion Servicios Efectiva cobre</h4>
                            <div class="from-group-container" style="border-top:1px solid #d8d1d1">
                                <div class="from-group-container" style="margin-top:1.5rem">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Cobre">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Cobre" tabindex="-1"
                                            id="MotivoObjetada_Cobre" aria-hidden="true">
                                            <option value="{{ $registro->MotivoObjetada_Cobre}}">
                                                {{ $registro->MotivoObjetada_Cobre}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO
                                                EN
                                                SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS
                                                EN
                                                SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON
                                                DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA /
                                                PROGRAMA
                                                ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenObjReparacionCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenObjReparacionCobre"
                                            placeholder="N° Orden" value="{{ $registro->OrdenObjReparacionCobre}}"
                                            name="OrdenObjReparacionCobre" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObjetadaCobre"
                                                name="TrabajadoObjetadaCobre"
                                                {{ $registro->TrabajadoObjetadaCobre === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosObjetados_Cobre">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosObjetados_Cobre"
                                            name="ComentariosObjetados_Cobre" placeholder="Comentarios del caso"
                                            value="{{ $registro->ComentariosObjetados_Cobre}}"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- INPUTS COBRE TRANSFERIDA -->
                        @if ($registro->TipoActividadReparacionCobre === 'TRANSFERIDA')
                        <div class="form-group-container ReparacionHiddenCobre" id="TransferidoReparacionCobre">
                            <h4
                                style="color: #3e69d6;margin-bottom: 1.5rem;text-transform: uppercase;display: flex;font-weight: bold; justify-content: center;">
                                REPARACION DE SERVICIOS TRANSFERENCIA COBRE</h4>

                            <div class="form-group-container" style="margin-top: 2rem; border-top: 1px solid #d5d2d2;">

                                <div class="form-group-container" style="padding-top:2rem">
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTransfCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTransfCobre"
                                                placeholder="N° Orden" value="{{ $registro->OrdenTransfCobre}}"
                                                name="OrdenTransfCobre" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObvsCobreTransferido">
                                            Observaciones
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObvsCobreTransferido"
                                                name="ObvsCobreTransferido" placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsCobreTransferido}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="ComentarioCobreTransferido">
                                            Comentarios
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentarioCobreTransferido"
                                                name="ComentarioCobreTransferido"
                                                placeholder="Ingresa comentarios del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentarioCobreTransferido}}" />
                                        </div>
                                    </div>

                                    <div class="from-group col-md-3">
                                        <div class="from-group-container">
                                            <div class="form-group col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="TrabajadoCobreTransferido" name="TrabajadoCobreTransferido"
                                                        {{ $registro->TrabajadoCobreTransferido === 'TRABAJADO' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="TrabajadoCobreTransferido">
                                                        Trabajado
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    @endif
                </div>

                <div class="box-footer" id="btn-submitForm"
                    style="text-align: center; display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"
                            style="padding-right: 8px;"></i>ACTUALIZAR REGISTRO</button>
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
}); //
window.location = window.location;
</script>
@endif
@endsection @section('styles')

<!-- SweetAlert -->
<link href="{{ asset('/plugins/CdnMigraciones/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('/plugins/CdnMigraciones/sweetalert2.all.min.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("form1");
    const selectedFieldsInput = document.querySelector(
        "#selected-fields");
    const inputs = form.querySelectorAll(
        'input[type="text"], input[type="number"], input[type="checkbox"]'
    );

    let selectedFields = [];

    inputs.forEach((input) => {
        input.addEventListener("change", () => {
            if (input.checked) {
                selectedFields.push(input.name);
            } else {
                const index = selectedFields.indexOf(
                    input.name);
                if (index !== -1) {
                    selectedFields.splice(index, 1);
                }
            }
            selectedFieldsInput.value = JSON.stringify(
                selectedFields);
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var checkboxes = document.querySelectorAll(
        'input[type="checkbox"]');

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
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript">
</script>
<!-- InputMask -->
<script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<!-- boostrap-fileinput -->
<script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript"></script>
<!-- User definided -->

<script src="{{asset('/js/actualizarDatos/ValidacionTecnico.js')}}" type="text/javascript"></script>

<!-- <script src="{{asset('/js/reparaciones/ValidacionFormDaño.js')}}" type="text/javascript"></script> -->

<!-- <script src="{{asset('/js/reparaciones/fetchReparaciones.js')}}" type="text/javascript"></script> -->


@if($registro->tecnologia === 'HFC' && $registro->TipoActividadReparacionHfc === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/HFC/ReparacionesHfc.js')}}" type="text/javascript">
</script>
<script src="{{asset('/js/actualizarDatos/reparaciones/HFC/fetchHfc.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'HFC' && $registro->TipoActividadReparacionHfc === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/HFC/ReparacionesHfcObj.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'HFC' && $registro->TipoActividadReparacionHfc === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/reparaciones/HFC/ReparacionesHfcTrans.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'GPON' && $registro->TipoActividadReparacionGpon === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/GPON/ReparacionesGpon.js')}}" type="text/javascript">
</script>
<script src="{{asset('/js/actualizarDatos/reparaciones/GPON/fecthGpon.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'GPON' && $registro->TipoActividadReparacionGpon === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/GPON/ReparacionesGponObj.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'GPON' && $registro->TipoActividadReparacionGpon === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/GPON/ReparacionesGponObj.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'GPON' && $registro->TipoActividadReparacionGpon === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/reparaciones/GPON/ReparacionesGponTrans.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'DTH' && $registro->TipoActividadReparacionDth === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/DTH/ReparacionesDth.js')}}" type="text/javascript">
</script>
<script src="{{asset('/js/actualizarDatos/reparaciones/DTH/FetchDth.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'DTH' && $registro->TipoActividadReparacionDth === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/DTH/ReparacionesDthObj.js')}}" type="text/javascript">
</script>
@endif


@if($registro->tecnologia === 'DTH' && $registro->TipoActividadReparacionDth === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/reparaciones/DTH/ReparacionesDthTrans.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'COBRE' && $registro->TipoActividadReparacionCobre === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/COBRE/ReparacionesCobre.js')}}" type="text/javascript">
</script>
<script src="{{asset('/js/actualizarDatos/reparaciones/COBRE/FetchCobre.js')}}" type="text/javascript">
</script>
@endif


@if($registro->tecnologia === 'COBRE' && $registro->TipoActividadReparacionCobre === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/COBRE/ReparacionesCobreObj.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'COBRE' && $registro->TipoActividadReparacionCobre === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/reparaciones/COBRE/ReparacionesCobreTrans.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'ADSL' && $registro->TipoActividadReparacionAdsl === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/ADSL/ReparacionesAdsl.js')}}" type="text/javascript">
</script>
<script src="{{asset('/js/actualizarDatos/reparaciones/ADSL/FetchAdsl.js')}}" type="text/javascript">
</script>
@endif


@if($registro->tecnologia === 'ADSL' && $registro->TipoActividadReparacionAdsl === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/reparaciones/ADSL/ReparacionesAdslObj.js')}}" type="text/javascript">
</script>
@endif

@if($registro->tecnologia === 'ADSL' && $registro->TipoActividadReparacionAdsl === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/reparaciones/ADSL/ReparacionesAdslTrans.js')}}" type="text/javascript">
</script>
@endif

@endsection