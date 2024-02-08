@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Lista de Dispositivos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tipo de Dispositivo</th>
                                <th>Número de Serie</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Fecha de Adquisición</th>
                                <th>Estado</th>
                                <th>Observacion</th>
                                <th>Ubicación</th>
                                <th>Código de Barras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dispositivos as $dispositivo)
                                <tr>
                                    <td>{{ $dispositivo->tipo_dispositivo }}</td>
                                    <td>{{ $dispositivo->num_serie }}</td>
                                    <td>{{ $dispositivo->modelo }}</td>
                                    <td>{{ $dispositivo->marca }}</td>
                                    <td>{{ $dispositivo->fecha_adquisicion }}</td>
                                    <td>{{ $dispositivo->estado }}</td>
                                    <td>{{ $dispositivo->observaciones }}</td>
                                    <td>{{ $dispositivo->ubicacion_id }}</td>
                                    <td>{{ $dispositivo->cod_barras }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ Fin de ejemplo de maquetacion de contenido -->
@endsection

