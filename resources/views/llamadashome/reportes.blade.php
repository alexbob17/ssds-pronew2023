@extends('app') @section('content')

<head>
    <script>
    window.onload = function() {
        document.getElementById("motivo_llamada").value = "";
    };
    </script>
</head>
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
                <h3 class="box-title">Datos Reporte</h3>
            </div>
            <!-- FORMULARIO #1 INICIAL CAMPOS NECESARIOS -->
            <form action="{{ route('reporte.generar') }}" method="POST" id="form1" class="formulario box-body"
                style="padding-top: 15px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="selected_fields" id="selected-fields" />

                <div class="form-group-container">
                    <div class="form-group">
                        <div class="form-group col-md-3">
                            <label for="fecha_inicio">FECHA INICIO</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" name="fecha_inicio" id="fecha_inicio"
                                    placeholder="Ingresa Fecha" type="text" data-provide="datepicker"
                                    data-date-format="yyyy-mm-dd" autocomplete="off" required />
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="fecha_fin">FECHA FIN</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Ingresa Fecha"
                                    type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                                    autocomplete="off" required />
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="motivo_llamada">TIPO LLAMADA</label>
                            <select class="form-control" style="width: 100%;" name="motivo_llamada" tabindex="-1"
                                id="motivo_llamada" aria-hidden="true" required>
                                <option value="" selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="INSTALACION">INSTALACION</option>
                                <option value="POSTVENTA">POSTVENTA</option>
                                <option value="REPARACIONES">REPARACIONES</option>
                                <option value="AGENDAMIENTOS">AGENDAMIENTOS</option>
                                <option value="CONSULTAS">CONSULTAS</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="tipo_postventa">TIPO POSTVENTA</label>
                            <select class="form-control" style="width: 100%;" name="tipo_postventa" tabindex="-1"
                                id="tipo_postventa" aria-hidden="true">
                                <option value="" selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="TRASLADO">TRASLADO</option>
                                <option value="ADICION">ADICION</option>
                                <option value="CAMBIO DE EQUIPO">CAMBIO DE EQUIPO</option>
                                <option value="MIGRACION">MIGRACION</option>
                                <option value="RECONEXION / RETIRO">RECONEXION / RETIRO</option>
                                <option value="CAMBIO NUMERO COBRE">CAMBIO NUMERO COBRE</option>
                            </select>
                        </div>


                    </div>
                </div>

                <div class="form-group-container">

                    <div class="form-group col-md-3">
                        <label for="tecnologia">TECNOLOGIA</label>
                        <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1"
                            id="tecnologia" aria-hidden="true" required>
                            <option value="" selected="selected">SELECCIONE UNA OPCION</option>
                            <option value="TODOS">---TODAS LAS TECNOLOGIAS---</option>
                            <option value="HFC">HFC</option>
                            <option value="GPON">GPON</option>
                            <option value="ADSL">ADSL</option>
                            <option value="COBRE">COBRE</option>
                            <option value="DTH">DTH</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo_actividad">TIPO ACTIVIDAD</label>
                        <select class="form-control" style="width: 100%;" name="tipo_actividad" tabindex="-1"
                            id="tipo_actividad" aria-hidden="true" required>
                            <option value="" selected="selected">SELECCIONE UNA OPCION</option>
                            <option value="REALIZADA">REALIZADA</option>
                            <option value="OBJETADA">OBJETADA</option>
                            <option value="TRANSFERIDA">TRANSFERIDA</option>
                            <option value="ANULADA">ANULADA</option>
                            <option value="PENDIENTES">PENDIENTES</option>
                            <option value="REFRESH">REFRESH</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="usersall">USUARIOS</label>
                        <select class="form-control" style="width: 100%;" name="usersall" tabindex="-1" id="usersall"
                            aria-hidden="true" required>
                            <option value="" selected="selected">SELECCIONE UNA OPCION</option>
                            <option value="TODOS">---TODOS LOS USUARIOS---</option>
                            @foreach($users as $user)
                            <option value="{{ $user }}">{{ $user }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="" id="btn-submit" style="margin-top:2.5rem">
                        <button type="submit" class="btn btn-primary" style="margin-left:1.7rem;!important"><i
                                class="fa-solid fa-floppy-disk" style="padding-right:10px;!important"></i>GENERAR
                            REPORTE</button>
                        <button type="button" id="btn_reiniciar" class="btn btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>

                </div>


            </form>


        </div>

        <div class="box box-warning" style="border-top:0px solid transparent">
            <div class="">
                @if($llamada_motivo == 'CONSULTAS')

                <div class="table-responsive">
                    <table class="table" id="TableTecnico" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table table-striped table-bordered">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;
                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable=" true">Cod</th>
                            <th data-sortable=" true">Teléfono</th>
                            <th data-sortable=" true">Técnico</th>
                            <th data-sortable=" true">Motivo Llamada</th>
                            <th data-sortable=" true">Motivo Consulta</th>
                            <th data-sortable=" true">Detalles Motivo</th>
                            <th data-sortable=" true">Orden</th>
                            <th data-sortable=" true">Observaciones</th>
                            <th data-sortable=" true">Usuario</th>
                            <th data-sortable=" true">Fecha </th>
                        </thead>
                        <tbody>
                            <!-- <div id="resultados"></div> -->

                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->MotivoConsulta }}</td>
                                <td>{{ $resultado->TipoMotivoConsulta }}</td>
                                <td>{{ $resultado->OrdenConsulta }}</td>
                                <td>{{ $resultado->ObvsConsulta }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                @elseif($llamada_motivo == 'AGENDAMIENTOS')

                <div class="table-responsive">
                    <table id="TableTecnicoAgendamiento" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table table-striped table-bordered">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Agendamiento</th>
                            <th data-sortable="true">Tipo Agendamiento</th>
                            <th data-sortable="true">Fecha</th>
                            <th data-sortable="true">Hora</th>
                            <th data-sortable="true">Orden</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">usuario</th>
                            <th data-sortable="true">Fecha Creacion</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->Agendamiento }}</td>
                                <td>{{ $resultado->TipoAgendamiento }}</td>
                                <td>{{ $resultado->fecha_registro }}</td>
                                <td>{{ $resultado->hora_registro}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Observaciones }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadDth}}</td>
                                <td>{{ $resultado->MotivoAnulada_Dth}}</td>
                                <td>{{ $resultado->OrdenAnulada_Dth}}</td>
                                <td>{{ $resultado->ComentarioAnulada_Dth}}</td>
                                <td>{{ $resultado->TrabajadoAnulada_Dth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadDth}}</td>
                                <td>{{ $resultado->MotivoObjetada_Dth}}</td>
                                <td>{{ $resultado->OrdenObj_Dth}}</td>
                                <td>{{ $resultado->ComentarioObjetado_Dth}}</td>
                                <td>{{ $resultado->TrabajadoObj_Dth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">SAP</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadDth}}</td>
                                <td>{{ $resultado->ordenTv_Dth}}</td>
                                <td>{{ $resultado->sap_dth}}</td>
                                <td>{{ $resultado->ObservacionesDth}}</td>
                                <td>{{ $resultado->RecibeDth}}</td>
                                <td>{{ $resultado->TrabajadoDth}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadDth}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadCobre}}</td>
                                <td>{{ $resultado->MotivoAnulada_Cobre}}</td>
                                <td>{{ $resultado->OrdenAnuladaCobre}}</td>
                                <td>{{ $resultado->ComentarioAnulada_Cobre}}</td>
                                <td>{{ $resultado->TrabajadoAnulada_Cobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadCobre}}</td>
                                <td>{{ $resultado->MotivoObjetada_Cobre}}</td>
                                <td>{{ $resultado->OrdenCobre_Objetada}}</td>
                                <td>{{ $resultado->ComentariosCobre_Objetados}}</td>
                                <td>{{ $resultado->TrabajadoCobre_Objetado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Numero Cobre</th>
                            <th data-sortable="true">Sap Cobre</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadCobre}}</td>
                                <td>{{ $resultado->NumeroCobre}}</td>
                                <td>{{ $resultado->sap_cobre}}</td>
                                <td>{{ $resultado->OrdenLineaCobre}}</td>
                                <td>{{ $resultado->ObservacionesCobre}}</td>
                                <td>{{ $resultado->RecibeCobre }}</td>
                                <td>{{ $resultado->TrabajadoCobre }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadCobre}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadAdsl}}</td>
                                <td>{{ $resultado->MotivoAnulada_Adsl}}</td>
                                <td>{{ $resultado->OrdenAnuladaAdsl}}</td>
                                <td>{{ $resultado->ComentarioAnulada_Adsl}}</td>
                                <td>{{ $resultado->TrabajadoAnulada_Adsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadAdsl}}</td>
                                <td>{{ $resultado->MotivoObjetada_Adsl}}</td>
                                <td>{{ $resultado->OrdenAdsl_Objetada}}</td>
                                <td>{{ $resultado->ComentariosObjetada_Adsl}}</td>
                                <td>{{ $resultado->TrabajadoAdslObjetado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                        text-align: center;
                                        background:#17467d;
                                        padding: 10px;
                                        font-size: 16px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        opacity:0.9;

                                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadAdsl}}</td>
                                <td>{{ $resultado->orden_internet_adsl}}</td>
                                <td>{{ $resultado->Obvservaciones_Adsl}}</td>
                                <td>{{ $resultado->Recibe_Adsl }}</td>
                                <td>{{ $resultado->TrabajadoAdsl }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadAdsl}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadGpon}}</td>
                                <td>{{ $resultado->MotivoAnulada_Gpon}}</td>
                                <td>{{ $resultado->OrdenInternet_Gpon}}</td>
                                <td>{{ $resultado->ComentarioAnulada_Gpon}}</td>
                                <td>{{ $resultado->TrabajadoAnulada_Gpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadGpon}}</td>
                                <td>{{ $resultado->MotivoObjetado_Gpon}}</td>
                                <td>{{ $resultado->OrdenInternet_Gpon}}</td>
                                <td>{{ $resultado->OrdenTv_Gpon}}</td>
                                <td>{{ $resultado->OrdenLinea_Gpon}}</td>
                                <td>{{ $resultado->ComentariosGpon_Objetada}}</td>
                                <td>{{ $resultado->TrabajadoGpon_Objetado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;

                            ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Transferido</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadGpon}}</td>
                                <td>{{ $resultado->MotivoTransferidoGpon}}</td>
                                <td>{{ $resultado->OrdenInternet_Gpon}}</td>
                                <td>{{ $resultado->OrdenTv_Gpon}}</td>
                                <td>{{ $resultado->OrdenLinea_Gpon}}</td>
                                <td>{{ $resultado->ComentarioTransferido_Gpon}}</td>
                                <td>{{ $resultado->TrabajadoTransferido_Gpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">SAP</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadGpon}}</td>
                                <td>{{ $resultado->SapGpon}}</td>
                                <td>{{ $resultado->OrdenInternet_Gpon}}</td>
                                <td>{{ $resultado->OrdenTv_Gpon}}</td>
                                <td>{{ $resultado->OrdenLinea_Gpon}}</td>
                                <td>{{ $resultado->ObservacionesGpon}}</td>
                                <td>{{ $resultado->RecibeGpon }}</td>
                                <td>{{ $resultado->TrabajadoGpon }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;">

                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadGpon}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;

                            ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->MotivoAnulada_Hfc}}</td>
                                <td>{{ $resultado->orden_internet_hfc}}</td>
                                <td>{{ $resultado->orden_tv_hfc}}</td>
                                <td>{{ $resultado->orden_linea_hfc}}</td>
                                <td>{{ $resultado->ComentarioAnulada_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoAnulada_Hfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                            text-align: center;
                            background:#17467d;
                            padding: 10px;
                            font-size: 16px;
                            font-weight: 500;
                            color: #ffffff;
                            opacity:0.9;

                        ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->MotivoObjetada_Hfc}}</td>
                                <td>{{ $resultado->orden_tv_hfc}}</td>
                                <td>{{ $resultado->orden_internet_hfc}}</td>
                                <td>{{ $resultado->orden_linea_hfc}}</td>
                                <td>{{ $resultado->ComentariosObjetados_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoObjetadaHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                            text-align: center;
                            background:#17467d;
                            padding: 10px;
                            font-size: 16px;
                            font-weight: 500;
                            color: #ffffff;
                            opacity:0.9;

                        ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Transferido</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->MotivoTransferidoHfc}}</td>
                                <td>{{ $resultado->orden_tv_hfc}}</td>
                                <td>{{ $resultado->orden_internet_hfc}}</td>
                                <td>{{ $resultado->orden_linea_hfc}}</td>
                                <td>{{ $resultado->ComentariosTransferida_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoTransferido_Hfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                        ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">SAP</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->sapHfc}}</td>
                                <td>{{ $resultado->orden_tv_hfc}}</td>
                                <td>{{ $resultado->orden_internet_hfc}}</td>
                                <td>{{ $resultado->orden_linea_hfc}}</td>
                                <td>{{ $resultado->ObservacionesHfc}}</td>
                                <td>{{ $resultado->RecibeHfc }}</td>
                                <td>{{ $resultado->TrabajadoHfc }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'REFRESH')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                        ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">Tipo Refresh</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->orden_tv_hfc}}</td>
                                <td>{{ $resultado->orden_internet_hfc}}</td>
                                <td>{{ $resultado->refreshSelect}}</td>
                                <td>{{ $resultado->ComentarioRefresh_Hfc }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                    ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;

                            ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{$resultado->Motivo_Objetada}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                            text-align: center;
                            background:#17467d;
                            padding: 10px;
                            font-size: 16px;
                            font-weight: 500;
                            color: #ffffff;
                            opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{$resultado->Motivo_Anulada}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad ===
                'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Transferido</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->Motivo_Transferido}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                            text-align: center;
                            background:#17467d;
                            padding: 10px;
                            font-size: 16px;
                            font-weight: 500;
                            color: #ffffff;
                            opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad ==='TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo Actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionDth}}</td>
                                <td>{{ $resultado->OrdenTransferidoDth}}</td>
                                <td>{{ $resultado->ComentarioTransferidoDth}}</td>
                                <td>{{ $resultado->TrabajadoTransferidoDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionDth}}</td>
                                <td>{{ $resultado->OrdenObjDth}}</td>
                                <td>{{ $resultado->MotivoObjetada_Dth}}</td>
                                <td>{{ $resultado->ComentariosObjetadosDth}}</td>
                                <td>{{ $resultado->TrabajadoObjetadaDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Codigo Causa</th>
                            <th data-sortable="true">Descripcion Causa</th>
                            <th data-sortable="true">Descripcion Tipo Daño</th>
                            <th data-sortable="true">Descripcion Ubicacion Daño</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionDth}}</td>
                                <td>{{ $resultado->CodigoCausaDth}}</td>
                                <td>{{ $resultado->DescripcionCausaDth}}</td>
                                <td>{{ $resultado->DescripcionTipoDañoDth}}</td>
                                <td>{{ $resultado->DescripcionUbicacionDañoDth}}</td>
                                <td>{{ $resultado->OrdenDthRealizada}}</td>
                                <td>{{ $resultado->ObservacionesDth}}</td>
                                <td>{{ $resultado->RecibeDth}}</td>
                                <td>{{ $resultado->TrabajadoDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                            text-align: center;
                            background:#17467d;
                            padding: 10px;
                            font-size: 16px;
                            font-weight: 500;
                            color: #ffffff;
                            opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionDth}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif($llamada_motivo == 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'REFRESH')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                        text-align: center;
                        background:#17467d;
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 500;
                        color: #ffffff;
                        opacity:0.9;

                        ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Tipo Refresh</th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividadDth}}</td>
                                <td>{{ $resultado->NordenRefresh}}</td>
                                <td>{{ $resultado->refreshSelectDth}}</td>
                                <td>{{ $resultado->ComentarioRefresh_Dth }}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad
                ==='TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo Actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionCobre}}</td>
                                <td>{{ $resultado->OrdenTransfCobre}}</td>
                                <td>{{ $resultado->ComentarioCobreTransferido}}</td>
                                <td>{{ $resultado->TrabajadoCobreTransferido}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionCobre}}</td>
                                <td>{{ $resultado->OrdenObjReparacionCobre}}</td>
                                <td>{{ $resultado->MotivoObjetada_Cobre}}</td>
                                <td>{{ $resultado->ComentariosObjetados_Cobre}}</td>
                                <td>{{ $resultado->TrabajadoObjetadaCobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Codigo Causa</th>
                            <th data-sortable="true">Descripcion Causa</th>
                            <th data-sortable="true">Descripcion Tipo Daño</th>
                            <th data-sortable="true">Descripcion Ubicacion Daño</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionCobre}}</td>
                                <td>{{ $resultado->CodigoCausaCobre}}</td>
                                <td>{{ $resultado->DescripcionCausaCobre}}</td>
                                <td>{{ $resultado->DescripcionTipoDañoCobre}}</td>
                                <td>{{ $resultado->DescripcionUbicacionDañoCobre}}</td>
                                <td>{{ $resultado->OrdenReparacionCobre}}</td>
                                <td>{{ $resultado->ObservacionesCobre}}</td>
                                <td>{{ $resultado->RecibeCobre}}</td>
                                <td>{{ $resultado->TrabajadoCobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad ===
                'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionCobre}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad
                ==='TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo Actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionAdsl}}</td>
                                <td>{{ $resultado->OrdenTransferidoAdsl}}</td>
                                <td>{{ $resultado->ComentsTransferidoAdsl}}</td>
                                <td>{{ $resultado->TrabajadoTransferidoAdsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionAdsl}}</td>
                                <td>{{ $resultado->OrdenObjAdsl}}</td>
                                <td>{{ $resultado->MotivoObjetada_Adsl}}</td>
                                <td>{{ $resultado->ComentsObjAdsl}}</td>
                                <td>{{ $resultado->TrabajadoObjetadaAdsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Codigo Causa</th>
                            <th data-sortable="true">Descripcion Causa</th>
                            <th data-sortable="true">Descripcion Tipo Daño</th>
                            <th data-sortable="true">Descripcion Ubicacion Daño</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionAdsl}}</td>
                                <td>{{ $resultado->CodigoCausaAdsl}}</td>
                                <td>{{ $resultado->DescripcionCausaAdsl}}</td>
                                <td>{{ $resultado->DescripcionTipoDañoAdsl}}</td>
                                <td>{{ $resultado->DescripcionUbicacionDañoAdsl}}</td>
                                <td>{{ $resultado->OrdenAdslRealizado}}</td>
                                <td>{{ $resultado->ObservacionesAdsl}}</td>
                                <td>{{ $resultado->RecibeAdsl}}</td>
                                <td>{{ $resultado->TrabajadoAdsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad ===
                'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionAdsl}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad
                ==='TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo Actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionGpon}}</td>
                                <td>{{ $resultado->OrdenTransGpon}}</td>
                                <td>{{ $resultado->ComentarioTransfGpon}}</td>
                                <td>{{ $resultado->TrabajadoTransfGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionGpon}}</td>
                                <td>{{ $resultado->OrdenObjGpon}}</td>
                                <td>{{ $resultado->MotivoObjetada_Gpon}}</td>
                                <td>{{ $resultado->ComentariosObjGpon}}</td>
                                <td>{{ $resultado->TrabajadoObjetadaGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Codigo Causa</th>
                            <th data-sortable="true">Descripcion Causa</th>
                            <th data-sortable="true">Descripcion Tipo Daño</th>
                            <th data-sortable="true">Descripcion Ubicacion Daño</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionGpon}}</td>
                                <td>{{ $resultado->CodigoCausaGpon}}</td>
                                <td>{{ $resultado->DescripcionCausaDañoGpon}}</td>
                                <td>{{ $resultado->DescripcionTipoDañoGpon}}</td>
                                <td>{{ $resultado->DescripcionUbicacionGpon}}</td>
                                <td>{{ $resultado->OrdenRealizadoGpon}}</td>
                                <td>{{ $resultado->ObservacionesGpon}}</td>
                                <td>{{ $resultado->RecibeGpon}}</td>
                                <td>{{ $resultado->TrabajadoGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad ===
                'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionGpon}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad
                ==='TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo Actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionHfc}}</td>
                                <td>{{ $resultado->OrdenTransfHfc}}</td>
                                <td>{{ $resultado->ComentarioTransfHfc}}</td>
                                <td>{{ $resultado->TrabajadoTransfHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionHfc}}</td>
                                <td>{{ $resultado->OrdenObjHfc}}</td>
                                <td>{{ $resultado->MotivoObjetada_Hfc}}</td>
                                <td>{{ $resultado->ComentariosObjetados_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoObjetadaHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Codigo Causa</th>
                            <th data-sortable="true">Descripcion Causa</th>
                            <th data-sortable="true">Descripcion Tipo Daño</th>
                            <th data-sortable="true">Descripcion Ubicacion Daño</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Observaciones</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionHfc}}</td>
                                <td>{{ $resultado->CodigoCausaHfc}}</td>
                                <td>{{ $resultado->DescripcionCausaDañoHfc}}</td>
                                <td>{{ $resultado->DescripcionTipoDañoHfc}}</td>
                                <td>{{ $resultado->DescripcionUbicacionHfc}}</td>
                                <td>{{ $resultado->OrdenHfc}}</td>
                                <td>{{ $resultado->ObservacionesHfc}}</td>
                                <td>{{ $resultado->RecibeHfc}}</td>
                                <td>{{ $resultado->TrabajadoHfcRealizado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad ===
                'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReparacionHfc}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Codigo Causa</th>
                            <th data-sortable="true">Descripcion Causa</th>
                            <th data-sortable="true">Descripcion Tipo Daño</th>
                            <th data-sortable="true">Descripcion Ubicacion Daño</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Codigo_Causa}}</td>
                                <td>{{ $resultado->Descripcion_Causa}}</td>
                                <td>{{ $resultado->Descripcion_Tipo_Daño}}</td>
                                <td>{{ $resultado->Descripcion_Ubicacion_Daño}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Recibe}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden </th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Motivo_Objetada}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad ===
                'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                text-align: center;
                                background:#17467d;
                                padding: 10px;
                                font-size: 16px;
                                font-weight: 500;
                                color: #ffffff;
                                opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad ===
                'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                            text-align: center;
                            background:#17467d;
                            padding: 10px;
                            font-size: 16px;
                            font-weight: 500;
                            color: #ffffff;
                            opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion}}</td>
                                <td>{{ $resultado->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO NUMERO COBRE' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioNumeroCobre}}</td>
                                <td>{{ $resultado->MotivoAnuladaCambioCobre}}</td>
                                <td>{{ $resultado->OrdenAnuladaCambioCobre}}</td>
                                <td>{{ $resultado->ComentarioAnuladaCambioCobre}}</td>
                                <td>{{ $resultado->TrabajadoAnuladaCambioCobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO NUMERO COBRE' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioNumeroCobre}}</td>
                                <td>{{ $resultado->MotivoObjCambioCobre}}</td>
                                <td>{{ $resultado->OrdenObjCambioCobre}}</td>
                                <td>{{ $resultado->ComentariosCambioCobre}}</td>
                                <td>{{ $resultado->TrabajadoObjCambioCobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO NUMERO COBRE' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Numero Cobre</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioNumeroCobre}}</td>
                                <td>{{ $resultado->NumeroCobreCambio}}</td>
                                <td>{{ $resultado->OrdenCambioCobre}}</td>
                                <td>{{ $resultado->ObvsCambioCobre}}</td>
                                <td>{{ $resultado->RecibeCambioCobre}}</td>
                                <td>{{ $resultado->TrabajadoCambioCobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO NUMERO COBRE' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioNumeroCobre}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReconexionHfc}}</td>
                                <td>{{ $resultado->MotivoRetiroAnulada_Hfc}}</td>
                                <td>{{ $resultado->OrdenRetiroAnulacionHfc}}</td>
                                <td>{{ $resultado->ComentsRetiroAnulada_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoRetiroAnulada_Hfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReconexionHfc}}</td>
                                <td>{{ $resultado->MotivoObjRetiroHfc}}</td>
                                <td>{{ $resultado->OrdenRetiroObjHfc}}</td>
                                <td>{{ $resultado->ComentariosRetiroObjHfc}}</td>
                                <td>{{ $resultado->TrabajadoObjRetiroHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReconexionHfc}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReconexionDth}}</td>
                                <td>{{ $resultado->OrdenRetiroDth}}</td>
                                <td>{{ $resultado->ObvsRetiroDth}}</td>
                                <td>{{ $resultado->TrabajadoRetiroDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadReconexionDth}}</td>
                                <td>{{ $resultado->OrdenRetiroAnulacionDth}}</td>
                                <td>{{ $resultado->ComentsRetiroAnulada_Dth}}</td>
                                <td>{{ $resultado->TrabajadoRetiroAnulada_Dth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'PENDIENTES')

                <!-- <div class="col-md-4 text-right"> <button id="exporttable" class="btn btn-primary">Export</button>
                </div> -->
                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table" data-show-export="true">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'REALIZADA')


                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table" data-show-export="true">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'ANULADA')


                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table" data-show-export="true">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='RECONEXION / RETIRO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'PENDIENTES')


                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table" data-show-export="true">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='MIGRACION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadMigracionHfc}}</td>
                                <td>{{ $resultado->MotivoMigracionAnulada_Hfc}}</td>
                                <td>{{ $resultado->NOrdenMigracionAnuladaHfc}}</td>
                                <td>{{ $resultado->ComentarioMigracionAnulada_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoMigracionAnulada_Hfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='MIGRACION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadMigracionHfc}}</td>
                                <td>{{ $resultado->MotivoMigracionObjHfc}}</td>
                                <td>{{ $resultado->OrdenMigracionHfcObj}}</td>
                                <td>{{ $resultado->ComentsMigracionObjHfc}}</td>
                                <td>{{ $resultado->TrabajadoMigracionObjHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='MIGRACION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Transferido</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadMigracionHfc}}</td>
                                <td>{{ $resultado->MotivoTransMigracionHfc}}</td>
                                <td>{{ $resultado->OrdenMigracionTranfHfc}}</td>
                                <td>{{ $resultado->ComentsMigracionTransHfc}}</td>
                                <td>{{ $resultado->TrabajadoMigracionTransHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='MIGRACION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">SAP</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadMigracionHfc}}</td>
                                <td>{{ $resultado->SapMigracionHfc}}</td>
                                <td>{{ $resultado->NOrdenMigracionHfc}}</td>
                                <td>{{ $resultado->ObvsMigracionHfc}}</td>
                                <td>{{ $resultado->RecibeMigracionHfc}}</td>
                                <td>{{ $resultado->TrabajadoMigracionHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='MIGRACION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">SAP</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->sap}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioDth}}</td>
                                <td>{{ $resultado->MotivoEquipoAnulada_Dth}}</td>
                                <td>{{ $resultado->OrdenEquipoAnulada_Dth}}</td>
                                <td>{{ $resultado->ComentarioEquipoAnulada_Dth}}</td>
                                <td>{{ $resultado->TrabajadoEquipoAnulada_Dth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioDth}}</td>
                                <td>{{ $resultado->MotivoObjEquipoDth}}</td>
                                <td>{{ $resultado->OrdenEquipoObjDth}}</td>
                                <td>{{ $resultado->ComentsEquipoObjDth}}</td>
                                <td>{{ $resultado->TrabajadoEquipoObjDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Instalacion Equipo</th>
                            <th data-sortable="true">Desinstalacion Equipo</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioDth}}</td>
                                <td>{{ $resultado->InstalacionEquipoDth}}</td>
                                <td>{{ $resultado->DesinstalarEquipoDth}}</td>
                                <td>{{ $resultado->OrdenEquipoDth}}</td>
                                <td>{{ $resultado->ObvsEquipoDth}}</td>
                                <td>{{ $resultado->RecibeEquipoDth}}</td>
                                <td>{{ $resultado->TrabajadoEquipoDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioAdsl}}</td>
                                <td>{{ $resultado->MotivoEquipoAnulada_Adsl}}</td>
                                <td>{{ $resultado->OrdenAnuladaEquipoAdsl}}</td>
                                <td>{{ $resultado->ComentsEquipoAnulada_Adsl}}</td>
                                <td>{{ $resultado->TrabajadoEquipoAnulada_Adsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioAdsl}}</td>
                                <td>{{ $resultado->MotivoEquipoObjAdsl}}</td>
                                <td>{{ $resultado->OrdenEquipoObjAdsl}}</td>
                                <td>{{ $resultado->ComentsEquipoObjAdsl}}</td>
                                <td>{{ $resultado->TrabajadoEquipoObjAdsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Instalacion Equipo</th>
                            <th data-sortable="true">Desinstalacion Equipo</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioAdsl}}</td>
                                <td>{{ $resultado->InstalacionEquipoAdsl}}</td>
                                <td>{{ $resultado->DesinstalarEquipoAdsl}}</td>
                                <td>{{ $resultado->OrdenEquipoAdsl}}</td>
                                <td>{{ $resultado->ObvsEquipoAdsl}}</td>
                                <td>{{ $resultado->RecibeEquipoAdsl}}</td>
                                <td>{{ $resultado->TrabajadoEquipoAdsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioGpon}}</td>
                                <td>{{ $resultado->MotivoAnuladaObj_Gpon}}</td>
                                <td>{{ $resultado->OrdenEquipoAnuladaGpon}}</td>
                                <td>{{ $resultado->ComentarioEquipoAnulada_Gpon}}</td>
                                <td>{{ $resultado->TrabajadoEquipoAnulada_Gpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioGpon}}</td>
                                <td>{{ $resultado->MotivoObjEquipoGpon}}</td>
                                <td>{{ $resultado->NOrdenObjEquipoGpon}}</td>
                                <td>{{ $resultado->ComentsEquipoObjGpon}}</td>
                                <td>{{ $resultado->TrabajadoObjEquipoGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Instalacion Equipo</th>
                            <th data-sortable="true">Desinstalacion Equipo</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioGpon}}</td>
                                <td>{{ $resultado->InstalacionEquipoGpon}}</td>
                                <td>{{ $resultado->DesinstalarEquipoGpon}}</td>
                                <td>{{ $resultado->NOrdenEquipoGpon}}</td>
                                <td>{{ $resultado->ObvsEquipoGpon}}</td>
                                <td>{{ $resultado->RecibeEquipoGpon}}</td>
                                <td>{{ $resultado->TrabajadoEquipoGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioHfc}}</td>
                                <td>{{ $resultado->MotivoEquipoAnulada_Hfc}}</td>
                                <td>{{ $resultado->OrdenAnuladaEquipoHfc}}</td>
                                <td>{{ $resultado->ComentarioAnuladaEquipoHfc}}</td>
                                <td>{{ $resultado->TrabajadoEquipoAnulada_Hfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioHfc}}</td>
                                <td>{{ $resultado->MotivoEquipoObjHfc}}</td>
                                <td>{{ $resultado->NordenObjEquipoHfc}}</td>
                                <td>{{ $resultado->ComentsEquipoObjHfc}}</td>
                                <td>{{ $resultado->TrabajadoObjEquipoHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Instalacion Equipo</th>
                            <th data-sortable="true">Desinstalacion Equipo</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadCambioHfc}}</td>
                                <td>{{ $resultado->InstalacionEquipoHfc}}</td>
                                <td>{{ $resultado->DesinstalarEquipoHfc}}</td>
                                <td>{{ $resultado->NOrdenEquipoHfc}}</td>
                                <td>{{ $resultado->ObvsEquipoHfc}}</td>
                                <td>{{ $resultado->RecibeEquipoHfc}}</td>
                                <td>{{ $resultado->TrabajadoEquipoHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->Motivo_Objetado}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->Motivo_Anulada}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='CAMBIO DE EQUIPO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;

                                ">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionHfc}}</td>
                                <td>{{ $resultado->MotivoAdicionAnulada_Hfc}}</td>
                                <td>{{ $resultado->NOrdenAdicionAnuladaHfc}}</td>
                                <td>{{ $resultado->ComentarioAdicionAnulada_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoAdicionAnulada_Hfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionHfc}}</td>
                                <td>{{ $resultado->MotivoObjAdicionHfc}}</td>
                                <td>{{ $resultado->OrdenAdicionObjHfc}}</td>
                                <td>{{ $resultado->ComentariosObjAdicionHfc}}</td>
                                <td>{{ $resultado->TrabajadoObjAdicionHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe </th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionHfc}}</td>
                                <td>{{ $resultado->NOrdenAdicionHfc}}</td>
                                <td>{{ $resultado->obvsAdicionHfc}}</td>
                                <td>{{ $resultado->RecibeAdicionHfc}}</td>
                                <td>{{ $resultado->TrabajadoAdicionHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'HFC' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'GPON' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionGpon}}</td>
                                <td>{{ $resultado->MotivoAdicionAnulada_Gpon}}</td>
                                <td>{{ $resultado->NOrdenAdicionAnuladaGpon}}</td>
                                <td>{{ $resultado->ComentarioAdicionAnulada_Gpon}}</td>
                                <td>{{ $resultado->TrabajadoAdicionAnulada_Gpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'GPON' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionGpon}}</td>
                                <td>{{ $resultado->MotivoAdicionObjGpon}}</td>
                                <td>{{ $resultado->NOrdenAdicionObjGpon}}</td>
                                <td>{{ $resultado->ComentariosAdicionObjGpon}}</td>
                                <td>{{ $resultado->TrabajadoAdicionObjGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'GPON' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe </th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionGpon}}</td>
                                <td>{{ $resultado->NOrdenAdicionGpon}}</td>
                                <td>{{ $resultado->ObvsAdicionGpon}}</td>
                                <td>{{ $resultado->RecibeAdicionGpon}}</td>
                                <td>{{ $resultado->TrabajadoAdicionGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'GPON' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'DTH' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Anulada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionDth}}</td>
                                <td>{{ $resultado->MotivoAdicionAnulada_Dth}}</td>
                                <td>{{ $resultado->OrdenAdicionAnulada_Dth}}</td>
                                <td>{{ $resultado->ComentarioAdicionAnulada_Dth}}</td>
                                <td>{{ $resultado->TrabajadoAdicionAnulada_Dth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'DTH' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">Motivo Objetada</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionDth}}</td>
                                <td>{{ $resultado->MotivoObjAdicionDth}}</td>
                                <td>{{ $resultado->NOrdenAdicionObjDth}}</td>
                                <td>{{ $resultado->ComentariosAdicionObjDth}}</td>
                                <td>{{ $resultado->TrabajadoAdicionObjDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'DTH' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Recibe </th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadAdicionDth}}</td>
                                <td>{{ $resultado->NOrdenAdicionDth}}</td>
                                <td>{{ $resultado->ObvsAdicionDth}}</td>
                                <td>{{ $resultado->RecibeAdicionDth}}</td>
                                <td>{{ $resultado->TrabajadoAdicionDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'DTH' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Recibe}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='ADICION' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoAdsl}}</td>
                                <td>{{ $resultado->NOrdenTrasladosAdsl}}</td>
                                <td>{{ $resultado->RecibeTrasladoAdsl}}</td>
                                <td>{{ $resultado->ObvsTrasladoAdsl}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoAdsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoAdsl}}</td>
                                <td>{{ $resultado->OrdenObjTrasladoAdsl}}</td>
                                <td>{{ $resultado->ComentariosTrasladosObjAdsl}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoObjAdsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoAdsl}}</td>
                                <td>{{ $resultado->NOrdenTrasladosAnulAdsl}}</td>
                                <td>{{ $resultado->ComentarioTrasladoAnulada_Adsl}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoTrAnulada_Adsl}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'ADSL' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoDth}}</td>
                                <td>{{ $resultado->OrdenTrasladoDth}}</td>
                                <td>{{ $resultado->RecibeTrasladoDth}}</td>
                                <td>{{ $resultado->ObvsTrasladoDth}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoDth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoDth}}</td>
                                <td>{{ $resultado->OrdenTrasladoObjDth}}</td>
                                <td>{{ $resultado->ComentariosTrasladoObjDth}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoObj_Dth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoDth}}</td>
                                <td>{{ $resultado->OrdenTrasladosDth}}</td>
                                <td>{{ $resultado->ComentarioTrasladoAnulada_Dth}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoAnulada_Dth}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'DTH' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoCobre}}</td>
                                <td>{{ $resultado->OrdenTrasladoCobre}}</td>
                                <td>{{ $resultado->RecibeTrasladoCobre}}</td>
                                <td>{{ $resultado->ObvsTrasladoCobre}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoCobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoCobre}}</td>
                                <td>{{ $resultado->OrdenTrasladoObjCobres}}</td>
                                <td>{{ $resultado->ComentariosObjTrasladoCobre}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoObjCobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoCobre}}</td>
                                <td>{{ $resultado->OrdenTrasladosCobre}}</td>
                                <td>{{ $resultado->ComentarioTrasladoAnulada_Cobre}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoAnulada_Cobre}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'COBRE' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoGpon}}</td>
                                <td>{{ $resultado->OrdenTvTrasladoGpon}}</td>
                                <td>{{ $resultado->OrdenInternetTrasladoGpon}}</td>
                                <td>{{ $resultado->OrdenLineaTrasladoGpon}}</td>
                                <td>{{ $resultado->RecibeTrasladoGpon}}</td>
                                <td>{{ $resultado->ObvsTrasladoGpon}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoGpon}}</td>
                                <td>{{ $resultado->OrdenTvTrasladoObjGpon}}</td>
                                <td>{{ $resultado->OrdenInterObjTraslGpon}}</td>
                                <td>{{ $resultado->OrdenLineaTraslObjGpon}}</td>
                                <td>{{ $resultado->ComentTrasladoObjGpon}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoObjGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoGpon}}</td>
                                <td>{{ $resultado->OrdenTvTraslAnuladoGpon}}</td>
                                <td>{{ $resultado->OrdenIntTrasladoAnulGpon}}</td>
                                <td>{{ $resultado->OrdenLineaTraslAnulGpon}}</td>
                                <td>{{ $resultado->ComentarioTrasladoAnulada_Gpon}}</td>
                                <td>{{ $resultado->TrabajadoAnuladaTraslado_gpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoGpon}}</td>
                                <td>{{ $resultado->OrdenTvTrasladoTransGpon}}</td>
                                <td>{{ $resultado->OrdenIntTransladoGpon}}</td>
                                <td>{{ $resultado->OrdenLineaTrasladoTransGpon}}</td>
                                <td>{{ $resultado->ComentTrasladoTransGpon}}</td>
                                <td>{{ $resultado->TrabajadoTraslTransGpon}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'GPON' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Recibe</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenTvTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenInternetTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenLineaTrasladoHfc}}</td>
                                <td>{{ $resultado->RecibeHfcRealizado}}</td>
                                <td>{{ $resultado->ObservacionesTrasladoHfc}}</td>
                                <td>{{ $resultado->TrabajadoTrasladoHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenTvObjetadoTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenIntObjTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenLineaObjetadoTrasladoHfc}}</td>
                                <td>{{ $resultado->ComentariosObjTrasladoHfc}}</td>
                                <td>{{ $resultado->TrabajadoObjTrasladoHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenTvAnulTraslHfc}}</td>
                                <td>{{ $resultado->OrdenInterAnulTraslHfc}}</td>
                                <td>{{ $resultado->OrdenLineaAnulTraslHfc}}</td>
                                <td>{{ $resultado->ComenAnuladaTraslado_Hfc}}</td>
                                <td>{{ $resultado->TrabajadoAnuladaTraslado_Hfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->TipoActividadTrasladoHfc}}</td>
                                <td>{{ $resultado->OrdenTvTransferidoHfc}}</td>
                                <td>{{ $resultado->OrdenInternetTransferidoHfc}}</td>
                                <td>{{ $resultado->OrdenLineaTransferidoHfc}}</td>
                                <td>{{ $resultado->ComentarioTrasladoTransHfc}}</td>
                                <td>{{ $resultado->TrabajadoTransTrasladoHfc}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'HFC' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'REALIZADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'OBJETADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'ANULADA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'TRANSFERIDA')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_Orden}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif($llamada_motivo == 'POSTVENTA' && $tipo_postventa==='TRASLADO' && $tecnologia ===
                'TODOS' && $tipo_actividad === 'PENDIENTES')

                <div class="table-responsive">
                    <table id="TableInstalacionDthAnulada" data-toolbar="#toolbar" data-refresh="true"
                        data-sortable="true" class="table">
                        <div class="box-reportes" style="position: relative;">
                            <caption style="
                                    text-align: center;
                                    background:#17467d;
                                    padding: 10px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    color: #ffffff;
                                    opacity:0.9;">
                                <div class="div_spaccing"></div>
                                <div>REPORTES</div>
                            </caption>
                        </div>
                        <thead class="" style="color: #337ab7; height: 45px;">
                            <th data-sortable="true">Cod</th>
                            <th data-sortable="true">Teléfono</th>
                            <th data-sortable="true">Técnico</th>
                            <th data-sortable="true">Motivo Llamada</th>
                            <th data-sortable="true">Tipo Orden</th>
                            <th data-sortable="true">Dpto / Colonia</th>
                            <th data-sortable="true">Tecnologia</th>
                            <th data-sortable="true">Tipo actividad</th>
                            <th data-sortable="true">N Orden Tv</th>
                            <th data-sortable="true">N Orden Internet</th>
                            <th data-sortable="true">N Orden Linea</th>
                            <th data-sortable="true">Comentarios</th>
                            <th data-sortable="true">Trabajado</th>
                            <th data-sortable="true">Usuario</th>
                            <th data-sortable="true">Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{ $resultado->codigo_tecnico }}</td>
                                <td>{{ $resultado->telefono }}</td>
                                <td>{{ $resultado->tecnico }}</td>
                                <td>{{ $resultado->motivo_llamada }}</td>
                                <td>{{ $resultado->select_orden }}</td>
                                <td>{{ $resultado->dpto_colonia }}</td>
                                <td>{{ $resultado->tecnologia}}</td>
                                <td>{{ $resultado->Tipo_actividad}}</td>
                                <td>{{ $resultado->N_OrdenTv}}</td>
                                <td>{{ $resultado->N_OrdenInternet}}</td>
                                <td>{{ $resultado->N_OrdenLinea}}</td>
                                <td>{{ $resultado->Comentarios}}</td>
                                <td>{{ $resultado->Trabajado}}</td>
                                <td>{{ $resultado->username_creacion }}</td>
                                <td>{{ $resultado->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @endif
            </div>
        </div>
    </div>
</div>



<script>
$(function() {

    $("#TableTecnico").bootstrapTable({
        customSearch: function(text) {
            // Aquí se realiza la búsqueda personalizada
        },
    });
    $("#TableAgendamientos").bootstrapTable({
        customSearch: function(text) {
            // Aquí se realiza la búsqueda personalizada
        },
    });
    $("#TableInstalacionDthAnulada").bootstrapTable({
        customSearch: function(text) {
            // Aquí se realiza la búsqueda personalizada
        },
    });
    $("#TableTecnico .caret").css("display", "none");
    // Cambiar texto e icono de búsqueda
    $(".bootstrap-table .form-control").attr("placeholder", "Buscar Tecnicos...");
    $(".bootstrap-table .search button i").removeClass("glyphicon-search").addClass(
        "fa-duotone fa-user-magnifying-glass");
});
</script>


<script>
$(function() {
    $("#exporttable").click(function(e) {
        var table = $("#TableInstalacionDthAnulada");
        if (table && table.length) {
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "BBBootstrap" + new Date().toISOString().replace(/[\-\:\.]/g, "") +
                    ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: false
            });
        }
    });

});
</script>


<script>
const btn_reiniciar = document.getElementById("btn_reiniciar");
btn_reiniciar.addEventListener("click", function() {
    window.location.href = "{{ route('reporte.generar') }}";

})
</script>

@if(isset($message))
<script>
@if($message == '¡EXITO!')
Swal.fire({
    icon: "success",
    title: "{{$message}}",
    text: "{{$messages}}",
    showConfirmButton: false,
    timer: 1800,
});
@else
Swal.fire({
    icon: "error",
    title: "{{$message}}",
    text: "{{$messages}}",
    showConfirmButton: false,
    timer: 1700,
}).then(function() {});
@endif
</script>
@endif @endsection @section('styles')



<script src="{{ asset('/plugins/CdnMigraciones/tableExport.min.js') }}"></script>

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
<script src="{{asset('/js/reportes/validacionreporte.js')}}" type="text/javascript"></script>

<!-- User definided -->

@endsection