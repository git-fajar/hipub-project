  <div id='calendar'></div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',    
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
    },
    defaultView: 'month',
    editable: false,
    events: [
        {
            title: 'Event 1',
            start: '2023-03-01',
            end: '2023-03-01',
            url: 'https://example.com/event2'
        },
        {
            title: 'Event 2',
            start: '2023-03-05',
            end: '2023-03-07',
            url: 'https://example.com/event2'
        }
    ]
    });
    calendar.render();
  });

</script>