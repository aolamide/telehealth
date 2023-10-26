 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Doctors</h3>
                                    <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/MasterDoctors/add'">Add New Doctor</button>
                                       
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
                                            <th><?php echo $this->Paginator->sort('uid','SL#'); ?></th>
                                            <th><?php echo $this->Paginator->sort('fname', 'Name'); ?></th>
                                            <th><?php echo $this->Paginator->sort('ref_id','Reference ID'); ?></th>
                                            <th><?php echo $this->Paginator->sort('user_name', 'User Name'); ?></th>
                                            <th><?php echo $this->Paginator->sort('email_id', 'Email Address'); ?></th>
                                            <th><?php echo $this->Paginator->sort('gender','Gender'); ?></th>
                                            <th><?php echo $this->Paginator->sort('zipcode','Zip Code'); ?></th>
                                            <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created','Date'); ?></th>
                                            <th><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php $i=0; foreach ($masterDoctors as $masterDoctor): ?>
                                        <tr>
                                            <td><?php //echo h($adminUser['AdminUser']['uid']);
				echo ++$i;		
 			 ?></td>
                                            <td><?php echo stripslashes($masterDoctor['MasterDoctor']['fname']." ".$masterDoctor['MasterDoctor']['lname'] ); ?></td>
                                            <td><?php echo h($masterDoctor['MasterDoctor']['ref_id']); ?></td>
                                            <td><?php echo h($masterDoctor['MasterDoctor']['user_name']); ?></td>
                                            <td><?php echo h($masterDoctor['MasterDoctor']['email_id']); ?></td>
                                            <td><?php 
											if($masterDoctor['MasterDoctor']['gender'] == 1){
											echo "Male";
											}else{
											echo "Female";
											}
											?></td>
											<td><?php echo h($masterDoctor['MasterDoctor']['zipcode']); ?></td>
											<td><?php 
											if($masterDoctor['MasterDoctor']['status'] == 1){
											echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $masterDoctor['MasterDoctor']['id']), array('style' => 'color:green;'));
											}else{
											echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $masterDoctor['MasterDoctor']['id']), array('style' => 'color:red;'));
											}
											?></td>
											<td><?php echo h(date("d-m-Y",strtotime($masterDoctor['MasterDoctor']['created']))); ?>&nbsp;</td>
											<td class="actions">
												<?php echo $this->Html->link(__('View'), array('action' => 'view', $masterDoctor['MasterDoctor']['id'])); ?>
												<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $masterDoctor['MasterDoctor']['id'])); ?>
												<?php 
												echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $masterDoctor['MasterDoctor']['id']), array(), __('Are you sure you want to delete # %s?', $masterDoctor['MasterDoctor']['fname'].' '.$masterDoctor['MasterDoctor']['lname'])); ?>
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

