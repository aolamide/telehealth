

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
                <a href="<?php echo $base_url;?>dashboards/diagnosyslist" class="btn btn-success pull-right">Back To List</a>
                <div class="spacer20px"></div>
                   <?php //pr($UserRes);?>
                <table class="table table-bordered">
                  <tr>
                        <td><?php echo __('Doctor'); ?></td>
                        <td><?php echo $doctorDetail=$this->Custom->userDet($diagnosysReport['DiagnosysReport']['doctorid']); ?></td>
                    </tr>
                    <tr>
                        <td style="width:15%;"><?php echo __('Disease'); ?></td>
                        <td><?php echo stripslashes($diagnosysReport['DiagnosysReport']['disease_name']); ?></td>
                    </tr>
          
                    <tr>
                        <td><?php echo __('Diagnosys Detail'); ?></td>
                        <td><?php echo stripslashes($diagnosysReport['DiagnosysReport']['diagnosys_detail']); ?></td>
                    </tr>

                     <tr>
                        <td><?php echo __('Reported Date'); ?></td>
                        <td><?php echo date("d-m-Y",strtotime($diagnosysReport['DiagnosysReport']['created'])); ?></td>
                    </tr>
                      <?php 
                    $testResults=$this->Custom->BapCustUnihistoryTestResults($diagnosysReport['DiagnosysReport']['id']);
                      if(count($testResults)>0){?>
                     <tr>
                        <td colspan="2"><h4>Test results</h4></td>
                    </tr>
                    <?php
                    foreach ($testResults as $testResult) {
                      ?>
                      <tr>
                        <td><?php echo __('Test'); ?></td>
                        <td><?php $testID = $testResult['DiagnosysTest']['test_type'];
                          $testDetail = $this->Custom->getParentTest($testID);
                          echo stripslashes($testDetail['TestMaster']['test_name']);
                         ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Result'); ?></td>
                        <td><?php echo stripslashes($testResult['DiagnosysTest']['test_result']); ?></td>
                    </tr>
                      <?php
                    }
                    }
                    ?>
                  </table> 
                    
                </div>
           <!--===================================Profile Detail===================================-->
            
                      
            
</div>            
            
            

       </div>
    </div>
</div>
