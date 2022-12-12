@extends('layouts.master')

@section('contenido-principal')
<h3>Editar Cita {{$cita->rut_cliente}}</h3>
<hr>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Formulario de edición</div>
        <div class="card-body">
            <form method="POST" action="{{route('citas.update',$cita->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="rut_cliente">Rut: </label>
                    <input type="text" id="rut_cliente" name="rut_cliente" class="form-control" value="{{$cita->rut_cliente}}">
                </div>
                <div class="form-group">
                    <label for="tipo_servicio">Tipo de servicio: </label>
                    <input type="text" id="tipo_servicio" name="tipo_servicio" class="form-control" value="{{$cita->tipo_servicio}}">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha: </label>
                    <input type="date" id = "fecha" name="fecha" class="form-control" value="{{$cita->fecha}}">
                </div>
                <div class="form-group">
                    <label for="hora">Hora: </label>
                    <input type="time" id = "hora" name="hora" class="form-control" value="{{$cita->hora}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion: </label>
                    <input type="text" id = "descripcion" name="descripcion" class="form-control" value="{{$cita->descripcion}}">
                </div>
                <div class="form-group">
                    <label for="estado">Estado: </label>
                    <select name="estado" id="estado">
                        <option value="espera">Espera</option>
                        <option value="completado">Completado</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                            <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
                        </div>
                        <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                            <button type="submit" class="btn btn-info btn-block">Editar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/form edicion-->
</div>

<div class="row">
<div class="col">
    <a href="{{route('citas.index')}}" class="btn btn-info">Volver a Cita</a>
</div>
</div>
@endsection