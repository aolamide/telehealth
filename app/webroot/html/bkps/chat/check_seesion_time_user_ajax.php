<?php
include_once('includes/config.php');
if (isset($_GET['checksessiontime'])) {
$chat_history_sql =  mysql_query("select * from chats where from_id=".$_GET['user_id']."  ORDER BY `chat_date` DESC ") or die(mysql_error());	
$chat_history_row = mysql_fetch_array($chat_history_sql);
  
  $cur_date_time=strtotime(date("Y-m-d H:i:s"));
 $las_chat_time=strtotime($chat_history_row["chat_date"]);
 $session_start_time=$_SESSION['time'];

$diff = $cur_date_time-$las_chat_time;
$diff1 = $cur_date_time-$session_start_time;
if($diff > 100 && $diff1 > 100){
$update_user = mysql_query("UPDATE master_users SET is_online = '0'
WHERE mail_id = '".$_SESSION['email']."' AND pass = '".$_SESSION['password']."' AND user_id = '".$_SESSION['user_id']."' ") or die("Error in master_users Update Logout: ".mysql_error());



unset($_SESSION['password']);
unset($_SESSION['email']);
unset($_SESSION['user_id']);



session_destroy();
exit;
echo 1;


	
}else{
	echo 0;
	
}

}		
                   
?>

