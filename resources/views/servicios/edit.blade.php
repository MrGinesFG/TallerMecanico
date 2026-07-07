<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Servicio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('servicios.update', $servicio) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Nombre</label>

                        <input
                            type="text"
                            name="nombre"
                            value="{{ $servicio->nombre }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Descripción</label>

                        <textarea
                            name="descripcion"
                            class="w-full border rounded p-2">{{ $servicio->descripcion }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label>Precio Base</label>

                        <input
                            type="number"
                            step="0.01"
                            name="precio_base"
                            value="{{ $servicio->precio_base }}"
                            class="w-full border rounded p-2">
                    </div>

                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded">
                        Actualizar
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>