<?php

/*
===================================================================

	Copyright (C) 2015 Schweizerpunkt - Aliu Media
	All rights reserved.

	Redistribution, modification and personal use of this software 
	and its source code is prohibited and protected by law.
	
===================================================================
*/

	require_once('app_config.php');
    require_once __DIR__.'/sdk/vendor/autoload.php';    

    require_once('../sw_db.php');
	                                   
    $method = $_SERVER['REQUEST_METHOD'];

    if(!empty($method))
    {
        if (!empty($_GET) && 
			strcmp($method, 'GET') == 0 && 
			strcmp($_GET['hub_mode'], 'subscribe') == 0 && 
			$_GET['hub_verify_token'] == APP_VERIFYTOKEN) 
        {   
            echo $_GET['hub_challenge'];
        } 
        else 
        if (strcmp($method, 'POST') == 0) 
        {
            echo "POSZT VOLT";
            $updates = json_decode(file_get_contents("php://input"), true);
           // file_put_contents('updates.txt',$updates, FILE_APPEND);
            swUploadFacebookPost( $updates );
            echo "  updates=".$updates;
            /*if (isset( $_SERVER['HTTP_X_HUB_SIGNATURE'] ) ) 
            {
                $post_body = file_get_contents("php://input");

                $object = json_decode($post_body);
                 swUploadFacebookPost($post_body);

                if ($_SERVER['HTTP_X_HUB_SIGNATURE'] == 
                    "sha1=" . hash_hmac('sha1', $post_body, VERIFY_TOKEN)) 
                {
                    //REST OF THE CODE TO SAVE IN DB
                   swUploadFacebookPost($post_body);
                }
            }*/
        } else {
            echo "UNKNOWN METHOD: ".$method;
        }
    }
    else
    {
        echo "Invalid Request, might be for testing purpose";
    }
?>