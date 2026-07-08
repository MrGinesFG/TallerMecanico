<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Vehículo
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-800">
                        Datos del vehículo
                    </h3>
                    <p class="text-sm text-gray-500">
                        Modificá la información del vehículo registrado.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded">
                        <strong>Hay errores en el formulario:</strong>

                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Cliente --}}
                        <div>
                            <label for="cliente_id" class="block text-sm font-medium text-gray-700 mb-1">
                                Cliente
                            </label>

                            <select
                                id="cliente_id"
                                name="cliente_id"
                                required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                                <option value="">Seleccione un cliente</option>

                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ old('cliente_id', $vehiculo->cliente_id) == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Marca --}}
                        <div>
                            <label for="marca" class="block text-sm font-medium text-gray-700 mb-1">
                                Marca
                            </label>

                            <input
                                type="text"
                                id="marca"
                                name="marca"
                                value="{{ old('marca', $vehiculo->marca) }}"
                                required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- Modelo --}}
                        <div>
                            <label for="modelo" class="block text-sm font-medium text-gray-700 mb-1">
                                Modelo
                            </label>

                            <input
                                type="text"
                                id="modelo"
                                name="modelo"
                                value="{{ old('modelo', $vehiculo->modelo) }}"
                                required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- Patente --}}
                        <div>
                            <label for="patente" class="block text-sm font-medium text-gray-700 mb-1">
                                Patente
                            </label>

                            <input
                                type="text"
                                id="patente"
                                name="patente"
                                value="{{ old('patente', $vehiculo->patente) }}"
                                required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- Año --}}
                        <div>
                            <label for="anio" class="block text-sm font-medium text-gray-700 mb-1">
                                Año
                            </label>

                            <input
                                type="number"
                                id="anio"
                                name="anio"
                                value="{{ old('anio', $vehiculo->anio) }}"
                                required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- Color, si lo estás usando --}}
                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700 mb-1">
                                Color
                            </label>

                            <input
                                type="text"
                                id="color"
                                name="color"
                                value="{{ old('color', $vehiculo->color) }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8">
                         }}"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                            Cancelar
                        </a>

                        <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                            Actualizar Vehículo
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>