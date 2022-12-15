@extends('layouts.master')

@section('contenido-principal')
<h3>Editar Cita de <?php foreach ($clientes as $cl) {
    if ($evento->clientes == $cl->rut) {
        echo $cl->nombre;
    }}?></h3>
<hr>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Formulario de edición</div>
        <div class="card-body">
            <form method="POST" action="{{route('eventos.update',$evento->id)}}" enctype="multipart/form-data">

                @error('clientes')
                        <div class="alert alert-danger">{{ 'El cliente es requerido' }}</div>
                    @enderror
            
                    @error('title')
                        <div class="alert alert-danger">{{ 'El servicio es requerido' }}</div>
                    @enderror
                    @error('start')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('end')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('descripcion')
                    <div class="alert alert-danger">{{ 'La descripcion es requerida' }}</div>
                    @enderror


                @csrf
                @method('put')
                <div class="form-group">
                <label for="clientes">Cliente:</label>
                        <select name="clientes" id="clientes">
                            <optgroup label="Clientes inscritos">
                            <option value="{{$evento->clientes}}"><?php foreach ($clientes as $cl) {
                                if ($evento->clientes == $cl->rut) {
                                    echo $cl->nombre;
                                }
                                
                            }?></option>
                                <option value="<?php foreach ($clientes as $cl) {
                                    if ($evento->clientes != $cl->rut) {
                                        echo $cl->rut;
                                    }
                                    else {
                                        
                                    }
                                    
                                }?>"><?php foreach ($clientes as $cl) {
                                if ($evento->clientes != $cl->rut) {
                                    echo $cl->nombre;
                                }
                                
                            }?></option>
                            </optgroup>
                
                        </select>
                </div>
                <div class="form-group">
                    <label for=""></label>
                </div>
                <div class="form-group">
                    <label for="title">Servicio:</label>
                        <select name="title" id="title" >
                          <optgroup label="Servicios disponibles">
                            <option value="{{$evento->title}}">{{$evento->title}}</option>
                            <option value="<?php foreach ($servicios as $sv) {
                                if ($evento->title != $sv->tipo_servicio) {
                                    echo $sv->tipo_servicio;
                                }
                                else {
                                    
                                }
                                
                            }?>"><?php foreach ($servicios as $sv) {
                                if ($evento->title != $sv->tipo_servicio) {
                                    echo $sv->tipo_servicio;
                                }
                                
                            }?></option>
                          </optgroup>
                          
                        </select>
                </div>
                <div class="form-group">
                    <label for="start">Inicio: </label>
                    <input type="datetime-local" id = "start" name="start" class="form-control"  value="{{$evento->start}}">
                </div>
                <div class="form-group">
                    <label for="end">Termino: </label>
                    <input type="datetime-local" id = "end" name="end" class="form-control" value="{{$evento->end}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion: </label>
                    <input type="text" id = "descripcion" name="descripcion" class="form-control" value="{{$evento->descripcion}}">
                </div>
                <div class="form-group">
                    <label for="estado">Estado: </label>
                    <select name="estado" id="estado">
                        <option value="{{$evento->estado}}">{{$evento->estado}}</option>
                        <option value="<?php if ($evento->estado == 'completado') {
                            echo 'espera';
                        }else {
                            echo 'completado';
                        }?>"><?php if ($evento->estado == 'completado') {
                            echo 'espera';
                        }else {
                            echo 'completado';
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
    <a href="{{route('eventos.index')}}" class="btn btn-info">Volver a Cita</a>
</div>
</div>
@endsection