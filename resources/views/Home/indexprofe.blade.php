@extends('layouts/master')

@section('hoja-estilos')
    
@endsection

@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Sistema de Campeonato de Fútbol</h3>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/equipos.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Equipos <span class="badge badge-info">17</span></h5>
                <div class="btn-group d-flex">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/estadio.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Estadios <span class="badge badge-info">10</span></h5>
                <div class="btn-group d-flex">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/estadisticas.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Estadísticas <span class="badge badge-info">3</span></h5>
                <div class="btn-group d-flex">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/jugadores.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Jugadores <span class="badge badge-info">224</span></h5>
                <div class="btn-group d-flex">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/partido.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Partidos <span class="badge badge-info">32</span></h5>
                <div class="btn-group d-flex">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
        <div class="card m-2">
            <img src="{{ asset('images/configuración.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Configuración</h5>
                <div class="btn-group d-flex">
                    <button class="btn btn-outline-success">Ver</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            
        