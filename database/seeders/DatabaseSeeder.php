<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dispositivo;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Crear dispositivos de ejemplo
        $dispositivos = [
            [
                'tipo_dispositivo' => '1',
                'num_serie' => '123456',
                'modelo' => 'Modelo 1',
                'marca' => 'Marca 1',
                'fecha_adquisicion' => now(),
                'estado' => '1',
                'observaciones' => 'Observación 1',
                'ubicacion_id' => 1,
                'cod_barras' => 'ABCDE'
            ],
            [
                'tipo_dispositivo' => '2',
                'num_serie' => '789012',
                'modelo' => 'Modelo 2',
                'marca' => 'Marca 2',
                'fecha_adquisicion' => now(),
                'estado' => '0',
                'observaciones' => 'Observación 2',
                'ubicacion_id' => 2,
                'cod_barras' => 'FGHIJ'
            ],
            // Agrega más dispositivos según sea necesario
        ];

        // Iterar sobre los dispositivos y guardarlos en la base de datos
        foreach ($dispositivos as $dispositivoData) {
            Dispositivo::create($dispositivoData);
        }
    }
}
