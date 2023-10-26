<?php 
$doctorDetail=$this->Custom->GetDoctorById($doctorAvailability['DoctorAvailability']['doctor_id']);
//echo $doctorAvailability['DoctorAvailability']['doc_type'];
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Doctor Availability Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Doctor Name'); ?></td>
                <td>
                	<?php echo $doctorDetail['MasterUser']['fname']." ".$doctorDetail['MasterUser']['lname'];?>
                </td>
            </tr>
            <?php if($doctorAvailability['DoctorAvailability']['doc_type']==1){?>
             <tr>
                <td style="width:15%;"><?php echo __('Appointment Date'); ?></td>
                <td>
                	<?php echo h(date("d/m/Y",strtotime($doctorAvailability['DoctorAvailability']['app_date']))); ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Monday'); ?></td>
                <td>
                	<?php echo h($doctorAvailability['DoctorAvailability']['mon_start_time'])." - ".h($doctorAvailability['DoctorAvailability']['mon_end_time'])  ; ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Tuesday'); ?></td>
                <td>
                	<?php echo h($doctorAvailability['DoctorAvailability']['tue_start_time'])." - ".h($doctorAvailability['DoctorAvailability']['tue_end_time'])  ; ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Wednesday'); ?></td>
                <td>
                    <?php echo h($doctorAvailability['DoctorAvailability']['wed_start_time'])." - ".h($doctorAvailability['DoctorAvailability']['wed_end_time'])  ; ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Thursday'); ?></td>
                <td>
                    <?php echo h($doctorAvailability['DoctorAvailability']['thu_start_time'])." - ".h($doctorAvailability['DoctorAvailability']['thu_end_time'])  ; ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Friday'); ?></td>
                <td>
                    <?php echo h($doctorAvailability['DoctorAvailability']['fri_start_time'])." - ".h($doctorAvailability['DoctorAvailability']['fri_end_time'])  ; ?>
                </td>
            </tr>
             <tr>
                <td style="width:15%;"><?php echo __('Saturday'); ?></td>
                <td>
                    <?php echo h($doctorAvailability['DoctorAvailability']['sat_start_time'])." - ".h($doctorAvailability['DoctorAvailability']['sat_end_time'])  ; ?>
                </td>
            </tr>
             <tr>
                <td style="width:15%;"><?php echo __('Sunday'); ?></td>
                <td>
                    <?php echo h($doctorAvailability['DoctorAvailability']['sun_start_time'])." - ".h($doctorAvailability['DoctorAvailability']['sun_end_time'])  ; ?>
                </td>
            </tr>
            <?php }else{?>
            <tr>
                <td style="width:15%;"><?php echo __('Appointment Strat Time'); ?></td>
                <td>
                    <?php echo h($doctorAvailability['DoctorAvailability']['start_time']); ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Appointment End Time'); ?></td>
                <td>
                    <?php echo h($doctorAvailability['DoctorAvailability']['end_time']); ?>
                </td>
            </tr>
            <?php }?>
            <tr>
                <td style="width:15%;"><?php echo __('Status'); ?></td>
                <td><?php
                	if($doctorAvailability['DoctorAvailability']['status'] == 1){
													echo "Active";
													}else{
													echo "Inactive";
													}
					?>
                </td>
            </tr>
             

             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($doctorAvailability['DoctorAvailability']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->





