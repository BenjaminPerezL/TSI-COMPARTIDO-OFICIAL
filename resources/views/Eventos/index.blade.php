@extends('layouts/master')

@section('hojas-estilo')
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
@endsection

@section('contenido-principal')

<div class="p-2">
    <div class="row">
        <div class="col">
            <h3>Citas</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tipo de servicio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cliente</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th colspan="3">Opciones</th>
                    </tr>
                </thead>
                @foreach ($eventos as $ev)
                <tr>
                    <td>
                        {{$ev->title}}
                    </td>
                    <td>
                        {{substr($ev->start,0,10)}}
                    </td>
                    <td>
                        {{substr($ev->start,11,14)}}
                    </td>
                    <td>
                        <?php
                            foreach ($clientes as $cl) {
                                if ($ev->clientes == $cl->rut) {
                                    echo $cl->nombre;
                                }
                            }
                        ?>
                    
                    </td>
                    <td>
                        {{$ev->descripcion}}
                    </td>
                    <td>
                        {{$ev->estado}}
                    </td>  
                    <td class="text-center" style="width: 1rem">
                        <form method="POST" action="{{route('eventos.destroy',$ev->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center" style="width: 1rem">
                        <a href="{{route('eventos.edit',$ev->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Cliente">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    
                    <td class="text-center" style="width: 1rem">
                        <a href="{{route("boletas.index",$ev->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Crear boleta">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-4">
        <div class="card">
            {{ csrf_field() }}
            <div class="card-header">
                Agregar Cita
                <div class="card-body">
                    <form method="POST" action="{{route("eventos.store")}}">

                    @error('clientes')
                        <div class="alert alert-danger">{{ 'El cliente es requerido' }}</div>
                    @enderror
            
                    @error('title')
                        <div class="alert alert-danger">{{ 'El servicio es requerido' }}</div>
                    @enderror
                    
                    @error('descripcion')
                    <div class="alert alert-danger">{{ 'La descripcion es requerida' }}</div>
                    @enderror
                        @csrf
                        <div class="form-group d-none">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"> </small>
                          </div>
                    <label for="clientes">Cliente:</label>
                    <select name="clientes" id="clientes">
                        <optgroup label="Clientes inscritos">
                        <option ></option>
                            @foreach ($clientes as $cl)

                                <option value="{{$cl->rut}}">{{$cl->nombre}}</option>

                            @endforeach
                        </optgroup>
            
                    </select>
                    <label for="title">Servicio:</label>
                    <select name="title" id="title" >
                      <optgroup label="Servicios disponibles">
                        <option></option>
                        @foreach ($servicios as $sv)
      
                        <option value="{{$sv->tipo_servicio}}">{{$sv->tipo_servicio}}</option>
      
                        @endforeach
                      </optgroup>
                      
                    </select>
                        <div class="form-group">
                            <label for="start">start: </label>
                            <input type="datetime-local" id = "start" name="start" class="form-control" min="2013-10-08T12:05:00" max="2024-10-08T12:05:00">
                        </div>
                        <div class="form-group">
                            <label for="end">end: </label>
                            <input type="datetime-local" id = "end" name="end" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion: </label>
                            <input type="text" id = "descripcion" name="descripcion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado: </label>
                            <select name="estado" id="estado">
                                <option value="completado">Completado</option>
                                <option value="espera">Espera</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Aceptar</button>

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