document.writeln('<script src="' + script_url + '/js/lang/en/validation-messages.js"></script>');

//set if url not equal booking set tab to 1
var url =window.location.pathname;
var parts = url.split("/").reverse();
if(parts[1]!='bookings')
sessionStorage.setItem('tab',1);
// const socket = io('https://realtime.syntrio.in/');
// const app = feathers();
// // Register socket.io to talk to our server
// app.configure(feathers.socketio(socket));

setInterval(function() {
    //your jQuery ajax code
    $.ajax({
        url: script_url+'/check-unread-message',
        type: 'POST',
        data: {},
        success: function(response){

                              },
        error: function(error) {
            const el = document.createElement('div')
                el.innerHTML = ""

                swal({
                    title: "Oops...! Something wrong. Please try again.",
                    // text: "Please check your email id",
                    icon:"error",
                    // button: true,
                    content: el,
                });

            setTimeout(() => {

                //window.location.reload();
            }, 2000)

        }
            });
  }, 1000 * 60 * 10);
