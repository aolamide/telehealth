<?php

require_once 'app_config.php';
require_once 'php-instagram-lib/phpirt.php';

//require_once "../../../config/Server.php";
//require_once "../../utils/dbUtils.php";
//require_once "../../utils/companyUtils.php";
//require_once "../company_social_link.php";


if (!isset($_GET['code'])) {
	echo "Code is not set. Something went wrong.<br>";
	exit();
} else {

	$is_companyId 	= isset($_GET['asdf']);

	if (!$is_companyId) 
	{
		die("Some parameters are not set");
		
	} 
	$encCompanyId = $_GET['asdf'];

	$code = $_GET['code'];

	echo "code to be exchanged is: " . $code . "<br>";

	$irt = new InstagramRealTime(
		INSTAGRAM_APP_CLIENTID,
		INSTAGRAM_APP_CLIENTSECRET,
		INSTAGRAM_CALLBACK_URL);

	$curl = $irt->getCurl();

	$response = $curl->post(
		'https://api.instagram.com/oauth/access_token', 
		array(
			'client_id' 	=> INSTAGRAM_APP_CLIENTID,
			'client_secret' => INSTAGRAM_APP_CLIENTSECRET,
			'grant_type'	=> 'authorization_code',
			'redirect_uri'	=> INSTAGRAM_REDIRECT_URI . "?asdf={$encCompanyId}",
			'code'			=> $code
		)
	);

	/*
	example response:
	{"access_token":"2871792723.2c6e34e.7bc2a57aa0db4f5b8836d709388ea63e","user":{"username":"onemillionreasonsproject","bio":"","website":"","profile_picture":"https:\/\/scontent.cdninstagram.com\/t51.2885-19\/11906329_960233084022564_1448528159_a.jpg","full_name":"onemillion","id":"2871792723"}}
	*/


	$respObj = json_decode($response);
	var_dump($respObj);
	echo "<br>";
	$instagramAccessToken = $respObj->{'access_token'};
	$instagramUserId 	  = $respObj->{'user'}->{'id'};

	/*$cid =  CompanyUtils::decodeCompanyId($encCompanyId);
	setCompanyInstagramInfo(
		$cid, 
		$instagramUserId,
		$instagramAccessToken
	);
	echo "Decoded company id = " . $cid . "<br>";
	echo "Success!<br>";*/




	/*echo "YOUR INSTAGRAM ID: {$instagramId} <br>";
	echo "YOUR INSTAGRAM ACCESS TOKEN: {$accessToken} <br>";*/

	echo "<br>";
	//echo $response . "<br>";


	// update company table entry with instagram_id, instagram_token

	//echo "well, hello there, you're here!<br>";
	//echo "we will receive your instagram posts from now on.<br>";
}
?>