<form action="">

    <input type="text" class="form-control" placeholder="Ingrese Codigo Tecnico" id="codigo_tecnico"
        name="codigo_tecnico" oninput="this.value = this.value.toUpperCase()" />


    <input type="text" class="form-control" id="telefono" name="telefono" readonly="true" />

    <input type="text" class="form-control" id="tecnico" name="tecnico" readonly="true" />

    <label for="motivo_llamada">Motivo Llamada</label>
    <input type="text" class="form-control" placeholder="INSTALACION" value="INSTALACION" disabled readonly="true"
        style="color: white; background: #3e69d6; text-align: center;" />

    <label for="tecnologia">Tecnologia</label>
    <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1" id="tecnologia"
        aria-hidden="true">
        <option selected="selected">SELECCIONE</option>
        <option value="HFC">HFC</option>
        <option value="GPON">GPON</option>
        <option value="ADSL">ADSL</option>
        <option value="COBRE">COBRE</option>
        <option value="DTH">DTH</option>
    </select>
    </div>

    <label for="select_orden">Tipo Orden</label>
    <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden" tabindex="-1"
        aria-hidden="true">
        <option>SELECCIONE UNA OPCION</option>
        <option value="INTERNET">INTERNET</option>
    </select>


    <label for="dpto_colonia">DPTO / COLONIA</label>
    <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia" style="width: 100%;"
        name="dpto_colonia" tabindex="-1" aria-hidden="true">
        <option value="">SELECCIONE UNA OPCION</option>
        <option value="MANAGUA">MANAGUA</option>
    </select>

    <div id="HFC">
        <label for="orden_internethfc">Orden Internet</label>

        <input type="number" class="form-control" id="orden_internethfc" name="orden_internethfc" />

    </div>
    <div id="GPON">
        <label for="orden_internetGpon">Orden Internet</label>

        <input type="number" class="form-control" id="orden_internetGpon" name="orden_internetGpon" />

    </div>
    <div id="ADSL">
        <select class="form-control tipo_actividadAdsl" style="width: 100%;" name="tipo_actividadAdsl"
            id="tipo_actividadAdsl" tabindex="-1" aria-hidden="true">
            <option selected="selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <!-- TIPO ACTIVIDAD REALIZADA (ADSL) -->
        <div class="form-group-container FormAdsl_Hidden" id="formAdsl_Realizada">

            <label for="orden_internetadsl">Orden Internet</label>

            <input type="number" class="form-control" id="orden_internetadsl" name="orden_internetadsl" />

            <label for="GeoRefAdsl">Georeferencia</label>
            <input type="text" class="form-control" id="GeoRefAdsl" name="GeoRefAdsl" />


            <input id="trabajado_adsl" class="form-check-input" type="checkbox" value="" id="TrabajadoAdsl" />
        </div>


    </div>


    <div id="COBRE">
        <label for="orden_internetCobre">Orden Internet</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-ticket"></i>
            </div>
            <input type="number" class="form-control" id="orden_internetCobre" name="orden_internetCobre" />
        </div>
    </div>
    <div id="DTH">
        <label for="orden_internetDth">Orden Internet</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-ticket"></i>
            </div>
            <input type="number" class="form-control" id="orden_internetDth" name="orden_internetDth" />
        </div>
    </div>

    <button type="submit">Guardar informacion</button>
</form>




//Esto va en el controlador lo de los inputs


public function store(Request $request)
{
$tecnologia = $request->input('tecnologia');

switch ($tecnologia) {
case "HFC":
$numero = $request->input('numero');
// Guarda solo el número
DB::table('registros')->insert(
['tecnologia' => $tecnologia, 'numero' => $numero]
);
break;
case "ADSL":
$nombre = $request->input('nombre');
// Guarda solo el nombre
DB::table('registros')->insert(
['tecnologia' => $tecnologia, 'nombre' => $nombre]
);
break;
case "DTH":
$sap = $request->input('sap');
// Guarda solo el sap
DB::table('registros')->insert(
['tecnologia' => $tecnologia, 'sap' => $sap]
);
break;
case "COBRE":
$syreng = $request->input('syreng');
// Guarda solo el syreng
DB::table('registros')->insert(
['tecnologia' => $tecnologia, 'syreng' => $syreng]
);
break;
case "GPON":
$georeferencia = $request->input('georeferencia');
// Guarda solo la georeferencia
DB::table('registros')->insert(
['te