@extends('layouts/master')

@section('hojas-estilo')
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
@endsection

@section('contenido-principal')

<div class="p-2">
    <div class="row">
        <div class="col">
            <h3> Servicios</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo Servicio</th>
                        <th>Duracion Estandar</th>
                        <th>Valor Estandar</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                @foreach ($servicios as $sv)
                    <tr>
                        <td>
                            {{$sv->id}}
                        </td>
                        <td>
                            {{$sv->tipo_servicio}}
                        
                        </td>
                        <td>
                            {{$sv->duracion_estandar}}m
                        </td>
                         <td>
                            ${{$sv->valor_estandar}}
                         </td>
                         <td class="text-center" style="width: 1rem">
                            <form method="POST" action="{{route('servicios.destroy',$sv->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="far fa-trash-alt"></i>

                                </button>
                            </form>
                            
                        </td>
                        <td class="text-center" style="width: 1rem">
                            <a href="{{route("servicios.edit",$sv->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Servicio">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        
                    </tr>
                    @endforeach
            </table>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Agregar Servicio
                    <div class="card-body">
                        <form method="POST" action="{{route("servicios.store")}}">

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
                            <div class="form-group">
                                <label for="tipo_servicio">Tipo servicio:</label>
                                <input type="text" id="tipo_servicio" name="tipo_servicio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="duracion_estandar">Duracion Estandar:</label>
                                <input type="text" id="duracion_estandar" name="duracion_estandar" class="form-control" value="30">
                            </div>
                            <div class="form-group">
                                <label for="valor_estandar">Valor Estandar:</label>
                                <input type="text" id = "valor_estandar" name="valor_estandar" class="form-control">
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