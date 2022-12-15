@extends('layouts.master')

@section('contenido-principal')
<h3>Editar Boleta {{$boleta_cita->id_cita}}</h3>
<hr>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Formulario de edición</div>
        <div class="card-body">
            <form method="POST" action="{{route('boletas.update',$boleta_cita->id)}}" enctype="multipart/form-data">
                @error('id_cita')
                                    <div class="alert alert-danger">{{ 'El id de la cita es nesesario' }}</div>
                                @enderror
                        
                                @error('cantidad_pagada')
                                    <div class="alert alert-danger">{{ 'Ingrese su pago' }}</div>
                                @enderror
                                
                                @error('descripcion')
                                <div class="alert alert-danger">{{ 'La descripcion es requerida' }}</div>
                                @enderror
                @csrf
                @method('put')
                <label for="id_cita">Cliente:</label>
                        <select name="id_cita" id="id_cita">
                            <optgroup label="Clientes inscritos">
                            <option value="{{$boleta_cita->id_cita}}"><?php foreach ($eventos as $ev) {
                                if ($boleta_cita->id_cita == $ev->id) {
                                    echo $ev->id;
                                }
                                
                            }?></option>
                                <option value="<?php foreach ($eventos as $ev) {
                                    if ($boleta_cita->id_cita != $ev->id) {
                                        echo $ev->id;
                                    }
                                    else {
                                        
                                    }
                                    
                                }?>"><?php foreach ($eventos as $ev) {
                                if ($boleta_cita->id_cita != $ev->id) {
                                    echo $ev->id;
                                }
                                
                            }?></option>
                            </optgroup>
                
                        </select>
                <div class="form-group">
                    <label for="cantidad_pagada">Cantidad pagada:</label>
                    <input type="text" id="cantidad_pagada" name="cantidad_pagada" class="form-control" value="{{$boleta_cita->cantidad_pagada}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id = "descripcion" name="descripcion" class="form-control" value="{{$boleta_cita->descripcion}}">
                </div>
                <div class="form-group">
                    <label for="tipo_de_pago">Tipo de pago:</label>
                    <select name="tipo_de_pago" id="tipo_de_pago">
                        <option value="{{$boleta_cita->tipo_de_pago}}">{{$boleta_cita->tipo_de_pago}}</option>
                        <option value="<?php if ($boleta_cita->tipo_de_pago == 'efectivo') {
                            echo 'tarjeta';
                        }else {
                            echo 'efectivo';
                        }?>"><?php if ($boleta_cita->tipo_de_pago == 'efectivo') {
                            echo 'tarjeta';
                        }else {
                            echo 'efectivo';
                        }?></option>
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