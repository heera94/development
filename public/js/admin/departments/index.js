$(document).on('click', '.filter-datable-data', function() {
    filterDataTable(4, $('select[name=filter_status]').val())
})

 $(document).ready(function() {
    
    initDatatable({
       attr: '#department-list',
       url: '/get-department-list',
       data: {
          status: $('select[name=filter_status]').val()
       },
       colums: [
          {data: 'dp_name', name: 'dp_name'}
       ]
    })
 })