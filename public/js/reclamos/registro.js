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
	
	//Delimiter Input Characters
	$('[name="id_producto"],[name="id_solicitud"]').inputmask("Regex", {
		regex: "[0-9]+",
	});
		
	$('[name="nombre_tecnico"],[name="lider_tecnica"]').inputmask("Regex", {
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