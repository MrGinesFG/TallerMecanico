<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Vehiculo extends Model
{
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculo extends Model
{
    use HasFactory;

>>>>>>> dvlp/GinesFabrizio
    protected $fillable = [
        'marca',
        'modelo',
        'patente',
        'anio',
<<<<<<< HEAD
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
=======
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
>>>>>>> dvlp/GinesFabrizio
    }

    public function ordenesTrabajo()
    {
        return $this->hasMany(OrdenTrabajo::class);
    }
<<<<<<< HEAD
}
=======
}


>>>>>>> dvlp/GinesFabrizio
