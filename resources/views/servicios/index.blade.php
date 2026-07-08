<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Servicios
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-servicio')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Nuevo Servicio
            </button>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Precio Base</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicios as $servicio)
                    <tr>
                        <td class="px-4 py-2">{{ $servicio->nombre }}</td>
                        <td class="px-4 py-2">${{ number_format($servicio->precio_base, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $servicio->descripcion }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('servicios.edit', $servicio) }}" class="text-yellow-600">Editar</a>
                            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Está seguro de eliminar este servicio?')" class="text-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">No se encontraron servicios.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-modal name="crear-servicio" :show="$errors->any()">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Nuevo Servicio</h2>

                <form action="{{ route('servicios.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nombre del Servicio</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Ej: Cambio de aceite">
                        @error('nombre')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="descripcion" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Describe el servicio...">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Precio Base ($)</label>
                        <input type="number" step="0.01" name="precio_base" value="{{ old('precio_base') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="35000">
                        @error('precio_base')
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