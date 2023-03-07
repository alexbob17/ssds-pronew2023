@extends('app')
@section('content')
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
            <!-- FORMULARIO #1 POSTVENTAS -->


            <form action="" method="post" id="form1" style="border-bottom:3px solid rgb(62, 105, 214)">
                <div class="form-group-container">
                    <div class="form-group col-md-3">
                        <label for="codigo_tecnico">Código Técnico</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                                id="codigo_tecnico" name="codigo_tecnico"
                                oninput="this.value = this.value.toUpperCase()" />
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
                                    name="telefono" readonly="true" />
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tecnico">Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" placeholder="Nombre Tecnico" class="form-control" id="tecnico"
                                    name="tecnico" readonly="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-container">
                    <div class="form-group col-md-3" id="view-container">
                        <label for="motivo_llamada">Motivo Llamada</label>
                        <input type="text" class="form-control" placeholder="POSTVENTA" value="POSTVENTA"
                            readonly="true" id="motivo_llamada" name="motivo_llamada"
                            style="color: white; background: #3e69d6; text-align: center;" />
                    </div>
                    <div class="form-group col-md-3" id="select_ordenhide">
                        <label for="Select_Postventa">TIPO POSTVENTA</label>
                        <select class="form-control" id="Select_Postventa" style="width: 100%;" name="Select_Postventa"
                            tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                            <option value="POSTVENTA TRASLADO">POSTVENTA TRASLADO</option>
                            <option value="POSTVENTA ADICION">POSTVENTA ADICION</option>
                            <option value="POSTVENTA CAMBIO DE EQUIPO">POSTVENTA CAMBIO DE EQUIPO</option>
                            <option value="POSTVENTA MIGRACION">POSTVENTA MIGRACION</option>
                            <option value="POSTVENTA RECONEXION / RETIRO">POSTVENTA RECONEXION / RETIRO</option>
                            <option value="POSTVENTA CAMBIO NUMERO COBRE">POSTVENTA CAMBIO NUMERO COBRE</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2" id="tec_input">
                        <label for="tecnologia">Tecnologia</label>
                        <select class="form-control" style="width: 100%;" name="tecnologia" tabindex="-1"
                            id="tecnologia" aria-hidden="true">
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
                            tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div>
                    <!-- <div class="form-group col-md-4">
                        <label for="dpto_colonia">DPTO / COLONIA</label>
                        <select class="form-control select2 select2-hidden-accessible" id="dpto_colonia"
                            style="width: 100%;" name="dpto_colonia" tabindex="-1" aria-hidden="true">
                            <option value="">SELECCIONE UNA OPCION</option>
                        </select>
                    </div> -->


                    <div>

                    </div>
                </div>

                <!-- POSTVENTAS TRASLADOS -->
                <div class="form-group-container">
                    <!-- POSTVENTAS TRASLADOS HFC -->
                    <div class="form-group-container HiddenTrasladoHfc" id="PostventaTrasladosHfc">
                        <div class="form-group col-md-3">
                            <label for="TipoActividadTrasladoHfc">Tipo Actividad</label>
                            <select class="form-control tipo_actividad" style="width: 100%;"
                                name="TipoActividadTrasladoHfc" id="TipoActividadTrasladoHfc" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="REALIZADA">REALIZADA</option>
                                <option value="OBJETADA">OBJETADA</option>
                                <option value="TRANSFERIDA">TRANSFERIDA</option>
                            </select>
                        </div>
                        <div class="TrasladoHfcHidden" id="RealizadaTrasladoHfc">
                            <div class="form-group-container col-md-12">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInternet_Gpon">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenInternet_Gpon"
                                            name="OrdenInternet_Gpon" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTv_Gpon">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenTv_Gpon"
                                            name="OrdenTv_Gpon" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLinea_Gpon">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLinea_Gpon"
                                            name="OrdenLinea_Gpon" />
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
                                            name="ObservacionesHfc" placeholder="Ingresa las observaciones del caso" />
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
                                            class="form-control" id="RecibeHfc" name="RecibeHfc" />
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
                                                        placeholder="Ingresa Nodo" />
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
                                                        name="MaterialesHfc" placeholder="Comentarios..." />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="TrasladoHfcHidden" id="ObjetadaTrasladoHfc">
                            <div class="col-md-12">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInternet_Gpon">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenInternet_Gpon"
                                            name="OrdenInternet_Gpon" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTv_Gpon">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenTv_Gpon"
                                            name="OrdenTv_Gpon" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLinea_Gpon">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLinea_Gpon"
                                            name="OrdenLinea_Gpon" />
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group col-md-3">
                                        <label for="MotivoObjetado_Gpon">MOTIVO OBJETADO</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="MotivoObjetado_Gpon" tabindex="-1"
                                            id="MotivoObjetado_Gpon" aria-hidden="true">
                                            <option selected="selected">SELECCIONE UNA OPCION</option>
                                            <option value="ANULACIÓN POR COD DE TEC">ANULACIÓN POR COD DE TEC </option>
                                            <option value="COORDENADAS ERRONEAS">COORDENADAS ERRONEAS </option>
                                            <option value="EQUIPO NO INVENTARIADO EN SAP">EQUIPO NO INVENTARIADO EN SAP
                                            </option>
                                            <option value="EQUIPOS CON PROBLEMAS EN SAP">EQUIPOS CON PROBLEMAS EN SAP
                                            </option>
                                            <option value="NO SE LOCALIZA AL CLIENTE">NO SE LOCALIZA AL CLIENTE
                                            </option>
                                            <option value="NUMERO DE GESTION SYREM INEXISTENTE"> NUMERO DE GESTION SYREM
                                                INEXISTENTE </option>
                                            <option value="PROBLEMAS DE INVENTARIADO OPEN"> PROBLEMAS DE INVENTARIADO
                                                OPEN </option>
                                            <option value="RED EN CONSTRUCCION">RED EN CONSTRUCCION </option>
                                            <option value="RED NO HABILITADA">RED NO HABILITADA </option>
                                            <option value="ROUTER NO SINCRONIZA">ROUTER NO SINCRONIZA </option>
                                            <option value="TEC NO INICIA / PROGRAMA ETA"> TEC NO INICIA / PROGRAMA ETA
                                            </option>
                                            <option value="VANDALISMO"> VANDALISMO </option>
                                        </select>
                                    </div>

                                    <div class="from-group-container">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="TrabajadoGpon_Objetado" name="TrabajadoGpon_Objetado" />
                                                <label class="form-check-label" for="">
                                                    Trabajado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ObsGpon_Objetada">Observaciones</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ObsGpon_Objetada"
                                                name="ObsGpon_Objetada"
                                                placeholder="Ingresa las observaciones del caso" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ComentariosGpon_Objetada">Comentarios</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ComentariosGpon_Objetada"
                                                name="ComentariosGpon_Objetada" placeholder="Comentarios..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="TrasladoHfcHidden" id="AnuladaTrasladoHfc">
                            <div class="" id="RealizadaTrasladoHfc">
                                <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                    <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES HFC T</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenInternet_Gpon">Orden Internet</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenInternet_Gpon"
                                            name="OrdenInternet_Gpon" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="OrdenTv_Gpon">Orden Tv</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenTv_Gpon"
                                            name="OrdenTv_Gpon" />
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="OrdenLinea_Gpon">Orden Linea</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <input type="number" class="form-control OrdenGpon" id="OrdenLinea_Gpon"
                                            name="OrdenLinea_Gpon" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POSTVENTAS TRASLADOS GPON -->
                    <div class="form-group-container HiddenTrasladoGpon" id="PostventaTrasladosGpon">
                        <div class="form-group-container">
                            <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                                <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES GPON</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="OrdenInternet_Gpon">Orden Internet</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control OrdenGpon" id="OrdenInternet_Gpon"
                                        name="OrdenInternet_Gpon" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="OrdenTv_Gpon">Orden Tv</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control OrdenGpon" id="OrdenTv_Gpon"
                                        name="OrdenTv_Gpon" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="OrdenLinea_Gpon">Orden Linea</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-ticket"></i>
                                    </div>
                                    <input type="number" class="form-control OrdenGpon" id="OrdenLinea_Gpon"
                                        name="OrdenLinea_Gpon" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-container">

                            <div class="from-group-container">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="TrabajadoTransferido_Gpon"
                                            name="TrabajadoTransferido_Gpon" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Trabajado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="MotivoTransferidoGpon">Motivo Transferido</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="MotivoTransferidoGpon"
                                        name="MotivoTransferidoGpon" />
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ComentarioTransferido_Gpon">Comentarios</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="ComentarioTransferido_Gpon"
                                        name="ComentarioTransferido_Gpon" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group-container">
                    <!-- POSTVENTAS ADICCION HFC -->
                    <div class="form-group-container HiddenAdiccionHfc" id="PostventaAdicionHfc">
                        <div class="form-group col-md-3" style="margin-top: 3rem; text-align: center;">
                            <label for="" style="color: #3e69d6; font-size: 18px;">SOLICITUDES ADICION</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenInternet_Gpon">Orden Internet</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="number" class="form-control OrdenGpon" id="OrdenInternet_Gpon"
                                    name="OrdenInternet_Gpon" />
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="OrdenTv_Gpon">Orden Tv</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="number" class="form-control OrdenGpon" id="OrdenTv_Gpon"
                                    name="OrdenTv_Gpon" />
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="OrdenLinea_Gpon">Orden Linea</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                                <input type="number" class="form-control OrdenGpon" id="OrdenLinea_Gpon"
                                    name="OrdenLinea_Gpon" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer" id="btn-submit"
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



<!-- Select2 -->
<link rel=" stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}" />
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}" />
@endsection @section('scripts')
<!-- datepicker -->
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript">
</script>
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
<script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"></script>

<!-- <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script> -->
<script src="{{asset('/js/instalaciones/ValoresTecnico.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/instalaciones/PostventaValidacionSelect.js')}}" type="text/javascript"></script>




@endsection