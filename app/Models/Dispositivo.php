<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = "dispositivos";
    protected $fillable = [
        'tipo_dispositivo', 'num_serie', 'modelo', 'marca','fecha_adquisicion', 'estado', 'observaciones', 'ubicacion_id', 'cod_barras'
    ];

    public function tipoDispositivo()
    {
        return $this->belongsTo(TipoDispositivo::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
