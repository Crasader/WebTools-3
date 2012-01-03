<?php

global $debug;
global $format;

require_once("simple_html_dom.php");
require_once('curl.php');

// --------------------------------------------------------- prin obj
function printObj(&$obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

// --------------------------------------------------------- check if work in a string
function isWordInString($word, $str) {
	$wordsArray = explode(" ", $str);
	return in_array($word, $wordsArray);
}
// --------------------------------------------------------- nice outut
function output($obj) {
	global $format;
	if($format == 'php') {
		echo "<pre>";
		print_r($obj);
		echo "</pre>";
	}
	if($format == 'raw') {
		foreach($obj as $s) echo $s;
	}
	if($format == 'json') {
		echo json_encode($obj);
	}

}
// --------------------------------------------------------- clean white-sapce
function cleanWhiteSpace($str) {
	$clean = preg_replace('/(\s\s+|\t|\n)/', ' ', $str);
	if($clean[0] == ' ') $clean = substr($clean, 1);
	if($clean[strlen($clean)-1] == ' ') $clean = substr($clean, 0, strlen($clean)-1);
	
	return $clean;
}
// --------------------------------------------------------- check for imsdb  base url
function checkForBaseURL($url, $base) {
	$url	 = str_replace(' ', '%20', $url);
	$new_url = $url;
	if(!stristr($url, "http://")) {
		if($url[0] != "/") $url = "/".$url;
		$new_url = $base.htmlentities($url);
	}
	
	return $new_url;
}

?>