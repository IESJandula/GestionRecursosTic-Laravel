@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">DISPOSITIVOS DAÑADOS</h5>
              </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                @foreach( $contados as $tipo => $cantidad )
                                <th>{{$tipo}} <span>{{$cantidad}}</span></th>

                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <form action="{{ route('filtrar-por-tipo') }}" method="GET">

                                @csrf
                                <tr>
                                    <td>
                                        <label for="tipo">Filtrar por nombre: </label>
                                        <select name="tipo" id="tipo">
                                                <option value="todos">Todos</option>
                                            @foreach($contados as $tipo => $cantidad)
                                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit">Filtrar</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                                <th>LOCALIZACION</th>
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
                                    
                                    <td>{{ $dispositivo->nombreubicacion }}</td>
                                    <!-- Cambiar a reparado -->
                                    <td><a href="{{ route('reparar', ['id' => $dispositivo->id]) }}">Cambiar a reparado</a></td>
                                    <!-- Cambiar a desechado -->
                                    <td><a href="{{ route('desechar', ['id' => $dispositivo->id]) }}">Cambiar a desechado</a></td>

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