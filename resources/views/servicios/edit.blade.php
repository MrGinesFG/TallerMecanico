@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Servicio</h1>

    <form action="{{ route('servicios.update', $servicio) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text"
               name="nombre"
               value="{{ $servicio->nombre }}"
               class="form-control mb-2">

        <textarea name="descripcion"
                  class="form-control mb-2">{{ $servicio->descripcion }}</textarea>

        <input type="number"
               step="0.01"
               name="precio_base"
               value="{{ $servicio->precio_base }}"
               class="form-control mb-2">

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>
    </form>
</div>
@endsection