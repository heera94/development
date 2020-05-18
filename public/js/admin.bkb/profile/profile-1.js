$(document).ready( function () {   

    $('#messagesDts').DataTable({
        initComplete: function() {
            $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
        },
        responsive: true,
        "pageLength": 13
    });
       
    $('#enquiry-visit-wizard').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        autoFocus: true,
        labels: {
            finish: "Make Enquiry",
        }           
    });

    $('.datepicker-here').datepicker();

});