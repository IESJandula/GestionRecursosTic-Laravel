
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="card-title m-0 me-2">Añadir nuevo dispositivo </h1>
            </div>
            <div class="card-body">

                <form action="{{ route('incidenciaNueva') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <label for="nombre">Usuario:</label>
                                <select name="usuario_id" id="usuario_id" class="form-control" required>
                                    <option value="1">Anónimo</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dispositivo">Dispositivo:</label>
                                <select name="dispositivo" id="dispositivo">
                                    @foreach($dispositivos as $dispositivo)
                                        <option value="{{ $dispositivo->id }}">{{ $dispositivo->id }} - {{ $dispositivo->nombre_tipo_dispositivo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dispositivo">Esatado Dispositivo:</label>
                                <select name="dispositivo" id="dispositivo">
                                    <option value="1">Averiado</option>
                                    <option value="1">Desechado</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="marca">Descripcion del problema: </label>
                                <textarea name="tipo_mantenimiento"></textarea>

                            </div>
                        </div>
                    </div>
                    <!--BOTONES DE ENIVAR Y ELINIMAR-->
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success">Crear Incidencia</button>
                            </div>
                            <div class="col-md-1">
                                <a href="{{ url('http://recursosticlaravel.test/public/login') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ Fin de ejemplo de maquetacion de contenido -->

