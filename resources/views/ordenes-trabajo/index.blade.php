<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl font-heading text-brand-green-dark dark:text-brand-green leading-tight">
            Órdenes de Trabajo
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-brand-green/20 border border-brand-green/30 text-brand-green-dark dark:text-brand-cream px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-orden-trabajo')" class="bg-brand-yellow hover:bg-yellow-500 text-brand-brown-dark font-semibold px-4 py-2 rounded shadow-sm transition-colors duration-200">
                + Nueva Orden
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 border border-brand-cream-2 dark:border-gray-700 shadow rounded-lg p-6 transition-colors duration-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-brand-cream-2 dark:divide-gray-700 whitespace-nowrap">
                <thead class="bg-brand-cream dark:bg-gray-900/50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Vehículo</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Descripción</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Fecha</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Estado</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-cream-2 dark:divide-gray-700">
                    @forelse ($ordenes as $orden)
                    <tr class="hover:bg-brand-cream-2/50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">
                            {{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }} ({{ $orden->vehiculo->patente }})
                        </td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $orden->descripcion }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $orden->fecha_ingreso }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $orden->estado }}</td>
                        <td class="px-4 py-3 text-sm space-x-3">
                            <a href="{{ route('ordenes-trabajo.edit', $orden) }}" class="text-brand-yellow hover:text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('ordenes-trabajo.destroy', $orden) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta orden de trabajo?')" class="text-red-600 dark:text-red-400 hover:underline">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-brand-brown dark:text-gray-500">No se encontraron órdenes de trabajo.</td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>

        <x-modal name="crear-orden-trabajo" :show="$errors->any()">
            <div class="p-6 bg-white dark:bg-gray-800">
                <h2 class="text-lg font-heading font-medium text-brand-green-dark dark:text-brand-green mb-4">Nueva Orden de Trabajo</h2>

                <form action="{{ route('ordenes-trabajo.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Vehículo</label>
                        <select name="vehiculo_id" class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                            <option value="">Seleccionar Vehículo</option>
                            @foreach($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}" {{ old('vehiculo_id') == $vehiculo->id ? 'selected' : '' }}>
                                    {{ $vehiculo->marca }} {{ $vehiculo->modelo }} - {{ $vehiculo->patente }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehiculo_id')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Descripción</label>
                        <textarea name="descripcion" rows="4" class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow placeholder-gray-400 dark:placeholder-gray-500">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Fecha ingreso</label>
                        <input type="date" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}" class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                        @error('fecha_ingreso')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Estado</label>
                        <select name="estado" class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                            <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="En proceso" {{ old('estado') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                            <option value="Finalizado" {{ old('estado') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                        </select>
                        @error('estado')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 rounded border border-brand-cream-2 dark:border-gray-600 text-brand-brown dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">Cancelar</button>
                        <button type="submit" class="bg-brand-green hover:bg-brand-green-dark text-white px-4 py-2 rounded shadow-sm transition-colors">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </x-modal>

    </div>
</x-app-layout>