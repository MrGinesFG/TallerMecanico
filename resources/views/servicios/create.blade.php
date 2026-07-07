<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Servicio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('servicios.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label>Nombre</label>

                        <input
                            type="text"
                            name="nombre"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Descripción</label>

                        <textarea
                            name="descripcion"
                            class="w-full border rounded p-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label>Precio Base</label>

                        <input
                            type="number"
                            step="0.01"
                            name="precio_base"
                            class="w-full border rounded p-2">
                    </div>

                    <button
                        class="bg-green-600 text-white px-4 py-2 rounded">
                        Guardar
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>