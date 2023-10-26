<?php 
require_once 'includes/config.php'; 
//print_r($_SESSION);exit;
if (isset($_SESSION['loginID'])) {
   header('Location: '.URL.'group_chat.php');
}
require_once 'header.php';

 ?>
 <body>

<div id="sign_in">

   <div id="login_content">
       <div id="sign_profile"></div>
                <div class="login_error"><span style="display:none;">Your email or password is incorrect</span></div> 
                <form method="post" name="chat_app" id="chat_app" action="group_chat.php">
                    <input type="text" placeholder="Email Id" name="email" id="email" >
                      <div class="clear"></div>
                    <p>
                        <input class="form-control "  type="password" style="float: left;" placeholder="Password" name="password" id="password" > 
                        &nbsp;
                        
                        <input class=" " type="image" name="log" value="login" style="float: right;" src="images/login.png" id="btnValidate">

                        
                       
                  </p>
                    <span class="e_msg">
                      <?php 
                      if (isset($_GET['user']) && $_GET['user']==1) {
                         echo "Invalid Email Id and Password. Retry again Or Your Account is Blocked or Inactive Please Contact Admin";
                       } 
					   
					   if (isset($_GET['user']) && $_GET['user']==2) {
                         echo "Account is being used on another Device";
                       } 
					   
					   ?>
                    </span>
                    
                </form>
                
   </div>
   
 
</div>

</body>
</html>

<script>
$('#chat_app').submit(function() {
  var email = $('#email').val();
  var password = $('#password').val();
  if (email=='') {
    $('#email').focus();
    return false;
  };

  if (password=='') {
    $('#password').focus();
    return false;
  }else{
     return true;
  };



});
    
</script>