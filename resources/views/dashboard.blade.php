<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-sm font-medium text-gray-500">Órdenes Pendientes</h3>
                <p class="mt-2 text-3xl font-bold text-red-600">0</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-sm font-medium text-gray-500">Órdenes en Proceso</h3>
                <p class="mt-2 text-3xl font-bold text-yellow-600">0</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-sm font-medium text-gray-500">Órdenes Terminadas</h3>
                <p class="mt-2 text-3xl font-bold text-green-600">0</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-sm font-medium text-gray-500">Total de Órdenes</h3>
                <p class="mt-2 text-3xl font-bold text-gray-800">0</p>
            </div>

        </div>
    </div>
</x-app-layout>