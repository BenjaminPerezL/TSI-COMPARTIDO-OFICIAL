document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#formularioCitas");

    document.getElementById("formularioCitas").addEventListener("submit",function(){
        alert(document.getElementById('txtHora').value +document.getElementById('fecha').value );
        //enviarDatos("/agenda/agregar");
      });
        
    //   document.getElementById("btnEliminar").addEventListener("click",function(){
    //     enviarDatos("/agenda/borrar/"+formulario.id.value);
    
    //   });
    
    //   document.getElementById("btnModificar").addEventListener("click",function(){
    //     enviarDatos("/agenda/actualizar/"+formulario.id.value);
    
    //   });
    

      //FUNCION QUE ENVIA DATOS, EDITA Y BORRA
    function enviarDatos(url){

        formulario.start.value = formulario.start.value.substring(0,10)+" "+document.getElementById('txtHora').value
        //alert(formulario.start.value );
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
        
        var est = document.getElementById('estado');
        var estado = est.options[est.selectedIndex].innerHTML;
        formulario.descripcion.value +="-"+estado ;
        const datos=new FormData(formulario);
        const nuevaURL = baseURL+url;
        //axios permite enviar info( url , datos)
        axios.post(nuevaURL,datos).
        then(
            (respuesta)=>{
            //actualiza eventos de url, "refresca"
            respuesta.data.start = 
            calendar.refetchEvents();
            //$("#boton").modal("hide");
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

    document.getElementById("btnAceptar").addEventListener("click",function(){
        alert("hola");
    
      });
});