$(document).ready(() => {
    var oTable = $('#users-list').DataTable({
        iDisplayLength: 10,
        serverSide: true,
        processing: true,
        keys: !0,
        select: {
            style: "multi"
        },
        language: {
            processing: "Please wait....",
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        "order": [
            [0, "DESC"]
        ],
        ajax: {
            url: script_url + '/users-list',
            dataType: "json",
            type: "POST",
            data: {}
        },
        createdRow: function(row, data, index) {},
        initComplete: function(settings, json) {},
        drawCallback: function() {},
        columns: [

            { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            { data: 'name', name: 'name'},
            { data: 'email', name: 'email'},
            { data: 'roles', name: 'roles'},
            { data: 'created_at', name: 'created_at'},
           
           
        ],
        responsive: true
    });
})
