@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Columna para añadir nueva incidencia -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Añadir Nueva Incidencia</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mantenimientos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="tipo_mantenimiento" class="form-label">Tipo de Mantenimiento</label>
                                <input type="text" class="form-control" id="tipo_mantenimiento" name="tipo_mantenimiento"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="ticket_id" class="form-label">ID del Ticket</label>
                                <input type="text" class="form-control" id="ticket_id" name="ticket_id" required>
                            </div>
                            <div class="mb-3">
                                <label for="dispositivo_id" class="form-label">ID del Dispositivo</label>
                                <input type="text" class="form-control" id="dispositivo_id" name="dispositivo_id"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="asignacion_equipo_mantenimiento_id" class="form-label">Asignación Equipo
                                    Mantenimiento</label>
                                <input type="text" class="form-control" id="asignacion_equipo_mantenimiento_id"
                                    name="asignacion_equipo_mantenimiento_id">
                            </div>
                            <!-- Los campos de fecha_inicio y fecha_fin se crearán automáticamente en el controlador -->
                            <input type="hidden" name="fecha_inicio" value="{{ now() }}">
                            <input type="hidden" name="fecha_fin" value="">
                            <div class="mb-3">

                                <input type="hidden" class="form-control" id="estado" name="estado" value="Abierta"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Columna para mostrar la lista de mantenimientos -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Lista de Mantenimientos</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tipo de Mantenimiento</th>
                                        <th>Ticket ID</th>
                                        <th>Dispositivo ID</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Fin</th>
                                        <th>Asignación Equipo Mantenimiento</th>
                                        <th>Estado</th>
                                        <th colspan="2">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mantenimientos as $mantenimiento)
                                        <tr>
                                            <td>{{ $mantenimiento->tipo_mantenimiento }}</td>
                                            <td>{{ $mantenimiento->ticket_id }}</td>
                                            <td>{{ $mantenimiento->dispositivo_id }}</td>
                                            <td>{{ $mantenimiento->fecha_inicio }}</td>
                                            <td>{{ $mantenimiento->fecha_fin }}</td>
                                            <td>{{ $mantenimiento->asignacion_equipo_mantenimiento }}</td>
                                            <td>{{ $mantenimiento->estado }}</td>
                                            <td>
                                                <form action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </td>
                                            <td>
                                                <form action="{{ route('mantenimientos.edit', $mantenimiento->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm">Modificar</button>
                                                </form>
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
