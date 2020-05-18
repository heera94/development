$(document).ready(() => {
    var oTable = $('#product-category-list').DataTable({
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
            url: script_url + '/get-product-category-list',
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
            { data: 'created_by', name: 'created_by'},
            { data: 'created_at', name: 'created_at'},
            { data: 'status', name: 'status'},
            { data: 'actions', name: 'actions', orderable: false, searchable: false}

        ],
        responsive: true
    });
})
