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

Route::get('/', function () {

    $amigos = App\Amigo::where('solicita_adopcion', '=', true) -> get();
    $amigostop = App\Amigo::where('solicita_adopcion', '=', true) -> take(6) -> get();
    $eventos = App\Evento::whereDate('fecha', '>=', date('Y-m-d')) -> get();
    dd($eventos);
    
    return view('inicio', compact('amigostop', 'amigos', 'eventos'));
})->name('inicio');

Route::resource('Adopcion', 'AdopcionController');

Route::resource('Amigo', 'AmigoController');
Route::post('registerSolicitud', ['as' => 'registerSolicitud', 'uses' => 'AmigoController@storeSolicitud']);
Route::get('/gridAmigos', function () {
	$amigos = App\Amigo::where('solicita_adopcion', '=', true) -> get();
    return view('amigogrid', compact('amigos'));
})->name('gridAmigos');
Route::get('setAdoptado/{id_amigo}', ['as' => 'setAdoptado', 'uses' =>'RescatistaController@adopt']);
Route::get('unsetAdoptado/{id_amigo}', ['as' => 'unsetAdoptado', 'uses' =>'RescatistaController@unadopt']);
Route::get('amigo-single/{id_amigo}', ['as' => 'amigo-single', 'uses' =>'AmigoController@getSingle']);

Route::resource('Especie', 'EspecieController');

Route::resource('Evento', 'EventoController');
Route::get('/gridEventos', function () {
	$eventos = App\Evento::whereDate('fecha', '>=', date('Y-m-d')) -> get();
    return view('eventogrid', compact('eventos'));
})->name('gridEventos');

Route::get('evento-single/{id_evento}', ['as' => 'evento-single', 'uses' =>'eventoController@getSingle']);

Route::resource('Raza', 'RazaController');

Route::resource('Rescatista', 'RescatistaController');
Route::get('commentSolicitud/{id_solicitud}', ['as' => 'commentSolicitud', 'uses' =>'RescatistaController@comment']);
Route::post('storeComment', ['as' => 'storeComment', 'uses' => 'RescatistaController@storeComment']);
Route::post('storeAdoption', ['as' => 'storeAdoption', 'uses' => 'RescatistaController@storeAdoption']);
Route::post('cancelAdoption', ['as' => 'cancelAdoption', 'uses' => 'RescatistaController@cancelAdoption']);

Route::resource('Solicitud', 'SolicitudController');
Route::get('attendSolicitud/{id_solicitud}', ['as' => 'attendSolicitud', 'uses' =>'SolicitudController@attend']);

/*Route::get('inicio', function () {
    return view('inicio');
});*/

Route::get('/oferta', function () {
    return view('oferta');
});

Route::get('/talleres', function () {
    return view('talleres');
});

Route::get('municipios', function(){
	return \App\Municipio::with('estado')->get();
});

Route::resource('Estado', 'EstadoController');

Route::resource('Informe', 'InformeController');
Route::post('InformeAttention', ['as' => 'InformeAttention', 'uses' => 'InformeController@attend']);

Route::resource('Municipio', 'MunicipioController');

Route::resource('Notificacion', 'NotificacionController');
Route::post('NotificacionPublish', ['as' => 'NotificacionPublish', 'uses' => 'NotificacionController@publish']);

Route::resource('Pagina', 'PaginaController');
Route::get('editPagina/{id}', ['as' => 'editPagina', 'uses' =>'PaginaController@editarPagina']);
Route::post('updatePagina', ['as' => 'updatePagina', 'uses' => 'PaginaController@updatePagina']);
Route::get('editOferta/{id}', ['as' => 'editOferta', 'uses' =>'PaginaController@editarOferta']);
Route::post('updateOferta', ['as' => 'updateOferta', 'uses' => 'PaginaController@updateOferta']);
Route::get('editTaller/{id}', ['as' => 'editTaller', 'uses' =>'PaginaController@editarTaller']);
Route::post('updateTaller', ['as' => 'updateTaller', 'uses' => 'PaginaController@updateTaller']);
Route::get('editInstalacion/{id}', ['as' => 'editInstalacion', 'uses' =>'PaginaController@editarInstalacion']);
Route::post('updateInstalacion', ['as' => 'updateInstalacion', 'uses' => 'PaginaController@updateInstalacion']);
Route::get('editHorario/{id}', ['as' => 'editHorario', 'uses' =>'PaginaController@editarHorario']);
Route::post('updateHorario', ['as' => 'updateHorario', 'uses' => 'PaginaController@updateHorario']);
Route::get('editConvenio/{id}', ['as' => 'editConvenio', 'uses' =>'PaginaController@editarConvenio']);
Route::post('updateConvenio', ['as' => 'updateConvenio', 'uses' => 'PaginaController@updateConvenio']);
Route::post('storeInforme', ['as' => 'storeInforme', 'uses' => 'PaginaController@storeInforme']);
Route::get('PaginaUse/{id}', ['as' => 'PaginaUse', 'uses' =>'PaginaController@utilize']);
Route::get('paginaEstadistica', ['as' => 'paginaEstadistica', 'uses' => 'PaginaController@estadistica']);

Route::resource('Panel', 'PanelController');

Route::resource('Rol', 'RolController');

Route::resource('Setting', 'SettingController');



Route::get('/ajax-getMunicipio', function(){
	$estado = Request::get('id_estado');
	$municipios = App\Municipio::where('id_estado', '=', $estado) -> get();
	return Response::json($municipios);
});


Route::get('/ajax-getRoles', function(){
	$rol = App\Rol::all();
	return Response::json($rol);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('downloadFile/{id_planeacion}', ['as' => 'downloadFile', 'uses' => 'PlaneacionController@downloadFile']);


