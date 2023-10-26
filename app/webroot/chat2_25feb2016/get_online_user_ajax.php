<?php

include_once('includes/config.php');
//print_r($_SESSION);
//var_dump($_SESSION);

/*$where1="patientid=".$_SESSION['user_id']." AND status=1 AND is_connected=0 AND `is_conv` = 2 AND date(created)='".date('Y-m-d')."' AND doctorid='".$_SESSION['doc_id']."'";
  echo $chk_app1="SELECT * FROM regular_appointments WHERE ".$where1."  ORDER BY orderno desc";*/
  
/*if (isset($_SESSION['nextchatid']) && !empty($_SESSION['nextchatid'])){
	if($_SESSION['now_stamp']<=$_SESSION['expire_stamp']){
		mysql_query("update regular_appointments set status=0 where id=".$_SESSION['nextchatid']);
		
		}	
	}*/
	//print_r($_SESSION);exit;
$chat_history_sql =  mysql_query("select * from chats where from_id=".$_GET['user_id']."  ORDER BY `chat_date` DESC ") or die(mysql_error());	
$chat_history_row = mysql_fetch_array($chat_history_sql);
  $cur_time=date("H:i:s");
  $cur_date_time=strtotime(date("Y-m-d H:i:s"));
 $las_chat_time=strtotime($chat_history_row["chat_date"]);
 $session_start_time=$_SESSION['time'];

$diff = $cur_date_time-$las_chat_time;
$diff1 = $cur_date_time-$session_start_time;

if($diff > 18000 && $diff1 > 18000){
$update_user = mysql_query("UPDATE master_users SET is_online = '0'
WHERE user_name = '".$_SESSION['user_name']."' AND user_pass = '".$_SESSION['password']."' AND id = '".$_SESSION['user_id']."' ") or die("Error in master_users Update Logout: ".mysql_error());



unset($_SESSION['password']);
unset($_SESSION['user_name']);
unset($_SESSION['email']);
unset($_SESSION['user_id']);
unset($_SESSION['doc_id']);



session_destroy();

//header("Location: ".$_GET['url_main']);
exit;
	
}
//echo "SELECT * FROM master_users  WHERE status = 1  AND is_online = '1' AND id !=".$_GET['user_id']." ORDER BY is_conv DESC";exit;
$oluser1 = mysql_query("SELECT * FROM master_users  WHERE status = 1  AND is_online = '1' AND id !=".$_GET['user_id']." ORDER BY is_conv DESC" ) or die(mysql_error());

while ($ol_user123 = mysql_fetch_array($oluser1)) {
	
	$chat_history_sql1 =  mysql_query("select * from chats where from_id=".$ol_user123['id']."  ORDER BY `chat_date` DESC ") or die(mysql_error());	
$chat_history_row1 = mysql_fetch_array($chat_history_sql1);

  $cur_date_time=strtotime(date("Y-m-d H:i:s"));
 $las_chat_time=strtotime($chat_history_row1["chat_date"]);
 $last_login_time=strtotime($ol_user123['last_login_time']);

$diff = $cur_date_time-$las_chat_time;
$diff1 = $cur_date_time-$last_login_time;
if($diff > 18000 && $diff1 > 18000){
$update_user = mysql_query("UPDATE master_users SET is_online = '0'
WHERE  id = '".$ol_user123['user_id']."' ") or die("Error in master_users Update Logout: ".mysql_error());

}
	
}
              
?>

<?php 
#===checking condition is doctor or patient====#

if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='D'){
	$where="doctorid=".$_SESSION['user_id']." AND status=1 AND is_connected=1 AND is_conv IN (0,1) AND date(created)='".date('Y-m-d')."'";
	}
	else
	if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='P'){
	$where="patientid=".$_SESSION['user_id']." AND status=1 AND is_connected=1 AND is_conv IN (0,1) AND date(created)='".date('Y-m-d')."'";
	}

#==Sql command===#
  $chk_app="select * from regular_appointments where ".$where."  ORDER BY orderno ASC";
$chk_process=mysql_query($chk_app);
if(mysql_num_rows($chk_process)>0){
	$chk_app_success=mysql_fetch_array($chk_process);
	
	$gettime="select * from `doctor_availability` where doc_type=1 AND doctor_id=".$chk_app_success['doctorid'];
	$time_process=mysql_query($gettime);
	$time_slots=mysql_fetch_array($time_process);
	$weekday=strtolower(date('D'));
	
	if(isset($_SESSION['online_user']) && $_SESSION['online_user']!='' && isset($_SESSION['user_type']) && $_SESSION['user_type']=='P'){
	$_SESSION['doc_id']=$chk_app_success['doctorid'];
	}
	 /*echo date('D');
	 echo $weekday=strtolower(date('D'));
	 echo $time_slots[$weekday.'_start_time'];
	  echo $time_slots[$weekday.'_end_time'];*/
	//print_r($time_slots);
	//print_r($chk_app_success);
	//exit;
	 $_SESSION['start_time']=$time_slots[$weekday.'_start_time'];
	 $_SESSION['end_time']=$time_slots[$weekday.'_end_time'];
	
	}else{
		
if(isset($_SESSION['online_user']) && $_SESSION['online_user']!='' && isset($_SESSION['user_type']) && $_SESSION['user_type']=='P'){
	

//echo "you r here";
//print_r($_SESSION);echo"<br>";
$where1="patientid=".$_SESSION['user_id']." AND status=1 AND is_connected=0 AND `is_conv` = 2 AND date(created)='".date('Y-m-d')."' AND doctorid='".$_SESSION['doc_id']."'";

  $chk_app1="SELECT * FROM regular_appointments WHERE ".$where1."  ORDER BY orderno desc";
$chk_process1=mysql_query($chk_app1)or die(mysql_error());

$appid=mysql_fetch_array($chk_process1);
//print_r($appid);echo"<br>";
echo "<script>alert('Now you are Timed Out for appointment id ".$appid['id']."');window.top.location.href='http://".$_SERVER['HTTP_HOST']."/appdetails/feedback/".$appid['id']."';</script>";
//location.href='http://192.168.1.239:81/inhealth/appdetails/feedback'; 
//header("location:http://192.168.1.239:81/inhealth/appdetails/feedback");	
unset($_SESSION['corent_user']);
unset($_SESSION['online_user']);
unset($_SESSION['doc_id']);
if(!empty($_SESSION['app_id'])){
	 unset($_SESSION['app_id']);
	
	 }
}
		
		}
#=========Check Appointment End=================#

#===checking condition is doctor or patient====#

if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='D'){
	$chatuser=$chk_app_success['doctorid'];
	$rchatuser=$chk_app_success['patientid'];
	}
	else
	if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='P'){
	$chatuser=$chk_app_success['patientid'];
	$rchatuser=$chk_app_success['doctorid'];
	}
#===checking condition end is doctor or patient====#
//echo $cur_time;
if($cur_time>=$_SESSION['start_time'] && $cur_time<=$_SESSION['end_time'] && $chk_app_success['is_connected']==1 ){//echo $cur_time;

?>

<?php 


 if(empty($_SESSION['app_id'])){
	 $_SESSION['app_id']=$chk_app_success['id'];
	 }
//echo "SELECT * FROM master_users  WHERE status = 1  AND is_online = '1' AND id =".$rchatuser." ORDER BY id DESC";
//echo "SELECT * FROM master_users  WHERE status = 1  AND is_online = '1' AND `is_conv` = '0' AND id =".$rchatuser." ORDER BY id DESC";
$oluser = mysql_query("SELECT * FROM master_users  WHERE status = 1  AND is_online = '1' AND id =".$rchatuser." ORDER BY id DESC" ) or die("error page get_online_user 116".mysql_error());
		
		//$rs=mysql_query("SELECT * FROM ticket_assign ta INNER JOIN tenants_fault_reporting tfr  ON ta.tfr_id = tfr.tfr_id ".$whr." ORDER BY tfr.fault_status,tfr.reporting_date LIMIT $startpoint, $perpage")or die(mysql_error());
  

        while ($ol_user = mysql_fetch_array($oluser)) {
		$frm_user_query =  mysql_query("select * from chats where to_id =".$chatuser." AND from_id=".$ol_user['id']." AND read_status =0 ORDER BY `chat_date` ASC ") or die("error page get_online_user 122".mysql_error()) ;
	    $count = mysql_num_rows($frm_user_query);	
		if($count>0){
			$test_message=1;
		}
?>
<?php 
//print_r($_SESSION);
/*$chatUsers=count($_SESSION['online_user']);
if($chatUsers<=1){*/?>

 <li    class="online_user_li <?php if($count>0 && $ol_user['user_id']!=$_SESSION['corent_user']) {?> animate-flicker_blink active <?php } ?>"  id="new_<?php echo $ol_user['id']; ?>" onclick="ChangeStatus('<?php echo $ol_user['id'];?>','<?php echo $_SESSION['app_id'];?>');" >
  <div id="new_togle_<?php echo $ol_user['id']; ?>">
                  <a   id="<?php echo $ol_user['id']; ?>"  href="" onclick="ChangeStatus('<?php echo $ol_user['id'];?>','<?php echo $_SESSION['app_id'];?>');">
                      <div class="prof_img">
                         <img src="<?php if (!empty($ol_user['avatar_image'])): ?>
                           <?php echo "uploads/".$ol_user['avatar_image']; ?>
                         <?php else: ?>
                           <?php echo "uploads/noimg.png"; ?>
                         <?php endif ?>" />
                         <!-- <div class="status_r">&nbsp;</div>  -->
                      </div>
                     <div class="prof_text">  
                      <h3><?php echo $ol_user['user_name']; ?></h3>
                      <!-- <span>Your status</span> -->
                      </div>
                      
                  </a>
				  </div>
              </li>


<?php
	//}
		}
}else{echo "Searching appointment...";

//$checkofl="update appointments set join_status=3 where id=".$_SESSION['app_id'];
//$ofluser=mysql_query($checkofl);
//$ofluser = mysql_query("SELECT * FROM master_users  WHERE status = 1  AND is_online = '1' AND id =".$rchatuser." ORDER BY id DESC" ) or die(mysql_error());

unset($_SESSION['start_time']);
unset($_SESSION['end_time']);
//unset($_SESSION['corent_user']);
 if(!empty($_SESSION['app_id'])){
	 unset($_SESSION['app_id']);
	 
	 }
	// header('location:'.$_SERVER['PHP_SELF']);

if(isset($_SESSION['online_user']) && $_SESSION['online_user']!='' && isset($_SESSION['user_type']) && $_SESSION['user_type']=='P'){
	echo "you r here";
	if(empty($_SESSION['app_id'])){
	 unset($_SESSION['app_id']); }
	 unset($_SESSION['corent_user']);
unset($_SESSION['online_user']);
echo"<script>window.location.reload(); </script>";
	
}
	#===checking condition is doctor or patient====#

if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='D'){
	$where="doctorid=".$_SESSION['user_id']." AND status=1";
	#==Sql command===#
//$update_app="UPDATE regular_appointments SET is_connected=1 WHERE ".$where."  ORDER BY orderno ASC LIMIT 1";

	}	
	 
}


















       /*$oluser = mysql_query("SELECT * FROM master_users  WHERE status = 1  AND is_online = '1' AND id !=".$_GET['user_id']." ORDER BY is_conv DESC" ) or die(mysql_error());
		
		//$rs=mysql_query("SELECT * FROM ticket_assign ta INNER JOIN tenants_fault_reporting tfr  ON ta.tfr_id = tfr.tfr_id ".$whr." ORDER BY tfr.fault_status,tfr.reporting_date LIMIT $startpoint, $perpage")or die(mysql_error());
  

        while ($ol_user = mysql_fetch_array($oluser)) {
		$frm_user_query =  mysql_query("select * from chats where to_id =".$_GET['user_id']." AND from_id=".$ol_user['id']." AND read_status =0 ORDER BY `chat_date` ASC ") or die(mysql_error()) ;
	    $count = mysql_num_rows($frm_user_query);	
		if($count>0){
			$test_message=1;
		}
?>


 <li    class="online_user_li <?php if($count>0 && $ol_user['user_id']!=$_SESSION['corent_user']) {?> animate-flicker_blink active <?php } ?>"  id="new_<?php echo $ol_user['id']; ?>" onclick="ChangeStatus(<?php echo $ol_user['id'];?>);" >
  <div id="new_togle_<?php echo $ol_user['id']; ?>">
                  <a   id="<?php echo $ol_user['id']; ?>"  href="" onclick="ChangeStatus(<?php echo $ol_user['id'];?>);">
                      <div class="prof_img">
                         <img src="<?php if (!empty($ol_user['avatar_image'])): ?>
                           <?php echo "uploads/".$ol_user['avatar_image']; ?>
                         <?php else: ?>
                           <?php echo "uploads/noimg.png"; ?>
                         <?php endif ?>" />
                         <!-- <div class="status_r">&nbsp;</div>  -->
                      </div>
                     <div class="prof_text">  
                      <h3><?php echo $ol_user['user_name']; ?></h3>
                      <!-- <span>Your status</span> -->
                      </div>
                      
                  </a>
				  </div>
              </li>


<?php
		} */
		
?>
<?php if($test_message==1) {?>
<script>
$(window).focus(function(){
	
   //$("#favicon").attr("href","images/favicon.ico");
   clearInterval(myVar);
   
  <?php $_SESSION['counter']=2;  
  $update_chat = mysql_query("UPDATE `chats` SET `read_status` = '1' WHERE `from_id` = '".$_SESSION['corent_user']."' ") or die("Error in chats Update read_status: ".mysql_error());
  ?>
   
});
if(document.hasFocus()) {
//$("#favicon").attr("href","images/favicon.ico");
clearInterval(myVar);
 }else {

var linkCons = "images/";
    var myInterval=1000;
    var count = 1;
 var myVar =   setInterval(function() {
        $('#favicon').attr('href',linkCons+"favicon"+count+".ico");
        count++;
        if (count > 4)
        {
            count = 0;
        }
    }, myInterval);
}

</script>
 <?php } ?>
