<x-app-layout>
    <x-slot name="header">
        <h2>Crear Vehículo</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <form action="{{ route('vehiculos.store') }}"
                  method="POST">

                @csrf

                <div>
                    <label>Cliente</label>

                    <select name="client_id">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">
                                {{ $client->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Marca</label>
                    <input type="text" name="marca">
                </div>

                <div>
                    <label>Modelo</label>
                    <input type="text" name="modelo">
                </div>

                <div>
                    <label>Patente</label>
                    <input type="text" name="patente">
                </div>

                <div>
                    <label>Año</label>
                    <input type="number" name="anio">
                </div>

                <button type="submit">
                    Guardar
                </button>

            </form>

        </div>
    </div>
</x-app-layout>