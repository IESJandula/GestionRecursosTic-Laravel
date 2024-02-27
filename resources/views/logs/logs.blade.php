@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="card-title m-0 me-2">Actividad general</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha Registro</th>
                                <th>Actividad Realizada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $registro)
                                <tr>
                                    <td>{{ $registro->FechaRegistro }}</td>
                                    <td>{{ $registro->ActividadRealizada }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ Fin de ejemplo de maquetacion de contenido -->
@endsection
