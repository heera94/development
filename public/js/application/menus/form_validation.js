$(document).ready(function() {
    formValidation({
        attr: '#menus-form',
        rules: {
            menu: {
                required: true,
                minlength: 2
            }
        }
    });
});
