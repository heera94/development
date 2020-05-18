
document.writeln('<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.css">');
document.writeln('<link rel="stylesheet" type="text/css" href="' + script_url + '/plugins/select-2/select-2.css">');
document.writeln('<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.js"></script>');

$(document).ready(function() {
    $(".js-select2").select2();
})