$(document).ready(function() {
      postData( script_url + '/get-timeslots')
      .then(response => {
        if(response.status === true) {
          let attr = $('#lstBox1');
          $.each(response.data, (index, value) => {
            attr.append('<option value="'+value.id+'">'+value.slot_name+'</option>');
          })
        }
      })
      .catch(error => {
  })
        postData( script_url + '/get-org-timeslots')
        .then(response => {
          if(response.status === true) {
            let attr = $('#lstBox2');
            $.each(response.data, (index, value) => {
              attr.append('<option value="'+value.id+'">'+value.slot_name+'</option>');
            })
          }
        })
        .catch(error => {
    })
});
$('#submit').on('click', function(e) {
       var name = $('input#name').val();
       var from = $('input#from').val();
       var to = $('input#to').val();
       e.preventDefault();
       $.ajax({
           type: 'post',
           data: {
                    'name': name,
                    'from':from,
                    'to':to,
                 },
           url: script_url + '/save-new-slot',
           success: function(data) {
              //  alert('added Successfully');
           }
       });
     });
