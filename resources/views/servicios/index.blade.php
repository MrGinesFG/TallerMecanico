<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl font-heading text-brand-green-dark dark:text-brand-green leading-tight">
            Servicios
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-brand-green/20 border border-brand-green/30 text-brand-green-dark dark:text-brand-cream px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-servicio')" class="bg-brand-yellow hover:bg-yellow-500 text-brand-brown-dark font-semibold px-4 py-2 rounded shadow-sm transition-colors duration-200">
                + Nuevo Servicio
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 border border-brand-cream-2 dark:border-gray-700 shadow rounded-lg p-6 transition-colors duration-200">
            <table class="min-w-full divide-y divide-brand-cream-2 dark:divide-gray-700">
                <thead class="bg-brand-cream dark:bg-gray-900/50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Nombre</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Precio Base</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Descripción</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-cream-2 dark:divide-gray-700">
                    @forelse ($servicios as $servicio)
                    <tr class="hover:bg-brand-cream-2/50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $servicio->nombre }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">${{ number_format($servicio->precio_base, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $servicio->descripcion }}</td>
                        <td class="px-4 py-3 text-sm space-x-3">
                            <a href="{{ route('servicios.edit', $servicio) }}" class="text-brand-yellow hover:text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Está seguro de eliminar este servicio?')" class="text-red-600 dark:text-red-400 hover:underline">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-brand-brown dark:text-gray-500">No se encontraron servicios.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-modal name="crear-servicio" :show="$errors->any()">
            <div class="p-6 bg-white dark:bg-gray-800">
                <h2 class="text-lg font-heading font-medium text-brand-green-dark dark:text-brand-green mb-4">Nuevo Servicio</h2>

                <form action="{{ route('servicios.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Nombre del Servicio</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="Ej: Cambio de aceite">
                        @error('nombre')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Descripción</label>
                        <textarea name="descripcion" rows="3"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="Describe el servicio...">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Precio Base ($)</label>
                        <input type="number" step="0.01" name="precio_base" value="{{ old('precio_base') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="35000">
                        @error('precio_base')
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