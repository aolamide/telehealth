 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Users</h3>
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
                                        <th><?php echo $this->Paginator->sort('theme_id'); ?></th>
                                        <th><?php echo $this->Paginator->sort('html_tag', 'Tag'); ?></th>
                                        <th><?php echo $this->Paginator->sort('font_size', 'Font Size'); ?></th>
                                        <th><?php echo $this->Paginator->sort('font_color', 'Font Color'); ?></th>
                                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php 
										$pageno=$this->request->params['paging']['Theme']['page'];
									$perpage=$this->request->params['paging']['Theme']['limit'];
									if(!empty($themes))
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
										foreach ($themes as $theme): ?>
                                        <tr>
                                            <td><?php echo $usercount; ?>&nbsp;</td>
                                            <td><?php
											$tagoption=array('' =>'Select', 'p' => 'Paragraph', 'a' => 'Anchor', 'li' => 'Listing', 'div' => 'Division', 'h1' => 'Heading 1', 'h2' => 'Heading 2', 'h3' => 'Heading 3', 'h4' => 'Heading 4', 'h5' => 'Heading 5', 'h6' => 'Heading 6', 'body' => 'Body', '*' => 'all');
											 echo $tagoption[$theme['Theme']['html_tag']]; 
											 ?>&nbsp;</td>
                                            <td><?php echo h($theme['Theme']['font_size']); ?>&nbsp;</td>
                                            <td><div style="width:30px; height:30px; background-color:#<?php echo h($theme['Theme']['font_color']); ?>"></div>&nbsp;</td>
                                            <td><?php echo date("d-m-Y", strtotime($theme['Theme']['created'])); ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php //echo $this->Html->link(__('View'), array('action' => 'view', $theme['Theme']['theme_id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $theme['Theme']['theme_id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $theme['Theme']['theme_id']), null, __('Are you sure you want to delete # %s?', $theme['Theme']['theme_id'])); ?>
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
