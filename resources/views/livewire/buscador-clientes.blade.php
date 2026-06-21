<div>
    @if (session('success'))
    <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Buscar por nombre, apellido o email..."
            class="w-full rounded-lg border-gray-300 shadow-sm">
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Apellido</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Teléfono</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
            <tr wire:key="cliente-{{ $cliente->id }}">
                <td class="px-4 py-2">{{ $cliente->nombre }}</td>
                <td class="px-4 py-2">{{ $cliente->apellido }}</td>
                <td class="px-4 py-2">{{ $cliente->email }}</td>
                <td class="px-4 py-2">{{ $cliente->telefono }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('clientes.show', $cliente) }}" class="text-blue-600">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente) }}" class="text-yellow-600">Editar</a>
                    <button
                        wire:click="eliminar({{ $cliente->id }})"
                        wire:confirm="¿Estás seguro de eliminar a {{ $cliente->nombre }} {{ $cliente->apellido }}?"
                        class="text-red-600">
                        Eliminar
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-4 text-center text-gray-500">No se encontraron clientes.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $clientes->links() }}
    </div>
</div>