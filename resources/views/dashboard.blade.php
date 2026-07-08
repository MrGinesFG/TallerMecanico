<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                <div class="grid gap-5 p-6 md:grid-cols-3 md:p-8">
                    <section class="kanban-column rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-700">Pendiente</p>
                                <p class="text-xs text-slate-500">Nuevas ordenes</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-sm font-semibold text-slate-700">3</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="pending" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            <article draggable="true" ondragstart="dragCard(event)" data-id="1" class="kanban-card rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-slate-900">Cambio aceite Ford Fiesta</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-500">A</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-slate-600">Cliente: Laura P. | Motor 1.6 | Filtro y líquido.</p>
                            </article>
                            <article draggable="true" ondragstart="dragCard(event)" data-id="2" class="kanban-card rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-slate-900">Alineación Toyota Corolla</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-500">B</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-slate-600">Cliente: Lucas M. | Balanceo y ajuste.</p>
                            </article>
                        </div>
                    </section>

                    <section class="kanban-column rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-700">En progreso</p>
                                <p class="text-xs text-slate-500">Tareas activas</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-sm font-semibold text-slate-700">2</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="in-progress" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            <article draggable="true" ondragstart="dragCard(event)" data-id="3" class="kanban-card rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-slate-900">Reparación de freno trasero</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-500">C</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-slate-600">Cliente: Diego R. | Cambio pastillas y prueba.</p>
                            </article>
                        </div>
                    </section>

                    <section class="kanban-column rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-700">Finalizado</p>
                                <p class="text-xs text-slate-500">Listo para entrega</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-sm font-semibold text-slate-700">1</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="done" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            <article draggable="true" ondragstart="dragCard(event)" data-id="4" class="kanban-card rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-slate-900">Instalación de batería Bosch</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-500">D</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-slate-600">Cliente: Marta S. | Revisión y test final.</p>
                            </article>
                        </div>
                    </section>
                </div>
            </section>

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
</x-app-layout>
