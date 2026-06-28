<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'patente',
        'anio',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function ordenesTrabajo()
    {
        return $this->hasMany(OrdenTrabajo::class);
    }
}