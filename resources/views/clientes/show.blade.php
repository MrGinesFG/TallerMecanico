<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ $cliente->nombre }} {{ $cliente->apellido }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('clientes.edit', $cliente) }}"
                    class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                    Editar
                </a>
                <a href="{{ route('clientes.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                    Volver
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Tarjeta de datos del cliente -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Información del cliente</h3>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Nombre</label>
                    <p class="text-gray-900 dark:text-gray-100">{{ $cliente->nombre }} {{ $cliente->apellido }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Email</label>
                    <p class="text-gray-900 dark:text-gray-100">{{ $cliente->email }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Teléfono</label>
                    <p class="text-gray-900 dark:text-gray-100">{{ $cliente->telefono ?? 'No especificado' }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Dirección</label>
                    <p class="text-gray-900 dark:text-gray-100">{{ $cliente->direccion ?? 'No especificada' }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Cliente desde</label>
                    <p class="text-gray-900 dark:text-gray-100">{{ $cliente->created_at->format('d/m/Y') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Última actualización</label>
                    <p class="text-gray-900 dark:text-gray-100">{{ $cliente->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Tabla de vehículos (relación 1:N) -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Vehículos del cliente</h3>
                {{-- <a href="{{ route('vehiculos.create', ['cliente_id' => $cliente->id]) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                    + Nuevo Vehículo
                </a> --}}
            </div>

            @if($cliente->vehiculos && $cliente->vehiculos->count() > 0)
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Patente</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Marca
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Modelo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Año
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Color
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($cliente->vehiculos as $vehiculo)
                            <tr class="hover:bg-gray-50 dark:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $vehiculo->patente }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $vehiculo->marca }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $vehiculo->modelo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $vehiculo->anio }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $vehiculo->color ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                    {{-- <a href="{{ route('vehiculos.show', $vehiculo) }}"
                                        class="text-blue-600 hover:underline">Ver</a>
                                    <a href="{{ route('vehiculos.edit', $vehiculo) }}"
                                        class="text-yellow-600 hover:underline">Editar</a> --}}
                                    <span class="text-gray-400">Ver | Editar</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center py-12 text-gray-500 dark:text-gray-400">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="mt-4">Este cliente no tiene vehículos registrados.</p>
                </div>
            @endif
        </div>

        <!-- Tabla de órdenes de trabajo (relación indirecta vía vehículos) -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Historial de órdenes de trabajo</h3>

            @php
                // Obtener todas las órdenes de los vehículos del cliente
                $ordenes = \App\Models\OrdenTrabajo::whereIn('vehiculo_id', $cliente->vehiculos->pluck('id'))->orderBy('created_at', 'desc')->get();
            @endphp

            @if($ordenes->count() > 0)
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Vehículo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Descripción</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha
                                Ingreso</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Costo
                                Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($ordenes as $orden)
                            <tr class="hover:bg-gray-50 dark:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $orden->vehiculo->patente ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($orden->descripcion, 50) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                                                @if($orden->estado === 'pendiente') bg-red-100 text-red-800
                                                @elseif($orden->estado === 'en_proceso') bg-yellow-100 text-yellow-800
                                                @else bg-green-100 text-green-800
                                                @endif
                                            ">
                                        {{ ucfirst(str_replace('_', ' ', $orden->estado)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{ $orden->fecha_ingreso->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    ${{ number_format($orden->costo_total, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                    {{-- <a href="{{ route('ordenes.show', $orden) }}"
                                        class="text-blue-600 hover:underline">Ver</a> --}}
                                    <span class="text-gray-400">Ver</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center py-12 text-gray-500 dark:text-gray-400">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="mt-4">No hay órdenes de trabajo registradas para este cliente.</p>
                </div>
            @endif
        </div>

    </div>
</x-app-layout>