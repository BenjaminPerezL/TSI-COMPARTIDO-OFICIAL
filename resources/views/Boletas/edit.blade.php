@extends('layouts.master')

@section('contenido-principal')
<h3>Editar Boleta {{$boleta_cita->id_cita}}</h3>
<hr>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Formulario de edición</div>
        <div class="card-body">
            <form method="POST" action="{{route('boletas.update',$boleta_cita->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="id_cita">Id_cita</label>
                    <input type="text" id="id_cita" name="id_cita" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cantidad_pagada">Cantidad pagada:</label>
                    <input type="text" id="cantidad_pagada" name="cantidad_pagada" class="form-control">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id = "descripcion" name="descripcion" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tipo_de_pago">Tipo de pago:</label>
                    <select name="tipo_de_pago" id="tipo_de_pago">
                        <option value="tarjeta">Tarjeta</option>
                        <option value="efectivo">Efectivo</option>
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
    <a href="{{route('boletas.index')}}" class="btn btn-info">Volver a Boletas</a>
</div>
</div>
@endsection