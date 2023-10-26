<?php 
  session_start();
  include_once('includes/config.php');
  
 if (isset($_POST['sendmessageblink']) ) {
	
	$frm_user_query =  mysql_query("select * from chats where to_id =".$_POST['from_id']." AND read_status =0 ORDER BY `chat_date` ASC ") or die(mysql_error()) ;
	$count = mysql_num_rows($frm_user_query);
	//$count_row = mysql_fetch_array($frm_user_query);
	if($count>0){
	$new_array= array();
	 $chat_user = $_SESSION['online_user'];
	 while ($count_row = mysql_fetch_array($frm_user_query)) {
		
		
		array_push($new_array,$count_row['from_id']);
		
		
	}
	echo json_encode($new_array);
	}
	 //$update_chat = mysql_query("UPDATE `chats` SET `read_status` = '1' WHERE `from_id` = '".$_SESSION['corent_user']."' ") or die("Error in chats Update read_status: ".mysql_error());
}


 ?>