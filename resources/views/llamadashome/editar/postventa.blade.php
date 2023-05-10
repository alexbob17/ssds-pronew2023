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
            <!-- FORMULARIO #1 POSTVENTAS -->

            <form action="{{ route('actualizarDatosPostventa', $registro->id) }}" method="POST" id="form1">
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
                                oninput="this.value = this.value.toUpperCase()" required autocomplete="off"
                                value="{{ $registro->codigo_tecnico}}" />
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
                    <div class="form-group col-md-2" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" placeholder="POSTVENTA" value="POSTVENTA"
                            readonly="true" id="motivo_llamada" name="motivo_llamada"
                            style="color: #3e69d6; background: white; text-align: center;" />
                    </div>
                    <div class="form-group col-md-3" id="select_ordenhide">
                        <label for="Select_Postventa">TIPO POSTVENTA</label>
                        <select class="form-control" id="Select_Postventa" style="width: 100%;" name="Select_Postventa"
                            tabindex="-1" aria-hidden="true" required>
                            <option selected="selected" value="{{ $registro->Select_Postventa}}">
                                {{ $registro->Select_Postventa}}
                            </option>

                        </select>
                    </div>
                    <div class="form-group col-md-2" id="tec_input">
                        <label for="tecnologia">Tecnologia</label>
                        <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1"
                            id="tecnologia" aria-hidden="true" required>
                            <option value="{{ $registro->tecnologia}}" selected="selected">{{ $registro->tecnologia}}
                            </option>

                        </select>
                    </div>

                    <div class="form-group col-md-2" id="select_ordenhide">
                        <label for="select_orden">Tipo Orden</label>
                        <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden"
                            tabindex="-1" aria-hidden="true" required>
                            <option selected="selected" value="{{ $registro->select_orden}}">
                                {{ $registro->select_orden}}
                            </option>
                            @if ($registro->Select_Postventa === 'RECONEXION / RETIRO' && $registro->tecnologia
                            === 'HFC')
                            <option value="RECONEXION">RECONEXION</option>
                            <option value="RETIRO ACOMETIDO">RETIRO ACOMETIDO</option>
                            <option value="RETIRO EQUIPOS STB">RETIRO EQUIPOS STB</option>
                            <option value="RETIRO CM">RETIRO CM</option>
                            @endif

                            @if ($registro->Select_Postventa === 'MIGRACION' && $registro->tecnologia
                            === 'HFC')
                            <option value="MIGRACION DTA">MIGRACION DTA</option>
                            <option value="MIGRACION DIG">MIGRACION DIG</option>
                            <option value="MIGRACION X PROYECTO">MIGRACION X PROYECTO</option>
                            @endif

                            @if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia
                            === 'GPON')
                            <option value="CAMBIO EQUIPO TV">CAMBIO EQUIPO TV</option>
                            <option value="CAMBIO EQUIPO INTERNET">CAMBIO EQUIPO INTERNET</option>
                            @endif

                            @if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia
                            === 'HFC')
                            <option value="CAMBIO EQUIPO TV">CAMBIO EQUIPO TV</option>
                            <option value="CAMBIO EQUIPO INTERNET">CAMBIO EQUIPO INTERNET</option>
                            @endif

                            @if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia
                            === 'HFC')
                            <option value="ADICION ANALOGAS">ADICION ANALOGAS</option>
                            <option value="ADICION DTA">ADICION DTA</option>
                            <option value="ADICION DIGITAL">ADICION DIGITAL</option>
                            @endif

                            @if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia
                            === 'HFC')
                            <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
                            <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
                            <option value="TRASLADO TRIPLE">TRASLADO TRIPLE</option>
                            @endif

                            @if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia
                            === 'GPON')
                            <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
                            <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
                            <option value="TRASLADO TRIPLE">TRASLADO TRIPLE</option>
                            @endif


                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true" required>
                            <option value="{{ $registro->dpto_colonia}}" selected="selected">
                                {{ $registro->dpto_colonia}}</option>
                        </select>
                    </div>

                    <div></div>
                </div>

                <!-- POSTVENTAS TRASLADOS -->

                @if ($registro->Select_Postventa === 'TRASLADO')
                <div class="form-group-container">

                    @if ($registro->tecnologia === 'HFC')
                    <!-- POSTVENTAS TRASLADOS HFC -->
                    <div class="form-group-container HiddenTrasladoHfc postventa-traslados" id="PostventaTrasladosHfc">
                        <div class="form-group col-md-3" style="padding-top: 1.5rem;">
                            <label for="TipoActividadTrasladoHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoHfc" id="TipoActividadTrasladoHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadTrasladoHfc}}">
                                    {{ $registro->TipoActividadTrasladoHfc}}</option>

                            </select>
                        </div>
                        @if ($registro->TipoActividadTrasladoHfc === 'REALIZADA')
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
                                            name="OrdenTvTrasladoHfc" placeholder="N° Orden Tv" autocomplete="off"
                                            value="{{ $registro->OrdenTvTrasladoHfc}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInternetTrasladoHfc">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon"
                                            id="OrdenInternetTrasladoHfc" placeholder="N° Orden Internet"
                                            name="OrdenInternetTrasladoHfc" autocomplete="off"
                                            value="{{ $registro->OrdenInternetTrasladoHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaTrasladoHfc">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaTrasladoHfc"
                                            name="OrdenLineaTrasladoHfc" placeholder="N° Orden Linea" autocomplete="off"
                                            value="{{ $registro->OrdenLineaTrasladoHfc}}" />
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
                                            placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObservacionesTrasladoHfc}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="TrabajadoTrasladoHfc" name="TrabajadoTrasladoHfc"
                                                {{ $registro->TrabajadoTrasladoHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            class="form-control" id="RecibeHfcRealizado" name="RecibeHfcRealizado"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeHfcRealizado}}" />
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
                                                        name="NodoTrasladoHfc" placeholder="Ingresa Nodo"
                                                        oninput="this.value = this.value.toUpperCase()"
                                                        autocomplete="off" value="{{ $registro->NodoTrasladoHfc}}" />
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
                                                        name="TapTrasladoHfc" placeholder="Ingresa TAP"
                                                        autocomplete="off" value="{{ $registro->TapTrasladoHfc}}" />
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
                                                        name="PosicionTrasladoHfc" placeholder="Ingresa Posicion"
                                                        autocomplete="off"
                                                        value="{{ $registro->PosicionTrasladoHfc}}" />
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
                                                        name="MaterialesTrasladoHfc" placeholder="Comentarios..."
                                                        oninput="this.value = this.value.toUpperCase()"
                                                        autocomplete="off"
                                                        value="{{ $registro->MaterialesTrasladoHfc}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoHfc === 'OBJETADA')
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
                                            id="OrdenTvObjetadoTrasladoHfc" placeholder="N° Orden Tv"
                                            name="OrdenTvObjetadoTrasladoHfc" autocomplete="off"
                                            value="{{ $registro->OrdenTvObjetadoTrasladoHfc}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenIntObjTrasladoHfc">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenIntObjTrasladoHfc"
                                            name="OrdenIntObjTrasladoHfc" placeholder="N° Orden Internet"
                                            autocomplete="off" value="{{ $registro->OrdenIntObjTrasladoHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaObjetadoTrasladoHfc">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon"
                                            id="OrdenLineaObjetadoTrasladoHfc" placeholder="N° Orden Linea"
                                            name="OrdenLineaObjetadoTrasladoHfc" autocomplete="off"
                                            value="{{ $registro->OrdenLineaObjetadoTrasladoHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoHfc" tabindex="-1"
                                            id="MotivoObjTrasladoHfc" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjTrasladoHfc}}">
                                                {{ $registro->MotivoObjTrasladoHfc}}</option>
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

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjTrasladoHfc" name="TrabajadoObjTrasladoHfc"
                                                    {{ $registro->TrabajadoObjTrasladoHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsObjTrasladoHfc}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjTrasladoHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjTrasladoHfc"
                                                name="ComentariosObjTrasladoHfc" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosObjTrasladoHfc}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoHfc === 'TRANSFERIDA')
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
                                                id="OrdenTvTransferidoHfc" name="OrdenTvTransferidoHfc"
                                                placeholder="N° Orden Tv" autocomplete="off"
                                                value="{{ $registro->OrdenTvTransferidoHfc}}" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenInternetTransferidoHfc">Orden Internet</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenInternetTransferidoHfc" name="OrdenInternetTransferidoHfc"
                                                placeholder="N° Orden Internet" autocomplete="off"
                                                value="{{ $registro->OrdenInternetTransferidoHfc}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenLineaTransferidoHfc">Orden Linea</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenLineaTransferidoHfc" placeholder="N° Orden Linea"
                                                name="OrdenLineaTransferidoHfc" autocomplete="off"
                                                value="{{ $registro->OrdenLineaTransferidoHfc}}" />
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
                                                name="MotivoTransTrasladoHfc"
                                                oninput="this.value = this.value.toUpperCase()"
                                                placeholder="Ingresa Motivo Transferido" autocomplete="off"
                                                value="{{ $registro->MotivoTransTrasladoHfc}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoTransTrasladoHfc" name="TrabajadoTransTrasladoHfc"
                                                    oninput="this.value = this.value.toUpperCase()"
                                                    {{ $registro->TrabajadoTransTrasladoHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                name="ComentarioTrasladoTransHfc"
                                                oninput="this.value = this.value.toUpperCase()"
                                                placeholder="Comentarios..." autocomplete="off"
                                                value="{{ $registro->ComentarioTrasladoTransHfc}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoHfc === 'ANULACION')
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
                                            name="OrdenTvAnulTraslHfc" placeholder="N° Orden Tv" autocomplete="off"
                                            value="{{ $registro->OrdenTvAnulTraslHfc}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInterAnulTraslHfc">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenInterAnulTraslHfc"
                                            name="OrdenInterAnulTraslHfc" placeholder="N° Orden Internet"
                                            autocomplete="off" value="{{ $registro->OrdenInterAnulTraslHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaAnulTraslHfc">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaAnulTraslHfc"
                                            name="OrdenLineaAnulTraslHfc" placeholder="N° Orden Linea"
                                            autocomplete="off" value="{{ $registro->OrdenLineaAnulTraslHfc}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAnuladaTraslado_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAnuladaTraslado_Hfc" tabindex="-1"
                                            id="MotivoAnuladaTraslado_Hfc" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoAnuladaTraslado_Hfc}}">
                                                {{ $registro->MotivoAnuladaTraslado_Hfc}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL ASIGNADOS </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED FISICA INSTALADA
                                                PERO NO ACTIVA </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
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
                                                id="TrabajadoAnuladaTraslado_Hfc" name="TrabajadoAnuladaTraslado_Hfc"
                                                {{ $registro->TrabajadoAnuladaTraslado_Hfc === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label"
                                                oninput="this.value = this.value.toUpperCase()">
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
                                            name="ComenAnuladaTraslado_Hfc" placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComenAnuladaTraslado_Hfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                    @endif

                    @if ($registro->tecnologia === 'GPON')
                    <!-- POSTVENTAS TRASLADOS GPON -->
                    <div class="form-group-container HiddenTrasladoGpon postventa-traslados"
                        id="PostventaTrasladosGpon">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoGpon">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoGpon" id="TipoActividadTrasladoGpon" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadTrasladoGpon}}">
                                    {{ $registro->TipoActividadTrasladoGpon}}</option>

                            </select>
                        </div>

                        @if ($registro->TipoActividadTrasladoGpon === 'REALIZADA')
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
                                            name="OrdenTvTrasladoGpon" placeholder="N° Orden Tv" autocomplete="off"
                                            value="{{ $registro->OrdenTvTrasladoGpon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInternetTrasladoGpon">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon"
                                            id="OrdenInternetTrasladoGpon" name="OrdenInternetTrasladoGpon"
                                            placeholder="N° Orden Internet" autocomplete="off"
                                            value="{{ $registro->OrdenInternetTrasladoGpon}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaTrasladoGpon">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaTrasladoGpon"
                                            name="OrdenLineaTrasladoGpon"
                                            oninput="this.value = this.value.toUpperCase()" placeholder="N° Orden Linea"
                                            autocomplete="off" value="{{ $registro->OrdenLineaTrasladoGpon}}" />
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
                                            name="ObvsTrasladoGpon" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsTrasladoGpon}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="TrabajadoTrasladoGpon" name="TrabajadoTrasladoGpon"
                                                {{ $registro->TrabajadoTrasladoGpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            class="form-control" id="RecibeTrasladoGpon" name="RecibeTrasladoGpon"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeTrasladoGpon}}" />
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
                                                        name="NodoTrasladoGpon" placeholder="Ingresa Nodo"
                                                        oninput="this.value = this.value.toUpperCase()"
                                                        autocomplete="off" value="{{ $registro->NodoTrasladoGpon}}" />
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
                                                        name="TapTrasladoGpon" placeholder="Ingresa TAP"
                                                        autocomplete="off" value="{{ $registro->TapTrasladoGpon}}" />
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
                                                        name="PosicionTrasladoGpon" placeholder="Ingresa Posicion"
                                                        autocomplete="off"
                                                        value="{{ $registro->PosicionTrasladoGpon}}" />
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
                                                        name="MaterialesTrasladoGpon" placeholder="Comentarios..."
                                                        oninput="this.value = this.value.toUpperCase()"
                                                        autocomplete="off"
                                                        value="{{ $registro->MaterialesTrasladoGpon}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoGpon === 'OBJETADA')
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
                                            name="OrdenTvTrasladoObjGpon" placeholder="N° Orden Tv" autocomplete="off"
                                            value="{{ $registro->OrdenTvTrasladoObjGpon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInterObjTraslGpon">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenInterObjTraslGpon"
                                            name="OrdenInterObjTraslGpon" placeholder="N° Orden Internet"
                                            autocomplete="off" value="{{ $registro->OrdenInterObjTraslGpon}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLineaTraslObjGpon">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLineaTraslObjGpon"
                                            name="OrdenLineaTraslObjGpon" placeholder="N° Orden Linea"
                                            autocomplete="off" value="{{ $registro->OrdenLineaTraslObjGpon}}" />
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoGpon">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoGpon" tabindex="-1"
                                            id="MotivoObjTrasladoGpon" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjTrasladoGpon}}">
                                                {{ $registro->MotivoObjTrasladoGpon}}</option>
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

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoTrasladoObjGpon" name="TrabajadoTrasladoObjGpon"
                                                    {{ $registro->TrabajadoTrasladoObjGpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsTrasladoObjGpon}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentTrasladoObjGpon">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentTrasladoObjGpon"
                                                name="ComentTrasladoObjGpon" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentTrasladoObjGpon}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoGpon === 'TRANSFERIDA')
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
                                                id="OrdenTvTrasladoTransGpon" placeholder="N° Orden Tv"
                                                name="OrdenTvTrasladoTransGpon" autocomplete="off"
                                                value="{{ $registro->OrdenTvTrasladoTransGpon}}" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenIntTransladoGpon">Orden Internet</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenIntTransladoGpon" placeholder="N° Orden Internet"
                                                name="OrdenIntTransladoGpon" autocomplete="off"
                                                value="{{ $registro->OrdenIntTransladoGpon}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenLineaTrasladoTransGpon">Orden Linea</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenLineaTrasladoTransGpon" placeholder="N° Orden Linea"
                                                name="OrdenLineaTrasladoTransGpon" autocomplete="off"
                                                value="{{ $registro->OrdenLineaTrasladoTransGpon}}" />
                                        </div>
                                    </div>
                                </div>

                                <div class=" form-group col-md-9">
                                    <label for="MotivoTransTrasladoGpon">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoTransTrasladoGpon"
                                            name="MotivoTransTrasladoGpon" placeholder="Ingresa Motivo Trasnferido"
                                            autocomplete="off" value="{{ $registro->MotivoTransTrasladoGpon}}"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTraslTransGpon"
                                                name="TrabajadoTraslTransGpon"
                                                {{ $registro->TrabajadoTraslTransGpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ComentTrasladoTransGpon"
                                            oninput="this.value = this.value.toUpperCase()"
                                            placeholder="Comentarios del caso" autocomplete="off"
                                            value="{{ $registro->ComentTrasladoTransGpon}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoGpon === 'ANULACION')
                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoGponHidden" id="AnuladaTrasladoGpon">
                            <div class="form-group-container">
                                <div class="col-md-12">
                                    <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                        <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES
                                            GPON</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenTvTraslAnuladoGpon">Orden Tv</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenTvTraslAnuladoGpon" name="OrdenTvTraslAnuladoGpon"
                                                placeholder="N° Orden Tv" autocomplete="off"
                                                value="{{ $registro->OrdenTvTraslAnuladoGpon}}" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenIntTrasladoAnulGpon">Orden Internet</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenIntTrasladoAnulGpon" name="OrdenIntTrasladoAnulGpon"
                                                placeholder="N° Orden Internet" autocomplete="off"
                                                value="{{ $registro->OrdenIntTrasladoAnulGpon}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenLineaTraslAnulGpon">Orden Linea</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control OrdenGpon"
                                                id="OrdenLineaTraslAnulGpon" placeholder="N° Orden Linea"
                                                name="OrdenLineaTraslAnulGpon" autocomplete="off"
                                                value="{{ $registro->OrdenLineaTraslAnulGpon}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Gpon">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Gpon" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Gpon" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoTrasladoAnulada_Gpon}}">
                                                {{ $registro->MotivoTrasladoAnulada_Gpon}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO
                                                PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN
                                                DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO
                                                HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAnuladaTraslado_gpon" name="TrabajadoAnuladaTraslado_gpon"
                                                {{ $registro->TrabajadoAnuladaTraslado_gpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioTrasladoAnulada_Gpon}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'ADSL')
                    <!-- POSTVENTAS TRASLADOS ADSL -->
                    <div class="form-group-container HiddenTrasladoAdsl postventa-traslados"
                        id="PostventaTrasladosAdsl">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoAdsl">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoAdsl" id="TipoActividadTrasladoAdsl" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadTrasladoAdsl}}">
                                    {{ $registro->TipoActividadTrasladoAdsl}}</option>

                            </select>
                        </div>

                        @if ($registro->TipoActividadTrasladoAdsl === 'REALIZADA')
                        <!-- REALIZADA -->
                        <div class="TrasladoAdslHidden" id="RealizadaTrasladoAdsl">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="NOrdenTrasladosAdsl"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenTrasladosAdsl"
                                            placeholder="N° Orden" name="NOrdenTrasladosAdsl" autocomplete="off"
                                            value="{{ $registro->NOrdenTrasladosAdsl}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="GeorefTrasladoAdsl">Georeferencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="GeorefTrasladoAdsl"
                                            name="GeorefTrasladoAdsl" placeholder="Latitud,Longitud"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->GeorefTrasladoAdsl}}" />
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
                                            name="MaterialesTrasladoAdsl" placeholder="Comentarios..."
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->MaterialesTrasladoAdsl}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTrasladoAdsl"
                                                name="TrabajadoTrasladoAdsl"
                                                {{ $registro->TrabajadoTrasladoAdsl === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ObvsTrasladoAdsl" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsTrasladoAdsl}}" />
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
                                            class="form-control" id="RecibeTrasladoAdsl" name="RecibeTrasladoAdsl"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeTrasladoAdsl}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoAdsl === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="TrasladoAdslHidden" id="ObjetadaTrasladoAdsl">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoAdsl">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoAdsl" tabindex="-1"
                                            id="MotivoObjTrasladoAdsl" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjTrasladoAdsl}}">
                                                {{ $registro->MotivoObjTrasladoAdsl}}</option>
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

                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjTrasladoAdsl"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjTrasladoAdsl"
                                                placeholder="N° Orden" name="OrdenObjTrasladoAdsl" autocomplete="off"
                                                value="{{ $registro->OrdenObjTrasladoAdsl}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoTrasladoObjAdsl" name="TrabajadoTrasladoObjAdsl"
                                                    {{ $registro->TrabajadoTrasladoObjAdsl === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsTrasladoObjAdsl}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosTrasladosObjAdsl">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosTrasladosObjAdsl"
                                                name="ComentariosTrasladosObjAdsl" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosTrasladosObjAdsl}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoAdsl === 'ANULACION')
                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoAdslHidden" id="AnuladaTrasladoAdsl">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Adsl">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Adsl" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Adsl" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoTrasladoAnulada_Adsl}}">
                                                {{ $registro->MotivoTrasladoAnulada_Adsl}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO
                                                PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN
                                                DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO
                                                HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenTrasladosAnulAdsl"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenTrasladosAnulAdsl"
                                            placeholder="N° Orden" name="NOrdenTrasladosAnulAdsl" autocomplete="off"
                                            value="{{ $registro->NOrdenTrasladosAnulAdsl}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTrasladoTrAnulada_Adsl"
                                                name="TrabajadoTrasladoTrAnulada_Adsl"
                                                {{ $registro->TrabajadoTrasladoTrAnulada_Adsl === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioTrasladoAnulada_Adsl}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'COBRE')
                    <!-- POSTVENTAS TRASLADOS COBRE -->
                    <div class="form-group-container HiddenTrasladoCobre postventa-traslados"
                        id="PostventaTrasladosCobre">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoCobre">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoCobre" id="TipoActividadTrasladoCobre" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadTrasladoCobre}}">
                                    {{ $registro->TipoActividadTrasladoCobre}}</option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadTrasladoCobre === 'REALIZADA')
                        <!-- REALIZADA -->
                        <div class="TrasladoCobreHidden" id="RealizadaTrasladoCobre">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladoCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenTrasladoCobre"
                                            placeholder="N° Orden" name="OrdenTrasladoCobre" autocomplete="off"
                                            value="{{ $registro->OrdenTrasladoCobre}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="GeorefTrasladoCobre">Georeferencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="GeorefTrasladoCobre"
                                            name="GeorefTrasladoCobre" placeholder="Latitud,Longitud"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->GeorefTrasladoCobre}}" />
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
                                            name="MaterialesTrasladoCobre" placeholder="Comentarios..."
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->MaterialesTrasladoCobre}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTrasladoCobre"
                                                name="TrabajadoTrasladoCobre"
                                                {{ $registro->TrabajadoTrasladoCobre === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ObvsTrasladoCobre" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsTrasladoCobre}}" />
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
                                            class="form-control" id="RecibeTrasladoCobre" name="RecibeTrasladoCobre"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeTrasladoCobre}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoCobre === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="TrasladoCobreHidden" id="ObjetadaTrasladoCobre">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoCobre">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoCobre" tabindex="-1"
                                            id="MotivoObjTrasladoCobre" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjTrasladoCobre}}">
                                                {{ $registro->MotivoObjTrasladoCobre}}</option>
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

                                    <div class="form-group col-md-3">
                                        <label for="OrdenTrasladoObjCobres"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTrasladoObjCobres"
                                                placeholder="N° Orden" name="OrdenTrasladoObjCobres" autocomplete="off"
                                                value="{{ $registro->OrdenTrasladoObjCobres}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoTrasladoObjCobre" name="TrabajadoTrasladoObjCobre"
                                                    {{ $registro->TrabajadoTrasladoObjCobre === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObsObjTrasladoCobre}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjTrasladoCobre">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjTrasladoCobre"
                                                name="ComentariosObjTrasladoCobre" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosObjTrasladoCobre}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoCobre === 'ANULACION')
                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoCobreHidden" id="AnuladaTrasladoCobre">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Cobre">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Cobre" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Cobre" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoTrasladoAnulada_Cobre}}">
                                                {{ $registro->MotivoTrasladoAnulada_Cobre}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO
                                                PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO
                                                HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="NO HAY NUMERACION EN CONCENTRADOR">NO HAY NUMERACION
                                                EN
                                                CONCENTRADOR </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD MAL REGISTRADA">SOLICITUD MAL REGISTRADA
                                            </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladosCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenTrasladosCobre"
                                            placeholder="N° Orden" name="OrdenTrasladosCobre" autocomplete="off"
                                            value="{{ $registro->OrdenTrasladosCobre}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTrasladoAnulada_Cobre"
                                                name="TrabajadoTrasladoAnulada_Cobre"
                                                {{ $registro->TrabajadoTrasladoAnulada_Cobre === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioTrasladoAnulada_Cobre}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'DTH')
                    <!-- POSTVENTA TRASLADOS DTH -->
                    <div class="form-group-container HiddenTrasladoDth postventa-traslados" id="PostventaTrasladosDth">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoDth">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoDth" id="TipoActividadTrasladoDth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadTrasladoDth}}">
                                    {{ $registro->TipoActividadTrasladoDth}}</option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadTrasladoDth === 'REALIZADA')
                        <!-- REALIZADA -->
                        <div class="TrasladoDthHidden" id="RealizadaTrasladoDth">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladoDth"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenTrasladoDth"
                                            placeholder="N° Orden" name="OrdenTrasladoDth" autocomplete="off"
                                            value="{{ $registro->OrdenTrasladoDth}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="GeorefTrasladoDth">Georeferencia</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="GeorefTrasladoDth"
                                            name="GeorefTrasladoDth" placeholder="Latitud,Longitud"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->GeorefTrasladoDth}}" />
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
                                            name="MaterialesTrasladoDth" placeholder="Comentarios..."
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->MaterialesTrasladoDth}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoTrasladoDth"
                                                name="TrabajadoTrasladoDth"
                                                {{ $registro->TrabajadoTrasladoDth === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ObvsTrasladoDth" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsTrasladoDth}}" />
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
                                            class="form-control" id="RecibeTrasladoDth" name="RecibeTrasladoDth"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeTrasladoDth}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadTrasladoDth === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="TrasladoDthHidden" id="ObjetadaTrasladoDth">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjTrasladoDth">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjTrasladoDth" tabindex="-1"
                                            id="MotivoObjTrasladoDth" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjTrasladoDth}}">
                                                {{ $registro->MotivoObjTrasladoDth}}</option>
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

                                    <div class="form-group col-md-3">
                                        <label for="OrdenTrasladoObjDth"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenTrasladoObjDth"
                                                placeholder="N° Orden" name="OrdenTrasladoObjDth" autocomplete="off"
                                                value="{{ $registro->OrdenTrasladoObjDth}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoTrasladoObj_Dth" name="TrabajadoTrasladoObj_Dth"
                                                    {{ $registro->TrabajadoTrasladoObj_Dth === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsTrasladoObjDth}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosTrasladoObjDth">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosTrasladoObjDth"
                                                name="ComentariosTrasladoObjDth" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosTrasladoObjDth}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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

                        @if ($registro->TipoActividadTrasladoDth === 'ANULACION')
                        <!-- ANULADA -->
                        <div class="form-group-container TrasladoDthHidden" id="AnuladaTrasladoDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoTrasladoAnulada_Dth">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoTrasladoAnulada_Dth" tabindex="-1"
                                            id="MotivoTrasladoAnulada_Dth" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoTrasladoAnulada_Dth}}">
                                                {{ $registro->MotivoTrasladoAnulada_Dth}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO
                                                PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL REGISTRADA
                                            </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)
                                            </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenTrasladosDth"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenTrasladosDth"
                                            placeholder="N° Orden" name="OrdenTrasladosDth" autocomplete="off"
                                            value="{{ $registro->OrdenTrasladosDth}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoTrasladoAnulada_Dth" name="TrabajadoTrasladoAnulada_Dth"
                                                {{ $registro->TrabajadoTrasladoAnulada_Dth === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioTrasladoAnulada_Dth">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioTrasladoAnulada_Dth"
                                            name="ComentarioTrasladoAnulada_Dth"
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioTrasladoAnulada_Dth}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
                @endif

                @if ($registro->Select_Postventa === 'ADICION')
                <!-- POSTVENTAS ADICION -->
                <div class="form-group-container">

                    @if ($registro->tecnologia === 'HFC')
                    <!-- POSTVENTA ADICION HFC -->
                    <div class="form-group-container postventa-adicion" id="PostventaAdicionHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadAdicionHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadAdicionHfc" id="TipoActividadAdicionHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadAdicionHfc}}">
                                    {{ $registro->TipoActividadAdicionHfc}}</option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadAdicionHfc === 'REALIZADA')
                        <!-- REALIZADA -->
                        <div class="PostventaAdicionHfcHidden" id="RealizadaAdicionHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipos Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc1"
                                            name="equipostvAdicionHfc1" placeholder="Equipo Tv 1"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionHfc1}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc2"
                                            name="equipostvAdicionHfc2" placeholder="Equipo Tv 2"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionHfc2}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc3"
                                            name="equipostvAdicionHfc3" placeholder="Equipo Tv 3"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionHfc3}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc4"
                                            name="equipostvAdicionHfc4" placeholder="Equipo Tv 4"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionHfc4}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionHfc5"
                                            name="equipostvAdicionHfc5" placeholder="Equipo Tv 5"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionHfc5}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="NOrdenAdicionHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenAdicionHfc"
                                            placeholder="N° Orden" name="NOrdenAdicionHfc" autocomplete="off"
                                            value="{{ $registro->NOrdenAdicionHfc}}" />
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-left: 20px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoAdicionHfc"
                                            name="TrabajadoAdicionHfc"
                                            {{ $registro->TrabajadoAdicionHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="obvsAdicionHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->obvsAdicionHfc}}" />
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
                                            class="form-control" id="RecibeAdicionHfc" name="RecibeAdicionHfc"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeAdicionHfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadAdicionHfc === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaAdicionHfcHidden" id="ObjetadaAdicionHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjAdicionHfc">Motivo Objetada</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjAdicionHfc" tabindex="-1"
                                            id="MotivoObjAdicionHfc" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjAdicionHfc}}">
                                                {{ $registro->MotivoObjAdicionHfc}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenAdicionObjHfc"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenAdicionObjHfc"
                                                placeholder="N° Orden" name="OrdenAdicionObjHfc" autocomplete="off"
                                                value="{{ $registro->OrdenAdicionObjHfc}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoObjAdicionHfc" name="TrabajadoObjAdicionHfc"
                                                    {{ $registro->TrabajadoObjAdicionHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsAdicionObjHfc}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjAdicionHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjAdicionHfc"
                                                name="ComentariosObjAdicionHfc" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosObjAdicionHfc}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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

                        @if ($registro->TipoActividadAdicionHfc === 'ANULACION')
                        <!-- ANULADA -->
                        <div class="form-group-container PostventaAdicionHfcHidden" id="AnuladaAdicionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionAnulada_Hfc" tabindex="-1"
                                            id="MotivoAdicionAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoAdicionAnulada_Hfc}}">
                                                {{ $registro->MotivoAdicionAnulada_Hfc}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">
                                                CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO
                                                LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE
                                                INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL
                                                ASIGNADOS </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED
                                                FISICA INSTALADA
                                                PERO NO ACTIVA </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA
                                                TECNOLOGIA) </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenAdicionAnuladaHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenAdicionAnuladaHfc"
                                            placeholder="N° Orden" name="NOrdenAdicionAnuladaHfc" autocomplete="off"
                                            value="{{ $registro->NOrdenAdicionAnuladaHfc}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAdicionAnulada_Hfc" name="TrabajadoAdicionAnulada_Hfc"
                                                {{ $registro->TrabajadoAdicionAnulada_Hfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioAdicionAnulada_Hfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'GPON')
                    <!-- POSTVENTA ADICION GPON -->
                    <div class="form-group-container postventa-adicion" id="PostventaAdicionGpon">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadAdicionGpon">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadAdicionGpon" id="TipoActividadAdicionGpon" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadAdicionGpon}}">
                                    {{ $registro->TipoActividadAdicionGpon}}</option>

                            </select>
                        </div>
                        @if ($registro->TipoActividadAdicionGpon === 'REALIZADA')
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
                                            name="equipostvAdicionGpon1" placeholder="Equipo Tv 1"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionGpon1}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon2"
                                            name="equipostvAdicionGpon2" placeholder="Equipo Tv 2"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionGpon2}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon3"
                                            name="equipostvAdicionGpon3" placeholder="Equipo Tv 3"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionGpon3}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon4"
                                            name="equipostvAdicionGpon4" placeholder="Equipo Tv 4"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionGpon4}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionGpon5"
                                            name="equipostvAdicionGpon5" placeholder="Equipo Tv 5"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionGpon5}}" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="NOrdenAdicionGpon"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenAdicionGpon"
                                            placeholder="N° Orden" name="NOrdenAdicionGpon" autocomplete="off"
                                            value="{{ $registro->NOrdenAdicionGpon}}" />
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-left: 18px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoAdicionGpon"
                                            name="TrabajadoAdicionGpon"
                                            {{ $registro->TrabajadoAdicionGpon === 'TRABAJADO' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <label for="ObvsAdicionGpon">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsAdicionGpon"
                                            name="ObvsAdicionGpon" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsAdicionGpon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-9" style="padding-top: 10px;">
                                    <label for="RecibeAdicionGpon">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeAdicionGpon" name="RecibeAdicionGpon"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeAdicionGpon}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadAdicionGpon === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaAdicionGponHidden" id="ObjetadaAdicionGpon">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionObjGpon">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionObjGpon" tabindex="-1"
                                            id="MotivoAdicionObjGpon" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoAdicionObjGpon}}">
                                                {{ $registro->MotivoAdicionObjGpon}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="NOrdenAdicionObjGpon"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="NOrdenAdicionObjGpon"
                                                placeholder="N° Orden" name="NOrdenAdicionObjGpon" autocomplete="off"
                                                value="{{ $registro->NOrdenAdicionObjGpon}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoAdicionObjGpon" name="TrabajadoAdicionObjGpon"
                                                    {{ $registro->TrabajadoAdicionObjGpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsAdicionObjGpon}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosAdicionObjGpon">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosAdicionObjGpon"
                                                name="ComentariosAdicionObjGpon" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosAdicionObjGpon}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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

                        @if ($registro->TipoActividadAdicionGpon === 'ANULACION')
                        <!-- ANULADA -->
                        <div class="form-group-container PostventaAdicionGponHidden" id="AnuladaAdicionGpon">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionAnulada_Gpon">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionAnulada_Gpon" tabindex="-1"
                                            id="MotivoAdicionAnulada_Gpon" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoAdicionAnulada_Gpon}}">
                                                {{ $registro->MotivoAdicionAnulada_Gpon}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO
                                                LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="NOrdenAdicionAnuladaGpon"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenAdicionAnuladaGpon"
                                            placeholder="N° Orden" name="NOrdenAdicionAnuladaGpon" autocomplete="off"
                                            value="{{ $registro->NOrdenAdicionAnuladaGpon}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAdicionAnulada_Gpon" name="TrabajadoAdicionAnulada_Gpon"
                                                {{ $registro->TrabajadoAdicionAnulada_Gpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioAdicionAnulada_Gpon}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'DTH')
                    <!-- POSTVENTA ADICION DTH -->
                    <div class="form-group-container postventa-adicion" id="PostventaAdicionDth">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadAdicionDth">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadAdicionDth" id="TipoActividadAdicionDth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadAdicionDth}}">
                                    {{ $registro->TipoActividadAdicionDth}}</option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadAdicionDth === 'REALIZADA')
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
                                            name="equipostvAdicionDth1" placeholder="Equipo Tv 1"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionDth1}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth2"
                                            name="equipostvAdicionDth2" placeholder="Equipo Tv 2"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionDth2}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth3"
                                            name="equipostvAdicionDth3" placeholder="Equipo Tv 3"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionDth3}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth4"
                                            name="equipostvAdicionDth4" placeholder="Equipo Tv 4"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionDth4}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipostvAdicionDth5"
                                            name="equipostvAdicionDth5" placeholder="Equipo Tv 5"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipostvAdicionDth5}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenAdicionDth"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenAdicionDth"
                                            placeholder="N° Orden" name="NOrdenAdicionDth" autocomplete="off"
                                            value="{{ $registro->NOrdenAdicionDth}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoAdicionDth"
                                                name="TrabajadoAdicionDth"
                                                {{ $registro->TrabajadoAdicionDth === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <label for="ObvsAdicionDth">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsAdicionDth"
                                            name="ObvsAdicionDth" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsAdicionDth}}" />
                                    </div>
                                </div>
                                <div class="col-md-9" style="padding-top: 8px;">
                                    <label for="RecibeAdicionDth">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeAdicionDth" name="RecibeAdicionDth"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeAdicionDth}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadAdicionDth === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaAdicionDthHidden" id="ObjetadaAdicionDth">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjAdicionDth">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjAdicionDth" tabindex="-1"
                                            id="MotivoObjAdicionDth" aria-hidden="true">
                                            <option selected="selected" value=" {{ $registro->MotivoObjAdicionDth}}">
                                                {{ $registro->MotivoObjAdicionDth}}</option>
                                            <option value=" COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="NOrdenAdicionObjDth"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="NOrdenAdicionObjDth"
                                                placeholder="N° Orden" name="NOrdenAdicionObjDth" autocomplete="off"
                                                value="{{ $registro->NOrdenAdicionObjDth}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoAdicionObjDth" name="TrabajadoAdicionObjDth"
                                                    {{ $registro->TrabajadoAdicionObjDth === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsAdicionObjDth}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosAdicionObjDth">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosAdicionObjDth"
                                                name="ComentariosAdicionObjDth" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosAdicionObjDth}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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
                        @if ($registro->TipoActividadAdicionDth === 'ANULACION')
                        <!-- ANULADA DTH -->
                        <div class="PostventaAdicionDthHidden" id="AnuladaAdicionDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAdicionAnulada_Dth">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAdicionAnulada_Dth" tabindex="-1"
                                            id="MotivoAdicionAnulada_Dth" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoAdicionAnulada_Dth}}">
                                                {{ $registro->MotivoAdicionAnulada_Dth}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL
                                                REGISTRADA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA
                                                TECNOLOGIA) </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
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
                                            name="OrdenAdicionAnulada_Dth" placeholder="Ingresa N° Orden"
                                            autocomplete="off" value="{{ $registro->OrdenAdicionAnulada_Dth}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAdicionAnulada_Dth" name="TrabajadoAdicionAnulada_Dth"
                                                {{ $registro->TrabajadoAdicionAnulada_Dth === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioAdicionAnulada_Dth}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
                @endif

                <!-- POSTVENTAS CAMBIOS DE EQUIPOS -->
                @if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO')
                <div class="form-group-container">

                    @if ($registro->tecnologia === 'HFC')
                    <!-- POSTVENTA CAMBIO DE EQUIPO HFC -->
                    <div class="form-group-container" id="PostventaCambioHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioHfc" id="TipoActividadCambioHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadCambioHfc}}">
                                    {{ $registro->TipoActividadCambioHfc}}</option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadCambioHfc === 'REALIZADA')
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
                                            name="InstalacionEquipoHfc" placeholder="N° Equipo Instalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->InstalacionEquipoHfc}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="DesinstalarEquipoHfc">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoHfc"
                                            name="DesinstalarEquipoHfc" placeholder="N° Equipo Desinstalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->DesinstalarEquipoHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="NOrdenEquipoHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenEquipoHfc"
                                            placeholder="N° Orden" name="NOrdenEquipoHfc" autocomplete="off"
                                            value="{{ $registro->NOrdenEquipoHfc}}" />
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
                                            placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsEquipoHfc}}" />
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
                                            class="form-control" id="RecibeEquipoHfc" name="RecibeEquipoHfc"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeEquipoHfc}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoHfc"
                                                name="TrabajadoEquipoHfc"
                                                {{ $registro->TrabajadoEquipoHfc === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioHfc === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaCambioHfcHidden" id="ObjetadaCambioHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoObjHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoObjHfc" tabindex="-1"
                                            id="MotivoEquipoObjHfc" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoEquipoObjHfc}}">
                                                {{ $registro->MotivoEquipoObjHfc}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="NordenObjEquipoHfc"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="NordenObjEquipoHfc"
                                                placeholder="N° Orden" name="NordenObjEquipoHfc" autocomplete="off"
                                                value="{{ $registro->NordenObjEquipoHfc}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="TrabajadoObjEquipoHfc" name="TrabajadoObjEquipoHfc"
                                                    {{ $registro->TrabajadoObjEquipoHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                name="ObvsObjEquipoHfc" placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsObjEquipoHfc}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjHfc"
                                                name="ComentsEquipoObjHfc" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentsEquipoObjHfc}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioHfc === 'ANULACION')
                        <!-- ANULACION -->
                        <div class="PostventaCambioHfcHidden" id="AnuladaCambioHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoAnulada_Hfc" tabindex="-1"
                                            id="MotivoEquipoAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoEquipoAnulada_Hfc}}">
                                                {{ $registro->MotivoEquipoAnulada_Hfc}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL
                                                REGISTRADA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA
                                                TECNOLOGIA) </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
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
                                            name="OrdenAnuladaEquipoHfc" placeholder="Ingresa N° Orden"
                                            autocomplete="off" value="{{ $registro->OrdenAnuladaEquipoHfc}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Hfc" name="TrabajadoEquipoAnulada_Hfc"
                                                {{ $registro->TrabajadoEquipoAnulada_Hfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ComentarioAnuladaEquipoHfc" placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioAnuladaEquipoHfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'GPON')
                    <!-- POSTVENTA CAMBIO DE EQUIPO GPON -->
                    <div class="form-group-container" id="PostventaCambioGpon">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioGpon">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioGpon" id="TipoActividadCambioGpon" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadCambioGpon}}">
                                    {{ $registro->TipoActividadCambioGpon}}
                                </option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadCambioGpon === 'REALIZADA')
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
                                            name="InstalacionEquipoGpon" placeholder="N° Equipo Instalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->InstalacionEquipoGpon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquiposTv_Hfc">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoGpon"
                                            name="DesinstalarEquipoGpon" placeholder="N° Equipo Desinstalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->DesinstalarEquipoGpon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenEquipoGpon"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenEquipoGpon"
                                            placeholder="N° Orden" name="NOrdenEquipoGpon" autocomplete="off"
                                            value="{{ $registro->NOrdenEquipoGpon}}" />
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
                                            name="ObvsEquipoGpon" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsEquipoGpon}}" />
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
                                            class="form-control" id="RecibeEquipoGpon" name="RecibeEquipoGpon"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeEquipoGpon}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoGpon"
                                                name="TrabajadoEquipoGpon"
                                                {{ $registro->TrabajadoEquipoGpon === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioGpon === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaCambioGponHidden" id="ObjetadaCambioGpon">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjEquipoGpon">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjEquipoGpon" tabindex="-1"
                                            id="MotivoObjEquipoGpon" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjEquipoGpon}}">
                                                {{ $registro->MotivoObjEquipoGpon}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="NOrdenObjEquipoGpon"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="NOrdenObjEquipoGpon"
                                                placeholder="N° Orden" name="NOrdenObjEquipoGpon" autocomplete="off"
                                                value="{{ $registro->NOrdenObjEquipoGpon}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjEquipoGpon" name="TrabajadoObjEquipoGpon"
                                                    oninput="this.value = this.value.toUpperCase()"
                                                    {{ $registro->TrabajadoObjEquipoGpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsEquipoObjGpon}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjGpon">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjGpon"
                                                name="ComentsEquipoObjGpon" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentsEquipoObjGpon}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioGpon === 'ANULACION')
                        <!-- ANULACION -->
                        <div class="PostventaCambioGponHidden" id="AnuladaCambioGpon">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAnuladaObj_Gpon">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAnuladaObj_Gpon" tabindex="-1"
                                            id="MotivoAnuladaObj_Gpon" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoAnuladaObj_Gpon}}">
                                                {{ $registro->MotivoAnuladaObj_Gpon}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO
                                                LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenEquipoAnuladaGpon"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenEquipoAnuladaGpon"
                                            placeholder="N° Orden" name="OrdenEquipoAnuladaGpon" autocomplete="off"
                                            value="{{ $registro->OrdenEquipoAnuladaGpon}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Gpon" name="TrabajadoEquipoAnulada_Gpon"
                                                {{ $registro->TrabajadoEquipoAnulada_Gpon === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioEquipoAnulada_Gpon}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif


                    @if ($registro->tecnologia === 'ADSL')
                    <!-- POSTVENTA CAMBIO DE EQUIPO ADSL -->
                    <div class="form-group-container" id="PostventaCambioAdsl">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioAdsl">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioAdsl" id="TipoActividadCambioAdsl" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadCambioAdsl}}">
                                    {{ $registro->TipoActividadCambioAdsl}}</option>

                            </select>
                        </div>

                        @if ($registro->TipoActividadCambioAdsl === 'REALIZADA')
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
                                            name="InstalacionEquipoAdsl" placeholder="N° Equipo Instalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->InstalacionEquipoAdsl}}" />
                                    </div>
                                </div>
                                <div class=" form-group col-md-3" id="hideEquipoTv">
                                    <label for="DesinstalarEquipoAdsl">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoAdsl"
                                            name="DesinstalarEquipoAdsl" placeholder="N° Equipo Desinstalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->DesinstalarEquipoAdsl}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenEquipoAdsl"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenEquipoAdsl"
                                            placeholder="N° Orden" name="OrdenEquipoAdsl" autocomplete="off"
                                            value="{{ $registro->OrdenEquipoAdsl}}" />
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
                                            name="ObvsEquipoAdsl" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsEquipoAdsl}}" />
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
                                            class="form-control" id="RecibeEquipoAdsl" name="RecibeEquipoAdsl"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeEquipoAdsl}}" />
                                    </div>
                                </div>
                                <div class=" from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoAdsl"
                                                name="TrabajadoEquipoAdsl"
                                                {{ $registro->TrabajadoEquipoAdsl === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioAdsl === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaCambioAdslHidden" id="ObjetadaCambioAdsl">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoObjAdsl">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoObjAdsl" tabindex="-1"
                                            id="MotivoEquipoObjAdsl" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoEquipoObjAdsl}}">
                                                {{ $registro->MotivoEquipoObjAdsl}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN
                                                SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN
                                                SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA
                                                ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenEquipoObjAdsl"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenEquipoObjAdsl"
                                                placeholder="N° Orden" name="OrdenEquipoObjAdsl" autocomplete="off"
                                                value="{{ $registro->OrdenEquipoObjAdsl}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoEquipoObjAdsl" name="TrabajadoEquipoObjAdsl"
                                                    {{ $registro->TrabajadoEquipoObjAdsl === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsEquipoObjAdsl}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjAdsl">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjAdsl"
                                                name="ComentsEquipoObjAdsl" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentsEquipoObjAdsl}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioAdsl === 'ANULACION')
                        <!-- ANULACIONES -->
                        <div class="PostventaCambioAdslHidden" id="AnuladaCambioAdsl">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoAnulada_Adsl">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoAnulada_Adsl" tabindex="-1"
                                            id="MotivoEquipoAnulada_Adsl" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoEquipoAnulada_Adsl}}">
                                                {{ $registro->MotivoEquipoAnulada_Adsl}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO
                                                LIBRE EN
                                                DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY
                                                DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
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
                                            name="OrdenAnuladaEquipoAdsl" placeholder="Ingresa N° Orden"
                                            value="{{ $registro->OrdenAnuladaEquipoAdsl}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Adsl" name="TrabajadoEquipoAnulada_Adsl"
                                                {{ $registro->TrabajadoEquipoAnulada_Adsl === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ComentsEquipoAnulada_Adsl" placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentsEquipoAnulada_Adsl}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'DTH')
                    <!-- POSTVENTA CAMBIO DE EQUIPO DTH -->
                    <div class="form-group-container" id="PostventaCambioDth">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioDth">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioDth" id="TipoActividadCambioDth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadCambioDth}}">
                                    {{ $registro->TipoActividadCambioDth}}</option>

                            </select>
                        </div>

                        @if ($registro->TipoActividadCambioDth === 'REALIZADA')
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
                                            name="InstalacionEquipoDth" placeholder="N° Equipo Instalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->InstalacionEquipoDth}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="">Equipo Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="DesinstalarEquipoDth"
                                            name="DesinstalarEquipoDth" placeholder="N° Equipo Desinstalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->DesinstalarEquipoDth}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenEquipoDth"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenEquipoDth"
                                            placeholder="N° Orden" name="OrdenEquipoDth" autocomplete="off"
                                            value="{{ $registro->OrdenEquipoDth}}" />
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
                                            placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsEquipoDth}}" />
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
                                            class="form-control" id="RecibeEquipoDth" name="RecibeEquipoDth"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsEquipoDth}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoEquipoDth"
                                                name="TrabajadoEquipoDth"
                                                {{ $registro->TrabajadoEquipoDth === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioDth === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaCambioDthHidden" id="ObjetadaCambioDth">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjEquipoDth">MOTIVO OBJETADO</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjEquipoDth" tabindex="-1"
                                            id="MotivoObjEquipoDth" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjEquipoDth}}">
                                                {{ $registro->MotivoObjEquipoDth}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN
                                                SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN
                                                SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA
                                                ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenEquipoObjDth"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenEquipoObjDth"
                                                placeholder="N° Orden" name="OrdenEquipoObjDth" autocomplete="off"
                                                value="{{ $registro->OrdenEquipoObjDth}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoEquipoObjDth" name="TrabajadoEquipoObjDth"
                                                    {{ $registro->TrabajadoEquipoObjDth === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                name="ObvsEquipoObjDth" placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsEquipoObjDth}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsEquipoObjDth">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsEquipoObjDth"
                                                name="ComentsEquipoObjDth" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentsEquipoObjDth}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadCambioDth === 'ANULACION')
                        <!-- ANULACION -->
                        <div class="PostventaCambioDthHidden" id="AnuladaCambioDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoEquipoAnulada_Dth">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoEquipoAnulada_Dth" tabindex="-1"
                                            id="MotivoEquipoAnulada_Dth" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoEquipoAnulada_Dth}}">
                                                {{ $registro->MotivoEquipoAnulada_Dth}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="SOLICITUD MAL REGISTRADA"> SOLICITUD MAL
                                                REGISTRADA
                                            </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORRECTOS(OTRA
                                                TECNOLOGIA)
                                            </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
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
                                            name="OrdenEquipoAnulada_Dth" placeholder="Ingresa N° Orden"
                                            autocomplete="off" value="{{ $registro->OrdenEquipoAnulada_Dth}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoEquipoAnulada_Dth" name="TrabajadoEquipoAnulada_Dth"
                                                {{ $registro->TrabajadoEquipoAnulada_Dth === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioEquipoAnulada_Dth}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if ($registro->tecnologia === 'COBRE')
                    <!-- POSTVENTA CAMBIO DE EQUIPO COBRE -->
                    <div class="form-group-container" id="PostventaCambioCobre">
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
                                            placeholder="N° Equipo Instalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="hideEquipoTv">
                                    <label for="EquipoTvC_EquipoDesinstalarCobre">Equipo
                                        Desinstalar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc"
                                            id="EquipoTvC_EquipoDesinstalarCobre"
                                            name="EquipoTvC_EquipoDesinstalarCobre" placeholder="N° Equipo Desinstalar"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenC_EquiposCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenC_EquiposCobre"
                                            placeholder="N° Orden" name="OrdenC_EquiposCobre" autocomplete="off" />
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
                                            name="ObvsC_EquipoCobre" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
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
                                            class="form-control" id="RecibeC_EquipoCobre" name="RecibeC_EquipoCobre"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
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
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN
                                                SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN
                                                SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA
                                                ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenC_EquiposObjCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenC_EquiposObjCobre"
                                                placeholder="N° Orden" name="OrdenC_EquiposObjCobre"
                                                autocomplete="off" />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosObjC_EquipoCobre">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosObjC_EquipoCobre"
                                                name="ComentariosObjC_EquipoCobre" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
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
                                    <label for="OrdenC_EquiposAnulCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenC_EquiposAnulCobre"
                                            placeholder="N° Orden" name="OrdenC_EquiposAnulCobre" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="MotivoAnulC_EquipoCobre">Motivo Transferido</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MotivoAnulC_EquipoCobre"
                                            name="MotivoAnulC_EquipoCobre"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosAnulC_EquipoCobre">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosAnulC_EquipoCobre"
                                            name="ComentariosAnulC_EquipoCobre"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif

                <!-- POSTVENTAS MIGRACION HFC -->
                @if ($registro->Select_Postventa === 'MIGRACION')
                <div class="form-group-container">
                    <div class="form-group-container" id="PostventaMigracionHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadMigracionHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadMigracionHfc" id="TipoActividadMigracionHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadMigracionHfc}}">
                                    {{ $registro->TipoActividadMigracionHfc}}</option>

                            </select>
                        </div>

                        @if ($registro->TipoActividadMigracionHfc === 'REALIZADA')
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
                                            name="equipotvmigracion1" placeholder="Equipo Tv 1"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipotvmigracion1}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion2"
                                            name="equipotvmigracion2" placeholder="Equipo Tv 2"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipotvmigracion2}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion3"
                                            name="equipotvmigracion3" placeholder="Equipo Tv 3"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipotvmigracion3}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion4"
                                            name="equipotvmigracion4" placeholder="Equipo Tv 4"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipotvmigracion4}}" />
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control equipotvHfc" id="equipotvmigracion5"
                                            name="equipotvmigracion5" placeholder="Equipo Tv 5"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->equipotvmigracion5}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="NOrdenMigracionHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NOrdenMigracionHfc"
                                            placeholder="N° Orden" name="NOrdenMigracionHfc" autocomplete="off"
                                            value="{{ $registro->NOrdenMigracionHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="SyrengMigracionHfc">SYRENG</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="SyrengMigracionHfc"
                                            name="SyrengMigracionHfc" placeholder="Ingresa N° SYRENG" autocomplete="off"
                                            value="{{ $registro->SyrengMigracionHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="SapMigracionHfc">SAP</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="SapMigracionHfc"
                                            name="SapMigracionHfc" oninput="this.value = this.value.toUpperCase()"
                                            placeholder="Ingresa SAP" autocomplete="off"
                                            value="{{ $registro->SapMigracionHfc}}" />
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
                                            name="ObvsMigracionHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsMigracionHfc}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoMigracionHfc"
                                                name="TrabajadoMigracionHfc"
                                                {{ $registro->TrabajadoMigracionHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            class="form-control" id="RecibeMigracionHfc" name="RecibeMigracionHfc"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeMigracionHfc}}" />
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
                                                            name="NodoMigracionHfc" placeholder="Ingresa Nodo"
                                                            oninput="this.value = this.value.toUpperCase()"
                                                            autocomplete="off"
                                                            value="{{ $registro->NodoMigracionHfc}}" />
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
                                                            name="TapMigracionRealizadaHfc" placeholder="Ingresa TAP"
                                                            autocomplete="off"
                                                            value="{{ $registro->TapMigracionRealizadaHfc}}" />
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
                                                            placeholder="Ingresa Posicion" autocomplete="off"
                                                            value="{{ $registro->PosicionMigracionHfc}}" />
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
                                                            name="GeorefMigracionHfc"
                                                            oninput="this.value = this.value.toUpperCase()"
                                                            placeholder="Latitud, Longitud" autocomplete="off"
                                                            value="{{ $registro->GeorefMigracionHfc}}" />
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
                                                            placeholder="Comentarios..."
                                                            oninput="this.value = this.value.toUpperCase()"
                                                            autocomplete="off"
                                                            value="{{ $registro->MaterialesMigracionHfc}}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadMigracionHfc === 'OBJETADA')
                        <!-- OBJETADA -->
                        <div class="PostventaMigracionHfcHidden" id="ObjetadaMigracionHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoMigracionObjHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoMigracionObjHfc" tabindex="-1"
                                            id="MotivoMigracionObjHfc" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoMigracionObjHfc}}">
                                                {{ $registro->MotivoMigracionObjHfc}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN
                                                SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN
                                                SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                / PROGRAMA
                                                ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="OrdenMigracionHfcObj"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenMigracionHfcObj"
                                                placeholder="N° Orden" name="OrdenMigracionHfcObj"
                                                value="{{ $registro->OrdenMigracionHfcObj}}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoMigracionObjHfc" name="TrabajadoMigracionObjHfc"
                                                    {{ $registro->TrabajadoMigracionObjHfc === 'TRABAJADO' ? 'checked' : '' }} />
                                                <label class=" form-check-label" for="">
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsMigracionObjHfc}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentsMigracionObjHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentsMigracionObjHfc"
                                                name="ComentsMigracionObjHfc" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentsMigracionObjHfc}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadMigracionHfc === 'TRANSFERIDA')
                        <!-- TRANSFERIDA -->
                        <div class="PostventaMigracionHfcHidden" id="TranferidaMigracionHfc">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="OrdenMigracionTranfHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenMigracionTranfHfc"
                                            placeholder="N° Orden" name="OrdenMigracionTranfHfc" autocomplete="off"
                                            value="{{ $registro->OrdenMigracionTranfHfc}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoMigracionTransHfc" name="TrabajadoMigracionTransHfc"
                                                {{ $registro->TrabajadoMigracionTransHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="MotivoTransMigracionHfc" placeholder="Ingresa motivo transferido"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->MotivoTransMigracionHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentsMigracionTransHfc">Comentarios</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentsMigracionTransHfc"
                                            name="ComentsMigracionTransHfc" placeholder="Comentarios..."
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentsMigracionTransHfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadMigracionHfc === 'ANULACION')
                        <!-- ANULACION -->
                        <div class="PostventaMigracionHfcHidden" id="AnuladaMigracionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoMigracionAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoMigracionAnulada_Hfc" tabindex="-1"
                                            id="MotivoMigracionAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoMigracionAnulada_Hfc}}">
                                                {{ $registro->MotivoMigracionAnulada_Hfc}}
                                            </option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">
                                                CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO
                                                LIBRE EN
                                                DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY
                                                DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE
                                                INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL
                                                ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED
                                                FISICA INSTALADA
                                                PERO NO ACTIVA </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA
                                                TECNOLOGIA)
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="NOrdenMigracionAnuladaHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="NOrdenMigracionAnuladaHfc"
                                            placeholder="N° Orden" name="NOrdenMigracionAnuladaHfc" autocomplete="off"
                                            value="{{ $registro->NOrdenMigracionAnuladaHfc}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoMigracionAnulada_Hfc" name="TrabajadoMigracionAnulada_Hfc"
                                                {{ $registro->TrabajadoMigracionAnulada_Hfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentarioMigracionAnulada_Hfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif


                @if ($registro->Select_Postventa === 'RECONEXION / RETIRO')
                <!-- POSTVENTA RECONEXION RETIRO HFC-->
                @if ($registro->tecnologia === 'HFC')
                <div class="form-group-container">
                    <div class="form-group-container" id="PostventaReconexionHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadReconexionHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadReconexionHfc" id="TipoActividadReconexionHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadReconexionHfc}}">
                                    {{ $registro->TipoActividadReconexionHfc}}
                                </option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadReconexionHfc === 'REALIZADA' )
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
                                            placeholder="N° Equipo" name="EquipoModemRetiroHfc"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->EquipoModemRetiroHfc}}" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenRetiroHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenRetiroHfc"
                                            placeholder="N° Orden" name="OrdenRetiroHfc" autocomplete="off"
                                            value="{{ $registro->OrdenRetiroHfc}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoRetiroHfc"
                                                name="TrabajadoRetiroHfc"
                                                {{ $registro->TrabajadoRetiroHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsRetiroHfc}}" />
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
                                            class="form-control" id="RecibeRetiroHfc" name="RecibeRetiroHfc"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeRetiroHfc}}" />
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
                                            name="MaterialesRetiroHfc" placeholder="Comentarios..."
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->MaterialesRetiroHfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadReconexionHfc === 'OBJETADA' )
                        <!-- OBJETADA -->
                        <div class="PostventaReconexionHfcHidden" id="ObjetadaReconexionHfc">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjRetiroHfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjRetiroHfc" tabindex="-1"
                                            id="MotivoObjRetiroHfc" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjRetiroHfc}}">
                                                {{ $registro->MotivoObjRetiroHfc}}
                                            </option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON
                                                DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                /
                                                PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenRetiroObjHfc"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="text" class="form-control" id="OrdenRetiroObjHfc"
                                                placeholder="N° Orden" name="OrdenRetiroObjHfc" autocomplete="off"
                                                value="{{ $registro->OrdenRetiroObjHfc}}" />
                                        </div>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjRetiroHfc" name="TrabajadoObjRetiroHfc"
                                                    {{ $registro->TrabajadoObjRetiroHfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                name="ObvsObjRetiroHfc" placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsObjRetiroHfc}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosRetiroObjHfc">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosRetiroObjHfc"
                                                name="ComentariosRetiroObjHfc" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosRetiroObjHfc}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($registro->TipoActividadReconexionHfc === 'ANULACION' )
                        <!-- ANULACION -->
                        <div class="PostventaReconexionHfcHidden" id="AnuladaReconexionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoRetiroAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoRetiroAnulada_Hfc" tabindex="-1"
                                            id="MotivoRetiroAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoRetiroAnulada_Hfc}}">
                                                {{ $registro->MotivoRetiroAnulada_Hfc}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA
                                                NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">
                                                CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO
                                                LIBRE
                                                EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE
                                                INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL
                                                ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED
                                                FISICA
                                                INSTALADA
                                                PERO NO ACTIVA </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA
                                                TECNOLOGIA) </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenRetiroAnulacionHfc"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenRetiroAnulacionHfc"
                                            placeholder="N° Orden" name="OrdenRetiroAnulacionHfc" autocomplete="off"
                                            value="{{ $registro->OrdenRetiroAnulacionHfc}}" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoRetiroAnulada_Hfc" name="TrabajadoRetiroAnulada_Hfc"
                                                {{ $registro->TrabajadoRetiroAnulada_Hfc === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ComentsRetiroAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentsRetiroAnulada_Hfc}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                @if ($registro->tecnologia === 'DTH')
                <div class="form-group-container">
                    <div class="form-group-container" id="PostventaReconexionDth">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadReconexionDth">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadReconexionDth" id="TipoActividadReconexionDth" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadReconexionDth}}">
                                    {{ $registro->TipoActividadReconexionDth}}
                                </option>
                            </select>
                        </div>

                        @if ($registro->TipoActividadReconexionDth === 'REALIZADA' )
                        <!-- REALIZADA -->
                        <div class="PostventaReconexionDthHidden" id="RealizaReconexionDth">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="EquipoModemRetiroDth">
                                        Equipo a retirar
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="EquipoModemRetiroDth"
                                            placeholder="N° Equipo" name="EquipoModemRetiroDth"
                                            oninput="this.value = this.value.toUpperCase()"
                                            value="{{ $registro->EquipoModemRetiroDth}}" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenRetiroDth"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenRetiroDth"
                                            placeholder="N° Orden" name="OrdenRetiroDth" autocomplete="off"
                                            value="{{ $registro->OrdenRetiroDth}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoRetiroDth"
                                                name="TrabajadoRetiroDth"
                                                {{ $registro->TrabajadoRetiroDth === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ObvsRetiroDth">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObvsRetiroDth" name="ObvsRetiroDth"
                                            placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsRetiroDth}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="RecibeRetiroDth">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeRetiroDth" name="RecibeRetiroDth"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeRetiroDth}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="MaterialesRetiroDth">
                                        Materiales
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="MaterialesRetiroDth"
                                            name="MaterialesRetiroDth" placeholder="Comentarios..."
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->MaterialesRetiroDth}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($registro->TipoActividadReconexionDth === 'OBJETADA' )
                        <div id="ObjetadaReconexionDth"></div>
                        @endif

                        @if ($registro->TipoActividadReconexionDth === 'ANULACION' )
                        <!-- ANULACION -->
                        <div class="PostventaReconexionDthHidden" id="AnuladaReconexionDth">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoRetiroAnulada_Dth">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoRetiroAnulada_Dth" tabindex="-1"
                                            id="MotivoRetiroAnulada_Dth" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoRetiroAnulada_Dth}}">
                                                {{ $registro->MotivoRetiroAnulada_Dth}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA
                                                NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">
                                                CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO
                                                LIBRE
                                                EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE
                                                INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL
                                                ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED
                                                FISICA
                                                INSTALADA
                                                PERO NO ACTIVA </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA
                                                TECNOLOGIA) </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenRetiroAnulacionDth"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="text" class="form-control" id="OrdenRetiroAnulacionDth"
                                            placeholder="N° Orden" name="OrdenRetiroAnulacionDth"
                                            value="{{ $registro->OrdenRetiroAnulacionDth}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoRetiroAnulada_Dth" name="TrabajadoRetiroAnulada_Dth"
                                                {{ $registro->TrabajadoRetiroAnulada_Dth === 'TRABAJADO' ? 'checked' : '' }} />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentsRetiroAnulada_Dth">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentsRetiroAnulada_Dth"
                                            name="ComentsRetiroAnulada_Dth" placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ComentsRetiroAnulada_Dth}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                @endif



                @if ($registro->Select_Postventa === 'CAMBIO NUMERO COBRE')
                <!-- POSTVENTA CAMBIO NUMERO DE COBRE -->
                <div class="form-group-container">
                    <div class="form-group-container" id="PostventaCambioNumeroCobre">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadCambioNumeroCobre">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadCambioNumeroCobre" id="TipoActividadCambioNumeroCobre" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="{{ $registro->TipoActividadCambioNumeroCobre}}">
                                    {{ $registro->TipoActividadCambioNumeroCobre}}
                                </option>

                                <!-- <option value="TRANSFERIDA">TRANSFERIDA</option> -->
                            </select>
                        </div>

                        @if ($registro->TipoActividadCambioNumeroCobre === 'REALIZADA')
                        <!-- REALIZADA -->
                        <div class="PostventaCambioNumeroCobreHidden" id="RealizaCambioNumeroCobre">
                            <div class="form-group-container">
                                <div class="form-group col-md-3">
                                    <label for="NumeroCobreCambio"> Numero Cobre </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="NumeroCobreCambio"
                                            placeholder="N° Cobre" name="NumeroCobreCambio"
                                            value="{{ $registro->NumeroCobreCambio}}" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenCambioCobre"> Orden </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control" id="OrdenCambioCobre"
                                            placeholder="N° Orden" name="OrdenCambioCobre" autocomplete="off"
                                            value="{{ $registro->OrdenCambioCobre}}" />
                                    </div>
                                </div>
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoCambioCobre"
                                                name="TrabajadoCambioCobre"
                                                {{ $registro->TrabajadoCambioCobre === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            name="ObvsCambioCobre" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->ObvsCambioCobre}}" />
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
                                            class="form-control" id="RecibeCambioCobre" name="RecibeCambioCobre"
                                            oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                            value="{{ $registro->RecibeCambioCobre}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- OBJETADA -->
                        @if ($registro->TipoActividadCambioNumeroCobre === 'OBJETADA')
                        <div class="PostventaCambioNumeroCobreHidden" id="ObjetadaCambioNumeroCobre">
                            <div class="">
                                <div class="form-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjCambioCobre">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjCambioCobre" tabindex="-1"
                                            id="MotivoObjCambioCobre" aria-hidden="true">
                                            <option selected="selected" value="{{ $registro->MotivoObjCambioCobre}}">
                                                {{ $registro->MotivoObjCambioCobre}}</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS
                                            </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO
                                                INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON
                                                PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM INEXISTENTE
                                            </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE
                                                INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM
                                                CON
                                                DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA
                                            </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA
                                                /
                                                PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="OrdenObjCambioCobre"> Orden </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <input type="number" class="form-control" id="OrdenObjCambioCobre"
                                                placeholder="N° Orden" name="OrdenObjCambioCobre"
                                                value="{{ $registro->OrdenObjCambioCobre}}" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoObjCambioCobre" name="TrabajadoObjCambioCobre"
                                                    {{ $registro->TrabajadoObjCambioCobre === 'TRABAJADO' ? 'checked' : '' }} />
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
                                                placeholder="Ingresa las observaciones del caso"
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ObvsObjCambioCobre}}" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosCambioCobre">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosCambioCobre"
                                                name="ComentariosCambioCobre" placeholder="Comentarios..."
                                                oninput="this.value = this.value.toUpperCase()" autocomplete="off"
                                                value="{{ $registro->ComentariosCambioCobre}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        @if ($registro->TipoActividadCambioNumeroCobre === 'ANULACION')
                        <!-- ANULACION -->
                        <div class="PostventaCambioNumeroCobreHidden" id="AnuladaCambioNumeroCobre">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAnuladaCambioCobre">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAnuladaCambioCobre" tabindex="-1"
                                            id="MotivoAnuladaCambioCobre" aria-hidden="true">
                                            <option selected="selected"
                                                value="{{ $registro->MotivoAnuladaCambioCobre}}">
                                                {{ $registro->MotivoAnuladaCambioCobre}}</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">
                                                CASA
                                                NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO
                                                DESEA EL
                                                SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE
                                                LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA
                                                TIENE EL
                                                SERVICIO
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">
                                                CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA) </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">
                                                DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">
                                                NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER </option>
                                            <option value="NO HAY NUMERACION EN CONCENTRADOR">NO HAY
                                                NUMERACION EN
                                                CONCENTRADOR </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA"> RED SATURADA </option>
                                            <option value="SOLICITUD MAL REGISTRADA">SOLICITUD MAL
                                                REGISTRADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA
                                            </option>
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
                                            placeholder="Ingresa N° Orden"
                                            value="{{ $registro->OrdenAnuladaCambioCobre}}" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="TrabajadoAnuladaCambioCobre" name="TrabajadoAnuladaCambioCobre"
                                                {{ $registro->TrabajadoAnuladaCambioCobre === 'TRABAJADO' ? 'checked' : '' }} />
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
                                            placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()"
                                            value="{{ $registro->ComentarioAnuladaCambioCobre}}" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <div class="box-footer" id="btn-submit"
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
});

// window.location = window.location;
</script>







@endif @endsection @section('styles')

<!-- SweetAlert -->
<link href="{{ asset('/plugins/CdnMigraciones/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('/plugins/CdnMigraciones/sweetalert2.all.min.js') }}"></script>

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
<script src="{{asset('/js/actualizarDatos/ValidacionTecnico.js')}}" type="text/javascript"></script>

@if ($registro->Select_Postventa === 'CAMBIO NUMERO COBRE' && $registro->tecnologia === 'COBRE' &&
$registro->TipoActividadCambioNumeroCobre === 'REALIZADA' )
<script src="{{asset('/js/actualizarDatos/postventas/CambioCobre/cambiocobreRealizado.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO NUMERO COBRE' && $registro->tecnologia === 'COBRE' &&
$registro->TipoActividadCambioNumeroCobre === 'OBJETADA' )
<script src="{{asset('/js/actualizarDatos/postventas/CambioCobre/cambiocobreObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO NUMERO COBRE' && $registro->tecnologia === 'COBRE' &&
$registro->TipoActividadCambioNumeroCobre === 'ANULACION' )
<script src="{{asset('/js/actualizarDatos/postventas/CambioCobre/cambiocobreAnul.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'RECONEXION / RETIRO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadReconexionDth === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/reconexion/reconexiondth.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'RECONEXION / RETIRO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadReconexionDth === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/reconexion/reconexionDthAnul.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'RECONEXION / RETIRO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadReconexionHfc === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/reconexion/reconexionHfc.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'RECONEXION / RETIRO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadReconexionHfc === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/reconexion/reconexionHfcAnul.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'MIGRACION' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadMigracionHfc === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/migracion/migracionHfc.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'MIGRACION' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadMigracionHfc === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/migracion/migracionHfcObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'MIGRACION' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadMigracionHfc === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/migracion/migracionHfcAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'MIGRACION' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadMigracionHfc === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/postventas/migracion/migracionHfcTrans.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadCambioDth === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/DTH/cambioEquipoDth.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadCambioDth === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/DTH/cambioEquipoDthObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadCambioDth === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/DTH/cambioEquipoDthAnul.js')}}"
    type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'ADSL' &&
$registro->TipoActividadCambioAdsl === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/ADSL/cambioEquipoAdsl.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'ADSL' &&
$registro->TipoActividadCambioAdsl === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/ADSL/cambioEquipoAdslObj.js')}}"
    type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'ADSL' &&
$registro->TipoActividadCambioAdsl === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/ADSL/cambioEquipoAdslAnul.js')}}"
    type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadCambioGpon === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/GPON/cambioEquipoGpon.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadCambioGpon === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/GPON/cambioEquipoGponObj.js')}}"
    type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadCambioGpon === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/GPON/cambioEquipoGponAnul.js')}}"
    type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadCambioHfc === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/HFC/cambioEquipoHfc.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadCambioHfc === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/HFC/cambioEquipoHfcObj.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'CAMBIO DE EQUIPO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadCambioHfc === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/CambioEquipo/HFC/cambioEquipoHfcAnul.js')}}"
    type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadAdicionHfc === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/HFC/adicionHfc.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadAdicionHfc === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/HFC/adicionHfcObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadAdicionHfc === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/HFC/adicionHfcAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadAdicionGpon === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/GPON/adicionGpon.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadAdicionGpon === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/GPON/adicionGponObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadAdicionGpon === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/GPON/adicionGponAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadAdicionDth === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/DTH/adicionDth.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadAdicionDth === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/DTH/adicionDthObj.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'ADICION' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadAdicionDth === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Adicion/DTH/adicionDthAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadTrasladoHfc === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/HFC/trasladosHfc.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadTrasladoHfc === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/HFC/trasladosHfcObj.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadTrasladoHfc === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/HFC/trasladosHfcAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'HFC' &&
$registro->TipoActividadTrasladoHfc === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/HFC/trasladosHfcTrans.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadTrasladoGpon === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/GPON/trasladoGpon.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadTrasladoGpon === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/GPON/trasladosGponObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadTrasladoGpon === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/GPON/trasladoGponAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'GPON' &&
$registro->TipoActividadTrasladoGpon === 'TRANSFERIDA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/GPON/trasladoGponTrans.js')}}" type="text/javascript">
</script>
@endif


@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'ADSL' &&
$registro->TipoActividadTrasladoAdsl === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/ADSL/trasladoAdsl.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'ADSL' &&
$registro->TipoActividadTrasladoAdsl === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/ADSL/trasladoAdslObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'ADSL' &&
$registro->TipoActividadTrasladoAdsl === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/ADSL/trasladoAdslAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'COBRE' &&
$registro->TipoActividadTrasladoCobre === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/COBRE/trasladoCobre.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'COBRE' &&
$registro->TipoActividadTrasladoCobre === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/COBRE/trasladoCobreObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'COBRE' &&
$registro->TipoActividadTrasladoCobre === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/COBRE/trasladoCobreAnul.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadTrasladoDth === 'REALIZADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/DTH/trasladoDth.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadTrasladoDth === 'OBJETADA')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/DTH/trasladoDthObj.js')}}" type="text/javascript">
</script>
@endif

@if ($registro->Select_Postventa === 'TRASLADO' && $registro->tecnologia === 'DTH' &&
$registro->TipoActividadTrasladoDth === 'ANULACION')
<script src="{{asset('/js/actualizarDatos/postventas/Traslados/DTH/trasladoDthAnul.js')}}" type="text/javascript">
</script>
@endif

@endsection