@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Columna para mostrar la lista de mantenimientos -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Lista de Mantenimientos</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Descripcion problema</th>
                                        <th>Ticket ID</th>
                                        <th>Dispositivo ID</th>
                                        <th>Fecha de Solicitud</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mantenimientos as $mantenimiento)
                                        <tr>
                                            <td>{{ $mantenimiento->descripcion_problema }}</td>
                                            <td>{{ $mantenimiento->id }}</td>
                                            <td>{{ $mantenimiento->dispositivo_id }}</td>
                                            <td>{{ $mantenimiento->fecha_solicitud }}</td>
                                            <td>
                                                <span class="badge bg-danger">AVERIADO</span>
                                            </td>
                                            <td>
                                                <a href="{{ url('/dispositivos-averiados') }}"
                                                    class="btn btn-primary">Actualizar estado</a>
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
