<?php
  define('SERVER_API_KEY', 'AIzaSyCekuspXqWGg8Ak2t5GFtPgsPublWbuNZ4');
  require 'DbConnect.php';
  $db = new DbConnect;
  $conn = $db->connect();
  $stmt = $conn->prepare('SELECT * FROM tokens');
  $stmt->execute();
  $tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($tokens as $token) {
    $registrationIds[] = $token['token'];
  }
  $header = [
    'Authorization: Key=' . SERVER_API_KEY,
    'Content-Type: Application/json'
  ];
  $msg = [
    'title' => 'FCM Notification',
    'body' => 'FCM Notification from codesolution',
    'icon' => 'img/icon.png',
    'image' => 'img/c.png',
  ];
  $payload = [
    'registration_ids'  => $registrationIds,
    'data'        => $msg
  ];
  $curl = curl_init();
  curl_setopt_array($curl, array(
   CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => json_encode( $payload ),
   CURLOPT_HTTPHEADER => $header
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
   echo "cURL Error #:" . $err;
  } else {
   echo $response;
  }
?>