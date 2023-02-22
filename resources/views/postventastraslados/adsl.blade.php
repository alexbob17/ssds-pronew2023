<form action="">
    <input type="text" class="form-control" placeholder="Ingrese Codigo Tecnico">
    <input type="text" class="form-control" id="telefono" name="telefono" readonly="true" />
    <input type="text" class="form-control" id="tecnico" name="tecnico" readonly="true" />

    <select class="form-control" style="width: 100%;" name="tecnologia" id="tecnologia" required>
        <option selected="selected">SELECCIONE</option>
        <option value="HFC">HFC</option>
        <option value="GPON">GPON</option>
        <option value="ADSL">ADSL</option>
        <option value="COBRE">COBRE</option>
        <option value="DTH">DTH</option>
    </select>

    <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden" tabindex="-1"
        aria-hidden="true" required>
        <option>SELECCIONE UNA OPCION</option>
    </select>

    <div id="HFC">
        <select class="form-control tipo_actividadHfc" style="width: 100%;" name="tipo_actividadHfc" tabindex="-1"
            id="tipo_actividadHfc" aria-hidden="true">
            <option selected=" selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="div_Realizado">
            <input type="text" id="OrdenRealizado">
            <input type="text" id="CodigoRealizado">
        </div>
        <div id="div_Objetado">
            <input type="text" id="OrdenObjetado">
            <input type="text" id="CodigoObjetado">
        </div>
        <div id="div_Transferido">
            <input type="text" id="OrdenTransferido">
            <input type="text" id="CodigoTransferido">
        </div>
    </div>
    <div id="GPON">
        <select class="form-control tipo_actividadGpon" style="width: 100%;" name="tipo_actividadGpon" tabindex="-1"
            id="tipo_actividadGpon" aria-hidden="true">
            <option selected=" selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="div_Realizado">
            <input type="text" id="OrdenRealizado">
            <input type="text" id="CodigoRealizado">
        </div>
        <div id="div_Objetado">
            <input type="text" id="OrdenObjetado">
            <input type="text" id="CodigoObjetado">
        </div>
        <div id="div_Transferido">
            <input type="text" id="OrdenTransferido">
            <input type="text" id="CodigoTransferido">
        </div>

    </div>
    <div id="ADSL">
        <select class="form-control tipo_actividadAdsl" style="width: 100%;" name="tipo_actividadAdsl" tabindex="-1"
            id="tipo_actividadAdsl" aria-hidden="true">
            <option selected=" selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="div_Realizado">
            <input type="text" id="OrdenRealizado">
            <input type="text" id="CodigoRealizado">
        </div>
        <div id="div_Objetado">
            <input type="text" id="OrdenObjetado">
            <input type="text" id="CodigoObjetado">
        </div>
        <div id="div_Transferido">
            <input type="text" id="OrdenTransferido">
            <input type="text" id="CodigoTransferido">
        </div>

    </div>
    <div id="COBRE">
        <select class="form-control tipo_actividadCobre" style="width: 100%;" name="tipo_actividadCobre" tabindex="-1"
            id="tipo_actividadCobre" aria-hidden="true">
            <option selected=" selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="div_Realizado">
            <input type="text" id="OrdenRealizado">
            <input type="text" id="CodigoRealizado">
        </div>
        <div id="div_Objetado">
            <input type="text" id="OrdenObjetado">
            <input type="text" id="CodigoObjetado">
        </div>
        <div id="div_Transferido">
            <input type="text" id="OrdenTransferido">
            <input type="text" id="CodigoTransferido">
        </div>

    </div>
    <div id="DTH">
        <select class="form-control tipo_actividadDth" style="width: 100%;" name="tipo_actividadDth" tabindex="-1"
            id="tipo_actividadDth" aria-hidden="true">
            <option selected=" selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="div_Realizado">
            <input type="text" id="OrdenRealizado">
            <input type="text" id="CodigoRealizado">
        </div>
        <div id="div_Objetado">
            <input type="text" id="OrdenObjetado">
            <input type="text" id="CodigoObjetado">
        </div>
        <div id="div_Transferido">
            <input type="text" id="OrdenTransferido">
            <input type="text" id="CodigoTransferido">
        </div>

    </div>

    <button id="btn-submit" type="submit" class="btn btn-warning">GUARDAR REGISTRO</button>

</form>