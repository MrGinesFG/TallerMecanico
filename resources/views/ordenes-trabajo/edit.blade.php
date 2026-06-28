<x-app-layout>

<div class="py-6">

<div class="max-w-3xl mx-auto">

<h2 class="text-2xl font-bold mb-6">

Editar Orden

</h2>

<form action="{{ route('ordenes-trabajo.update',$orden) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-4">

<label>Vehículo</label>

<select
name="vehiculo_id"
class="border rounded w-full p-2">

@foreach($vehiculos as $vehiculo)

<option
value="{{ $vehiculo->id }}"
{{ $orden->vehiculo_id==$vehiculo->id ? 'selected':'' }}>

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
class="border rounded w-full p-2">{{ $orden->descripcion }}</textarea>

</div>

<div class="mb-4">

<label>Fecha ingreso</label>

<input
type="date"
name="fecha_ingreso"
value="{{ $orden->fecha_ingreso }}"
class="border rounded w-full p-2">

</div>

<div class="mb-4">

<label>Estado</label>

<select
name="estado"
class="border rounded w-full p-2">

<option value="Pendiente"
{{ $orden->estado=='Pendiente'?'selected':'' }}>
Pendiente
</option>

<option value="En proceso"
{{ $orden->estado=='En proceso'?'selected':'' }}>
En proceso
</option>

<option value="Finalizado"
{{ $orden->estado=='Finalizado'?'selected':'' }}>
Finalizado
</option>

</select>

</div>

<button
class="bg-blue-600 text-white px-4 py-2 rounded">

Actualizar

</button>

</form>

</div>

</div>

</x-app-layout>