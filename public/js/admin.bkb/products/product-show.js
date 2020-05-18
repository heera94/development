$(document).on("click",".cui-ecommerce-product-photos-item img",function (e) {
  
  let image = $(this).attr('src');
  $('#product-primary-image').attr('src', image);
  $('.cui-ecommerce-product-photos-item').removeClass('cui-ecommerce-product-photos-item-active');
  $(this).parent().addClass('cui-ecommerce-product-photos-item-active');

});
