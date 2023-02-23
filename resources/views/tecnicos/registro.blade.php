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


            <form id="registro-tecnico-form" method="POST" action="{{ route('registro_tecnico.store') }}">
                {!! csrf_field() !!}

                <div class="form-group col-md-3">
                    <label for="codigo_tecnico">Código Técnico:</label>
                    <input type="text" class="form-control" id="codigo_tecnico" name="codigo_tecnico" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nombre_tecnico">Nombre Técnico:</label>
                    <input type="text" class="form-control" id="nombre_tecnico" name="nombre_tecnico" required>
                </div>
                <div class="form-group col-md3">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                </tbody>
            </table>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>



            @if(isset($message))
            <script>
            Swal.fire({
                icon: 'success',
                title: '{{$message}}',
                showConfirmButton: false,
                timer: 1500
            })
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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css">

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
            <!-- <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script> -->
            <!-- <script src="{{asset('/js/registro/ValidacionTecnico.js')}}" type="text/javascript"> </script> -->
            <script src="{{asset('/js/Tecnicos/RegistrarTecnico.js')}}" type="text/javascript"> </script>

            <!-- <script src="{{asset('/js/instalaciones/changePage.js')}}" type="text/javascript"> </script> -->

            @endsection