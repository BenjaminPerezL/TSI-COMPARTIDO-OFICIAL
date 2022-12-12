@extends('layouts.master')

@section('contenido-principal')
<h3>Editar Cliente {{$cliente->nombre}}</h3>
<hr>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Formulario de edición</div>
        <div class="card-body">
            <form method="POST" action="{{route('clientes.update',$cliente->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        value="{{$cliente->nombre}}">
                </div>
                <div class="form-group">
                    <label for="rut">Rut:</label>
                    <input type="text" id="rut" name="rut" class="form-control" value="{{$cliente->rut}}">
                </div>
                <div class="form-group">
                    <label for="mail">Mail:</label>
                    <input type="text" id="mail" name="mail" class="form-control" min="1" max="99"
                        value="{{$cliente->mail}}">
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
    <a href="{{route('clientes.index')}}" class="btn btn-info">Volver a Clientes</a>
</div>
</div>
@endsection