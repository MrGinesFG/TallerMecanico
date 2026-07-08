<x-app-layout>

<div class="py-6">

<div class="max-w-3xl mx-auto">

<h2 class="text-2xl font-bold mb-6">

Nueva Orden de Trabajo

</h2>

<form action="{{ route('ordenes-trabajo.store') }}" method="POST">

@csrf

@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <strong class="font-bold">¡Uy! Hubo un problema.</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-4">

<label>Vehículo</label>

<select
name="vehiculo_id"
class="border rounded w-full p-2">

@foreach($vehiculos as $vehiculo)

<option value="{{ $vehiculo->id }}">

{{ $vehiculo->marca }}
{{ $vehiculo->modelo }}
-
{{ $vehiculo->patente }}

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label>Descripción</label>

<textarea
name="descripcion"
rows="4"
class="border rounded w-full p-2"></textarea>

</div>

<div class="mb-4">

<label>Fecha ingreso</label>

<input
type="date"
name="fecha_ingreso"
class="border rounded w-full p-2">

</div>

<div class="mb-4">

<label>Estado</label>

<select
name="estado"
class="border rounded w-full p-2">

<option value="pendiente">Pendiente</option>
<option value="en_proceso">En proceso</option>
<option value="terminado">Finalizado</option>

</select>

</div>

<button
class="bg-green-600 text-white px-4 py-2 rounded">

Guardar

</button>

</form>

</div>

</div>

</x-app-layout>