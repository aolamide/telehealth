<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php
 $serchdate=date('Y-m-d',strtotime($serchdate));
?>
<section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Full-Time Doctor Appointment Reports</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text"  placeholder="Select Date" name="srchdate" id="srchdate" class="form-control input-sm pull-right datepicker" value="<?php echo $serchdate;?>" style="width: 150px;"/>
                                            
                                            <?php echo $this->Form->input('',array('type'=>'select','id'=>'doctor_id', 'class' => 'form-control input-sm pull-right', 'options' => $doctorList ,'selected'=>$doc,'style' => 'width: 150px; margin-right:5px;'));?>
                                            <div class="input-group-btn">
                                            &nbsp;&nbsp; <button type="button" name="searchbutn" id="searchbutn" class="btn btn-sm btn-default" onclick="return searchTxt();" >Search</button>
                                               
                                            </div>
                                    </div>
                                    </td>
                                    <td>
                                    
                                    </td>
                                    </tr>
                                    </table>
       							 </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th><?php echo $this->Paginator->sort('id', 'SL#'); ?></th>

                                            <th><?php echo $this->Paginator->sort('doctorid','Doctor'); ?></th>
                                            <th><?php echo $this->Paginator->sort('patientid', 'Patient'); ?></th>
                                           <!--  <th><?php //echo $this->Paginator->sort('is_conv', 'Conversastion Status'); ?></th> -->
                                            <th><?php echo $this->Paginator->sort('created', 'Appointment Date'); ?></th>
                                            <!-- <th class="actions"><?php //echo __('Actions'); ?></th> -->
                                    </tr>
                                       <?php 
                                            if(!empty($appointments) && count($appointments)>0){//pr($convReports);
                                                $cnt=0;
                                                foreach ($appointments as $appointment): $cnt++;
                                        ?>
                                       <tr>
                                            <td><?php echo $cnt; ?>&nbsp;</td>
                                            <td><?php echo $docDetail=$this->Custom->userDet($appointment['RegularAppointment']['doctorid']); ?>&nbsp;</td>
                                            <td><?php echo $patientDetail=$this->Custom->userDet($appointment['RegularAppointment']['patientid']); ?>&nbsp;</td>
                                            <!-- <td>
                                           <?php 
                                               /* if($appointment['RegularAppointment']['is_conv']==0){
                                                  echo "No Conversastion Made";
                                                }else if($appointment['RegularAppointment']['is_conv']==1){
                                                    echo "Conversastion Inprogress";
                                                }else if($appointment['RegularAppointment']['is_conv']==2){
                                                    echo "Conversastion Completed";
                                                }*/
                                                 
                                            ?>&nbsp;
                                            </td> -->
                                            
                                           <td><?php echo h(date("d-m-Y H:i:s",strtotime($appointment['RegularAppointment']['created']))); ?>&nbsp;</td>
                                           
                                              
                                           
                                        </tr>
                                    <?php
                                     endforeach;
                                    }?>
                                    </table>
                                   
                                </div><!-- /.box-body -->
                               
                            </div><!-- /.box -->
                             <div class="clearfix"></div>
                                 
                                    <div class="float_left"><?php
                                    echo $this->Paginator->counter(array(
                                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                                    ));
                                    ?></div>
                                    <div class="paging">
                                <?php
                                    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                                    echo $this->Paginator->numbers(array('separator' => ''));
                                    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                                ?>
                                </div>
                        </div>
                    </div>
                </section><!-- /.content -->

<script type="text/javascript">
 $(".datepicker").datepicker({
			
			changeYear: true,
			changeMonth: true,
			maxDate : 0,
			dateFormat: 'yy-mm-dd',
			
	});
	
function enterSrch(e){
	//alert(e.which);
	if(e.which==13){
		searchTxt();
	}
}
function searchTxt(){
	var srchdate=$("#srchdate").val();
	var doc=$("#doctor_id").val();
	var url="<?php echo $this->webroot.'admin/Reports/fulltimeappointsearch/'; ?>";
	url+='srchdate:'+srchdate+'/doc:'+doc;
	window.location=url;
}
</script>	