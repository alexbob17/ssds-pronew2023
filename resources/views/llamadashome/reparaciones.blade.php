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
                <h3 class="box-title">Datos del Caso </h3>
            </div>
            <!-- FORMULARIO #1 INICIAL CAMPOS NECESARIOS -->
            <form action="{{ route('registro_llamadas.store') }}" method="POST" id="form1" class="formulario box-body"
                style="border-bottom: 3px solid #3e69d6;padding-top:15px">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="selected_fields" id="selected-fields">


                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                                id="codigo_tecnico" name="codigo_tecnico"
                                oninput="this.value = this.value.toUpperCase()" required />
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
                                    name="telefono" readonly="true" required />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tecnico">Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" placeholder="Nombre Tecnico" class="form-control" id="tecnico"
                                    name="tecnico" readonly="true" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-3" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" placeholder="DAÑO" value="DAÑO" readonly="true"
                            id="motivo_llamada" name="motivo_llamada"
                            style="color: #3E69D6; background: #fbfbfb; text-align: center;" />
                    </div>
                    <div class="form-group col-md-2" id="tec_input">
                        <label for="tecnologia">Tecnologia</label>
                        <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1"
                            id="tecnologia" aria-hidden="true" required>
                            <option selected="selected">SELECCIONE</option>
                            <option value="HFC">HFC</option>
                            <option value="GPON">GPON</option>
                            <option value="ADSL">ADSL</option>
                            <option value="COBRE">COBRE</option>
                            <option value="DTH">DTH</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" id="select_ordenhide">
                        <label for="select_orden">Tipo Orden</label>
                        <select class="form-control" id="select_orden" style="width: 100%;" name="select_orden"
                            tabindex="-1" aria-hidden="true" required>
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true" required>
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>

                    <!-- FORMULARIO #2 HFC -->

                    <div id="reparacionesHfc" class="form-group-container ">

                        <div class="form-group-container">
                            <div class="TipoActividad_Hidden" style="margin-top: 2.5rem;">
                                <div class="form-group col-md-3">
                                    <label for="TipoActividadReparacionHfc">Tipo Actividad</label>
                                    <select class="form-control tipo_actividad" style="width: 100%;"
                                        name="TipoActividadReparacionHfc" tabindex="-1" id="TipoActividadReparacionHfc"
                                        aria-hidden="true">
                                        <option selected=" selected">SELECCIONE UNA OPCION</option>
                                        <option value="REALIZADA">REALIZADA</option>
                                        <option value="OBJETADA">OBJETADA</option>
                                        <option value="ANULACION">ANULACION</option>
                                        <option value="TRANSFERIDA" class="ocultar">TRANSFERIDA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC REALIZADA -->

                        <div class="form-group-container box-warning ReparacionHiddenHfc" id="RealizadaReparacionHfc">
                            <div class="form-group col-md-3" id="hideEquipoTv">
                                <label for="EquiposTv_Hfc">Equipos Tv</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv1"
                                        name="equipostv1" placeholder="Equipo Tv 1"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv2"
                                        name="equipostv2" placeholder="Equipo Tv 2"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv3"
                                        name="equipostv3" placeholder="Equipo Tv 3"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv4"
                                        name="equipostv4" placeholder="Equipo Tv 4"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-square"></i>
                                    </div>
                                    <input type="text" class="form-control equipotvHfc" id="equipostv5"
                                        name="equipostv5" placeholder="Equipo Tv 5"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="syrengHfc">SYRENG</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="syrengHfc"
                                        placeholder="Ingresa SYRENG" name="syrengHfc" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="sapHfc">SAP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="text" placeholder="Ingresa SAP" class="form-control" id="sapHfc"
                                        name="sapHfc" oninput="this.value = this.value.toUpperCase()" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="EquipoModem_Hfc">
                                    Equipo Modem
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-rss"></i>
                                    </div>
                                    <input type="text" class="form-control" id="EquipoModem_Hfc" name="EquipoModem_Hfc"
                                        placeholder="Ingresa Equipo Modem"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numeroVoip_hfc">
                                    Numero Voip
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control" id="numeroVoip_hfc" name="numeroVoip_hfc"
                                        placeholder="Ingresa Numero Voip" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="GeorefHfc">
                                    Georeferencia
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="GeorefHfc" name="GeorefHfc"
                                        placeholder="Latitud, Longitud" />
                                </div>
                            </div>
                            <div class="from-group col-md-3">
                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoHfc"
                                                name="TrabajadoHfc" />
                                            <label class="form-check-label" for="TrabajadoHfc">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group col-md-12">
                                    <label for="ObservacionesHfc">
                                        Observaciones
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ObservacionesHfc"
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="RecibeHfc">
                                        Recibe
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" placeholder="Ingresa quien recibe el caso"
                                            class="form-control" id="RecibeHfc" name="RecibeHfc"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group-container">
                                    <h4 class="box-title"
                                        style="color: #3e69d6; text-align: center; font-weight: bold;">
                                        ELEMENTOS RED
                                    </h4>
                                    <div class="" style="margin: botton 12px; border-top: 1px solid #c0bfbf;">
                                        <div class="form-group-container" style="margin-top: 1rem;">
                                            <div class="form-group col-md-3">
                                                <label for="NodoHfc">
                                                    Nodo
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="NodoHfc" name="NodoHfc"
                                                        placeholder="Ingresa Nodo"
                                                        oninput="this.value = this.value.toUpperCase()" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="TapHfc">
                                                    TAP
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="TapHfc" name="TapHfc"
                                                        placeholder="Ingresa TAP" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="PosicionHfc">
                                                    Posicion
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-square"></i>
                                                    </div>
                                                    <input type="number" class="form-control" id="PosicionHfc"
                                                        name="PosicionHfc" placeholder="Ingresa Posicion" />
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="MaterialesHfc">
                                                    Materiales
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="MaterialesHfc"
                                                        name="MaterialesHfc" placeholder="Comentarios..."
                                                        oninput="this.value = this.value.toUpperCase()" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INPUTS HFC OBJETADA -->

                        <div class="form-group-container ReparacionHiddenHfc" id="ObjetadaReparacionHfc">
                            <div class="from-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoObjetada_Hfc">Motivo Objetado</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetada_Hfc" tabindex="-1"
                                            id="MotivoObjetada_Hfc" aria-hidden="true">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="SYREM INEXISTENTE"> SYREM
                                                INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="SYREM CON DATOS INCOMPLETOS / ERRADOS">SYREM CON DATOS
                                                INCOMPLETOS / ERRADOS </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="NODO INCORRECTO"> NODO INCORRECTO </option>
                                            <option value="OTROS"> OTROS </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoObjetadaHfc"
                                                name="TrabajadoObjetadaHfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentariosObjetados_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentariosObjetados_Hfc"
                                            name="ComentariosObjetados_Hfc" placeholder="Comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INPUTS HFC TRANSFERIDA -->

                        <div class="form-group-container ReparacionHiddenHfc" id="TransferidoReparacionHfc">
                            <div class="form-group col-md-9">
                                <label for="MotivoTransferidoHfc">
                                    Motivo Transferido
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MotivoTransferidoHfc"
                                        name="MotivoTransferidoHfc" placeholder="Ingresa motivo transferido"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                            </div>

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoTransferido_Hfc"
                                            name="TrabajadoTransferido_Hfc" />
                                        <label class="form-check-label">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentariosTransferida_Hfc">
                                    Comentarios
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentariosTransferida_Hfc"
                                        name="ComentariosTransferida_Hfc" placeholder="Comentarios del caso"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                            </div>
                        </div>


                        <!-- ACTIVIDAD ANULADA HFC -->
                        <div class="form-group-container ReparacionHiddenHfc" id="AnuladaReparacionHfc">
                            <div class="form-group-container">
                                <div class="from-group-container">
                                    <div class="form-group col-md-4">
                                        <label for="MotivoAnulada_Hfc">Motivo Anulación</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoAnulada_Hfc" tabindex="-1"
                                            id="MotivoAnulada_Hfc" aria-hidden="true">
                                            <option selected="selected" value="">SELECCIONE UNA OPCION</option>
                                            <option value="CASA CERRADA">CASA CERRADA </option>
                                            <option value="CASA NO PRESTA CONDICIONES DE INSTALACION">CASA NO PRESTA
                                                CONDICIONES DE INSTALACION </option>
                                            <option value="CLIENTE NO DESEA EL SERVICIO">CLIENTE NO DESEA EL SERVICIO
                                            </option>
                                            <option value="CLIENTE NO SE LOCALIZA">CLIENTE NO SE LOCALIZA
                                            </option>
                                            <option value="CLIENTE YA TIENE EL SERVICIO">CLIENTE YA TIENE EL SERVICIO
                                            </option>
                                            <option value="CLIENTE SOLICITA INSTALACION CON FECHA POSTERIOR">CLIENTE
                                                SOLICITA INSTALACION CON FECHA POSTERIOR
                                            </option>
                                            <option value="CONDICIONES TECNICAS (DISTANCIA NO PERMITIDA)">CONDICIONES
                                                TECNICAS (DISTANCIA NO PERMITIDA)
                                            </option>
                                            <option value="DIRECCION REGISTRADA CON EXCEDENTE DE CARACTERES">DIRECCION
                                                REGISTRADA CON EXCEDENTE DE CARACTERES
                                            </option>
                                            <option value="NO HAY PUERTO LIBRE EN DSLAM">NO HAY PUERTO LIBRE EN DSLAM
                                            </option>
                                            <option value="FALTA POSTERIA">FALTA POSTERIA
                                            </option>
                                            <option value="NO HAY DSLAM EN CENTRAL CONCENTRADOR O SHELTER">NO HAY DSLAM
                                                EN CENTRAL CONCENTRADOR O SHELTER
                                            </option>
                                            <option value="DIRECCION ERRONEA">DIRECCION ERRONEA
                                            </option>
                                            <option value="EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION">
                                                EXISTE RED DIGITAL PERO NO HAY CONDICIONES DE INSTALACION
                                            </option>
                                            <option value="ELEMENTOS MAL ASIGNADOS">ELEMENTOS MAL ASIGNADOS
                                            </option>
                                            <option value="RED FISICA INSTALADA PERO NO ACTIVA">RED FISICA INSTALADA
                                                PERO NO ACTIVA
                                            </option>
                                            <option value="NO HAY RED DIGITAL">NO HAY RED DIGITAL
                                            </option>
                                            <option value="NO HAY RED"> NO HAY RED </option>
                                            <option value="RED SATURADA">
                                                RED SATURADA </option>
                                            <option value="SOLICITUD REPETIDA">SOLICITUD REPETIDA </option>
                                            <option
                                                value="SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA)">
                                                SOLICITUD REGISTRADA CON EQUIPOS INCORECTOS (OTRA TECNOLOGIA) </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="from-group-container">
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="TrabajadoAnulada_Hfc"
                                                name="TrabajadoAnulada_Hfc" />
                                            <label class="form-check-label">
                                                Trabajado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ComentarioAnulada_Hfc">
                                        Comentarios
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ComentarioAnulada_Hfc"
                                            name="ComentarioAnulada_Hfc" placeholder="Ingresa comentarios del caso"
                                            oninput="this.value = this.value.toUpperCase()" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box-footer" id="btn-submitForm"
                    style="text-align: center; display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk"
                            style="padding-right:8px"></i>GUARDAR
                        REGISTRO</button>
                </div>

            </form>
        </div>
    </div>
</div>



@if(isset($message))
<script>
Swal.fire({
    icon: "success",
    title: "{{$message}}",
    text: "{{$messages}}",
    showConfirmButton: false,
    timer: 1800,
});

// window.location = window.location;
</script>
@endif

@endsection @section('styles')



<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" />







<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById("form1");
    const selectedFieldsInput = document.querySelector('#selected-fields');
    const inputs = form.querySelectorAll('input[type="text"], input[type="number"], input[type="checkbox"]');


    let selectedFields = [];

    inputs.forEach(input => {
        input.addEventListener('change', () => {
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
<script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript">
</script>
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
<!-- InputMask -->
<script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<!-- boostrap-fileinput -->
<script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript">
</script>
<!-- User definided -->
<!-- <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script> -->
<script src="{{asset('/js/reparaciones/reparacionesSelect.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/ValoresTecnico.js')}}" type="text/javascript"></script>

<script src="{{asset('/js/instalaciones/ValidacionFormulario.js')}}" type="text/javascript"> </script>

@endsection