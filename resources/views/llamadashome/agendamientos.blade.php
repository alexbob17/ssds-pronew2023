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
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Datos del Caso</h3>
            </div>
            <!-- FORMULARIO #1 INICIAL CAMPOS NECESARIOS -->
            <form action="{{ route('registro_agendamientos.store') }}" method="POST" id="form1"
                class="formulario box-body" style="border-bottom: 3px solid #3e69d6; padding-top: 15px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="selected_fields" id="selected-fields" />

                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                                id="codigo_tecnico" name="codigo_tecnico"
                                oninput="this.value = this.value.toUpperCase()" required autocomplete="off" />
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
                                    name="telefono" readonly="true" required autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tecnico">Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" placeholder="Nombre Tecnico" class="form-control" id="tecnico"
                                    name="tecnico" readonly="true" required autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-4" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" value="AGENDAMIENTOS" placeholder="AGENDAMIENTOS"
                            readonly="true" id="motivo_llamada" name="motivo_llamada"
                            style="color: #3e69d6; background: #fbfbfb; text-align: center;" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="Agendamiento">Agendamiento</label>
                        <select class="form-control" style="width: 100%;" name="Agendamiento" tabindex="-1"
                            id="Agendamiento" aria-hidden="true" required>
                            <option value="">SELECCIONE UNA OPCION</option>
                            <option value="INSTALACIONES">INSTALACIONES</option>
                            <option value="POSTVENTAS">POSTVENTAS</option>
                            <option value="REPARACIONES">REPARACIONES</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="TipoAgendamiento">Tipo Agendamiento</label>
                        <select class="form-control" style="width: 100%;" name="TipoAgendamiento" tabindex="-1"
                            id="TipoAgendamiento" aria-hidden="true" required>
                            <option value="">SELECCIONE UNA OPCION</option>
                            <option value="TRASLADOS">TRASLADOS</option>
                            <option value="ADICION">ADICION</option>
                            <option value="MIGRACIONES">MIGRACIONES</option>
                        </select>
                    </div>
                </div>

                <div class="form group-container">
                    <div class="form-group col-md-4">
                        <label for="fecha_registro">Fecha Agendamiento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control" name="fecha_registro" id="fecha_registro"
                                placeholder="Ingresa Fecha" type="text" data-provide="datepicker"
                                data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="hora_registro">Hora Agendamiento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-hourglass"></i>
                            </div>
                            <input class="form-control" id="hora_registro" name="hora_registro" step="60" type="time"
                                data-format="hh:mm a" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="N_Orden">Orden </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <input type="number" class="form-control OrdenHfc" id="N_Orden" name="N_Orden"
                                placeholder="N° Orden" autocomplete="off" />
                        </div>
                    </div>



                    <div class="form-group-container">
                        <div class="form-group col-md-12">
                            <label for="Observaciones">
                                Observaciones
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <input type="text" class="form-control" id="Observaciones" name="Observaciones"
                                    placeholder="Ingresa las observaciones del caso"
                                    oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <label for="Recibe">
                            Recibe
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </div>
                            <input type="text" placeholder="Ingresa quien recibe el caso" class="form-control"
                                id="Recibe" name="Recibe" oninput="this.value = this.value.toUpperCase()"
                                autocomplete="off" />
                        </div>
                    </div>



                    <div class="box-footer" id="btn-submitForm"
                        style="text-align: center; display: flex; justify-content: center;">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"
                                style="padding-right: 8px;"></i>GUARDAR REGISTRO</button>
                    </div>
            </form>
        </div>
    </div>
</div>

@if(isset($message))
<script>
@if($message == '¡EXITO!')
Swal.fire({
    icon: "success",
    title: "{{$message}}",
    html: "<h5>{{$messages}}</h5> <br> <h4>Código: <b>{{$codigoUnico}}</b></h4>",
    showConfirmButton: true,
});
@else
Swal.fire({
    icon: "error",
    title: "{{$message}}",
    html: "<h5>{{$messages}}</h5>",
    showConfirmButton: true,
    confirmButtonColor: '#363a39'
});
@endif
</script>
@endif
@endsection @section('styles')

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

<script>
window.onload = function() {
    document.getElementById("Agendamiento").value = "";
};
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
<script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/ValoresTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/consultas/ValidacionConsulta.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/consultas/ValidacionForm.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/agendamientos/Validacionjs.js')}}" type="text/javascript"></script>


@endsection