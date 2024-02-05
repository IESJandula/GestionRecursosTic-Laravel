<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketsMantenimiento extends Model
{
    protected $table = 'tickets_mantenimientos';

    protected $fillable = [
        'usuario_id',
        'dispositivo_id',
        'ubicacion_id',
        'fecha_solicitud',
        'descripcion_problema'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
