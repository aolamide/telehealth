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
                      <th>Doctor</th>
                      <th>Patient</th>
                      <th>Disease Name</th>
                      <th>Reported Date</th>
                      <th>Action</th>
                    </tr> 
                  </thead> 
                  <?php //pr($historyList);?>
                  <tbody> 
                    <?php 
                    $i=0;
                      if(!empty($historyList)) {
                        foreach ($historyList as $historyResult):
                            $doctorid=$historyResult['DiagnosysReport']['doctorid'];
                              $patientid=$historyResult['DiagnosysReport']['patientid'];
                          ?>
                          <tr> 
                            <td><?php echo ++$i; ?></td>
                            <td><a href="<?php echo $base_url;?>dashboards/viewuser/<?php echo $doctorid;?>"><?php echo $userDetail=$this->Custom->userDet($doctorid);?></a></td> 
                            <td><a href="<?php echo $base_url;?>dashboards/viewuser/<?php echo $patientid;?>"><?php echo $userDetail=$this->Custom->userDet($patientid);?></a></td> 
                            <td><?php echo stripslashes($historyResult['DiagnosysReport']['disease_name']);?></td>
                            <td><?php echo date("d-m-Y",strtotime($historyResult['DiagnosysReport']['created']));?></td> 
                            <td width="20%">
                              <?php echo $this->Html->link(__('View'), array('action' => 'viewhistory', $historyResult['DiagnosysReport']['id']),array('class'=>'btn btn-success')); ?>
                            </td>
                            
                          </tr> 
                    <?php endforeach; }?>
                  </tbody> 
                </table>
                    <div class="paging">
    
                      <?php
                              echo $this->Paginator->prev('« ' . __(''), array(), null, array('class' => 'prev disabled'));
                              echo $this->Paginator->numbers(array('separator' => ''));
                              echo $this->Paginator->next(__('»') . '', array(), null, array('class' => 'next disabled'));
                          ?>
                          </div>
                    

                </div>
           <!--===================================Profile Detail===================================-->
            
                      
            
</div>            
            
            

       </div>
    </div>
</div>
