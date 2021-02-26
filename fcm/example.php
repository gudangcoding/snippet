<?php

include_once('PushNotifications.php');

$fcm = new FCM();

$body = "hare krishna";
$data = ['test'=>'99', 'Test2'=>1947];

$token = [
    'fZd8d2XG8t3b0whPaRwNWL:APA91bFbGMf9BvU9xdDXEhdfVlFaqFv7ZfCnrqAba0fjVOZb8-MBPZF4WDIU4AzZzGxjlniSBthoJ-ijGqDUZUS3wn6XY2KVut_AAlXA4P-WRyvnwHty7z4bNgjYnVvR3i4A0jj56Uv3', 
    // 'ciAXznOu4xx:APA91bF7TctN8-PJgGxSqJQQjaQM0BZE6PXipX-uMO1Jqq6efttxu9V9JVNrDFwOaPUl22M0BTOTDsBHhOShKGv9nEDv1kKMoU6qiEqwDvTk4oPeXXc1qy9n9VeaIoR4vN1wQzj7bqu1', 
];
$title = 'Test';
$fcm->notification($token, $body, $data, $title);

// $fcm->topics('testTopics', null, 'hare krishna', $data);
