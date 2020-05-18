const enquiryId = new URL(window.location.href).pathname.split('/').pop();


// $(document).ready(() => {
//     setTimeout(() => {
//         main();
//         // console.log('ok')
//     }, 5000)
// })

// async function sendMessage () {
//     const messageInput = $('#summernote').summernote('code');

//     // Create a new message with the input field value
//     await app.service('messagess').create({
//       text: messageInput,
//       id: Math.random(),
//       chatRoomId: chatRoomId,
//       role: role
//     });

//     let setSchoolName = schoolName;

//     if(role == 1) {
//         setSchoolName = "administrator";
//     }

//     await app.service('notification').create({
//       from: userAppKey,
//       role: role,
//       chatRoomId: chatRoomId,
//       title: 'New message received',
//       subTitle: 'You have new message received from ' + setSchoolName,
//       message: messageInput,
//       url: script_url + "/enquiries/" + chatRoomId
//     });

//     messageInput.value = '';
// }
// function addMessage (message) {
    
  
//     let image = "http://via.placeholder.com/50/bfbfbf/FFF?text=CA";
//     let userName = authUserName + " (" + schoolName + ")";
//     if(message.role == 1) {
//         image = "http://via.placeholder.com/50/bfbfbf/FFF?text=AD";
//         userName = 'Oxforshire admin'

//     }
//     if(message.chatRoomId === chatRoomId) {
        
  
//         let html = `<div class="cui-apps-chat-block-item clearfix">
//                         <div class="cui-apps-chat-block-avatar">
//                         <a class="cui-avatar cui-avatar-50" href="#;">
//                             <img alt="Alternative text to the image" src="${image}">
//                         </a>
//                         </div>
//                         <div class="cui-apps-chat-block-content">
//                         <strong>${userName}
//                             <span class="cui-video-page-comment-time text-secondary pl-2">02 Jan 2020 10:25 am</span>
//                         </strong>
//                         <p class="mb-0 pt-3">
//                             ${message.text}
//                         </p>
//                         </div>
//                     </div>`;
//         $('#show-message-block').prepend(html);
//     }
// }

// const main = async () => {
//     // Find all existing messages
//     console.log(chatRoomId);
//     const messages = await app.service('messagess').find(
//         {
//             query:{
//                 chatRoomId: chatRoomId
//             }
//         }
//     );
//     // Add existing messages to the list
//     messages.forEach(addMessage);
//     // Add any newly created message to the list in real-time
//     app.service('messagess').on('created', addMessage);
// };
