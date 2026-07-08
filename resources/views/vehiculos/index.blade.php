<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vehículos
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-vehiculo')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Nuevo Vehículo
            </button>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Cliente</th>
                        <th class="px-4 py-2 text-left">Marca</th>
                        <th class="px-4 py-2 text-left">Modelo</th>
                        <th class="px-4 py-2 text-left">Patente</th>
                        <th class="px-4 py-2 text-left">Año</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vehiculos as $vehiculo)
                    <tr>
                        <td class="px-4 py-2">{{ $vehiculo->id }}</td>
                        <td class="px-4 py-2">
                            @if ($vehiculo->cliente)
                                {{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }}
                            @else
                                <span class="text-gray-400">Sin cliente</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $vehiculo->marca }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->modelo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->patente }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->anio }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="text-yellow-600">Editar</a>
                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que querés eliminar este vehículo?')" class="text-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No se encontraron vehículos.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-modal name="crear-vehiculo" :show="$errors->any()">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Nuevo Vehículo</h2>

                <form action="{{ route('vehiculos.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Cliente</label>
                        <select name="cliente_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Seleccionar Cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Marca</label>
                        <input type="text" name="marca" value="{{ old('marca') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('marca')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Modelo</label>
                        <input type="text" name="modelo" value="{{ old('modelo') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('modelo')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Patente</label>
                        <input type="text" name="patente" value="{{ old('patente') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('patente')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Año</label>
                        <input type="number" name="anio" value="{{ old('anio') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('anio')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 rounded border">Cancelar</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </x-modal>

    </div>
</x-app-layout>