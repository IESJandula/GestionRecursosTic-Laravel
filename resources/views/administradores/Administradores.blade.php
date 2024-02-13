@extends('index')

@section('content')

<div class="col-md-6 order-2 m-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Agregar equipo</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('administradores.agregar') }}" method="post">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Agregar Administrador</button>
            </form>
        </div>
    </div>
</div>

<hr>

<!-- Lista de Tipos de Dispositivos -->
@if ($administradores->isNotEmpty())
<div class="col-md-11.5 col-lg-11.5 order-2 m-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Lista de Administradores</h5>
        </div>
        
        <div class="card-body">
            <form action="{{ route('administradores.eliminar') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($administradores as $administrador)
                                <tr>
                                    <td> 
                                        <input type="checkbox" name="administradores_seleccionados[]" value="{{ $administrador->id }}">
                                    </td>
                                    <td>{{ $administrador->nombre }}</td>
                                    <td>{{ $administrador->email }}</td>
                                    <td>
                                        <!-- Botón de editar -->
                                        {{-- <form action="{{ route('editar.administrador', $administrador->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </form> --}}
                                    </td>
                                </tr>
                                <!-- Fin del formulario de eliminación -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Botón de eliminar fuera del bucle -->
                <button type="submit" class="btn btn-danger m-3">Eliminar</button>
            </form>
        </div>
    </div>
</div>
    
@else
    <p>No hay administradores disponibles.</p>
@endif



@endsection
