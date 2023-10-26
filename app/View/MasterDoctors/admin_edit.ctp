 <?php
 $address = $this->Custom->BapCustUniGetUserMeta($this->request->data['MasterDoctor']['id'], 'address');
 $hospitalID = $this->Custom->BapCustUniGetUserMeta($this->request->data['MasterDoctor']['id'], 'hospitalid');
 $passport_photo = $this->Custom->BapCustUniGetUserMeta($this->request->data['MasterDoctor']['id'], 'passport_photo');
  $doctor_cv = $this->Custom->BapCustUniGetUserMeta($this->request->data['MasterDoctor']['id'], 'doctor_cv');
 if($hospitalID!=''){
	 $hospitalDetail = $this->Custom->BapCustUniGethospitalByID($hospitalID);
	 $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
	 $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
}else{
	$hospitalName = '';
	$hospitalDetails = '';
}
 ?>
 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Update Doctor</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('MasterDoctor', array('enctype' => 'multipart/form-data')); 
            	echo $this->Form->input('id');
            ?>
                <div class="box-body">
                   <?php echo $this->Form->input('fname',array('label'=>'First Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('lname',array('label'=>'Last Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                 	echo $this->Form->input('email_id',array('label'=>'Email Address','type'=>'email', 'class' => 'form-control', 'div' => 'form-group'));
                 	echo $this->Form->input('dob',array('label'=>'Date Of Birth','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
                    echo $this->Form->input('doc_type',array('label'=>'Select Type','type'=>'select', 'options' => array( 0 => 'Specialist (Appointment Only)', 1 => 'Full-Time'), 'class' => 'form-control', 'div' => 'form-group'));
                    
                 	echo $this->Form->input('gender',array('label'=>'Gender','type'=>'select', 'options' => array('' => 'Select Gender', 1 => 'Male', 0 => 'Female'), 'class' => 'form-control', 'div' => 'form-group'));
                 	//echo $this->Form->input('hospital_name',array('label'=>'Hospital Name','name' => 'data[Hospital][hospital_name]','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $hospitalName));
                 	//echo $this->Form->input('hospital_detail',array('label'=>'Hospital Details/Location','name' => 'data[Hospital][hospital_detail]','type'=>'textarea', 'class' => 'form-control', 'div' => 'form-group', 'value' => $hospitalDetails));
                 	//echo $this->Form->input('hospital_id',array('type' => 'hidden', 'name' => 'data[Hospital][id]', 'class' => 'form-control', 'div' => 'form-group', 'value' => $hospitalID));

                    echo $this->Form->input('attr_field.hospitalid',array('label'=>'Select Hospital', 'name' => 'data[attr_field][hospitalid]','type'=>'select', 'options' => $hospitalList, 'class' => 'form-control', 'div' => 'form-group',  'selected'=>$hospitalID));

                 	 echo $this->Form->input('passport_photo',array('label'=>'Passport Photo', 'name' => 'data[attr_field][passport_photo]','type'=>'file', 'class' => 'form-control', 'div' => 'form-group'));
                 	 if($passport_photo!=''){
                 	 ?>
                 	 <img src="<?php echo $base_url;?>files/passport/<?php echo $passport_photo; ?>" style="width:80px;">
                 	 <?php
                 	}
                 	 echo $this->Form->input('doctor_cv',array('label'=>'Upload CV', 'name' => 'data[attr_field][doctor_cv]','type'=>'file', 'class' => 'form-control', 'div' => 'form-group'));
                 	  if($doctor_cv!=''){
                 	 ?>
                 	 <a href="<?php echo $base_url;?>files/cv/<?php echo $doctor_cv; ?>" target="_blank">View Uploaded CV</a>
                 	 <?php
                 	}
                    echo $this->Form->input('AssignService.serviceid',array('label'=>'Select Services', 'name' => 'data[AssignService][serviceid]','type'=>'select', 'multiple' => 'multiple', 'options' => $serviceList,'selected'=>$selectedService, 'class' => 'form-control', 'div' => 'form-group', 'required' => 'required'));
                    ?>
                 <h4 class="box-title">Lgoin Details</h4>
                    <?php
                     echo $this->Form->input('user_name',array('label'=>"User Name",'type'=>'text', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off'));
                     echo $this->Form->input('user_pass',array('label'=>"Password",'type'=>'password', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off', 'value' => base64_decode($this->request->data['MasterDoctor']['user_pass'])));
                     echo $this->Form->input('cnf_pass',array('label'=>'Confirm Password','type'=>'password', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off','value' => base64_decode($this->request->data['MasterDoctor']['user_pass'])));
                 ?>
                 <h4 class="box-title">Contact Information</h4>
                 <?php 	
                 echo $this->Form->input('attr_field.address',array('label'=>'Address', 'name' => 'attr_field[address]', 'required' => 'required','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','value' => $address));				
						 echo $this->Form->input('mobile_no',array('label'=>'Mobile No','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','onkeypress'=>'return isNumberKey(event)'));
						 echo $this->Form->input('zipcode',array('label'=>'Zip Code','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', "onkeypress"=>"this.value = this.value.replace(/[^0-9]/, '')", "onkeyup"=>"this.value = this.value.replace(/[^0-9]/, '')"));
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

