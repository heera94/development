$(document).ready(() => {
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $('label[for=crop-img-resource]').hover(function() {})

    $('label[for=crop-img-resource]').hover(
        function() {
            $('.crop-description').removeClass('hidden');
        },
        function() {
            $('.crop-description').addClass('hidden');
        }
    );


    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 400,
            height: 400
        }
    });


    $(document).on('click', '#image-crop', function(ev) {
        ev.preventDefault();
        $('#error-crop').remove();
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(resp) {
            $('img.view-crop-image-block').attr('src', resp);
            $('input.view-crop-image-block').val(resp);
        });
    });

    $(document).on('click', '.upload-crop-image', function() {
        if ($('input.view-crop-image-block').val()) {
            initBtnLoader(this);
            $.ajax({
                url: $(this).data('url'),
                type: "POST",
                data: { "image": $('input.view-crop-image-block').val() },
                success: function(response) {
                    if (response.status === true) {
                        $('#image-crop-modal-popup').modal('hide');
                        $('.upload-crop-image').html('<i class="fas fa-upload"></i> Upload');
                        $('#crop-img-resource').val('');
                        $('input.view-crop-image-block').val('');

                    }
                }
            });

        } else {
            notification('Opps...! Please crop your image.', 'danger');
        }
    })

    $(document).on('change', '#crop-img-resource', function(e) {

        let file = this.files[0];

        if (this.files[0]) {
            if (file.type === 'image/jpeg' || file.type === 'image/png') {
                $('#image-crop-modal-popup').modal('show');
                setTimeout(() => {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function() {
                            // console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                }, 200);
            } else {
                notification('Opps...! Please choose jpg or png file.', 'danger');
            }
        }
    })
})