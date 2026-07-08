<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->rol === 'cliente') {
            $clienteId = $user->cliente ? $user->cliente->id : null;
            if ($clienteId) {
                $vehiculos = Vehiculo::with('cliente')->where('cliente_id', $clienteId)->get();
                $clientes = Cliente::where('id', $clienteId)->get();
            } else {
                $vehiculos = collect();
                $clientes = collect();
            }
        } else {
            $vehiculos = Vehiculo::with('cliente')->get();
            $clientes = Cliente::all();
        }

        return view('vehiculos.index', compact('vehiculos', 'clientes'));
    }

    private function checkAccess($vehiculo)
    {
        $user = auth()->user();
        if ($user->rol === 'cliente' && (!$user->cliente || $vehiculo->cliente_id !== $user->cliente->id)) {
            abort(403, 'No tenés permiso para acceder a los datos de este vehículo.');
        }
    }

    public function create()
    {
        $clientes = Cliente::all();

        return view('vehiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required',
            'modelo' => 'required',
            'patente' => 'required|unique:vehiculos,patente',
            'anio' => 'required|integer',
        ]);

        Vehiculo::create($request->all());

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo creado correctamente');
    }

    public function show(string $id)
    {
        $vehiculo = Vehiculo::with('cliente')->findOrFail($id);
        $this->checkAccess($vehiculo);

        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $this->checkAccess($vehiculo);
        $clientes = Cliente::all();

        return view('vehiculos.edit', compact('vehiculo', 'clientes'));
    }

    public function update(Request $request, string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $this->checkAccess($vehiculo);

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required',
            'modelo' => 'required',
            'patente' => 'required|unique:vehiculos,patente,' . $vehiculo->id,
            'anio' => 'required|integer',
        ]);

        $vehiculo->update($request->all());

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        if (auth()->user()->rol === 'cliente') {
            abort(403, 'Los clientes no pueden eliminar vehículos.');
        }

        $vehiculo->delete();

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado correctamente');
    }
}