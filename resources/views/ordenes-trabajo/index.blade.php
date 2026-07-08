<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Órdenes de Trabajo
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-orden-trabajo')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Nueva Orden
            </button>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Vehículo</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Fecha</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ordenes as $orden)
                    <tr>
                        <td class="px-4 py-2">
                            {{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }} ({{ $orden->vehiculo->patente }})
                        </td>
                        <td class="px-4 py-2">{{ $orden->descripcion }}</td>
                        <td class="px-4 py-2">{{ $orden->fecha_ingreso }}</td>
                        <td class="px-4 py-2">{{ $orden->estado }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('ordenes-trabajo.edit', $orden) }}" class="text-yellow-600">Editar</a>
                            <form action="{{ route('ordenes-trabajo.destroy', $orden) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta orden de trabajo?')" class="text-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">No se encontraron órdenes de trabajo.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-modal name="crear-orden-trabajo" :show="$errors->any()">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Nueva Orden de Trabajo</h2>

                <form action="{{ route('ordenes-trabajo.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Vehículo</label>
                        <select name="vehiculo_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Seleccionar Vehículo</option>
                            @foreach($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}" {{ old('vehiculo_id') == $vehiculo->id ? 'selected' : '' }}>
                                    {{ $vehiculo->marca }} {{ $vehiculo->modelo }} - {{ $vehiculo->patente }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehiculo_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="descripcion" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Fecha ingreso</label>
                        <input type="date" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('fecha_ingreso')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Estado</label>
                        <select name="estado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="En proceso" {{ old('estado') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                            <option value="Finalizado" {{ old('estado') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                        </select>
                        @error('estado')
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