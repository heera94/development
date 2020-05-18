
// $(document).ready(() => {
//     initNotification();
//     // console.log(userAppKey);

// })


// function addNotificationMessage (message) {

//     if(message.role === role) {

//     }else {
//         setNotificationMessage(message);
//     }
// }

// function setNotificationMessage(message) {

//     sendNotification({
//         messageType: message.messageType,
//         title: message.title,
//         body: message.subTitle,
//         url: message.url
//     })
// }

// const initNotification = async () => {
//     // Find all existing messages
//     const messages = await app.service('notification').find(
//         {
//             query:{
//                 user: (role == 1) ? 'admin-data' : userAppKey
//             }
//         }
//     );

//     // Add existing messages to the list
//     messages.forEach(addNotificationMessage);
//     // Add any newly created message to the list in real-time
//     app.service('notification').on('created', addNotificationMessage);
// };

// function sendNotification(message) {


//     // Let's check if the browser supports notifications
//     if (!("Notification" in window)) {
//        console.log("This browser does not support desktop notification");
//     }

//     // Let's check if the user is okay to get some notification
//     else if (Notification.permission === "granted") {
//        // If it's okay let's create a notification
//        var notification = new Notification(message.title, {
//         icon: 'http://localhost:8000/images/oxfordshire-logo.png',
//         body: message.body,
//        });

//         notification.onclick = function() {
//             window.open(message.url);
//         }
//     }

//     // Otherwise, we need to ask the user for permission
//     // Note, Chrome does not implement the permission static property
//     // So we have to check for NOT 'denied' instead of 'default'
//     else if (Notification.permission !== 'denied') {
//        Notification.requestPermission(function (permission) {

//           // Whatever the user answers, we make sure we store the information
//           if(!('permission' in Notification)) {
//           Notification.permission = permission;
//           }

//           // If the user is okay, let's create a notification
//           if (permission === "granted") {
//           var notification = new Notification("Hi there!");
//           }
//        });
//     } else {
//        console.log(`Permission is ${Notification.permission}`);
//     }

//     // At last, if the user already denied any notification, and you 
//     // want to be respectful there is no need to bother him any more.
//  }



// Notification 