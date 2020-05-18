/*
 * Original example found here: http://www.jquerybyexample.net/2012/05/how-to-move-items-between-listbox-using.html
 * Modified by Esau Silva to support 'Move ALL items to left/right' and add better stylingon on Jan 28, 2016.
 *
 */
 function strDes(a, b) {
   if (a.value>b.value) return 1;
   else if (a.value<b.value) return -1;
   else return 0;
 }

(function () {
    $('#btnRight').click(function (e) {
      e.preventDefault();
        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length == 0) {
            notification('Nothing to move!', 'danger');
            e.preventDefault();
        }
        $('#lstBox2').append($(selectedOpts).clone());
        $('#lstBox2 option').prop('selected', true);

        $.each($('#lstBox1').val(), (index, value) => {
          $('#lstBox2 option[value="'+value+'"]').prop('selected', true);
        });
        $(selectedOpts).remove();
        var data = [];
        $.each($('#lstBox2').val(), (index, value) => {
          data [index]= value;
        });
        $.ajax({
          url: script_url + '/save-timeslots',
          type: "POST",
          data: {data:data},
          success: function(response){
            if(response.status === true) {
            notification('Successfully updated!', 'success');
            }
            else{
              notification('Something went wrong..', 'error');
            }
          }
          });
    });

    $('#btnAllRight').click(function (e) {
      e.preventDefault();
        var selectedOpts = $('#lstBox1 option');
        if (selectedOpts.length == 0) {
            notification('Nothing to move!', 'danger');
            e.preventDefault();
        }
        $('#lstBox2').append($(selectedOpts).clone());
        $('#lstBox2 option').prop('selected', true);

        //$.each($('#lstBox1').val(), (index, value) => {
          $('#lstBox2 option').prop('selected', true);
        //});
        $(selectedOpts).remove();
        var data = [];
        $.each($('#lstBox2').val(), (index, value) => {
          data [index]= value;
        });
        $.ajax({
          url: script_url + '/save-timeslots',
          type: "POST",
          data: {data:data},
          success: function(response){
            if(response.status === true) {
            notification('Successfully updated!', 'success');
            }
            else{
              notification('Something went wrong..', 'error');
            }
          }
          });
    });

    $('#btnLeft').click(function (e) {
      e.preventDefault();
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            notification('Nothing to move!', 'danger');
            e.preventDefault();
            return false;
        }

        $('#lstBox1').append($(selectedOpts).clone());
        var data = [];
        $.each($('#lstBox2').val(), (index, value) => {
          data [index]= value;
        });
        $(selectedOpts).remove();
        $.ajax({
          url: script_url + '/delete-timeslots',
          type: "POST",
          data: {data:data},
          success: function(response){
            if(response.status === true) {
            notification('Successfully updated!', 'success');
            }
            else{
              notification('Something went wrong..', 'error');
            }
          }
          });
    });

    $('#btnAllLeft').click(function (e) {
        e.preventDefault();
        var selectedOpts = $('#lstBox2 option');
        if (selectedOpts.length == 0) {
            notification('Nothing to move!', 'danger');
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $('#lstBox2 option').prop('selected', true);
        var data = [];
        $.each($('#lstBox2').val(), (index, value) => {
          data [index]= value;
        });
        $(selectedOpts).remove();
        $.ajax({
          url: script_url + '/delete-timeslots',
          type: "POST",
          data: {data:data},
          success: function(response){
            if(response.status === true) {
            notification('Successfully updated!', 'success');
            }
            else{
              notification('Something went wrong..', 'error');
            }
          }
          });
    });
}(jQuery));
