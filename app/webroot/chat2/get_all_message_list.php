<?php 
session_start();
include_once '../html/includes/config.php';
extract($_POST);

function get_tot_con($value='')
  {
    $frm_user = $_SESSION['user_id'];
    $id = $value;
    
     $frm_user_query =  mysql_query("select * from chats where ((from_id= $frm_user AND  to_id =$id) OR (from_id= $id AND  to_id =$frm_user)) AND clear_by_from !=$frm_user ORDER BY `chat_date` asc ") or die(mysql_error()) ;
     return mysql_num_rows($frm_user_query);
  }

$cuser =$_SESSION["corent_user"];
$users = mysql_query("SELECT * FROM `master_users` where id !=$cuser  ORDER BY `full_name` ASC ");

$juser = array( );
while ($user = mysql_fetch_array($users)) {
  $u_ser = $user["id"];
  $alluser= get_tot_con($u_ser);
  $juser[$user["id"]] =$alluser;
}

echo json_encode($juser);

?>