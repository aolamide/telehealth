<?php 
	$LocationDetail=$this->Custom->locationDet($appointment['Appointment']['locationid']);
	$servicesDetail=$this->Custom->serviceApponint($appointment['Appointment']['serviceid']);
	$patientDetail=$this->Custom->userDet($appointment['Appointment']['patientid']);
	$doctorDetail=$this->Custom->userDet($appointment['Appointment']['doctorid']);
	$appointmentTimeDet=$this->Custom->AppointmentTimeDet($appointment['Appointment']['appointment_availbility']);
	if($appointment['Appointment']['appoint_book_slut']!=0){
		$appointmentTimeAvailDet=$this->Custom->AppointmentTimeAvailDet($appointment['Appointment']['appoint_book_slut']);
	}else{
		$appointmentTimeAvailDet="N/A";
	}
	
	
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Appointment Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Location'); ?></td>
                <td>
                	<?php echo $LocationDetail;?>
                </td>
            </tr>
             <tr>
                <td style="width:15%;"><?php echo __('Services'); ?></td>
                <td>
                	<?php if( !empty($servicesDetail)){
					                                $i=0;
					                                $cnt=count($servicesDetail);
					                                foreach($servicesDetail as $servicesDetails){$i++;
					                                    echo $servicesDetails;
					                                    if($i!=$cnt){
					                                        echo "&nbsp;,&nbsp;";
					                                    }
					                                }
					                            } ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Patient Detail'); ?></td>
                <td>
                	<?php echo $patientDetail; ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Doctor Detail'); ?></td>
                <td>
                	<?php echo $doctorDetail; ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Appointment Date'); ?></td>
                <td>
                	<?php echo h(date("d-m-Y",strtotime($appointment['Appointment']['appointment_date']))); ?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Doctor Available Time'); ?></td>
                <td>
                	<?php echo $appointmentTimeDet;?>
                </td>
            </tr>
            
            <tr>
                <td style="width:15%;"><?php echo __('Appointment Time'); ?></td>
                <td>
                	<?php echo $appointmentTimeAvailDet;?>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"><?php echo __('Status'); ?></td>
                <td><?php
                	
					if($appointment['Appointment']['status'] == 1){
					echo "Active";
					}else{
					echo "Inactive";
					}
					?>
											 	
                </td>
            </tr>
             

             <tr>
                <td><?php echo __('Created Date'); ?></td>
                <td><?php echo h(date("d/m/Y",strtotime($appointment['Appointment']['created']))); ?></td>
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->


