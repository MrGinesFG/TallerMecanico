@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="card p-3">
        <h3>Órdenes Pendientes</h3>
        <p>0</p>
    </div>

    <div class="card p-3 mt-2">
        <h3>Órdenes en Proceso</h3>
        <p>0</p>
    </div>

    <div class="card p-3 mt-2">
        <h3>Órdenes Terminadas</h3>
        <p>0</p>
    </div>

    <div class="card p-3 mt-2">
        <h3>Total de Órdenes</h3>
        <p>0</p>
    </div>
</div>
@endsection