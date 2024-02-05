<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenciaSoftware extends Model
{
    protected $table = 'licencias_software';

    protected $fillable = [
        'nombre_software',
        'fecha_adquisicion',
        'fecha_renovacion',
        'descripcion'
    ];
}
