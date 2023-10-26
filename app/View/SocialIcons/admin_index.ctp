<!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Social Icons</h3>
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
			<th><?php echo $this->Paginator->sort('social_id','SL#'); ?></th>
			<th><?php echo $this->Paginator->sort('social_name'); ?></th>
			<th><?php echo $this->Paginator->sort('social_img','Social Image'); ?></th>
			<th><?php echo $this->Paginator->sort('social_icon','Social Icon'); ?></th>
			<th><?php echo $this->Paginator->sort('social_link'); ?></th>
			<th><?php echo $this->Paginator->sort('orderno','Order No'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
                                        <?php
										$pageno=$this->request->params['paging']['SocialIcon']['page'];
									$perpage=$this->request->params['paging']['SocialIcon']['limit'];
									if(!empty($socialIcons))
									{
										if($pageno!=1)
										{
											
											$socialcount=$perpage*$pageno;
											$socialcount=($socialcount-$perpage)+1;
										}
										else
										{
											$socialcount=1;	
										} 
										 foreach ($socialIcons as $socialIcon): ?>
                                       <tr>
		<td><?php echo $socialcount; ?></td>
		<td><?php echo $this->Html->link(__($socialIcon['SocialIcon']['social_name']), array('action' => 'view', $socialIcon['SocialIcon']['social_id'])); ?></td>
		<td>
		<?php if($socialIcon['SocialIcon']['social_img']!=""){?>
		<img src="<?php echo $this->webroot.'files/socialicon/'.$socialIcon['SocialIcon']['social_img']; ?>" title="<?php echo h($socialIcon['SocialIcon']['social_name']); ?>" style="width:30px;height:30px">
		<?php }else{echo "N/A";}?>
		</td>
		<td><?php if($socialIcon['SocialIcon']['social_icon']!=""){echo $socialIcon['SocialIcon']['social_icon'];}else{echo "N/A";} ?></td>
		<td><?php echo h($socialIcon['SocialIcon']['social_link']); ?></td>
		<td><?php echo h($socialIcon['SocialIcon']['orderno']); ?></td>
		<td><?php echo  date('d/m/Y',strtotime($socialIcon['SocialIcon']['created'])); ?></td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $socialIcon['SocialIcon']['social_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $socialIcon['SocialIcon']['social_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $socialIcon['SocialIcon']['social_id']), null, __('Are you sure you want to delete # %s?', $socialIcon['SocialIcon']['social_id'])); ?>
		</td>
	</tr>
                                        <?php 
										$socialcount++;
										endforeach;
									}?>
                                    </table>
                                   
                                </div><!-- /.box-body -->
                               
                            </div><!-- /.box -->
                             <div class="clearfix"></div>
                                 
									<div class="float_left">
                                    <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	
                                    </div>
                                    
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



