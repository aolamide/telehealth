<?php 
require_once '../html/includes/config.php'; 
//print("<pre>");
//print_r($_SESSION);exit;
//print_r($_REQUEST);

//$cur_date_time=strtotime(date("Y-m-d H:i:s"));
//$last_login_time=strtotime($user['13']);	
//$session_start_time=$_SESSION['time'];
//$diff = $cur_date_time-$last_login_times;
//print_r($user);exit;		

/*
Array
(
    [Config] => Array
        (
            [userAgent] => d484c75ac37ebaf1d521cf94eacff96e
            [time] => 1450968333
            [countdown] => 10
        )

    [loginID] => 13
    [loginType] => D
    [email] => ayush
    [password] => Y2hpdHRhQDEyMw==
    [time] => 1450953932
    [user_id] => 13
    [user_type] => D
)
Array
(
)

*/



//print("</pre>");//exit;



if(isset($_SESSION['loginID']))
{ 
	$getUserSql= mysql_query("SELECT * FROM `master_users` WHERE id='".$_SESSION['loginID']."' ") or die(mysql_error());
	$getUser= mysql_fetch_array($getUserSql);
	$_SESSION['email']=$getUser['email_id'];
	$_SESSION['user_name']=$getUser['user_name'];
	$_SESSION['password']=$getUser['user_pass'];
	$_SESSION['time']=time();
	$_SESSION['user_id']=$getUser['id'] ;
	$_SESSION['user_type']=$getUser['login_tytpe'] ;
	
}




  if (!empty($_POST['email']) && !empty($_POST['password'])) {

  $email = $_POST['email'];
  $password = base64_encode($_POST['password']);          
  $chack_user = mysql_query("SELECT * FROM `master_users` WHERE `user_name` = '$email' AND `status` = '1' AND user_pass = '$password' ") or die(mysql_error());
             
          
              $user= mysql_fetch_array($chack_user);
                if (mysql_num_rows($chack_user)>0) {
  				  		  
                     if($user['is_online']=='1' && $_SESSION['loginID']=="")
  				   {
  					$_SESSION['email']=$user['user_name'];
                      $_SESSION['password']=$user['user_pass'];
  					$_SESSION['user_name']=$user['user_name'];
                      $_SESSION['time']=time();
                      $_SESSION['user_id']=$user['id'] ;
  					$_SESSION['user_type']=$user['login_tytpe'] ;
  					 $cur_date_time=date("Y-m-d H:i:s");
  					$update_user = mysql_query("UPDATE `master_users` SET 
  					`last_session_date` = '".$cur_date_time."',
  					`is_online` = '1'WHERE `user_name` = '$email' AND user_pass = '$password' ") or die("Error in master_users Update Online: ".mysql_error());
  					  // header('Location:'.URL.'?user=2');
  					   
  				   }	else {
                   
                      $_SESSION['email']=$email;
                      $_SESSION['password']=$password;
                      $_SESSION['time']=time();
                      $_SESSION['user_id']=$user['id'] ;
  					$_SESSION['user_name']=$user['user_name'];
  					$_SESSION['user_type']=$user['login_tytpe'] ;
  					 $cur_date_time=date("Y-m-d H:i:s");
  					$update_user = mysql_query("UPDATE `master_users` SET 
  					`last_session_date` = '".$cur_date_time."',
  					`is_online` = '1'WHERE `user_name` = '$email' AND user_pass = '$password' ") or die("Error in master_users Update Online: ".mysql_error());
  				   }
                        
                     }else{
  					   
                    
                          header('Location:'.URL1.'?user=1');
                     }
           
             
                                              
             }
  		   
  		   elseif (isset($_SESSION['email']) && isset($_SESSION['time']) && isset($_SESSION['user_id']) && isset($_SESSION['password']) ) {
              
              $email      = $_SESSION['email'];
              $password   = base64_encode($_SESSION['password']);          
              $chack_user = mysql_query("SELECT * FROM `master_users` WHERE `user_name` = '$email' AND user_pass = '$password' ");
              $user  = mysql_fetch_row($chack_user);   
              

             }
  		   
             else{
              header('Location:'.URL1);
                
            }


require_once 'header.php';

?>


<body> 
<div id="loading">
  <img id="loading-image" src="images/FhHRx.gif" alt="Loading..." />
</div>

<div id="wrapper">

 <div class="row">
  <nav>
          <!--<ul>
              <a href="<?php //echo URL; ?>group_chat.php"><li class="menu1"><img src="images/group_msg.png"/>Messenger</li></a>
              <a href="<?php //echo URL; ?>settings.php"><li class="menu4"><img src="images/maintainance_icon.png"/>Settings </li></a>
              <a href="<?php //echo(URL) ?>logout.php"><li class="menu6"><img src="images/logout.png"/> Logout</li></a>
          </ul>-->
      </nav>

  </div>
  
  <div class="clear"></div>
  
  <div class="content">
               <?php include_once 'online.php'; ?>

       
       <div class="right">
         <div class="dash_bg">
        
          
       </div>
                
            <div id="allmessages">    
             <?php include_once 'messages.php'; ?>
             </div>
          <div class="clear"></div>



       </div>
  </div>
  
  
   
</div>

</body>
</html>

<script>



$(document).ready(function() {
    $body.removeClass("loading");
 });
$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});




$(".jqte_editor").keyup(function(event){

    if(event.keyCode == 13){
      
    var id = $('.ui-state-active').attr('id');
    var message = $('.jqte_editor').html();
    
    var formdata = $('#messagedata').serialize();
    var goid    = "myDiv-"+id;
	//alert(message);


   $.post('ajax_send_message.php',{sendmessage: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>',message: message}, function(data, textStatus, xhr) {
    $('#tabs-'+id).html(data);
    $(".jqte_editor").html('');

   

      $(".chat_messages").animate({ scrollTop:  300000});


  });
  
    }
});
//window.location.href = window.location;
window.opener.location.href = window.opener.location;
</script>