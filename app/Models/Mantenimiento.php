<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos';

    protected $fillable = [
        'tipo_mantenimiento',
        'ticket_id',
        'dispositivo_id',
        'fecha_inicio',
        'fecha_fin',
        'asignacion_equipo_mantenimiento',
        'estado'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function asignacionEquipoMantenimiento()
    {
        return $this->belongsTo(AsignacionEquipoMantenimiento::class);
    }

}
