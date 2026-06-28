<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            <div class="flex justify-between mb-6">

                <h2 class="text-2xl font-bold">
                    Órdenes de Trabajo
                </h2>

                <a href="{{ route('ordenes-trabajo.create') }}"
                   class="bg-green-600 text-white px-4 py-2 rounded">

                    Nueva Orden

                </a>

            </div>

            <table class="w-full border">

                <thead class="bg-gray-200">

                    <tr>

                        <th class="border p-2">Vehículo</th>
                        <th class="border p-2">Descripción</th>
                        <th class="border p-2">Fecha</th>
                        <th class="border p-2">Estado</th>
                        <th class="border p-2">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($ordenes as $orden)

                    <tr>

                        <td class="border p-2">
                            {{ $orden->vehiculo->marca }}
                            {{ $orden->vehiculo->modelo }}
                            ({{ $orden->vehiculo->patente }})
                        </td>

                        <td class="border p-2">
                            {{ $orden->descripcion }}
                        </td>

                        <td class="border p-2">
                            {{ $orden->fecha_ingreso }}
                        </td>

                        <td class="border p-2">
                            {{ $orden->estado }}
                        </td>

                        <td class="border p-2">

                            <a href="{{ route('ordenes-trabajo.edit',$orden) }}"
                               class="text-blue-600">

                                Editar

                            </a>

                            <form
                                action="{{ route('ordenes-trabajo.destroy',$orden) }}"
                                method="POST"
                                class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('¿Eliminar?')"
                                    class="text-red-600 ml-3">

                                    Eliminar

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</x-app-layout>