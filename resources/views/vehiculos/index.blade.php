<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vehículos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('vehiculos.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Nuevo Vehículo
            </a>

            <table class="table-auto w-full mt-4 border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Patente</th>
                        <th>Año</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vehiculos as $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->id }}</td>
                            <td>
                                {{ $vehiculo->client->nombre ?? 'Sin cliente' }}
                            </td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->patente }}</td>
                            <td>{{ $vehiculo->anio }}</td>

                            <td>
                                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}">
                                    Editar
                                </a>

<<<<<<< HEAD
                                <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                                      method="POST"
                                      style="display:inline">
=======
                                <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST"
                                    style="display:inline">
>>>>>>> dvlp/GinesFabrizio

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</x-app-layout>