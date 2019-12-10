@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <form action="/libros/lista" method="GET">
                {{ csrf_field() }}

            </form>
    </div>
</div>
@endsection
