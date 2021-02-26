<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCekuspXqWGg8Ak2t5GFtPgsPublWbuNZ4' );
$registrationIds = [
    "fZd8d2XG8t3b0whPaRwNWL:APA91bFbGMf9BvU9xdDXEhdfVlFaqFv7ZfCnrqAba0fjVOZb8-MBPZF4WDIU4AzZzGxjlniSBthoJ-ijGqDUZUS3wn6XY2KVut_AAlXA4P-WRyvnwHty7z4bNgjYnVvR3i4A0jj56Uv3"
];
// prep the bundle
$msg = array
(
    'message'   => 'here is a message. message',
    'title'     => 'This is a title. title',
    'subtitle'  => 'This is a subtitle. subtitle',
    'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
    'vibrate'   => 1,
    'sound'     => 1,
    'largeIcon' => 'large_icon',
    'smallIcon' => 'small_icon'
);
$fields = array
(
    'registration_ids'  => $registrationIds,
    'data'          => $msg
);
  
$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
);
  
$ch = curl_init();
//curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;