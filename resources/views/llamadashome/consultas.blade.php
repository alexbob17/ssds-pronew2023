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
            <form action="{{ route('registro_consultas') }}" method="POST" id="form1" class="formulario box-body"
                style="border-bottom: 3px solid #3e69d6; padding-top: 15px;">
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
                        <button type="button" id="btn_clean" class="btn btn-danger"><i class="fa fa-trash"
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
                    <div class="form-group col-md-2" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" value="CONSULTAS" placeholder="CONSULTAS"
                            readonly="true" id="motivo_llamada" name="motivo_llamada"
                            style="color: #3e69d6; background: #fbfbfb; text-align: center;" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="MotivoConsulta">MOTIVO CONSULTA</label>
                        <select class="form-control" style="width: 100%;" name="MotivoConsulta" tabindex="-1"
                            id="MotivoConsulta" aria-hidden="true" required>
                            <option value="" selected>SELECCIONE UNA OPCION</option>
                            <option value="COMPLETAR GESTION">COMPLETAR GESTION</option>
                            <option value="GESTIÓN DENEGADA">GESTIÓN DENEGADA</option>
                            <option value="DATOS DE CLIENTE">DATOS DE CLIENTE</option>
                            <option value="GENERAR DAÑO">GENERAR DAÑO</option>
                            <option value="AUTORIZADO AREA TECNICA">AUTORIZADO AREA TECNICA</option>
                            <option value="ANTIFRAUDE">ANTIFRAUDE</option>
                            <option value="REFRESH-INICIALIZACION">REFRESH-INICIALIZACION</option>
                            <option value="INCONSISTENCIA / APLICATIVOS">INCONSISTENCIA / APLICATIVOS</option>
                            <option value="CONTACTAR A CLIENTE">CONTACTAR A CLIENTE</option>
                            <option value="PREVISITAS">PREVISITAS</option>
                            <option value="MIGRACION EXCEDENTE DE CARÁCTER">MIGRACION EXCEDENTE DE CARÁCTER</option>
                            <option value="TECNICO CORTA LLAMADA">TECNICO CORTA LLAMADA</option>
                            <option value="LLAMADA CORTADA POR ERROR">LLAMADA CORTADA POR ERROR</option>
                            <option value="QUITAR IMPEDIMENTOS">QUITAR IMPEDIMENTOS</option>
                            <option value="PROYECTO FITEL">PROYECTO FITEL</option>
                            <option value="FALLA MASIVA EN LA RED">FALLA MASIVA EN LA RED</option>
                            <option value="CORRECCION DE DIRECCION">CORRECCION DE DIRECCION</option>
                            <option value="CORRECCION DE NODO">CORRECCION DE NODO</option>
                            <option value="SE GENERA INCIDENTE">SE GENERA INCIDENTE</option>
                            <option value="PENDIENTE POR INCIDENTES">PENDIENTE POR INCIDENTES</option>
                            <option value="OTROS">OTROS</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="TipoMotivoConsulta">TIPO MOTIVO</label>
                        <select class="form-control" style="width: 100%;" name="TipoMotivoConsulta" tabindex="-1"
                            id="TipoMotivoConsulta" aria-hidden="true" required>
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="OrdenConsulta">Orden </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <input type="number" class="form-control OrdenHfc" id="OrdenConsulta" name="OrdenConsulta"
                                placeholder="N° Orden" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group-container">
                        <div class="form-group col-md-12">
                            <label for="ObvsConsulta">
                                Observaciones
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <input type="text" class="form-control" id="ObvsConsulta" name="ObvsConsulta"
                                    placeholder="Ingresa las observaciones del caso"
                                    oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
                            </div>
                        </div>

                    </div>
                    <div class="box-footer" id="btn-submitForm"
                        style="text-align: center; display: flex; justify-content: center;margin-bottom:1rem">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"
                                style="padding-right: 8px;"></i>GENERAR CONSULTA</button>
                    </div>
            </form>
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="box box-warning" style="border-top-color: white!important;border-radius:5px">
        <div class="">

            <form method="GET" action="{{ route('consultas_buscar') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="btn_reiniciar" id="btn_reiniciar" />


                <div class="form-group col-md-3" style>
                    <label for="codigo_tecnico"></label>
                    <div class="input-group" style="padding-top: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-square"></i>
                        </div>
                        <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                            id="codigo_tecnico" name="codigo_tecnico" oninput="this.value = this.value.toUpperCase()"
                            required autocomplete="off" />
                    </div>
                </div>

                <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                    <button type="submit" id="SearchConsulta" class="btn btn btn-info"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </div>
            </form>

            <div class="" style="">
                <table id="TableTecnico" data-toolbar="#toolbar" data-refresh="true" data-sortable="true"
                    class="table table-striped table-bordered">
                    <caption
                        style="text-align: center;background: #17467d;opacity:0.9;padding: 10px;font-size: 16px;font-weight: 500;color: #ffffff;">
                        CONSULTAS HOY</caption>
                    <thead class="" style=" color: #337ab7;height: 45px;">
                        <th data-sortable=" true">COD</th>
                        <th data-sortable="true">FECHA - HORA</th>
                        <th data-sortable="true">USUARIO</th>
                        <th data-sortable="true">MOTIVO CONSULTA</th>
                        <th data-sortable="true">TIPO MOTIVO</th>
                        <th data-sortable="true">TELEFONO</th>
                        <th data-sortable="true">OBSERVACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <div id="resultados"></div> -->
                        @foreach ($consultasRealizadas as $consultasRealizada)
                        <tr>
                            <td>{{ $consultasRealizada->codigo_tecnico }}</td>
                            <td style="color:#3e69d6">{{ $consultasRealizada->created_at }}</td>
                            <td>{{ $consultasRealizada->username_creacion }}</td>
                            <td>{{ $consultasRealizada->MotivoConsulta }}</td>
                            <td>{{ $consultasRealizada->TipoMotivoConsulta }}</td>
                            <td>{{ $consultasRealizada->telefono }}</td>
                            <td>{{ $consultasRealizada->ObvsConsulta }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

    $("#TableTecnico .caret").css("display", "none");
    // Cambiar texto e icono de búsqueda
    $(".bootstrap-table .form-control").attr("placeholder", "Buscar Tecnicos...");
    $(".bootstrap-table .search button i").removeClass("glyphicon-search").addClass(
        "fa-duotone fa-user-magnifying-glass");
});
</script>

<script>
const btn_clean = document.getElementById("btn_clean");
btn_clean.addEventListener("click", function() {
    localStorage.clear();
    window.location.href = "{{ route('consultas_buscar') }}";
});
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
}).then(function() {
    window.location.href = "{{ route('consultas_buscar') }}";
});
@endif
</script>
@endif

@endsection @section('styles')

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" />




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
<link href="{{ asset('/plugins/CdnMigraciones/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('/plugins/CdnMigraciones/sweetalert2.all.min.js') }}"></script>
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







@endsection