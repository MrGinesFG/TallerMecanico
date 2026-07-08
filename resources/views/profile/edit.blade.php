<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="text-4xl font-bold text-green-800">
                    Perfiles
                </h2>

                <p class="text-gray-600 mt-2">
                    Conocé a los desarrolladores del sistema Monkey Motors.
                </p>

            </div>

            <img src="{{ asset('images/monkey-motors-logo.png') }}" class="w-24" alt="Monkey Motors">

        </div>

    </x-slot>

    <div class="py-12" style="background:#FBF8F2;min-height:100vh;">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition">

                    <div class="p-8 text-center">

                        <img src="{{ asset('images/perfiles/Alex.jpeg') }}"
                            class="w-40 h-40 rounded-full object-cover border-4 border-green-700 mx-auto">

                        <h2 class="mt-6 text-3xl font-bold text-green-800">

                            Cuellar Alex

                        </h2>

                        <p class="mt-6 text-gray-600">

                            Encargado del módulo de
                            <strong>Servicios</strong>,
                            <strong>Seeders</strong>
                            y
                            <strong>Dashboard</strong>.
                        </p>

                        <hr class="my-6">

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition">

                    <div class="p-8 text-center">

                        <img src="{{ asset('images/perfiles/Fabri.jpeg') }}"
                            class="w-40 h-40 rounded-full object-cover border-4 border-green-700 mx-auto">

                        <h2 class="mt-6 text-3xl font-bold text-green-800">

                            Gines Fabrizio

                        </h2>

                        <p class="mt-6 text-gray-600">

                            Encargado del módulo de
                            <strong>Clientes</strong>
                            y
                            <strong>Livewire</strong>.
                        </p>

                        <hr class="my-6">

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition">

                    <div class="p-8 text-center">

                        <img src="{{ asset('images/perfiles/Martin.jpeg') }}"
                            class="w-40 h-40 rounded-full object-cover border-4 border-green-700 mx-auto">

                        <h2 class="mt-6 text-3xl font-bold text-green-800">

                            Sanchez Martin

                        </h2>

                        <p class="mt-6 text-gray-600">

                            Encargado del módulo de
                            <strong>Apis</strong>
                            y
                            <strong>Perfiles</strong>.
                        </p>

                        <hr class="my-6">

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition">

                    <div class="p-8 text-center">

                        <img src="{{ asset('images/perfiles/Nico.jpeg') }}"
                            class="w-40 h-40 rounded-full object-cover border-4 border-green-700 mx-auto">

                        <h2 class="mt-6 text-3xl font-bold text-green-800">

                            Mendoza Fabian

                        </h2>

                        <p class="mt-6 text-gray-600">

                            Encargado del módulo de
                            <strong>Ordenes de Trabajo</strong>
                            y
                            <strong>Vehiculo</strong>.
                        </p>

                        <hr class="my-6">

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>