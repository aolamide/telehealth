<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo stripslashes($title_for_layout);?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo $base_url;?>myadmin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <?php if($this->request->params['controller']!='AdminLogins' && $this->request->params['action']=='admin_dashboard'){?>
        <!-- Morris chart -->
        <link href="<?php echo $base_url;?>myadmin/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo $base_url;?>myadmin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo $base_url;?>myadmin/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo $base_url;?>myadmin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo $base_url;?>myadmin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <?php }?>
        <!-- Theme style -->
        <link href="<?php echo $base_url;?>myadmin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <?php if($this->request->params['controller']=='ManageUsers' && $this->request->params['action']=='admin_rating'){?>
        <link href="<?php echo $base_url;?>myadmin/css/rating.css" rel="stylesheet" type="text/css" />
        <?php }?>
		<script type="text/javascript">
		function signOut()
		{
			$.ajax(
			{
				type: 'POST',
				url: '<?php echo $base_url; ?>AdminLogins/signOut',
				data: 'signout=yes',
				success: function(data) {
					//alert(data);
					if(data==1)
					{
						window.location="<?php echo $base_url;?>admin";
					}
					else
					{
						alert("Sign Out Failed");
					}
				}
			});
		}
		function updateStatus(noticetype)
		{
			$.ajax(
			{
				type: 'POST',
				url: '<?php echo $base_url; ?>AdminLogins/noticeStatus',
				data: 'noticetype='+noticetype,
				success: function(data) {
					//alert(data);
					if(data==2)
					{
						alert("Not Available");
					}
					else if(data)
					{
						switch(noticetype){
							case 'register':
							window.location="<?php echo $base_url;?>admin/ManageUsers";
							break;
							case 'sales-add':
							window.location="<?php echo $base_url;?>admin/ManageSales";
							case 'sales-modified':
							window.location="<?php echo $base_url;?>admin/ManageSales";
							case 'request-parts':
							window.location="<?php echo $base_url;?>admin/Reports/request_part";
							case 'request-modified':
							window.location="<?php echo $base_url;?>admin/Reports/request_part";
							case 'sales-question':
							window.location="<?php echo $base_url;?>admin/Reports/ask_question";
							break;
							case 'sales-order':
							window.location="<?php echo $base_url;?>admin/Reports/sales_order";
							case 'bid-offer':
							window.location="<?php echo $base_url;?>admin/Reports/bid_offer";
							break;
							case 'park-question':
							window.location="<?php echo $base_url;?>admin/Reports/parkquestion";
							break;
							case 'seller-rate':
							window.location="<?php echo $base_url;?>admin/ManageUsers/rating"+data;
							break;
							case 'buyer-rate':
							window.location="<?php echo $base_url;?>admin/ManageUsers/rating"+data;
							break;
							default:
							window.location="<?php echo $base_url;?>admin";
							break;
						}
					}
				}
			});
		}
		</script>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo $base_url;?>admin/AdminLogins/dashboard" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Inhealth
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       <?php /*?> <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo $base_url;?>myadmin/img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo $base_url;?>myadmin/img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo $base_url;?>myadmin/img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo $base_url;?>myadmin/img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo $base_url;?>myadmin/img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li><?php */?>
                         <!-- Notifications: style can be found in dropdown.less -->
                       <?php /*?><li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning"><?php echo $this->Custom->totalNotice();?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <?php echo $this->Custom->totalNotice();?> notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('register');">
                                                <i class="ion ion-ios7-people info"></i> <?php echo $this->Custom->totalNotice('register');?> new members joined                                             </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('sales-add');">
                                                <i class="fa fa-warning danger"></i> <?php echo $this->Custom->totalNotice('sales-add');?> New sales ads
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('park-question');">
                                                <i class="fa fa-warning danger"></i> <?php echo $this->Custom->totalNotice('park-question');?> Park Question
                                            </a>
                                        </li>
                                         <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('sales-modified');">
                                                <i class="fa fa-warning danger"></i> <?php echo $this->Custom->totalNotice('sales-modified');?> Modified sales ads
                                            </a>
                                        </li>
                                         <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('request-parts');">
                                                <i class="fa fa-warning danger"></i> <?php echo $this->Custom->totalNotice('request-parts');?> New Request Parts 
                                            </a>
                                        </li>
                                         <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('request-modified');">
                                                <i class="fa fa-warning danger"></i> <?php echo $this->Custom->totalNotice('request-modified');?> Modified Request Parts 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('sales-question');">
                                                <i class="fa fa-warning danger"></i> <?php echo $this->Custom->totalNotice('sales-question');?>Sales Comment
                                            </a>
                                        </li>
                                         <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('sales-order');">
                                                <i class="ion ion-ios7-cart success"></i> <?php echo $this->Custom->totalNotice('sales-order');?> Sales Ordered
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('request-question');">
                                                <i class="fa fa-users warning"></i> <?php echo $this->Custom->totalNotice('request-question');?>  Parts Comment
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('bid-offer');">
                                                <i class="fa fa-users warning"></i> <?php echo $this->Custom->totalNotice('bid-offer');?>  Offer parts bid
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('buyer-rate');">
                                                <i class="fa fa-users warning"></i> <?php echo $this->Custom->totalNotice('buyer-rate');?>  Rating From Seller
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="return updateStatus('seller-rate');">
                                                <i class="fa fa-users warning"></i> <?php echo $this->Custom->totalNotice('seller-rate');?>  Rating From Buyer
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">all Notification</a></li>
                            </ul>
                        </li>
                       <?php */?>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $adminRes['AdminLogin']['full_name'];?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $base_url;?>myadmin/img/gravatar31.jpg" class="img-circle" alt="User Image" />
                                    <p>
                                    <?php echo $adminRes['AdminLogin']['full_name'];?>
                                        <small>Member since <?php echo date("M. Y",strtotime($adminRes['AdminLogin']['created']));?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <?php /*?><li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li><?php */?>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo $base_url;?>admin/AdminUsers/view/<?php echo $this->Session->read('adminUser');?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="javascript:void(0);" onclick="signOut();" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>