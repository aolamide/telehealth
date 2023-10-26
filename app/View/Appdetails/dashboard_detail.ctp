
<!--===================================Banner Section===================================-->

<?php echo $this->element('top-dashboard');?>
<!--===================================About Us Welcome===================================-->

<div class="logininnerpage">
    <div class="container">
        <div class="row">
        
<div class="col-md-12 logininnerpage2">
    <div class="row">
			<?php echo $this->element('left-dashboard');?>
           
           <!--===================================Profile Detail===================================-->
                          
                
                <div class="col-md-8 col-sm-8">
                   <?php //pr($appointmentDetails);?>
                   <?php $appointment=$appointmentDetails;?>
                <table class="table table-bordered"> 
                  <thead> 
                    <tr> 
                      <th>SL#</th> 
                      <th>Location</th> 
                      <th>Services</th> 
                      <th>Patient Name</th>
                      <th>Appointment Date</th>
                      <th>Appointment Time</th>
                      <th>Status</th>
                    </tr> 
                  </thead> 
                  <tbody> 
                  
                          <tr> 
                            <td>1</td> 
                            <td><?php echo $LocationDetail=$this->Custom->locationDet($appointment['Appointment']['locationid']);?></td> 
                            <td><?php //echo h($appointment['Appointment']['serviceid']); 
                                    $servicesDetail=$this->Custom->serviceApponint($appointment['Appointment']['serviceid']);
                                    if( !empty($servicesDetail)){
                                          $i=0;
                                          $cnt=count($servicesDetail);
                                          foreach($servicesDetail as $servicesDetails){$i++;
                                              echo $servicesDetails;
                                              if($i!=$cnt){
                                                  echo "&nbsp;,&nbsp;";
                                              }
                                          }
                                      }
                      ?></td> 

                            <td><?php echo $doctorDetail=$this->Custom->userDet($appointment['Appointment']['patientid']);?></td> 
                            <td><?php echo h(date("d-m-Y",strtotime($appointment['Appointment']['appointment_date']))); ?></td>
                            <td>
                            <?php //echo $appointmentTimeDet=$this->Custom->AppointmentTimeDet($appointment['Appointment']['appointment_availbility']);
                            $appointTimeDet=$this->Custom->AppointmentTimeAvailDetail($appointment['Appointment']['appoint_book_slut']);
                                        if($appointTimeDet!=""){
                                            echo $appointTimeDet;
                                        }else{
                                          echo $timeDet=$this->Custom->AppointmentTimeDetail($appointment['Appointment']['appointment_availbility']);
                                        }

                            ?>
                            </td>
                            <td>
                            <?php if($appointment['Appointment']['status']==0){?>
                            <a href="<?php echo $base_url."appdetails/statusupdate/".$appointment['Appointment']['id']."/1";?>" class="btn btn-success">Confirm</a><br><br><a href="<?php echo $base_url."appdetails/statusupdate/".$appointment['Appointment']['id']."/2";?>" class="btn btn-danger">Cancel</a>
                            <?php }else if($appointment['Appointment']['status']==1){?>
                            <span style="color: #49A009;font-weight: bold;">Confirmed</span>
                            <?php }else if($appointment['Appointment']['status']==2){?>
                            <span style="color: #F96B02;font-weight: bold;">Canceled</span><br><br>
                             <a href="<?php echo $base_url."appdetails/statusupdate/".$appointment['Appointment']['id']."/1";?>" class="btn btn-success">Confirm</a>
                            <?php }?>
                         </td>
                          </tr> 
                  </tbody> 
                </table>
                    
                    

                </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
