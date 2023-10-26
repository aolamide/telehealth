<!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Contact Reports</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                           
                                           <a href="<?php echo $base_url;?>admin/Reports/contact_export?export=contact" class="btn btn-primary btn-flat" target="'_blank" style="color:white;">Export To Excel</a>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th><?php echo $this->Paginator->sort('id', 'SL#'); ?></th>
											<th><?php echo $this->Paginator->sort('first_name', 'Name'); ?></th>
											<th><?php echo $this->Paginator->sort('user_email', 'Email ID'); ?></th>
											<th><?php echo $this->Paginator->sort('phone', 'Phone'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                       <?php 
                                       		if(!empty($reports) && count($reports)>0){
                                       			$cnt=0;
                                       			foreach ($reports as $report): $cnt++;
                                       	?>
                                       <tr>
                                            <td><?php echo $cnt; ?>&nbsp;</td>
                                            <td><?php echo h($report['Report']['first_name'])." ".h($report['Report']['last_name']);; ?>&nbsp;</td>
                                            <td><?php echo h($report['Report']['user_email']); ?>&nbsp;</td>
                                            <td><?php echo h($report['Report']['phone']); ?>&nbsp;</td>
                                            <td class="actions">

                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $report['Report']['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $report['Report']['id']), null, __('Are you sure you want to delete # %s?', $report['Report']['first_name'])); ?>
                                            </td>
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

