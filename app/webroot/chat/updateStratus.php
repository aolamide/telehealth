<?php
include("../html/includes/config.php");
//print_r($_SESSION);
/*$username = $_POST["username"];
$hisusername = $_POST["hisusername"];
$stratus = $_POST["stratus"];
$message="";*/
 $username = $_SESSION["user_id"];
 $hisusername = $_SESSION["corent_user"];
$stratus = $_POST["stratus"];

$message='<a href=# onclick=webcamAccepted(\''.mysql_real_escape_string($_POST["username"]).'\',\''.$stratus.'\')>Click to accept webcam from </a>'.
mysql_real_escape_string($_POST["username"]).' for a webcam chat.';

$sql = "insert into chats (`from_id` , `to_id` , `chat_message` , `chat_date` , `stratus` , `action`,`hidden_id`) values ('".mysql_real_escape_string($username)."', '".mysql_real_escape_string($hisusername)."','".mysql_real_escape_string($message)."',NOW() , '$stratus', 1,$username)";
$exec=mysql_query($sql);
if($exec){
	return true;
		}
else 
return false;
?>
