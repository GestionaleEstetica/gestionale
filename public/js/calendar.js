var alldates =[];
for(i=0; i<dates.length; i++){
  var date =
    {
      id: dates[i]['id'],
      title: dates[i]['description'],
      start: dates[i]['date']+'T'+dates[i]['time'],
    };
    alldates.push(date);
}

$(document).ready(function() {

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultDate: '2018-03-12',
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: alldates,
  });

});
