@extends('index')

@section('content')

<div class="col-md-6 order-2 m-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Agregar equipo</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('agregar.equipo') }}" method="post">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label for="nombre">Nombre del Equipo:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Agregar Equipo</button>
            </form>
        </div>
    </div>
</div>

<hr>

<!-- Lista de Tipos de Dispositivos -->
@if ($tiposDispositivos->isNotEmpty())
<div class="col-md-11.5 col-lg-11.5 order-2 m-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Lista de Dispositivos</h5>
        </div>
        
        <div class="card-body">
            <form action="{{ route('eliminar.tipos.dispositivos') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tiposDispositivos as $tipoDispositivo)
                                <tr>
                                    <td> 
                                        <input type="checkbox" name="tipos_seleccionados[]" value="{{ $tipoDispositivo->id }}">
                                    </td>
                                    <td>{{ $tipoDispositivo->nombre }}</td>
                                    <!-- Botón de editar -->
                                    <td>
                                        <form action="{{ route('editar.equipo') }}" method="POST">
                                            @csrf
                                            <!-- Campo oculto para identificar el equipo a editar -->
                                            <input type="hidden" name="equipo_id" value="{{ $tipoDispositivo->id }}">
                                            <!-- Botón de editar -->
                                            <button type="submit" name="editar_equipo" value="{{ $tipoDispositivo->id }}" class="btn btn-primary">Editar</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Formulario de edición -->
                                <tr>
                                    <td colspan="3">
                                        @if (session()->has('editandoEquipo') && session('editandoEquipo') == $tipoDispositivo->id)
                                            <form action="{{ route('guardar.cambios') }}" method="POST">
                                                @csrf
                                                <!-- Campos ocultos para identificar el equipo a editar -->
                                                <input type="hidden" name="equipo_id" value="{{ $tipoDispositivo->id }}">
                                                <!-- Campos de edición -->
                                                <input type="text" name="nombre_editado" value="{{ $tipoDispositivo->nombre }}">
                                                <input type="text" name="descripcion_editada" value="{{ $tipoDispositivo->descripcion }}">
                                                <button type="submit">Guardar Cambios</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-danger m-3">Eliminar</button>
            </form>
        </div>
    </div>
</div>
    
@else
    <p>No hay tipos de dispositivos disponibles.</p>
@endif



@endsection
