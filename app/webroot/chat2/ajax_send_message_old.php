<?php 
//session_start();
include_once '../html/includes/config.php';
extract($_POST);

if (isset($_POST['clearhistry'])) {
	
	$check_user_chat1 =  mysql_query("select * from chats where ((from_id= $from_id AND  to_id =$to_id) OR (from_id= $to_id AND  to_id =$from_id)) AND `clear_by_from` !='$from_id' ORDER BY `chat_date` ASC ") or die(mysql_error()) ;
	while ($check_user_chat_row1 = mysql_fetch_array($check_user_chat1)) {
	if($check_user_chat_row1['clear_status']=='0' ){
		//echo 1;
		
	mysql_query("UPDATE `chats` SET  `clear_by_from` ='$from_id',clear_status ='1' WHERE  cid='".$check_user_chat_row1['cid']."'");
	}else{
		//echo 0;
		mysql_query("DELETE FROM chats  WHERE cid='".$check_user_chat_row1['cid']."'");
	}
	}

}
if (isset($_POST['closetab'])) {
	
	if (array_search($to_id,$_SESSION['online_user'])) {
		$session = $_SESSION['online_user'];
		$rmid    =  array($_POST['to_id']);
		$_SESSION['online_user'] = array_diff( $session , $rmid );
		$_SESSION['corent_user'] = end($_SESSION['online_user']);
		echo json_encode($_SESSION['online_user']);
		$update_chat = mysql_query("UPDATE `chats` SET `read_status` = '1' WHERE `from_id` = '".$_POST['to_id']."' ") or die("Error in chats Update read_status: ".mysql_error());
    
	}
	die();

}

if (isset($_POST['sendmessageclick']) ) {
  $_SESSION['corent_user'] = $_POST['to_id'];
}
//echo "getting in";
if (isset($_POST['sendmessage'])) {
	$message1 = addslashes(trim($message));
	 
	 
	// print('INSERT INTO `chats` (`cid` ,`from_id` ,`to_id` ,`chat_message` ,`read_status` ,`clear_by_from`,`clear_by_to`,`chat_date`)VALUES (NULL , "'.$from_id.'", "'.$to_id.'", "'.$message1.'",0,0,0, NOW() )') ;
	 

							mysql_query('INSERT INTO `chats` (
							`cid` ,
							`from_id` ,
							`to_id` ,
							`chat_message` ,
							`read_status` ,
                            `clear_by_from`,
                            `clear_by_to`,
							`chat_date`
							)
							VALUES (NULL , "'.$from_id.'", "'.$to_id.'", "'.$message1.'",0,0,0, NOW() )') or die(mysql_error());
							$update_user = mysql_query("UPDATE master_users SET is_conv = '1' WHERE id = '".$from_id."' ") or die("Error in is_conv Update Logout: ".mysql_error());
							
							}

                                $frm_user = $_SESSION['user_id'];
								if($frm_user!="") {
                                $id = $to_id;
                                $frm_user_query =  mysql_query("select * from chats where ((from_id= $frm_user AND  to_id =$id) OR (from_id= $id AND  to_id =$frm_user)) AND clear_by_from !=$frm_user ORDER BY `chat_date` ASC ") or die(mysql_error()) ;
     # echo("select * from chats where ((from_id= $frm_user AND  to_id =$id) OR (from_id= $id AND  to_id =$frm_user)) AND clear_by_from !=$frm_user ORDER BY `chat_date` asc ");
                               ?>
                               <div id="chat_messages" >   
                               <?php
                                while ($mess = mysql_fetch_array($frm_user_query)) {
                                  ?>
                                    <?php if ($frm_user == $mess['from_id']); 
                                          $img_query = mysql_query("select avatar_image from  master_users where id =".$mess['from_id']);
                                          $img_query = mysql_fetch_object($img_query);
								}
								
								}?>

                         