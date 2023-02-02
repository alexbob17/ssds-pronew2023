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

	$('[name="fecha_reporte"]').datepicker({
		format: 'yyyy/mm/dd',
		autoclose: true,
		language: 'es',
		endDate: new Date(),
	});

	$('[name="no_solicitud"],[name="reincidencia"]').inputmask("Regex", {
		regex: "[0-9]+",
	});
	
	$('[name="nivel"]').on('change', function() {
		var seleccion = $('[name="nivel"] option:selected').val();

		$('[name="nombre_agente"]').empty()
			.append('<option selected="selected" value="">Seleccione una opción</option>');
	
		$.ajax({
			url: APP_URL + '/penalizaciones/agentes',
			data: { nivel : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="nombre_agente"]').append(html);
	    });
		$('[name="nombre_agente"]').select2().trigger('change');
		
		$('[name="catalogo_auditoria"]').empty()
		.append('<option selected="selected" value="">Seleccione una opción</option>');

		$.ajax({
			url: APP_URL + '/penalizaciones/catalogos',
			data: { nivel : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="catalogo_auditoria"]').append(html);
	    });
		$('[name="catalogo_auditoria"]').select2().trigger('change');		
	});
	
	$('[name="catalogo_auditoria"]').on('change', function() {
		var seleccion = $('[name="catalogo_auditoria"] option:selected').val();

		$('[name="aplicativo"]').empty()
			.append('<option selected="selected" value="">Seleccione una opción</option>');
	
		$.ajax({
			url: APP_URL + '/penalizaciones/aplicativos',
			data: { catalogo_auditoria : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="aplicativo"]').append(html);
	    });
		$('[name="aplicativo"]').select2().trigger('change');	
	});
	
	$('[name="aplicativo"]').on('change', function() {
		var seleccion = $('[name="aplicativo"] option:selected').val();

		$('[name="clasificacion_gestion"]').empty()
			.append('<option selected="selected" value="">Seleccione una opción</option>');
	
		$.ajax({
			url: APP_URL + '/penalizaciones/clasificaciones',
			data: { aplicativo : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="clasificacion_gestion"]').append(html);
	    });
		$('[name="clasificacion_gestion"]').select2().trigger('change');	
		
		$('[name="mal_proceso"]').empty()
			.append('<option selected="selected" value="">Seleccione una opción</option>');
		
		$.ajax({
			url: APP_URL + '/penalizaciones/malos-procesos',
			data: { aplicativo : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="mal_proceso"]').append(html);
	    });
		$('[name="mal_proceso"]').select2().trigger('change');	
		
		if(seleccion != 'DESEMPEÑO ADMON') {
			$('[name="no_solicitud"]').removeAttr('disabled');
			$('[name="tecnologia"]').removeAttr('disabled');
		} else {
			$('[name="no_solicitud"],[name="tecnologia"]')
				.attr('disabled', 'disabled')
				.css('cursor', 'default')
				.parents('.form-group')
				.removeClass('has-error')
				.children('small').remove();
			$('[name="no_solicitud"]').val('');
			$('[name="tecnologia"]').val('').select2().trigger('change');
		}
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