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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('login/google', 'Auth\LoginController@googleRedirectToProvider')->name('google');
Route::get('login/google/callback', 'Auth\LoginController@googleHandleProviderCallback');


Route::resource('examples', 'ExampleController');





Route::resource('periodos', 'PeriodoController');

Route::resource('seguimientos', 'SeguimientoController');

Route::resource('areas', 'AreaController');

Route::resource('grupos', 'GrupoController');

Route::resource('cursos', 'CursoController');

Route::resource('detalleNotas', 'DetalleNotasController');









Route::post('/import-excel', 'DataController@importData');







Route::resource('notas', 'NotasController');





Route::get('data');
