$(document).ready(function() {
    formValidation({
        attr: '#product-sub-category-form',
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            parent_id: {
                required: true,
            }
        }
    });
});
