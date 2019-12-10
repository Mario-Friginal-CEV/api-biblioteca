@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="" method="POST">
            <p>ID del libro a modificar<input type="number" name="titulo" /></p>
            <br/>
            <p>Titulo: <input type="text" name="titulo" /></p>
            <p>Autor: <input type="text" name="autor" /></p>
            <p>Genero:
                <select NAME="tipo">
                    <OPTION VALUE="novela" SELECTED>Novela
                    <OPTION VALUE="cuento">Cuento
                    <OPTION VALUE="poesia">Poesía
                    <OPTION VALUE="+18">+18
                </select>
            </p>
            <p>Sinopsis: <input type="text" name="sinopsis" /></p>
            <p><input type="submit" /></p>
        </form>
    </div>
</div>
@endsection
