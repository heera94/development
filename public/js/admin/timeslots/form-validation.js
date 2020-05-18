$(document).ready(function() {
    formValidation({
        attr: '#timeslots-form',
        rules: {
            slotname: {
                required: true,
                minlength: 2,
            },

            fromslot: {
                required: true,
                minlength: 2,
            },
            toslot: {
                required: true,
                minlength: 2,
           },
         }
    });
});
