@extends('index')

@section('content')
    <!-- Formulario de edición de ubicación -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Editar Ubicación</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('ubicaciones.update', $ubicacion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Ubicación</label>
                        <input type="text" class="form-control" id="nombre" name="nombre_ubicacion" value="{{ $ubicacion->nombre_ubicacion }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $ubicacion->descripcion }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin del formulario de edición de ubicación -->
@endsection

