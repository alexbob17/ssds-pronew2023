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

    <div id="form2">
        <label for="tecnico">Numero</label>
        <input type="text" class="form-control" id="numero" name="numero" required />
    </div>
    <div id="form3">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required />
    </div>
    <div id="form4">
        <label for="sap">Sap</label>
        <input type="text" class="form-control" id="sap" name="sap" required />
    </div>
    <div id="form5">
        <label for="syreng">syreng</label>
        <input type="text" class="form-control" id="syreng" name="syreng" required />
    </div>
    <div id="form6">
        <label for="georeferencia">georeferencia</label>
        <input type="text" class="form-control" id="georeferencia" name="georeferencia" required />
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