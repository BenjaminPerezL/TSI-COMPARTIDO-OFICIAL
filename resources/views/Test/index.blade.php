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
                  <form method="POST" action="{{route('clientes.destroy',$cl->id)}}">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                          <i class="far fa-trash-alt"></i>

                      </button>
                  </form>
                  
              </td>
              <td class="text-center" style="width: 1rem">
                  <a href="{{route("clientes.edit",$cl->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Cliente">
                      <i class="far fa-edit"></i>
                  </a>
              </td>
          </tr>
          @endforeach
  </table>
</div>