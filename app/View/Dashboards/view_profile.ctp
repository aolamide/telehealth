<?php
$loginID=$this->Session->read('loginID');
 $address = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'address');
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
$servicesDetail=$this->Custom->serviseAssigned($UserRes['MasterUser']['id']);

if($loginType=='H'){
    $hospital_logo = $this->Custom->BapCustUniGetUserMeta($loginID, 'hospital_logo');
}
if($loginType=='PH' || $loginType=='L'){
    $work_phone = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'work_phone');
}
if($loginType=='P'){
    $work_phone = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'work_phone');
    $country = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'country');
    $state = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'state');
    $city = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'city');
    $guardians_name = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'guardians_name');
    $emrg_contact_per = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'emrg_contact_per');

    if($country!=""){
        $countryDet= $this->Custom->GetcountryDetByID($country);
        $countryName=$countryDet['MasterCountry']['country_name'];
    }
    if($state!=''){
        $stateDet=$this->Custom->GetstateDetByID($country,$state);
        $sateName=$stateDet['MasterState']['location_name'];
    }
}
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
                   <?php //pr($UserRes);?>
                <table class="table table-bordered">
                    <?php if($loginType=="H"){?>
                        <tr>
                            <td style="width:15%;">Hospital Name</td>
                            <td>
                                <?php echo stripslashes($hospitalDet['Hospital']['hospital_name']);?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%;">Hospital Detail</td>
                            <td>
                               <?php echo stripslashes($hospitalDet['Hospital']['hospital_detail']);?>
                            </td>
                        </tr>
                         <tr>
                            <td style="width:15%;">Reference Id</td>
                            <td>
                                <?php echo h($UserRes['MasterUser']['ref_id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%;">Email Address </td>
                            <td>
                                <?php echo stripslashes($UserRes['MasterUser']['email_id']);?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%;">Logo </td>
                            <td>
                                <?php  if($hospital_logo!=''){ ?>
                                    <img src="<?php echo $base_url;?>files/hospital_logo/<?php echo $hospital_logo; ?>" style="width:80px;">
                                <?php  }?>
                            </td>
                        </tr>
                       
                        <tr>
                            <th colspan="2"><?php echo __('Contact Detail'); ?></th>
                        </tr>
                        
                        <tr>
                            <td><?php echo __('Zip Code'); ?></td>
                            <td><?php 
                                    echo h($UserRes['MasterUser']['zipcode']);
                                    ?></td>
                        </tr>
                        
                        <tr>
                            <td><?php echo __('Contact No'); ?></td>
                            <td><?php 
                                    echo h($UserRes['MasterUser']['mobile_no']);
                                    ?></td>
                        </tr>

                        <tr>
                            <td><?php echo __('Alternate Contact No'); ?></td>
                            <td><?php 
                                    echo h($UserRes['MasterUser']['emrg_no']);
                                    ?></td>
                        </tr>
                    <?php }else{?>
                        <tr>
                            <td style="width:15%;">Name</td>
                            <td>
                                <?php echo stripslashes($UserRes['MasterUser']['fname']." ".$UserRes['MasterUser']['lname'] );?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%;">Reference  Id</td>
                            <td>
                                <?php echo h($UserRes['MasterUser']['ref_id']); ?>
                            </td>
                        </tr>
                        <?php if($loginType=='P'){?>
                        <tr>
                            <td style="width:15%;">Patient Id</td>
                            <td>
                                <?php echo h($UserRes['MasterUser']['patient_id']); ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="width:15%;">Marital Status</td>
                            <td>
                              <?php echo h($UserRes['MasterUser']['marital_status']);?>
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td style="width:15%;">Email Address </td>
                            <td>
                                <?php echo stripslashes($UserRes['MasterUser']['email_id']);?>
                            </td>
                        </tr>
                         <?php if($loginType!='PH' && $loginType!='L'){?>
                        <tr>
                            <td style="width:15%;">Gender</td>
                            <td>
                                <?php 
                                if($UserRes['MasterUser']['gender'] == 1){
                                    echo "Male";
                                    }else{
                                    echo "Female";
                                    }
                                ?>
                            </td>
                        </tr>
						
                        <tr>
                            <td style="width:15%;">Date of Birth</td>
                            <td>
                                <?php 
                            echo date("d-m-Y", strtotime($UserRes['MasterUser']['dob']));
                            ?>
                            </td>
                        </tr>
                       

                        <tr>
                            <td style="width:15%;">Hospital Name</td>
                            <td>
                               <?php echo $hospitalName; ?>
                            </td>
                        </tr>

                         <tr>
                            <td style="width:15%;">Hospital Detail</td>
                            <td>
                               <?php echo $hospitalDetails; ?>
                            </td>
                        </tr>

                        <?php }?>
                         <?php if($loginType=="D"){?>
                        <tr>
                            <td style="width:15%;">Services</td>
                            <td>
                               <?php  if( !empty($servicesDetail)){
                                    $i=0;
                                    $cnt=count($servicesDetail);
                                    foreach($servicesDetail as $servicesDetails){$i++;
                                        echo $servicesDetails;
                                        if($i!=$cnt){
                                            echo "&nbsp;,&nbsp;";
                                        }
                                    }
                            
                                }?>
                            </td>
                        </tr>
                         <tr>
                            <td style="width:15%;">Type</td>
                            <td>
                               <?php if($UserRes['MasterUser']['doc_type'] == 1){ echo "Full-Time Doctor"; }else{ echo "Specialist (Appointment Only)"; } ?>
                            </td>
                        </tr>

                        <?php }?>

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
                                    echo h($UserRes['MasterUser']['zipcode']);
                                    ?></td>
                        </tr>
                        
                        <tr>
                            <td><?php echo __('Mobile No'); ?></td>
                            <td><?php 
                                    echo h($UserRes['MasterUser']['mobile_no']);
                                    ?></td>
                        </tr>
                        <?php if($loginType =='PH' || $loginType=='L'){?>   

                        <tr>
                                <td><?php echo __('Emergency Phone'); ?></td>
                                <td><?php 
                                        echo h($UserRes['MasterUser']['emrg_no']);
                                        ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Work Phone'); ?></td>
                                <td><?php 
                                        echo $work_phone;
                                        ?></td>
                            </tr> 
                        <?php }?>    
                        <?php if($loginType=='P'){?>
                            <tr>
                                <td><?php echo __('Country'); ?></td>
                                <td><?php 
                                        echo stripslashes($countryName);
                                        ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('State'); ?></td>
                                <td><?php 
                                        echo stripslashes($sateName);
                                        ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('City'); ?></td>
                                <td><?php 
                                        echo $city;
                                        ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Guardians Name'); ?></td>
                                <td><?php 
                                        echo $guardians_name;
                                        ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Emergency Phone'); ?></td>
                                <td><?php 
                                        echo h($UserRes['MasterUser']['emrg_no']);
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
                        <?php }?>
                    <?php }?>
                  </table> 
                    
                </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
