<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\OrdenTrabajoController;

// Ruta pública: cualquiera puede intentar loguearse para conseguir un token o registrarse
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rutas protegidas: SOLO accesibles si mandan un token válido en la cabecera
Route::middleware('auth:sanctum')->group(function () {
    // Rutas de Clientes
    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::get('/clientes/{id}', [ClienteController::class, 'show']);
    
    // Rutas de Órdenes de Trabajo
    Route::get('/ordenes', [OrdenTrabajoController::class, 'index']);
    Route::get('/ordenes/{id}', [OrdenTrabajoController::class, 'show']);

    // Ruta de prueba para saber qué usuario está logueado actualmente
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Ruta para cerrar sesión y destruir el token activo
    Route::post('/logout', [AuthController::class, 'logout']);
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // [Acá vas a ir metiendo tus próximos endpoints de Clientes, Vehículos y Órdenes...]
});