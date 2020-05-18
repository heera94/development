//common js function to submit form-data
$(function() {
	$('form[data-ajaxsubmit="true"]').submit(function(event){
		event.preventDefault(); //prevent default action
		let redirectUrl = $(this).data("ajaxredirect");
	  $.ajax({
			url : $(this).attr('action'),
			dataType: 'json',
			type: 'POST',
			data:$(this).serialize(),
			success: function(response) {
			console.log(response);

			// alert('Added successfully');
				if(response.status === true) {
				//	window.location.reload();
					window.location.href = redirectUrl;
				}
			}
		}).fail(function(error) {
					alert(error.responseJSON.message);
		});
	});
});
