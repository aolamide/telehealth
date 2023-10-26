<?php
echo $this->element('myadmin/header-dashboard');
?>

<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
            <?php echo $this->element('myadmin/dashboard-left');?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php
						
							$controller=$this->request->params['controller'];
							
							switch($controller){
								
								case "AdminUsers":
									echo "Manage Admin";
									break;
								case "ManageBrands":
									echo "Manage Brands";
									break;
								case "ManageCategories":
									echo "Manage Categories";
									break;
								case "AdminLangs":
									echo "Manage Languages";
									break;
								case "AdminPages":
									echo "Manage Pages";
									break;
								case "ManageUsers":
									echo "Manage Users";
									break;
								case "Banners":
									echo "Manage Banners";
									break;
								case "UserMemberships":
									echo "Manage Memberships";
									break;
								case "Advertisements":
									echo "Manage Advertisements";
									break;
								case "ManageSales":
									echo "Manage Sales";
									break;
								case "SocialIcons":
									echo "Manage Social Icons";
									break;
								
								}
							
							
							?>
                        <small>&nbsp;</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo $base_url;?>admin/AdminLogins/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>		<?php 
						$controller=$this->request->params['controller'];
							
							switch($controller){
								
								case "AdminUsers":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/AdminUsers/">Manage Users</a></li>
									<?php
									break;
								case "ManageBrands":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/ManageBrands/">Manage Brands</a></li>
									<?php
									break;
								case "ManageCategories":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/ManageCategories/">Manage Categories</a></li>
									<?php
									break;
								case "AdminLangs":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/AdminLangs/">Manage Languages</a></li>
									<?php
									break;
								case "AdminPages":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/AdminPages/">Manage Pages</a></li>
									<?php
									break;
								case "ManageUsers":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/ManageUsers/">Manage Users</a></li>
									<?php
									break;
								case "Banners":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/Banners/">Manage Banners</a></li>
									<?php
									break;
								case "UserMemberships":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/UserMemberships/">Manage Memberships</a></li>
									<?php
									break;
								case "Advertisements":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/Advertisements/">Manage Advertisements</a></li>
									<?php
									break;
								case "ManageSales":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/ManageSales/">Manage Sales</a></li>
									<?php
									break;
								case "SocialIcons":
									?>
									 <li class="active"><a href="<?php echo $base_url;?>admin/SocialIcons/">Manage Social Icons</a></li>
									<?php
									break;
									
								
								}
						?>
                        <!--<li class="active"><a href="<?php echo $base_url;?>admin/AdminUsers/">Manage Users</a></li>-->
                        <!--<li class="active">Simple</li>-->
                    </ol>
                </section>
				<?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content');?>
               
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php
echo $this->element('myadmin/footer-dashboard');
?>