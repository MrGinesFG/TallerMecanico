<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-green-800">
                    Nuevo Servicio
                </h2>
                <p class="text-gray-600">
                    Registra un nuevo servicio para Monkey Motors.
                </p>
            </div>

            <img src="{{ asset('images/monkey-motors-logo.png') }}"
                 alt="Monkey Motors"
                 class="w-20">
        </div>
    </x-slot>

    <div class="py-10" style="background:#FBF8F2; min-height:100vh;">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow-xl rounded-2xl p-8">

                <form action="{{ route('servicios.store') }}" method="POST">

                    @csrf

                    <div class="mb-6">

                        <label class="block text-green-800 font-bold mb-2">
                            Nombre del Servicio
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-700"
                            placeholder="Ej: Cambio de aceite">

                        @error('nombre')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">

                        <label class="block text-green-800 font-bold mb-2">
                            Descripción
                        </label>

                        <textarea
                            name="descripcion"
                            rows="5"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-700"
                            placeholder="Describe el servicio...">{{ old('descripcion') }}</textarea>

                        @error('descripcion')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-8">

                        <label class="block text-green-800 font-bold mb-2">
                            Precio Base ($)
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="precio_base"
                            value="{{ old('precio_base') }}"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-700"
                            placeholder="35000">

                        @error('precio_base')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="flex justify-between">

                        <a href="{{ route('servicios.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl">

                            ← Volver

                        </a>

                        <button
                            type="submit"
                            class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-xl font-bold">

                            Guardar Servicio

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>