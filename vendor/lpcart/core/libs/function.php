<?php

function debug($var){
	echo '<pre>' . print_r($var, true) . '</pre>';
}

function redirect($http = false) {
	if ($http) {
		$redirect = $http;
	}else{
		$redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : PATH;
	}
	header("Location: $redirect");
	exit;
}

function h($str){
	return htmlspecialchars($str , ENT_QUOTES);
}




