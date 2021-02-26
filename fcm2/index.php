<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello World!</title>
</head>

<body>
    <div>Tes</div>
    <div id="token"></div>
    <div id="pesan"></div>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://apps.boba-indonesia.id/admina/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
    <script type="text/javascript">
    	var config = {
            apiKey: "AIzaSyCekuspXqWGg8Ak2t5GFtPgsPublWbuNZ4",
            authDomain: "boba-8e61b.firebaseapp.com",
            projectId: "boba-8e61b",
            storageBucket: "boba-8e61b.appspot.com",
            messagingSenderId: "379614847181",
            appId: "1:379614847181:web:0d58a94de0456bda46c984",
            measurementId: "G-ZN1367XKZG"
        };
		// Initialize Firebase
		firebase.initializeApp(config);
		var messaging = firebase.messaging();
		navigator.serviceWorker.register('./assets/js/firebase-messaging-sw.js')
		.then(function (registration) {
		    /** Since we are using our own service worker ie firebase-messaging-sw.js file */
		    messaging.useServiceWorker(registration);

		    /** Lets request user whether we need to send the notifications or not */
		    messaging.requestPermission()
		        .then(function () {
		            /** Standard function to get the token */
		            messaging.getToken()
		            .then(function(token) {
		                /** Here I am logging to my console. This token I will use for testing with PHP Notification */
		                console.log(token);
		                $("#token").text(token);
		                /** SAVE TOKEN::From here you need to store the TOKEN by AJAX request to your server */
		            })
		            .catch(function(error) {
		                /** If some error happens while fetching the token then handle here */
		                updateUIForPushPermissionRequired();
		                console.log('Error while fetching the token ' + error);
		            });
		        })
		        .catch(function (error) {
		            /** If user denies then handle something here */
		            console.log('Permission denied ' + error);
		        })
		})
		.catch(function () {
		    console.log('Error in registering service worker');
		});

		/** What we need to do when the existing token refreshes for a user */
		messaging.onTokenRefresh(function() {
		    messaging.getToken()
		    .then(function(renewedToken) {
		        console.log(renewedToken);
		        /** UPDATE TOKEN::From here you need to store the TOKEN by AJAX request to your server */
		    })
		    .catch(function(error) {
		        /** If some error happens while fetching the token then handle here */
		        console.log('Error in fetching refreshed token ' + error);
		    });
		});

		// Handle incoming messages
		messaging.onMessage(function(payload) {
			$("#pesan").text(payload.notification);
		    console.log(payload.notification);
		    const notificationTitle = 'ON MESSAGE TITLE';
		    const notificationOptions = {
		        body: 'Data Message body',
		        icon: 'https://c.disquscdn.com/uploads/users/34896/2802/avatar92.jpg',
		        image: 'https://c.disquscdn.com/uploads/users/34896/2802/avatar92.jpg'
		    };

		    return self.registration.showNotification(notificationTitle, notificationOptions);
		});

		messaging.setBackgroundMessageHandler(function(payload) {
		    const notificationTitle = 'BACKGROUND MESSAGE TITLE';
		    const notificationOptions = {
		        body: 'Data Message body',
		        icon: 'https://c.disquscdn.com/uploads/users/34896/2802/avatar92.jpg',
		        image: 'https://c.disquscdn.com/uploads/users/34896/2802/avatar92.jpg'
		    };

		    return self.registration.showNotification(notificationTitle, notificationOptions);
		});

		// Send the Instance ID token your application server, so that it can:
		// - send messages back to this app
		// - subscribe/unsubscribe the token from topics
		function sendTokenToServer(currentToken) {
		    if (!isTokenSentToServer()) {
		        console.log('Sending token to server...');
		        // TODO(developer): Send the current token to your server and save in database.
		        setTokenSentToServer(true);
		    } else {
		        console.log('Token already sent to server so won\'t send it again ' +
		            'unless it changes');
		    }
		}

		function isTokenSentToServer() {
		    return window.localStorage.getItem('sentToServer') == 1;
		}

		function setTokenSentToServer(sent) {
		    window.localStorage.setItem('sentToServer', sent ? 1 : 0);
		}
    </script>
</body>

</html>