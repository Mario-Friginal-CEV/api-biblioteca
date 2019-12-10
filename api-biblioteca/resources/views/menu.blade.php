@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
                <div class="content">
                    <div class="card btn btn-dark">
                        <a href="http://localhost/api-biblioteca/public/libros/lista">Lista de Libros</a>
                    </div>
                    </br>
                    <div class="card btn btn-dark">
                        <a href="http://localhost/api-biblioteca/public/libros/añadir">Añadir Libro</a>
                    </div>
                    </br>
                    <div class="card btn btn-dark">
                        <a href="http://localhost/api-biblioteca/public/libros/modificar">Modificar Libro</a>
                    </div>
                    </br>
                    <div class="card btn btn-dark">
                        <a href="http://localhost/api-biblioteca/public/libros/eliminar">Eliminar Libro</a>
                    </div>
                </div>
        </div>
</div>
@endsection

