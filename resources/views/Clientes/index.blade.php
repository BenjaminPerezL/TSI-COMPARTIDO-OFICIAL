@extends('layouts/master')

@section('hojas-estilo')
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
@endsection

@section('contenido-principal')

<div class="p-2">
    <div class="row">
        <div class="col">
            <h3> Clientes</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table table-bordered table-striped table-hover">
                
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Mail</th>
                        <th colspan="3">Opciones</th>
                    </tr>
                </thead>
                @foreach ($clientes as $cl)
                    <tr>
                        <td>
                            {{$cl->nombre}}
                        </td>
                        <td>
                            {{$cl->rut}}
                        
                        </td>
                        <td>
                            {{$cl->mail}}
                        </td>  
                        <td class="text-center" style="width: 1rem">
                            <form method="POST" action="{{route('clientes.destroy',$cl->rut)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="far fa-trash-alt"></i>

                                </button>
                            </form>
                            
                        </td>
                        <td class="text-center" style="width: 1rem">
                            <a href="{{route("clientes.edit",$cl->rut)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Cliente">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>

                        <?php
                    
                        ?>
                        <td class="text-center" style="width: 1rem">
                            <a  href="{{route("citas.index",)}}?" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Citas">
                                <i class="far fa-clock"></i>
                            </a >
                            


                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Agregar Cliente
                    <div class="card-body">
                        <form method="POST" action="{{route("clientes.store")}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rut">Rut:</label>
                                <input type="text" id="rut" name="rut" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mail">Mail:</label>
                                <input type="text" id = "mail" name="mail" class="form-control">
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
            
            
