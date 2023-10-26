<?php
include_once('../html/includes/config.php');
  session_start();
 $page="Page: change_status.ajax.php ";
 
 $update_chat = mysql_query("UPDATE `chats` SET `read_status` = '1'
			WHERE `from_id` = '".$_POST['id']."' ") or die("$page Error in chats Update read_status: ".mysql_error());
$update_user = mysql_query("UPDATE master_users SET is_conv = '0'
WHERE id = '".$_POST['id']."' ") or die("$page Error in is_conv Update Logout: ".mysql_error());			
			
 if( isset($_REQUEST['regularapp']) && isset($_REQUEST['appid']) && $_REQUEST['appid']!=""  && $_SESSION['user_type']=='D'){

//echo "here u r";
$update_reg_conv = mysql_query("UPDATE regular_appointments SET is_conv='2', status='1',is_connected='0' WHERE id = '".$_REQUEST['appid']."' ") or die(" $page Error in is_conv Update Regular appointments Logout: ".mysql_error());		

unset($_SESSION['app_id']);	
unset($_SESSION['corent_user']);
unset($_SESSION['online_user']);
//disableuser($_REQUEST['id']);
	}	


 ?>