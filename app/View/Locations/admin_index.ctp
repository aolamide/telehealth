<!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Locations</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/Locations/add'">Add Location</button>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
											<th style="width:5%"><?php echo $this->Paginator->sort('id','SL#'); ?></th>
								            <th style="width:20%"><?php echo $this->Paginator->sort('location_name','Location Name'); ?></th>
											<th style="width:20%"><?php echo $this->Paginator->sort('created'); ?></th>
											<th class="actions" style="width:10%"><?php echo __('Actions'); ?></th>
										</tr>
										<?php
                                        if(!empty($locations))
                                        {
                                            $locationcount=1;
                                         foreach ($locations as $location): ?>
                                        <tr>
                                            <td><?php echo $locationcount; ?>&nbsp;</td>
                                            <td><?php echo h($location['Location']['location_name']); ?>&nbsp;</td>
                                            <td><?php echo date("d-m-Y",strtotime($location['Location']['created'])); ?>&nbsp;</td>
                                            <td class="actions">
                                            	<?php //echo $this->Html->link(__('View'), array('action' => 'view', $location['Location']['id'])); ?>
                                               <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $location['Location']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $location['Location']['id']), null, __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?>
                                            </td>
                                        </tr>
                                    <?php 
                                    $locationcount++;
                                    endforeach;
                                    
                                        }else
                                        {?>
                                        <tr>
                                            <td colspan="6">No Location Found&nbsp;</td>
                                        </tr>
                                        <?php }?>
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