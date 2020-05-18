
 $("#updateData").click(function(e){
   e.preventDefault();
  var formdata = $("#update-appsettings-form").serialize();
  $.ajax({
      type: 'post',
      url: '/update-app-settings',
      data: formdata,
      processData: false,
      success: function(data) {
        alert('Updated succesfully..');
      },
      error: function(data){
        alert("failed");
      }
  });
 });
