
document.writeln('<link rel="stylesheet" href="' + script_url +'/plugins/full-calendar/full-calendar.css">');
document.writeln('<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>');
document.writeln('<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>');
document.writeln('<script src="' + script_url +'/plugins/date-picker.js"></script>');

jQuery(document).ready(function(){
    jQuery('.datetimepicker').datepicker({
        timepicker: true,
        language: 'en',
        range: true,
        multipleDates: true,
            multipleDatesSeparator: " - "
      });
    jQuery("#add-event").submit(function(){
        alert("Submitted");
        var values = {};
        $.each($('#add-event').serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });
        console.log(
          values
        );
    });
 
    setTimeout(() => {
        initFullCalendar();
    }, 1000);
});

function initFullCalendar(eventData) {
    
    // page is ready
    jQuery('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        contentHeight: 500,
        // emphasizes business hours
        businessHours: false,
        defaultView: 'month',
        // event dragging & resizing
        editable: true,
        // header
        header: {
            left: 'title',
            center: 'month,agendaWeek,agendaDay',
            right: 'today prev,next'
        },
        events: [],
        // events: [{
        //     title: 'Restaurant',
        //     description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
        //     start: '2019-11-17 18:00:00',
        //     end: '2019-11-17 19:30:00',
        //     className: 'fc-bg-default',
        //     icon : "glass",
        //     allDay: false
        // }],
        eventRender: function(event, element) {
            element.find('.fc-time').hide();
            if(event.icon){
                // element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+"'></i>");
            }
        },
        dayClick: function(date) {
            if($('#doctors_id').val()) {
                $("#click-date").remove();
                var d = date._d;
                var e = formatDate(d);

                $("#calendar").after('<input type="hidden" id="click-date" value="'+ e +'" />');
                jQuery('#modal-view-event-add').modal();
            }
        },
        eventClick: function(event, jsEvent, view) {
            console.log(event, jsEvent, view);
            // jQuery('.event-icon').html("<i class='fa fa-"+event.icon+"'></i>");
            // alert(event.date);

            if(event.reschedule === true) {

            }



            $("input[name=reschedule]").val(event.reschedule);
            $("input[name=rescheduleId]").val(event.rescheduleId);

            $("input[name=event_date]").val(event.date);
            $("input[name=hidden_shift]").val(event.shift);

            jQuery('.event-title').html(event.title);
            jQuery('.event-body').html(event.description);
            jQuery('.eventUrl').attr('href',event.url);
            jQuery('.event-id').val(event.id);
            jQuery('#modal-view-event').modal();
        },
    });
}
