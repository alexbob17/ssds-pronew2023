$(function () {
	var locales = {
		status_error 	: 'Ha ocurrido un error al conectarse con el servidor',
		status_no_found : 'La búsqueda no produjo ningún resultado',
		excel_filename :  'Reporte de Reclamos Area Tecnica Pendientes'
	};

	// Disable Datatables warnings message 
	$.fn.dataTableExt.sErrMode = 'throw';
	
     var tablaResultados = $('#resultados table').on('processing.dt', function(e, settings, processing ) {
		if(processing) {
			$('#generar_reporte').attr('disabled','disabled');
			$('#resultados').append(
		   		'<div class="overlay">' +
		           	'<i class="fa fa-refresh fa-spin"></i>' +
				'</div>'
			);		
		} else {
        	$('#resultados .overlay').remove();
        	$('#generar_reporte').removeAttr('disabled');
		}
     })
     .DataTable({
    	paging: true,
 	    lengthChange : false,
 	    searching: true,
 	    ordering: true,
 	    info: true,
 	    autoWidth : false,
 	    scrollX: true,
		ajax: {
			method: 'GET',
			url: APP_URL + '/reclamos/reclamos-pendientes',
			data: function(d) {
	         	d.fecha_inicial	= $('[name="fecha_inicial"]').val();
	         	d.fecha_final 	= $('[name="fecha_final"]').val();
	         	d.username 		= $('[name="username"]').val();
	        },
			dataSrc: function(json) {
				for(var i = 0, ien = json.length ; i < ien ; i++) {
					json[i].ticket = '<a href="' + APP_URL + '/reclamos/editar/' + json[i].ticket + '">' + json[i].ticket + '</a>';
					json[i].observaciones = '<span>' + json[i].observaciones + '</span>';
				}
				return json;
			},
			error: function(xhr, textStatus, httpMessage) {
				$('#resultados table .dataTables_empty').empty().append(
						'<p class="text-red no-margin"><i class="icon fa fa-warning"></i> ' + locales.status_error + '</p>'
             );
			}
		},
		columns: [
			{ data: 'ticket' },		
			{ data: 'estado' },
			{ data: 'fecha_creacion' },
			{ data: 'tipo_tecnico' },
			{ data: 'codigo_tecnico' },
			{ data: 'nombre_tecnico' },
			{ data: 'tecnologia' },
			{ data: 'id_producto' },
			{ data: 'id_solicitud' },
			{ data: 'lider_tecnica' },
			{ data: 'causa_reclamo'  },
			{ data: 'observaciones' },
			{ data: 'login' },
			{ data: 'nombre_usuario' },
		],
		language: {
			url: APP_URL + '/plugins/datatables/i18n/Spanish.json',
		},
    	columnDefs: [
    	    { targets: [1,2,13], searchable: false }
    	],
	});

    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();
    var today =  year + "-" + month + "-" + day;
      
    var buttonCommon = {
     	exportOptions : {
     		format: {
     			body: function(data, column, row) {
     				if(column == 0) {
     					return data.replace(/<a href="(.)*">/g, '').replace(/<\/a>/g, ''); 
     				} else if(column == 11) {
     					return data.replace(/<span>/g, '').replace(/<\/span>/g, ''); 
     				} else {
         				return data;
     				}
     			}
     		}
     	}
     } 
     
    new $.fn.dataTable.Buttons(tablaResultados, {
		buttons: [
			$.extend(true, {}, buttonCommon, {
				extend: 'excel',
				className: 'btn-sm btn-success',
				filename: locales.excel_filename + ' ' + today,
				text: '<i class="fa fa-file-excel-o" style="padding-right: 5px"></i>Excel'
			})
		]
	});

	tablaResultados.buttons().container()
		.addClass('pull-right')
		.appendTo('#resultados .box-header')
		.children('.btn')
		.removeClass('btn-default');
		
    // Generar el reporte
    $('#generar_reporte').on('click', function() {
      	tablaResultados.ajax.reload();      
    }); 
    
	setTimeout(function() {
		$('.alert-success').slideUp('slow', function() { 
			$(this).remove() 
		});
	}, 2000); 
});
