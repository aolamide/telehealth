<?php
 require_once 'includes/config.php'; 
if (isset($_POST['edit']) && !empty($_POST['id'])) {
	
	extract($_POST);

	$userqu  = mysql_query("SELECT * FROM master_users WHERE user_id =$id") or die(mysql_error());	
	$user_data = mysql_fetch_object($userqu);
	$password=$user_data->pass;
	$main_pass=base64_decode($password);
	
	echo $x= $main_pass."&".json_encode($user_data);
}


if (isset($_POST['editprofile'])) {
	$post = array_map('trim',$_POST);
	
	
	extract($post);
	$edit_password =base64_encode($edit_password);
 mysql_query("UPDATE `master_users` SET `full_name` = '$edit_name',
`chat_name` = '$edit_cname',
`mail_id` = '$edit_email',
`pass` = '$edit_password' WHERE `user_id` =$editprofile") or die(mysql_error());


}


if (isset($_POST['emailid']) && $_POST['emailid'] !='') {
	$emailid =$_POST['emailid'];
	$q = mysql_query("SELECT * FROM `master_users` WHERE `mail_id` LIKE '%$emailid%' ");
	
	if (mysql_num_rows($q)>0) {
		echo(2);
	}else{
		echo(1);
	}
}



if (isset($_POST['changestatus']) && isset($_POST['c_id'])) {
	extract($_POST);
	mysql_query("UPDATE `master_users` SET `is_active` = '$c_val' WHERE `user_id` = $c_id");
}
 ?>