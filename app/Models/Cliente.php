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
        'user_id',
    ];
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
