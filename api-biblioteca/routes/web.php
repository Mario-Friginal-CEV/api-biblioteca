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

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/libros/lista', 'LibrosController@listaLibros', function() {
    return view('listado');
});

Route::get('/libros/añadir', function () {
    return view('addLibro');
});

Route::get('/libros/eliminar', function () {
    return view('deleteLibro');
});

Route::get('/libros/modificar', function () {
    return view('modifyLibro');
});

//Parte de web bonus aqui
// Route::middleware('auth:api')->get('/libros/lista', 'LibrosController@listaLibros');
// Route::middleware('auth:api')->post('/libros/create', 'LibrosController@addLibro');
// Route::middleware('auth:api')->put('/libros/modify/{id}', 'LibrosController@updateLibro');
// Route::middleware('auth:api')->delete('/libros/delete/{id}', 'LibrosController@deleteLibro');

// Route::middleware('auth:api')->get('/prestamos/lista', 'PrestamosController@listaPrestamos');
// Route::middleware('auth:api')->post('/prestamos/create', 'PrestamosController@addPrestamo');
// Route::middleware('auth:api')->put('/prestamos/modify/{id}', 'PrestamosController@updatePrestamo');
// Route::middleware('auth:api')->delete('/prestamos/delete/{id}', 'PrestamosController@deletePrestamo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
