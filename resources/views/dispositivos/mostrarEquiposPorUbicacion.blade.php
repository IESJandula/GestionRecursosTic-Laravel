@extends('index')

@section('content')

    <div class="col-md-12 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Nombre Ubicación</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('ubicaciones.mostrarEquiposPorUbicacion') }}" method="GET">
                    <div class="mb-3">
                        <label for="ubicacion">Selecciona una ubicación:</label>
                        <select name="ubicacion" id="ubicacion" class="form-control">
                            <option value="">Seleccionar...</option>
                            @foreach($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre_ubicacion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mostrar</button>
                </form>
            </div>
        </div>
    </div>

    @if($dispositivos->isNotEmpty())
    <div class="col-md-12 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Dispositivos de la Ubicación Seleccionada</h5>
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
                                <th>Estado</th>
                                <th>Observacion</th>
                                <th>Codigo De Barras</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dispositivos as $dispositivo)
                                <tr>
                                    <!-- Mostrar los detalles del dispositivo -->
                                    <td>{{ $dispositivo->tipo_dispositivo }}</td>
                                    <td>{{ $dispositivo->num_serie }}</td>
                                    <td>{{ $dispositivo->modelo }}</td>
                                    <td>{{ $dispositivo->marca }}</td>
                                    <td>{{ $dispositivo->estado }}</td>
                                    <td>{{ $dispositivo->observaciones }}</td>
                                    <td>{{ $dispositivo->cod_barras }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    
@endsection
