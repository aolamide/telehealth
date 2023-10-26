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
                      <th>Name</th>
                      <th>Reference ID</th>
                      <th>Patient ID</th>
                      <th>Contact No</th>
                    </tr> 
                  </thead> 
                  <tbody> 
                    <?php $i=0;
                      if(!empty($patientList)) {//pr($patientList);
                        foreach ($patientList as $patient): ?>
                          <tr> 
                            <td><?php echo ++$i; ?></td> 
                            <td><a href="<?php echo $base_url."dashboards/viewpatient/".$patient['MasterUser']['id'];?>"><?php echo stripslashes($patient['MasterUser']['fname']." ".$patient['MasterUser']['lname']);?></a></td> 
                            <td><?php echo stripslashes($patient['MasterUser']['ref_id']);?></td> 
                            <td><?php echo stripslashes($patient['MasterUser']['patient_id']);?></td>
                            <td><?php echo stripslashes($patient['MasterUser']['mobile_no']);?></td>
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
