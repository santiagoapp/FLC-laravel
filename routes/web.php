<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/asd', function () {
	return view('prints.acta-de-bajas');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => ['auth']], function() {
	Route::resource('home', 'HomeController');
	Route::resource('calendario', 'CalendarioController');
	Route::resource('items', 'ItemController');
	Route::resource('users', 'UserController');
	Route::resource('estadisticas/generales', 'EstadisticasController');
	Route::resource('OT', 'OTController');
	Route::resource('RQ', 'RQController');
	Route::resource('OC', 'OCController');
	Route::resource('OS', 'OSController');
	Route::resource('RE', 'REController');
	Route::resource('RV', 'RVController');
	Route::resource('reportes', 'reportesController');
	Route::resource('agregar', 'AgregarController');
	Route::resource('instalaciones', 'PlantaController');
	Route::resource('recursoshumanos', 'OperarioController');
	Route::resource('equipos', 'EquipoController');
	Route::resource('zonas', 'ZonaController');
	Route::resource('cargos', 'CargoController');
	Route::resource('preguntas', 'PreguntaController');
	Route::resource('clasificacions', 'ClasificacionController');
	Route::resource('correctivos', 'CorrectivoController');
	Route::resource('bajas', 'BajaController');
	Route::post('instalaciones/actualizar', 'PlantaController@actualizar');
	Route::post('instalaciones/eliminar', 'PlantaController@eliminar');
	Route::post('zonas/eliminar', 'ZonaController@eliminar');
	Route::post('zonas/actualizar', 'ZonaController@actualizar');
	Route::post('equipos/eliminar', 'EquipoController@eliminar');
	Route::post('equipos/actualizar', 'EquipoController@actualizar');
	Route::post('cargos/eliminar', 'CargoController@eliminar');
	Route::post('cargos/actualizar', 'CargoController@actualizar');
	Route::post('preguntas/eliminar', 'PreguntaController@eliminar');
	Route::post('preguntas/actualizar', 'PreguntaController@actualizar');
	Route::post('recursoshumanos/eliminar', 'OperarioController@eliminar');
	Route::post('recursoshumanos/actualizar', 'OperarioController@actualizar');
	Route::post('clasificacions/eliminar', 'ClasificacionController@eliminar');
	Route::post('clasificacions/actualizar', 'ClasificacionController@actualizar');
	Route::post('correctivos/eliminar', 'CorrectivoController@eliminar');
	Route::post('correctivos/actualizar', 'CorrectivoController@actualizar');
	Route::post('bajas/eliminar', 'BajaController@eliminar');
	Route::post('bajas/actualizar', 'BajaController@actualizar');

	// Route::get('bajas/pdf', 'BajaController@generarPDF');

	Route::get('documentos/pdf/acta-de-baja', 'PDFController@actaBaja');
	// Route::get('bajas/pdf',array('as'=>'bajas/pdf','uses'=>'BajaController@generarPDF'));
	Route::post('users/add','UserController@agregarPermiso');
	Route::post('users/remove','UserController@eliminarPermiso');
	Route::post('OT/mostrar_items','OTController@mostrarItems');
	Route::post('RQ/mostrar_items','RQController@mostrarItems');
	Route::post('RE/mostrar_items','REController@mostrarItems');
	Route::post('RV/mostrar_items','RVController@mostrarItems');
	Route::post('OS/mostrar_items_prf', 'OSController@mostrarItemsPrf');
	Route::post('OS/mostrar_items_mat', 'OSController@mostrarItemsMat');
	Route::post('OS/mostrar_items_maq', 'OSController@mostrarItemsMaq');
	Route::post('ciudades/ver', 'CitiesController@verCiudades');
	Route::post('ciudades/horas_envio', 'CitiesController@buscarHoras');
	Route::post('RQ/ver', 'AgregarController@mostrarInformacion');
	Route::resource('fecha/OT', 'AgregarOTController');
	Route::post('fecha/OT/mostrarOT', 'AgregarOTController@mostrarOT');
	Route::post('fecha/OT/guardar', 'AgregarOTController@guardarFechaRecibido');
});