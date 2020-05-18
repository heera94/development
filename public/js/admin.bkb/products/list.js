$(document).on('click', '.change-on-page-status', function() {
    let id = $(this).data('id');
    let attr = $(this).data('attr');
    let type = $(this).data('type');
    let key = $(this).data('key');
    let action = $(this).data('action');
    let actionType = '';

    postData(script_url + '/change-product-status', {
        id: id
    })
    .then(response => {
        if(response.status == true) {
            if($(this).hasClass("text-success")) {
                $(this).removeClass('text-success').addClass('text-danger');
            }else {
                $(this).addClass('text-success').removeClass('text-danger');
            }
        
            $(this).attr('data-action', actionType);
            notification('Successfully updated!', 'success');
        }
    })
    .catch(error => {
        notification(error.responseJSON.message, 'danger');
    })
        

});