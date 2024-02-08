<form action="{{ route('agregar.equipo') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre del Equipo:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Agregar Equipo</button>
</form>

<hr>

<!-- Lista de Tipos de Dispositivos -->
@if ($tiposDispositivos->isNotEmpty())
    <h3>Listado de Tipos de Dispositivos:</h3>
    <ul>
        @foreach ($tiposDispositivos as $tipoDispositivo)
        <li>
            {{ $tipoDispositivo->nombre }}
    
            <!-- Botón de editar -->
            <form action="{{ route('editar.equipo') }}" method="POST">
                @csrf
                <!-- Campo oculto para identificar el equipo a editar -->
                <input type="hidden" name="equipo_id" value="{{ $tipoDispositivo->id }}">
    
                <!-- Botón de editar -->
                <button type="submit" name="editar_equipo" value="{{ $tipoDispositivo->id }}">Editar</button>
            </form>
    
            <!-- Formulario de edición -->
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
        </li>
        @endforeach
    </ul>
@else
    <p>No hay tipos de dispositivos disponibles.</p>
@endif

<hr>

<!-- Formulario para eliminar dispositivos seleccionados -->
@if ($tiposDispositivos->isNotEmpty())
    <h3>Eliminar Dispositivos Seleccionados:</h3>
    <form action="{{ route('eliminar.tipos.dispositivos') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label>Selecciona los dispositivos a eliminar:</label><br>
            @foreach ($tiposDispositivos as $tipoDispositivo)
                <input type="checkbox" name="tipos_seleccionados[]" value="{{ $tipoDispositivo->id }}">
                <label>{{ $tipoDispositivo->nombre }}</label><br>
            @endforeach
        </div>
        <button type="submit" class="btn btn-danger">Eliminar Dispositivos Seleccionados</button>
    </form>
@endif