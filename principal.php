<?php
require_once('TwitterAPIExchange.php');
require_once('class.postgresLogger.php');
require_once("class.postgresLogger.php");
require_once("abstract.databoundobject.php");
$settings = array(
    'oauth_access_token' => "1051849572459384833-0fnvFM6GfylwevB2u0ADJAPm02AXNI",
    'oauth_access_token_secret' => "07woaMc3WtakdbgTInH85tBsOFBj6HRFVsX6ULe5rGgK8",
    'consumer_key' => "odsMp44SxsIDMw5cTUBbdatI3",
    'consumer_secret' => "CNoiRUP2S9E5eo9D1WHTF2AyC7M6C4vk8ODI7cSuvdljAVvHlL"
);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=EvilAFM&count=1';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$data = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(); 

$data2 = json_decode($data);
$id_str = $data2[0]->id_str;
$text = $data2[0]->text;
$created_at = $data2[0]->created_at;
$id_str = $id_str . "RAUL";

$array = array(
  "id_str"=>$id_str,
  "text"=>$text,
  "created_at"=>$created_at
);
$url = "postgres://sample_db:root@localhost:5432/twitter";
$url = parse_url($url);

$postgres = new postgresLogger($url);
$postgres->writteMessage($array);

?>

