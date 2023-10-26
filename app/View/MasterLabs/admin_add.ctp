<?php $address=(isset($this->request->data['attr_field']['address'])) ? $this->request->data['attr_field']['address'] : '';?>
 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add New Lab</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('MasterLab'); ?>
                <div class="box-body">
                   <?php echo $this->Form->input('fname',array('label'=>'First Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('lname',array('label'=>'Last Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                    echo $this->Form->input('email_id',array('label'=>'Email ID','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                     echo '<div class="row"><div id="err_emailfield"> </div></div>';
                 	//echo $this->Form->input('patient_id',array('label'=>'patient ID','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                 	//echo $this->Form->input('dob',array('label'=>'Date Of Birth','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                 	//echo $this->Form->input('marital_status',array('label'=>'Marital Status','type'=>'select', 'options' => array('' => 'Select Status', 'married' => 'Married', 'single' => 'Single', 'divorced' => 'Divorced', 'widowed' => 'Widowed', 'separated' => 'Separated', 'domestic partner' => 'Domestic Partner'), 'class' => 'form-control', 'div' => 'form-group'));
                 	//echo $this->Form->input('gender',array('label'=>'Gender','type'=>'select', 'options' => array('' => 'Select Gender', 1 => 'Male', 0 => 'Female'), 'class' => 'form-control', 'div' => 'form-group'));
                     //echo $this->Form->input('servicetype',array('label'=>'Select Hospital', 'name' => 'data[attr_field][hospitalid]','type'=>'select', 'options' => $hospitalList, 'class' => 'form-control', 'div' => 'form-group'));
                    ?>
                 <h4 class="box-title">Lgoin Details</h4>
                    <?php
                     echo $this->Form->input('user_name',array('label'=>"User Name",'type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                     echo $this->Form->input('user_pass',array('label'=>"Password",'type'=>'password', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off'));
                     echo $this->Form->input('cnf_pass',array('label'=>'Confirm Password','type'=>'password', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off'));
                 ?>
                 <h4 class="box-title">Contact Information</h4>
                 <?php 	
                 echo $this->Form->input('address',array('label'=>'Address', 'name' => 'attr_field[address]', 'required' => 'required','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $address));				
						 echo $this->Form->input('mobile_no',array('label'=>'Mobile No','type'=>'text', 'class' => 'form-control', 'div' => 'form-group' ,'onkeypress'=>'return isNumberKey(event)'));
						 echo $this->Form->input('emrg_no',array('label'=>'Emergency No','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
						 echo $this->Form->input('work_phone',array('label'=>'Work phone', 'name' => 'attr_field[work_phone]','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','onkeypress'=>'return isNumberKey(event)'));
						 echo $this->Form->input('zipcode',array('label'=>'Zip Code','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','onkeypress'=>'return isNumberKey(event)'));
						 //echo $this->Form->input('country',array('label'=>'Country', 'name' => 'attr_field[country]','type'=>'select','options' => $countryList, 'class' => 'form-control', 'div' => 'form-group'));
						 //echo $this->Form->input('state',array('label'=>'State', 'name' => 'attr_field[state]','type'=>'select','options' => $stateList, 'class' => 'form-control', 'div' => 'form-group'));
						   // echo $this->Form->input('city',array('label'=>'City', 'name' => 'attr_field[city]','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
						    //echo $this->Form->input('guardians_name',array('label'=>"Guardian's Name", 'name' => 'attr_field[guardians_name]','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
						    // echo $this->Form->input('emrg_contact_per',array('label'=>"Emergency Contact Person", 'name' => 'attr_field[emrg_contact_per]','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                 ?>
                 <?php
                     echo $this->Form->input('status',array('label'=>'Select Status','type'=>'select', 'options' => array( 1 => 'Active', 0 => 'Inactive'), 'class' => 'form-control', 'div' => 'form-group'));?>
                    
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->

      

    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <!-- /.box -->
    </div><!--/.col (right) -->
</div>   <!-- /.row -->
</section><!-- /.content -->

<script type="text/javascript">
$( document ).ready(function() {
    function scrollUpToSucc()
    {
    jQuery('html, body').animate({
    scrollTop: jQuery("#MasterLabFname").offset().top - 40}, 500);
    }

$('#MasterLabAdminAddForm').submit(function(){
    var emailfield=$('#MasterUserEmailId').val();
    
    if(emailfield.trim()!=''){
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
     if(!re.test(emailfield)){
        //alert("Please enter a valid email"); 
        $('#err_emailfield').html('<p style="color:red;padding-left:20px;">Please Enter A Valid email_id</p>');
        
        scrollUpToSucc();
        $('#MasterLabEmailId').focus();
         return false;
         }
         else {
             return (re.test(emailfield));
             }
    }
    
    
    });
    
});

</script>