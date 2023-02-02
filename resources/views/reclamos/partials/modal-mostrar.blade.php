<div id="modal-mostrar-reclamo" class="modal fade modal-default">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body no-padding">
				<div class="box box-solid no-margin no-shadow">
					<div class="box-body">
						<dl class="dl-horizontal">
							<dt>{!! trans('reclamos/buscar.codigo_tecnico') !!}</dt>
							<dd id="codigo-tecnico"></dd>
							<dt>{!! trans('reclamos/buscar.nombre_tecnico') !!}</dt>
							<dd id="nombre-tecnico"></dd>
							<dt>{!! trans('reclamos/buscar.tecnologia') !!}</dt>
							<dd id="tecnologia"></dd>
							<dt>{!! trans('reclamos/buscar.id_producto') !!}</dt>
							<dd id="id-producto"></dd>
							<dt>{!! trans('reclamos/buscar.id_solicitud') !!}</dt>
							<dd id="id-solicitud"></dd>
							<dt>{!! trans('reclamos/buscar.lider_tecnica') !!}</dt>
							<dd id="lider-tecnica"></dd>
							<dt>{!! trans('reclamos/buscar.causa_reclamo') !!}</dt>
							<dd id="causa-reclamo"></dd>
							<dt>{!! trans('reclamos/buscar.estado') !!}</dt>
							<dd id="estado"></dd>
							<dt>{!! trans('reclamos/buscar.fecha_creacion') !!}</dt>
							<dd id="fecha-creacion"></dd>
							<dt>{!! trans('reclamos/buscar.usuario_creacion') !!}</dt>
							<dd id="usuario-creacion"></dd>
							<dt>{!! trans('reclamos/buscar.fecha_atencion') !!}</dt>
							<dd id="fecha-atencion"></dd>
							<dt>{!! trans('reclamos/buscar.usuario_atencion') !!}</dt>
							<dd id="usuario-atencion"></dd>
							<dt>{!! trans('reclamos/buscar.observaciones') !!}</dt>
							<dd id="observaciones" class="scroll-pane"></dd>
							<dt>{!! trans('reclamos/buscar.resolucion_tecnica') !!}</dt>
							<dd id="resolucion-tecnica" class="scroll-pane"></dd>
						</dl>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="modal-footer">
				{!! link_to('reclamos/editar/','Editar', ['id' => 'btn-editar-reclamo', 'class' => 'btn btn-warning']) !!}
				<button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>
