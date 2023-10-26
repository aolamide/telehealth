<?php
include_once('includes/config.php');
  session_start();
 
 $update_chat = mysql_query("UPDATE `chats` SET `read_status` = '1'
			WHERE `from_id` = '".$_POST['id']."' ") or die("Error in chats Update read_status: ".mysql_error());
$update_user = mysql_query("UPDATE master_users SET is_conv = '0'
WHERE user_id = '".$_POST['id']."' ") or die("Error in is_conv Update Logout: ".mysql_error());			
			
 


 ?>