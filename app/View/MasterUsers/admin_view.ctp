<?php

$address = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'address');
$work_phone = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'work_phone');
$country = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'country');
$state = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'state');
$city = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'city');
$guardians_name = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'guardians_name');
$emrg_contact_per = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'emrg_contact_per');
$hospitalID = $this->Custom->BapCustUniGetUserMeta($masterUser['MasterUser']['id'], 'hospitalid');

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
        <h3 class="box-title">Patient Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Name'); ?></td>
                <td><?php echo stripslashes($masterUser['MasterUser']['fname']." ".$masterUser['MasterUser']['lname'] ); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Email Id'); ?></td>
                <td><?php echo h($masterUser['MasterUser']['email_id']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Patient Id'); ?></td>
                <td><?php echo h($masterUser['MasterUser']['patient_id']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Reference Id'); ?></td>
                <td><?php echo h($masterUser['MasterUser']['ref_id']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Gender'); ?></td>
                <td><?php 
						if($masterUser['MasterUser']['gender'] == 1){
						echo "Male";
						}else{
						echo "Female";
						}
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Date of Birth'); ?></td>
                <td><?php 
						echo date("d-m-Y", strtotime($masterUser['MasterUser']['dob']));
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Marital Status'); ?></td>
                <td><?php 
						echo h($masterUser['MasterUser']['marital_status']);
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
                <th colspan="2"><?php echo __('Login Detail'); ?></th>
            </tr>
            <tr>
                <td><?php echo __('User Name'); ?></td>
                <td><?php 
                        echo $masterUser['MasterUser']['user_name'];
                        ?></td>
            </tr>
            <tr>
                <td><?php echo __('Password'); ?></td>
                <td><?php 
                        echo base64_decode($masterUser['MasterUser']['user_pass']);
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
                <td><?php echo __('Country'); ?></td>
                <td><?php 
						echo $country;
						?></td>
            </tr>
            <tr>
                <td><?php echo __('State'); ?></td>
                <td><?php 
						echo $state;
						?></td>
            </tr>
            <tr>
                <td><?php echo __('City'); ?></td>
                <td><?php 
						echo $city;
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Zip Code'); ?></td>
                <td><?php 
						echo h($masterUser['MasterUser']['zipcode']);
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Guardians Name'); ?></td>
                <td><?php 
						echo $guardians_name;
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Mobile No'); ?></td>
                <td><?php 
						echo h($masterUser['MasterUser']['mobile_no']);
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Emergency Phone'); ?></td>
                <td><?php 
						echo h($masterUser['MasterUser']['emrg_no']);
						?></td>
            </tr>
            <tr>
                <td><?php echo __('Work Phone'); ?></td>
                <td><?php 
						echo $work_phone;
						?></td>
            </tr>
             <tr>
                <td><?php echo __('Emergency Contact person'); ?></td>
                <td><?php 
						echo $emrg_contact_per;
						?></td>
            </tr>

             <tr>
                <td><?php echo __('Status'); ?></td>
                <td><?php 
                    if($masterUser['MasterUser']['status'] == 1){
                    echo "<font color=green>Active</font>";
                    }else{
                    echo "<font color=red>Inactive</font>";
                    }			
                 ?></td>
                 
            </tr>
             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($masterUser['MasterUser']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->

