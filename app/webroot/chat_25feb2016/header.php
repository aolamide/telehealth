<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Telehealth Solutions</title>
<link id="favicon" rel="shortcut icon" type="images/png" href="images/favicon.gif" />
<link href="<?php echo URL ?>css/style.css" rel="stylesheet" media="all" type="text/css" />
<link href="<?php echo URL ?>extra/jquery-te-1.4.0.css" rel="stylesheet" media="all" type="text/css" />
<script type="text/javascript" src="<?php echo URL ?>js/jquery-1.6.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo URL ?>js/jquery.validate.min.js" charset="utf-8"></script>

<script>
$body = $("body");
//$body.addClass("loading");
$(function() {
$( "#tabs" ).tabs();
 $("#jqte-test").jqte();
});

$(window).load(function() {
  $(".loader").fadeOut("slow");

})

$('.right').css('opacity', 0);
$(window).load(function() {
  $('.right').css('opacity', 1);
});

</script>
<style>
  .right{
    opacity: 0;

  }

  #loading {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
  display: block;
  opacity: 0.64;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}

#loading-image {
     position: absolute;
    top: 273px;
    z-index: 100;
}
.alert_message{
  background: red;
}

.fileUpload {
  position: relative;
  overflow: hidden;
  margin: 10px;
}
.fileUpload input.upload {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.e_msg{
  color:red;
}
.loder{
  display: none;
}
#email_error_msg,#edit_email_message_new,#error_message_1{
  color:red;
}

</style>
<script type="text/javascript" src="<?php echo URL ?>extra/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo URL ?>dist/css/bootstrap.min.css">


<link rel="stylesheet" href="<?php echo URL ?>js/jquery-ui.css">
<link rel="stylesheet" href="<?php echo URL ?>css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo URL ?>js/jquery-ui.theme.css">

<script src="<?php echo URL ?>js/external/jquery/jquery.js"></script>
<!--<script src="<?php //echo URL ?>js/external/jquery/jquery.dataTables.min.js"></script>-->
<script src="<?php echo URL ?>js/jquery-ui.js"></script>
<!--<link rel="stylesheet" href="<?php echo URL ?>/resources/demos/style.css">-->
<script>
$(function() {
$( "#tabs" ).tabs();

});
</script>
<script language="javascript" type="text/javascript">
  $(window).load(function() {
    $('#loading').hide();
  });
</script>


<style>
  .form-group{
    padding: 3px;
  }
</style>
<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo URL ?>dist/css/bootstrap-theme.min.css">


</head>

  
</head>