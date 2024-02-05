<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDispositivo extends Model
{
    protected $table = 'estado_dispositivos';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class);
    }
}
