<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () { 
	
	
	Route::get ('/', 'DashboardController@index');
	Route::get ('/home', 'DashboardController@index');
	Route::get ('/cambiar_contrasena', 'DashboardController@showChangePasswordForm');
	Route::put ('/cambiar_contrasena', 'DashboardController@changePassword');
	Route::get ('/login', 'Auth\AuthController@showLoginForm');
	Route::post('/login', 'Auth\AuthController@login');
	Route::get ('/logout', 'Auth\AuthController@logout');


	// GET DATOS

	Route::get('/llamadashome/instalaciones', 'LlamadasServicioController@showInstalaciones')->middleware('auth');

	Route::get('/llamadashome/postventa', 'LlamadasServicioController@showPostVentas')->middleware('auth');

	Route::get('/llamadashome/reparaciones', 'LlamadasServicioController@showReparaciones')->middleware('auth');

	Route::get('/llamadashome/registro', 'RegistroController@showRegistro')->middleware('auth');;
		
	Route::get('/tecnicos/registro', 'RegistroTecnicoController@LeerTecnicos')->name('mostrar_tecnicos')->middleware('auth');

	Route::get('/llamadashome/consultas', 'ConsultasController@showConsultas')->name('mostrar_consultas')->middleware('auth');
	
	Route::get('/llamadashome/consultas', 'ConsultasController@LeerDatos')->name('Leer_Consultas')->middleware('auth');

	Route::get('/administracion/motivos', 'LlamadasServicioController@showMotivos')->name('mostrar_motivos')->middleware('auth');

	Route::get('/llamadashome/agendamientos', 'LlamadasServicioController@showAgendamientos')->name('mostrar_motivos')->middleware('auth');

	Route::get('/tecnicos/guardar', 'RegistroTecnicoController@showGuardar')->name('Tecnico_guardar')->middleware('auth');

	



	// POST DATOS


	Route::post('/tecnicos/guardar', 'RegistroTecnicoController@store')->name('registro_tecnico.store')->middleware('auth');

	Route::post('/llamadashome/instalaciones', 'LlamadasServicioController@store')->name('registro_llamadas.store')->middleware('auth');
	
	Route::post('/llamadashome/postventa', 'PostventasController@store')->name('registro_postventa.store')->middleware('auth');

	Route::post('/llamadashome/reparaciones', 'ReparacionesController@store')->name('registro_reparaciones.store')->middleware('auth');

	Route::post('/llamadashome/agendamientos', 'AgendamientosController@storeAgendamientos')->name('registro_agendamientos.store')->middleware('auth');

	Route::post('/llamadashome/consultas', 'ConsultasController@storeConsultas')->name('registro_consultas')->middleware('auth');

	Route::get('/llamadashome/consultas', 'ConsultasController@BuscarConsulta')->name('consultas_buscar')->middleware('auth');
	
	Route::get('/llamadashome/busqueda', 'BusquedaController@showBusquedas')->name('busquedas_generales')->middleware('auth');

	// Route::get('/llamadashome/reportes', 'ReportesController@showReporte')->name('generar_reporte')->middleware('auth');

	Route::get('/llamadashome/reportes', 'ReportesController@usersAll')->name('usuarios_all')->middleware('auth');


	Route::get('/llamadashome/reportes',  'ReportesController@generarReporte')->name('reporte.generar')->middleware('auth');

	Route::post('/llamadashome/busqueda',  'BusquedaController@generarBusqueda')->name('busqueda.generar')->middleware('auth');

	Route::post('/llamadashome/editar/instalaciones', 'ActualizarDatos@editar')->name('mostrarEditar');

	Route::post('/llamadashome/editar/reparaciones', 'ActualizarDatos@editar')->name('mostrarEditarReparaciones');

	Route::post('/llamadashome/editar/postventa', 'ActualizarDatos@editar')->name('mostrarEditarPostventa');



	// ACTUALIZAR

	Route::put('/llamadashome/editar/instalaciones/{id}', 'ActualizarDatos@actualizar')->name('actualizarDatos');

	Route::put('/llamadashome/editar/reparaciones/{id}', 'ActualizarDatos@actualizarReparaciones')->name('actualizarDatosReparaciones');
	
	Route::put('/llamadashome/editar/postventa/{id}', 'ActualizarDatos@actualizarPostventas')->name('actualizarDatosPostventa');



	




	// Route::get('/editar/{id}', 'TuControlador@editar')->name('editar');
	// Route::get('/llamadashome/editar/instalaciones/{id}/{motivo_llamada}/{NumeroOrden}/{actividad_tipo}/{tecnologia}', 'ActualizarDatos@editar')->name('mostrarEditar');

	





	// DELETE DATOS

	Route::delete('/tecnicos/registro/{CODIGO}','RegistroTecnicoController@deleteRegistro')->name('tecnicos_delete');



	Route::controllers([
			'inconsistencias'	=> 'InconsistenciasController',
			'penalizaciones'	=> 'PenalizacionesController',
			'qflows'			=> 'QflowsController',
			'usuarios'			=> 'UsuariosController',
			'nodos'				=> 'NodosSaturadosController',
			'reclamos'			=> 'ReclamosTecnicaController',
			'llamadashome'		=> 'LlamadasServicioController',
			'llamadashome' 		=> 'RegistroController',
			'llamadashome' 		=> 'ConsultasController',


	]);
});