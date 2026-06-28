<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Client;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('client')->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $clients = Client::all();

        return view('vehiculos.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'marca' => 'required',
            'modelo' => 'required',
            'patente' => 'required|unique:vehiculos,patente',
            'anio' => 'required|integer'
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')
                         ->with('success', 'Vehículo creado correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $clients = Client::all();

        return view('vehiculos.edit', compact('vehiculo', 'clients'));
    }

    public function update(Request $request, string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'marca' => 'required',
            'modelo' => 'required',
            'patente' => 'required|unique:vehiculos,patente,' . $vehiculo->id,
            'anio' => 'required|integer'
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
                         ->with('success', 'Vehículo actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
                         ->with('success', 'Vehículo eliminado correctamente');
    }
}