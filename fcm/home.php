<html>
<title>Firebase Messaging Demo</title>
<style>
    div {
        margin-bottom: 15px;
    }
</style>
<body>
    <div id="token"></div>
    <div id="msg"></div>
    <div id="notis">tes</div>
    <div id="err"></div>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script>
        MsgElem = document.getElementById("msg");
        TokenElem = document.getElementById("token");
        NotisElem = document.getElementById("notis");
        ErrElem = document.getElementById("err");
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
        var config = {
            apiKey: "AIzaSyCekuspXqWGg8Ak2t5GFtPgsPublWbuNZ4",
            authDomain: "boba-8e61b.firebaseapp.com",
            projectId: "boba-8e61b",
            storageBucket: "boba-8e61b.appspot.com",
            messagingSenderId: "379614847181",
            appId: "1:379614847181:web:0d58a94de0456bda46c984",
            measurementId: "G-ZN1367XKZG"
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                TokenElem.innerHTML = "token is : " + token
            })
            .catch(function (err) {
                ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });

             messaging.onMessage((payload) => {
                console.log('Message received. ', payload.notification);
                // Update the UI to include the received message.
                NotisElem.innerHTML =  NotisElem.innerHTML + "; " + payload.notification.title
                appendMessage(payload);
              });
             messaging.onBackgroundMessage(function(payload) {
              console.log(payload.notification);
              // Customize notification here
              const notificationTitle = 'Background Message Title';
              const notificationOptions = {
                body: 'Background Message body.',
                icon: '/snippet/fcm/firebase-logo.png'
              };

              self.registration.showNotification(notificationTitle,
                notificationOptions);
            });
    </script>

    </body>

</html>