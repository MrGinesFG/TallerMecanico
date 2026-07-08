<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-heading text-2xl text-brand-green-dark dark:text-brand-green leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <section class="overflow-hidden rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm transition-colors duration-200">
                <div class="grid gap-5 p-6 md:grid-cols-3 md:p-8">
                    <section class="kanban-column rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-brand-cream-2 dark:bg-gray-900 p-4 shadow-sm transition-colors duration-200">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-brown-dark dark:text-gray-300">Pendiente</p>
                                <p class="text-xs text-brand-brown dark:text-gray-400">Nuevas ordenes</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white dark:bg-gray-800 text-sm font-semibold text-brand-green-dark dark:text-brand-green">3</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="pending" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            <article draggable="true" ondragstart="dragCard(event)" data-id="1" class="kanban-card rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-gray-900/50">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-brand-brown-dark dark:text-gray-100">Cambio aceite Ford Fiesta</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-yellow">A</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-brand-brown dark:text-gray-400">Cliente: Laura P. | Motor 1.6 | Filtro y líquido.</p>
                            </article>
                            <article draggable="true" ondragstart="dragCard(event)" data-id="2" class="kanban-card rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-gray-900/50">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-brand-brown-dark dark:text-gray-100">Alineación Toyota Corolla</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-yellow">B</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-brand-brown dark:text-gray-400">Cliente: Lucas M. | Balanceo y ajuste.</p>
                            </article>
                        </div>
                    </section>

                    <section class="kanban-column rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-brand-cream-2 dark:bg-gray-900 p-4 shadow-sm transition-colors duration-200">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-brown-dark dark:text-gray-300">En progreso</p>
                                <p class="text-xs text-brand-brown dark:text-gray-400">Tareas activas</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white dark:bg-gray-800 text-sm font-semibold text-brand-green-dark dark:text-brand-green">2</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="in-progress" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            <article draggable="true" ondragstart="dragCard(event)" data-id="3" class="kanban-card rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-gray-900/50">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-brand-brown-dark dark:text-gray-100">Reparación de freno trasero</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-yellow">C</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-brand-brown dark:text-gray-400">Cliente: Diego R. | Cambio pastillas y prueba.</p>
                            </article>
                        </div>
                    </section>

                    <section class="kanban-column rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-brand-cream-2 dark:bg-gray-900 p-4 shadow-sm transition-colors duration-200">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-brown-dark dark:text-gray-300">Finalizado</p>
                                <p class="text-xs text-brand-brown dark:text-gray-400">Listo para entrega</p>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white dark:bg-gray-800 text-sm font-semibold text-brand-green-dark dark:text-brand-green">1</span>
                        </div>
                        <div class="space-y-4 min-h-[320px]" data-status="done" ondrop="dropCard(event)" ondragover="allowDrop(event)">
                            <article draggable="true" ondragstart="dragCard(event)" data-id="4" class="kanban-card rounded-3xl border border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-gray-900/50">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-semibold text-brand-brown-dark dark:text-gray-100">Instalación de batería Bosch</p>
                                    <span class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-yellow">D</span>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-brand-brown dark:text-gray-400">Cliente: Marta S. | Revisión y test final.</p>
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
