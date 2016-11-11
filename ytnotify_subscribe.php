<?

/// ~ Change these values! ~ ///

// YouTube channel ID
const CHANNELID = "REPLACE_WITH_CHANNEL_ID";

// Public callback URL
const CALLBACKURL = "REPLACE_WITH_CALLBACK_URL";

///   ///   ///  ///   ///   ///



$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://pubsubhubbub.appspot.com/subscribe",
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'hub.mode' => 'subscribe',
        'hub.topic' => 'https://www.youtube.com/xml/feeds/videos.xml?channel_id=' . CHANNELID,
        'hub.callback' => CALLBACKURL,
        'hub.verify' => 'sync'
    )
));
$response = curl_exec($curl);
curl_close($curl);

?>