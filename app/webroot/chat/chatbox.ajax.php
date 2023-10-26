<?php //session_start();
include_once('../html/includes/config.php');

 
 $update_chat = mysql_query("UPDATE `chats` SET `read_status` = '1'
			WHERE (`from_id` = '".$_POST['id']."' or `from_id` = '".$_SESSION['corent_user']."') ") or die("Error in chats Update read_status: ".mysql_error());
$update_user = mysql_query("UPDATE master_users SET is_conv = '0'
WHERE id = '".$_POST['id']."' ") or die("Error in is_conv Update Logout: ".mysql_error());			
			
 if (!isset($_SESSION['online_user'])) {
   $_SESSION['online_user']= array('');
    }
  if (isset($_POST['add_chatuser']) && $_POST['add_chatuser']==true) {
    extract($_POST);
    $people =  $_SESSION['online_user'];
           
            if (!in_array($id, $people))
              {
                 array_push($_SESSION['online_user'],$id);
              }
 

  }


   if (isset($_POST['add_chatuser']) ) {
  $_SESSION['corent_user'] = $_POST['id'];
  
}


 ?>