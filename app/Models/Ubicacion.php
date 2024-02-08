<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
    {
        
    protected $table = 'ubicaciones';

    protected $fillable = [
        'nombre_ubicacion',
        'descripcion'
    ];


    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class);
    }

}
