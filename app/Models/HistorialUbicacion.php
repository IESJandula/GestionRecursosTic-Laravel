<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialUbicacion extends Model
{
    protected $table = 'historial_ubicaciones';

    protected $fillable = [
        'dispositivo_id',
        'ubicacion_id',
        'fecha_asignacion'
    ];

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
