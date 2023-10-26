<div class="logininnerpage_banner">
    <div class="logininnerpage_banner_bgcolor">
        <div class="container">
            <div class="row">
                 <div class="btn-group btn-breadcrumb">
                    <a href="<?php echo $base_url;?>" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
                    <a href="<?php echo $base_url;?>dashboard" class="btn btn-default">Dashboard</a>

                    <?php if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards')){?>
                        <?php if($this->request->params['action']=='ViewProfile'){?>
                            <a href="<?php echo $base_url; ?>dashboards/ViewProfile" class="btn btn-default">View Profile</a>
                        <?php }?>

                        <?php if($this->request->params['action']=='ChangePassword'){?>
                            <a href="<?php echo $base_url; ?>dashboards/ChangePassword" class="btn btn-default">Change Password</a>
                          <?php }?>

                    <?php }?>

                    <?php if($loginType=='D'){?>
                      <?php if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards' || $this->request->params['controller']=='Appdetails' || $this->request->params['controller']=='appdetails')){?>

                          <?php if($this->request->params['action']=='ManageAvailability'){?>
                            <a href="<?php echo $base_url; ?>dashboards/ManageAvailability" class="btn btn-default">Manage Availabity</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='editprofiledoctor'){?>
                            <a href="<?php echo $base_url; ?>appdetails/editprofiledoctor" class="btn btn-default">Edit Profile</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='savediagnosys'){?>
                            <a href="<?php echo $base_url; ?>dashboards/savediagnosys" class="btn btn-default">Save Diagnosis</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='uploadtestlist'){?>
                            <a href="<?php echo $base_url; ?>dashboards/uploadtestlist" class="btn btn-default">Test Reports List</a>
                          <?php }?>

                      <?php }?>
                    <?php }?>

                    <?php if($loginType=='P'){?>
                      <?php if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards' || $this->request->params['controller']=='Appdetails' || $this->request->params['controller']=='appdetails')){?>

                          <?php if($this->request->params['action']=='selectdoctor' || $this->request->params['action']=='availabilitydate' || $this->request->params['action']=='AddAppointment'){?>
                            <a href="<?php echo $base_url; ?>dashboards/selectdoctor" class="btn btn-default">Add Appointment</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='EditProfilePatient'){?>
                            <a href="<?php echo $base_url; ?>dashboards/EditProfilePatient" class="btn btn-default">Edit Profile</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='ManageAppointment'){?>
                            <a href="<?php echo $base_url; ?>dashboards/ManageAppointment" class="btn btn-default">Manage Appointment</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='uploadtest'){?>
                            <a href="<?php echo $base_url; ?>dashboards/uploadtest" class="btn btn-default">upload Test result</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='diagnosyslist'){?>
                            <a href="<?php echo $base_url; ?>dashboards/diagnosyslist" class="btn btn-default">Diagnosis Report</a>
                          <?php }?>

                           <?php if($this->request->params['action']=='uploadtestlist'){?>
                            <a href="<?php echo $base_url; ?>dashboards/uploadtestlist" class="btn btn-default">Test Reports List</a>
                          <?php }?>

                      <?php }?>
                    <?php }?>

                    <?php if($loginType=='H'){?>
                       <?php if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards')){?>
                          <?php if($this->request->params['action']=='editprofilehospital'){?>
                            <a href="<?php echo $base_url; ?>dashboards/editprofilehospital" class="btn btn-default">Edit Profile</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='selectdoctorhospital'){?>
                            <a href="<?php echo $base_url; ?>dashboards/selectdoctorhospital" class="btn btn-default">Add Appointment</a>
                          <?php }?> 

                          <?php if($this->request->params['action']=='manageappointmenthospital'){?>
                            <a href="<?php echo $base_url; ?>dashboards/manageappointmenthospital" class="btn btn-default">Manage Appointment</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='viewhospitaldoctors'){?>
                            <a href="<?php echo $base_url; ?>dashboards/viewhospitaldoctors" class="btn btn-default">View Doctors</a>
                          <?php }?>

                          <?php if($this->request->params['action']=='viewhospitalpatients'){?>
                            <a href="<?php echo $base_url; ?>dashboards/viewhospitalpatients" class="btn btn-default">View Patients</a>
                          <?php }?>

                      <?php } ?>
                    <?php }?>  
                </div>
            </div>
        </div>
    </div>
</div>