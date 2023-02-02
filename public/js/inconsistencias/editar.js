$(function() {
	// Chebox style
	$('.minimal').iCheck({
		checkboxClass : 'icheckbox_minimal-blue',
		radioClass : 'iradio_minimal-blue'
	});

	// Popover
	$('[data-toggle="popover"]').popover({
		html : true
	}).click(function(e) {
		e.preventDefault();
	});

	// Initialize Select2 Elements
	$('.select2').select2();

	// Datemask dd/mm/yyyy
	$('[data-mask]').inputmask();
	
	$('input[type="text"],select,textarea')
		.attr('disabled', 'disabled')
		.css('cursor', 'default');
	
	$('[name="resolucion"],[name="accion"],[name="observaciones"]')
		.removeAttr('disabled');
	
	$('[name="resolucion"]').on('change', function() {
		var seleccion = $('[name="resolucion"] option:selected').val();

		$('[name="accion"]').empty()
			.append('<option selected="selected" value="">Seleccione una opción</option>');
	
		$.ajax({
			url: APP_URL + '/inconsistencias/acciones',
			data: { resolucion : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="accion"]').append(html);
	    });
		$('[name="accion"]').select2().trigger('change');
	});
	
	setTimeout(function() {
		$('.alert-success').slideUp('slow', function() { 
			$(this).remove() 
		});
	}, 2000); 
	
	$('form').submit('submit', function() {
		$(this).find(':submit').attr('disabled', 'disabled');
		$(this).prop('disabled', true);
	});
});