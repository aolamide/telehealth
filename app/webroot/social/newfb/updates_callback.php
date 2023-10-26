<?php

/*
https://developers.facebook.com/docs/graph-api/webhooks/v2.5

https://developers.facebook.com/docs/graph-api/reference/page/subscribed_apps
*/

	require_once('app_config.php');
    require_once __DIR__.'/sdk/vendor/autoload.php';    

   // require_once "../../../config/Server.php";
   //	require_once "../../utils/dbUtils.php";
	//require_once "../../utils/mapUtils.php";
mail('ashok.ifresher@gmail.com', 'indCame updte from FB', 'te');
mail('jabahar.pm@maastrixsolutions.com', 'indCame updte from FB', 'te');
	function swUploadFacebookPost($data)
	{
		_swConnect();
		_swQuery("INSERT INTO chunk_0_0( content, name ) 
				  VALUES( '".$data."', 'fb_post' );");
		return array( "result" => "success" );
	}


		                                   

	$method = $_SERVER['REQUEST_METHOD'];

	if ($method == 'GET' && 
		$_GET['hub_mode'] == 'subscribe'// && 
		//$_GET['hub_verify_token'] == APP_VERIFYTOKEN
		) {
	    echo $_GET['hub_challenge'];
		//echo "this makes it wrong.";
	 	//swUploadFacebookPost( "received a GET request from fb" );
	} else if ($method == 'POST') {
	    //swUploadFacebookPost( "received a POST request from fb" );
	    $updates = json_decode(file_get_contents("php://input"), true);
	    // Here you can do whatever you want with the JSON object that you receive from FaceBook.
	    // Before you decide what to do with the notification object you might aswell just check if
	    // you are actually getting one. You can do this by choosing to output the object to a textfile.
	    // It can be done by simply adding the following line:
	     file_put_contents('updates.txt',$updates, FILE_APPEND);

mail('ashok.ifresher@gmail.com', 'Came updte from FB', var_dump($_POST));
	    mail('jabahar.pm@maastrixsolutions.com', 'Came updte from FB', var_dump($_POST));
	    
	    //swUploadFacebookPost( $updates );
	    error_log('updates = ' . print_r($obj, true));
	}

	
//mail('jabahar.pm@maastrixsolutions.com', 'Indirect Came updte from FB', var_dump($_POST));
	//mail('jabahar.pm@maastrixsolutions.com', 'Came updte from FB', var_dump($_POST));

?>