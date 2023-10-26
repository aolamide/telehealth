<?php

require_once 'app_config.php';


?>
<html>
<head>
</head>
<body>


<?php

	if (!isset($_REQUEST['asdf'])) 
	{
		die("Invalid link error <br>");
	}

	$encCompanyId = $_REQUEST['asdf'];

	$authUrl = 'https://api.instagram.com/oauth/authorize/?'.
				'client_id=' . INSTAGRAM_APP_CLIENTID .
				'&redirect_uri='. INSTAGRAM_REDIRECT_URI . "?asdf={$encCompanyId}".
				'&response_type=code';

	
	echo "<a href='{$authUrl}'>LOGIN TO INSTAGRAM TO AUTHORIZE APP</a>";


?>

	
</body>
</html>

