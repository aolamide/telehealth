<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Doctor Availability</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('DoctorAvailability'); ?>
                <div class="box-body">
                   
                 <?php 
                 	
                 	echo $this->Form->input('doctor_id',array('label'=>'Select Doctor','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $doctorList));
                 	echo $this->Form->input('app_date',array('label'=>'Appointment Date','type'=>'text', 'class' => 'form-control datepicker', 'div' => 'form-group'));
                 	?>
                 	<div class="bootstrap-timepicker">
                 	<?php
                 	echo $this->Form->input('start_time',array('label'=>'Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                 	?>
                 	</div>
                 	<div class="bootstrap-timepicker">
                 	<?php
                 	echo $this->Form->input('end_time',array('label'=>'End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                 	?>
                 	</div>
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



