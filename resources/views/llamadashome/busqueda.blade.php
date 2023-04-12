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
                <h3 class="box-title">Datos Busqueda</h3>
            </div>
            <!-- FORMULARIO #1 INICIAL CAMPOS NECESARIOS -->
            <form action="{{ route('registro_consultas') }}" method="POST" id="form1" class="formulario box-body"
                style="padding-top: 15px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="selected_fields" id="selected-fields" />

                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">N° ORDEN</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="Ingresa N° Orden"
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
                            <label for="fecha_registro">FECHA </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-check-o"></i>
                                </div>
                                <input class="form-control" name="fecha_registro" id="fecha_registro"
                                    placeholder="Ingresa Fecha" type="text" data-provide="datepicker"
                                    data-date-format="yyyy-mm-dd" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="TipoMotivoConsulta">TIPO ACTIVIDAD</label>
                            <select class="form-control" style="width: 100%;" name="TipoMotivoConsulta" tabindex="-1"
                                id="TipoMotivoConsulta" aria-hidden="true" required>
                                <option value="">---TODOS---</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="TipoMotivoConsulta">USUARIOS</label>
                            <select class="form-control" style="width: 100%;" name="TipoMotivoConsulta" tabindex="-1"
                                id="TipoMotivoConsulta" aria-hidden="true" required>
                                <option value="">---TODOS LOS USUARIOS---</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <table id="TableTecnico" style="border-top: 1px solid #d4d1d1" data-toolbar="#toolbar" data-refresh="true"
                data-sortable="true" class="table table-striped table-bordered">

                <thead class="" style=" color: #337ab7;height: 45px;">
                    <th data-sortable=" true">COD</th>
                    <th data-sortable="true">TECNICO</th>
                    <th data-sortable="true">MOTIVO LLAMADA</th>
                    <th data-sortable="true">USUARIO</th>
                    <th data-sortable="true">TIPO ACTIVIDAD</th>
                    <th data-sortable="true">N° ORDEN</th>
                    <th data-sortable="true">STATUS</th>
                    <th>ACCIONES</th>

                </thead>
                <tbody>

                    <tr>
                        <td>5022</td>
                        <td>INTERNO_FELIX MACLEAN TALAVERA</td>
                        <td>INSTALACION</td>
                        <td>ALEJANDROUSER</td>
                        <td>REALIZADA</td>
                        <td>89278867</td>
                        <td class="btn btnPendiente">PENDIENTE</td>
                        <td><button class="btn btn-warning"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></button></td>
                    </tr>

                    <tr>
                        <td>5022</td>
                        <td>INTERNO_FELIX MACLEAN TALAVERA</td>
                        <td>POSTVENTA</td>
                        <td>USERPRUEBA</td>
                        <td>OBJETADA</button></td>
                        <td>12345678</td>
                        <td class="btn btnTrabajado">TRABAJADO</td>
                        <td><button class="btn btn-warning"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></button></td>
                    </tr>

                    <tr>
                        <td>5022</td>
                        <td>INTERNO_FELIX MACLEAN TALAVERA</td>
                        <td>POSTVENTA</td>
                        <td>USERPRUEBA</td>
                        <td>OBJETADA</button></td>
                        <td>12345678</td>
                        <td class="btn btnTrabajado">TRABAJADO</td>
                        <td><button class="btn btn-warning"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></button></td>
                    </tr>
                </tbody>
            </table>
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








@endsection