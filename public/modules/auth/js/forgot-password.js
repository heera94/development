$(document).ready(() => {

    formValidation({
        attr: '#verify-email',
        rules: {

            email: {

                required: true,
              
            },
            
        },
        
    });
})