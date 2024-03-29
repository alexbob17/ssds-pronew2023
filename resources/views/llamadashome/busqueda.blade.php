@extends('app') @section('content')

<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Resto del contenido de la sección head -->
</head>

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
                <!-- <h3 class="box-title">Datos Busqueda</h3> -->
            </div>
            <!-- FORMULARIO #1 INICIAL CAMPOS NECESARIOS -->
            <form action="{{ route('busqueda.generar') }}" method="POST" id="form1" class="formulario box-body"
                style="padding-top: 15px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="selected_fields" id="selected-fields" />

                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="NordenBusqueda">N° ORDEN</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="Ingresa N° Orden"
                                id="NordenBusqueda" name="NordenBusqueda"
                                oninput="this.value = this.value.toUpperCase()" required autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="margin-top: 2.5rem; width: auto;">
                        <button type="submit" id="btn_busqueda" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                        <button type="button" id="btn_clean" class="btn btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>


                    <div class="form-group">


                    </div>
                </div>
            </form>

        </div>

        <div class="box box-warning">

            <table id="TableTecnico" style="" data-toolbar="#toolbar" data-refresh="true" data-sortable="true"
                class="table table-striped table-bordered">

                <thead class="" style=" color: #337ab7;height: 45px;">
                    <th data-sortable=" true">COD</th>
                    <th data-sortable="true">TECNICO</th>
                    <th data-sortable="true">MOTIVO LLAMADA</th>
                    <th data-sortable="true">TECNOLOGIA</th>
                    <th data-sortable="true">TIPO ORDEN</th>
                    <th data-sortable="true">TIPO ACTIVIDAD</th>
                    <th data-sortable="true">N° ORDEN</th>
                    <th data-sortable="true">STATUS</th>
                    <th data-sortable="true">USUARIO</th>
                    <th data-sortable="true">FECHA</th>
                    <th>ACCIONES</th>

                </thead>
                <tbody>

                    @foreach($resultados as $resultado)
                    <tr>
                        <td>{{ $resultado->codigo_tecnico }}</td>
                        <td>{{ $resultado->tecnico }}</td>
                        <td>{{ $resultado->motivo_llamada }}</td>
                        <td>{{$resultado->tecnologia}}</td>
                        <td>{{$resultado->select_orden}}</td>
                        <td>{{ $resultado->actividad_tipo}}</td>
                        <td>{{ $resultado->NumeroOrden }}</td>
                        <td
                            class="@if($resultado->estatus == 'TRABAJADO') btn btnTrabajado @elseif($resultado->estatus == 'PENDIENTE') btn btnPendiente @endif">
                            {{$resultado->estatus}}</td>
                        <td>{{ $resultado->username_creacion }}</td>
                        <td>{{ $resultado->created_at }}</td>
                        <td>

                            @if ($resultado->motivo_llamada === 'INSTALACION')
                            <form action="{{ route('mostrarEditar') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <input type="hidden" name="id" value="{{ $resultado->id }}">
                                <input type="hidden" name="motivo_llamada" value="{{ $resultado->motivo_llamada }}">
                                <input type="hidden" name="NumeroOrden" value="{{ $resultado->NumeroOrden }}">
                                <input type="hidden" name="actividad_tipo" value="{{ $resultado->actividad_tipo }}">
                                <input type="hidden" name="tecnologia" value="{{ $resultado->tecnologia }}">
                                <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            </form>

                            @endif

                            @if ($resultado->motivo_llamada === 'POSTVENTA')
                            <form action="{{ route('mostrarEditarPosventa') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <input type="hidden" name="id" value="{{ $resultado->id }}">
                                <input type="hidden" name="motivo_llamada" value="{{ $resultado->motivo_llamada }}">
                                <input type="hidden" name="NumeroOrden" value="{{ $resultado->NumeroOrden }}">
                                <input type="hidden" name="actividad_tipo" value="{{ $resultado->actividad_tipo }}">
                                <input type="hidden" name="tecnologia" value="{{ $resultado->tecnologia }}">
                                <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            </form>

                            @endif

                            @if ($resultado->motivo_llamada === 'DAÑO')
                            <form action="{{ route('mostrarEditarDaño') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <input type="hidden" name="id" value="{{ $resultado->id }}">
                                <input type="hidden" name="motivo_llamada" value="{{ $resultado->motivo_llamada }}">
                                <input type="hidden" name="NumeroOrden" value="{{ $resultado->NumeroOrden }}">
                                <input type="hidden" name="actividad_tipo" value="{{ $resultado->actividad_tipo }}">
                                <input type="hidden" name="tecnologia" value="{{ $resultado->tecnologia }}">
                                <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            </form>

                            @endif
                        </td>


                    </tr>
                    @endforeach

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
    window.location.href = "{{ route('busqueda.generar') }}";
});
</script>




@if(session('success'))
<script>
Swal.fire({
    icon: "success",
    title: "{{ session('message') }}",
    text: "{{ session('messages') }}",
    showConfirmButton: false,
    timer: 1800,
});
setTimeout(function() {
    window.location.href = "{{ route('busqueda.generar') }}";
}, 1000);
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
<script src="{{asset('/js/busquedas/busqueda.js')}}" type="text/javascript"></script>

<!-- User definided -->








@endsection