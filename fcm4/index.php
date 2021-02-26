<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Web notification</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://www.gstatic.com/firebasejs/5.8.3/firebase.js"></script>
<script>
// Initialize Firebase
/*Update this config*/
var config = {
   	apiKey: "AIzaSyCekuspXqWGg8Ak2t5GFtPgsPublWbuNZ4",
    authDomain: "boba-8e61b.firebaseapp.com",
    projectId: "boba-8e61b",
    storageBucket: "boba-8e61b.appspot.com",
    messagingSenderId: "379614847181",
};
firebase.initializeApp(config);
//Retrieve Firebase Messaging object
const messaging = firebase.messaging();
  messaging.requestPermission()
  .then(function() {
   console.log('Notification permission granted.');
   // TODO(developer): Retrieve an Instance ID token for use with FCM.
   if(isTokenSentToServer()) {
     console.log('Token already saved.');
   } else {
     getRegToken();
   }
  })
  .catch(function(err) {
   console.log('Unable to get permission to notify.', err);
  });
  function getRegToken(argument) {
    messaging.getToken()
     .then(function(currentToken) {
     	console.log(currentToken);
     if (currentToken) {
     //saveToken(currentToken);
     var token = currentToken;
   var device_id = '<?php echo md5($_SERVER['HTTP_USER_AGENT']); ?>';
     console.log(token, device_id);
     saveToken(token, device_id);
     } else {
     console.log('No Instance ID token available. Request permission to generate one.');
     //setTokenSentToServer(false);
     }
     })
     .catch(function(err) {
     console.log('An error occurred while retrieving token. ', err);
     // setTokenSentToServer(false);
     });
  }
  function setTokenSentToServer(token, device_id) {
   window.localStorage.setItem('sentToServer', sent ? 1 : 0);
  }
  function isTokenSentToServer() {
   return window.localStorage.getItem('sentToServer') == 1;
  }
  function saveToken(currentToken, deviceid) {
    $.ajax({
      url: 'action.php',
      method: 'post',
      data: {'device_id':deviceid, 'token':currentToken}
    }).done(function(result){
      console.log(result);
    })
  }
  messaging.onMessage(function(payload) {
   console.log("Message received. ", payload);
   var notificationTitle = payload.data.title;
   const notificationOptions = {
      body: payload.data.body,
      icon: payload.data.icon,
      image: payload.data.image,
      click_action: "https://www.boba-indonesia.id/"+ payload.data.url, // To handle notification click when notification is moved to notification tray
          data: {
              click_action: "https://www.boba-indonesia.id/"+ payload.data.url
          }
    };
   var notification = new Notification(notificationTitle,notificationOptions);
  });
</script>
</head>
<body>
</body>
</html>