 <!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $base_url;?>myadmin/img/gravatar31.jpg" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Hello, <?php echo $adminRes['AdminLogin']['full_name'];?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <?php /*?><form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form><?php */?>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li<?php if($this->request->params['controller']=='AdminLogins' && $this->request->params['action']=='admin_dashboard'){?> class="active"<?php }?>>
            <a href="<?php echo $base_url;?>admin/AdminLogins/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <!--<li>
            <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
            </a>
        </li>-->
        <li class="treeview<?php if($this->request->params['controller']=='AdminUsers'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Admin</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/AdminUsers/index"><i class="fa fa-angle-double-right"></i> Manage Admin</a></li>
                <li><a href="<?php echo $base_url;?>admin/AdminUsers/add"><i class="fa fa-angle-double-right"></i> Add Admin</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='MasterUsers'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Patients</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/MasterUsers/"><i class="fa fa-angle-double-right"></i> Manage Patients</a></li>
                <li><a href="<?php echo $base_url;?>admin/MasterUsers/add"><i class="fa fa-angle-double-right"></i> Add Patient</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='MasterDoctors'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Doctors</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/MasterDoctors/"><i class="fa fa-angle-double-right"></i> Manage Doctors</a></li>
                <li><a href="<?php echo $base_url;?>admin/MasterDoctors/add"><i class="fa fa-angle-double-right"></i> Add Doctor</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='MasterHospitals'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Hospitals</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/MasterHospitals/"><i class="fa fa-angle-double-right"></i> Manage Hospitals</a></li>
                <li><a href="<?php echo $base_url;?>admin/MasterHospitals/add"><i class="fa fa-angle-double-right"></i> Add Hospital</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='MasterPharmasists'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Pharmasists</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/MasterPharmasists/"><i class="fa fa-angle-double-right"></i> Manage Pharmasists</a></li>
                <li><a href="<?php echo $base_url;?>admin/MasterPharmasists/add"><i class="fa fa-angle-double-right"></i> Add Pharmasists</a></li>
            </ul>
        </li><li class="treeview<?php if($this->request->params['controller']=='MasterLabs'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Labs</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/MasterLabs/"><i class="fa fa-angle-double-right"></i> Manage Labs</a></li>
                <li><a href="<?php echo $base_url;?>admin/MasterLabs/add"><i class="fa fa-angle-double-right"></i> Add Labs</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='TestMasters'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Tests</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/TestMasters/"><i class="fa fa-angle-double-right"></i> Manage Tests</a></li>
                <li><a href="<?php echo $base_url;?>admin/TestMasters/add"><i class="fa fa-angle-double-right"></i> Add Test</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='DoctorAvailabilities'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Doctors Availabilities</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/DoctorAvailabilities/"><i class="fa fa-angle-double-right"></i> Manage Doctors Availabilities</a></li>
                <li><a href="<?php echo $base_url;?>admin/DoctorAvailabilities/add"><i class="fa fa-angle-double-right"></i> Add Doctor Availabity</a></li>
                <li><a href="<?php echo $base_url;?>admin/DoctorAvailabilities/fulltimedocavailable/"><i class="fa fa-angle-double-right"></i> Manage Fulltime Doctors Availabilities</a></li>
                <li><a href="<?php echo $base_url;?>admin/DoctorAvailabilities/addfulltimedoc"><i class="fa fa-angle-double-right"></i> Add Fulltime Doctor Availabity</a></li>
            </ul>
        </li>
         <li class="treeview<?php if($this->request->params['controller']=='Appointments'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Appointments</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Appointments/"><i class="fa fa-angle-double-right"></i> Manage  Appointments</a></li>
                <li><a href="<?php echo $base_url;?>admin/Appointments/add"><i class="fa fa-angle-double-right"></i> Add Appointments</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='ServiceTypes'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Service Types</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/ServiceTypes"><i class="fa fa-angle-double-right"></i>Service Types</a></li>
                <li><a href="<?php echo $base_url;?>admin/ServiceTypes/add"><i class="fa fa-angle-double-right"></i>Add Service</a></li>
            </ul>
        </li>
         <li class="treeview<?php if($this->request->params['controller']=='AdminPages'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Pages</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/AdminPages/"><i class="fa fa-angle-double-right"></i> Manage Pages</a></li>
                <li><a href="<?php echo $base_url;?>admin/AdminPages/add"><i class="fa fa-angle-double-right"></i> Add Page</a></li>
            </ul>
        </li>

        <li class="treeview<?php if($this->request->params['controller']=='MasterMenus'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage menu</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/MasterMenus"><i class="fa fa-angle-double-right"></i>Manage Menu</a></li>
                <li><a href="<?php echo $base_url;?>admin/MasterMenus/add"><i class="fa fa-angle-double-right"></i>Add Menu</a></li>
            </ul>
        </li>

         <li class="treeview<?php if($this->request->params['controller']=='Products'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Product</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Products"><i class="fa fa-angle-double-right"></i>Manage Product</a></li>
                <li><a href="<?php echo $base_url;?>admin/Products/add"><i class="fa fa-angle-double-right"></i>Add Product</a></li>
            </ul>
        </li>

        <li class="treeview<?php if($this->request->params['controller']=='Banners'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Banners</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Banners"><i class="fa fa-angle-double-right"></i> Manage Banners</a></li>
                <li><a href="<?php echo $base_url;?>admin/Banners/add"><i class="fa fa-angle-double-right"></i> Add new Banner</a></li>
            </ul>
        </li>
      <li class="treeview<?php if($this->request->params['controller']=='News'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage News</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/News"><i class="fa fa-angle-double-right"></i>Manage News</a></li>
                <li><a href="<?php echo $base_url;?>admin/News/add"><i class="fa fa-angle-double-right"></i>Add News</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='Hometabs'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Home Tabs</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Hometabs"><i class="fa fa-angle-double-right"></i>Manage Home Tabs</a></li>
                <li><a href="<?php echo $base_url;?>admin/Hometabs/add"><i class="fa fa-angle-double-right"></i>Add Home Tab</a></li>
            </ul>
        </li>
        <li class="treeview<?php if($this->request->params['controller']=='SocialIcons'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Social Links</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/SocialIcons"><i class="fa fa-angle-double-right"></i>Manage Social Links</a></li>
                <li><a href="<?php echo $base_url;?>admin/SocialIcons/add"><i class="fa fa-angle-double-right"></i>Add Social Link</a></li>
            </ul>
        </li>
        <li class="treeview<?php if(($this->request->params['controller']=='Reports') && ($this->request->params['action'] !='admin_edittest' && $this->request->params['action']!='admin_addtest' && $this->request->params['action']!='admin_diagnosysreaport' && $this->request->params['action']!='admin_adddignosis' && $this->request->params['action']!='admin_editdignosis' && $this->request->params['action']!='admin_testresultlist'  && $this->request->params['action']!='admin_addtestresult' && $this->request->params['action']!='admin_edittestresult') ){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Reports"><i class="fa fa-angle-double-right"></i>Contact Report</a></li>
                <li><a href="<?php echo $base_url;?>admin/Reports/conversation"><i class="fa fa-angle-double-right"></i>Conversation Reports</a></li>
                 <li><a href="<?php echo $base_url;?>admin/Reports/logonreport"><i class="fa fa-angle-double-right"></i>User Log-On Reports</a></li>
                 <li><a href="<?php echo $base_url;?>admin/Reports/fulltimeappoint"><i class="fa fa-angle-double-right"></i>Full Time Doctor Appointment Reports</a></li>
                 <li><a href="<?php echo $base_url;?>admin/Reports/patientfeedback"><i class="fa fa-angle-double-right"></i>Patient Feedback Reports</a></li>
                 <li><a href="<?php echo $base_url;?>admin/Reports/testreportlist"><i class="fa fa-angle-double-right"></i>Lab Test Reports</a></li>

                 <!-- <li><a href="<?php echo $base_url;?>admin/Reports/doctorapptreport"><i class="fa fa-angle-double-right"></i>Doctor Day/weekly/monthly Appointment Reports</a></li> -->
            </ul>
        </li>
         <li class="treeview<?php if($this->request->params['action']=='admin_diagnosysreaport' || $this->request->params['action']=='admin_adddignosis' || $this->request->params['action']=='admin_editdignosis'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Diagnosis</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Reports/diagnosysreaport"><i class="fa fa-angle-double-right"></i>Manage Diagnosis</a></li>
                <li><a href="<?php echo $base_url;?>admin/Reports/adddignosis"><i class="fa fa-angle-double-right"></i>Add diagnosis</a></li>
            </ul>
        </li>

        <!-- <li class="treeview<?php //if(($this->request->params['controller']=='Reports') && ($this->request->params['action']=='admin_edittest' || $this->request->params['action']=='admin_addtest' || $this->request->params['action']=='admin_testreportlist')){?> active<?php //}?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Uploaded Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Reports/testreportlist"><i class="fa fa-angle-double-right"></i>Manage Uploaded Reports</a></li>
                <li><a href="<?php echo $base_url;?>admin/Reports/addtest"><i class="fa fa-angle-double-right"></i>Add Uploaded Reports</a></li>
            </ul>
        </li> -->
        <!-- <li class="treeview<?php //if(($this->request->params['controller']=='Reports') && ($this->request->params['action']=='admin_testresultlist' || $this->request->params['action']=='admin_addtestresult' || $this->request->params['action']=='admin_edittestresult')){?> active<?php //}?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Test Results</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Reports/testresultlist"><i class="fa fa-angle-double-right"></i>Manage Test Results</a></li>
                <li><a href="<?php echo $base_url;?>admin/Reports/addtestresult"><i class="fa fa-angle-double-right"></i>Add Test Result</a></li>
            </ul>
        </li> -->

        <li class="treeview<?php if($this->request->params['controller']=='NewsLetters'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Manage Newsletter</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/NewsLetters/add"><i class="fa fa-angle-double-right"></i> Add new Subscriber</a></li>
                <li><a href="<?php echo $base_url;?>admin/NewsLetters"><i class="fa fa-angle-double-right"></i> View Subscriber</a></li>
               <li><a href="<?php echo $base_url;?>admin/NewsLetters/compose_mail"><i class="fa fa-angle-double-right"></i> Compose Mail</a></li>
               <li><a href="<?php echo $base_url;?>admin/NewsLetters/mail_to_subscriber"><i class="fa fa-angle-double-right"></i> Mail To subscriber</a></li>
                <li><a href="<?php echo $base_url;?>admin/NewsLetters/mail_to_subscriber_list"><i class="fa fa-angle-double-right"></i>Sent Mail</a></li>
                
            </ul>
        </li>

        <li class="treeview<?php if($this->request->params['controller']=='Locations'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Locations</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Locations"><i class="fa fa-angle-double-right"></i>Manage Locations</a></li>
                <li><a href="<?php echo $base_url;?>admin/Locations/add"><i class="fa fa-angle-double-right"></i>Add Location</a></li>
            </ul>
        </li>

        <li class="treeview<?php if($this->request->params['controller']=='Faqs'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Faqs</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/Faqs"><i class="fa fa-angle-double-right"></i>Manage Faqs</a></li>
                <li><a href="<?php echo $base_url;?>admin/Faqs/add"><i class="fa fa-angle-double-right"></i>Add Faq</a></li>
            </ul>
        </li>
        
        
        <li class="treeview<?php if($this->request->params['controller']=='AdminLogins' && $this->request->params['action']=='sitesetting'){?> active<?php }?>">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Site Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $base_url;?>admin/AdminLogins/sitesetting"><i class="fa fa-angle-double-right"></i>Site Settings</a></li>

                 <li><a href="<?php echo $base_url;?>admin/AdminLogins/managetimeout"><i class="fa fa-angle-double-right"></i>Manage Timeouts</a></li>
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->