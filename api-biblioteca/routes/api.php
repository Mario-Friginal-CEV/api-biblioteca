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
Route::get('/libros/lista', 'LibrosController@listaLibros');
Route::middleware('auth:api')->post('/libros/create', 'LibrosController@addLibro');
Route::middleware('auth:api')->put('/libros/modify/{id}', 'LibrosController@updateLibro');
Route::middleware('auth:api')->delete('/libros/delete/{id}', 'LibrosController@deleteLibro');
Route::get('/libros/autor/{autor}', 'LibrosController@filtroAutor');
Route::get('/libros/genero/{genero}', 'LibrosController@filtroGenero');


#Prestamos
Route::middleware('auth:api')->get('/prestamos/lista', 'PrestamosController@listaPrestamos');
Route::middleware('auth:api')->post('/prestamos/create', 'PrestamosController@addPrestamo');
Route::middleware('auth:api')->put('/prestamos/modify/{id}', 'PrestamosController@updatePrestamo');
Route::middleware('auth:api')->delete('/prestamos/delete/{id}', 'PrestamosController@deletePrestamo');
