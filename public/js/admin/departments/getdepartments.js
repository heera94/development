$(document).ready(function() {
      postData( script_url + '/get-departments')
      .then(response => {
        if(response.status === true) {
          let attr = $('#lstBox1');
          $.each(response.data, (index, value) => {
            attr.append('<option value="'+value.id+'">'+value.dp_name+'</option>');
          })
        }
      })
      .catch(error => {
  })
        postData( script_url + '/get-org-departments')
        .then(response => {
          if(response.status === true) {
            let attr = $('#lstBox2');
            $.each(response.data, (index, value) => {
              attr.append('<option value="'+value.id+'">'+value.dp_name+'</option>');
            })
          }
        })
        .catch(error => {
    })
});
