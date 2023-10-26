
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Sent Mail List</h3>
                                  <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/NewsLetters/mail_to_subscriber'">Mail To Subscriber</button>
                                       
                                </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('mail_id','SL#'); ?></th>
                                            <th><?php echo $this->Paginator->sort('user_type','User Type'); ?></th>
                                            <th><?php echo $this->Paginator->sort('compose_id', 'Subject'); ?></th>
                                            <th><?php echo $this->Paginator->sort('mail_list', 'Subscriber'); ?></th>
                                            <th class="actions"><?php echo __('Actions'); ?></th>
                                    	</tr>
                                        <?php
										$pageno=$this->request->params['paging']['MailToSubscriber']['page'];
									$perpage=$this->request->params['paging']['MailToSubscriber']['limit'];
									
									if(!empty($mailToSubscriber))
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
										foreach ($mailToSubscriber as $mailToSubscriberRes): ?>
                                       <tr>
                                            <td><?php echo $nlcount; ?>&nbsp;</td>
                                            <td><?php
											$userarr=array(1 => 'Buyer', 2 => 'Seller', 3=> 'Subscriber');
											echo $userarr[$mailToSubscriberRes['MailToSubscriber']['user_type']];
											?>&nbsp;</td>
                                            <td><?php
                                                $compose_id=$mailToSubscriberRes['MailToSubscriber']['compose_id'];
												$composeDeatil=$this->Custom->BapCustUniGetTemplate($compose_id);
												if(!empty($composeDeatil))
												{
													echo $composeDeatil['NewsletterTemplate']['mail_subject'];
												}
                                             ?>&nbsp;</td>
                                             <td><?php
                                                echo $mailToSubscriberRes['MailToSubscriber']['mail_list'];
                                             ?>&nbsp;</td>
                                                
                                            <td class="actions">
                                            
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'admin_sent_delete', $mailToSubscriberRes['MailToSubscriber']['mail_id']), null, __('Are you sure you want to delete # %s?', $mailToSubscriberRes['MailToSubscriber']['mail_id'])); ?>
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
