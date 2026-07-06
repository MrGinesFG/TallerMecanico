@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Servicio</h1>

    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf

        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2">

        <textarea name="descripcion" placeholder="Descripción" class="form-control mb-2"></textarea>

        <input type="number" step="0.01" name="precio_base" placeholder="Precio" class="form-control mb-2">

        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </form>
</div>
@endsection