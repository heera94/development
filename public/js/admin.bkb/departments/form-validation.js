$(document).ready(function() {
    formValidation({
        attr: '#department-form',
        rules: {
            dp_name: {
                required: true,
                minlength: 2
            }
        }
    });
});