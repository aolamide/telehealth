<?php 
     $testDetail=$this->Custom->testAssigned($diagnosysReport['DiagnosysReport']['testid']);
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Diagnosis Report Detail</h3>
        <a href="<?php echo $base_url;?>admin/reports/diagnosysreaport" class="btn btn-success pull-right" style="margin-top: 7px; margin-right: 1%;">Back To List</a>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td style="width:15%;"><?php echo __('Disease'); ?></td>
                <td><?php echo stripslashes($diagnosysReport['DiagnosysReport']['disease_name']); ?></td>
            </tr>
          
            <tr>
                <td><?php echo __('Diagnosis Detail'); ?></td>
                <td><?php echo stripslashes($diagnosysReport['DiagnosysReport']['diagnosys_detail']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Patient'); ?></td>
                <td><?php echo $patientDetail=$this->Custom->userDet($diagnosysReport['DiagnosysReport']['patientid']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Doctor'); ?></td>
                <td><?php echo $doctorDetail=$this->Custom->userDet($diagnosysReport['DiagnosysReport']['doctorid']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Test Assigned'); ?></td>
                <td>
                <?php  
                    if( !empty($testDetail)){
                          $i=0;
                          $cnt=count($testDetail);
                          foreach($testDetail as $testDetails){$i++;
                              echo $testDetails;
                              if($i!=$cnt){
                                  echo "&nbsp;,&nbsp;";
                              }
                          }
                      }
                ?>
                </td>
            </tr>
            <tr>
                <td><?php echo __('Prescription Pad (For Pharmacy Use)'); ?></td>
                <td><?php echo stripslashes($diagnosysReport['DiagnosysReport']['pharmacy_pad']); ?></td>
            </tr>

             <tr>
                <td><?php echo __('Reported Date'); ?></td>
                <td><?php echo date("d-m-Y",strtotime($diagnosysReport['DiagnosysReport']['created'])); ?></td>
            </tr>
             
                    </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->
