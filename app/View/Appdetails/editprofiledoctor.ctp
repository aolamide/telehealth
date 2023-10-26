<?php
/*$loginID=$this->Session->read('loginID');
$address = $this->Custom->BapCustUniGetUserMeta($loginID, 'address');
$work_phone = $this->Custom->BapCustUniGetUserMeta($loginID, 'work_phone');
$country = $this->Custom->BapCustUniGetUserMeta($loginID, 'country');
$state = $this->Custom->BapCustUniGetUserMeta($loginID, 'state');
$city = $this->Custom->BapCustUniGetUserMeta($loginID, 'city');
$guardians_name = $this->Custom->BapCustUniGetUserMeta($loginID, 'guardians_name');
$emrg_contact_per = $this->Custom->BapCustUniGetUserMeta($loginID, 'emrg_contact_per');*/
$loginID=$this->Session->read('loginID');
$address = $this->Custom->BapCustUniGetUserMeta($loginID, 'address');
 $hospitalID = $this->Custom->BapCustUniGetUserMeta($loginID, 'hospitalid');
 $passport_photo = $this->Custom->BapCustUniGetUserMeta($loginID, 'passport_photo');
  $doctor_cv = $this->Custom->BapCustUniGetUserMeta($loginID, 'doctor_cv');
 if($hospitalID!=''){
   $hospitalDetail = $this->Custom->BapCustUniGethospitalByID($hospitalID);
   $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
   $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
}else{
  $hospitalName = '';
  $hospitalDetails = '';
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
                    <h2>Edit Profile</h2>
                <?php echo $this->Session->flash(); ?>
                 <?php echo $this->Form->create('MasterDoctor', array('enctype' => 'multipart/form-data')); 
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
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Email Address</label>
                <?php echo $this->Form->input('email_id',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Date of Birth</label>
                <?php echo $this->Form->input('dob',array('label'=>false,'type'=>'text', 'class' => 'register_from_input datepicker', 'div' => false));?>
                </div>
            </div>
            
            <hr class="register_from_clear">
            
             <div class="row">
               
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Gender</label>
               <!--  <input name="" type="radio" value="">&nbsp;Male&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="">&nbsp;Female -->
                <?php echo $this->Form->input('gender',array('label'=>false,'type'=>'select', 'options' => array('' => 'Select Gender', 1 => 'Male', 0 => 'Female'), 'class' => 'register_from_input', 'div' => false));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Select Hospital</label>
                    <?php  
                     echo $this->Form->input('hospitalid',array('label'=>false, 'name' => 'data[attr_field][hospitalid]','type'=>'select', 'options' => $hospitalList, 'class' => 'register_from_input', 'div' => false,'selected'=>$hospitalID));
                    ?>
                </div>
               
            </div>

            <hr class="register_from_clear">
            
             <div class="row">
                 <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Passport Photo</label>
                <?php   echo $this->Form->input('passport_photo',array('label'=>false, 'name' => 'data[attr_field][passport_photo]','type'=>'file', 'class' => 'register_from_input', 'div' => false));?>
                 <?php if($passport_photo!=''){
                   ?>
                   <img src="<?php echo $base_url;?>files/passport/<?php echo $passport_photo; ?>" style="width:80px;">
                   <?php
                  }?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Upload CV</label>
               <!--  <input name="" type="radio" value="">&nbsp;Male&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="">&nbsp;Female -->
                <?php  echo $this->Form->input('doctor_cv',array('label'=> false, 'name' => 'data[attr_field][doctor_cv]','type'=>'file', 'class' => 'register_from_input', 'div' => false));?>
                 <?php if($doctor_cv!=''){
                   ?>
                   <a href="<?php echo $base_url;?>files/cv/<?php echo $doctor_cv; ?>" target="_blank">View Uploaded CV</a>
                   <?php
                  }?>
                </div>
               
               
            </div>

            <hr class="register_from_clear">
            
             <div class="row">
               
                
             
                 <div class="col-md-6 col-sm-6 register_formbox required">
                 <label class="register_from_name">Select Services</label>
               
                <?php 
                    echo $this->Form->input('servicetype',array('label'=>false, 'name' => 'data[AssignService][serviceid]','type'=>'select', 'multiple' => 'multiple', 'options' => $serviceList, 'selected'=>$selectedService ,'class' => 'register_from_input', 'div' => false, 'required' => 'required'));
                ?>

                </div>
                <div class="col-md-6 col-sm-6 register_formbox required">
                <label class="register_from_name">Select Type</label>
                <?php  
                    echo $this->Form->input('doc_type',array('label'=>false,'type'=>'select', 'options' => array( 0 => 'Specialist (Appointment Only)', 1 => 'Full-Time'), 'class' => 'register_from_input', 'div' => false));
                ?>
                </div>
                
               
            </div>
            
            <hr class="register_from_clear">  
                   
              <div class="form_heading"> Contact Informations</div>   
              <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Address</label>
                <?php echo $this->Form->input('address',array('label'=>false, 'name' => 'attr_field[address]', 'required' => 'required','type'=>'text', 'class' => 'register_from_input', 'div' => false , 'value' => $address));?>
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

            </div>
             <hr class="register_from_clear">
              
           <hr class="register_from_clear">

             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><button class="allbtn4" type="submit">Submit</button></div>
            </div> 

            </form>
            </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
<script type="text/javascript">

</script>
