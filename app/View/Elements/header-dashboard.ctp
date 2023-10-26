<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout;?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $base_url; ?>images/favicon.ico">
<link href="<?php echo $base_url; ?>css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?php echo $base_url; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css" type="text/css" media="screen">
<link href="<?php echo $base_url; ?>css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo $base_url; ?>css/tabpanel2.css" /> 
<link type="text/css" rel="stylesheet" href="<?php echo $base_url; ?>css/responsive-tabs.css" /> 
<link rel="stylesheet" href="<?php echo $base_url; ?>css/menu.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $base_url; ?>css/latestnews_slider.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $base_url; ?>css/search.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $base_url; ?>css/responsivemultimenu.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $base_url; ?>css/breadcrumb.css" type="text/css"/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 

<?php 
if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards' || $this->request->params['controller']=='Appdetails' || $this->request->params['controller']=='appdetails')&& ($this->request->params['action']=='ManageAvailability' || $this->request->params['action']=='AddAppointment' || $this->request->params['action']=='EditAppointment' || $this->request->params['action']=='EditProfilePatient' || $this->request->params['action']=='editprofiledoctor' || $this->request->params['action']=='fulltimeavilability' || $this->request->params['action']=='selectdate')){?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="<?php echo $base_url;?>myadmin/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
<script src="<?php echo $base_url;?>myadmin/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<?php }?>

<?php 
if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards' || $this->request->params['controller']=='Appdetails' || $this->request->params['controller']=='appdetails')&& ($this->request->params['action']=='savediagnosys' || $this->request->params['action']=='feedback')){?>
<script type="text/javascript" src="<?php echo $base_url;?>js/ckeditor/ckeditor.js"></script>
<?php }?>

<?php 
if(($this->request->params['controller']=='Appdetails' || $this->request->params['controller']=='appdetails')&& ($this->request->params['action']=='feedback')){?>
<link href="<?php echo $base_url;?>css/star-rating.css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo $base_url;?>js/star-rating.js"></script>
<?php }?>

<script src="<?php echo $base_url; ?>js/bootstrap.min.js"></script>



<script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.flexisel.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>js/responsivemultimenu.js"></script>


<?php 
if($this->request->params['controller']=='Pages' || $this->request->params['controller']=='Pages'){?>
<script src="<?php echo $base_url;?>js/faqscript.js"></script>
<?php }?>
</head>
<body>





<!--===================================Logo Section===================================-->
<header>
    <div class="container">
        <div class="row ">
            <div class="col-md-2 col-sm-3 header_logo">
            
             <?php if(!empty($siteSettings['Sitesetting']['sml_logo_image'])){?>
                <a href="<?php echo $base_url;?>">
                <img src="<?php echo $base_url;?>files/site_logo/<?php echo $siteSettings['Sitesetting']['sml_logo_image'];?>" alt="InHealth"></a>
                <?php }?>
            </div>
            
            
            <div class="col-md-10 col-sm-9">
            
            
                    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Telehealth Solutions</a></li>
        <li><a href="#">Links</a></li> -->
        <li><?php echo $this->Custom->BapCustUniNavMenu(0, 'top',$pageID, $base_url,1, '<ul class="nav navbar-nav navbar-right">');?></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo stripslashes($LoginRes['MasterUser']['fname']." ".$LoginRes['MasterUser']['lname']);?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php   $loginType=$this->Session->read('loginType'); ?>
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
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
                
                
            </div>
            
            
            
            
            
            
        </div>
    </div>
</header>
