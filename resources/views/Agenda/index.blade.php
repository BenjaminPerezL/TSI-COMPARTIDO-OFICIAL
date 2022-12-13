@extends('layouts/master')

@section('hojas-estilo')
    
@endsection

@section('contenido-principal')

<div class="container p-2">
    <div id="agenda">

    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="boton" role="dialog">
  {{-- <div class="modal fade" id="boton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Cita </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- BODY FORMULARIO DIA--}}
          <form action="" id="formularioEvento" >

            {{-- token q permite identificar q info llega desde este form --}}
            {{ csrf_field() }}
            

            <div class="form-group d-none">
              <label for="id">ID:</label>
              <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted"> </small>
            </div>

            <div class="form-row">

              <div class="form-group col-md-8 d-none" >
                <label for="title">Titulo</label>
                {{-- EN INGLES ID POR QUE FULLCALENDAR LO USA ASI --}}
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento" required>
              </div>
              
              
             
              <label for="clientes">Cliente:</label>
              <select name="clientes" id="clientes" :required>
                {{-- <optgroup label="Clientes inscritos"> --}}
                  <option value=""></option>
                  @foreach ($clientes as $cl)

                  <option value="{{$cl->rut}}">{{$cl->nombre}}</option>

                  @endforeach
                </optgroup>
                
              </select>
              <label id="errorCliente"></label>
              <p></p>
              <label for="servicios">Servicio:</label>
              <select name="servicios" id="servicios" :required>
                {{-- <optgroup label="Servicios disponibles"> --}}
                  <option value=""></option>
                  @foreach ($servicios as $sv)

                  <option value="{{$sv->tipo_servicio}}">{{$sv->tipo_servicio}}</option>

                  @endforeach
                </optgroup>
                
              </select>
              <label id="errorServicio"></label>
              <div class="form-group col-md-4">
                <label >Hora</label>
                <input type="time" min="09:00" max="19:00" step="1800" default="12:00" class="form-control" name="txtHora" id="txtHora" aria-describedby="helpId" placeholder="Hora" required>
              </div>

              <div class="form-group col-md-4 d-none">
                <label >Test</label>
                <input type="text"  class="form-control" name="txtHora" id="test" aria-describedby="helpId" placeholder="test">
              </div>
              
            </div>

            <P></P>

            <div class="form-group d-none">
              <label for="descripcion">Descripcion evento</label>
              <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
            </div>

            

            {{-- FECHA INICIO, TB EN INGLES --}}
            <div class="form-group ">
              <label for="start">start</label>
              <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="" >
              <small id="helpId" class="form-text text-muted"> </small>
            </div>
            
            {{-- FECHA FIN, TB EN INGLES --}}
            <div class="form-group d-none">
              <label for="end">end</label>
              <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted"> </small>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="btnGuardar" >Guardar</button>
              <button type="button" class="btn btn-warning" id="btnModificar" >Modificar</button>
              <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              
            </div>

          </form>

          
        </div>

        

      </div>
    </div>
  </div>


@endsection
            
            
@section('scripts')
<script src="{{ asset('js/agenda.js')}}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

@endsection