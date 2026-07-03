<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // GET /api/clientes -> Listar todos los clientes
    public function index()
    {
        $clientes = Cliente::all();

        return response()->json([
            'status' => 'success',
            'count' => $clientes->count(),
            'data' => $clientes
        ], 200);
    }

    // GET /api/clientes/{id} -> Ver la ficha de un cliente con sus vehículos relacionales
    public function show($id)
    {
        // Buscamos el cliente trayendo también sus vehículos adjuntos
        $cliente = Cliente::with('vehiculos')->find($id);

        if (!$cliente) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cliente no encontrado.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $cliente
        ], 200);
    }
}
