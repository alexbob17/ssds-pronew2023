@extends('app')

@section('content')
<div id="modal-confirmacion" class="modal fade modal-warning">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Advertencia</h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <a id="boton_ok" type="button" class="btn btn-outline"><i class="fa fa-check"></i> SI</a>
                <a type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i> NO</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if (session()->has('success_message'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('success_message') }}</p>
        </div>
    </div>
    @endif
    <div class="col-xs-12">
        <div id="usuarios" class="box box-warning box-solid">
            <div class="box-header">
                <h3 class="box-title">Usuarios Registrados</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    {!! Html::decode(link_to(
                    '/usuarios/registro/',
                    '<i class="fa fa-user-plus"></i>', [
                    'class' => 'btn btn-info btn-sm',
                    'data-toggle' => 'tooltip',
                    'title' => 'Crear usuario nuevo'
                    ]
                    )) !!}
                </div><!-- /. tools -->
            </div>
            <div class="box-body no-padding">
                <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{!! trans('usuarios/administrar.login') !!}</th>
                            <th>{!! trans('usuarios/administrar.nombres') !!}</th>
                            <th>{!! trans('usuarios/administrar.apellidos') !!}</th>
                            <th>{!! trans('usuarios/administrar.email') !!}</th>
                            <th>{!! trans('usuarios/administrar.area_organizacional') !!}</th>
                            <th>{!! trans('usuarios/administrar.permisos') !!}</th>
                            <th>{!! trans('usuarios/administrar.estado') !!}</th>
                            <th>{!! trans('usuarios/administrar.fecha_creacion') !!}</th>
                            <th>{!! trans('usuarios/administrar.ultima_modificacion') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>
                                {!! Html::decode(link_to(
                                '/usuarios/editar/' . $usuario->id,
                                '<i class="fa fa-edit"></i>', [
                                'class' => 'btn btn-xs btn-info',
                                'data-toggle' => 'tooltip',
                                'title' => 'Editar'
                                ]
                                )) !!}
                                {!! Html::decode(link_to(
                                '/usuarios/resetear-contrasena/' . $usuario->id . '/' . $usuario->hash_reset,
                                '<i class="fa fa-unlock-alt"></i>', [
                                'class' => 'btn btn-xs btn-primary modal-confirm reset-password',
                                'data-toggle' => 'tooltip',
                                'title' => 'Resetar contraseña'
                                ]
                                )) !!}
                                @if ($usuario->estado == 'Activo' && Auth::user()->username != $usuario->login)
                                {!! Html::decode(link_to(
                                '/usuarios/desactivar-cuenta/' . $usuario->id . '/' . $usuario->hash_reset,
                                '<i class="fa fa-arrow-circle-down"></i>', [
                                'class' => 'btn btn-xs btn-danger modal-confirm deactivated-account',
                                'data-toggle' => 'tooltip',
                                'title' => 'Desactivar cuenta'
                                ]
                                )) !!}
                                @elseif ($usuario->estado == 'Inactivo' && Auth::user()->username != $usuario->login)
                                {!! Html::decode(link_to(
                                '/usuarios/activar-cuenta/' . $usuario->id . '/' . $usuario->hash_reset,
                                '<i class="fa fa-arrow-circle-up"></i>', [
                                'class' => 'btn btn-xs btn-success modal-confirm activated-account',
                                'data-toggle' => 'tooltip',
                                'title' => 'Activar cuenta'
                                ]
                                )) !!}
                                @endif
                            </td>
                            <td>{!! $usuario->login !!}</td>
                            <td>{!! $usuario->nombres !!}</td>
                            <td>{!! $usuario->apellidos !!}</td>
                            <td>{!! $usuario->email !!}</td>
                            <td>{!! $usuario->area_organizacional !!}</td>
                            <td>{!! $usuario->permisos !!}</td>
                            <td>{!! $usuario->estado !!}</td>
                            <td>{!! $usuario->fecha_creacion !!}</td>
                            <td>{!! $usuario->ultima_modificacion !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('styles')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('/plugins/datatables/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables/extensions/Buttons/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css') }}">
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}">
<link rel="stylesheet" href="{{ asset('/css/usuarios/administrar.css') }}">
@endsection

@section('scripts')
<!-- Datatables -->
<script src="{{ asset('/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.bootstrap.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/datatables/jszip/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/pdfmake/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/pdfmake/vfs_fonts.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.print.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.colVis.min.js') }}" type="text/javascript">
</script>
<!-- User definided -->
<script src="{{ asset('/js/usuarios/administrar.js') }}" type="text/javascript"></script>
@endsection