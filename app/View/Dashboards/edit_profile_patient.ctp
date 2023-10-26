<?php
$loginID=$this->Session->read('loginID');
//$address = $this->Custom->BapCustUniGetUserMeta($loginID, 'address');
$work_phone = $this->Custom->BapCustUniGetUserMeta($loginID, 'work_phone');
$country = $this->Custom->BapCustUniGetUserMeta($loginID, 'country');
$state = $this->Custom->BapCustUniGetUserMeta($loginID, 'state');
$city = $this->Custom->BapCustUniGetUserMeta($loginID, 'city');
$guardians_name = $this->Custom->BapCustUniGetUserMeta($loginID, 'guardians_name');
$emrg_contact_per = $this->Custom->BapCustUniGetUserMeta($loginID, 'emrg_contact_per');
$hospitalID = $this->Custom->BapCustUniGetUserMeta($loginID, 'hospitalid');
if($hospitalID!=''){
     $hospitalDetail = $this->Custom->BapCustUniGethospitalByID($hospitalID);
     $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
     $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
}else{
    $hospitalName = '';
    $hospitalDetails = '';
}
?>
<?php $address=(isset($this->request->data['attr_field']['address'])) ? $this->request->data['attr_field']['address'] : $this->Custom->BapCustUniGetUserMeta($this->request->data['MasterUser']['id'], 'address');?>
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
                    <h2>Edit Profile</h2>
                <?php echo $this->Session->flash(); ?>
                 <?php echo $this->Form->create('MasterUser'); 
                    echo $this->Form->input('id',array('value'=>$id));
                ?>
                    <div class="form_heading"> Personal Informations</div>    
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">First Name</label>
<?php echo $this->Form->input('fname',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>


                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Last Name</label>
                <?php echo $this->Form->input('lname',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>
            </div>
            
            <hr class="register_from_clear">    
                    
             <div class="row">
               <!--  <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Patient ID</label>
                <?php //echo $this->Form->input('patient_id',array('label'=>false,'type'=>'hidden', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                </div> -->
                <?php echo $this->Form->input('patient_id',array('label'=>false,'type'=>'hidden', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Date of Birth</label>
                <?php echo $this->Form->input('dob',array('label'=>false,'type'=>'text', 'class' => 'register_from_input datepicker', 'div' => false));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Marital Status</label>
                    <?php echo $this->Form->input('marital_status',array('label'=>false,'type'=>'select', 'options' => array('' => 'Select Status', 'married' => 'Married', 'single' => 'Single', 'divorced' => 'Divorced', 'widowed' => 'Widowed', 'separated' => 'Separated', 'domestic partner' => 'Domestic Partner'), 'class' => 'register_from_input', 'div' => false, 'required' => 'required' , 'selected' => $this->request->data['MasterUser']['marital_status']));?>
                </div>
            </div>
            
            <hr class="register_from_clear">
            
             <div class="row">
                
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Gender</label>
               <!--  <input name="" type="radio" value="">&nbsp;Male&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="">&nbsp;Female -->
                <?php echo $this->Form->input('gender',array('label'=>false,'type'=>'select', 'options' => array('' => 'Select Gender', 1 => 'Male', 0 => 'Female'), 'class' => 'register_from_input', 'div' => false));?>
                </div>
                <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Select Hospital</label>
                    <?php  
                     echo $this->Form->input('hospitalid',array('label'=>false, 'name' => 'data[attr_field][hospitalid]','type'=>'select', 'options' => $hospitalList, 'class' => 'register_from_input', 'div' => false,'selected'=>$hospitalID));
                    ?>
                </div>
            </div>

            <hr class="register_from_clear">
            
             
            </div>

            <hr class="register_from_clear">  
                   
              <div class="form_heading"> Contact Informations</div>   
              <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Address</label>
                <?php echo $this->Form->input('address',array('label'=>false, 'name' => 'attr_field[address]', 'required' => 'required','type'=>'text', 'class' => 'register_from_input', 'div' => false ,'value' => $address));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Mobile No</label>
                <?php echo $this->Form->input('mobile_no',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'onkeypress' => 'return onlyNumberKey(event);'));?>
                </div>
               
                 
            </div>
            
            
            
            <hr class="register_from_clear">
                   
                 
              <div class="row">
               <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Zip Code</label>
                <?php echo $this->Form->input('zipcode',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'onkeypress' => 'return onlyNumberKey(event);'));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Work phone</label>
                <!-- <textarea name="" cols="" rows="" class="register_from_input"></textarea> -->
                <?php echo $this->Form->input('work_phone',array('label'=>false, 'name' => 'attr_field[work_phone]','type'=>'text', 'class' => 'register_from_input', 'div' => false , 'value' => $work_phone));?>
                </div>
                
            </div>
             <hr class="register_from_clear">
                   
                 
              <div class="row">
              <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Country</label>
                <!-- <input name="" type="text" class="register_from_input"> -->
                <?php echo $this->Form->input('country',array('label'=>false, 'name' => 'attr_field[country]','type'=>'select','options' => $countryList, 'class' => 'register_from_input', 'div' => false , 'selected' => $country));?>
                </div>
                <?php 
                if($country!=''){
                            $stateList = $this->Custom->BapCustUniGetStateByCountry($country);
                          }
                         ?> 
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">State</label>
                <?php echo $this->Form->input('state',array('label'=>false, 'name' => 'attr_field[state]','type'=>'select','options' => $stateList, 'class' => 'register_from_input', 'div' => false , 'selected' => $state));?>
                </div>
                
            </div>
               <hr class="register_from_clear">
                   
                 
              <div class="row">
              <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">City</label>
                <!-- <input name="" type="text" class="register_from_input"> -->
                <?php echo $this->Form->input('city',array('label'=>false, 'name' => 'attr_field[city]','type'=>'text', 'class' => 'register_from_input', 'div' => false ,'value' => $city));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Guardian's Name</label>
                <!-- <textarea name="" cols="" rows="" class="register_from_input"></textarea> -->
                <?php  echo $this->Form->input('guardians_name',array('label'=>false, 'name' => 'attr_field[guardians_name]','type'=>'text', 'class' => 'register_from_input', 'div' => false , 'value' => $guardians_name));?>
                </div>
            </div>   
            <hr class="register_from_clear">
                   
                 
              <div class="row">
              <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Emergency Contact Person</label>
                <!-- <input name="" type="text" class="register_from_input"> -->
                <?php echo $this->Form->input('emrg_contact_per',array('label'=>false, 'name' => 'attr_field[emrg_contact_per]','type'=>'text', 'class' => 'register_from_input', 'div' => false , 'value' => $emrg_contact_per));?>
                </div>
            </div>  
                    
             <hr class="register_from_clear">      
              
              
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><button class="allbtn4" type="submit">Submit</button></div>
            </div> 
            </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
<script type="text/javascript">

</script>
