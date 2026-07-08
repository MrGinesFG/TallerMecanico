<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl font-heading text-brand-green-dark dark:text-brand-green leading-tight">
            {{ Auth::user()->rol === 'cliente' ? 'Mis Vehículos' : 'Vehículos' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-brand-green/20 border border-brand-green/30 text-brand-green-dark dark:text-brand-cream px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(Auth::user()->rol !== 'cliente')
        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-vehiculo')" class="bg-brand-yellow hover:bg-yellow-500 text-brand-brown-dark font-semibold px-4 py-2 rounded shadow-sm transition-colors duration-200">
                + Nuevo Vehículo
            </button>
        </div>
        @endif

        <div class="bg-white dark:bg-gray-800 border border-brand-cream-2 dark:border-gray-700 shadow rounded-lg p-6 transition-colors duration-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-brand-cream-2 dark:divide-gray-700 whitespace-nowrap">
                <thead class="bg-brand-cream dark:bg-gray-900/50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Cliente</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Marca</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Modelo</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Patente</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Año</th>
                        @if(Auth::user()->rol !== 'cliente')
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-cream-2 dark:divide-gray-700">
                    @forelse ($vehiculos as $vehiculo)
                    <tr class="hover:bg-brand-cream-2/50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $vehiculo->id }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">
                            @if ($vehiculo->cliente)
                                {{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }}
                            @else
                                <span class="text-brand-brown dark:text-gray-500">Sin cliente</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $vehiculo->marca }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $vehiculo->modelo }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $vehiculo->patente }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $vehiculo->anio }}</td>
                        @if(Auth::user()->rol !== 'cliente')
                        <td class="px-4 py-3 text-sm space-x-3">
                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="text-brand-yellow hover:text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que querés eliminar este vehículo?')" class="text-red-600 dark:text-red-400 hover:underline">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ Auth::user()->rol === 'cliente' ? 6 : 7 }}" class="px-4 py-8 text-center text-brand-brown dark:text-gray-500">No se encontraron vehículos.</td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>

        <x-modal name="crear-vehiculo" :show="$errors->any()">
            <div class="p-6 bg-white dark:bg-gray-800">
                <h2 class="text-lg font-heading font-medium text-brand-green-dark dark:text-brand-green mb-4">Nuevo Vehículo</h2>

                <form action="{{ route('vehiculos.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Cliente</label>
                        <select name="cliente_id" class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                            <option value="">Seleccionar Cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Marca</label>
                        <input type="text" name="marca" value="{{ old('marca') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                        @error('marca')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Modelo</label>
                        <input type="text" name="modelo" value="{{ old('modelo') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                        @error('modelo')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Patente</label>
                        <input type="text" name="patente" value="{{ old('patente') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                        @error('patente')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Año</label>
                        <input type="number" name="anio" value="{{ old('anio') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                        @error('anio')
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