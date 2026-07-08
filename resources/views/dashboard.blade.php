<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-heading text-2xl text-brand-green-dark dark:text-brand-green leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(Auth::user()->rol === 'cliente')
            <section class="overflow-hidden rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm transition-colors duration-200 p-6 md:p-8">
                <h3 class="text-xl font-heading text-brand-green-dark dark:text-brand-green mb-4">Bienvenido a Monkey Motors</h3>
                <p class="text-brand-brown dark:text-gray-300 mb-6">
                    Aquí podrás visualizar el estado de tus vehículos en el taller, los servicios que tienes contratados y más detalles de nuestro trabajo.
                </p>
                <div class="grid gap-5 md:grid-cols-2">
                    <!-- Client's vehicles summary -->
                    <div class="rounded-2xl bg-brand-cream-2 dark:bg-gray-900 p-6 border border-brand-cream-2 dark:border-gray-700">
                        <h4 class="font-semibold text-brand-brown-dark dark:text-gray-100 mb-3 text-lg">Servicios Activos</h4>
                        @if($ordenes->count() > 0)
                            <ul class="space-y-4">
                                @foreach($ordenes as $orden)
                                    <li class="bg-white dark:bg-gray-800 p-4 rounded-xl border border-brand-cream-2 dark:border-gray-700 shadow-sm">
                                        <div class="flex justify-between items-start mb-2">
                                            <span class="font-medium text-brand-brown-dark dark:text-gray-200">{{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }}</span>
                                            <span class="text-xs px-2 py-1 rounded bg-brand-green/10 text-brand-green-dark border border-brand-green/20">{{ $orden->estado }}</span>
                                        </div>
                                        <p class="text-sm text-brand-brown dark:text-gray-400">{{ $orden->descripcion }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-brand-brown dark:text-gray-500">No tienes servicios activos en este momento.</p>
                        @endif
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('vehiculos.index') }}" class="inline-block bg-brand-yellow hover:bg-yellow-500 text-brand-brown-dark font-semibold px-6 py-2 rounded-lg shadow-sm transition-colors duration-200">
                        Ver Mis Vehículos
                    </a>
                </div>
            </section>
            @else
            <section class="overflow-hidden rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm transition-colors duration-200">
                <div class="grid gap-5 p-6 md:grid-cols-3 md:p-8">
                    <!-- Pendiente -->
                    <section class="kanban-column rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-brand-cream-2 dark:bg-gray-900 p-4 shadow-sm transition-colors duration-200">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-brown-dark dark:text-gray-300">Pendiente</p>
                                <p class="text-xs text-brand-brown dark:text-gray-400">Nuevas ordenes</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white dark:bg-gray-800 text-sm font-semibold text-brand-green-dark dark:text-brand-green">{{ $ordenes->where('estado', 'pendiente')->count() }}</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="pendiente" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            @foreach($ordenes->where('estado', 'pendiente') as $orden)
                            <article draggable="true" ondragstart="dragCard(event)" data-id="{{ $orden->id }}" class="kanban-card rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-gray-900/50">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-brand-brown-dark dark:text-gray-100">{{ Str::limit($orden->descripcion, 30) }}</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-yellow">#{{ $orden->id }}</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-brand-brown dark:text-gray-400">
                                    @if($orden->vehiculo)
                                        {{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }} ({{ $orden->vehiculo->patente }})
                                        <br><span class="text-xs text-gray-500">Cliente: {{ $orden->vehiculo->cliente->nombre ?? 'N/A' }} {{ $orden->vehiculo->cliente->apellido ?? '' }}</span>
                                    @else
                                        Sin vehículo asociado
                                    @endif
                                </p>
                            </article>
                            @endforeach
                        </div>
                    </section>

                    <!-- En Progreso -->
                    <section class="kanban-column rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-brand-cream-2 dark:bg-gray-900 p-4 shadow-sm transition-colors duration-200">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-brown-dark dark:text-gray-300">En progreso</p>
                                <p class="text-xs text-brand-brown dark:text-gray-400">Tareas activas</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white dark:bg-gray-800 text-sm font-semibold text-brand-green-dark dark:text-brand-green">{{ $ordenes->where('estado', 'en_proceso')->count() }}</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="en_proceso" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            @foreach($ordenes->where('estado', 'en_proceso') as $orden)
                            <article draggable="true" ondragstart="dragCard(event)" data-id="{{ $orden->id }}" class="kanban-card rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-gray-900/50">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-brand-brown-dark dark:text-gray-100">{{ Str::limit($orden->descripcion, 30) }}</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-yellow">#{{ $orden->id }}</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-brand-brown dark:text-gray-400">
                                    @if($orden->vehiculo)
                                        {{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }} ({{ $orden->vehiculo->patente }})
                                        <br><span class="text-xs text-gray-500">Cliente: {{ $orden->vehiculo->cliente->nombre ?? 'N/A' }} {{ $orden->vehiculo->cliente->apellido ?? '' }}</span>
                                    @else
                                        Sin vehículo asociado
                                    @endif
                                </p>
                            </article>
                            @endforeach
                        </div>
                    </section>

                    <!-- Finalizado -->
                    <section class="kanban-column rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-brand-cream-2 dark:bg-gray-900 p-4 shadow-sm transition-colors duration-200">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-brown-dark dark:text-gray-300">Finalizado</p>
                                <p class="text-xs text-brand-brown dark:text-gray-400">Listo para entrega</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white dark:bg-gray-800 text-sm font-semibold text-brand-green-dark dark:text-brand-green">{{ $ordenes->where('estado', 'terminado')->count() }}</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="terminado" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            @foreach($ordenes->where('estado', 'terminado') as $orden)
                            <article draggable="true" ondragstart="dragCard(event)" data-id="{{ $orden->id }}" class="kanban-card rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-gray-900/50">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-brand-brown-dark dark:text-gray-100">{{ Str::limit($orden->descripcion, 30) }}</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-yellow">#{{ $orden->id }}</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-brand-brown dark:text-gray-400">
                                    @if($orden->vehiculo)
                                        {{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }} ({{ $orden->vehiculo->patente }})
                                        <br><span class="text-xs text-gray-500">Cliente: {{ $orden->vehiculo->cliente->nombre ?? 'N/A' }} {{ $orden->vehiculo->cliente->apellido ?? '' }}</span>
                                    @else
                                        Sin vehículo asociado
                                    @endif
                                </p>
                            </article>
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
            @endif

        </div>
    </div>

    <script>
        let draggedCard = null;

        function dragCard(event) {
            draggedCard = event.target;
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', event.target.dataset.id);
        }

        function allowDrop(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
        }

        function dropCard(event) {
            event.preventDefault();
            const targetColumn = event.currentTarget;
            const cardId = event.dataTransfer.getData('text/plain');
            const card = document.querySelector(`[data-id='${cardId}']`);
            if (card && !targetColumn.contains(card)) {
                targetColumn.appendChild(card);
                updateCounters();
            }
        }

        function updateCounters() {
            document.querySelectorAll('.kanban-column').forEach(column => {
                const count = column.querySelectorAll('[draggable="true"]').length;
                const badge = column.querySelector('span.inline-flex');
                if (badge) badge.textContent = count;
            });
        }

        document.addEventListener('DOMContentLoaded', updateCounters);
    </script>
    <script src="https://bernardo-castilho.github.io/DragDropTouch/DragDropTouch.js"></script>
</x-app-layout>
