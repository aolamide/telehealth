<?php 
#var_dump($_SESSION);
//print_r($_SESSION);
if (isset($_SESSION['user_id'])) {
  $userid = $_SESSION['user_id'] ; 
 
  $user_det =  mysql_query("SELECT * FROM `master_users` WHERE `status` = 1 AND `is_online` = '1' AND id =$userid" ) or die(mysql_error());
  $user_det = mysql_fetch_object($user_det);


 ?>
 <script>

$(function() {

    getOnlineUser();

 
});
function ChangeStatus(val){
	//alert(val);
    
    $.post('<?php echo URL ?>chatbox.ajax.php', {add_chatuser: 'true',id:val}, function(data, textStatus, xhr) {
		//alert(data);
      window.location.href = window.location.href;
    });
    
    return false;

  }
 
function getOnlineUser() {
$(window).focus(function(){
	
  // $("#favicon").attr("href","images/favicon.ico");
   clearInterval(myVar);
   
  <?php if($_SESSION['corent_user']=="") { ?>
  location.reload();
  <?php } ?>
   
});	
	
 userid =<?php echo $_SESSION['user_id'] ; ?>;
 url= "<?php echo URL ?>";
 
   if(userid != ''){
		$.get('get_online_user_ajax.php', {user_id:userid,url_main:url}, function(data) {
		 $('#online_user_part').html(data);	
		
		});
	}
  setTimeout("getOnlineUser()",7000);
 
}
 
</script>
  <div class="left">
  
  <span class="tag_line_user">Welcome  <?php echo $user_det->user_name; ?></span>  

          <ul class="leftmenu" id="online_user_part">
          
          </ul>
 <!-- <div class="input-prepend">
       <span class=" glyphicon glyphicon-search"></span>
         <input type="text" placeholder="Username" id="prependedInput" class=" input-medium search-query span2">
            </div> -->
       </div>
       <?php } ?>

<script>
  $('.onlinetabe').click(function() {
    var tid = $(this).attr('id');
    $('.ui-corner-top').removeClass(' ui-corner-top ui-tabs-active ui-state-active');
    $('#chat_tab > #'+tid).addClass(' ui-corner-top ui-tabs-active ui-state-active'); 
	var id = $(this).attr('id');
    $('.ui-tabs-panel ').css('display', 'none');
    $('#tabs-'+tid).css('display', 'block');

    var goid= "myDiv-"+id;
  $.post('<?php echo URL ?>ajax_send_message.php',{sendmessageclick: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>'}, function(data, textStatus, xhr) {
          
     });
    return false ;
  });


  $('#prependedInput').keyup(function() {
    var serchtag = $(this).val();
    $.post('<?php echo URL ?>ajax-online.php', {search: serchtag}, function(data, textStatus, xhr) {
      $('.leftmenu').html(data);
    });
  });

  
</script>
