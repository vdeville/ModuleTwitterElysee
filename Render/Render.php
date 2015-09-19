<?php

// Open JSON file and get the data
if(file_exists("..\\Data\\data.json")){
	$content = file_get_contents("..\\Data\\data.json");
	$content = json_decode($content);
	var_dump($content);	
}

