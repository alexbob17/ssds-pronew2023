@extends('app') 

@section('content')
<div id="modal-confirmacion" class="modal fade modal-warning">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
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
		<div id="agentes" class="box box-warning box-solid">
			<div class="box-header">
				<h3 class="box-title">Agentes Registrados</h3>
				<!-- tools box -->
                <div class="pull-right box-tools">
                	 {!! Html::decode(link_to(
                     	'/penalizaciones/registro-agente/',
                        '<i class="fa fa-user-plus"></i>', [
                           	'class' => 'btn btn-info btn-sm', 
                           	'data-toggle' => 'tooltip', 
                     		'title' => 'Crear agente nuevo'
                     	]
                     )) !!}
                </div><!-- /. tools -->
			</div>
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered table-striped">
					<thead>
						<tr>
							<th></th>
							<th>{!! trans('penalizaciones/administrar-agentes.nivel') !!}</th>
							<th>{!! trans('penalizaciones/administrar-agentes.nombre') !!}</th>
							<th>{!! trans('penalizaciones/administrar-agentes.es_visible') !!}</th>
							<th>{!! trans('penalizaciones/administrar-agentes.fecha_creacion') !!}</th>
							<th>{!! trans('penalizaciones/administrar-agentes.ultima_modificacion') !!}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($agentes as $agente)
						<tr>
                            <td>
                            	{!! Html::decode(link_to(
                            		'/penalizaciones/editar-agente/' . $agente->id, 
                            		'<i class="fa fa-edit"></i>', [
                            			'class' => 'btn btn-xs btn-info', 
                            			'data-toggle' => 'tooltip', 
                            			'title' => 'Editar'
                            		]
                            	)) !!}
                            	@if ($agente->es_visible == True)
                            	{!! Html::decode(link_to(
                            		'/penalizaciones/cambiar-estado/' . $agente->id,
                            		'<i class="fa fa-arrow-circle-down"></i>', [
                            			'class' => 'btn btn-xs btn-danger modal-confirm deactivated-account', 
                            			'data-toggle' => 'tooltip', 
                            			'title' => 'Baja agente'
                            		]
                            	)) !!}
                            	@elseif ($agente->es_visible == False)
								{!! Html::decode(link_to(
                            		'/penalizaciones/cambiar-estado/' . $agente->id,
                            		'<i class="fa fa-arrow-circle-up"></i>', [
                            			'class' => 'btn btn-xs btn-success modal-confirm activated-account', 
                            			'data-toggle' => 'tooltip', 
                            			'title' => 'Alta agente'
                            		]
                            	)) !!}
								@endif
                     		</td>
                     		<td>{!! $agente->nivel !!}</td>
                     		<td>{!! $agente->nombre !!}</td>
                     		<td>{!! $agente->es_visible? 'SI' : 'NO' !!}</td>
							<td>{!! $agente->created_at !!}</td>
							<td>{!! $agente->updated_at !!}</td>
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
<link rel="stylesheet" href="{{ asset('/css/penalizaciones/administrar-agentes.css') }}">
@endsection 

@section('scripts')
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
<script src="{{ asset('/js/penalizaciones/administrar-agentes.js') }}" type="text/javascript"></script>
@endsection