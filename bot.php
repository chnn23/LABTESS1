<?php
//$access_token = 's/0BKnNaoqFoLPOG3Zf9QUKg1Dgek7MIjbCx5/z+mmvPczY79Prf1miNvIoAtTXJpk8Y5EuQsFsJfRQUTDxiKeF5+JOC4QhDqt3UDcaqM0eNEOicRzrAbBWj8YZUsVMdu2D7eoIyp6UmLXWIOFs7iQdB04t89/1O/w1cDnyilFU=';
$access_token = '9hWwKNGC/3zn3lklmLLphmfajww1WPWkOntAPI8yrQjF76j6Pac/uLiE4GWgpPsT5q7JpObGKjzZPsLZUIKhU6tVwJWlhBcuzxmcl9Zjb7sn90yWIMiSNXRVXJBIA4Y+wAkxb3RNhE53ejo2qjLnOQdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            // Get text sent
            $text = $event['message']['text'];
            // Get replyToken
            $replyToken = $event['replyToken'];
            // Build message to reply back
            $messages = [
                'type' => 'text',
                'text' => $text,
            ];
            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';
            $data = [
                'replyToken' => $replyToken,
                'messages' => [$messages]
            ];
            $post = json_encode($data);
            $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            echo $result . "";
        }
    }
}
echo "OK";
