@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content">
                    <div class="links">
                        <a href="http://localhost/api-biblioteca/public/libros/lista">Lista de Libros</a>
                        </br>
                        <a href="http://localhost/api-biblioteca/public/libros/añadir">Añadir Libro</a>
                        </br>
                        <a href="http://localhost/api-biblioteca/public/libros/modificar/{id}">Modificar Libro</a>
                        </br>
                        <a href="http://localhost/api-biblioteca/public/libros/delete{id}">Eliminar Libro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

