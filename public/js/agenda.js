document.addEventListener('DOMContentLoaded', function() {
    //busca el div para poner la agenda
    var calendarEl = document.getElementById('agenda');

    //dar funciones al calendario
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",

      headerToolbar:{
        left: 'prev,next today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,listWeek' ,
      },

      dateClick:function(info){
        $("#exampleModal").modal("show");
      }
    });
    //mostrar calendario
    calendar.render();
  });