<?php 
/*
===================================================================

	Copyright (C) 2015 Schweizerpunkt - Aliu Media
	All rights reserved.

	Redistribution, modification and personal use of this software 
	and its source code is prohibited and protected by law.
	
===================================================================
*/

/*define('APP_ID',			'1032567883496002');
define('APP_SECRET',		'b53194e1ef0dbebed4dd2c60af3f85f1');
define('APP_URL', 			'https://11dsoftware.com/sw/');
//define('APP_ACCESSTOKEN',	'CAAOqux5EabkBAHUVXZAofXwZAqxZBJMCexkncPK6UN2rCORDXZBb2lqFnh0MqmS40Aei0IscS1kMJ6IloacWZAxjWpty4UZCFW81RyBwuVIUbdXjs4ZCTYnpUkfmxHsimWfx1J3goPcilyQtAp5SRZByIUkpn4PcZALaPgzwyhRInd0TbMS1e9I57QFSvvZAz4oeCbPthAJZA0uK9OX5mc6aTTd');
define('APP_VERIFYTOKEN',	'raehzeazv463464745rtg');

define('APP_LOGIN_CALLBACK_URL', APP_URL . 'backend/social/facebook/login_callback.php');
define('APP_PAGE_CALLBACK_URL' , APP_URL . 'backend/social/facebook/updates_callback.php');

define('FACEBOOK_SDK_V4_SRC_DIR',  __DIR__ .'/sdk/vendor/facebook/php-sdk-v4/src/Facebook');

define('ACCESS_TOKEN_VAR', md5('fb_access_token'));
define('APP_ACCESS_TOKEN_VAR', md5('fb_app_access_token'));*/

define('APP_ID',			'960489400706726');
define('APP_SECRET',		'8f4e0b09efe5fd78d17e308988bf2cd4');
define('APP_URL', 			'https://www.inhealthng.com/social/newfb/');
define('APP_ACCESSTOKEN',	'CAACEdEose0cBAHajteAIBuDRxAgkTN0dzrr4oHOZBw55mZAtiIHRDdg2cxODkqXGXCrQ2CRwQsKOOOSlQWJwR6oPeimQkVcBy9rwmwOAwAS0VT9iCQOZAJBGIsdoc6IBg7C2cFAYYXzGi34cQTuMMwGmn3CVoqwVwZAiahNpYcKpRmchryVZCrrXbpGs8krkBv7Hu88YnelZCb0wxZBM8GD');
//define('APP_VERIFYTOKEN',	'ccf0d2ecd9bf0a55d24b69ac6078c594');

define('APP_LOGIN_CALLBACK_URL', APP_URL . '/login_callback.php');
define('APP_PAGE_CALLBACK_URL' , APP_URL . '/updates_callback.php');

define('FACEBOOK_SDK_V4_SRC_DIR',  __DIR__ .'/sdk/vendor/facebook/php-sdk-v4/src/Facebook');

define('ACCESS_TOKEN_VAR', md5('fb_access_token'));
define('APP_ACCESS_TOKEN_VAR', md5('fb_app_access_token'));

/*
Facebook Login Integration

(Required for application validation by facebook review team)
I sent them these instructions:



with the new php-sdk:

1) create a new Facebook instance with app_id, app_secret[, default_graph_version]
2) get the redirectLoginHelper from this instance
3) get the login url with helper->getLoginUrl(APP_LOGIN_CALLBACK_URL, permissions), where APP_LOGIN_CALLBACK_URL is the next page where the user is redirected to after authorizing the application. permissions is an array containing required permissions by the application. can be an empty array.

4) in the login callback script, instantiate a new Facebook instance again and get the redirect login helper. after that, an accessToken can be required with helper->getAccessToken()
5) if not isset($accessToken), then we know there were authorization problems and exit the script with detailed description of its reasons.
6) if $accessToken is set, an OAuth2Client is created with $fb->getOAuth2Client().
7) we need a tokenMetaData, set by OAuth2Client->debugToken($accessToken) function.
8) now application id can be validated with this tokenMetaData with validateAppId function
9) next step is to validate expiration
10) if the access token is not long lived, we need exchange this short-lived access token for a long-lived one using the oauth2client->getLongLivedAccessToken($accessToken)
11) if everything went ok, that is, no exceptions were thrown, we can do $_SESSION['some_var_id_for_access_token'] = $accessToken to be able to use this accessToken for further operations in this session



!!!!!!!!!!!
Please note, that we'll only use facebook Pages Real-Time API on our backend, used only by myself (the developer) and my client. Facebook app will not be publicly used. 

I cannot send you many screenshots because we only have a login (authorize) feature and every other operation is done on the backend by php scripts. We'd like to synchronize our database's content with the Pages' feeds: add new post to our DB when a new post is added on a Page that has authorized the application.

!!!!!!!!!!!
?>