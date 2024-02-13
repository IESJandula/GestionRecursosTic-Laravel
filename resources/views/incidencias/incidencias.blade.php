@extends('index')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Añadir Nueva Ubicación</h5>
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
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Lista de Mantenimientos</h5>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mantenimientos as $mantenimiento)
                                <tr>
                                    <td>{{ $mantenimiento->tipo_mantenimiento }}</td>
                                    <td>{{ $mantenimiento->ticket_id }}</td>
                                    <td>{{ $mantenimiento->dispositivo_id }}</td>
                                    <td>{{ $mantenimiento->fecha_inicio }}</td>
                                    <td>{{ $mantenimiento->fecha_fin }}</td>
                                    <td>{{ $mantenimiento->asignacion_equipo_mantenimiento }}</td>
                                    <td>{{ $mantenimiento->estado }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Agrega cualquier otro contenido adicional que necesites -->
@endsection