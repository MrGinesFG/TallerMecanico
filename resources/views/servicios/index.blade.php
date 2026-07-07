<x-app-layout>
    <x-slot name="header">
        <h1>Servicios</h1>
    </x-slot>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary">
        Nuevo Servicio
    </a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->descripcion }}</td>
                    <td>${{ $servicio->precio_base }}</td>
                    <td>
                        <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>