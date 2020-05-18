(function($) {
    "use strict";
    $(function () {
        $("#settings-form").validate({
            rules: {
                key_name: {
                    required: true,
                },
                key: {
                    required: true,
                },
                value: {
                    required: true,
                },
                },
            messages:
            {
              key_name:{
                required:'Department field is required',
              },
              key:{
                required:'Department field is required',
              },
              value:{
                required:'Department field is required',
              },
            },
        });
    });
})(jQuery);
