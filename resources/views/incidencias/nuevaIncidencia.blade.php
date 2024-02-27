@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center"> <!-- Centra el contenido horizontalmente -->
            <div class="col-md-12">
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
                            <a href="{{url('login')}}" class="btn btn-danger">Volver a inicio</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

