<?php 

// clean URLs

function cleanURL($url) {

 	$url = str_replace(array('http://','https://'), '', $url);
 	$url = rtrim($url, '/');

	return $url;
}

