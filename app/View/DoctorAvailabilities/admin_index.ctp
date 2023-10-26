<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Doctors Availabilities</h3>
                                    <div class="box-tools pull-right">
                                    <div class="input-group">
                                            <input type="text"  placeholder="Select From Date" name="startdate" id="startdate" class="form-control input-sm datepicker" style="width: 150px;margin-right: 10px;"/>
                                            <input type="text"  placeholder="Select To Date" name="enddate" id="enddate" class="form-control input-sm datepicker" style="width: 150px;margin-right: 10px;"/>
                                          <button class="btn btn-primary btn-flat" id="search" style="margin-right: 10px;" onclick="return search_date_wise();">Search</button>
                                          <button class="btn btn-primary btn-flat" id="reset" style="margin-right: 10px;" onclick="location.href='<?php echo $base_url;?>admin/DoctorAvailabilities'">Reset</button>
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/DoctorAvailabilities/add'">Add New Availability</button>
                                        </div>
                                  
                                       
                                </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('id','SL#'); ?></th>
											<th><?php echo $this->Paginator->sort('doctor_id','Doctor'); ?></th>
											<th><?php echo $this->Paginator->sort('app_date','Appointment Date'); ?></th>
											<th><?php echo $this->Paginator->sort('start_time','Start Time'); ?></th>
											<th><?php echo $this->Paginator->sort('end_time','End time'); ?></th>
											<th><?php echo $this->Paginator->sort('status','Status'); ?></th>
											<th><?php echo $this->Paginator->sort('created'); ?></th>										
											<th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php if(!empty($doctorAvailabilities)){

                                        $i=0; foreach ($doctorAvailabilities as $doctorAvailability): ?>
                                        <tr>
                                            <td><?php 
													echo ++$i;		
									 			 ?></td>
											<td><?php //echo h($doctorAvailability['DoctorAvailability']['doctor_id']); 
													$doctorDetail=$this->Custom->GetDoctorById($doctorAvailability['DoctorAvailability']['doctor_id']);
													//pr($doctorDetail);
													echo $doctorDetail['MasterUser']['fname']." ".$doctorDetail['MasterUser']['lname'];
											?>&nbsp;</td>
											<td><?php echo h(date("d-m-Y",strtotime($doctorAvailability['DoctorAvailability']['app_date']))); ?>&nbsp;</td>
											<td><?php echo h($doctorAvailability['DoctorAvailability']['start_time']); ?>&nbsp;</td>
											<td><?php echo h($doctorAvailability['DoctorAvailability']['end_time']); ?>&nbsp;</td>
											<td><?php 
													if($doctorAvailability['DoctorAvailability']['status'] == 1){
														echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $doctorAvailability['DoctorAvailability']['id']), array('style' => 'color:green;'));
                                                    }else{
                                                        echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $doctorAvailability['DoctorAvailability']['id']), array('style' => 'color:red;'));
                                                    }
											 	?>&nbsp;
											 </td>
											<td><?php echo h(date("d-m-Y",strtotime($doctorAvailability['DoctorAvailability']['created']))); ?>&nbsp;</td>

											<td class="actions">
												<?php echo $this->Html->link(__('View'), array('action' => 'view', $doctorAvailability['DoctorAvailability']['id'])); ?>
												<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doctorAvailability['DoctorAvailability']['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doctorAvailability['DoctorAvailability']['id']), null, __('Are you sure you want to delete # %s?', $doctorAvailability['DoctorAvailability']['id'])); ?>
											</td>
											
                                        </tr>
                                        <?php endforeach; }?>
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
	});
	
 function search_date_wise(){
	 var start_date = $('#startdate').val();
	 var end_date = $('#enddate').val();
	 
	 if(start_date !="" && end_date!=""){
		 window.location="<?php echo $base_url;?>admin/DoctorAvailabilities/search?start_date="+start_date+"&end_date="+end_date;
		 }else{
			 alert('Please Select Start Date And End Date');
		 }
	}		
</script>

