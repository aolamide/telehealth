<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout;?></title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link href="<?php echo $base_url;?>css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?php echo $base_url;?>myadmin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/style.css" type="text/css" media="screen">
<link href="<?php echo $base_url;?>css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo $base_url;?>css/tabpanel.css" />
<link type="text/css" rel="stylesheet" href="<?php echo $base_url;?>css/responsive-tabs.css" />
<!-- <link rel="stylesheet" href="<?php echo $base_url;?>css/menu.css" type="text/css" media="screen"> -->
<link rel="stylesheet" href="<?php echo $base_url;?>css/latestnews_slider.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $base_url;?>css/search.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $base_url;?>css/responsivemultimenu.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php
if($this->request->params['controller']=='Registers' || $this->request->params['controller']=='registers'){?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php }?>
<script src="<?php echo $base_url;?>js/bootstrap.min.js"></script>



<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.flexisel.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/responsivemultimenu.js"></script>




<script src="<?php echo $base_url;?>js/jquery-scrolltofixed.js" type="text/javascript"></script>
<script>
$(document).ready(function() {

	$('header').scrollToFixed();

	var summaries = $('.summary');
	summaries.each(function(i) {
		var summary = $(summaries[i]);
		var next = summaries[i + 1];

		summary.scrollToFixed({
			marginTop: $('header').outerHeight(true) + 10,
			limit: function() {
				var limit = 0;
				if (next) {
					limit = $(next).offset().top - $(this).outerHeight(true) - 10;
				} else {
					limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
				}
				return limit;
			},
			zIndex: 9999
		});
	});
});
</script>
<?php
if($this->request->params['controller']=='Pages' || $this->request->params['controller']=='pages'){?>
<script src="<?php echo $base_url;?>js/faqscript.js"></script>
<?php }?>
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-76012314-1', 'auto');
  ga('send', 'pageview');
</script>
<body>


<!--===================================Header Section===================================-->


<div class="topbar">
	<div class="container">
    	<div class="row">
            <div class="col-md-6 col-sm-7 hidden-xs">
            	<span class="header_right_tab"><i class="fa fa-phone"></i>
                Call Us <b><?php if(!empty($siteSettings['Sitesetting']['site_phone'])){echo $siteSettings['Sitesetting']['site_phone'];}?></b></span>
                <span class="header_right_tab"><i class="fa fa-envelope-o"></i> Email us <a href="mailto:<?php if(!empty($siteSettings['Sitesetting']['site_email'])){echo h($siteSettings['Sitesetting']['site_email']);}?>">
                <b><?php if(!empty($siteSettings['Sitesetting']['site_email'])){echo h($siteSettings['Sitesetting']['site_email']);}?></b></a></span>
            </div>
            <div class="col-md-6 col-sm-5 hidden-xs socialmedia_top">
            	<div class="socialmedia_iconstop"><span class="socialtest">Follow Us </span>
                <?php
                       if(!empty($socialSettings)){
						  // pr($socialSettings);
                        foreach($socialSettings as $socialSetting){

							if($socialSetting['SocialIcon']['is_iamge']==1 && $socialSetting['SocialIcon']['social_img']!="")
							{?>
                                <a href="<?php echo h($socialSetting['SocialIcon']['social_link']);?>" class="<?php //echo $iconClass;?>" style="padding:7px ;vertical-align:central;">
    				            <?php echo '<img height="25px" width="25px" src="'.$base_url.'files/socialicon/'.$socialSetting['SocialIcon']['social_img'].'">';?>
    							</a>
							<?php }else{
									   $socialIcons= $socialSetting['SocialIcon']['social_icon'];
									   $replace  = array('<i',')','</i>','class',"=",'"','"',">","-");
									   $string = str_replace($replace,' ',$socialIcons);
									 //echo strlen($string);
									  //$iconClass=substr($string, 7,strlen($string));
									   $icon = explode(' ',trim($string));
									  $iconClass= $icon[2];
									  ?>
									  <a href="<?php echo h($socialSetting['SocialIcon']['social_link']);?>" class="<?php echo $iconClass;?>" target="_blank">
									  <?php echo $socialSetting['SocialIcon']['social_icon'];?></a>

                <?php
								}
							}
                      }
                  ?>
                <!-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
                </div>
            </div>
		</div>
	</div>
</div>



<!--===================================Logo Section===================================-->
<header>
    <div class="container">
        <div class="row ">
            <div class="col-md-3 col-sm-3 header_logo">

                <?php if(!empty($siteSettings['Sitesetting']['sml_logo_image'])){?>
                <a href="<?php echo $base_url;?>">
                <img src="images/inhealth_logo2.png" alt="InHealth"></a>
                <?php }?>
            </div>


            <div class="col-md-8 col-sm-8 header_nav">


                    <div class="rmm style">
                         <!--<ul>
                            <li><a href="<?php //echo $base_url;?>" class="active">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">News</a></li>

                            <li><a href="#">Telehealth Solutions</a></li>
                            <li><a href="<?php //echo $base_url;?>contact">Contact Us</a></li>
                            <li><a href="#">Products</a>
                                <ul>
                                    <li><a href="#">Products1</a></li>
                                    <li><a href="#">Products2</a></li>
                                    <li><a href="#">Products3</a></li>
                                </ul>
                            </li>
                        </ul>-->
                        <ul>
                       <?php echo $this->Custom->BapCustUniNavMenu(0, 'top',$pageID, $base_url,'','','');?>

                        <?php
							if($this->Session->check('loginID')){
								 $loginID=$this->Session->read('loginID');
						?>

                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo stripslashes($LoginRes['MasterUser']['fname']." ".$LoginRes['MasterUser']['lname']);?> <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <?php   $loginType=$this->Session->read('loginType'); ?>
                                <li><a href="<?php echo $base_url.'dashboards';?>">Dashboard</a></li>
                                <li><a href="<?php echo $base_url; ?>dashboards/ChangePassword">Change Passowrd</a></li>
                                <?php
                                 if($loginType=='P'){
                                    $edit_profile_url= $base_url.'dashboards/EditProfilePatient';
                                 }else if($loginType=='D'){
                                    $edit_profile_url= $base_url.'appdetails/editprofiledoctor';
                                 }else{
                                    $edit_profile_url='javascript:void(0);';
                                 }
                                ?>
                                <li><a href="<?php echo $edit_profile_url;?>">Edit profile</a></li>
                                <li><a href="javascript:void(0);" class="logoutLink">Log Out</a></li>
                              </ul>
                            </li>
                        <?php } ?>

                         </ul>
                    </div>


            </div>

            <div class="col-md-1 col-sm-1 header_search">
                <div class="searchpanel">

     <input type="text" name="sitesearch" id="sitesearch" value="<?=@$searchtxt?>" placeholder="Search..." class="form-control searchField">
     <btton type="button" value="" class="btn searchBtn"  onclick="showsearchpan();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
            </div>




        </div>
    </div>
</header>

