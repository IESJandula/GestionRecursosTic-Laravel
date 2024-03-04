@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Columna para mostrar la lista de mantenimientos -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Lista de Mantenimientos</h5>
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
                                        <th colspan="3">Accion</th>
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
                                                @if ($mantenimiento->estado == 'Abierta')
                                                    <span class="btn btn-primary"
                                                        disabled>{{ $mantenimiento->estado }}</span>
                                                @elseif ($mantenimiento->estado == 'Inservible')
                                                    <span class="btn btn-danger"
                                                        disabled>{{ $mantenimiento->estado }}</span>
                                                @elseif ($mantenimiento->estado == 'Cerrada')
                                                    <span class="btn btn-success"
                                                        disabled>{{ $mantenimiento->estado }}</span>
                                                @else
                                                    {{ $mantenimiento->estado }}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}"
                                                    class="btn btn-primary">Editar</a>
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
