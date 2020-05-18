$(document).ready(() => {

    formValidation({
        attr: '#save-register',
        rules: {

            name:{
                required: true
            },
            email:{
                required: true
            },
            
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
            password_confirmation: " Re type password same as password."
            
        }
    });
})