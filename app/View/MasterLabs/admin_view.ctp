<?php

$address = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'address');
$work_phone = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'work_phone');
$country = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'country');
$state = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'state');
$city = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'city');
$guardians_name = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'guardians_name');
$emrg_contact_per = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'emrg_contact_per');
$hospitalID = $this->Custom->BapCustUniGetUserMeta($MasterLab['MasterLab']['id'], 'hospitalid');

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
        <h3 class="box-title">Lab Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Name'); ?></td>
                <td><?php echo stripslashes($MasterLab['MasterLab']['fname']." ".$MasterLab['MasterLab']['lname'] ); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Email Id'); ?></td>
                <td><?php echo h($MasterLab['MasterLab']['email_id']); ?></td>
            </tr>
            
             <tr>
                <td><?php echo __('Reference Id'); ?></td>
                <td><?php echo h($MasterLab['MasterLab']['ref_id']); ?></td>
            </tr>
            
           
             <tr>
                <th colspan="2"><?php echo __('Login Detail'); ?></th>
            </tr>
            <tr>
                <td><?php echo __('User Name'); ?></td>
                <td><?php 
                        echo $MasterLab['MasterLab']['user_name'];
                        ?></td>
            </tr>
            <tr>
                <td><?php echo __('Password'); ?></td>
                <td><?php 
                        echo base64_decode($MasterLab['MasterLab']['user_pass']);
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
						echo h($MasterLab['MasterLab']['zipcode']);
						?></td>
            </tr>
            
            <tr>
                <td><?php echo __('Mobile No'); ?></td>
                <td><?php 
						echo h($MasterLab['MasterLab']['mobile_no']);
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Emergency Phone'); ?></td>
                <td><?php 
						echo h($MasterLab['MasterLab']['emrg_no']);
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
                    if($MasterLab['MasterLab']['status'] == 1){
                    echo "<font color=green>Active</font>";
                    }else{
                    echo "<font color=red>Inactive</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($MasterLab['MasterLab']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

