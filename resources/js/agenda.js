//import { Calendar } from 'fullcalendar/core';
//import interactionPlugin from 'fullcalendar/interaction';
import axios, {isCancel, AxiosError} from 'axios';



document.addEventListener('DOMContentLoaded', function() {

  let formulario = document.querySelector("#formularioEvento");
  //document.getElementById("start").disabled = true;
  //busca el div para poner la agenda
  var calendarEl = document.getElementById('agenda');

  //dar funciones al calendario
  var calendar = new FullCalendar.Calendar(calendarEl, {
    //plugins: ["interaction", "dayGrid", "timeGrid", "resourceTimeline"],
    timeZone: 'local',
    slotDuration: '00:30',
    initialView: 'dayGridMonth',
    locale:"es",
    //width: 800,
    height:800,
    selectable: true,
    defaultTimedEventDuration: '00:30',
    slotEventOverlap: false,

    titleFormat: { // will produce something like "Tuesday, September 18, 2018"
      month: 'long',
      year: 'numeric',
      //day: 'numeric',
      //weekday: 'long'
    },
    
    headerToolbar:{
      left: 'prev,next today',
      center:'title',
      right:'dayGridMonth,timeGridWeek,listWeek' ,
    },

    //events:"http://localhost:8000/agenda/mostrar",

    eventSources:{
      url: baseURL+"/agenda/mostrar",
      method:"POST",
      extraParams:{
        _token: formulario._token.value,
      }
    },
    
    //CLICK EN DIA
    dateClick: function(info){
      //resetear form y luego asignar fechas clickeadas
      formulario.reset();
      document.getElementById('exampleModalLabel').textContent = 'Datos Nueva Cita';
      document.getElementById('btnModificar').hidden = true;
      document.getElementById('btnEliminar').hidden = true;
      document.getElementById('btnGuardar').hidden = false;

      formulario.start.value=info.dateStr;
      formulario.end.value=info.dateStr;
      //alert('clicked ');
      $("#boton").modal("show");
    },

    //CLICK EN CITA ESPECIFICA
    eventClick:function (info){
      var evento = info.event;
      console.log(evento);

        axios.post(baseURL+"/agenda/editar/"+info.event.id).
        then(
          (respuesta)=>{

            //CARGAR DATOS EN FORM
            formulario.id.value = respuesta.data.id;
            formulario.title.value = respuesta.data.title;
            
            formulario.descripcion.value = respuesta.data.descripcion;
            
            document.getElementById('txtHora').value = respuesta.data.start.substring(11,16);
        

            formulario.start.value = respuesta.data.start.substring(0,10);
            formulario.end.value = respuesta.data.end.substring(0,10);

            
            document.getElementById('exampleModalLabel').textContent = 'Modificar Datos Cita';
            document.getElementById('btnGuardar').hidden = true;
            document.getElementById('btnModificar').hidden = false;
            document.getElementById('btnEliminar').hidden = false;
            
            $("#boton").modal("show");
          }
          ).catch(
            error=>{
              if(error.response){
                console.log(error.response.data);
              }
            }
          )
    }
  });
  //mostrar calendario
  calendar.render();




  
  // funcion q al cambiar cmbbx sevicios cambia el titulo

  document.getElementById("servicios").addEventListener("click",function(){
    var index = document.getElementById("servicios").selectedIndex;
     //var serv = document.getElementById("servicios");
     //document.getElementById('title').value = document.getElementById(serv).text;
     //document.getElementById('title').value = document.getElementById("servicios").value;
    // document.getElementById('title').value = document.getElementById("servicios").title;

      var serv = document.getElementById('servicios');
      var texto = serv.options[serv.selectedIndex].innerHTML;
      document.getElementById('title').value = texto;
    }); 




  //CLICK EN BTN GUARDAR
  // al hacer click en btn guardar, se recolectan datos ingresados
  document.getElementById("btnGuardar").addEventListener("click",function(){
    
    enviarDatos("/agenda/agregar");
  });
    
  document.getElementById("btnEliminar").addEventListener("click",function(){
    enviarDatos("/agenda/borrar/"+formulario.id.value);

  });

  document.getElementById("btnModificar").addEventListener("click",function(){
    enviarDatos("/agenda/actualizar/"+formulario.id.value);

  });

  //FUNCION EDITAR Y BORRAR
  function enviarDatos(url){
    formulario.start.value = formulario.start.value.substring(0,10)+" "+document.getElementById('txtHora').value

    var hora = document.getElementById('txtHora').value.substring(0,2);
    hora = parseInt(hora, 10);
    var minutos = document.getElementById('txtHora').value.substring(3,5)
    minutos = parseInt(minutos, 10);
    if (minutos<30){
      minutos+=30
      
    }else{
      minutos-=30
      hora+=1
    }
    if (minutos<10){
      minutos= "0"+minutos.toString()
      
    }
    if (hora<10){
      hora= "0"+hora.toString()
      
    }
    formulario.end.value = formulario.start.value.substring(0,10)+" "+hora+":"+minutos
    


    const datos=new FormData(formulario);
    const nuevaURL = baseURL+url;
    //axios permite enviar info( url , datos)
    axios.post(nuevaURL,datos).
    then(
      (respuesta)=>{
        //actualiza eventos de url, "refresca"
        respuesta.data.start = 
        calendar.refetchEvents();
        $("#boton").modal("hide");
      }
      ).catch(
        error=>{
          if(error.response){
            console.log(error.response.data)
          }
        }
      )
      $("#boton").modal("hide");
  }


  function mediaHora(){

  }

  //CAMBIAR HORA 

  

  // document.getElementById('txtHora').addEventListener('change', (event) => {
  //   var horaInicio = event.target.value
  //   formulario.start.value = info.dateStr+horaInicio;
  //   formulario.reset();
  //   $("#boton").modal("reload");
    
  //   //formulario.start.value=info.dateStr+document.getElementById('txtHora').textContent;
  // });




});