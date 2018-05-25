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

Route::get('seguimientos/index/{id}', 'SeguimientoController@index');
Route::get('seguimientos/create/{id}', 'SeguimientoController@create');










Route::post('/import-file', 'DataController@importFile')->name('import.file');













Route::get('data')->name('importar');




Route::resource('notas', 'NotasController');

Route::get('descargar-notas-1er-Cohorte', 'NotasController@pdf')->name('pdf');



Route::resource('notas2s', 'Notas2Controller');
Route::get('descargar-notas-2do-Cohorte', 'Notas2Controller@pdf')->name('pdf2');