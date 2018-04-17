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
    eventClick: function(eventObj) {
      location.href = '/dates/' + eventObj.id ;
      return false; // prevents browser from following link in current tab.

    },
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    timeFormat: 'H(:mm)',
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: alldates,
  });

});
