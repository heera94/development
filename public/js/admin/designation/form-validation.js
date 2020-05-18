(function($) {
  //alert();
    "use strict";
    $(function () {
        $("#add-designationform").validate({
            rules: {
                designation: {
                    required: true,

                },
                },
            messages:
            {
              designation:{
                required:'Designation field is required',
              },

            },
        //     errorElement : 'div',
        //     errorPlacement: function(error, element) {
        //       var placement = $(element).data('error');
        //       if (placement) {
        //         $(placement).append(error)
        //       } else {
        //         error.insertAfter(element);
        //       }
        //     },
        //     submitHandler: function(form) {
        //         submitLoader();
        //         form.submit();
        //     }
         });
    });
})(jQuery);
