$(function () {
	$('[data-toggle="tooltip"]').tooltip({
		delay : { show: 1500, hide: 0}
	});	
	
	// Disable Datatables warnings message 
	$.fn.dataTableExt.sErrMode = 'throw';

     var tablaAgentes = $('#agentes table').DataTable({
    	paging: true,
    	pageLength: 15,
 	    lengthChange : false,
 	    searching: true,
 	    ordering: true,
 	    scrollX: true,
 	    info: true,
    	language: {
    	 	url: APP_URL + '/plugins/datatables/i18n/Spanish.json',
    	}, 
    	columnDefs: [
    	    { targets: 0, orderable: false },
    	    { targets: [3,4], searchable: false }
    	],
    	order: [[1, 'asc']]
	});
     
 	$('#agentes td a.modal-confirm').click(function(e) {
		e.preventDefault();
		e.stopImmediatePropagation();	
		var elemento = $(e.currentTarget);
		if(elemento.hasClass('activated-account')) {
			mensaje = '¿Está seguro que agregar el agente a lista desplegable?';
		} else if(elemento.hasClass('deactivated-account')) {
			mensaje = '¿Está seguro que desea eliminar el agente de la lista desplegable?';
		}
		$('#modal-confirmacion .modal-body p').text(mensaje);
		$('#boton_ok').attr('href', $(e.currentTarget).attr('href'));
		$('#modal-confirmacion').modal('show');
 	});
});
