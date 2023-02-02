$(function() {
	// Chebox style
	$('.minimal').iCheck({
		checkboxClass : 'icheckbox_square-orange',
		radioClass : 'iradio_square-orange'
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
	
	$('[name="fecha_registro"],[name="fecha_recibido"]').datepicker({
		format: 'yyyy/mm/dd',
		autoclose: true,
		language: 'es'
	});
	
	//Delimiter Input Characters
	$('[name="no_caso_qflow"],[name="no_producto"],[name="no_dano_solicitud"]').inputmask("Regex", {
		regex: "[0-9]+",
	});
		
	$('[name="asesor"]').inputmask("Regex", {
		regex: "[A-Za-zÑñ]+( [A-Za-z0-9Ññ]+)*",
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
	
	$('[name="tipo_caso"]').on('change', function() {
		var seleccion = $('[name="tipo_caso"] option:selected').val();

		$('[name="tipologia"]').empty()
			.append('<option selected="selected" value="">Seleccione una opción</option>');
	
		$.ajax({
			url: APP_URL + '/qflows/tipologias',
			data: { tipo_caso : seleccion }
		})
	    .fail(function () {
	    	console.log('fail');
	   	}).done(function(data) {
	    	var html = '';
	    	for(i = 0; i < data.length;i++) {
	    		html += '<option value="' + data[i] + '">' + data[i] + '</option>';
	    	}
	    	$('[name="tipologia"]').append(html);
	    });
		$('[name="tipologia"]').select2().trigger('change');
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