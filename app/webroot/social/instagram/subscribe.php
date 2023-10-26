<?php

/*
	
	HELPFUL DOCS:
	https://www.instagram.com/developer/subscriptions/

*/


require_once 'app_config.php';

require 'php-instagram-lib/phpirt.php';

$irt = new InstagramRealTime(
	INSTAGRAM_APP_CLIENTID,
	INSTAGRAM_APP_CLIENTSECRET,
	INSTAGRAM_CALLBACK_URL);

// $irt->addSubscription('tag', 'media', 'nyc');
// $irt->addSubscription('tag', 'media', 'hq');
// $irt->addSubscription('tag', 'media', 'catan');
// $irt->listSubscriptions();
// $irt->deleteSubscription('all');

//$response = $irt->addSubscription('tag', 'media', 'nyc');

/*$response = $irt->generic(
	'/subscriptions/',
	array(
		'client_id' 	=> INSTAGRAM_APP_CLIENTID,
		'client_secret' => INSTAGRAM_APP_CLIENTSECRET,
		'object'		=> 'user',
		'aspect'		=> 'media',
		'verify_token'	=> INSTAGRAM_APP_VERIFYTOKEN,
		'callback_url'	=> INSTAGRAM_CALLBACK_URL
	)
);*/

$curl = $irt->getCurl();

$response = $curl->post(
	'https://api.instagram.com/v1/subscriptions/', 
	array(
		'client_id' 	=> INSTAGRAM_APP_CLIENTID,
		'client_secret' => INSTAGRAM_APP_CLIENTSECRET,
		'object'		=> 'user',
		'aspect'		=> 'media',
		'verify_token'	=> INSTAGRAM_APP_VERIFYTOKEN,
		'callback_url'	=> INSTAGRAM_CALLBACK_URL
	)
);


//echo INSTAGRAM_CALLBACK_URL . "<br>";

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
echo "<pre>";print_r($response);echo "</pre>";
//echo json_encode($response, JSON_PRETTY_PRINT) . "<br>";
//echo "<br><br>";
//echo prettyPrint(json_encode($response)) . "<br>";

?>