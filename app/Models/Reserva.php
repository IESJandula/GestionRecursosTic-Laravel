<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reserva";
    protected $fillable = [
        'usuario', 
        'dispositivo_id', 
        'fecha_reserva',
        'motivo_reserva'
    ];

    public function dispositivoId()
    {
        return $this->belongsTo(Dispositivo::class);
    }

}
