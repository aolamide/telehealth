<?php
$userType=$this->Session->read('loginType');

?>
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
                <table class="table table-bordered"> 
                  <thead> 
                    <tr> 
                      <th>SL#</th>
                      <th>Disease Name</th>
                      <th> Patient Name </th>
                      <th>Test Assigned</th>

                      <th>Test Report File</th>
                     
                    </tr> 
                  </thead> 
                  <tbody> 
                    <?php $i=0;
                      if(!empty($testReportDets)) { //pr($testReportDets);
                        foreach ($testReportDets as $reportDet):      
                              $diagnosisID=$reportDet['LabtestReport']['diagnosis_id'];
                              $diagnosisDet=$this->Custom->getdiagnosisDet($diagnosisID);
                              //pr($diagnosisDet);
                               $testDetail=$this->Custom->testAssigned($diagnosisDet['DiagnosysReport']['testid']);
                          ?>
                          <tr> 
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo stripslashes($diagnosisDet['DiagnosysReport']['disease_name']);?></td>
                            <td><?php echo $userDetail=$this->Custom->userDet($diagnosisDet['DiagnosysReport']['patientid']);?></td>
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
                            <td>
                          <a href="<?php echo $base_url; ?>dashboards/downloadTest/<?php echo $reportDet['LabtestReport']['uploaded_file'];?>" style="float:left; width:50%; color:#000;" target="_blank"><img src="<?php echo $this->webroot.'img/pdf.png';?>" height="27px;" alt="" title="Download File"></a>

                          

                            </td>
                           
                             <?php if($loginType=="P"){?>
                            <td width="20%">
                              <?php echo $this->Html->link(__('Edit'), array('action' => 'edituploadtest', $reportDet['UploadtestResult']['id']),array('class'=>'btn btn-primary')); ?>
                            </td>
                            <?php }?>
                          </tr> 
                    <?php endforeach; }?>
                  </tbody> 
                </table>
                    
                    

                </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
