
var resize = $('#upload-croper-image').croppie({
    enableExif: true,
    enableOrientation: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 400,
        height: 400
    }
});

$('#image').on('change', function () {
  var thisData = this;
  $('#crop-image-modal').modal('show');
  $('#crop-image-modal').on('shown.bs.modal', function () {
    initCroper(thisData);
  })
});


function initCroper(thisData){
   var reader = new FileReader();
     reader.onload = function (e) {
       resize.croppie('bind',{
         url: e.target.result
       }).then(function(){

       });
     }
     reader.readAsDataURL(thisData.files[0]);
 }

$('.upload-image').on('click', function (ev) {
  ev.preventDefault();
  $('#crop-image-modal').modal('hide');

  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {

      $('#hidden-image-field').val(img);
      html = '<img src="' + img + '" />';
      $("#preview-crop-image").html(html);

  });
});

$(document).ready(function() {
  
     var img =$('#hidden-image-field').val();
     $('#hidden-image-field').val(img);
     html = '<img src="' + img + '" />';
     $("#preview-crop-image").html(html);

    });
