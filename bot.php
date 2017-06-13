<?php
/**
 * Created by PhpStorm.
 * User: napa
 * Date: 6/11/2017 AD
 * Time: 2:16 AM
 */

$access_token = 'DMN0AvauoUylpekM9kuZ8/rLFA8X5u2HbpGNJ6EYVcMiYAhEQ9ew8ynz8KDSkVEcOtWPy8OqUYv2BJjAkKw6B/KD/OJFjz4Vj72oSORkTZYrN59b9jlJ9LTnX1cyjZLlifTfZ45C+fOHIQrL9HFdjwdB04t89/1O/w1cDnyilFU=';

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

            if($text == "สวัสดี") {
                $text = "สวัสดีน้อง";
            } else if($text == "สาด") {
                $text = "ดากูหรอสาด";
            }
            $messages = [
                'type' => 'text',
                'text' => $text
            ];

            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';
            $data = [
                'replyToken' => $replyToken,
                'messages' => [$messages],
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

            echo $result . "\r\n";
        }
    }
}
echo "OK";

//$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
//$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '38c1e8741e77c4e57696011dc2599392']);