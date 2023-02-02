$(function() {
	var otras_inconsistencias = [
       'Lentitud en OPEN',
       'Modificaciones ST/RF',
       'Lentitud en las Gestiones de Syreng',
       'Caída Momentánea de Syreng',
       'Estamos sin Syreng',
       'No caen los MSJ de Syreng',
       'Error de Msj en App Syreng',
       'No caen las ordenes en ETA',
       'Msj de Gecode no están Cayendo',
       'Estamos sin Gecode',
       'Perdida de Enlace en CIC',
       'Reporte de Venta/Daño/RX/Impedimentos',
       'Quitar Impedimentos',
       'Otros',
	];
	
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

	$('[name="fecha_incidente"]').datepicker({
		format: 'yyyy/mm/dd',
		autoclose: true,
		language: 'es',
	});
	$('[name="fecha_incidente"]').datepicker('update', new Date())
		.attr('disabled', 'disabled').css('cursor', 'default');;
	
	//Delimiter Input Characters
	$('[name="no_incidente"],[name="no_orden"]').inputmask("Regex", {
		regex: "[0-9]+",
	});

	$('[name="otra_inconsistencia"]').inputmask("Regex", {
		regex: "[A-Za-z0-9Ññ]+( [A-Za-z0-9Ññ]+)*",
		definitions: {
		    "r": {
		      casing: "upper",
		    }
		},
		onBeforePaste: function (pastedValue, opts) {
			pastedValue = $.trim(pastedValue.toUpperCase());
			if(pastedValue.match(/[ÀÁÂÃÄ]/g))
				pastedValue = pastedValue.replace(/[ÀÁÂÄÃ]/g,'A');
			if(pastedValue.match(/[ÈÉÊË]/g))
				pastedValue = pastedValue.replace(/[ÈÉÊË]/g,'E');
			if(pastedValue.match(/[ÌÍÎÏ]/g))
				pastedValue = pastedValue.replace(/[ÌÍÎÏ]/g,'I');
			if(pastedValue.match(/[ÒÓÔÖÕ]/g))
				pastedValue = pastedValue.replace(/[ÒÓÔÖÕ]/g,'O');
			if(pastedValue.match(/[ÙÚÛÜ]/g))
				pastedValue = pastedValue.replace(/[ÙÚÛÜ]/g,'U');
			if(pastedValue.match(/[ÙÚÛÜ]/g))
				pastedValue = pastedValue.replace(/[ÙÚÛÜ]/g,'U');
			return pastedValue;
		},
	});
	
	$('[name="catalogo_auditoria"]').on('change', function() {
		var seleccion = $('[name="catalogo_auditoria"] option:selected').val();

		$('[name="tipo_servicio"]').empty()
			.append('<option selected="selected" value="">Seleccione una opción</option>');
	
		$.ajax({
			url: APP_URL + '/inconsistencias/tipos-servicios',
			data: { catalogo : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="tipo_servicio"]').append(html);
	    });
		$('[name="tipo_servicio"]').select2().trigger('change');
	});
	
	if( typeof old_tipo_inconsistencia === 'undefined' || $.inArray(old_tipo_inconsistencia, otras_inconsistencias) == -1) {
		$('[name="otra_inconsistencia"]')
			.attr('disabled', 'disabled')
			.css('cursor', 'default');
	}
	
	$('[name="tipo_inconsistencia"]').on('change', function() {
		var seleccion = $('[name="tipo_inconsistencia"] option:selected').val();
		if($.inArray(seleccion, otras_inconsistencias) != -1) {
			$('[name="otra_inconsistencia"]')
				.removeAttr('disabled', 'disabled')
		} else {
			$('[name="otra_inconsistencia"]')
				.attr('disabled', 'disabled')
				.val('');
			$('[name="otra_inconsistencia"]').parent().siblings('small').remove();
			$('[name="otra_inconsistencia"]').parents('.form-group').removeClass('has-error');
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