 
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Appointments</h3>
                                    <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/Appointments/add'">Add New Appointment</button>
                                       
                                </div>
                                    <div class="box-tools">
                                        <!--<div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>-->
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('id','SL#'); ?></th>
											<th><?php echo $this->Paginator->sort('locationid','Location'); ?></th>
											<th><?php echo $this->Paginator->sort('serviceid','Services'); ?></th>
											<th><?php echo $this->Paginator->sort('patientid','Patient Name'); ?></th>
											<th><?php echo $this->Paginator->sort('doctorid','Doctor name'); ?></th>
											<th><?php echo $this->Paginator->sort('appointment_date','Appointment Date'); ?></th>
											<th><?php echo $this->Paginator->sort('status'); ?></th>
											<th><?php echo $this->Paginator->sort('created'); ?></th>										
											<th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php $i=0; foreach ($appointments as $appointment): ?>
                                        <tr>
                                            <td><?php 
													echo ++$i;		
									 			 ?></td>
											<td>
												<?php //echo h($appointment['Appointment']['locationid']); 
													echo $LocationDetail=$this->Custom->locationDet($appointment['Appointment']['locationid']);
												?>&nbsp;
											</td>
											<td><?php //echo h($appointment['Appointment']['serviceid']); 
												$servicesDetail=$this->Custom->serviceApponint($appointment['Appointment']['serviceid']);
												if( !empty($servicesDetail)){
					                                $i=0;
					                                $cnt=count($servicesDetail);
					                                foreach($servicesDetail as $servicesDetails){$i++;
					                                    echo $servicesDetails;
					                                    if($i!=$cnt){
					                                        echo "&nbsp;,&nbsp;";
					                                    }
					                                }
					                            }
											?>&nbsp;</td>
											<td><?php echo $patientDetail=$this->Custom->userDet($appointment['Appointment']['patientid']); ?>&nbsp;</td>
											<td><?php echo $doctorDetail=$this->Custom->userDet($appointment['Appointment']['doctorid']);
											?>&nbsp;</td>
											<td><?php echo h(date("d-m-Y",strtotime($appointment['Appointment']['appointment_date']))); ?>&nbsp;</td>
											<td><?php 
													if($appointment['Appointment']['status'] == 1){
														echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $appointment['Appointment']['id']), array('style' => 'color:green;'));
                                                    }else{
                                                        echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $appointment['Appointment']['id']), array('style' => 'color:red;'));
                                                    }
											 	?>&nbsp;
											 </td>
											<td><?php echo h(date("d-m-Y",strtotime($appointment['Appointment']['created']))); ?>&nbsp;</td>

											<td class="actions">
												<?php echo $this->Html->link(__('View'), array('action' => 'view', $appointment['Appointment']['id'])); ?>
												<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $appointment['Appointment']['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $appointment['Appointment']['id']), null, __('Are you sure you want to delete # %s?', $appointment['Appointment']['id'])); ?>
											</td>
											
                                        </tr>
                                        <?php endforeach; ?>
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
