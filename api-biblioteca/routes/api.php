<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Parte de postman aqui
#Libros
// Route::get('/libros/lista', 'LibrosController@listaLibros');
// Route::post('/libros/create', 'LibrosController@addLibro');
// Route::put('/libros/modify/{id}', 'LibrosController@updateLibro');
// Route::delete('/libros/delete/{id}', 'LibrosController@deleteLibro');

Route::middleware('auth:api')->get('/libros/lista', 'LibrosController@listaLibros');
Route::middleware('auth:api')->post('/libros/create', 'LibrosController@addLibro');
Route::middleware('auth:api')->put('/libros/modify/{id}', 'LibrosController@updateLibro');
Route::middleware('auth:api')->delete('/libros/delete/{id}', 'LibrosController@deleteLibro');


#Prestamos
// Route::get('/prestamos/lista', 'PrestamosController@listaPrestamos');
// Route::post('/prestamos/create', 'PrestamosController@addPrestamo');
// Route::put('/prestamos/modify/{id}', 'PrestamosController@updatePrestamo');
// Route::delete('/prestamos/delete/{id}', 'PrestamosController@deletePrestamo');

Route::middleware('auth:api')->get('/prestamos/lista', 'PrestamosController@listaPrestamos');
Route::middleware('auth:api')->post('/prestamos/create', 'PrestamosController@addPrestamo');
Route::middleware('auth:api')->put('/prestamos/modify/{id}', 'PrestamosController@updatePrestamo');
Route::middleware('auth:api')->delete('/prestamos/delete/{id}', 'PrestamosController@deletePrestamo');
