<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Cliente
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">

            <h3 class="text-lg font-semibold mb-4">{{ $cliente->nombre }} {{ $cliente->apellido }}</h3>

            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <dt class="text-sm text-gray-500">Email</dt>
                    <dd class="text-gray-900">{{ $cliente->email }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-500">Teléfono</dt>
                    <dd class="text-gray-900">{{ $cliente->telefono ?? '—' }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-sm text-gray-500">Dirección</dt>
                    <dd class="text-gray-900">{{ $cliente->direccion ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-500">Cliente desde</dt>
                    <dd class="text-gray-900">{{ $cliente->created_at->format('d/m/Y') }}</dd>
                </div>
            </dl>

            {{-- 🚧 Acá va a ir la tabla de vehículos y el historial de órdenes
                 cuando el Integrante 2 tenga listo el modelo Vehiculo --}}

            <div class="mt-6 flex gap-2">
                <a href="{{ route('clientes.edit', $cliente) }}" class="px-4 py-2 rounded border">Editar</a>
                <a href="{{ route('clientes.index') }}" class="px-4 py-2 rounded border">Volver al listado</a>
            </div>

        </div>
    </div>
</x-app-layout>