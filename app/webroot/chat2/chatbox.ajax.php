<?php //session_start();
include_once('../html/includes/config.php');
  
 
 $update_chat = mysql_query("UPDATE `chats` SET `read_status` = '1'
			WHERE (`from_id` = '".$_POST['id']."' or `from_id` = '".$_SESSION['corent_user']."') ") or die("Error in chats Update read_status: ".mysql_error());
$update_user = mysql_query("UPDATE master_users SET is_conv = '0' WHERE id = '".$_POST['id']."' ") or die("Error in is_conv Update Logout: ".mysql_error());

if( isset($_REQUEST['regularapp']) && $_SESSION['user_type']=='D'){

//echo "here u r";
$update_reg_conv = mysql_query("UPDATE regular_appointments SET status=1,is_conv=1 WHERE id = '".$_REQUEST['appid']."' ") or die("Error in is_conv Update Regular appointments Logout: ".mysql_error());	

$expire_stamp = date('Y-m-d H:i:s', strtotime("+5 min"));
$now_stamp    = date("Y-m-d H:i:s");

$_SESSION['expire_stamp']=$expire_stamp;
$_SESSION['now_stamp']=$now_stamp;


$nextchatsql=mysql_query(" SELECT * FROM `regular_appointments` WHERE id = (select min(id) from  regular_appointments where doctorid=".$_SESSION['user_type']." id>".$_REQUEST['appid'].")");
$nextchat=mysql_fetch_array($nextchatsql);
//print_r($nextchat);
$_SESSION['nextchatid']=$nextchat['id'];
		
	}		
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