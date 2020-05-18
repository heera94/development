$(document).ready(function() {
    $.validator.addMethod(
        'discountPrice',
        function (value, element, requiredValue) {
            if(value) {
                if(Number(value) < Number($('input[name=price]').val())) {
                    return true;
                }
                return false;
            }
            return true;
        },
        'Check the discount amount.'
    );

    

    formValidation({
        attr: '#product-form',
        rules: {
            product_name: {
                required: true,
                maxlength: 100
            },
            product_code: {
                required: true,
                maxlength: 50,
                remote: {
                    url: script_url + "/check-product-code",
                    type: "post",
                    data: {

                    },
                    complete: function(response) {
                        return response
                    }
                  }
            },
            parent_id: {
                required: true,
            },
            subcategory: {
                required: true,
            },
            summary: {
                required: true,
            },
            price: {
                required: true,
                number: true
            },
            discount_price: {
                discountPrice: true,
                number: true
            },
            description: {
                required: true,
            }

        },
        messages: {
            product_code: {
                remote: 'The product code already exist'
            }
        }
    });
});

$(document).on('click', '.clear-form', function() {
    CKupdate();
});
function CKupdate(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
    }
    CKEDITOR.instances[instance].setData('');
} 
