<?php

if($this->Session->check('loginID')){
	 $loginID=$this->Session->read('loginID');
}
/*if(isset($loginID) && !empty($loginID)){
	echo $this->element('header-dashboard');
	
}else{
	echo $this->element('header-home');
}*/
echo $this->element('header-home');
?>

<?php echo $this->fetch('content');?>

<?php echo $this->element('footer-home');?>


<script type="text/javascript">
function sendContact()
{
  var sEmail = $('#user_email').val();
  if($.trim($("#first_name").val()) == "")
  {
	  $("#first_name").focus();
	  $("#first_name").css('border-color','#F00');
	  $(".errorwarning").html("Enter Your First Name");
	  return false;
  }else{
	  $("#first_name").css('border-color','#c4c4c4');
	  $(".errorwarning").html("");
  }

  if($.trim($("#last_name").val()) == "")
  {
	  $("#last_name").focus();
	  $("#last_name").css('border-color','#F00');
	  $(".errorwarning").html("Enter Your Lst Name");
	  return false;
  }else{
	  $("#last_name").css('border-color','#c4c4c4');
	  $(".errorwarning").html("");
  }
  
  if($.trim($("#user_email").val()) == "")
  {
	  $("#user_email").focus();
	  $("#user_email").css('border-color','#F00');
	  $(".errorwarning").html("Enter Your Email");
	  return false;
  }else{
	  $("#user_email").css('border-color','#c4c4c4');
	  $(".errorwarning").html("");
  }
  if (validateEmail(sEmail)) {
	   $("#user_email").css('border-color','#c4c4c4');
	   $(".errorwarning").html("");
  }
  else {
	  $("#user_email").focus();
	  $("#user_email").css('border-color','#F00');
	  $(".errorwarning").html("Enter a Valid Email");
	  return false;
  }
  
  if($.trim($("#phone").val()) == "")
  {
	  $("#phone").focus();
	  $("#phone").css('border-color','#F00');
	  $(".errorwarning").html("Enter Your Phone Number");
	  return false;
  }else{
	  $("#phone").css('border-color','#c4c4c4');
	  $(".errorwarning").html("");
  }

  if($.trim($("#detail").val()) == "")
  {
	  $("#detail").focus();
	  $("#detail").css('border-color','#F00');
	  $(".errorwarning").html("Enter Your Message");
	  return false;
  }else{
	  $("#detail").css('border-color','#c4c4c4');
	  $(".errorwarning").html("");
  }
}
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
	}
}

</script>