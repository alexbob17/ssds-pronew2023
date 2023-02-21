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
                <input type="text" class="form-control OrdenHfc" id="orden_tv_hfc" name="orden_tv_hfc" disabled />
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="orden_internet_hfc">Orden Internet</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-ticket"></i>
                </div>
                <input type="number" class="form-control OrdenHfc" id="orden_internet_hfc" name="orden_internet_hfc"
                    disabled />
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="orden_linea_hfc">Orden Linea</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-ticket"></i>
                </div>
                <input type="number" class="form-control OrdenHfc" id="orden_linea_hfc" name="orden_linea_hfc"
                    disabled />
            </div>
        </div>
    </div>
    <div class="form-group-container">
        <div class="TipoActividad_Hidden" style="margin-top: 2.5rem;">
            <div class="form-group col-md-3">
                <label for="tipo_actividad">TIPO ACTIVIDAD</label>
                <select class="form-control tipo_actividad" style="width: 100%;" name="tipo_actividad" tabindex="-1"
                    id="tipo_actividad" aria-hidden="true">
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
                <input type="text" class="form-control equipotvHfc" id="equipostv1" name="equipostv1"
                    placeholder="Equipo Tv 1" />
            </div>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-square"></i>
                </div>
                <input type="text" class="form-control equipotvHfc" id="equipostv2" name="equipostv2"
                    placeholder="Equipo Tv 2" />
            </div>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-square"></i>
                </div>
                <input type="text" class="form-control equipotvHfc" id="equipostv3" name="equipostv3"
                    placeholder="Equipo Tv 3" />
            </div>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-square"></i>
                </div>
                <input type="text" class="form-control equipotvHfc" id="equipostv4" name="equipostv4"
                    placeholder="Equipo Tv 4" />
            </div>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-square"></i>
                </div>
                <input type="text" class="form-control equipotvHfc" id="equipostv5" name="equipostv5"
                    placeholder="Equipo Tv 5" />
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
                <input type="number" class="form-control" id="EquipoModem_Hfc" name="EquipoModem_Hfc" />
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
                <input type="number" class="form-control" id="numeroVoip_hfc" name="numeroVoip_hfc" />
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
                    <input type="text" class="form-control" id="ObservacionesHfc" name="ObservacionesHfc" />
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
                <h4 class="box-title" style="color: #3e69d6; text-align: center; font-weight: bold;">
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
                                <input type="text" class="form-control" id="NodoHfc" name="NodoHfc" />
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
                                <input type="number" class="form-control" id="TapHfc" name="TapHfc" />
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
                                <input type="number" class="form-control" id="PosicionHfc" name="PosicionHfc" />
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
                                <input type="number" class="form-control" id="MaterialesHfc" name="MaterialesHfc" />
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
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                        name="MotivoObjetada_Hfc" tabindex="-1" id="MotivoObjetada_Hfc" aria-hidden="true">
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
                    <input type="text" class="form-control" id="OrdenObjetada_Hfc" name="OrdenObjetada_Hfc" />
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
                <input type="number" class="form-control" id="OrdenTransferida_Hfc" name="OrdenTransferida_Hfc" />
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