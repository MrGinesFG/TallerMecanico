<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-green-800 dark:text-green-400">
                    Editar Servicio
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    Modifica la información del servicio seleccionado.
                </p>
            </div>

            <img src="{{ asset('images/monkey-motors-logo.png') }}"
                 alt="Monkey Motors"
                 class="w-20">
        </div>
    </x-slot>

    <div class="py-10" class="bg-[#FBF8F2] dark:bg-gray-900 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8">

                <form action="{{ route('servicios.update', $servicio) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-6">

                        <label class="block text-green-800 dark:text-green-400 font-bold mb-2">
                            Nombre del Servicio
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            value="{{ old('nombre', $servicio->nombre) }}"
                            class="w-full border dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg p-3 focus:ring-2 focus:ring-green-700">

                        @error('nombre')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">

                        <label class="block text-green-800 dark:text-green-400 font-bold mb-2">
                            Descripción
                        </label>

                        <textarea
                            name="descripcion"
                            rows="5"
                            class="w-full border dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg p-3 focus:ring-2 focus:ring-green-700">{{ old('descripcion', $servicio->descripcion) }}</textarea>

                        @error('descripcion')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-8">

                        <label class="block text-green-800 dark:text-green-400 font-bold mb-2">
                            Precio Base ($)
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="precio_base"
                            value="{{ old('precio_base', $servicio->precio_base) }}"
                            class="w-full border dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg p-3 focus:ring-2 focus:ring-green-700">

                        @error('precio_base')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="flex justify-between">

                        <a href="{{ route('servicios.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl transition">

                            ← Cancelar

                        </a>

                        <button
                            type="submit"
                            class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-xl font-bold transition">

                            💾 Actualizar Servicio

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>