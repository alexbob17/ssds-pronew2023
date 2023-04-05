@extends('app') @section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('success_message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('success_message') }}</p>
        </div>
        @endif

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Datos del Caso</h3>
            </div>
            <!-- FORMULARIO #REGISTRO TECNICO-->

            <form id="registro-tecnico-form" method="POST" action="{{ route('registro_tecnico.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group-container">
                    <div class="form-group col-md-9" style="padding-top:2rem">
                        <label for="codigo_tecnico">Motivo Consulta</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-square"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingrese Motivo Consulta"
                                id="codigo_tecnico" name="codigo_tecnico"
                                oninput="this.value = this.value.toUpperCase()" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group col-md-3" style="padding-top:2rem">
                            <button type="submit" class="btn btn-primary" style="margin-top: 2.4rem;">Guardar
                                Registro</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="box box-warning">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="box-header">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group-container">
                                    <table id="TableTecnico" data-toggle="table" data-search="true"
                                        data-pagination="true" data-refresh="true" data-pagination="10"
                                        data-search-align="left" data-toolbar="#toolbar" data-refresh="true">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Motivo Consulta</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->

        <script>
        const editButtons = document.querySelectorAll(".edit-btn");

        for (let i = 0; i < editButtons.length; i++) {
            const button = editButtons[i];
            button.addEventListener("click", function() {
                const codigo = this.getAttribute("data-codigo");
                alert(`Editando técnico con código ${codigo}`);
                console.log(codigo);
            });
        }
        </script>


        @if(isset($message))
        @if(isset($success) && $success)
        <script>
        Swal.fire({
            icon: "success",
            title: "{{$message}}",
            showConfirmButton: false,
            timer: 1800,
        });

        // window.location = window.location;
        </script>
        @else
        <script>
        Swal.fire({
            icon: "error",
            title: "{{$message}}",
            showConfirmButton: false,
            timer: 2000,
        });
        window.location = window.location;
        </script>
        @endif
        @endif

        @endsection @section('styles')
        <!-- SweetAlert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" />

        <script>
        $(function() {
            $("#TableTecnico").bootstrapTable({
                customSearch: function(text) {
                    // Aquí se realiza la búsqueda personalizada
                },
            });

            $("#TableTecnico .caret").css("display", "none");
            // Cambiar texto e icono de búsqueda
            $(".bootstrap-table .form-control").attr("placeholder", "Buscar Consultas..");
            $(".bootstrap-table .search button i").removeClass("glyphicon-search").addClass(
                "fa-duotone fa-user-magnifying-glass");
        });
        </script>


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

        <!-- datepicker -->
        <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript">
        </script>
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
        <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript">
        </script>
        <!-- User definided -->

        <script src="{{asset('/js/Tecnicos/RegistrarTecnico.js')}}" type="text/javascript"> </script>

        @endsection
    </div>
</div>