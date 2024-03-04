@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Añadir Nueva Ubicación</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('crearUbicacion') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Ubicación</label>
                                <input type="text" class="form-control" id="nombre" name="nombre_ubicacion" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h1 class="card-title m-0 me-2">Listado de Ubicaciones</h1> 
                        <form action="{{ route('ubicaciones.mostrarEquiposPorUbicacion') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-info">Mostrar Equipos</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ubicaciones as $ubicacion)
                                        <tr>
                                            <td>{{ $ubicacion->nombre_ubicacion }}</td>
                                            <td>{{ $ubicacion->descripcion }}</td>
                                            <td>
                                                <a href="{{ route('ubicaciones.edit', $ubicacion->id) }}" class="btn btn-primary">Editar</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('ubicaciones.destroy', $ubicacion->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                            <td>
                                                
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
