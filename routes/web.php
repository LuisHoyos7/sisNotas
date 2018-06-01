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
Route::post('/import-file2', 'DataController@importFile2')->name('import.file2');
Route::post('/import-file3', 'DataController@importFile3')->name('import.file3');














Route::get('data')->name('importar');




Route::resource('notas', 'NotasController');

Route::get('descargar-notas-1er-Cohorte', 'NotasController@pdf')->name('pdf');



Route::resource('notas2s', 'Notas2Controller');
Route::get('descargar-notas-2do-Cohorte', 'Notas2Controller@pdf')->name('pdf2');

Route::resource('notas3s', 'Notas3Controller');
Route::get('descargar-notas-3do-Cohorte', 'Notas3Controller@pdf')->name('pdf3');

//reportes de materias

Route::get('reporte', 'ReporteController@reporte')->name('reportes');
Route::get('reportesMateria/informacionCurso/{ID_ASIGNATURA}/{GRUPO}', 'ReporteController@informacionCurso')->name('informe');

Route::get('reportesMateria/informacionCurso1/{ID_ASIGNATURA}/{GRUPO}', 'ReporteController@informacionCurso1')->name('informe1');

Route::get('reportesMateria/informacionCurso2/{ID_ASIGNATURA}/{GRUPO}', 'ReporteController@informacionCurso2')->name('informe2');