
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Newsletter</h3>
                                  
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
			<th><?php echo $this->Paginator->sort('news_letter_id','SL#'); ?></th>
			<th><?php echo $this->Paginator->sort('news_email','E-Mail ID'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Subscribed Date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
                                        <?php
										$pageno=$this->request->params['paging']['NewsLetter']['page'];
									$perpage=$this->request->params['paging']['NewsLetter']['limit'];
									
									if(!empty($newsLetters))
									{
										if($pageno!=1)
										{
											
											$nlcount=$perpage*$pageno;
											$nlcount=($nlcount-$perpage)+1;
										}
										else
										{
											$nlcount=1;	
										} 
										foreach ($newsLetters as $newsLetter): ?>
                                       <tr>
		<td><?php echo $nlcount; ?>&nbsp;</td>
		<td><?php 
			echo $newsLetter['NewsLetter']['news_email'];
		
		?>&nbsp;</td>
		<td><?php 
		$status=array('0'=>'Not Confirmed','1'=>'Confirmed');
		echo $this->Form->input($newsLetter['NewsLetter']['news_letter_id'].'_status',array('label'=>false,'options'=>$status,'selected'=>@$newsLetter['NewsLetter']['status'],'onchange'=>'changeStatus(this.id)'));
		?>&nbsp;</td>
		<td><?php echo date('d/m/Y',strtotime($newsLetter['NewsLetter']['created'])); ?>&nbsp;</td>
		
		<td class="actions">
        <?php if($newsLetter['NewsLetter']['status']==0){
		echo $this->Html->link(__('Re Send'), array('action' => 'admin_resend', $newsLetter['NewsLetter']['news_letter_id']));
		}?>
         <?php
		echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $newsLetter['NewsLetter']['news_letter_id']));
		?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'admin_delete', $newsLetter['NewsLetter']['news_letter_id']), null, __('Are you sure you want to delete # %s?', $newsLetter['NewsLetter']['news_email'])); ?>
		</td>
	</tr>
                                        <?php 
										$nlcount++;
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

<script>
function changeStatus(id){
	var news_letter_id=id.substring(0,id.indexOf('_'));
	var status=$("#"+id).val();
	var url="<?php echo $this->webroot.'NewsLetters/changeStatus'; ?>";
	$.post(url,{'news_letter_id':news_letter_id,'status':status},function(res){
		if(res==1){
			alert("Status Updated successfully");
			location.reload();
		}else{
			alert("Status not updated");
		}
	});
}
</script>
