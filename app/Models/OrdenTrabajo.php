<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $fillable = [
        'vehiculo_id',
        'descripcion',
        'fecha_ingreso',
        'estado',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}