<?php
 require_once '../html/includes/config.php'; 
 include_once("paging/pagination.php");


 if (isset($_GET['del']) && !empty($_GET['id'])) {
    $session = $_SESSION['online_user'];
    $rmid    =  array($_GET['id']);
    if (isset($_SESSION) && !empty($_SESSION['online_user'])) {
        
          if (in_array( $_GET['id'] , $session)) {
            
          $_SESSION['online_user'] = array_diff( $session , $rmid );
          }
    }
   mysql_query("DELETE FROM `master_users` WHERE `user_id` =".$_GET['id']);
 }

if (isset($_POST['format'])  && $_POST['format'] =='allfile') {
  
  $files = glob('t_file/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}


}




 if (isset($_POST['form']) && $_POST['form']=='saveuser') {
  extract($_POST);
  $password = base64_encode($password);
  
  $file_name123 = $_FILES['avatar_user']['name'] ;
 
 

if ($file_name123 !='') {
	   $tmp_file = $_FILES['avatar_user']['tmp_name'] ;
       $avatar   = time().'avtimg-'.str_replace(' ', '_', $file_name123);
       $path     ='uploads/'.$avatar ; 
      move_uploaded_file($tmp_file, $path);
      
      $watermark = new Watermark();
      smart_resize_image($path , null, 100 , 100 , true , $path , true , false ,100 );
      
     }else{
		 
		$avatar="../images/user-thumb1.png";
		 
	 }
  
  
   $query = mysql_query("INSERT INTO `master_users` ( `user_id` , `full_name` , `chat_name` ,
      `avatar_image` ,   `pass` , `created` ,
      `is_active` , `is_admin` ,`mail_id`) VALUES ( NULL , '$name', '$cname', '$avatar',
       '$password', now() , '1', '0','$email' )
      ") ;
	  if($query==1){
$profile_add_msg="<span style='color:green;'>Profile Added Successfully</span>";
}else{
$profile_add_msg="<span style='color:red;'>Error In Profile Add</span>";
}
 }
  $admin = mysql_query("SELECT is_admin FROM `master_users` WHERE user_id =".$_SESSION['user_id']);
$admin = mysql_fetch_object($admin)->is_admin;

if ($admin!=1) {
  header('Location:'.URL.'settings.php');
  exit;
}
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
       unlink('uploads/'.$userpr->avatar_image);
       #uploads/1421265044avtimg-Lingaa (2014) _Poster.png
      $watermark = new Watermark();
      smart_resize_image($path , null, 100 , 100 , true , $path , true , false ,100 );
      
      mysql_query("UPDATE `master_users` SET `avatar_image` = '$avatar' WHERE `user_id` =".$_SESSION['user_id']);

    }else{
      $message = "Email already exists ";
}
   }

if (!isset($_SESSION['email']) && !isset($_SESSION['time']) && !isset($_SESSION['user_id']) && !isset($_SESSION['password']) ) {
 header('<?php echo URL ?>index.php?error=1');
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
<li><a href="#tabs-1">User Profile</a></li>
<li class="<?php if (isset($_GET['edit'])) {echo "ui-corner-top ui-tabs-active ui-state-active"; } ?>
  ">
  <a href="#tabs-2">Add User</a>
</li><!-- 
<li><a href="#tabs-3">Storage</a></li> -->

</ul>
<p id="success-msg"><?php echo $profile_add_msg; ?></p>
<div id="tabs-1">
<div class="table-responsive"></div>
<div class="table-responsive">

  <table class="table table-hover" style=" font-size: 13px;">
    <thead>
      <tr>
        <th>Full Name</th><th>Chat Name</th><th>Avatar Image</th> <th>Email Id</th> <th style=" width: 118px;">Active</th> 
      </tr>
    </thead>
    <tbody>
      <?php 

$part = (int) (!isset($_GET["part"]) ? 1 : $_GET["part"]);
$part = ($part == 0 ? 1 : $part);
$perpage = 4;//limit in each page
$startpoint = ($part * $perpage) - $perpage;

$userqu  = mysql_query("SELECT * FROM master_users where is_admin !=1 ORDER BY created DESC limit $startpoint,$perpage") or die(mysql_error());

      
        while ($userq  = mysql_fetch_array($userqu)) {
          ?>

          <tr>
        <td><?php echo $userq['full_name'] ?></td> 
        <td><?php echo $userq['chat_name'] ?></td> 
        <td><img width="40"  height="40"  src="uploads/<?php echo $userq['avatar_image']?>" alt="" /></td> 
        
        <td><?php echo $userq['mail_id'] ?></td> 
       
        <td>
          <select name="status" id="<?php echo($userq['user_id']) ?>" class="form-control change_user_status">
               
            <option value="1" <?php if ($userq['is_active']==1): ?>selected <?php endif ?> value="1">Active</option>
            <option value="0" <?php if ($userq['is_active']==0): ?>selected <?php endif ?>  value="2">InActive</option>
          
          </select>
        </td> 
        <td><a id="<?php echo $userq['user_id'] ?>"  href="" class="edit_user_btn" ><span class="glyphicon glyphicon-edit" ></span></a></td>
        <td><a onClick="return confirm('Are you sure you want to delete this User?');"  href="?del=true&id=<?php echo $userq['user_id'] ?>"><span class="glyphicon glyphicon-floppy-remove" ></span></a></td>
         </tr>
    
          <?php
        }
       ?>
      </tbody>
  </table>
  <table>
  <tr>
  </tr>
  <td>
 <?php  echo Paging('master_users',$perpage,"admin.php?&",''); ?>
  </td>
  </table>
</div>
 <?php 




#========================================


/*include_once("pagi/pagination.php"); 
$pg = new bootPagination();
$pg->pagenumber = $pagenumber;
$pg->pagesize = $pagesize;
$pg->totalrecords = $totalrecords;
$pg->showfirst = false;
$pg->showlast = false;
$pg->paginationcss = "pagination-large";
$pg->paginationstyle = 1; // 1: advance, 0: normal
$pg->defaultUrl = "admin.php";
$pg->paginationUrl = "admin.php?p=[p]";
echo $pg->process();*/



 ?>
</div>
<div id="tabs-2">
<?php if (isset($_GET['edit']) && !empty($_GET['id'])) {
  $userdata = mysql_query('select * from master_users where user_id = '.$_GET['id']);
  $userdata = mysql_fetch_object($userdata);

} ?>
  
<form method="POST" name="sign_chat_app" id="sign_chat_app"  name="sign_chat_app"  enctype="multipart/form-data" action="" autocomplete="off">
  
    <div class="form-group">
      <label class="sr-only" for="">Name</label>
	  
      <input type="text" value="" required pattern="[a-zA-Z][a-zA-Z ]{1,}" class="form-control" id="name" name="name"  placeholder="Name">
    </div>
  

    <div class="form-group">
      <label class="sr-only" for="">Chat Name</label>
      <input type="text" class="form-control"  required pattern="[a-zA-Z][a-zA-Z ]{1,}" id="cname" name="cname" placeholder="Chat Name">
      <input type="hidden"  name="form" value="saveuser" />
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4" for="avatar">Upload Avatar Image:</label>
      
         <input id="imgInp"  name="avatar_user"  type="file" class="filestyle" data-input="false" style="margin-bottom:10px;">
         
		 <span id="blah123"></span>
     
    </div>
  
    <div class="form-group">
      <label class="sr-only" for="">Email</label>
	  <input type="email" class="form-control"  id="email" name="email123"  placeholder="Email" autocomplete="off" style="display:none;" >
      <input type="email" class="form-control" required  id="email123" name="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"  placeholder="Email" autocomplete="off" >
      <span id="email_error_msg"></span>

    </div>
  
  

    <div class="form-group">
      <label class="sr-only" for="">Password</label>
      <input type="password"  required  title="Please Enter Password"  class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
    </div>
  

  

    
  
    <button type="submit"  id="save_user_new" class="btn btn-primary" >Save</button>
    <input type="hidden" value="editprofile" >
  </form>
</div>
<!-- <div id="tabs-3">
 <div class="panel panel-default">
   Default panel contents
   <div class="panel-heading">Sharing file Memory heading</div>
   <?php 
      $bytes = 0;
      $dir   = 't_file' ;
      $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
      foreach ($iterator as $i) 
      {
        $bytes += $i->getSize();
      }

      function formatBytes($bytes, $precision = 2) { 
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 

        // Uncomment one of the following alternatives
          //$bytes /= pow(1024, $pow);
         //$bytes /= (1 << (10 * $pow)); 

        return round($bytes, $precision) . ' ' . $units[$pow]; 
    } 


    ?>
    
     <table class="table">
       <thead>
        
         <tr>
           <th>Used memory</th>
           <th style="text-align: center;   " >Action</th>
         </tr>
       </thead>
       <tbody>
         <tr>
            <td><span class="glyphicon glyphicon-inbox" ></span>&nbsp;<?= formatBytes($bytes); ?></td>
            <td><button type="button" id="frmatfile"  class="btn btn-large btn-block btn-primary">Format memory  Drive <span class="glyphicon glyphicon-trash"></span></button></td>
         </tr>
         
       </tbody>
     </table>
 </div>
</div> -->

</div>
  </div>
  
  
   
</div>

<div style="display:none">
  <div id="dialog" title="Update User Details">
  <form method="POST" name="sign_chat_app" id="edit_form"  enctype="multipart/form-data" action="?">
  
    <div class="form-group">
      <label class="sr-only" for="">Name</label>
      <input type="text" value="" required class="form-control" id="edit_name" name="edit_name" placeholder="Name">
     
    </div>
  

    <div class="form-group">
      <label class="sr-only" for="">Chat Name</label>
      <input type="text" required class="form-control" id="edit_cname"  name="edit_cname" placeholder="Chat Name">
    </div>
  

  

    
  
  

    <div class="form-group">
      <label class="sr-only" for="">Email</label>
      <input type="email" class="form-control" id="edit_email" required pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="edit_email" placeholder="Email">
      <span id="error_message_1"  ></span>
    </div>
  
  

    <div class="form-group">
      <label class="sr-only" for="">Password</label>
      <input type="password" required  class="form-control" id="edit_password"  name="edit_password" placeholder="Password">
    </div>
  

  

    <span id="lodergif" class="loder pull-left" ><img src="<?php echo URL.'/images/FhHRx.gif'; ?>" alt=""></span>    
  
    <button type="submit"   id="edit_save_user" class="btn btn-primary  pull-right">Save</button>
    <input type="hidden" value="" name="editprofile" id="editprofile">

  </form>
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

$('.change_user_status').change(function() {
  if (confirm('Are You Sure ? click Ok .')==true) {

  var c_id = $(this).attr('id');
   var c_val = $(this).val();

  $.post('<?php echo URL ?>ajax-edit.php',{ c_id: c_id , changestatus:'true',c_val:c_val }, function(data, textStatus, xhr) {
    /*optional stuff to do after success */
  });
  

  };
});


$('#email123').keyup(function() {
  var email_formdata = $(this).val();
  $.post('<?php echo URL ?>ajax-edit.php', {emailid : email_formdata}, function(data, textStatus, xhr) {
    if (data==2) {

      $('#email_error_msg').html('Try Other One Look like , E-mail id already  exists !');
      $('#email123').css('color', 'red');$('#email123').css('border-color', 'red');
      $('#save_user_new').attr('disabled', 'disabled');
    }else{
      $('#email_error_msg').html('');
       $('#email123').css('color', '');$('#email123').css('border-color', '');
       $('#save_user_new').removeAttr('disabled');
    };

  });
});



$('.edit_user_btn').click(function() {
  var id = $(this).attr('id');
  $.post('<?php echo URL ?>ajax-edit.php',{ edit: 'profiel', id : id } , function(data, textStatus, xhr) {
	  var myvar = data;
      var arr = myvar.split('&');
	  
      var obj_date = $.parseJSON(arr[1]);
      $('#edit_name').val(obj_date.full_name);
      $('#edit_cname').val(obj_date.chat_name);
      $('#edit_email').val(obj_date.mail_id);
      $('#edit_password').val(arr[0]);
      $('#edit_save_user').val(obj_date.user_id);
      $('#editprofile').val(obj_date.user_id);

      $( "#dialog" ).dialog();
  });

  return false;
}); 


$('#edit_save_user').click(function() {
  var formdata = $('#edit_form').serialize();
  var email = $('#edit_email').val();
  function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

if (validateEmail(email)==false) {
  alert('Invalid Email Id !');
  return false;
  $('#edit_email').focus(function() {
    $(this).css('color', 'red');$(this).css('border-color', 'red');
    $('#error_message_1').html('Invalid Email Id !')
  });
};


  $('#edit_save_user').html('saving...');
  $('#lodergif').removeClass('loder');

  $.post('<?php echo URL ?>ajax-edit.php', formdata, function(data, textStatus, xhr) {
   
    $('#edit_save_user').html('Save')
    $('#lodergif').addClass('loder');
    $('#error_message_1').html(data);
	window.location.href = window.location.href;
  });

  return false;

});



$(document).ready(function() {

$('#frmatfile').click(function() {
  
  if (confirm('Are you sure ?  want to delete All Sharing file') == true) {
    $.post('', {format: 'allfile'}, function(data, textStatus, xhr) {
      
    });
  };
});

  $('#save_user').click(function() {
    var name = $('#name').val();
    var cname = $('#cname').val();
   
    var email = $('#email').val();
    var password = $('#password').val();
    if (cname=='') {
      $('#cname').focus();
    }else{


    $.post('', {name:name,cname:cname,email:email,password:password,form:'saveuser'}, function(data, textStatus, xhr) {
		$('#success-msg').html('User Added Successfully');
      //window.location.href = "";
	  
    });
    };
  });
});
  

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#blah123').html('<img height="100px" width="100px"  style="" id="blah" src="'+e.target.result+'" alt="your image" />');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });


 document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
$(":file").filestyle({buttonText: "Find file"});





  </script>
  <link rel="stylesheet" type="text/css" href="paging/style3.css" />
