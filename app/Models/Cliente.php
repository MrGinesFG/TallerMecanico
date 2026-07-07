<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
    ];
    public function vehiculos()
<<<<<<< HEAD:app/Models/Client.php
{
    return $this->hasMany(Vehiculo::class);
}

}
=======
    {
        return $this->hasMany(Vehiculo::class);
    }

}
>>>>>>> dvlp/GinesFabrizio:app/Models/Cliente.php
