<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->rol === 'cliente') {
            $clienteId = $user->cliente ? $user->cliente->id : null;
            if ($clienteId) {
                $vehiculosIds = Vehiculo::where('cliente_id', $clienteId)->pluck('id');
                $ordenes = OrdenTrabajo::with('vehiculo')->whereIn('vehiculo_id', $vehiculosIds)->get();
                $vehiculos = Vehiculo::where('cliente_id', $clienteId)->get();
            } else {
                $ordenes = collect();
                $vehiculos = collect();
            }
        } elseif ($user->rol === 'mecanico') {
            $ordenes = OrdenTrabajo::with('vehiculo')->where('user_id', $user->id)->get();
            $vehiculos = Vehiculo::all();
        } else {
            $ordenes = OrdenTrabajo::with('vehiculo')->get();
            $vehiculos = Vehiculo::all();
        }

        return view('ordenes-trabajo.index', compact('ordenes', 'vehiculos'));
    }

    private function checkAccess($ordenes_trabajo)
    {
        $user = auth()->user();
        
        if ($user->rol === 'cliente') {
            $clienteId = $user->cliente ? $user->cliente->id : null;
            if (!$clienteId || $ordenes_trabajo->vehiculo->cliente_id !== $clienteId) {
                abort(403, 'No tenés permiso para acceder a esta orden de trabajo.');
            }
        } elseif ($user->rol === 'mecanico') {
            if ($ordenes_trabajo->user_id !== $user->id) {
                abort(403, 'No tenés permiso para acceder a una orden de trabajo no asignada a ti.');
            }
        }
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
        $this->checkAccess($ordenes_trabajo);
        $vehiculos = Vehiculo::all();

        return view('ordenes-trabajo.edit', [
            'orden' => $ordenes_trabajo,
            'vehiculos' => $vehiculos
        ]);
    }

    public function update(Request $request, OrdenTrabajo $ordenes_trabajo)
    {
        $this->checkAccess($ordenes_trabajo);
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
        if (auth()->user()->rol === 'cliente' || auth()->user()->rol === 'mecanico') {
            abort(403, 'No tenés permiso para eliminar órdenes de trabajo.');
        }
        $ordenes_trabajo->delete();

        return redirect()->route('ordenes-trabajo.index');
    }
}