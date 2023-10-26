<?php
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
                   <?php //pr($UserRes);?>
                <table class="table table-bordered">
                    <tr>
                        <td style="width:15%;">Name</td>
                        <td>
                            <?php echo stripslashes($UserRes['MasterUser']['fname']." ".$UserRes['MasterUser']['lname'] );?>
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
                    <?php if($loginType=="D"){?>

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
                  </table> 
                    
                </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
