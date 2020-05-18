function readAndShowFiles() {
  var files = document.getElementById("images").files;
  var count=$(".close").last().attr('id');
  for (var i = 0; i < files.length; i++) {
    (function(file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        count++;
        $('.upload_image').append('<div id="image_'+count+'" class="col-2"><span class="close btn-sm" id="'+count+'">&times;</span><input class="data" type="hidden" name="images[]" value="'+e.target.result+'"/><img  src="'+e.target.result+'" height=100 width=100 id="'+count+'"></div>')
      };
      // Read in the image file as a data URL.
      reader.readAsDataURL(file);
    })(files[i]);
  }
}
$(document).on("click",".close",function (e) {
  var id=$(this).attr('id');
  $("#image_"+id).remove();
});
$(document).on("click",".exist_remove",function (e) {
    id=$(this).attr('id');
  $.ajax({
    type: "POST",
    url: script_url + '/remove-exist-product',
    data: {
        product_id: $(this).attr('id'),
    },
    success: function(result) {
      alert("Image removed")
    },
    error: function(result) {
        alert('error');
    }
  });
});
