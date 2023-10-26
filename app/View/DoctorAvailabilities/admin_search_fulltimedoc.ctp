<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Full Time Doctors Availabilities</h3>

                                    <div class="box-tools pull-right">
                                        <div class="input-group">
                                            <select id="avaialable_doc" class="form-control" style="width:150px;">
                                                <option value="">--Select--</option>
                                                <option value="onlinedoctor" selected="selected">Online Doctors</option>
                                                <option value="alldoctor">All Full-Time Doctors</option>
                                            </select>
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/DoctorAvailabilities/addfulltimedoc'">Add New Availability</button>
                                        </div>
                                        
                                    </div>
                                    <div class="box-tools">                                       
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('id','SL#'); ?></th>
											<th><?php echo $this->Paginator->sort('doctor_id','Doctor'); ?></th>
											<th><?php echo $this->Paginator->sort('status','Status'); ?></th>
											<th><?php echo $this->Paginator->sort('created'); ?></th>										
											<th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php if(!empty($fulltimeDocAvails)){

                                        $i=0; foreach ($fulltimeDocAvails as $doctorAvailability): ?>
                                        <tr>
                                            <td><?php 
													echo ++$i;		
									 			 ?></td>
											<td><?php //echo h($doctorAvailability['DoctorAvailability']['doctor_id']); 
													$doctorDetail=$this->Custom->GetDoctorById($doctorAvailability['DoctorAvailability']['doctor_id']);
													//pr($doctorDetail);
													echo $doctorDetail['MasterUser']['fname']." ".$doctorDetail['MasterUser']['lname'];
											?>&nbsp;</td>
											
											
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
												<?php echo $this->Html->link(__('Edit'), array('action' => 'editfulltimedoc', $doctorAvailability['DoctorAvailability']['id'])); ?>
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
 $("#avaialable_doc").change(function () {
        var select_data = this.value;
        //alert(select_data);
		if(select_data=="alldoctor"){
			window.location="<?php echo $base_url;?>admin/DoctorAvailabilities/fulltimedocavailable/";
		}else if(select_data=="onlinedoctor"){
			window.location="<?php echo $base_url;?>admin/DoctorAvailabilities/search_fulltimedoc/"+select_data;
		}
    });
</script>



