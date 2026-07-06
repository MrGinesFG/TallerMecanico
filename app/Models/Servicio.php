<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios2';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_base'
    ];

    public function ordenes()
    {
        return $this->belongsToMany(
            OrdenTrabajo::class,
            'orden_servicios2',
            'orden_trabajo_id',
            'servicios2_id'
        );
    }
}
