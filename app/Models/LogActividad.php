<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActividad extends Model
{
    use HasFactory;

    protected $table='logActividades';


    protected $fillable = [
        'usuarioID',
        'fechaRegistro',
        'ActividadRealizada',
    ];
}
