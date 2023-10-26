<?php
 /*$address = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'address');
 $hospitalID = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'hospitalid');
 $passport_photo = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'passport_photo');
  $doctor_cv = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'doctor_cv');
 if($hospitalID!=''){
     $hospitalDetail = $this->Custom->BapCustUniGethospitalByID($hospitalID);
     $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
     $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
}else{
    $hospitalName = '';
    $hospitalDetails = '';
}
$servicesDetail=$this->Custom->serviseAssigned($UserRes['MasterUser']['id']);*/
//pr($servicesDetail);exit;

?>
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
                <table class="table table-bordered"> 
                  <thead> 
                    <tr> 
                      <th>SL#</th> 
                      <th>Location</th> 
                      <th>Services</th> 
                      <th>Doctor Name</th>
                      <th>Patient Name</th>
                      <th>Appointment Date</th>
                      <th>Appointment Time</th>
                      <th>Status</th>  
                      <th>Action</th>  
                    </tr> 
                  </thead> 
                  <tbody> 
                    <?php $i=0;
                      if(!empty($appointmentDetails)) {//pr($appointmentDetails);exit;
                        foreach ($appointmentDetails as $appointment): ?>
                          <tr> 
                            <td><?php echo ++$i; ?></td> 
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

                            <td><a href="<?php echo $base_url."dashboards/viewdoctor/".$appointment['Appointment']['doctorid'];?>"><?php echo $doctorDetail=$this->Custom->userDet($appointment['Appointment']['doctorid']);?></a></td> 
                            <td><?php echo $patientDetail=$this->Custom->userDet($appointment['Appointment']['patientid']);?></a></td> 
                            <td><?php echo h(date("d-m-Y",strtotime($appointment['Appointment']['appointment_date']))); ?></td>
                            <td><?php echo $appointmentTimeDet=$this->Custom->AppointmentTimeDet($appointment['Appointment']['appointment_availbility']);?></td>
                            <td>
                              <?php
                                $appointmentStats=$appointment['Appointment']['status'];
                                if($appointmentStats==0){
                                  $appointStat='<span style="color: #A06C09;font-weight: bold;">Not Yet Confirmed</span>';
                                }else if($appointmentStats==1){
                                  $appointStat='<span style="color: #49A009;font-weight: bold;">Confirmed</span>';
                                }else if($appointmentStats==2){
                                  $appointStat='<span style="color: #A02D09;font-weight: bold;">Cancelled</span>';
                                }
                                echo $appointStat;
                              ?>
                            </td>
                            <td width="20%">
                              <?php echo $this->Html->link(__('Edit'), array('action' => 'editappointmenthospital', $appointment['Appointment']['id']),array('class'=>'btn btn-primary')); ?>

                              <?php //echo $this->Html->link(__('Cancel'), array('action' => 'delete_appointment', $appointment['Appointment']['id']), array('class'=>'btn btn-warning'), __('Are you sure you want to Cancel')); ?>
                            </td>
                          </tr> 
                    <?php endforeach; }?>
                  </tbody> 
                </table>
                    
                    

                </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
