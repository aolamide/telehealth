<?php require_once 'includes/config.php'; 

if (isset($_POST['cpaassword'])) {

  $trimmed_array=array_map('trim',$_POST);
  extract($trimmed_array);

  $pass = base64_encode($cpaassword);
  
  $cpassq = mysql_query("SELECT * FROM `master_users` WHERE `user_id` =".$_SESSION['user_id']." AND `pass` LIKE '$pass'");
  if (mysql_num_rows( $cpassq)>0) {
  $npass = base64_encode($npassword);
  mysql_query("UPDATE `master_users` SET `pass` = '$npass' WHERE `user_id` =".$_SESSION['user_id']) or die(mysql_error());
        $messages = "<p style='color:green'>password Successfully changed </p>";
  }else{
    $messages = "<p style='color:red'>Invalid password</p>";
  }
 
}


if (isset($_POST['saveprofile'])) {
  extract($_POST);

$query =  mysql_query("UPDATE `master_users` SET `full_name` = '$name',
`chat_name` = '$cname',
`tag_line` = '$tline',
`mail_id` = '$emailid',
`mo_number` = '$mobno' WHERE `master_users`.`user_id` =".$_SESSION['user_id']);
}
 
  if (isset($_FILES['avatar']['name'])) {
  $file_name = $_FILES['avatar']['name'] ;
  $tmp_file = $_FILES['avatar']['tmp_name'] ;
  $avatar   = time().'avtimg-'.str_replace(' ', '_', $file_name);
  $path     ='uploads/'.$avatar ;
 

if ($file_name !='') {
      move_uploaded_file($tmp_file, $path);
       
       $_POST = '';
       $userpr = mysql_query("SELECT * FROM `master_users` WHERE `is_active` = 1 AND user_id=".$_SESSION['user_id']);
       $userpr = mysql_fetch_object($userpr);
       //unlink('uploads/'.$userpr->avatar_image);
       #uploads/1421265044avtimg-Lingaa (2014) _Poster.png
      $watermark = new Watermark();
      smart_resize_image($path , null, 100 , 100 , true , $path , true , false ,100 );
      
      mysql_query("UPDATE `master_users` SET `avatar_image` = '$avatar' WHERE `user_id` =".$_SESSION['user_id']);

    }else{
      $message = "Email already exists ";
}
   }

if (!isset($_SESSION['email']) && !isset($_SESSION['time']) && !isset($_SESSION['user_id']) && !isset($_SESSION['password']) ) {
 header('Location: http://maasinfotech24x7.com/nbmessenger/index.php?error=1');
}else{
  $userpr = mysql_query("SELECT * FROM `master_users` WHERE `is_active` = 1 AND user_id=".$_SESSION['user_id']);
  $userpr = mysql_fetch_object($userpr);
}

if (isset($_POST['saveprofile'])) {
  #mysql_query("")
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
  $admin = mysql_query("SELECT is_admin FROM `master_users` WHERE user_id =".$_SESSION['user_id']);
$admin = mysql_fetch_object($admin)->is_admin;
 ?>
 <?php if ($admin!=0): ?>
   
 
<li id="admin_m" ><a href="#tabs-1">Admin</a></li>
<?php endif ?>
</ul>
<div id="tabs-1">
  <table><tr><td>
 <form method="POST" enctype="multipart/form-data" class="form-horizontal" name="edit" role="form">
   
    <div class="form-group">
      <label class="control-label col-sm-4"  for="name">Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" required value="<?php echo stripslashes($userpr->full_name); ?>" id="name" name="name" placeholder="Enter NAME">
      </div>
    </div>
   

 <div class="form-group">
      <label class="control-label col-sm-4" for="cname">Chat Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" required value="<?php echo stripslashes($userpr->chat_name); ?>"  id="cname" name="cname" placeholder="Enter chat NAME ">
      </div>
    </div>

 <div class="form-group">
      <label class="control-label col-sm-4" for="avatar">Upload Avatar Image:</label>
      <div class="col-sm-4">
         <input id="imgInp"  name="avatar"  type="file" class="filestyle" data-input="false">
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-4" for="tline">Tag Line:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control"  required id="tline" value="<?php echo stripslashes($userpr->tag_line); ?>"  name="tline" placeholder="Enter Tag Line ">
      </div>
    </div>
   


    <div class="form-group">
      <label class="control-label col-sm-4" for="emailid">E-Mail ID:</label>
      <div class="col-sm-8">
        <input type="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"   class="form-control" required  value="<?php echo stripslashes($userpr->mail_id); ?>"  id="emailid"  name="emailid" placeholder="Enter E-Mail ">
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-4" for="mobno">Mobile Number:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" required  value="<?php echo stripslashes($userpr->mo_number); ?>"  id="mobno"  name="mobno" placeholder="Enter  Mobile No ">
      </div>
    </div>





    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
      <input type="hidden" name="saveprofile" value="SaveProfile" />
        <button type="submit" class="btn btn-default">Save Profile</button>
      </div>
    </div>
  </form>
</td>
<td>&nbsp;</td>
<td valign="center"> <img height="100px" width="64px"  style="  margin-bottom: 53px; margin-left: 116px;" id="blah" src="<?php if (!empty($userpr->avatar_image)): ?>uploads/<?php echo $userpr->avatar_image; ?>
<?php endif ?>" alt="your image" /></td></tr></table>
</div>
<div id="tabs-4">
  
  <form class="form-horizontal " name="passupdate" method="post" id="passupdate" role="form">

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
        <input type="password" class="form-control" id="cpaassword" name="cpaassword" placeholder="Current Password">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-4" for="npassword">New Password:</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-4" for="apassword">Re Type New Passowrd:</label>
      <div class="col-sm-8">
      <div class="error"></div>
        <input type="password" class="form-control" id="apassword" name="apassword" placeholder="Re Type New Passowrd">
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
          $('#apassword').focus();
          $('#apassword').css('color', 'red');

         
          $('.error').html('<p style="color:red">Enter valid password </p>');
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
</script>