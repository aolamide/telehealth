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
                      <th> Doctor</th>
                      <th>Disease</th>
                      <th>Reported Date</th>
                      <th>Action</th>
                    </tr> 
                  </thead> 
                  <?php //pr($testReportDet);?>
                  <tbody> 
                    <?php $i=0;
                      if(!empty($diagnosysReportDet)) {
                        foreach ($diagnosysReportDet as $reportDet):
                              $userID=$reportDet['DiagnosysReport']['doctorid'];
                          ?>
                          <tr> 
                            <td><?php echo ++$i; ?></td>

                            <td><a href="<?php echo $base_url;?>dashboards/viewuser/<?php echo $userID;?>"><?php echo $userDetail=$this->Custom->userDet($userID);?></a></td> 
                            <td><?php echo stripslashes($reportDet['DiagnosysReport']['disease_name']);?></td>
                             <td><?php echo date("d-m-Y", strtotime(($reportDet['DiagnosysReport']['created'])));?></td>
                            <td width="20%">
                              <?php echo $this->Html->link(__('View'), array('action' => 'viewdiagnosys', $reportDet['DiagnosysReport']['id']),array('class'=>'btn btn-success')); ?>
                            </td>
                            
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
