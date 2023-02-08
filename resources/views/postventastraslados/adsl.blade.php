<form action="POST" id="form1" method="post" class="box-body">
    <div class="form-group-container">
        <div class="form-group col-md-3">
            <label for="codigo_tecnico">Código Técnico</label>
            <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" required />
        </div>
        <div class="form-group col-md-3">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" required />
        </div>
    </div>
    <div class="form-group-container">
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
    </div>
</form>

<form action="POST" id="form2" method="post" class="box-body">
    <div class="form-group-container">
        <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
            <label for="" style="color: #3e69d6; font-size: 18px;">Solicitudes</label>
        </div>
        <div class="form-group col-md-3">
            <label for="codigo_tecnico">Orden Internet</label>
            <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" required />
        </div>
        <div class="box-footer" style="text-align: center;">
            {!! Form::submit('Guardar Caso', ['class' => 'btn btn-warning']) !!}
        </div>
    </div>
</form>