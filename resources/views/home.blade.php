@extends('index')

@section('content')

    <div class="container">
        <h1 class="mt-4">Home</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="p-4">🖥️ Equipos disponibles</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h2 class="p-4">🚪Ubicaciones</h2>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="p-4"> ❌ Incidencias pendientes</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h2 class="p-4"> ✅ Incidencias resuletas </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
