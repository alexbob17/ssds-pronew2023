$(function() {
	// Chebox style
	$('.minimal').iCheck({
		checkboxClass : 'icheckbox_minimal-yellow',
		radioClass : 'iradio_minimal-yellow'
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
		language: 'es'
	});

	$('[name="nombre"]').inputmask("Regex", {
		regex: "[A-Za-zÑñ]+( [A-Za-zÑñ]+)*",
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
	
	$('form').submit('submit', function() {
		$(this).find(':submit').attr('disabled', 'disabled');
		$(this).prop('disabled', true);
	});
});