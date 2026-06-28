<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'patente',
        'anio',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function ordenesTrabajo()
    {
        return $this->hasMany(OrdenTrabajo::class);
    }
}


