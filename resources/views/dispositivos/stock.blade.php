@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="card-title m-0 me-2">Listado de Dispositivos</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <a href="{{ url('nuevo-dispositivo') }}" class="btn btn-success">Añadir Nuevo</a>
                    <br>
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
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dispositivos as $dispositivo)
                                <tr>
                                    <td>
                                        @foreach($tipos_dispositivos as $tipoDispositivo)
                                            @if($dispositivo->tipo_dispositivo == $tipoDispositivo->id)
                                                {{ $tipoDispositivo->nombre }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $dispositivo->num_serie }}</td>
                                    <td>{{ $dispositivo->modelo }}</td>
                                    <td>{{ $dispositivo->marca }}</td>
                                    <td>{{ $dispositivo->fecha_adquisicion }}</td>
                                    <td>
                                        @if($dispositivo->estado == 0)
                                            <span class="badge bg-success">Nuevo</span>
                                        @else
                                            <span class="badge bg-danger">Averiado</span>
                                        @endif
                                    </td>
                                    <td>{{ $dispositivo->observaciones }}</td>
                                    <td>
                                        @foreach($ubicaciones as $ubicacion)
                                            @if($dispositivo->ubicacion_id == $ubicacion->id)
                                                {{ $ubicacion->nombre_ubicacion }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $dispositivo->cod_barras }}</td>
                                    <td><a href="" class="btn btn-primary">Editar</a></td>
                                    <td><a href="" class="btn btn-danger">Eliminar</a></td>
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
