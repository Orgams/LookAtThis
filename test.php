<?php
include ("topPage.php");
echo convertColor(principal_color("http://www.google.com/s2/favicons?domain=https://habitrpg.com/"));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/videos/jm4QSA10sek');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    $xml   = new SimpleXMLElement($response);
    $title = (string) $xml->title;
    echo $title;
} else {
    // Error handling.
}
echo $title;
?>