<!--<link type="text/css" rel="stylesheet" href="demo.css">-->
<link type="text/css" rel="stylesheet" href="extra/jquery-te-1.4.0.css">
<script type="text/javascript" src="extra/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/chat.js" charset="utf-8"></script>

<!--<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.ui.scrollbar.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
  $("#chat_messages").scrollbar({orientation: 'vertical'});
});
</script>-->

<div id="messagebox">
<?php 
$userid = $_SESSION['user_id'] ;
$oluser_sql = mysql_query("SELECT * FROM `master_users` WHERE `status` = 1 AND `is_online` = '1' AND id !=$userid" ) or die(mysql_error());
 $count123=mysql_num_rows($oluser_sql);


?>
<?php if (!empty($_SESSION['online_user']) && $count123>0){ ?>
		
<?php require_once 'messages-ajax.php'; ?>
<?php } else { ?>
	<div class="msg_nb_logo"></div>
	<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header1 ui-corner-all">
		<li id="welcome" style="font-size: 54px; height: 546px; text-align: center; line-height:220px; color:#fff">Welcome To</li> </ul>
<?php } ?>
</div>

<!------Timer script ------------>

<div id="demo111"></div>
<div id="getclockwithdate"></div>
<div id="t1"></div>
<script>
/*var myVar = setInterval(function(){ myTimer() }, 2000);

function myTimer() {
    var d = new Date();
    var t = d.toLocaleTimeString();
    document.getElementById("demo111").innerHTML = t;
}*/



</script>
<!-------------timer script end--------------->

<script>
  $('.jqte-test').jqte();

  var message = $('.jqte_editor').html();
  // settings of status
  var jqteStatus = true;
  
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });



$(document).ready(function() {
   $('.online').click(function(event) {
     var user_id = $(this).attr('id');

     $.post('chatbox.ajax.php', {add_chatuser: 'true', id:user_id}, function(data, textStatus, xhr) {
       //$('#chat_tab').html(data);
       $(location).attr('href', '');
     });

   

    return false;
   });
 }); 
</script>

