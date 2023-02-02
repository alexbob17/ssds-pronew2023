$(function () {
	var locales = {
		status_error 	: 'Ha ocurrido un error al conectarse con el servidor',
		status_no_found : 'La búsqueda no produjo ningún resultado',
		excel_filename :  'Reporte de Inconsistencias'
	};

	// Disable Datatables warnings message 
	$.fn.dataTableExt.sErrMode = 'throw';
		
	//Initialize Select2 Elements
    $('.select2').select2();
		
	//Initialize Datepicker Elements
    $('[name="fecha_inicial"]').datepicker({
    	format: 'yyyy/mm/dd',
    	autoclose: true,
    	language: 'es'
    })
    .attr('autocomplete', 'off')
    .on('changeDate', function(selected) {
      	var startDate = new Date(selected.date.valueOf());
		$('[name="fecha_final"]').datepicker('setStartDate', startDate)	
		$('[name="fecha_final"]').datepicker('setDate', startDate)	
     });

     $('[name="fecha_final"]').datepicker({
       	format: 'yyyy/mm/dd',
       	autoclose: true,
    	language: 'es'
 	 })
 	 .attr('autocomplete', 'off');

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
	    searching: false,
	    ordering: true,
	    info: true,
	    autoWidth : false,
	    scrollX: true,
		ajax: {
			method: 'GET',
			url: APP_URL + '/inconsistencias/inconsistencias-atendidas',
			data: function(d) {
	         	d.fecha_inicial	= $('[name="fecha_inicial"]').val();
	         	d.fecha_final 	= $('[name="fecha_final"]').val();
	         	d.username		= $('[name="username"]').val();
	        },
			dataSrc: function(json) {
				for(var i = 0, ien = json.length ; i < ien ; i++) {
					json[i].observaciones = '<span>' + (json[i].observaciones == null? '' : json[i].observaciones) + '</span>';
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
			{ data: 'id' },		
			{ data: 'estado' },
			{ data: 'periodo_creacion' },
			{ data: 'fecha_incidente' },
			{ data: 'fecha_atencion' },
			{ data: 'no_incidente' },
			{ data: 'tipo_servicio' },
			{ data: 'tipo_inconsistencia' },
			{ data: 'otra_inconsistencia' },
			{ data: 'codigo_tecnico' },
			{ data: 'no_orden' },
			{ data: 'resolucion' },
			{ data: 'accion' },
			{ data: 'username_creacion' },
			{ data: 'usuario_creacion' },
			{ data: 'username_atencion' },
			{ data: 'usuario_atencion' },
			{ data: 'observaciones' },
		],
		language: {
			url: APP_URL + '/plugins/datatables/i18n/Spanish.json',
		}
	});

    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();
    var today =  year + "-" + (month > 9 ? month : '0' + month)  + "-" + (day > 9 ? day : '0' + day);
      
    var buttonCommon = {
     	exportOptions : {
     		format: {
     			body: function(data, column, row) {
     				if(column == 17) {
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
       	var fecha_inicial	= $('[name="fecha_inicial"]').val();
       	var fecha_final 	= $('[name="fecha_final"]').val();
       	var username 		= $('[name="username"]').val();
       	if( fecha_inicial !='' && fecha_final != '' && username != '') {
      		tablaResultados.ajax.reload();
       	} else {
           	$('#modal-error').modal('show');
        }         
    });  
});
