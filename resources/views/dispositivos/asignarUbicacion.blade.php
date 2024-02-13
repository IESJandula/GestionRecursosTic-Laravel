@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-body">
                <form action="{{ route('asignar-ubicacion-nueva') }}" method="GET">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="tipo">Selecciona Ubicacion </label>
                                        <select name="ubicacion" id="ubicacion" class="form-control">
                                            <option value="todos">todos</option>
                                            @foreach($ubicaciones as $ubicacion)
                                                <option value="{{ $ubicacion->idubicacion }}">{{ $ubicacion->nombreubicacion }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger">Asignar nueva ubicacion</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                                                <th>UBICACION</th>
                                                <th>SELECCIONAR</th>
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
                                                    <td>{{ $dispositivo->nombreubicacion }}</td>
                                                    <!-- Seleccionar dispositivo-->
                                                    <td> <input type="checkbox" name="dispositivos_seleccionados[]" value="{{ $dispositivo->id }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
  
    
    <!--/ Fin de ejemplo de maquetacion de contenido -->
@endsection