document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    let form = document.querySelector("#formEvents");
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:'es',
      displayEventTime:false,
      headerToolbar:{
          left:'prev,next,today',
          center:'title',
          right:'dayGridMonth'
        },
        eventSources:[
          {
            url:baseUrl+"/event/show",         
            method:"POST",
            color: 'yellow',
            textColor: 'black',
            extraParams:{
              _token:form._token.value
            }            
          },
          {
            url:baseUrl+"/event/shown",         
            method:"POST",
            color: 'green',
            textColor: 'black',
            extraParams:{
              _token:form._token.value
            }            
          },
          {
            url:baseUrl+"/event/showx",         
            method:"POST",
            color: 'red',
            textColor: 'blue',
            extraParams:{
              _token:form._token.value
            }
          }
        ],                         
        dateClick:function(info){    
          form.reset();
          form.start.value=info.dateStr;   
          form.end.value=info.dateStr;   
          $("#event").modal("show");      
        },
        eventClick:function(info){
          var event = info.event;      
          axios.post(baseUrl+"/event/edit/"+info.event.id).
          then((response)=>{
            form.id.value=response.data.id;
            form.title.value=response.data.title;
            form.description.value=response.data.description;
            form.start.value=response.data.start;
            form.end.value=response.data.end;
            $("#event").modal("show");
          }).catch(error=>{
            if (error.response) {
              console.log(error.response.data)
            }
          })
        }
    });
    calendar.render();
    document.getElementById('save').addEventListener("click",function(){
      sendData("/event/add");     
    });
    document.getElementById('delete').addEventListener("click",function(){
      sendData("/event/delete/"+form.id.value);
    })
    document.getElementById('edit').addEventListener("click",function(){
      sendData("/event/update/"+form.id.value);
    })
    function sendData(url){
      const info = new FormData(form)   
      const nuevaUrl = baseUrl+url;
      axios.post(nuevaUrl,info).
        then((response)=>{
          calendar.refetchEvents();
          $("#event").modal("hide");
        }).catch(error=>{
          if (error.response) {
            console.log(error.response.data)
          }
        })
    }
  });