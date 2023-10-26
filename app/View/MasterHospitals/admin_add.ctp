 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Create New Hospital</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('MasterHospital', array('enctype' => 'multipart/form-data')); ?>
                <div class="box-body">
                   <?php 
                   echo $this->Form->input('hospital_name',array('label'=>'Hospital Name','name' => 'data[Hospital][hospital_name]','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','required'=>'required'));
                   echo $this->Form->input('hospital_detail',array('label'=>'Hospital Details/Location','name' => 'data[Hospital][hospital_detail]','type'=>'textarea', 'class' => 'form-control', 'div' => 'form-group' ,'required'=>'required'));
                   
                   echo $this->Form->input('hospital_id',array('label'=>'Hospital ID','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));

                 	echo $this->Form->input('email_id',array('label'=>'Email Address','type'=>'email', 'class' => 'form-control', 'div' => 'form-group'));
                 	 echo $this->Form->input('hospital_logo',array('label'=>'Hospital Logo', 'name' => 'data[attr_field][hospital_logo]','type'=>'file', 'class' => 'form-control', 'div' => 'form-group'));
                    ?>
                 <h4 class="box-title">Lgoin Details</h4>
                    <?php
                     echo $this->Form->input('user_name',array('label'=>"User Name",'type'=>'text', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off'));
                     echo $this->Form->input('user_pass',array('label'=>"Password",'type'=>'password', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off'));
                     echo $this->Form->input('cnf_pass',array('label'=>'Confirm Password','type'=>'password', 'class' => 'form-control', 'div' => 'form-group','autocomplete' => 'off'));
                 ?>
                 <h4 class="box-title">Contact Information</h4>
                 <?php 		
						echo $this->Form->input('mobile_no',array('label'=>'Contact No','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','onkeypress'=>'return isNumberKey(event)'));
                        echo $this->Form->input('emrg_no',array('label'=>'Alternate Contact No','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','onkeypress'=>'return isNumberKey(event)'));
						echo $this->Form->input('zipcode',array('label'=>'Zip Code','type'=>'text', 'class' => 'form-control', 'div' => 'form-group','onkeypress'=>'return isNumberKey(event)'));
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

