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
            <!-- FORMULARIO #1 -->
            <form action="" id="form-registro" class="box-body" style="border-bottom:3px solid #3e69d6">
                <div class="form-group-container">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group-container">
                        <div class="form-group col-md-3 ">
                            <label for="codigo_tecnico">Código Técnico</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-square"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Ingrese Codigo Tecnico"
                                    id="codigo_tecnico" name="codigo_tecnico"
                                    oninput="this.value = this.value.toUpperCase()" autocomplete="off" />
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
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        readonly="true" placeholder="TELEFONO" />
                                </div>
                            </div>


                            <div class="form-group col-md-5">
                                <label for="tecnico">Técnico</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" id="tecnico" name="tecnico" readonly="true"
                                        placeholder="NOMBRE TECNICO" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group-container">
                        <div class="form-group col-md-3" id="view-container">
                            <label for="motivo_llamadaform1">Motivo Llamada</label>
                            <select class="form-control" style="width: 100%;" name="motivo_llamadaform1" tabindex="-1"
                                id="motivo_llamadaform1" aria-hidden="true" onchange="submitForm()">
                                <option selected="selected">SELECCIONE UNA OPCION</option>
                                <option value="INSTALACION">INSTALACION</option>
                                <option value="POSTVENTA">POSTVENTA</option>
                                <option value="REPARACIONES">REPARACIONES</option>
                                <option value="CONSULTAS">CONSULTAS</option>
                                <option value="AGENDAMIENTOS">AGENDAMIENTOS</option>

                                <!-- <option value="ANULACIONES">ANULACIONES</option>
                                <option value="REACTIVACION">REACTIVACION</option> -->
                            </select>
                        </div>
                    </div>

                    <div class="box-footer" id="" style="text-align: center; display: flex; justify-content: center;">
                        <button id="submitBtn" type="submit" class="btn btn-warning" style="display: none;">Guardar
                            Caso</button>
                    </div>
            </form>



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





            <!-- Select2 -->
            <link rel=" stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css" />
            <link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}" />
            <!-- User definided -->
            <link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}" />
            <style>
            [type="submit"]:disabled {
                cursor: default;
            }
            </style>
            @endsection @section('scripts')

            <!-- SweetAlert -->
            <link href="{{ asset('/plugins/CdnMigraciones/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

            <script src="{{ asset('/plugins/CdnMigraciones/sweetalert2.all.min.js') }}"></script>

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
            <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
            <script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"> </script>
            <script src="{{asset('/js/instalaciones/LocalStorageTecnico.js')}}" type="text/javascript"> </script>
            <script src="{{asset('/js/instalaciones/changePage.js')}}" type="text/javascript"> </script>

            @endsection