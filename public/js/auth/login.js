$(document).ready(function() {
    let data = JSON.parse(localStorage.getItem('remamber-login'), '{}');
    if(data) {
       setTimeout(() => {
          $('input[name=remember_me]').prop('checked', true);
          $('input[name=email]').val(data.email);
          $('input[name=password]').val(data.password);
       }, 800)
    }else {
       if($('input[name=email]').val() || $('input[name=password]').val()) {

       }else {
          setTimeout(() => {
             $('input[name=email]').val('');
             $('input[name=password]').val('');
          }, 800)
       }
    }

    $(document).on('click', '.auth-form-btn', function() {
        $(this).html('<div class="loader-02 mr-2"></div> Please wait...');
        if($('input[name=remember_me]').is(':checked')){

        if($('input[name=email]').val() && $('input[name=password]').val()) {
            localStorage.setItem('remamber-login', JSON.stringify({
                email: $('input[name=email]').val(),
                password: $('input[name=password]').val()
            }));
        }
        }else{
        localStorage.removeItem('remamber-login');
        }
    });
    
});