 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Home Tabs</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/Hometabs/add'">Add Home Tab</button>
                                       
                                </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th><?php echo $this->Paginator->sort('id', 'SL#'); ?></th>
                                            <th><?php echo $this->Paginator->sort('title', 'Title'); ?></th>
                                            <th><?php echo $this->Paginator->sort('img', 'Image'); ?></th>
                                            <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created', 'Posted On'); ?></th>
                                            <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                        <?php 
										$pageno=$this->request->params['paging']['Hometab']['page'];
									$perpage=$this->request->params['paging']['Hometab']['limit'];
									if(!empty($hometabs))
									{
										if($pageno!=1)
										{
											
											$usercount=$perpage*$pageno;
											$usercount=($usercount-$perpage)+1;
										}
										else
										{
											$usercount=1;	
										} 
										foreach ($hometabs as $hometab): ?>
                                       <tr>
                                            <td><?php echo $usercount; ?>&nbsp;</td>
                                            <td><?php echo h($hometab['Hometab']['title']); ?>&nbsp;</td>
                                            <td>
                                            <?php if($hometab['Hometab']['img']!= ''){?>
                                            <img src="<?php echo $base_url;?>files/hometab/<?php echo $hometab['Hometab']['img'];?>" style="width:70px;" />&nbsp;
                                            <?php }?>
                                            </td>
                                            <td><?php 
                                            if($hometab['Hometab']['status'] == 1){
                                                        echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $hometab['Hometab']['id']), array('style' => 'color:green;'));
                                                }else{
                                                    echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $hometab['Hometab']['id']), array('style' => 'color:red;'));
                                                }
											?>&nbsp;</td>
                                            <td><?php echo date("d-m-Y", strtotime($hometab['Hometab']['created'])); ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $hometab['Hometab']['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hometab['Hometab']['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hometab['Hometab']['id']), null, __('Are you sure you want to delete # %s?', $hometab['Hometab']['title'])); ?>
                                            </td>
                                        </tr>
                                    <?php
									$usercount++;
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

