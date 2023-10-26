<?php
 $address = $this->Custom->BapCustUniGetUserMeta($masterDoctor['MasterDoctor']['id'], 'address');
 $hospitalID = $this->Custom->BapCustUniGetUserMeta($masterDoctor['MasterDoctor']['id'], 'hospitalid');
 $passport_photo = $this->Custom->BapCustUniGetUserMeta($masterDoctor['MasterDoctor']['id'], 'passport_photo');
  $doctor_cv = $this->Custom->BapCustUniGetUserMeta($masterDoctor['MasterDoctor']['id'], 'doctor_cv');
 if($hospitalID!=''){
     $hospitalDetail = $this->Custom->BapCustUniGethospitalByID($hospitalID);
     $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
     $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
}else{
    $hospitalName = '';
    $hospitalDetails = '';
}
$servicesDetail=$this->Custom->serviseAssigned($masterDoctor['MasterDoctor']['id']);
//pr($servicesDetail);exit;

?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Doctor Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Name'); ?></td>
                <td><?php echo stripslashes($masterDoctor['MasterDoctor']['fname']." ".$masterDoctor['MasterDoctor']['lname'] ); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Reference Id'); ?></td>
                <td><?php echo h($masterDoctor['MasterDoctor']['ref_id']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Email Address'); ?></td>
                <td><?php echo h($masterDoctor['MasterDoctor']['email_id']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Doctor Type'); ?></td>
                <td><?php if($masterDoctor['MasterDoctor']['doc_type']==1){echo 'Full-Time Doctor';}else{echo 'Specialist (Appointment Only)';} ?></td>
            </tr>
             <tr>
                <td><?php echo __('Gender'); ?></td>
                <td><?php 
						if($masterDoctor['MasterDoctor']['gender'] == 1){
						echo "Male";
						}else{
						echo "Female";
						}
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Date of Birth'); ?></td>
                <td><?php 
						echo date("d-m-Y", strtotime($masterDoctor['MasterDoctor']['dob']));
						?></td>
            </tr>
           <tr>
                <td><?php echo __('Hospital Name'); ?></td>
                <td><?php echo $hospitalName; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Hospital Detail'); ?></td>
                <td><?php echo $hospitalDetails; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Passport photo'); ?></td>
                <td><?php  if($passport_photo!=''){
                 	 ?>
                 	 <img src="<?php echo $base_url;?>files/passport/<?php echo $passport_photo; ?>" style="width:80px;">
                 	 <?php
                 	}?></td>
            </tr>
            <tr>
                <td><?php echo __('CV'); ?></td>
                <td><?php   if($doctor_cv!=''){
                 	 ?>
                 	 <a href="<?php echo $base_url;?>files/cv/<?php echo $doctor_cv; ?>" target="_blank">View CV</a>
                 	 <?php
                 	}?></td>
            </tr>
            <tr>
                <td><?php echo __('Services'); ?></td>
                <td><?php  if( !empty($servicesDetail)){
                                $i=0;
                                $cnt=count($servicesDetail);
                                foreach($servicesDetail as $servicesDetails){$i++;
                                    echo $servicesDetails;
                                    if($i!=$cnt){
                                        echo "&nbsp;,&nbsp;";
                                    }
                                }
                        
                    }?></td>
            </tr>

             <tr>
                <th colspan="2"><?php echo __('Login Detail'); ?></th>
            </tr>
            <tr>
                <td><?php echo __('User Name'); ?></td>
                <td><?php 
                        echo $masterDoctor['MasterDoctor']['user_name'];
                        ?></td>
            </tr>
            <tr>
                <td><?php echo __('Password'); ?></td>
                <td><?php 
                        echo base64_decode($masterDoctor['MasterDoctor']['user_pass']);
                        ?></td>
            </tr>
             <tr>
                <th colspan="2"><?php echo __('Contact Detail'); ?></th>
            </tr>
            <tr>
                <td><?php echo __('Address'); ?></td>
                <td><?php 
						echo $address;
						?></td>
            </tr>
            
            <tr>
                <td><?php echo __('Zip Code'); ?></td>
                <td><?php 
						echo h($masterDoctor['MasterDoctor']['zipcode']);
						?></td>
            </tr>
            
            <tr>
                <td><?php echo __('Mobile No'); ?></td>
                <td><?php 
						echo h($masterDoctor['MasterDoctor']['mobile_no']);
						?></td>
            </tr>
             <tr>
                <td><?php echo __('Status'); ?></td>
                <td><?php 
                    if($masterDoctor['MasterDoctor']['status'] == 1){
                    echo "<font color=green>Active</font>";
                    }else{
                    echo "<font color=red>Inactive</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($masterDoctor['MasterDoctor']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

