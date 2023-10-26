<!-- Main content -->
 <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Tests</h3>
                                    <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/TestMasters/add'">Add New Test</button>

                                </div>
                                    <div class="box-tools">
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('id','SL#'); ?></th>
                                            <th><?php echo $this->Paginator->sort('test_name','Test Name'); ?></th>
                                            <!-- <th><?php //echo $this->Paginator->sort('parent_id', 'Parent'); ?></th> -->
                                            <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created','Date'); ?></th>
                                            <th><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php $i=0; foreach ($testMasters as $testMaster): ?>
                                        <tr>
                                            <td><?php //echo h($adminUser['AdminUser']['uid']);
													echo ++$i;
									 			 ?></td>
                                            <td><?php echo h($testMaster['TestMaster']['test_name']); ?></td>
<!--                                            <td>--><?php //if($testMaster['TestMaster']['parent_id']!=0){
//                                            	$parentDetail = $this->Custom->getParentTest($testMaster['TestMaster']['parent_id']);
//                                            	echo stripslashes($parentDetail['TestMaster']['test_name']);
//                                           		}else{echo "None";} ?>
<!--                                            </td>-->
                                            <td>
                                            	<?php
                                            		if($testMaster['TestMaster']['status']==1){
                                            		    echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $testMaster['TestMaster']['id']), array('style' => 'color:green;'));
                                                    }else{
                                                        echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $testMaster['TestMaster']['id']), array('style' => 'color:red;'));
                                                    }
                                            	?>
                                            </td>


											<td><?php echo h(date("d-m-Y",strtotime($testMaster['TestMaster']['created']))); ?>&nbsp;</td>
											<td class="actions">


												<?php //echo $this->Html->link(__('View'), array('action' => 'view', $testMaster['TestMaster']['id'])); ?>
												<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $testMaster['TestMaster']['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $testMaster['TestMaster']['id']), null, __('Are you sure you want to delete # %s?', $testMaster['TestMaster']['test_name'])); ?>
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


