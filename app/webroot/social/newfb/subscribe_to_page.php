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
function prettyPrint( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}
	require('app_config.php');
	require_once __DIR__.'/sdk/vendor/autoload.php';	

	$fb = new Facebook\Facebook([  
	    'app_id' => APP_ID,
	    'app_secret' => APP_SECRET,
	    'default_graph_version' => 'v2.4',  
	  ]);  


	// Get app access token
	/*$token_url =    "https://graph.facebook.com/oauth/access_token?" .
                "client_id=" . APP_ID .
                "&client_secret=" . APP_SECRET .
                "&grant_type=client_credentials";
	$app_token = file_get_contents($token_url);
	$app_token = explode('|', $app_token)[1];
	$_SESSION[APP_ACCESS_TOKEN_VAR] = $app_token;
*/
	$app_token = APP_ID . '|' . APP_SECRET;
echo $app_token."<br>";

	try {
	  $response = $fb->post('/'.APP_ID.'/subscriptions',
					['object' 		=> 'user',
					'callback_url' 	=> APP_PAGE_CALLBACK_URL,
					'fields' 		=> [
						'feed'
					],
					'verify_token' 	=> APP_VERIFYTOKEN,
					'access_token'  => $app_token],
					 $app_token);
	 var_dump($response);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}
		

	/*function subscribeToPosts($session) {	
		try {
			$request = new Facebook\FacebookRequest(
			  $session,
			  'POST',
			  '/'.APP_ID.'/subscriptions',
			  array(
				'object' 		=> 'page',
				'callback_url' 	=> APP_PAGE_CALLBACK_URL,
				'fields' 		=> 'feed',
				'verify_token' 	=> APP_VERIFYTOKEN
			  )
			);
			$response = $request->execute();
			echo "Suc";
		} catch (Facebook\FacebookRequestException $e) {
			echo "FacebookRequestException: " . $e->getMessage();
		} catch (Facebook\FacebookSDKException $e) {
			echo "FacebookSDKException: " . $e->getMessage();
		} catch (Exception $e) {
			echo "Exception: " . $e->getMessage();
		}
	}



	$session = new Facebook\FacebookSession($_SESSION[ACCESS_TOKEN_VAR]);
	
	try {
	  $session->validate();
	} catch (Facebook\FacebookRequestException $ex) {
	  echo $ex->getMessage();
	} catch (\Exception $ex) {
	  echo $ex->getMessage();
	}


	/*$helper = new FacebookJavaScriptLoginHelper();
	
	try {
		$session = $helper->getSession();
	} catch(FacebookRequestException $ex) {
		// When Facebook returns an error
	} catch(\Exception $ex) {
		// When validation fails or other local issues
	}
	if ($session) {
	  echo ("Logged in<br>");
	}
*/
	//subscribeToPosts($session);
?>