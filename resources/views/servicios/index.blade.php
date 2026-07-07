<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Servicios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <a href="{{ route('servicios.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Nuevo Servicio
                </a>

                <table class="min-w-full mt-6 border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Nombre</th>
                            <th class="border p-2">Descripción</th>
                            <th class="border p-2">Precio</th>
                            <th class="border p-2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($servicios as $servicio)
                            <tr>
                                <td class="border p-2">{{ $servicio->nombre }}</td>
                                <td class="border p-2">{{ $servicio->descripcion }}</td>
                                <td class="border p-2">${{ $servicio->precio_base }}</td>

                                <td class="border p-2">

                                    <a href="{{ route('servicios.edit', $servicio) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Editar
                                    </a>

                                    <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('¿Eliminar este servicio?')"
                                            class="bg-red-600 text-white px-3 py-1 rounded">
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
    </div>

</x-app-layout>