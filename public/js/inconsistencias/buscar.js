$(function () {		
	var locales = {
		status_loading 	: 'Cargando...',
		status_error 	: 'Ha ocurrido un error al conectarse con el servidor',
		status_no_found : 'La búsqueda no produjo ningún resultado'
	};

	//Initialize Select2 Elements
    $('.select2').select2();
	    
	// Generar el reporte
   	$('#buscar').on('click', function() {
       	var opcion_busqueda = $('[name="opcion_busqueda"]').val();
       	var patron_busqueda = $('[name="patron_busqueda"]').val();

       	if( opcion_busqueda !='' && patron_busqueda != '' ) {
    		$(this).attr('disabled','disabled');
            	
       		$('#resultados table > tbody').empty().append(
   				'<tr>' +
   	        		'<td colspan="8">' + locales.status_loading + '</td>' +
   	            '</td>'
			);

         	$('#resultados table').addClass('table-message');

       		$('#resultados').append(
       			'<div class="overlay">' +
	               	'<i class="fa fa-refresh fa-spin"></i>' +
				'</div>'
			);
				
             $.ajax({
               	url: APP_URL + '/inconsistencias/buscar-casos',
				data: {
					'opcion_busqueda' : opcion_busqueda,
					'patron_busqueda' : patron_busqueda,
                 }   
             })
           	.fail(function () {
           		$('#resultados .overlay').remove();
            		
       			$('#resultados table > tbody').empty().append(
       				'<tr>' +
       	            	'<td class="table-empty" colspan="8"><p class="text-red no-margin"><i class="icon fa fa-warning"></i> 	' + locales.status_error + '</p></td>' +
       	            '</td>'
                );  

       			$('#buscar').removeAttr('disabled');                  
   			})
      		.done(function(data) {
           		$('#resultados .overlay').remove();
           		
           		if(data.length == 0) {
           			$('#resultados table > tbody').empty().append(
           				'<tr>' +
           	            	'<td class="table-empty" colspan="8"><p class="text-light-blue no-margin"><i class="icon fa fa-info"></i> ' + locales.status_no_found + '</p></td>' +
						'</td>'
					); 
           		}
           		else {             		
               		var html = '';
                 	for(i = 0;i < data.length;i++) {
                 		html += '<tr>';
            			html +=	'<td>' + data[i].consecutivo  + '</td>';
            			html +=	'<td>' + data[i].fecha_atencion  + '</td>';
            			html +=	'<td>' + data[i].no_incidente  + '</td>';
            			html +=	'<td>'+ data[i].tipo_servicio 	+ '</td>';
            			html +=	'<td>'+ data[i].tipo_inconsistencia 	+ '</td>';
            			html +=	'<td>'+ data[i].fecha_incidente	+ '</td>';
            			html +=	'<td>'+ (data[i].no_orden != null ? data[i].no_orden : '-')	+ '</td>';
            			html +=	'<td>'+ data[i].login_usuario	+ '</td>';
            			html +=	'</tr>';
					}
           			$('#resultados table').removeClass('table-message');
           			$('#resultados table > tbody').empty().append(html);
                }
           			
				$('#buscar').removeAttr('disabled'); 
       		});
		} else {
           	$('#modal-error').modal('show');
		}
	});  
});