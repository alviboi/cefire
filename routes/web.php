<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/controldecentres', function () {
    return view('centres');
});

Route::get('/calendari', function () {
    return view('calendar');
});

Route::get('/permisos_demanats', function () {
    return view('permisos_demanats');
});

Route::get('/permisos_usuaris', function () {
    return view('permisos_demanats_tots');
});

Route::get('/control_usuaris', function () {
    return view('controlusuaris');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/horario', 'HorarioController')->middleware('auth');

Route::get('horario/{semana}/{anyo}/','HorarioController@get_hora_anyo')->name('horariofechaid')->middleware('auth');

Route::get('horario/{semana}/{anyo}/{id}/','HorarioController@get_hora_anyo_concret')->name('horariofechaid_concret')->middleware('auth');

Route::get('guardias/{semana}/{anyo}/','HorarioController@get_todas_guardias')->name('guardias')->middleware('auth');

Route::get('userdatos/','UserController@datos')->name('datosuser');

Route::post('updatedatos/','UserController@update')->name('updatepasswd')->middleware('auth');

Route::post('horario/','HorarioController@update')->name('updatehor')->middleware('auth');

Route::get('afegir_guardies/','HorarioController@afegirguardies')->name('afegirguardies')->middleware('auth');

Route::get('assesors_tots/','UserController@assesors_tots')->name('assesors_tots')->middleware('auth');

Route::post('arxiu_permis/','HorarioController@guardar_arxiu')->name('guardar_arxiu')->middleware('auth');

Route::resource('permisos', 'PermisosController');

Route::get('permisos_tots', 'PermisosController@torna_tots');

Route::post('permisos_borrar', 'PermisosController@destroy');

Route::post('actualitza_perfil/','UserController@actualitza_perfil')->name('actualitza_perfil')->middleware('auth');

Route::post('borra_perfil/','UserController@borra_perfil')->name('borra_perfil')->middleware('auth');

Route::post('afg_guardia/','HorarioController@afg_guardia')->name('afg_guardia')->middleware('auth');

Route::get('permisos_tots_concret/{id}/','PermisosController@torna_concret');

Route::get('estadistica/{any}/{setmana}','EstadisticasController@estadisticas');

Route::resource('centres', 'CentresController');

Route::resource('notificacions', 'NoticacionsController');

Route::post('afg_advertencia/','HorarioController@afg_advertencia')->name('afg_advertencia')->middleware('auth');



