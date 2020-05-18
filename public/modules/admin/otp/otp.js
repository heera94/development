$(document).ready(() => {

    formValidation({
        attr: '#verify-otp',
        rules: {

            otp: {
                required: true, 
                maxlength: 6,
                digits: true
            }


        },
        messages: {

        }
    });

});
