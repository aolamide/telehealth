<?php 

require_once 'includes/config.php'; 
if (!empty($_POST['email']) && !empty($_POST['password'])) {

            $email      = $_POST['email'];
            $password   = base64_encode($_POST['password']);          
            $chack_user = mysql_query("SELECT * FROM `master_users` WHERE `mail_id` = '$email' AND PASS = '$password' ") or die(mysql_error());
           
        
            $user       = mysql_fetch_row($chack_user);
              if (mysql_num_rows($chack_user)>0) {       
            
                    $_SESSION['email']      = $email;
                    $_SESSION['password']   = $password;
                    $_SESSION['time']       = time();
                    $_SESSION['user_id']    =  $user[0] ;
                      
                   }else{
                  
                        header('Location:'.URL.'?user=1');
                   }
         
           
                                            
           }elseif (isset($_SESSION['email']) && isset($_SESSION['time']) && isset($_SESSION['user_id']) && isset($_SESSION['password']) ) {
            
            $email      = $_SESSION['email'];
            $password   = base64_encode($_SESSION['password']);          
            $chack_user = mysql_query("SELECT * FROM `master_users` WHERE `mail_id` = '$email' AND PASS = '$password' ");
            $user                       = mysql_fetch_row($chack_user);   
            

           }
           else{
            header('Location:'.URL);
              
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
              <a href="<?php echo URL; ?>group_chat.php"><li class="menu1"><img src="images/group_msg.png"/>Messenger</li></a>
              <a href="<?php echo URL; ?>settings.php"><li class="menu4"><img src="images/maintainance_icon.png"/>Settings </li></a>
              <a href="<?php echo(URL) ?>logout.php"><li class="menu6"><img src="images/logout.png"/> Logout</li></a>
          </ul>
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
  setInterval(function () {
    $.post('get_all_message_list.php',{ param1: 'value1'}, function(data, textStatus, xhr) {
   // console.log(data);
    var obj = jQuery.parseJSON( data);
    $.each(obj, function(index, val) {
     // alert('total_message_'+index);
     var user_class = '.total_message_'+index;
     var user_class_href = $(user_class).attr('href');
     //alert(user_class_href);
     if (user_class_href == val) {
      //$(user_class).html(val);
     }else{
      $(user_class).html(val-user_class_href);
     
      $('.chat_tab'+index).toggleClass('alert_message');
     };
       
    });
    });
}, 3000);
});

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
   $.post('ajax_send_message.php',{sendmessage: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>',message: message}, function(data, textStatus, xhr) {
    $('#tabs-'+id).html(data);
    $(".jqte_editor").html('');

   

        var scrolled=0;
       scrolled=scrolled+10900;
        
        $(".chat_messages").animate({
                scrollTop:  scrolled
           });

      
     

  });
  


  
    }
});
window.opener.location.href = window.opener.location;
</script>