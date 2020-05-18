$(document).ready(() => {
    setTimeout(() => {
        $('.wait-loader').addClass('hidden');
        $('.after-wait-card-section').removeClass('hidden');
    }, 800)
})

var config = {
    toastrOption: {
        "positionClass": "toast-bottom-right",
    }
}

var setDataTable = [];
$(document).on('click', '.delete-table-data', function(e) {
    e.preventDefault();
    tableAjaxDelete($(this).data('id'), $(this).attr('href'));
});

setTimeout(() => {
    $('#flash-msg').addClass('hidden');
}, 5000);


//Clear form
$(document).on('click', '.form-clear', function() {
    document.getElementById($(this).closest("form").attr('id')).reset();
    $('label.error').remove();
    notification('Clear all fields', 'info');
});

function initBtnLoader(attr) {
    $(attr).html('<i class="fas fa-spinner fa-pulse"></i> Please wait...');
}

//Submit loader

$(document).on('click', 'form button[type=submit], .btn-loader', function() {

    let html = '<i class="fas fa-spinner fa-pulse"></i> Please wait...';

    if ($(this).closest("form").attr('id')) {
        if ($('#' + $(this).closest("form").attr('id')).valid()) {
            $(this).html(html);
        }
    } else {
        $(this).html(html);
    }
});

$(".answer").hide();
$(".coupon_question").click(function() {
    if ($(this).is(":checked")) {
        $(".answer").show();
        $(".answer2").hide();
    } else {
        $(".answer").hide();
    }
});

$(".answer2").hide();
$(".coupon_question2").click(function() {
    if ($(this).is(":checked")) {
        $(".answer2").show();
        $(".answer").hide();
    } else {
        $(".answer2").hide();
    }
});

//Tooletip
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

//Change status

$(document).on('click', '.change-status', function() {
    $(this).html('<i class="fas fa-spinner fa-pulse"></i>');

    postData($(this).data('url'), {
            id: $(this).data('id')
        })
        .then(response => {
            if (response.status === true) {
                notification(response.message, 'success');
                resetDataTable('#' + $(this).closest('table').attr('id'), $(this).data('type'));
            }
        })
        .catch(error => {
            notification(error.responseJSON.message, 'danger');
            resetDataTable('#' + $(this).closest('table').attr('id'), $(this).data('type'));
        })
})

//Delete data
$(document).on('click', '.delete-data', function() {
    let modelAttr = '#globel-delete-confirm-model';
    $(modelAttr + ' input[name=hidden_delete_id]').val('');
    $(modelAttr).modal('show');
    $(modelAttr + ' input[name=hidden_delete_id]').val($(this).data('url'))
})

$(document).on('click', '.close-delete', function() {
    let modelAttr = '#globel-delete-confirm-model';
    $(modelAttr + ' .delete-confirm-btn').attr('data-url', '');
});

$(document).on('click', '.delete-confirm-btn', function() {
    $(this).html('<i class="fas fa-spinner fa-pulse"></i> Please wait...');
    let modelAttr = '#globel-delete-confirm-model';
    postData($(modelAttr + ' input[name=hidden_delete_id]').val(), '', 'DELETE')
        .then(response => {
            if (response.status === true) {
                $(this).html('<i class="fas fa-trash-alt"></i> Delete');
                resetDataTable('.dataTable', 'datatable');
                $('#globel-delete-confirm-model').modal('hide');
                $(modelAttr + ' input[name=hidden_delete_id]').val('');
                notification(response.message, 'success');
            }
        })
        .catch(error => {
            notification(error.responseJSON.message, 'danger');
            $(this).html('<i class="fas fa-trash-alt"></i> Delete');
        })
});

$(".check-all").change(function() {
    $(".table-checkbox").prop('checked', $(this).prop("checked"));
    checkAllCheckedBox();
});



$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
});

// ------------------------------------- Functions ------------------------------------------//

function resetDataTable(attr, type) {
    if (type == 'datatable') {
        $(attr).DataTable().draw();
    }
}

function notification(message = ":)", type = 'success') {
    $.notify(message, {
        type: type,
        offset: {
            x: 10,
            y: 10
        },
        placement: {
            from: "bottom"
        },
    });
}

function openNav() {
    document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function postData(url, data = "", method = 'POST') {

    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function(data) {
                resolve(data)
            },
            error: function(error) {
                reject(error)
            },
        })
    })
}

function initLoading() {
    $('#after-wait-card-section').addClass('hidden');
}

function checkAllCheckedBox() {
    if ($('.table-checkbox:checked').length > 0) {
        console.log('ok')
    }
}

function formatTime(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    // return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
    return strTime;
}

function formatDate(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return date.getFullYear() + '-' +  (date.getMonth()+1) + "-" + date.getDate()  + " " + strTime;
  }
  