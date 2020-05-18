$(document).ready(() => {

    formValidation({
        attr: '#confrim-password-reset-1',
        rules: {

            password: {

                required: true,
                minlength: 6,
            },
            password_confirmation: {
                equalTo: "#password"
            }
        },
        messages: {
            password: " Enter your password.",
            password_confirmation: " Enter confirm password same as password."
        }
    });
})