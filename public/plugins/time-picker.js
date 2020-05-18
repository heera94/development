document.writeln('<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" rel="stylesheet"/>');
document.writeln('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>')

$(document).ready(function() {
    $('.time-picker').timepicker({
        //timeFormat: 'h:mm p',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
});
