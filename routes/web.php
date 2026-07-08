<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\OrdenTrabajoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->rol === 'cliente') {
        $clienteId = $user->cliente ? $user->cliente->id : null;
        if ($clienteId) {
            $vehiculosIds = App\Models\Vehiculo::where('cliente_id', $clienteId)->pluck('id');
            $ordenes = App\Models\OrdenTrabajo::with('vehiculo.cliente')->whereIn('vehiculo_id', $vehiculosIds)->get();
        } else {
            $ordenes = collect();
        }
    } elseif ($user->rol === 'mecanico') {
        $ordenes = App\Models\OrdenTrabajo::with('vehiculo.cliente')->where('user_id', $user->id)->get();
    } else {
        $ordenes = App\Models\OrdenTrabajo::with('vehiculo.cliente')->get();
    }

    return view('dashboard', compact('ordenes'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('servicios', ServicioController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('ordenes-trabajo', OrdenTrabajoController::class);
});

require __DIR__ . '/auth.php';
