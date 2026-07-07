<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class OrdenTrabajo extends Model
{
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenTrabajo extends Model
{
    use HasFactory;

>>>>>>> dvlp/GinesFabrizio
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
<<<<<<< HEAD
}
=======
}

>>>>>>> dvlp/GinesFabrizio
