

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
                <a href="<?php echo $base_url;?>dashboards/patienthistory" class="btn btn-success pull-right">Back To List</a>
                   <?php
                   $testDetail=$this->Custom->testAssigned($historyDetail['DiagnosysReport']['testid']);
                   ?>
                   <div class="spacer20px"></div>
                <table class="table table-bordered">
                  <tr>
                        <td><?php echo __('Doctor'); ?></td>
                        <td><?php echo $doctorDetail=$this->Custom->userDet($historyDetail['DiagnosysReport']['doctorid']); ?></td>
                    </tr>
                     <tr>
                        <td><?php echo __('Patient'); ?></td>
                        <td><?php echo $doctorDetail=$this->Custom->userDet($historyDetail['DiagnosysReport']['patientid']); ?></td>
                    </tr>
                    <tr>
                        <td style="width:15%;"><?php echo __('Disease'); ?></td>
                        <td><?php echo stripslashes($historyDetail['DiagnosysReport']['disease_name']); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo __('Diagnosis Detail'); ?></td>
                        <td><?php echo stripslashes($historyDetail['DiagnosysReport']['diagnosys_detail']); ?></td>
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
                      <td><?php echo stripslashes($historyDetail['DiagnosysReport']['pharmacy_pad']); ?></td>
                  </tr>
                     <tr>
                        <td><?php echo __('Reported Date'); ?></td>
                        <td><?php echo date("d-m-Y",strtotime($historyDetail['DiagnosysReport']['created'])); ?></td>
                    </tr>

                  </table>

                </div>
           <!--===================================Profile Detail===================================-->



</div>



       </div>
    </div>
</div>
