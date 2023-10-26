<?php
$userType=$this->Session->read('loginType');
$fromDate=$this->Session->read('fromDatesrh');
$toDate=$this->Session->read('toDatesrh');

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
                <h3>Pateint Attended From: <?php echo $fromDate;?> To: <?php echo $toDate;?> </h3>
                <table class="table table-bordered"> 
                  <thead> 
                    <tr> 
                      <th>SL#</th>
                      <th>Patient</th>
                      <th>Appointment Date</th>
                    </tr> 
                  </thead> 
                  <?php //pr($historyList);?>
                  <tbody> 
                    <?php 
                    $i=0;
                      if(!empty($patientList)) {//pr($patientList);
                        foreach ($patientList as $patientResult):
                              $patientid=$patientResult[$mod]['patientid'];
                          ?>
                          <tr> 
                            <td><?php echo ++$i; ?></td>
                            <td><a href="<?php echo $base_url;?>dashboards/viewuser/<?php echo $patientid;?>"><?php echo $userDetail=$this->Custom->userDet($patientid);?></a></td>
                            <td><?php echo date("d-m-Y",strtotime($patientResult[$mod]['created']));?></td> 
                            
                            
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
