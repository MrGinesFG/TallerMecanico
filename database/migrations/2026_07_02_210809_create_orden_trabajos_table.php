<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orden_trabajos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('vehiculo_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // El mecánico asignado
        $table->text('descripcion');
        $table->enum('estado', ['pendiente', 'en_proceso', 'terminado'])->default('pendiente');
        $table->dateTime('fecha_ingreso');
        $table->dateTime('fecha_entrega')->nullable();
        $table->decimal('costo_total', 10, 2)->default(0);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
