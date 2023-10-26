<?php
 
 $hospital_logo = $this->Custom->BapCustUniGetUserMeta($masterHospital['MasterHospital']['id'], 'hospital_logo');
 
     $hospitalDetail = $this->Custom->GethospitalDetByID($masterHospital['MasterHospital']['id']);
     $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
     $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];

    
//pr($servicesDetail);exit;

?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Hospital Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
               
                <td style="width:15%;"><?php echo __('Hospital Name'); ?></td>
                <td><?php echo $hospitalName; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Hospital Id'); ?></td>
                <td><?php echo h($masterHospital['MasterHospital']['hospital_id']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Reference Id'); ?></td>
                <td><?php echo h($masterHospital['MasterHospital']['ref_id']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Email Address'); ?></td>
                <td><?php echo h($masterHospital['MasterHospital']['email_id']); ?></td>
            </tr>
             
            
           
            <tr>
                <td><?php echo __('Hospital Detail'); ?></td>
                <td><?php echo $hospitalDetails; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Hospital Logo'); ?></td>
                <td><?php  if($hospital_logo!=''){
                 	 ?>
                 	 <img src="<?php echo $base_url;?>files/hospital_logo/<?php echo $hospital_logo; ?>" style="width:80px;">
                 	 <?php
                 	}?></td>
            </tr>
            
            

             <tr>
                <th colspan="2"><?php echo __('Login Detail'); ?></th>
            </tr>
            <tr>
                <td><?php echo __('User Name'); ?></td>
                <td><?php 
                        echo $masterHospital['MasterHospital']['user_name'];
                        ?></td>
            </tr>
            <tr>
                <td><?php echo __('Password'); ?></td>
                <td><?php 
                        echo base64_decode($masterHospital['MasterHospital']['user_pass']);
                        ?></td>
            </tr>
             <tr>
                <th colspan="2"><?php echo __('Contact Detail'); ?></th>
            </tr>
           
            
            <tr>
                <td><?php echo __('Zip Code'); ?></td>
                <td><?php 
						echo h($masterHospital['MasterHospital']['zipcode']);
						?></td>
            </tr>
            
            <tr>
                <td><?php echo __('Contact No'); ?></td>
                <td><?php 
						echo h($masterHospital['MasterHospital']['mobile_no']);
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Alternate Contact No'); ?></td>
                <td><?php 
                        echo h($masterHospital['MasterHospital']['emrg_no']);
                        ?></td>
            </tr>
             <tr>
                <td><?php echo __('Status'); ?></td>
                <td><?php 
                    if($masterHospital['MasterHospital']['status'] == 1){
                    echo "<font color=green>Active</font>";
                    }else{
                    echo "<font color=red>Inactive</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($masterHospital['MasterHospital']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

