document.writeln('<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>');
function formValidation(validation) {
    $(validation.attr).validate({
        rules: validation.rules
    });
}