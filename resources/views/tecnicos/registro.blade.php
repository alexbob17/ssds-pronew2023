@extends('app') @section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('success_message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('success_message') }}</p>
        </div>
        @endif



        <!-- data-pagination="true" data-pagination="10" -->
        <div class="box box-warning">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="box-header">
                            <!-- /.box-header -->
                            <!-- form start -->

                            <form method="POST" action="{{ route('tecnico_buscar') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="btn_reiniciar" id="btn_reiniciar" />


                                <div class="form-group col-md-3" style>
                                    <label for="codigo_tecnico"></label>
                                    <div class="input-group" style="padding-top: 5px;">
                                        <div class="input-group-addon">
                                            <i class="fa fa-square"></i>
                                        </div>
                                        <input type="text" class="form-control effect-8" placeholder="N° Codigo Tecnico"
                                            id="codigo_tecnico" name="codigo_tecnico"
                                            oninput="this.value = this.value.toUpperCase()" required
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </form>

                            <div class="box-body">
                                <div class="form-group-container" style="position: relative;">
                                    <a href="{{ route('Tecnico_guardar') }}" class="btn btn-primary"
                                        style="right:0px;position: absolute;margin-top:-1rem!important">
                                        <i class="fa fa-user-plus"></i>
                                    </a>

                                    <table id="TableTecnico" data-search-align="left" data-toolbar="#toolbar"
                                        data-refresh="true" data-sortable="true"
                                        class="table table-striped table-bordered" style="padding-bottom:2rem">
                                        <thead class="" style="color: #337ab7;height: 45px;">
                                            <tr>
                                                <th data-sortable="true">Código Técnico</th>
                                                <th data-sortable="true">Técnico</th>
                                                <th data-sortable="true">Teléfono</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(isset($data))
                                            @foreach($data as $registro)
                                            <tr>
                                                <td>{{ $registro['CODIGO'] }}</td>
                                                <td>{{ $registro['NOMBRE'] }}</td>
                                                <td>{{ $registro['NUMERO'] }}</td>
                                                <td>
                                                    <form action="{{ route('tecnicos_delete', $registro['CODIGO']) }}"
                                                        method="POST" id="delete-form"
                                                        onsubmit="return confirmDelete()">

                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" name="_method" value="DELETE">

                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->


        <script>
        function confirmDelete() {
            Swal.fire({
                title: '¿Estás seguro que deseas eliminar este registro?',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                width: 350,
                height: 250,
                cancelButtonText: 'Cancelar',
                icon: 'warning'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Procede con la eliminación
                    $.ajax({
                        method: 'DELETE',
                        url: $('#delete-form').attr('action'),
                        data: $('#delete-form').serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: 'Eliminado!',
                                text: response.message,
                                icon: 'success'
                            }).then((result) => {
                                window.location.href = "{{ route('mostrar_tecnicos') }}";
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'No se pudo eliminar el registro.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });

            return false;
        }
        </script>





        @if(isset($message))
        @if(isset($success) && $success)
        <script>
        Swal.fire({
            icon: "success",
            title: "{{$message}}",
            showConfirmButton: false,
            timer: 1500,
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
        // window.location = window.location;
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
            $(".bootstrap-table .form-control").attr("placeholder", "Buscar Tecnicos...");
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

        <!-- <script src="{{asset('/js/Tecnicos/RegistrarTecnico.js')}}" type="text/javascript"> </script> -->

        @endsection
    </div>
</div>