<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tablero Kanban</h2>
                <p class="mt-1 text-sm text-gray-500">Administra el flujo de ordenes de trabajo del taller.</p>
            </div>
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center rounded-full border border-transparent bg-green-700 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Volver</a>
        </div>
    </x-slot>

    <div class="px-4 py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-3xl border border-slate-800 bg-[#07110c] shadow-[0_20px_80px_rgba(0,0,0,0.35)]">
            <div class="flex flex-col gap-4 p-6 md:flex-row md:items-end md:justify-between md:p-8">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-amber-400/90">Monkey Motors</p>
                    <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Gestión de Ordenes</h1>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-300">Arrastra las tarjetas entre etapas para reflejar el estado real de tu taller.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="inline-flex items-center rounded-full bg-green-900/80 px-3 py-1 text-sm font-semibold text-emerald-200">En curso</span>
                    <span class="inline-flex items-center rounded-full bg-slate-800 px-3 py-1 text-sm font-semibold text-slate-200">Listo para servicio</span>
                    <span class="inline-flex items-center rounded-full bg-amber-500/10 px-3 py-1 text-sm font-semibold text-amber-300">Pendiente</span>
                </div>
            </div>

            <div class="grid gap-5 p-6 md:grid-cols-3 md:p-8">
                <section class="kanban-column rounded-3xl border border-slate-800 bg-[#0f1b16] p-4 shadow-lg shadow-black/20">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-amber-300">Pendiente</p>
                            <p class="text-xs text-slate-400">Ordenes nuevas</p>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-amber-400/15 text-sm font-semibold text-amber-200">3</span>
                    </div>
                    <div class="space-y-4 min-h-[320px]" data-status="pending" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                        <article draggable="true" ondragstart="dragCard(event)" data-id="1"
                            class="kanban-card rounded-3xl border border-slate-700 bg-[#15221a] p-4 shadow-[0_20px_40px_rgba(0,0,0,0.25)] transition hover:-translate-y-1 hover:shadow-[0_24px_50px_rgba(0,0,0,0.30)]">
                            <div class="flex items-start justify-between gap-3">
                                <p class="text-sm font-semibold text-white">Cambio aceite Ford Fiesta</p>
                                <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-300">A</span>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Cliente: Laura P. | Motor 1.6 | Revisión y reemplazo filtro.</p>
                        </article>
                        <article draggable="true" ondragstart="dragCard(event)" data-id="2"
                            class="kanban-card rounded-3xl border border-slate-700 bg-[#15221a] p-4 shadow-[0_20px_40px_rgba(0,0,0,0.25)] transition hover:-translate-y-1 hover:shadow-[0_24px_50px_rgba(0,0,0,0.30)]">
                            <div class="flex items-start justify-between gap-3">
                                <p class="text-sm font-semibold text-white">Alineación Toyota Corola</p>
                                <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-300">B</span>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Cliente: Lucas M. | Control de ruedas y balanceo.</p>
                        </article>
                    </div>
                </section>

                <section class="kanban-column rounded-3xl border border-slate-800 bg-[#0f1b16] p-4 shadow-lg shadow-black/20">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-emerald-300">En curso</p>
                            <p class="text-xs text-slate-400">Tareas en taller</p>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-emerald-400/15 text-sm font-semibold text-emerald-200">2</span>
                    </div>
                    <div class="space-y-4 min-h-[320px]" data-status="in-progress" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                        <article draggable="true" ondragstart="dragCard(event)" data-id="3"
                            class="kanban-card rounded-3xl border border-slate-700 bg-[#15221a] p-4 shadow-[0_20px_40px_rgba(0,0,0,0.25)] transition hover:-translate-y-1 hover:shadow-[0_24px_50px_rgba(0,0,0,0.30)]">
                            <div class="flex items-start justify-between gap-3">
                                <p class="text-sm font-semibold text-white">Reparar freno trasero</p>
                                <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-300">C</span>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Cliente: Diego R. | Cambio pastillas y limpieza.</p>
                        </article>
                    </div>
                </section>

                <section class="kanban-column rounded-3xl border border-slate-800 bg-[#0f1b16] p-4 shadow-lg shadow-black/20">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-sky-300">Finalizado</p>
                            <p class="text-xs text-slate-400">Listo para entrega</p>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-sky-400/15 text-sm font-semibold text-sky-200">1</span>
                    </div>
                    <div class="space-y-4 min-h-[320px]" data-status="done" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                        <article draggable="true" ondragstart="dragCard(event)" data-id="4"
                            class="kanban-card rounded-3xl border border-slate-700 bg-[#15221a] p-4 shadow-[0_20px_40px_rgba(0,0,0,0.25)] transition hover:-translate-y-1 hover:shadow-[0_24px_50px_rgba(0,0,0,0.30)]">
                            <div class="flex items-start justify-between gap-3">
                                <p class="text-sm font-semibold text-white">Instalar batería nueva</p>
                                <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-300">D</span>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Cliente: Marta S. | Batería Bosch y prueba electrónica.</p>
                        </article>
                    </div>
                </section>
            </div>
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
            if (card && targetColumn.contains(card) === false) {
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
