$(document).ready(function() {
    formValidation({
        attr: '#product-category-form',
        rules: {
            name: {
                required: true,
                minlength: 2
            }
        }
    });
});
