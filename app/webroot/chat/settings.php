<?php require_once '../html/includes/config.php'; 

if (isset($_POST['cpaassword'])) {

  $trimmed_array=array_map('trim',$_POST);
  extract($trimmed_array);

  $pass = base64_encode($cpaassword);
  
  
  $cpassq = mysql_query("SELECT * FROM `master_users` WHERE `id` =".$_SESSION['user_id']." AND `user_pass`='$pass'");
  if (mysql_num_rows( $cpassq)>0) {
  $npass = base64_encode($npassword);
  $_SESSION['password']   = $npass;
  mysql_query("UPDATE `master_users` SET `user_pass` = '$npass' WHERE `id` =".$_SESSION['user_id']) or die(mysql_error());
        $messages = "<p style='color:green'>password Successfully changed </p>";
  }else{
    $messages = "<p style='color:red'>Invalid Current Password</p>";
  }
 
}


if (isset($_POST['saveprofile'])) {
  extract($_POST);
  
  $file_name = $_FILES['avatar']['name'] ;
 
 

if ($file_name !='') {
	   $tmp_file = $_FILES['avatar']['tmp_name'] ;
       $avatar   = time().'avtimg-'.str_replace(' ', '_', $file_name);
       $path     ='uploads/'.$avatar ; 
      move_uploaded_file($tmp_file, $path);
      
      $watermark = new Watermark();
      smart_resize_image($path , null, 100 , 100 , true , $path , true , false ,100 );
      
     }else{
		 if($hidden_avatar !='') {
			 $avatar=$hidden_avatar;
		 }else{
		$avatar="";
		 }
	 }
   $query =  mysql_query("UPDATE `master_users` SET `full_name` = '$name',
`user_name` = '$cname',
`email_id` = '$emailid',
`avatar_image` = '$avatar'
WHERE `master_users`.`id` =".$_SESSION['user_id']) or die("Error in master_users Save profile: ".mysql_error());

if($query==1){
	$_SESSION['email']      = $emailid;
$profile_update_msg="<span style='color:green;'>Profile Update Successfully</span>";
}else{
$profile_update_msg="<span style='color:red;'>Error In Profile Update</span>";
}

}
 


if (!isset($_SESSION['email']) && !isset($_SESSION['time']) && !isset($_SESSION['user_id']) && !isset($_SESSION['password']) ) {
 header('Location: index.php?error=1');
}else{
  $userpr = mysql_query("SELECT * FROM `master_users` WHERE `status` = 1 AND id=".$_SESSION['user_id']) or die("Error in master_users Select Query: ".mysql_error());
  $userpr = mysql_fetch_object($userpr);
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
          <ul>
              <a href="<?php echo URL; ?>group_chat.php"><li class="menu1"><img src="images/group_msg.png"/>BACK TO Messenger</li></a>
              <a href="<?php echo URL; ?>settings.php"><li class="menu4"><img src="images/maintainance_icon.png"/>Settings </li></a>
              
              <a href="<?php echo(URL) ?>logout.php"><li class="menu6"><img src="images/logout.png"/> Logout</li></a>
          </ul>
      </nav>

  </div>
  
  <div class="clear"></div>
  
  <div class="content">
    <div id="tabs">
<ul>
<li><a href="#tabs-1">Edit Profile</a></li>
<li class="<?php if (isset($_POST['cpaassword'])) {echo "ui-corner-top ui-tabs-active ui-state-active"; } ?>"><a href="#tabs-4">Change Password </a></li>
<?php 
  $admin = mysql_query("SELECT is_admin FROM `master_users` WHERE id =".$_SESSION['user_id']);
$admin = mysql_fetch_object($admin)->is_admin;
 ?>
 <?php if ($admin!=0): ?>
   
 
<li id="admin_m" ><a href="#tabs-1">User Settings</a></li>
<?php endif ?>
</ul>
<div id="tabs-1">
  <table>
  <tr>
	  <td>
			<?php echo $profile_update_msg; ?>
			
	  </td>
  </tr>
  <tr>
  <td>
 <form method="POST" enctype="multipart/form-data" class="form-horizontal" name="edit" role="form">
   
    <div class="form-group">
      <label class="control-label col-sm-4"  for="name">Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control"  required    value="<?php echo stripslashes($userpr->full_name); ?>" id="name" name="name" placeholder="Enter NAME">
      </div>
    </div>
   

 <div class="form-group">
      <label class="control-label col-sm-4" for="cname">Chat Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" required    value="<?php echo stripslashes($userpr->chat_name); ?>"  id="cname" name="cname" placeholder="Enter chat NAME ">
      </div>
    </div>

   <div class="form-group">
      <label class="control-label col-sm-4" for="avatar">Upload Avatar Image:</label>
      <div class="col-sm-4">
         <input id="imgInp"  name="avatar"  type="file" class="filestyle" data-input="false" style="margin-bottom:10px;">
         <input id="imgInp"  name="hidden_avatar"  type="hidden" class="filestyle" data-input="false" value="<?php if (!empty($userpr->avatar_image)) { echo $userpr->avatar_image;  } ?>">
		 <img height="100px" width="100px"  style="" id="blah" src="<?php if (!empty($userpr->avatar_image)) {?>uploads/<?php echo $userpr->avatar_image; ?> <?php } ?>" alt="your image" />
      </div>
    </div>
   
    
   


    <div class="form-group">
      <label class="control-label col-sm-4" for="emailid">E-Mail ID:</label>
      <div class="col-sm-8">
        <input type="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"   class="form-control" required  value="<?php echo stripslashes($userpr->mail_id); ?>"  id="emailid"  name="emailid" placeholder="Enter E-Mail ">
      </div>
    </div>



   




    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
      
        <button type="submit" name="saveprofile" class="btn btn-default" onClick="validateForm()">Save Profile</button>
      </div>
    </div>
  </form>
</td>

</tr>
</table>
</div>
<div id="tabs-4">
  
  <form class="form-horizontal " name="passupdate" method="post" id="passupdate" role="form" autocomplete="off">

    <div class="form-group">
      
      <div class="col-sm-8">
            <?php 

    if (!empty( $messages)) {
  echo  $messages;
}

 ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="cpaassword">Current Password:</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="cpaassword" name="cpaassword" placeholder="Current Password" autocomplete="off">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-4" for="npassword">New Password:</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-4" for="apassword">Confirm Passowrd:</label>
      <div class="col-sm-8">
      <div class="error"></div>
        <input type="password" class="form-control" id="apassword" name="apassword" placeholder="Confirm Passowrd">
      </div>
    </div>
   
      <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
        <button type="button"  id="passwordchange" name="passwordchange" class="btn btn-default">Change Password</button>
      </div>
    </div>
   

 
  </form>
</div>

</div>
  </div>
  
  
   
</div>

</body>
</html>



<style>
  .control-label{
    color: black;
  }
</style>

<script>
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });


jQuery(document).ready(function($) {
  $('#passwordchange').click(function() {
      var cpaassword = $('#cpaassword').val();
      var npassword = $('#npassword').val();
      var apassword = $('#apassword').val();

      if (cpaassword=='') {
           $('#cpaassword').focus();
          $('#cpaassword').css('color', 'red');
          return false;
          var form = 0;
      };

      if (npassword=='') {
           $('#npassword').focus();
          $('#npassword').css('color', 'red');
          return false;
          var form = 0;
      }else{
         
          $('#npassword').css('color', '');
          
          
      };

      if (apassword=='') {
           $('#apassword').focus();
          $('#apassword').css('color', 'red');
          return false;
          var form = 0;
      }else{
         
          $('#apassword').css('color', '');
       
          
      };



       if (apassword!='') {
        if (apassword!=npassword ) {
		  $('#npassword').val('');	
		  $('#apassword').val('');	
          $('#npassword').focus();
          $('#apassword').css('color', 'red');

         
          $('.error').html('<p style="color:red">Password And Confirm Password Does Not Match</p>');
          return false;

        }else{
          $('#apassword').css('color', ''); 
          $('.error').html(''); 
          $('#passupdate').submit();
         
        };

};






  });
});

$('#admin_m').click(function() {
  window.location.replace("<?php echo URL.'admin.php'; ?>");
});
function validateForm(){
	//alert('name');
        
		textValue =  $.trim($('#name').val());
		textValue1 =  $.trim($('#cname').val());
    if(textValue ==''){
       $.trim($('#name').val('')); //to set it blank
	   return false;
    } 
	
    else if(textValue1 ==''){
       $.trim($('#cname').val('')); //to set it blank
	   return false;
    } 
	else {
       return true;
    }
    }
</script>