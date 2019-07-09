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

Route::get('municipios', function(){
	return \App\Municipio::with('estado')->get();
});

Route::resource('Estado', 'EstadoController');

Route::resource('Informe', 'InformeController');
Route::post('InformeAttention', ['as' => 'InformeAttention', 'uses' => 'InformeController@attend']);

Route::resource('Municipio', 'MunicipioController');

Route::resource('Notificacion', 'NotificacionController');
Route::post('NotificacionPublish', ['as' => 'NotificacionPublish', 'uses' => 'NotificacionController@publish']);

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


