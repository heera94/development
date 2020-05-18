$(document).ready(() => {
    var oTable = $('#doctors-list').DataTable({
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
            [1, "DESC"]
        ],
        ajax: {
            url: script_url + '/get-doctors-list',
            dataType: "json",
            type: "POST",
            data: {}
        },
        createdRow: function(row, data, index) {},
        initComplete: function(settings, json) {},
        drawCallback: function() {},
        columns: [
            { data: 'id', name: 'id', orderable: false, searchable: false},
            { data: 'name', name: 'name'},
            { data: 'degree', name: 'degree'},
            { data: 'designation', name: 'designation'},
            { data: 'department_id', name: 'department_id'},
            { data: 'specialization', name: 'specialization'},
            { data: 'status', name: 'status'},
            { data: 'actions', name: 'actions', orderable: false, searchable: false}

        ],
        responsive: true
    });
})
