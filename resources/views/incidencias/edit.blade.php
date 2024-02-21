@extends('index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Editar Mantenimiento</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('mantenimientos.update', $mantenimiento->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="tipo_mantenimiento">Tipo de Mantenimiento</label>
                            <input type="text" class="form-control" id="tipo_mantenimiento" name="tipo_mantenimiento" value="{{ $mantenimiento->tipo_mantenimiento }}">
                        </div>

                        <div class="form-group">
                            <label for="ticket_id">Ticket ID</label>
                            <input type="text" class="form-control" id="ticket_id" name="ticket_id" value="{{ $mantenimiento->ticket_id }}">
                        </div>

                        <div class="form-group">
                            <label for="dispositivo_id">Dispositivo ID</label>
                            <input type="text" class="form-control" id="dispositivo_id" name="dispositivo_id" value="{{ $mantenimiento->dispositivo_id }}">
                        </div>

                        <div class="form-group">
                            <label for="fecha_inicio">Fecha de Inicio</label>
                            <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $mantenimiento->fecha_inicio }}">
                        </div>

                        <div class="form-group">
                            <label for="fecha_fin">Fecha de Fin</label>
                            <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $mantenimiento->fecha_fin }}">
                        </div>

                        <div class="form-group">
                            <label for="asignacion_equipo_mantenimiento">Asignación Equipo Mantenimiento</label>
                            <input type="text" class="form-control" id="asignacion_equipo_mantenimiento" name="asignacion_equipo_mantenimiento" value="{{ $mantenimiento->asignacion_equipo_mantenimiento }}">
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="Abierta" {{ $mantenimiento->estado === 'Abierta' ? 'selected' : '' }}>Abierta</option>
                                <option value="Cerrada" {{ $mantenimiento->estado === 'Cerrada' ? 'selected' : '' }}>Cerrada</option>
                                <option value="Inservible" {{ $mantenimiento->estado === 'Inservible' ? 'selected' : '' }}>Inservible</option>
                            </select>
                        </div>

                        <!-- Puedes agregar más campos aquí según sea necesario -->

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
