<?php 
require_once 'includes/config.php'; 
  
//print_r($_SESSION);exit;
$update_user = mysql_query("UPDATE master_users SET is_online = '0'
WHERE email_id = '".$_SESSION['email']."' AND user_pass = '".$_SESSION['password']."' AND id = '".$_SESSION['user_id']."' ") or die("Error in master_users Update Logout: ".mysql_error());



unset($_SESSION['password']);
unset($_SESSION['email']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);




session_destroy();

header("Location: ".URL);
exit;

 ?>