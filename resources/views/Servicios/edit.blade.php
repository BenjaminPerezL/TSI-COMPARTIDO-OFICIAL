@extends('layouts.master')

@section('contenido-principal')
<h3>Editar Servicio {{$servicio->tipo_servicio}}</h3>
<hr>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Formulario de edición</div>
        <div class="card-body">
            <form method="POST" action="{{route('servicios.update',$servicio->id)}}" enctype="multipart/form-data">
                @error('tipo_servicio')
                    <div class="alert alert-danger">{{ 'El Tipo de servicio debe ingresarse' }}</div>
                @enderror
                @error('duracion_estandar')
                    <div class="alert alert-danger">{{ 'La duracion estandar del servicio debe ingresarse'}}</div>
                @enderror
                @error('valor_estandar')
                    <div class="alert alert-danger">{{ 'El valor estandar del servicio debe ingresarse'}}</div>
                 @enderror

                @csrf
                @method('put')
                <div class="form-group">
                    <label for="tipo_servicio">Tipo Servicio:</label>
                    <input type="text" id="tipo_servicio" name="tipo_servicio" class="form-control"
                        value="{{$servicio->tipo_servicio}}">
                </div>
                <div class="form-group">
                    <label for="valor_estandar">Valor Estandar:</label>
                    <input type="number" id="valor_estandar" name="valor_estandar" class="form-control" value="{{$servicio->valor_estandar}}">
                </div>
                <div class="form-group">
                    <label for="duracion_estandar">Duracion Estandar:</label>
                    <input type="number" id="duracion_estandar" name="duracion_estandar" class="form-control" min="1" max="99"
                        value="{{$servicio->duracion_estandar}}">
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                            <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
                        </div>
                        <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                            <button type="submit" class="btn btn-info btn-block">Editarrrrr</button>
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
    <a href="{{route('servicios.index')}}" class="btn btn-info">Volver a Servicios</a>
</div>
</div>
@endsection