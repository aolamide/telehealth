<?php

/*
===================================================================

	Copyright (C) 2015 Schweizerpunkt - Aliu Media
	All rights reserved.

	Redistribution, modification and personal use of this software 
	and its source code is prohibited and protected by law.
	
===================================================================
*/

session_start();
	require_once "app_config.php";
	require_once __DIR__.'/sdk/vendor/autoload.php';	


	

	use Facebook\Facebook;
	use Facebook\FacebookSession;
	use Facebook\FacebookRequest;

	$fb = new Facebook([  
   	 'app_id' => APP_ID,
   	 'app_secret' => APP_SECRET,
   	 'default_graph_version' => 'v2.5',  
    ]);  

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email', 'manage_pages']; // Optional permissions
	$loginUrl = $helper->getLoginUrl(APP_LOGIN_CALLBACK_URL, $permissions);

	echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

?>