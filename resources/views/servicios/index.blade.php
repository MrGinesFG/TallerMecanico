<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-green-800">
                    Gestión de Servicios
                </h2>
                <p class="text-gray-600 mt-1">
                    Administra todos los servicios ofrecidos por Monkey Motors.
                </p>
            </div>

            <img src="{{ asset('images/monkey-motors-logo.png') }}" alt="Monkey Motors" class="w-20">
        </div>
    </x-slot>

    <div class="py-8" style="background:#FBF8F2; min-height:100vh;">

        <div class="max-w-7xl mx-auto px-6">

            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-5 py-4 rounded-xl">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-6">

                <a href="{{ route('servicios.create') }}"
                    class="bg-green-700 hover:bg-green-800 text-white font-semibold px-6 py-3 rounded-xl shadow transition">

                    + Nuevo Servicio

                </a>

            </div>

            @if($servicios->count())

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($servicios as $servicio)

                        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition">

                            <div class="flex justify-between items-start">

                                <h3 class="text-xl font-bold text-green-800">
                                    {{ $servicio->nombre }}
                                </h3>

                                <span class="bg-green-700 text-white px-3 py-1 rounded-full text-sm">
                                    ${{ number_format($servicio->precio_base, 0, ',', '.') }}
                                </span>

                            </div>

                            <p class="text-gray-600 mt-4">
                                {{ $servicio->descripcion }}
                            </p>

                            <div class="flex justify-between mt-6">

                                <a href="{{ route('servicios.edit', $servicio) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-semibold">

                                    ✏️ Editar

                                </a>

                                <form action="{{ route('servicios.destroy', $servicio) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('¿Está seguro de eliminar este servicio?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold">

                                        🗑 Eliminar

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white rounded-2xl shadow p-10 text-center">

                    <img src="{{ asset('images/monkey-motors-logo.png') }}" class="mx-auto w-24 mb-6">

                    <h2 class="text-2xl font-bold text-green-800">
                        No hay servicios registrados
                    </h2>

                    <p class="text-gray-600 mt-3">
                        Agrega el primer servicio para comenzar a administrar el taller.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>