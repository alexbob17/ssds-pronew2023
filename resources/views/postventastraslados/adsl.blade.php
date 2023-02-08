<form action="{{route('registro.store')}}" id="form1" method="post" class="box-body">
    <div class="form-group-container">
        <div class="form-group col-md-3">
            <label for="codigo_tecnico">Código Técnico</label>
            <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" />
        </div>
        <div class="form-group col-md-3">
            <label for="telefono">Teléfono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" />
        </div>
        <div class="form-group col-md-6">
            <label for="tecnico">Técnico</label>
            <input type="text" class="form-control" id="tecnico" name="tecnico" />
        </div>
    </div>
    <div class="form-group-container">
        <div class="form-group col-md-3">
            <label for="motivo_llamada">Motivo de la llamada</label>
            <input type="text" class="form-control" id="motivollamada" name="motivollamada" readonly="readonly"
                placeholder="INSTALACION" value="instalacion" style="background: #f9f936;" />
        </div>
        <div class="form-group col-md-3">
            <label for="tecnologia">Tecnologia</label>
            <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1" aria-hidden="true">
                <option selected="selected">Seleccione una opción</option>
                <option value="HFC">HFC</option>
                <option value="GPON">GPON</option>
                <option value="ADSL">ADSL</option>
                <option value="COBRE">COBRE</option>
                <option value="DTH">DTH</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="tipo_orden">Tipo De Orden</label>
            <select class="form-control" style="width: 100%;" name="tipo_servicio" tabindex="-1" aria-hidden="true">
                <option selected="selected">Seleccione una opción</option>
                <option value="TV">TV</option>
                <option value="TV DIG">TV DIG</option>
                <option value="INTERNET">INTERNET</option>
                <option value="LINEA HFC">TV + LHFC</option>
                <option value="TV + INTERNET">TV + INTERNET</option>
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
        <div id="form2" class="box-body">
            <div class="form-group-container" style="margin-top: 2.5rem;">
                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                    <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
                </div>
                <div class="form-group col-md-3">
                    <label for="orden_tv_hfc">Orden Tv</label>
                    <input type="text" class="form-control" id="orden_tv_hfc" name="orden_tv_hfc" />
                </div>
                <div class="form-group col-md-3">
                    <label for="orden_internet_hfc">Orden Internet</label>
                    <input type="text" class="form-control" id="orden_internet_hfc" name="orden_internet_hfc" />
                </div>
                <div class="form-group col-md-3">
                    <label for="orden_linea_hfc">Orden Linea</label>
                    <input type="text" class="form-control" id="orden_linea_hfc" name="orden_linea_hfc" />
                </div>
            </div>
            <div class="form-group-container" style="margin-top: 2.5rem;">
                <div class="form-group col-md-3">
                    <label for="tipo_actividad">Tipo De Actividad</label>
                    <select class="form-control" style="width: 100%;" name="tipo_servicio" tabindex="-1"
                        aria-hidden="true">
                        <option selected="selected" value="">Seleccione una opción</option>
                        <option value="REALIZADA">REALIZADA</option>
                        <option value="OBJETADA">OBJETADA</option>
                        <option value="TRANSFERIDA">TRANSFERIDA</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="telefono">Motivo de actividad</label>
                    <select class="form-control" style="width: 100%;" name="tipo_servicio" tabindex="-1"
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
                    <input type="text" class="form-control" id="tecnico" name="tecnico" />
                </div>
                <div class="form-group col-md-3">
                    <label for="tecnico">SAP</label>
                    <input type="text" class="form-control" id="tecnico" name="tecnico" />
                </div>
            </div>
            <div class="from-group-container">
                <div class="form-group col-md-3">
                    <label for="equipostv">Equipo Tv</label>
                    <div class="box_equipostv">
                        <div>
                            <p>Tv 1</p>
                        </div>
                        <input type="text" class="form-control" id="equipotv1" name="equipotv1" />
                    </div>
                    <div class="box_equipostv">
                        <p>Tv 2</p>
                        <input type="text" class="form-control" id="equipostv2" name="equipostv2" />
                    </div>
                    <div class="box_equipostv">
                        <p>Tv 3</p>
                        <input type="text" class="form-control" id="equipostv3" name="equipostv3" />
                    </div>
                    <div class="box_equipostv">
                        <p>Tv 4</p>
                        <input type="text" class="form-control" id="equipostv" name="equipostv4" />
                    </div>
                    <div class="box_equipostv">
                        <p>Tv 5</p>
                        <input type="text" class="form-control" id="equipostv5" name="equipostv5" />
                    </div>
                </div>
                <div class="from-group-container">
                    <div class="form-group col-md-3">
                        <label for="EModem">
                            Equipo Modem
                        </label>
                        <input type="number" class="form-control" id="equipomodem" name="equipomodem" />
                    </div>
                </div>
                <div class="from-group-container">
                    <div class="form-group col-md-3">
                        <label for="EModem">
                            Numero Voip
                        </label>
                        <input type="text" class="form-control" id="numerovoip" name="numerovoip" />
                    </div>
                </div>
                <div class="from-group-container">
                    <div class="form-group col-md-3">
                        <label for="EModem">
                            Georeferencia
                        </label>
                        <input type="text" class="form-control" id="georeferencia" name="georeferencia" />
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
                    <div class="form-group col-md-9">
                        <label for="EModem">
                            Observaciones
                        </label>
                        <input type="number" class="form-control" id="equipomodem" name="equipomodem" />
                    </div>
                </div>
                <div class="from-group-container">
                    <div class="form-group col-md-9">
                        <label for="EModem">
                            Recibe
                        </label>
                        <input type="number" class="form-control" id="equipomodem" name="equipomodem" />
                    </div>
                </div>
            </div>
            <div class="form-group-container">
                <h4 class="box-title" style="color: #3e69d6; text-align: center; font-weight: bold;">
                    Elementos de
                    red</h4>
                <div class="box box-warning" style="margin: botton 12px;">
                    <div class="form-group-container" style="margin-top: 1rem;">
                        <div class="form-group col-md-3">
                            <label for="Nodo">
                                Nodo
                            </label>
                            <input type="number" class="form-control" id="nodo" name="nodo" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tap">
                                TAP
                            </label>
                            <input type="number" class="form-control" id="tap" name="tap" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tap">
                                Posicion
                            </label>
                            <input type="number" class="form-control" id="tap" name="tap" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tap">
                                Materiales
                            </label>
                            <input type="number" class="form-control" id="tap" name="tap" />
                        </div>
                    </div>
                    <!-- <div class="box-footer" style="text-align: center;">
                                    {!! Form::submit('Guardar Caso', ['class' => 'btn btn-warning']) !!}
                                </div> -->
                </div>
            </div>
        </div>
        <div class="box-footer" id="btn-save" style="text-align: center;">
            <button type="submit" class="btn btn-warning">Guardar Caso </button>
        </div>
    </div>
</form>