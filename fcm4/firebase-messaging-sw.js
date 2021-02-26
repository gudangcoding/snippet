importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');
/*Update this config*/
var config = {
	apiKey: "AIzaSyCekuspXqWGg8Ak2t5GFtPgsPublWbuNZ4",
    authDomain: "boba-8e61b.firebaseapp.com",
    projectId: "boba-8e61b",
    storageBucket: "boba-8e61b.appspot.com",
    messagingSenderId: "379614847181",
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
console.log('[firebase-messaging-sw.js] Received background message ', payload);
// Customize notification here
const notificationTitle = payload.data.title;
const notificationOptions = {
body: payload.data.body,
  icon: payload.data.icon,
  image: payload.data.image,
  click_action: "https://www.examples.com/"+ payload.data.url, // To handle notification click when notification is moved to notification tray
data: {
click_action: "https://www.examples.com/"+ payload.data.url
}
};
self.addEventListener('notificationclick', function(event) {
console.log(event.notification.data.click_action);
if (!event.action) {
// Was a normal notification click
console.log('Notification Click.');
self.clients.openWindow(event.notification.data.click_action, '_blank')
event.notification.close();
return;
}else{
event.notification.close();
}
});
return self.registration.showNotification(notificationTitle,
notificationOptions);
});
// [END background_handler]