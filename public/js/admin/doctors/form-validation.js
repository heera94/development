$(document).ready(function() {
    formValidation({
        attr: '#doctors-form',
        rules: {
            name: {
                required: true,
                minlength: 2,
            },

            degree: {
                required: true,
                minlength: 2,
            },
            designation: {
                required: true,
                minlength: 2,
           },
            department_id: {
               required: true,

          },
            specialization: {
               required: true,
               minlength: 2,
          },
           experience: {
              required: true,

          },
          add_experience: {
             required: true,
             minlength: 2,
          },
           email: {
               required: true,
               minlength: 2,
          },


        }
    });
});
