<?php
	session_start();
	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id'=> '439023746527919',
		'app_secret'=>'d391783961f718daa157c96b2ae7b0f5',
		'default_graph_version'=>'v1.0'
	]);

	$helper=$FB->getRedirectLoginHelper();

?>