<?php   

include_once 'includes/db.php';
include_once 'includes/resizeimg.php';



if (isset($_FILES['file']['type']) && !empty($_FILES['file']['type'])) {

  $file_name = $_FILES['file']['name'] ;
  $tmp_file = $_FILES['file']['tmp_name'] ;
  $avatar   = time().'avtimg-'.$file_name;
  $path     ='uploads/'.$avatar ;

  
}




  

  if (isset($_POST['signup'])) {
    extract($_POST);
    $password =base64_encode($pass);

  $query =  mysql_query("INSERT INTO `master_users` ( `user_id` , `full_name` , `chat_name` ,
      `avatar_image` , `tag_line` ,  `pass` , `created` ,
      `is_active` , `is_admin` ,`mail_id`) VALUES ( NULL , '$full_name', '$chat_name', '$avatar',
      '$tag_line',  '$password', now() , '1', '0','$mail_id' )
      ") ;

    if (mysql_insert_id()>0 && $file_name !='') {
      
      move_uploaded_file($tmp_file, $path);
      $_POST = '';

      $watermark = new Watermark();
      smart_resize_image($path , null, 100 , 100 , true , $path , true , false ,100 );
  ?>
<script>
  alert ("You have successfully registered ");
  $(location).attr('href', 'http://maasinfotech24x7.com/nbmessenger/');
</script>
  <?php      

    }else{
      $message = "Email already exists ";
    }
  

  }




require_once 'header.php';
?>



<body>

<div id="sign_in">

   <div id="login_content">
    
<div id="welcome" ><h1 style="  color: #40505b;
    font-family: "NHaasGroteskDSW01-75Bd","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 3.6rem;
    font-style: normal;
    font-weight: normal;
    line-height: 1.1;
    margin-bottom: 0.8em;">Welcome</h1></div>
<form method="post" name="sign_chat_app" id="sign_chat_app"  enctype="multipart/form-data" action="">

                                                                                   
                                              

                                                      <div class="form-group">
                                                        <label for="full_name">
                                                          Full Name :
                                                          <input type="text" placeholder="Full Name" value="<?php if (isset($_POST['full_name'])): echo $_POST['full_name']; ?> <?php endif ?>" name="full_name" id="full_name" ></label>
                                                        &nbsp;
                                                        <div class="clear"></div>
                                                      </div>

                                                      <div class="form-group">
                                                        <label for="chat_name">
                                                          Chat Name :
                                                          <input type="text" placeholder="Chat Name" value="<?php if (isset($_POST['chat_name'])): echo $_POST['chat_name']; ?> <?php endif ?>"  name="chat_name" id="chat_name" ></label>
                                                        &nbsp;
                                                        <div class="clear"></div>
                                                      </div>

                                                      <div class="form-group">

                                                        <label for="avatar_image">
                                                          Avatar  :
                                                          <div style="width:193px" class="fileUpload btn btn-primary">
                                                            <span>Upload</span>
                                                          <!--   <input accept="image/*" id="uploadBtn"  name="file" type="file" class="upload" />     -->

                                                            <input accept="image/*" id="uploadBtn"  name="file"  type="file" class="form-group" data-buttonText="Find file">
                                                          </div>
                                                        </label>
                                                        &nbsp;
                                                        <div class="clear"></div>

                                                      </div>

                                                      <div class="form-group">

                                                        <label for="tag_line">
                                                          Tag Line  :
                                                          <input type="text" placeholder="Tag Line" value="<?php if (isset($_POST['tag_line'])): echo $_POST['tag_line']; ?> <?php endif ?>"  name="tag_line" id="tag_line" ></label>
                                                        &nbsp;
                                                        <div class="clear"></div>

                                                      </div>

                                                      <div class="form-group">
                                                        <label for="mail_id">
                                                          Email Id  :
                                                          <input type="text" placeholder="Email Id" value="<?php if (isset($_POST['mail_id'])): echo $_POST['mail_id']; ?><?php endif ?>"  name="mail_id" id="mail_id" ></label>
                                                        &nbsp;
                                                        <div id="error"><?php if (isset($message)) {
                                                          echo $message;
                                                        } ?></div>
                                                        <div class="clear"></div>
                                                      </div>

                                                      <div class="form-group">

                                                        <label for="pass">
                                                          Password  :
                                                          <input type="password"  placeholder="Password" name="pass" id="pass" ></label>
                                                        &nbsp;
                                                        <div class="clear"></div>
                                                      </div>

                                                      <div class="form-group">

                                                        <label for="pass1">
                                                          Re Type New Passowrd  :
                                                          <input type="password" placeholder="Re Type New Passowrd" name="pass1" id="pass1" ></label>
                                                        &nbsp;
                                                        
                                                        <div class="error " style="colore:red"></div>
                                                      </div>

                                                      <div class="form-group">
                                                      <input type="hidden" name="signup" value="signup" />


                                                        <input class="btn btn-success" type="button" value="Sign up" src="images/login.png" id="signup">&nbsp; <h6> <a href="index.php" style="margin-left:100px;">Back to login</a></h6>
                                                     
                                                        </div>
                                                    </p>
</form>
                
   </div>

   
</div>

</body>
</html>

<script>
  
 document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};


jQuery(document).ready(function($) {
  $('#signup').click(function() {
    

       var full_name = $('#full_name').val();
       var chat_name = $('#chat_name').val();
       var tag_line = $('#tag_line').val();
       var mail_id = $('#mail_id').val();
       var pass = $('#pass').val();       
       var pass1 = $('#pass1').val();  
       var uploadBtn = $('#uploadBtn').val();



       if (pass!='') {
        if (pass!=pass1 ) {
          $('#pass1').focus();
          $('#pass1').css('color', 'red');

         
          $('.error').html('Enter valid password ');
          return false;

        }else{
          $('#pass').css('color', ''); 
          $('.error').html('');     
         // alert(0);
        };

};

   




        if (full_name=='') {
          $('#full_name').focus();
          $('#full_name').css('color', 'red');
          return false;
          var form = 0;

        }else{
          $('#full_name').css('color', '');
          var form = 1;
        };




           if (chat_name=='') {
          $('#chat_name').focus();
          $('#chat_name').css('color', 'red');
          return false;
          var form = 0;

        }else{
          $('#chat_name').css('color', '');  
          var form = 1;   
            
        };


    if (uploadBtn=='') {
          $('#uploadBtn').focus();
          $('#uploadBtn').css('color', 'red');
          return false;
          var form = 0;

        }else{
          $('#uploadBtn').css('color', '');
          var form = 1; 
           
        };


        if (tag_line=='') {
          $('#tag_line').focus();
          $('#tag_line').css('color', 'red');
          return false;
          var form = 0;

        }else{
          $('#tag_line').css('color', '');
          var form = 1; 
           
        };

    


    if (mail_id!=='') {
       var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        email =  regex.test(mail_id);
        if (!email) {
            $('#mail_id').focus();
          $('#mail_id').css('color', 'red');
          return false;
          var form = 0;
          };

        
    }else{
        $('#mail_id').css('color', '');
        var form = 1;
        

    };


        if (mail_id == '') {
      $('#mail_id').focus();
      $('#mail_id').css('color', 'red');
      return false;
      var form = 0;
    };




        if (pass=='') {
          $('#pass').focus();
          $('#pass').css('color', 'red');
          return false;
          var form = 0;

        }else{
          $('#pass').css('color', ''); 
          var form = 1;
               
        };



  if (form!=0) {
    $('#sign_chat_app').submit();
  };  


  });
});

$(":file").filestyle({buttonText: "Find file"});
</script>

