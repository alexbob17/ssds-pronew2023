$(function () {		
	
	var locales = {
		status_error 	: 'Ha ocurrido un error al conectarse con el servidor',
	};
	
   	initMostralModalTelcor('#ultimos-telcor');
   	initMostralModalDistribuidor('#ultimos-distribuidores');
	
	$.ajax({
		url: APP_URL + '/telcor/ultimos-casos'   
	})
    .fail(function () {
    	$('#ultimos-telcor .overlay').remove();
            		
    	$('#ultimos-telcor table > tbody').empty().append(
    		'<tr>' +
               	'<td class="table-empty" colspan="8"><p class="text-red no-margin"><i class="icon fa fa-warning"></i> 	' + locales.status_error + '</p></td>' +
            '</tr>'
        );  
   	})
    .done(function(data) {
    	$('#ultimos-telcor .overlay').remove();
    	
        var html = '';
        for(i = 0;i < data.length;i++) {
			html += '<tr>';
			html +=	'<td><a class="btn btn-success btn-xs" href="#" data-id-caso="' + data[i].id_caso + '"><i class="fa fa-search"></i></a></td>';
			html +=	'<td>' + data[i].id_caso  + '</td>';
			html +=	data[i].no_expedientes 	== null ? '<td>-</td>' : '<td>' + data[i].no_expedientes.join(', ')	+' </td>';
			html +=	data[i].no_casos_qflow 	== null ? '<td>-</td>' : '<td>' + data[i].no_casos_qflow.join(', ') + '</td>';
			html +=	data[i].no_reclamos		== null ? '<td>-</td>' : '<td>' + data[i].no_reclamos.join(', ') + '</td>';
			html +=	data[i].no_contratos 	== null ? '<td>-</td>' : '<td>' + data[i].no_contratos.join(', ') + '</td>';
			html +=	'<td>'+ data[i].nombre_cliente 	+ '</td>';
			html +=	'<td>'+ data[i].fecha_atencion	+ '</td>';
			html +=	'</tr>';
		}
        
        $('#ultimos-telcor table').removeClass('table-message');
        $('#ultimos-telcor table > tbody').empty().append(html);         			
    });
	
	
	$.ajax({
		url: APP_URL + '/distribuidores/ultimos-casos'   
	})
    .fail(function () {
    	$('#ultimos-distribuidores .overlay').remove();
            		
    	$('#ultimos-distribuidores table > tbody').empty().append(
    		'<tr>' +
               	'<td class="table-empty" colspan="8"><p class="text-red no-margin"><i class="icon fa fa-warning"></i> ' + locales.status_error + '</p></td>' +
            '</tr>'
        ); 
   	})
    .done(function(data) {
    	$('#ultimos-distribuidores .overlay').remove();
    	
        var html = '';
        for(i = 0;i < data.length;i++) {
        	html += '<tr>';
			html +=	'<td><a class="btn btn-success btn-xs" href="#" data-id-caso="' + data[i].id_caso + '"><i class="fa fa-search"></i></a></td>';
			html +=	'<td>' + data[i].id_caso  + '</td>';
			html +=	'<td>' + data[i].no_caso_qflow  + '</td>';
			html +=	data[i].no_contratos 	== null ? '<td>-</td>' : '<td>' + data[i].no_contratos.join(', ') + '</td>';
			html +=	data[i].no_telefonicos 	== null ? '<td>-</td>' : '<td>' + data[i].no_telefonicos.join(', ') + '</td>';
			html +=	'<td>'+ data[i].nombre_cliente 	+ '</td>';
			html +=	'<td>'+ data[i].username 	+ '</td>';
			html +=	'<td>'+ data[i].fecha_atencion	+ '</td>';
			html +=	'</tr>';
		}
        
        $('#ultimos-distribuidores table').removeClass('table-message');
        $('#ultimos-distribuidores table > tbody').empty().append(html);         			
    });
});