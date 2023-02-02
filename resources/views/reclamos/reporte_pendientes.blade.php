@extends('app') 

@section('content')
<div class="row">
	<div class="col-xs-12">
		@if (session()->has('success_message'))
            <div class="alert alert-success alert-dismissable">
             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>{{ session('success_message') }}</p>
			</div>
		@endif
		<div id="resultados" class="box box-warning box-solid">
			<div class="box-header">
				<h3 class="box-title">Reporte de Casos Pendientes</h3>
			</div>
			<div class="box-body no-padding">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{!! trans('reclamos/reporte.ticket') !!}</th>
							<th>{!! trans('reclamos/reporte.estado') !!}</th>
							<th>{!! trans('reclamos/reporte.fecha_creacion') !!}</th>
							<th>{!! trans('reclamos/reporte.tipo_tecnico') !!}</th>
							<th>{!! trans('reclamos/reporte.codigo_tecnico') !!}</th>
							<th>{!! trans('reclamos/reporte.nombre_tecnico') !!}</th>
							<th>{!! trans('reclamos/reporte.tecnologia') !!}</th>
							<th>{!! trans('reclamos/reporte.id_producto') !!}</th>
							<th>{!! trans('reclamos/reporte.id_solicitud') !!}</th>
							<th>{!! trans('reclamos/reporte.lider_tecnica') !!}</th>
							<th>{!! trans('reclamos/reporte.causa_reclamo') !!}</th>
							<th>{!! trans('reclamos/reporte.observaciones') !!}</th>
							<th>{!! trans('reclamos/reporte.login_usuario') !!}</th>
							<th>{!! trans('reclamos/reporte.nombre_usuario') !!}</th>
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
<link rel="stylesheet" href="{{ asset('/css/reclamos/reporte-pendientes.css?2.4.0') }}">
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
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/jszip/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/pdfmake/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/pdfmake/vfs_fonts.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.print.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.colVis.min.js') }}" type="text/javascript"></script>
<!-- User definided -->
<script src="{{ asset('/js/reclamos/reporte_pendientes.js?2.4.0') }}" type="text/javascript"></script>
@endsection