@extends('app')

@section('content')
{!! Form::modal('Advertencia', 'Los datos están incompletos, revise los campos e intente nuevamente.', 'Aceptar') !!}
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warinig">
            <div class="box-header with-border">
                <h3 class="box-title">Reporte de Casos Atendidos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-calendar', 3, 'fecha_inicial', $errors, null, null, 'Fecha Inicial') !!}
                    {!! Form::inputWithIcon('fa-calendar', 3, 'fecha_final', $errors, null, null, 'Fecha Final') !!}
                    {!! Form::selection(3, 'username', $errors, $usernames, null, null, 'Seleccione una opción') !!}
                    {!! Form::button('Generar Reporte', ['id' => 'generar_reporte', 'class' => 'btn btn-primary',
                    'style' => 'margin-left: 15px']) !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="resultados" class="box box-warning box-solid">
            <div class="box-header">
                <h3 class="box-title">Resultados</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{!! trans('inconsistencias/reporte.consecutivo') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.estado') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.periodo') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.fecha_incidente') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.fecha_atencion') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.no_incidente') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.tipo_servicio') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.tipo_inconsistencia') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.otra_inconsistencia') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.codigo_tecnico') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.no_orden') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.resolucion') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.accion') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.username_creacion') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.usuario_creacion') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.username_atencion') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.usuario_atencion') !!}</th>
                            <th>{!! trans('inconsistencias/reporte.observaciones') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
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
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('/plugins/datatables/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables/extensions/Buttons/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css') }}">
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}">
<link rel="stylesheet" href="{{ asset('/css/inconsistencias/reportes.css?2.5.0') }}">
@endsection

@section('scripts')
<!-- datepicker -->
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
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
<script src="{{ asset('/js/inconsistencias/reporte_atendidos.js?2.5.0') }}" type="text/javascript"></script>
@endsection