
@extends('layouts/master')

@section('hojas-estilo')
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
@endsection

@section('contenido-principal')

<div class="p-2">
    <div class="row">
        <div class="col">
            <h3> Cita</h3>
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
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th colspan="3">Opciones</th>
                    </tr>
                </thead>
                @foreach ($citas as $ct)
                    <tr>
                        <td>
                            {{$ct->tipo_servicio}}
                        </td>
                        <td>
                            {{$ct->fecha}}
                        </td>
                        <td>
                            {{$ct->hora}}
                        </td>
                        <td>
                            {{$ct->descripcion}}
                        </td>
                        <td>
                            {{$ct->estado}}
                        </td>  
                        <td class="text-center" style="width: 1rem">
                            <form method="POST" action="{{route('citas.destroy',$ct->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-center" style="width: 1rem">
                            <a href="{{route("citas.edit",$ct->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Cliente">
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
                        <form method="POST" action="{{route("citas.store")}}">

                        @error('rut_cliente')
                            <div class="alert alert-danger">{{ 'El cliente es requerido' }}</div>
                        @enderror
                
                        @error('tipo_servicio')
                            <div class="alert alert-danger">{{ 'El servicio es requerido' }}</div>
                        @enderror
                        @error('fecha')
                        <div class="alert alert-danger">{{ 'La fecha es requerida' }}</div>
                        @enderror
                        @error('hora')
                        <div class="alert alert-danger">{{ 'La hora es requerida' }}</div>
                        @enderror
                        @error('descripcion')
                        <div class="alert alert-danger">{{ 'La descripcion es requerida' }}</div>
                        @enderror
                            @csrf
                            
                        <label for="rut_cliente">Cliente:</label>
                        <select name="rut_cliente" id="rut_cliente">
                            <optgroup label="Clientes inscritos">
                            <option ></option>
                                @foreach ($clientes as $cl)

                                    <option value="{{$cl->rut}}">{{$cl->nombre}}</option>

                                @endforeach
                            </optgroup>
                
                        </select>
                        <label for="tipo_servicio">Servicio:</label>
                        <select name="tipo_servicio" id="tipo_servicio" >
                          <optgroup label="Servicios disponibles">
                            <option></option>
                            @foreach ($servicios as $sv)
          
                            <option value="{{$sv->tipo_servicio}}">{{$sv->tipo_servicio}}</option>
          
                            @endforeach
                          </optgroup>
                          
                        </select>
                            <div class="form-group">
                                <label for="fecha">Fecha: </label>
                                <input type="date" id = "fecha" name="fecha" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora: </label>
                                <input type="time" id = "hora" name="hora" class="form-control" value="">
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
    $(function alert(){
        console.log('click')
    })
</script>
@endsection