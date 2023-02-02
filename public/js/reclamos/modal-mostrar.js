function initMostralModalReclamos(selector) {
		
	var locales = {
			title_sucess	: 'Ticket No. ',
			title_error		: 'ERROR',
			status_error 	: 'Ha ocurrido un error al conectarse con el servidor',
	};
	
	$(selector).delegate('td a', 'click', function(e) {
		e.preventDefault();
		e.stopImmediatePropagation();	

		$("#btn-editar-reclamo").hide();
        $('#modal-mostrar-reclamo').modal('show');
		$('#modal-mostrar-reclamo dl').hide();   
		$('#modal-mostrar-reclamo p').remove();   
		$('#modal-mostrar-reclamo .modal-title').text(locales.status_loading);
		$('#modal-mostrar-reclamo .modal-body .box-body').append(
        	'<div class="overlay">' +
    	       	'<i class="fa fa-refresh fa-spin"></i>' +
    		'</div>'
    	);

		var ticket = $(this).data('ticket');
			
        $.ajax({
           	url: APP_URL + '/reclamos/mostrar-caso',
           	data: { 'ticket' : ticket, }   
        })
        .fail(function () {
        	$('#modal-mostrar-reclamo .overlay').remove();	
        	$('#modal-mostrar-reclamo .modal-title').text(locales.title_error);
           	$('#modal-mostrar-reclamo .modal-body .box-body').append(
				'<p class="text-red no-margin"><i class="icon fa fa-warning"></i> ' + locales.status_error + '</p>'
            );
   		})
      	.done(function(data) {
        	$('#modal-mostrar-reclamo .overlay').remove();
    		$('#modal-mostrar-reclamo .modal-title').text(locales.title_sucess + ticket);
    		$('#modal-mostrar-reclamo dl').show();

    		$("#btn-editar-reclamo").attr('href', APP_URL + '/reclamos/editar/' + ticket);   
   			if(data.estado != 'ATENDIDO') {
				$("#btn-editar-reclamo").show();
   	   	   	}
    		
   			$("#codigo_tecnico").text(data.codigo_tecnico);
    	    $("#nombre-tecnico").text(data.nombre_tecnico);
   			$("#tecnologia").text(data.tecnologia);
   			$("#id-producto").text(data.id_producto);
   			$("#id-solicitud").text(data.id_solicitud);
   			$("#lider-tecnica").text(data.lider_tecnica);
   			$("#causa-reclamo").text(data.causa_reclamo);
   			$("#estado").text(data.estado);
   			$("#usuario-creacion").text(data.usuario_creacion)
   			$("#fecha-creacion").text(data.fecha_creacion);
   			data.usuario_atencion != null ? $("#usuario-atencion").text(data.usuario_atencion) : $("#cd-distribuidor").text('-');
   			data.fecha_atencion != null ? $("#fecha-atencion").text(data.fecha_atencion) : $("#").text('-');
   			$("#observaciones").text(data.observaciones);   			
   			data.resolucion_tecnica != null ? $("#resolucion-tecnica").text(data.resolucion_tecnica) : $("#resolucion_tecnica").text('-');
  		});
	});
}