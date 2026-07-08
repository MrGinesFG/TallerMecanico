<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vehículos
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('vehiculos.create') }}"
                   class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-md transition">
                    + Nuevo Vehículo
                </a>
            </div>

            <div class="bg-white shadow rounded-lg p-6">

                <div class="mb-6">
                    <input
                        type="text"
                        placeholder="Buscar por cliente, marca, modelo o patente..."
                        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b text-left">
                                <th class="py-3 px-4 font-semibold text-gray-700">ID</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Cliente</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Marca</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Modelo</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Patente</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Año</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($vehiculos as $vehiculo)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="py-3 px-4">
                                        {{ $vehiculo->id }}
                                    </td>

                                    <td class="py-3 px-4">
                                        @if ($vehiculo->cliente)
                                            {{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }}
                                        @else
                                            <span class="text-gray-400">Sin cliente</span>
                                        @endif
                                    </td>

                                    <td class="py-3 px-4">
                                        {{ $vehiculo->marca }}
                                    </td>

                                    <td class="py-3 px-4">
                                        {{ $vehiculo->modelo }}
                                    </td>

                                    <td class="py-3 px-4 font-semibold">
                                        {{ $vehiculo->patente }}
                                    </td>

                                    <td class="py-3 px-4">
                                        {{ $vehiculo->anio }}
                                    </td>

                                    <td class="py-3 px-4">
                                        <div class="flex gap-3 items-center">
                                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                                               class="text-yellow-600 hover:text-yellow-800 font-medium">
                                                Editar
                                            </a>

                                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Seguro que querés eliminar este vehículo?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-800 font-medium">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-6 px-4 text-center text-gray-500">
                                        No hay vehículos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>