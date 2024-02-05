<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDispositivo extends Model
{
    protected $table = "tipoDispositivos";
    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class);
    }
}
