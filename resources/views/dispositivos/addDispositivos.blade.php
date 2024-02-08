@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="card-title m-0 me-2">Añadir nuevo dispositivo</h1>
            </div>
            <div class="card-body">

                <form action="{{ url('addNew') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre">Tipo de dispositivo:</label>
                                <select name="tipo_dispositivo" id="tipo_dispositivo" class="form-control" required>
                                    @foreach($tiposDispositivos as $tipoDispositivo)
                                        <option value="{{ $tipoDispositivo->id }}">{{ $tipoDispositivo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="marca">Número de serie:</label>
                                <input type="text" name="num_serie" id="num_serie" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="modelo">Modelo:</label>
                                <input type="text" name="modelo" id="modelo" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">     
                            <div class="col-md-4">
                                <label for="marca">Marca:</label>
                                <input type="text" name="marca" id="marca" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label for="fecha">Fecha de adquisición:</label>
                                <input type="date" id="fecha_adquisicion" name="fecha_adquisicion" class="form-control" required>
                                <input type="hidden" name="estado" id="estado" value="0">
                            </div>
                            <div class="col-md-2">
                                <label for="ubicacion_id">Ubicación:</label>
                                <select name="ubicacion_id" id="ubicacion_id" class="form-control" required>
                                    @foreach($ubicaciones as $ubicacion)
                                        <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre_ubicacion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="cod_barras">Código de barras:</label>
                                <input type="text" name="cod_barras" id="cod_barras" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="observaciones">Observaciones:</label>
                                <textarea name="observaciones" id="observaciones" class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!--BOTONES DE ENIVAR Y ELINIMAR-->
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            <div class="col-md-1">
                                <a href="{{ url('stock') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ Fin de ejemplo de maquetacion de contenido -->
@endsection
