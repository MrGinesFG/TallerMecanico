<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white shadow rounded-xl p-6">
                    <h3 class="text-lg font-bold text-gray-700">
                        Órdenes Pendientes
                    </h3>

                    <p class="text-4xl font-bold text-yellow-500 mt-3">
                        0
                    </p>
                </div>

                <div class="bg-white shadow rounded-xl p-6">
                    <h3 class="text-lg font-bold text-gray-700">
                        Órdenes en Proceso
                    </h3>

                    <p class="text-4xl font-bold text-blue-500 mt-3">
                        0
                    </p>
                </div>

                <div class="bg-white shadow rounded-xl p-6">
                    <h3 class="text-lg font-bold text-gray-700">
                        Órdenes Terminadas
                    </h3>

                    <p class="text-4xl font-bold text-green-600 mt-3">
                        0
                    </p>
                </div>

                <div class="bg-white shadow rounded-xl p-6">
                    <h3 class="text-lg font-bold text-gray-700">
                        Total de Órdenes
                    </h3>

                    <p class="text-4xl font-bold text-indigo-600 mt-3">
                        0
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>