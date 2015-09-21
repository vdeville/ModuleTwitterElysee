<?php

// Require
require "../twitteroauth/vendor/autoload.php";
require "Tweets.class.php";

// uses
use Abraham\TwitterOAuth\TwitterOAuth;

// Connection to Twitter API.
$CONSUMER_KEY = "yOwiEYUgD6w0b6ONYfinOq9NX";
$CONSUMER_SECRET = "YLBBee9lUp1ujWZmii81YS4CUUHsNzSef313veP8WQXlf9nJhx";
$acces_token = "967873903-4dcn4QVyvg2W7hXTisSdSQKgAhWhOvkTLcC18pdP";
$acces_token_secret = "9ld1p08wfktu54ywd577RSCZsq1cEyUcDLJOdS5oB7ULS";

// list id
$list_id = 220539461;

// Create Object Tweets in order to use twitter API and retrieve the tweets.
$my_tweet = new Tweets($CONSUMER_KEY, $CONSUMER_SECRET, $acces_token, $acces_token_secret);
$tweets = $my_tweet->getTweetsFromList($list_id);
$tweets = $my_tweet->toDataArray($tweets);
$my_tweet ->transformToJson($tweets);

?>