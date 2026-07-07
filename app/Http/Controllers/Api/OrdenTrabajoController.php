<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    // GET /api/ordenes -> Listar todas las órdenes con su vehículo y cliente
    public function index()
    {
        $ordenes = OrdenTrabajo::with(['vehiculo.cliente', 'user'])->get();

        return response()->json([
            'status' => 'success',
            'count' => $ordenes->count(),
            'data' => $ordenes
        ], 200);
    }

    // GET /api/ordenes/{id} -> Ficha detallada de una orden con TODO el historial y servicios
    public function show($id)
    {
        $orden = OrdenTrabajo::with(['vehiculo.cliente', 'user', 'servicios'])->find($id);

        if (!$orden) {
            return response()->json([
                'status' => 'error',
                'message' => 'Orden de trabajo no encontrada.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $orden
        ], 200);
    }
}
