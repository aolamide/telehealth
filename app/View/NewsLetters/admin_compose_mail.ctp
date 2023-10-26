
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Compose Mail</h3>
                                  <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/NewsLetters/compose_mail_add'">Compose Mail</button>
                                       
                                </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
			<th><?php echo $this->Paginator->sort('compose_id','SL#'); ?></th>
            <th><?php echo $this->Paginator->sort('user_type', 'User Type'); ?></th>
			<th><?php echo $this->Paginator->sort('mail_subject', 'Subject'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
                                        <?php
										$pageno=$this->request->params['paging']['NewsletterTemplate']['page'];
									$perpage=$this->request->params['paging']['NewsletterTemplate']['limit'];
									
									if(!empty($newsletterTemplate))
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
										foreach ($newsletterTemplate as $newsletterTemplateRes): ?>
                                       <tr>
		<td><?php echo $nlcount; ?>&nbsp;</td>
        <td><?php 
		$usertype=array('3'=>'Subscriber','1'=>'Buyer', '2' => 'Seller');
		echo $usertype[$newsletterTemplateRes['NewsletterTemplate']['user_type']];
		?>&nbsp;</td>
		<td><?php
			echo $newsletterTemplateRes['NewsletterTemplate']['mail_subject'];
		 ?>&nbsp;</td>
		<td><?php 
		$status=array('0'=>'Inactive','1'=>'Active');
		echo $status[$newsletterTemplateRes['NewsletterTemplate']['compose_status']];
		?>&nbsp;</td>		
		<td class="actions">
         <?php
		echo $this->Html->link(__('Edit'), array('action' => 'admin_compose_mail_edit', $newsletterTemplateRes['NewsletterTemplate']['compose_id']));
		?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'admin_compose_mail_delete', $newsletterTemplateRes['NewsletterTemplate']['compose_id']), null, __('Are you sure you want to delete # %s?', $newsletterTemplateRes['NewsletterTemplate']['mail_subject'])); ?>
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
		}else{
			alert("Status not updated");
		}
	});
}
</script>
