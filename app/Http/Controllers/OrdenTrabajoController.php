<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    public function index()
    {
        $ordenes = OrdenTrabajo::with('vehiculo')->get();
        $vehiculos = Vehiculo::all();

        return view('ordenes-trabajo.index', compact('ordenes', 'vehiculos'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();

        return view('ordenes-trabajo.create', compact('vehiculos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required',
            'descripcion' => 'required',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required'
        ]);

        OrdenTrabajo::create($request->all());

        return redirect()->route('ordenes-trabajo.index');
    }

    public function edit(OrdenTrabajo $ordenes_trabajo)
    {
        $vehiculos = Vehiculo::all();

        return view('ordenes-trabajo.edit', [
            'orden' => $ordenes_trabajo,
            'vehiculos' => $vehiculos
        ]);
    }

    public function update(Request $request, OrdenTrabajo $ordenes_trabajo)
    {
        $request->validate([
            'vehiculo_id' => 'required',
            'descripcion' => 'required',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required'
        ]);

        $ordenes_trabajo->update($request->all());

        return redirect()->route('ordenes-trabajo.index');
    }

    public function destroy(OrdenTrabajo $ordenes_trabajo)
    {
        $ordenes_trabajo->delete();

        return redirect()->route('ordenes-trabajo.index');
    }
}