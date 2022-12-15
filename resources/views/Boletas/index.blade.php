@extends('layouts/master')

@section('hojas-estilo')
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
@endsection

@section('contenido-principal')

<div class="p-2">
    <div class="row">
        <div class="col">
            <h3>Boleta cita</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8">


            {{-- ------------ LISTA BOLETAS -------------}}
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Pago</th>
                        <th>Descripcion</th>
                        <th>Tipo de pago</th>
                    </tr>
                </thead>
                @foreach ($boletas_cita as $bct)
                    <tr>
                        <td>
                            {{$bct->cantidad_pagada}}
                        </td>
                        <td>
                            {{$bct->descripcion}}
                        
                        </td>
                        <td>
                            {{$bct->tipo_de_pago}}
                        </td>

        {{-- ------------BOTONES LISTADO -------------}}
                        <td class="text-center" style="width: 1rem">
                            <form method="POST" action="{{route('boletas.destroy',$bct->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="far fa-trash-alt"></i>

                                </button>
                            </form>
                            
                        </td>
                        <td class="text-center" style="width: 1rem">
                            <a href="{{route("boletas.edit",$bct->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar cita">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>

{{-- ------------------------------NUEVA BOLETA ------------------------------------}}

        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Agregar Boleta
                    <div class="card-body">
                        <form method="POST" action="{{route("boletas.store")}}">
                            <form method="POST" action="{{route("eventos.store")}}">

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
                            <label for="id_cita">Id:</label>
                            <select name="id_cita" id="id_cita">
                                <optgroup label="Clientes inscritos">
                                <option ></option>
                                    @foreach ($eventos as $ev)
                                        <option value="{{$ev->id}}">{{$ev->id}}</option>
                                    @endforeach
                                </optgroup>
            
                            </select>
                            <div class="form-group">
                                <label for="cantidad_pagada">Cantidad pagada:</label>
                                <input type="text" id="cantidad_pagada" name="cantidad_pagada" class="form-control" >
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
                                <button class="btn btn-info">Aceptar</button>
                                <button class="btn btn-warning" type="reset">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
            
            
@section('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection