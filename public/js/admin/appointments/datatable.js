$(document).ready(() => {
    var oTable = $('#appointments-list').DataTable({
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
            url: script_url + '/get-appointments-list',
            dataType: "json",
            type: "POST",
            data: {}
        },
        createdRow: function(row, data, index) {},
        initComplete: function(settings, json) {},
        drawCallback: function() {},
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data: 'patient', name: 'patient'},
            { data: 'doctor', name: 'doctor'},
            { data: 'department', name: 'department'},
            { data: 'consult_time', name: 'consult_time'},
            { data: 'date', name: 'date'},
            // { data: 'status', name: 'status'},
            { data: 'actions', name: 'actions', orderable: false, searchable: false}

        ],
        responsive: true
    });
})
