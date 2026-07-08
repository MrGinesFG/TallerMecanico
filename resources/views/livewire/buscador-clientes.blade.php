<div>
    @if (session('success'))
    <div class="mb-4 bg-brand-green/20 border border-brand-green/30 text-brand-green-dark dark:text-brand-cream px-4 py-2 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Buscar por nombre, apellido o email..."
            class="w-full rounded-lg border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 text-brand-brown-dark dark:text-gray-100 shadow-sm focus:ring-brand-yellow focus:border-brand-yellow placeholder-gray-400 dark:placeholder-gray-500 transition-colors">
    </div>

    <table class="min-w-full divide-y divide-brand-cream-2 dark:divide-gray-700">
        <thead class="bg-brand-cream dark:bg-gray-900/50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Nombre</th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Apellido</th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Email</th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Teléfono</th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-brown dark:text-gray-400">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
            <tr wire:key="cliente-{{ $cliente->id }}" class="hover:bg-brand-cream-2/50 dark:hover:bg-gray-700/50 transition-colors">
                <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $cliente->nombre }}</td>
                <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $cliente->apellido }}</td>
                <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $cliente->email }}</td>
                <td class="px-4 py-3 text-sm text-brand-brown-dark dark:text-gray-300">{{ $cliente->telefono }}</td>
                <td class="px-4 py-3 text-sm space-x-3">
                    <a href="{{ route('clientes.show', $cliente) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente) }}" class="text-brand-yellow hover:text-yellow-600 hover:underline">Editar</a>
                    <button
                        type="button"
                        wire:click="eliminar({{ $cliente->id }})"
                        onclick="confirm('¿Estás seguro de eliminar a {{ $cliente->nombre }} {{ $cliente->apellido }}?') || event.stopImmediatePropagation()"
                        class="text-red-600 dark:text-red-400 hover:underline">
                        Eliminar
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-8 text-center text-brand-brown dark:text-gray-500">No se encontraron clientes.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $clientes->links() }}
    </div>
</div>