 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage News</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/news/add'">Add News</button>
                                       
                                </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th><?php echo $this->Paginator->sort('news_id', 'SL#'); ?></th>
                                            <th><?php echo $this->Paginator->sort('news_title', 'Title'); ?></th>
                                            <th><?php echo $this->Paginator->sort('news_img', 'Image'); ?></th>
                                            <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created', 'Posted On'); ?></th>
                                            <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                        <?php 
										$pageno=$this->request->params['paging']['News']['page'];
									$perpage=$this->request->params['paging']['News']['limit'];
									if(!empty($news))
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
										foreach ($news as $news): ?>
                                       <tr>
                                            <td><?php echo $usercount; ?>&nbsp;</td>
                                            <td><?php echo h($news['News']['news_title']); ?>&nbsp;</td>
                                            <td><img src="<?php echo $base_url;?>files/news/<?php echo $news['News']['news_img'];?>" style="width:70px;" />&nbsp;</td>
                                            <td><?php
                                                if($news['News']['status'] == 1){
                                                        echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $news['News']['news_id']), array('style' => 'color:green;'));
                                                    }else{
                                                        echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $news['News']['news_id']), array('style' => 'color:red;'));
                                                    } 
											?>&nbsp;</td>
                                            <td><?php echo date("d-m-Y", strtotime($news['News']['created'])); ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $news['News']['news_id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $news['News']['news_id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $news['News']['news_id']), null, __('Are you sure you want to delete # %s?', $news['News']['news_title'])); ?>
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
