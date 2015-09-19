<?php

class Tweets extends Abraham\TwitterOAuth\TwitterOAuth{

    // Get all tweets from a list. (list must be public)
    function getTweetsFromList($list_id, $count = 10, $return_rts = true ){
        $statuses = self::get("lists/statuses", array("list_id" => $list_id, "count" => $count , "return_rts" => $return_rts));
        return $statuses;
    }

    // Get lists from a user
    function getListsFromUser($user_id){
        $statuses = self::get("lists/list", array("user_id" => $user_id));
        return $statuses;
    }

    // Transform complex recieved data from twitter into a classic / basic array
    function toDataArray($list_tweets){

        $clean_array = array();
        foreach($list_tweets as $id_array => $object){

            // Create simple array with clean data (no need to use the complex std object sended)
            $clean_array[$id_array]["created_at"] = $object->created_at;
            $clean_array[$id_array]["id_tweet"] = $object->id;
            $clean_array[$id_array]["text"] = $object->text;
            $clean_array[$id_array]["id_tweeter"] = $object->user->id;
            $clean_array[$id_array]["name"] = $object->user->name;
            $clean_array[$id_array]["screen_name"] = $object->user->screen_name;
            $clean_array[$id_array]["website_url"] = $object->user->url;

            // check if there is an image in the tweet
            if(!empty($object->retweeted_status->entities->media)){
                $media = $object->retweeted_status->entities->media;
                $media_obj = $media[0];
                $clean_array[$id_array]["media_id"] = $media_obj->id;
                $clean_array[$id_array]["media_url"] = $media_obj->media_url;
                $clean_array[$id_array]["media_type"] = $media_obj->type;
            }

        }

        return $clean_array;

    }

    // Transform simple array to JSON for client side (Display)
    function transformToJson(array $tweets){
        $handle = fopen("../Data/data.json", "w+");
        file_put_contents("../Data/data.json", json_encode($tweets));
    }
}