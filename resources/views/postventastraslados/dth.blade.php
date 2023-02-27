<form action="">
    <label for="tecnico">Técnico</label>
    <input type="text" class="form-control" id="tecnico" name="tecnico" required />
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

    <div id="HFC">
        <label for="tecnico">Numero</label>
        <input type="text" class="form-control" id="numero" name="numero" required />
        <label for="tipo_actividad">Tipo Actividad</label>

        <select class="form-control tipo_actividadHfc" style="width: 100%;" name="tipo_actividadHfc"
            id="tipo_actividadHfc" tabindex="-1" aria-hidden="true">
            <option selected="selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="form_Realizada">
            <label for="OrdenHfc_Realizada">Orden Realizada</label>
            <input type="text" class="form-control" id="OrdenHfc_Realizada" name="OrdenHfc_Realizada" required />
        </div>
        <div class="" id="form_Objetada">
            <label for="OrdenHfc_Objetada">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenHfc_Objetada" name="OrdenHfc_Objetada" required />
        </div>
        <div class="" id="form_Transferida">
            <label for="OrdenHfc_Transferida">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenHfc_Transferida" name="OrdenHfc_Transferida" required />
        </div>
    </div>
    <div id="GPON>
        <label for=" nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required />

        <select class="form-control tipo_actividadGpon" style="width: 100%;" name="tipo_actividadGpon"
            id="tipo_actividadGpon" tabindex="-1" aria-hidden="true">
            <option selected="selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="form_Realizada">
            <label for="OrdenGpon_Realizada">Orden Realizada</label>
            <input type="text" class="form-control" id="OrdenGpon_Realizada" name="OrdenGpon_Realizada" required />
        </div>
        <div class="" id="form_Objetada">
            <label for="OrdenGpon_Objetada">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenGpon_Objetada" name="OrdenGpon_Objetada" required />
        </div>
        <div class="" id="form_Transferida">
            <label for="OrdenGpon_Transferida">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenGpon_Transferida" name="OrdenGpon_Transferida" required />
        </div>
    </div>
    <div id="ADSL">
        <label for="sap">Sap</label>
        <input type="text" class="form-control" id="sap" name="sap" required />


        <select class="form-control tipo_actividadAdsl" style="width: 100%;" name="tipo_actividadAdsl"
            id="tipo_actividadAdsl" tabindex="-1" aria-hidden="true">
            <option selected="selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="form_Realizada">
            <label for="OrdenAdsl_Realizada">Orden Realizada</label>
            <input type="text" class="form-control" id="OrdenAdsl_Realizada" name="OrdenAdsl_Realizada" required />
        </div>
        <div class="" id="form_Objetada">
            <label for="OrdenAdsl_Objetada">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenAdsl_Objetada" name="OrdenAdsl_Objetada" required />
        </div>

    </div>
    <div id="COBRE">
        <label for="syreng">syreng</label>
        <input type="text" class="form-control" id="syreng" name="syreng" required />


        <select class="form-control tipo_actividadCobre" style="width: 100%;" name="tipo_actividadCobre"
            id="tipo_actividadCobre" tabindex="-1" aria-hidden="true">
            <option selected="selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="form_Realizada">
            <label for="OrdenCobre_Realizada">Orden Realizada</label>
            <input type="text" class="form-control" id="OrdenCobre_Realizada" name="OrdenCobre_Realizada" required />
        </div>
        <div class="" id="form_Objetada">
            <label for="OrdenCobre_Objetada">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenCobre_Objetada" name="OrdenCobre_Objetada" required />
        </div>
        <div class="" id="form_Transferida">
            <label for="OrdenCobre_Transferida">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenCobre_Transferida" name="OrdenCobre_Transferida"
                required />
        </div>
    </div>
    <div id="DTH">
        <label for="georeferencia">georeferencia</label>
        <input type="text" class="form-control" id="georeferencia" name="georeferencia" required />

        <select class="form-control tipo_actividadDth" style="width: 100%;" name="tipo_actividadDth"
            id="tipo_actividadDth" tabindex="-1" aria-hidden="true">
            <option selected="selected">SELECCIONE UNA OPCION</option>
            <option value="REALIZADA">REALIZADA</option>
            <option value="OBJETADA">OBJETADA</option>
            <option value="TRANSFERIDA">TRANSFERIDA</option>
        </select>

        <div id="form_Realizada">
            <label for="OrdenDth_Realizada">Orden Realizada</label>
            <input type="text" class="form-control" id="OrdenDth_Realizada" name="OrdenDth_Realizada" required />
        </div>
        <div class="" id="form_Objetada">
            <label for="OrdenDth_Objetada">Orden Transferida</label>
            <input type="text" class="form-control" id="OrdenDth_Objetada" name="OrdenDth_Objetada" required />
        </div>
    </div>

    <button type="submit">Guardar informacion</button>
</form>

acuerdate que el formulario es dinamico por lo tanto algunos inputs no estaran disponible
y otros si, esto atraves del select. como hago para que solo se guarde la informacion con los inputs
que necesito al seleccionar el select e ignore a los otros inputs



-Como guardar un registro.
-Como validar ese codigo de json_decode



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