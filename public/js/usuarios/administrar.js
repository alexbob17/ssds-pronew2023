$(function () {
	$('[data-toggle="tooltip"]').tooltip({
		delay : { show: 1500, hide: 0}
	});	
	
	// Disable Datatables warnings message 
	$.fn.dataTableExt.sErrMode = 'throw';

     var tablaUsuarios = $('#usuarios table').DataTable({
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
    	    { targets: [4,5,6,7,8,9], searchable: false }
    	],
    	order: [[1, 'asc']]
	});
     
 	$('#usuarios td a.modal-confirm').click(function(e) {
		e.preventDefault();
		e.stopImmediatePropagation();	
		var elemento = $(e.currentTarget);
		if(elemento.hasClass('reset-password')) {
			mensaje = '¿Está seguro que desea resetear la contraseña por el valor por defecto?';
		} else if(elemento.hasClass('activated-account')) {
			mensaje = '¿Está seguro que desea activar la cuenta?';
		} else if(elemento.hasClass('deactivated-account')) {
			mensaje = '¿Está seguro que desea desactivar la cuenta?';
		}
		$('#modal-confirmacion .modal-body p').text(mensaje);
		$('#boton_ok').attr('href', $(e.currentTarget).attr('href'));
		$('#modal-confirmacion').modal('show');
 	});
});
