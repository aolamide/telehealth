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
                 	
                 	?>
                 	<div class="bootstrap-timepicker">
                 	<?php
                 	echo $this->Form->input('mon_start_time',array('label'=>'Monday Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                 	?>
                 	</div>
                 	<div class="bootstrap-timepicker">
                 	<?php
                 	echo $this->Form->input('mon_end_time',array('label'=>'Monday End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                 	?>
                 	</div>

                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('tue_start_time',array('label'=>'Tuesday Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>
                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('tue_end_time',array('label'=>'Tuesday End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>

                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('wed_start_time',array('label'=>'Wednesday Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>
                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('wed_end_time',array('label'=>'Wednesday End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>

                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('thu_start_time',array('label'=>'Thursday Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>
                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('thu_end_time',array('label'=>'Thursday End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>

                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('fri_start_time',array('label'=>'Friday Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>
                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('fri_end_time',array('label'=>'Friday End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>

                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('sat_start_time',array('label'=>'Saturday Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>
                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('sat_end_time',array('label'=>'Saturday End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>
                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('sun_start_time',array('label'=>'Sunday Start Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
                    ?>
                    </div>
                    <div class="bootstrap-timepicker">
                    <?php
                    echo $this->Form->input('sun_end_time',array('label'=>'Sunday End Time','type'=>'text', 'class' => 'form-control timepicker', 'div' => 'form-group'));
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



