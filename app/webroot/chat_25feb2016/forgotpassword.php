<?php 
include_once 'includes/db.php';
require_once 'header.php';
if (isset($_POST['femail'])) {
   
  $email = trim($_POST['femail']);

 $row =  mysql_query("SELECT * FROM `master_users` WHERE `mail_id` LIKE '$email'");

 $row = mysql_fetch_object($row);

if (!empty($row)) {
    
                        
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: NB chat <'.SITE_EMAIL.'>' . "\r\n";
                $subject="forgot password";
                $message=base64_decode($row->pass) ;

                mail($row->mail_id, $subject, $message, $headers);

                $message = "Your message has been sent successfully please check your email.";

}else{

                $message = "No account found with that email address";
}




   } ?>
<body>

<div id="sign_in">

   <div id="login_content">
       <div id="sign_profile"></div>
                <div class="login_error"><span style="display:none;">Your email or password is incorrect</span></div> 
                <form method="post" name="chat_app" id="chat_app" action="">

                
                
                    <p>
                      <input  type="text" placeholder="Login Id" name="femail" id="email" >
                      
                      &nbsp;
                      
                      <input  name="forgotpassword" value="fpassword" type="image" src="images/login.png" id="btnValidate">
                      <?php if (isset($message)) {
                        echo $message;
                      } ?>
                       &nbsp;
                        <h6> <a href="index.php" style="margin-left:100px;">Back to login</a></h6>
                    </p>
              
                </form>
                
   </div>
   
   
</div>

</body>
</html>
