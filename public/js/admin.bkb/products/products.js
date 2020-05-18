$(document).ready(function() {

    $(document).on("change keyup","#category",function (e) {
      e.preventDefault();
      if($(this).val() == 0){
          $("#title").text('Enter new brand');
        //   $('#subcategorySel').empty();
      }else{
          $('#category-loader').html('<span class="small text-uppercase border py-1 px-2 font-weight-bold bg-light" id="category-loader" style=""><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading sub categoires...</span>');
            $.ajax({
                type: "POST",
                url: script_url + '/get-child-list',
                data: {
                    parent_id: $(this).val(),
                },
                success: function(result) {
                    $('#subcategorySel').empty();
                    $("#subcategorySel").append('<option value="">- Sub category -</option>');

                    // console.log(Array.isArray(result.data), result.data);

                    if(Array.isArray(result.data)) {
                        notification('No sub categories found.', 'warning');
                    }else {

                        $.each(result.data,function(key,value){
                            $('#subcategorySel').append($("<option/>", {
                                value: key,
                                text: value
                            }));
                        });
                    }
                    $('#category-loader').text('');
        
                },
                error: function(error) {
                    
                }
            });
        }
    });
    
    // $(document).on("change","#discount_price",function (e) {
    //   e.preventDefault();
    //   var discountPrice = $(this).val();
    //   var actualPrice = $("#actual_price").val();
    
    //   if( discountPrice > actualPrice){
    //     alert("Discount price should be less than actual price");
    //   }
    // });
    
    // $(document).ready(function() {
    //     $("form").submit(function(e){
    //       var discountPrice = $(this).val();
    //       var actualPrice = $("#actual_price").val();
    //       if( discountPrice > actualPrice ){
    //           alert("Discount price should be less than actual price");
    //           e.preventDefault(e);
    //        }
    
    //     });
    // });
    


    function readURL(input, attr, fileCount = '') {

        let fileTypes = ["image/jpeg", "image/jpg",  "image/png"];

        if(fileTypes.includes(input.files[0].type)) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('.' + attr).html('<img src="'+e.target.result+'" /><div class="overlay"><div data-file="'+fileCount+'" class="clear-product-image" data-attr="'+attr+'" data-type="primary">Clear image</div></div>');
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }else {
            notification('Oops...! Please check the image type.(' + fileTypes + ')', 'danger');
            $('#' + attr).val('');
        }
    }
    
    $(document).on('change', '.choose-product-image', function() {
        let attr = $(this).attr('id');
        if(this.files[0].size <= 2000000) {
            readURL(this, attr, $(this).data('file'));
        }else {
            notification('Oops...! Please check the file size. Maximum 2MB.', 'danger');
            $('#' + attr).val('');
        }
    });

    //Prevent events
    $(document).on('click', '.overlay', function(e) {
        e.preventDefault();
    });

    //Clear product image
    $(document).on('click', '.clear-product-image', function(e) {
        e.preventDefault();
        let type = $(this).data('type');
        let attr = $(this).data('attr');
        let fileCount = $(this).data('file');

        let name = 'Image - ' + fileCount;
        if(fileCount == 1) {
            name = 'Upload primary image';
        }

        $('.' + attr).html('<div class="text-secondary"><div><i class="far fa-images"></i></div>'+name+'</div>');
        $('#' + attr).val('');
    });

    //Remove product image
    $(document).on('click', '.remove-product-image', function() {
        let imageId = $(this).data('id');
        postData(script_url + '/remove-product-image', {
            id: imageId
        })
    });

});