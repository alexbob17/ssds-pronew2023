<div id="form3" class="form-group-container formulario">
    <div class="form-group col-md-3 TipoActividad_Hidden">
        <label for="tipo_actividadAdsl">Tipo Actividad</label>
        <select class="form-control tipo_actividad" style="width: 100%;" name="tipo_actividadAdsl"
            id="tipo_actividadAdsl" tabindex="-1" aria-hidden="true">
            <option selected=" selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>
    </div>
    <!-- TIPO ACTIVIDAD REALIZADA (ADSL) -->
    <div class="form-group-container FormAdsl_Hidden" id="formAdsl_Realizada">
        <div class="form-group-container">
            <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
            </div>
            <div class="form-group col-md-3">
                <label for="orden_internetadsl">Orden Internet</label>
                <input type="text" class="form-control" id="orden_internetadsl" name="orden_internetadsl" />
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

    <div id="formAdsl_Objetada" class="form-group-container FormAdsl_Hidden">
        <div class="form-group col-md-3">
            <label for="MotivoObjetada_Adsl">Motivo Objetada</label>
            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                name="MotivoObjetada_Adsl" tabindex="-1" id="MotivoObjetada_Adsl" aria-hidden="true">
                <option selected="selected">SELECCIONE UNA OPCION</option>
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
                <input type="number" class="form-control" id="OrdenAdsl_Objetada" name="OrdenAdsl_Objetada" />
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
    <div class="form-group-container FormAdsl_Hidden" id="formAdsl_Transferida">
        <div class="form-group col-md-3">
            <label for="OrdenAdsl_Transferida">
                Orden
            </label>
            <input type="text" class="form-control" id="numerovoip" name="numerovoip" />
        </div>
        <div class="from-group-container">
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="TrabajadoAdsl_Transferido" />
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