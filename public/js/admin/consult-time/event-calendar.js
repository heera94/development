document.writeln('<script src="' + script_url +'/plugins/full-calendar/full-calendar.js"></script>');

$(document).on('change', 'select[name=doctors_id]', function() {
    // console.log(formatDate(new Date('2019-11-19 18:00:00')));
    getEvent($(this).val());
});

$(document).on('click', '#refresh-filter', function() {
    // console.log(formatDate(new Date('2019-11-19 18:00:00')));
    getEvent($('select[name=doctors_id]').val());
});

function getEvent(id) {
    postData(script_url + '/get-doctors-time-slot', {
        doctor_id: id
    })
    .then(response => {
        // console.log(response.data.eventDetails.length);
        let result = response.data.eventDetails.events;
        // console.log(result);
        $('#calendar').fullCalendar('removeEvents'); 
        $("#calendar").fullCalendar('addEventSource', result);
        $('#calendar').fullCalendar('rerenderEvents');
        $('#calendar').fullCalendar('refetchResources');
        
    })
}


$(document).on('click', '.delete-data-event', function() {

    var url = $(this).data('url');
    var id = $('input[name=event_id]').val();


    var generateUrl = url;


    let modelAttr = '#globel-delete-confirm-model';
    $(modelAttr + ' input[name=hidden_delete_id]').val('');
    $(modelAttr).modal('show');
    $(modelAttr + ' input[name=hidden_delete_id]').val(generateUrl);
    $('.delete-confirm-btn').addClass('delete-consult-time-event');
    $('.delete-consult-time-event').removeClass('delete-confirm-btn');
});

$(document).on('click', '.delete-consult-time-event', function() {

    postData($('input[name=hidden_delete_id]').val(), {

        consultId: $('input[name=event_id]').val(),
        eventDate: $('input[name=event_date]').val(),
        shift: $('input[name=hidden_shift]').val(),
        doctorId : $('select[name=doctors_id]').val(),
        reschedule:$("input[name=reschedule]").val(),
        rescheduleId:$("input[name=rescheduleId]").val(),

    } , 'POST')
    .then(response => {
        console.log(response.status);
        $('#modal-view-event').modal('hide');
        $('#globel-delete-confirm-model').modal('hide');
        getEvent($('#doctors_id').val());
    })
});

$(document).ready(function() {
    formValidation({
        attr: '#add-temp-time-consult-time-event',
        rules: {
            from_time: {
                required: true,
                minlength: 2
            },
            to_time: {
                required: true,
                minlength: 2
            },
            slot: {
                required: true,
                // minlength:
            },
            shift: {
                required: true,
            }
        }
    });
});

$('#add-temp-time-consult-time-event').submit(function(e) {
    e.preventDefault();

    if( $(this).valid() ) {
        postData(script_url + '/save-temp-consult-time', {
            doctors_id: $('#doctors_id').val(),
            from_time: $('input[name=from_time]').val(),
            to_time: $('input[name=to_time]').val(),
            shift: $('input[name=hidden_shift]').val(),
            slot: $('input[name=slot]').val(),
            week: $('select[name=week_day]').val(),
            date: $('input[name=event_date]').val(),
            consultId: $('input[name=event_id]').val(),
            reschedule:$("input[name=reschedule]").val(),
            rescheduleId:$("input[name=rescheduleId]").val(),
        })
        .then(response => {
            if(response.status == true) {
                $('#close-modal-btn').click();
                setTimeout(() => {
                    $('#close-modal-btn').click();
                }, 500);
                getEvent($('#doctors_id').val());
                notification(response.message, 'success');
            }
        })
        .catch(error => {
            notification(error.responseJSON, 'danger');
        })
    } else {

    }
});

$(document).on('click', '.collapseRescheduleConsultTime', function() {
    $('#collapseRescheduleConsultTime').collapse('show');
    $('#close-modal-btn').attr('data-dismiss', '');
    $(this).addClass('update-reschedule-consult-time').removeClass('collapseRescheduleConsultTime').text("Update");
    setTimeout(() => {
        $(this).attr('type', 'submit');
    }, 1000);
    $('#add-temp-time-consult-time-event input').val('');
    $('select[name=week_day]').val('');
});
  
$(document).on('click', '#close-modal-btn', function() {
    $(this).attr('data-dismiss', 'modal');
    $('#collapseRescheduleConsultTime').collapse('hide');
    $('.update-reschedule-consult-time').addClass('collapseRescheduleConsultTime').removeClass('update-reschedule-consult-time').text("Reschedule");
    setTimeout(() => {
        $('.collapseRescheduleConsultTime').attr('type', 'button');
    }, 500);
    $('#add-temp-time-consult-time-event label.error').remove();
    $('#add-temp-time-consult-time-event input').val('');
    $('select[name=week_day]').val('')
});

$(document).on('click', '.update-reschedule-consult-time', function() {
    
});