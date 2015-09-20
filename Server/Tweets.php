<?php

// Require
require "../twitteroauth/vendor/autoload.php";
require "Tweets.class.php";

// uses
use Abraham\TwitterOAuth\TwitterOAuth;

// Connection to Twitter API.
$CONSUMER_KEY = "";
$CONSUMER_SECRET = "";
$acces_token = "";
$acces_token_secret = "";

// list id
$list_id = 220539461;

// Create Object Tweets in order to use twitter API and retrieve the tweets.
$my_tweet = new Tweets($CONSUMER_KEY, $CONSUMER_SECRET, $acces_token, $acces_token_secret);
$tweets = $my_tweet->getTweetsFromList($list_id);
$tweets = $my_tweet->toDataArray($tweets);
$my_tweet ->transformToJson($tweets);

?>