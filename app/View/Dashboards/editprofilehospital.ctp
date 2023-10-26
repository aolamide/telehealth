<?php
$loginID=$this->Session->read('loginID');
$hospital_logo = $this->Custom->BapCustUniGetUserMeta($loginID, 'hospital_logo');
 $hospitalDetail = $this->Custom->GethospitalDetByID($loginID);
 $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
 $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
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
                 <?php echo $this->Form->create('MasterHospital', array('enctype' => 'multipart/form-data')); 
                    echo $this->Form->input('id',array('value'=>$id));
                ?>
                    <div class="form_heading"> Personal Informations</div>    
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Hospital Name</label>
                  
                  <?php echo $this->Form->input('hospital_name',array('label'=>false,'name' => 'data[Hospital][hospital_name]','type'=>'text', 'class' => 'register_from_input', 'div' => false, 'value' => $hospitalName,'required'=>'required'));?>
                </div>


                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Hospital Details/Location</label>
                <?php echo $this->Form->input('hospital_detail',array('label'=>false,'name' => 'data[Hospital][hospital_detail]','type'=>'textarea', 'class' => 'register_from_input', 'div' => false, 'value' => $hospitalDetails ,'required'=>'required'));?>
                </div>
            </div>
            
            <hr class="register_from_clear">    
                    
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Hospital ID</label>
                  <?php echo $this->Form->input('hospital_id',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                </div>
        
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Email Address</label>
                <?php echo $this->Form->input('email_id',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                </div>
            </div>
            
            <hr class="register_from_clear">
            
             <div class="row">
                 <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Hospital Logo</label>
                    <?php   echo $this->Form->input('hospital_logo',array('label'=>false, 'name' => 'data[attr_field][hospital_logo]','type'=>'file', 'class' => 'register_from_input', 'div' => false));?>
                  </div>
                  <?php if($hospital_logo!=''){ ?>
                    <img src="<?php echo $base_url;?>files/hospital_logo/<?php echo $hospital_logo; ?>" style="width:100px;">
                  <?php }?>
            </div>

            <hr class="register_from_clear">  
                   
              <div class="form_heading"> Contact Informations</div>   
              <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Contact No</label>
                    <?php echo $this->Form->input('mobile_no',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'onkeypress' => 'return onlyNumberKey(event);'));?>
                </div>
               <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Alternate Contact No</label>
                <?php echo $this->Form->input('emrg_no',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>
              </div>
            <hr class="register_from_clear">
                 
              <div class="row">
               <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Zip Code</label>
                <?php echo $this->Form->input('zipcode',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'onkeypress' => 'return onlyNumberKey(event);'));?>
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
