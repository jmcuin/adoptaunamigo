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
   /* $pagina = App\Pagina::where('activo', '=', 1) -> first();
    $banner_principal_texto = explode('&', $pagina -> banner_principal_texto);
    $pagina_convenios = App\Pagina_convenios::where('id_pagina', $pagina -> id)->get();
    $pagina_horarios = App\Pagina_horarios::where('id_pagina', $pagina -> id)->get();
    $pagina_instalaciones = App\Pagina_instalaciones::where('id_pagina', $pagina -> id)->get();
    $pagina_oferta = App\Pagina_oferta::where('id_pagina', $pagina -> id)->get();
    $pagina_talleres = App\Pagina_talleres::where('id_pagina', $pagina -> id)->get();
    $settings = App\Setting::all();
    $visita = new App\Visita;
    $visita -> save();
    $escolaridades = App\Escolaridad::all();
    return view('inicio', compact('pagina','banner_principal_texto','pagina_convenios','pagina_horarios','pagina_instalaciones','pagina_oferta','pagina_talleres','escolaridades'));*/
    $amigos = App\Amigo::where('solicita_adopcion', '=', true) -> get();
    $amigostop = App\Amigo::where('solicita_adopcion', '=', true) -> take(3) -> get();
    $eventos = App\Evento::whereDate('fecha', '>=', date('Y-m-d')) -> get();
    return view('inicio', compact('amigostop', 'amigos', 'eventos'));
})->name('inicio');

Route::resource('Amigo', 'AmigoController');

Route::resource('Especie', 'EspecieController');

Route::resource('Evento', 'EventoController');

Route::resource('Raza', 'RazaController');

Route::resource('Rescatista', 'RescatistaController');

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

Route::resource('Alumno', 'AlumnoController');

Route::resource('Estado', 'EstadoController');

Route::resource('Informe', 'InformeController');
Route::post('InformeAttention', ['as' => 'InformeAttention', 'uses' => 'InformeController@attend']);

Route::resource('Solicitud', 'SolicitudController');

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

Route::get('/ajax-getMaxTrabajador', function(){
	$trabajador = App\Trabajador::max('id_trabajador');
	return Response::json($trabajador);
});




Route::get('/ajax-getAlumnosDeTrabajador', function(){
	$periodo = Request::get('id_periodo');
	$trabajador = Request::get('id_trabajador');
	$rol = Request::get('id_rol');
	$escolaridad = explode('-', Request::get('escolaridad'));
	if($rol === 'dir_general'){
		$alumnos = DB::table('cat_grupos')
	              ->join('materia_x_grupos', 'cat_grupos.id_grupo', '=', 'materia_x_grupos.id_grupo')
	              ->join('inscripciones', 'inscripciones.id_grupo', '=', 'materia_x_grupos.id_grupo')
	              ->join('alumnos', 'inscripciones.id_alumno', '=', 'alumnos.id_alumno')
	              ->where('cat_grupos.id_periodo', $periodo)
	              ->select('alumnos.id_alumno as id_alumno', 'alumnos.nombre as nombre', 'alumnos.a_paterno as a_paterno', 'alumnos.a_materno as a_materno') -> distinct() -> get();
	}else if($rol === 'director' && $escolaridad[1] !== null && $escolaridad[0] !== 0){
		$alumnos = DB::table('cat_grupos')
	              ->join('materia_x_grupos', 'cat_grupos.id_grupo', '=', 'materia_x_grupos.id_grupo')
	              ->join('inscripciones', 'inscripciones.id_grupo', '=', 'materia_x_grupos.id_grupo')
	              ->join('alumnos', 'inscripciones.id_alumno', '=', 'alumnos.id_alumno')
	              ->where('cat_grupos.id_escolaridad', $escolaridad[0])
	              ->where('cat_grupos.id_periodo', $periodo)
	              ->select('alumnos.id_alumno as id_alumno', 'alumnos.nombre as nombre', 'alumnos.a_paterno as a_paterno', 'alumnos.a_materno as a_materno') -> distinct() -> get();
	}else if($rol === 'profesor'){
		$alumnos = DB::table('cat_grupos')
	              ->join('materia_x_grupos', 'cat_grupos.id_grupo', '=', 'materia_x_grupos.id_grupo')
	              ->join('inscripciones', 'inscripciones.id_grupo', '=', 'materia_x_grupos.id_grupo')
	              ->join('alumnos', 'inscripciones.id_alumno', '=', 'alumnos.id_alumno')
	              ->where('materia_x_grupos.id_trabajador', $trabajador)
	              ->where('cat_grupos.id_periodo', $periodo)
	              ->select('alumnos.id_alumno as id_alumno', 'alumnos.nombre as nombre', 'alumnos.a_paterno as a_paterno', 'alumnos.a_materno as a_materno') -> distinct() -> get();
	}

	return Response::json($alumnos);
});

Route::get('/ajax-getRoles', function(){
	$rol = App\Rol::all();
	return Response::json($rol);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('downloadFile/{id_planeacion}', ['as' => 'downloadFile', 'uses' => 'PlaneacionController@downloadFile']);


