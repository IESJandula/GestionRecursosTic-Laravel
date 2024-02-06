<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActividad extends Model
{

    protected $table = 'logActividades';

    protected $fillable = [
        'id',
        'FechaRegistro',
        'ActividadRealizada'
    ];
    
}
