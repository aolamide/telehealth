<?php

$address = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'address');
$work_phone = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'work_phone');
$country = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'country');
$state = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'state');
$city = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'city');
$guardians_name = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'guardians_name');
$emrg_contact_per = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'emrg_contact_per');
$hospitalID = $this->Custom->BapCustUniGetUserMeta($MasterPharmasist['MasterPharmasist']['id'], 'hospitalid');

if($hospitalID!=''){
     $hospitalDetail = $this->Custom->BapCustUniGethospitalByID($hospitalID);
     $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
     $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
}else{
    $hospitalName = '';
    $hospitalDetails = '';
}
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Pharmasist Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Name'); ?></td>
                <td><?php echo stripslashes($MasterPharmasist['MasterPharmasist']['fname']." ".$MasterPharmasist['MasterPharmasist']['lname'] ); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Email Id'); ?></td>
                <td><?php echo h($MasterPharmasist['MasterPharmasist']['email_id']); ?></td>
            </tr>
            
             <tr>
                <td><?php echo __('Reference Id'); ?></td>
                <td><?php echo h($MasterPharmasist['MasterPharmasist']['ref_id']); ?></td>
            </tr>
            
           
             <tr>
                <th colspan="2"><?php echo __('Login Detail'); ?></th>
            </tr>
            <tr>
                <td><?php echo __('User Name'); ?></td>
                <td><?php 
                        echo $MasterPharmasist['MasterPharmasist']['user_name'];
                        ?></td>
            </tr>
            <tr>
                <td><?php echo __('Password'); ?></td>
                <td><?php 
                        echo base64_decode($MasterPharmasist['MasterPharmasist']['user_pass']);
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
						echo h($MasterPharmasist['MasterPharmasist']['zipcode']);
						?></td>
            </tr>
            
            <tr>
                <td><?php echo __('Mobile No'); ?></td>
                <td><?php 
						echo h($MasterPharmasist['MasterPharmasist']['mobile_no']);
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Emergency Phone'); ?></td>
                <td><?php 
						echo h($MasterPharmasist['MasterPharmasist']['emrg_no']);
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Work Phone'); ?></td>
                <td><?php 
						echo $work_phone;
						?></td>
            </tr>
             
             <tr>
                <td><?php echo __('Status'); ?></td>
                <td><?php 
                    if($MasterPharmasist['MasterPharmasist']['status'] == 1){
                    echo "<font color=green>Active</font>";
                    }else{
                    echo "<font color=red>Inactive</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($MasterPharmasist['MasterPharmasist']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

