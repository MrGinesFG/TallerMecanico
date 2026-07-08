<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-cliente')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Nuevo Cliente
            </button>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <livewire:buscador-clientes />
        </div>

        <x-modal name="crear-cliente" :show="$errors->any()">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Nuevo Cliente</h2>

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('clientes.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input type="text" name="apellido" value="{{ old('apellido') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
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