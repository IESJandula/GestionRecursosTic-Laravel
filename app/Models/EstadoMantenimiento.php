<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoMantenimiento extends Model
{
    protected $table = 'estado_mantenimientos';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }
}
