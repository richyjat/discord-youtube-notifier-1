<?php

/// ~ Change these values! ~ ///

// YouTube channel ID(s)
// Can be multiple channels - eg: `array("aaaaaaaaaaaaaaaaaaaa", "bbbbbbbbbbbbbbbbbbbb")`
const CHANNELIDS = array("https://www.youtube.com/channel/UCzk2btk4tPKY51623g0V7eQ");

// Public callback URL
const CALLBACKURL = "https://www.youtube.com/channel/UCzk2btk4tPKY51623g0V7eQ";

// Secret - must match ytnotify.php; should be reasonably hard to guess
const SECRET = "sdZfY4K981Qx1CaYfxwaFaFVkZkqryXJ";

///   ///   ///  ///   ///   ///


foreach (CHANNELIDS as $chid) {
    echo "Subscribing to $chid...\n";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pubsubhubbub.appspot.com/subscribe",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'hub.mode' => 'subscribe',
            'hub.topic' => 'https://www.youtube.com/xml/feeds/videos.xml?channel_id=' . $chid,
            'hub.callback' => CALLBACKURL,
            'hub.secret' => SECRET,
            'hub.verify' => 'sync'
        ),
        CURLOPT_RETURNTRANSFER => TRUE
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    echo "$response\n";
}

echo "Done.\n";

?>
