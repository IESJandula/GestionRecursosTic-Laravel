@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->

    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>
                                <th>NUMERO DE SERIE</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dispositivos as $dispositivo)
                                <tr>
                                    <td>{{ $dispositivo->nombredispositivo }}</td>
                                    <td>{{ $dispositivo->descripcion }}</td>
                                    <td>{{ $dispositivo->num_serie }}</td>
                                    <td>{{ $dispositivo->marca }}</td>
                                    <td>{{ $dispositivo->modelo }}</td>
                                    <td @class(['averiado' => $dispositivo->nombreestado === 'averiado'])>
                                        {{ $dispositivo->nombreestado }}
                                    </td>
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