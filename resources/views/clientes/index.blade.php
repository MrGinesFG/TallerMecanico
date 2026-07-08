<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl font-heading text-brand-green-dark dark:text-brand-green leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-4 bg-green-100 dark:bg-brand-green/20 border border-green-200 dark:border-brand-green/30 text-green-800 dark:text-brand-cream px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'crear-cliente')" class="bg-brand-yellow hover:bg-yellow-500 text-brand-brown-dark font-semibold px-4 py-2 rounded shadow-sm transition-colors duration-200">
                + Nuevo Cliente
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 border border-brand-cream-2 dark:border-gray-700 shadow rounded-lg p-6 transition-colors duration-200">
            <livewire:buscador-clientes />
        </div>

        <x-modal name="crear-cliente" :show="$errors->any()">
            <div class="p-6 bg-white dark:bg-gray-800">
                <h2 class="text-lg font-heading font-medium text-brand-green-dark dark:text-brand-green mb-4">Nuevo Cliente</h2>

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 px-4 py-2 rounded">
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
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Apellido</label>
                        <input type="text" name="apellido" value="{{ old('apellido') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-brand-brown-dark dark:text-gray-300">Dirección</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}"
                            class="mt-1 block w-full rounded-md border-brand-cream-2 dark:border-gray-600 bg-white dark:bg-gray-700 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow">
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