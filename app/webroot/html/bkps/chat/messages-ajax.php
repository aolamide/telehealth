<?php 

//print_r($_SESSION);exit;
 $chat_user = $_SESSION['online_user'];
  $inc = 1; 
  ?>
  <?php 

foreach ($chat_user as $key => $id) {
	 $array_val= $id ;
	 
	
	 
}
if($array_val!="") {
 ?>


<div id="tabs" style="height: 470px;">

            <ul id="chat_tab">
            <?php 
              foreach ($chat_user as $key => $id) {
                if ($id != '') {
                  $username_q = mysql_query("SELECT * FROM `master_users` WHERE `status` = 1 AND `is_online` = '1' AND id = $id");
                  $username_q = mysql_fetch_object($username_q);
				  if($username_q->user_name!="") {
                  ?>
				  
                            <li onclick="ChangeStatus123(<?php echo $id ;?>);" class="chat_tab<?php echo $id ;?> <?php if ($_SESSION['corent_user']==$id): ?> ui-corner-top ui-tabs-active ui-state-active<?php endif ?>" id="<?php echo $id ;?>"><a href="#tabs-<?php echo $id ;?>"><?php echo $username_q->user_name;?></a>&nbsp; <a class="close_tab" id="<?php echo $id ;?>" href="?click"><span class="glyphicon glyphicon-remove-circle"></span></a></li>
                  <?php
				  }
                }
              }
             ?>
            </ul>
  <div id="message_con">

   <?php 
              foreach ($chat_user as $key => $id) {
                if ($id != '') {
                  $username_m = mysql_query("SELECT * FROM `master_users` WHERE `status` = 1 AND `is_online` = '1' AND id = $id") or die(mysql_error());
                  $username_m = mysql_fetch_object($username_m);
                  $ct_msg_user = $username_m->id;
				  if($username_m->id !="") {
                  ?>
                        
                        <div id="tabs-<?php echo $id ;?>" class="chat_messages"  > 
                      <div id="chat_messages" >                    
                              <?php 

                                $frm_user = $_SESSION['user_id'];

                                $frm_user_query =  mysql_query("select * from chats where (from_id= $frm_user AND  to_id =$id) OR (from_id= $id AND  to_id =$frm_user) ORDER BY `chat_date` ASC ") or die(mysql_error()) ;

                                while ($mess = mysql_fetch_array($frm_user_query)) {
                                  ?>
                                    <?php if ($frm_user == $mess['from_id']): 
                                          $img_query = mysql_query("select avatar_image from  master_users where id =".$mess['from_id']);
                                          $img_query = mysql_fetch_object($img_query);

                                    ?>
                                                    <div class="group_chart">
                                                    <div class="rowimg fl_left">
                                                      <!--<img src="uploads/<?php //echo $img_query->avatar_image; ?>" />-->
                                                       <img src="<?php if (!empty($img_query->avatar_image)): ?>
                           <?php echo "uploads/".$img_query->avatar_image; ?>
                         <?php else: ?>
                           <?php echo "uploads/noimg.png"; ?>
                         <?php endif ?>" />
                                                    </div>
                                                    <div class="rowmid">
                                                      <div class="rowchart triangle-isosceles fl_left"><?php echo $mess['chat_message']; ?></div>
                                                      <div class="row2"><?php echo date('dS  F Y\, h:i A', strtotime($mess['chat_date'])) ; ?></div>
                                                    </div>

                                                  </div>
                                    <?php else: 
                                          $img_query = mysql_query("select avatar_image from  master_users where id =".$mess['from_id']);
                                          $img_query = mysql_fetch_object($img_query);   
                                    ?>
                                                  
                                                    <div class="group_chart fl_right rightchart">
                                                    <div class="rowimg fl_right">
                                                     <!-- <img src="uploads/<?php //echo $img_query->avatar_image; ?>" />-->
                                                      <img src="<?php if (!empty($img_query->avatar_image)): ?>
                           <?php echo "uploads/".$img_query->avatar_image; ?>
                         <?php else: ?>
                           <?php echo "uploads/noimg.png"; ?>
                         <?php endif ?>" />
                                                    </div>
                                                    <div class="rowmid fl_right">
                                                      <div class="rowchart triangle-isosceles fl_right"><?php echo $mess['chat_message']; ?></div>
                                                      <div class="row2 fl_right"><?php echo date('dS F Y\, h:i A', strtotime($mess['chat_date'])) ; ?></div>
                                                    </div>

                                                  </div>

                                    <?php endif ?>
                                    
                                  <?php
                                }

                               ?>

                           <span id="scroll_end"></span>          

                       </div>
                     
            </div>


                  <?php
				  }
                }
              }
             ?>


<hr>
<style>
  .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

</style>
<!--<a class="pull-right btn btn-xs btn-primary "  id="view_message" >View Chat</a>-->




<div id="mess">
	<div style="width:70%; float:left;">
		<textarea name="textarea" id="chat_message_box"  class="jqte-test"></textarea>
	</div>
	
	<div style="width:28%; float:right;">
		<table width="200" border="0">

                           <tr>
    <td height="55">      <button type="button" id="Sendmessage"  name="Sendmessage" class="btn btn-xs btn-primary ">Send  Message&nbsp;<span class="glyphicon glyphicon-send"></span></button>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">
 <button id="trass" aria-expanded="false" data-toggle="dropdown" class="btn btn-xs  btn-warning " type="button">Clear History
 &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
    &nbsp;</td>
  </tr>
  <tr>
   <td colspan="2">
     
     <form method="post" enctype="multipart/form-data"  action="upload.php">
       <span class="btn btn-default btn-xs btn-info  btn-file" style="float: left;">
         Attach File <span class="glyphicon glyphicon-paperclip"></span>
         <input type="file" name="images" id="images" multiple />
         <button type="submit" id="btn">Upload Files!</button>
         </span>
       </form>
     <div  style="Display:none" id="response"></div>
     <ul id="image-list" style="Display:none">
       
       </ul>     <span id="loder" style=" display:none;  margin-top: 100px;" ><img src="images/720%283%29.GIF" alt=""></span></td>
   </tr>

</table>
	</div>

	<div style="clear:both; width:100%;"></div>
  
</div>

</div>


</div>
<?php } else { ?>
<div class="msg_nb_logo"></div>
 <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
		<li id="welcome" style="font-size: 54px; height: 563px; text-align: center;line-height:220px;">Welcome</li> 
</ul>

<?php }  ?>	
<!--<script type="text/javascript" src="<?php echo URL ?>js/jquery.titlealert.js"></script>	-->
<script>
//$.titleAlert("New chat message!");
//$("#favicon").attr("href","images/favicon1.png");
</script>
<script>
$('.jqte_editor').keypress(function() {
  
});

$('#view_message').click(function() {


    var id = $('.ui-state-active').attr('id');
    var message = $('.jqte_editor').html();
    var formdata = $('#messagedata').serialize();
    var goid    = "myDiv-"+id;
   $.post('ajax_send_message.php',{sendmessageupdate: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>',message: message,}, function(data, textStatus, xhr) {
    $( data ).dialog({
       resizable: true,
height:400,
width:400,
modal: true,
    });
   });
  


  
  
});

  $('#Sendmessage').click(function() {
	  
    var id = $('.ui-state-active').attr('id');
    var message = $('.jqte_editor').html();
    var formdata = $('#messagedata').serialize();
    var goid    = "myDiv-"+id;
	
   if(message!="") {
   $.post('ajax_send_message.php',{sendmessage: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>',message: message}, function(data, textStatus, xhr) {
    $('#tabs-'+id).html(data);
    $(".jqte_editor").html('');
	
      
     
      $(".chat_messages").animate({ scrollTop:  300000});
              
      
     

  });
   }
  


  });


$(document).ready(function() {


$(window).focus(function(){
   //$("#favicon").attr("href","images/favicon.ico");
});	
  $(".chat_messages").animate({ scrollTop:  300000});

  (function worker() {
	 


	  
    var id = $('.ui-state-active').attr('id');
    var message = $('#chat_message_box').val();
    var formdata = $('#messagedata').serialize();
    var goid    = "myDiv-"+id;
	
	 $.post('ajax_blink_test.php',{sendmessageblink: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>',message: message}, function(data, textStatus, xhr) {
		 
    
	//alert(data);
	  if(data!=""){
		 <?php $_SESSION['counter']=1;  ?> 
 $(window).focus(function(){
	
   //$("#favicon").attr("href","images/favicon.ico");
   clearInterval(myVar);
  
    <?php $_SESSION['counter']=2;  ?> 
  
   
});
	
<?php if($_SESSION['counter']==1) {?>	
alert('check') ;
if(document.hasFocus()) {
//$("#favicon").attr("href","images/favicon.ico");
clearInterval(myVar);
 }else {

var linkCons = "images/";
    var myInterval=4000;
    var count = 1;
 var myVar =   setInterval(function() {
        $('#favicon').attr('href',linkCons+"favicon"+count+".ico");
        count++;
        if (count > 4)
        {
            count = 0;
        }
    }, myInterval);
}
<?php } ?>		  		 
		  data = jQuery.parseJSON(data);
		$.each(data,function(i){
          if(data[i]!=<?php echo $_SESSION['corent_user']; ?>){
			  
			  
			  
		  $("#new_"+data[i]).addClass('animate-flicker_blink active');
		 
		 
		  }else{
			  $(".chat_messages").animate({ scrollTop:  300000}); 
			  
		  }
		     
		 
              });
			 
      
	  }
  
      });
   $.post('ajax_send_message.php',{sendmessageupdate: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>',message: message,}, function(data, textStatus, xhr) {
              $('#tabs-'+id).html(data);
			  
			   
			   setTimeout(worker,2500);
  });
	
 })();


});


$(document).ready(function() {
  $('.ui-state-default').click(function() {


    var id = $(this).attr('id');
    var message = $('#chat_message_box').val();
    var formdata = $('#messagedata').serialize();
    var goid    = "myDiv-"+id;
	//alert(message);
   $.post('ajax_send_message.php',{sendmessageclick: 'true',to_id: id,from_id:'<?php echo $_SESSION['user_id'] ?>',message: message,}, function(data, textStatus, xhr) {
    $('#tabs-'+id).html(data);
    $(".jqte_editor").html('');
       
     // $(".chat_messages").animate({ scrollTop:  300000}); 
       
      
     

  });
  


  


    
  });
});

$('.close_tab').click(function() {
  var close_id = $(this).attr('id');
   $.post('ajax_send_message.php',{closetab: 'true',to_id: close_id,from_id:'<?php echo $_SESSION['user_id'] ?>'}, function(data, textStatus, xhr) {

    /*optional stuff to do after success */
	data1 = jQuery.parseJSON(data);
	var lastEl = data1[data1.length-1];
	//alert(lastEl);
	if(lastEl!=""){
	$('.chat_tab'+lastEl).addClass('ui-corner-top ui-tabs-active ui-state-active');
	$('.chat_tab'+close_id).css('display', 'none');
    $('#tabs-'+close_id).css('display', 'none');
	window.location.href = window.location.href;
	}else{
	$('#mess').css('display', 'none');	
	window.location.href = window.location.href;	
	}
  });

  


  return false;
});

(function () {
  var input = document.getElementById("images"), 
    formdata = false;

  function showUploadedItem (source) {
      var list = document.getElementById("image-list"),
        li   = document.createElement("li"),
        img  = document.createElement("img");
      img.src = source;
      //li.appendChild(img);
    //list.appendChild(li);
   
  }   

  if (window.FormData) {
      formdata = new FormData();
      document.getElementById("btn").style.display = "none";
  }
  
  input.addEventListener("change", function (evt) {
    document.getElementById("response").innerHTML = "Uploading . . ."
    var i = 0, len = this.files.length, img, reader, file;
  
    for ( ; i < len; i++ ) {
      file = this.files[i];
  
      if (!!file.type.match(/.*/)) {
        if ( window.FileReader ) {
          reader = new FileReader();
          reader.onloadend = function (e) { 
            showUploadedItem(e.target.result, file.fileName);
          };
          reader.readAsDataURL(file);
        }
        if (formdata) {
          formdata.append("images[]", file);
        }
      } 
    }
  
    if (formdata) {
       $('#loder').css('display', '');
      $.ajax({
        url: "upload.php",
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (res) {
      $('.jqte_editor').append(res);
            $('#loder').css('display', 'none');
                 formdata = new FormData();
        }
      });
    }
  }, false);
}());

$('#images').click(function() {

});

$('#trass').click(function() {
var close_id =  $('.ui-state-active').attr('id');
  $.post('ajax_send_message.php',{clearhistry: 'true',to_id: close_id,from_id:'<?php echo $_SESSION['user_id'] ?>'}, function(data, textStatus, xhr) {
	  //alert (data);
    $('tabs-'+close_id).html(data);
  }); 
});
function ChangeStatus123(val){
	//alert(val);
    
    $.post('<?php echo URL ?>change_status.ajax.php', {add_chatuser: 'true',id:val}, function(data, textStatus, xhr) {
		 window.location.href = window.location.href;
    });
    
   // return false;

  }
</script>
