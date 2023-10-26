<?php //pr($manageUsers);?>
<script type="text/javascript">
function changeMembership(changeval, uid)
{
	//var uid=$("#uid").val();
	$.ajax({
		type: 'POST',
		url: '<?php echo $base_url;?>ManageUsers/upgrademember',
		data: 'uid='+uid+'&memid='+changeval,
		success: function(data) {
			if(data==1)
			{
				alert("Membership Upgrade successfully");
			}
			else
			{
				alert("Upgrading Failed");
			}
		}

	});
}
</script>
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Users</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                        <input type="text" placeholder="Search User" name="searchtxt" id="searchtxt" onkeypress='enterSrch(event);' value="<?php echo @$searchtxt;?>"  class="form-control input-sm pull-right" style="width: 150px; margin-right:5px;" >&nbsp;<select id='user_type' class="form-control input-sm pull-right" style="width: 150px; margin-right:5px;" >
		<?php
		$user_type=array("1"=>"Buyer","2"=>"Seller");
		foreach($user_type AS $key => $val){
			?>
			
			<option value='<?php echo $key;?>' <?php if($key==@$s_ut) echo 'selected';?>><?php echo $val;?></option>
			
			<?php
		}
		?>
		<option value='3' <?php if(!@$s_ut || @$s_ut==3) echo 'selected'; 
		?>>All user Type</option>
		</select>
    
                                   <div class="input-group-btn">
                              &nbsp;&nbsp; <button  type="button" name="searchbutn"  class="btn btn-sm btn-default" id="searchbutn" onclick="return searchTxt();">Search</button>
                                              
                                            </div>
                                        </div>
                                     
	</div>
                                   </div>
                                </div><!-- /.box-header -->
                                 <div>
	<h3 style='display:inline;'>Total User : <?php echo $this->Custom->totalUser();?></h3>&nbsp;&nbsp;&nbsp;
	<h3 style='color:red;display:inline;'>Total Buyer : <?php echo $this->Custom->totalBuyer();?>
	</h3>&nbsp;&nbsp;&nbsp;
	<h3 style='color:green;display:inline;'>Total Seller : <?php echo $this->Custom->totalSeller();?></h3>&nbsp;&nbsp;&nbsp;
	<span><a href="<?php echo $this->webroot.'Export/php-excel.php?export=user';?>" targe='_blank'>Export To EXCEL</a></span>
	</div>
				 
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
			<th><?php echo $this->Paginator->sort('user_id','SL#'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name', 'Name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('telephone1','Telephone'); ?></th>
			<th><?php echo $this->Paginator->sort('user_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active','Status'); ?></th>
            <th><?php echo $this->Paginator->sort('is_premium','Set Premium'); ?></th>
			<th><?php echo $this->Paginator->sort('created','Registration Date'); ?></th>
			<th class="actions" width="20%"><?php echo __('Actions'); ?></th>
	</tr>
                                        <?php
										$pageno=$this->request->params['paging']['ManageUser']['page'];
									$perpage=$this->request->params['paging']['ManageUser']['limit'];
									if(!empty($manageUsers))
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
										
										foreach ($manageUsers as $manageUser): 
										$userID=$manageUser['ManageUser']['user_id'];
										$checkmem=$this->Custom->BapCustUniMembership($userID);
										$memberdetails=$this->Custom->BapCustUniMembership($userID);
										?>
	<tr>
		<td><?php echo $usercount; ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__($manageUser['ManageUser']['first_name']." ".$manageUser['ManageUser']['last_name']), array('action' => 'view', $manageUser['ManageUser']['user_id']));?>
		
		&nbsp;</td>
		<td><?php echo h($manageUser['ManageUser']['email']); ?>&nbsp;</td>
		<td><?php echo h($manageUser['ManageUser']['telephone1']); ?>&nbsp;</td>
		<td><?php echo $this->Custom->user_type($manageUser['ManageUser']['user_type_id']); ?>&nbsp;</td>
        
		<td><?php
			$status=array("0"=>"Inactive","1"=>"Active");
			echo $this->Form->input($manageUser['ManageUser']['user_id']."_is_active",array("options"=>$status,'label'=>false,'onchange'=>'changeStatus(this.id)','selected'=>@$manageUser['ManageUser']['is_active'], 'class' => 'form-control'));
		/*if($manageUser['ManageUser']['is_active']==1)
			 echo "Active";
			else 
			 echo "Inactive"; */
		 ?>&nbsp;
		 </td>
        <td align="center"> <?php /*if($manageUser['ManageUser']['user_type_id']==2){ 
		if(!empty($checkmem)){
		echo $this->Form->input('is_premium',array('label'=>false, 'type' => 'checkbox','default'=>@$manageUser['ManageUser']['is_premium'], 'value' => 1, 'title' =>$manageUser['ManageUser']['user_id'], 'class' => 'form-control isPremium'));
		}
		else
		{
			echo "Only availble for Upgrade Seller";
		}
		}else{echo "Not Availble for Buyer";}*/?> 
        <select name="is_premium" id="is_premium" class="form-control" onchange="changeMembership(this.value,<?php echo $manageUser['ManageUser']['user_id'];?>);">
        <option value="">Select Membership</option>
        <?php
		if(!empty($userMembership))
		{
			foreach($userMembership as $userMembershipRes)
			{
				?>
                <option value="<?php echo $userMembershipRes['UserMembership']['memb_id'];?>"<?php if(!empty($memberdetails) && $memberdetails['UserMembership']['memb_id']==$userMembershipRes['UserMembership']['memb_id']){?> selected="selected"<?php }?>><?php echo stripslashes($userMembershipRes['UserMembership']['memb_type']);?></option>
                <?php
			}
		}
		?>
        </select>
        <input type="hidden" name="uid" id="uid" value="<?php echo $manageUser['ManageUser']['user_id'];?>" />
        </td>
		<td><?php echo date('d/m/Y',strtotime($manageUser['ManageUser']['created'])); ?>&nbsp;</td>
		<td class="actions">
        	<span onclick="location.href='<?php echo $base_url;?>admin/ManageUsers/rating/<?php echo $manageUser['ManageUser']['user_id'];?>'" style="cursor:pointer"><img src="<?php echo $base_url;?>images/rating_feedback.png" /></span>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $manageUser['ManageUser']['user_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $manageUser['ManageUser']['user_id']), null, __('Are you sure you want to delete # %s?', $manageUser['ManageUser']['user_id'])); ?>
			<?php //echo $this->Html->link(__('Send Message'), array('action' => 'sendMessage', $manageUser['ManageUser']['user_id'])); ?>
           <!-- <a href="<?php //echo $base_url;?>ManageUsers/delete" class="btn btn-primary" onclick="">Delete</a>-->
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




<script type='text/javascript'>
function changeStatus(id){
	var user_id=id.substring(0,id.indexOf("_"));
	var status=$("#"+id).val();
	var url="<?php echo $this->webroot.'admin/ManageUsers/changeStatus'; ?>";
	$.post(url,{'user_id':user_id,'is_active':status},function(res){
		if(res==1){
			alert("Status Updated successfully");
		}else{
			alert("Status not updated");
		}
	});
		
}
function enterSrch(e){
	//alert(e.which);
	if(e.which==13){
		searchTxt();
	}
}
function searchTxt(){
	var searchtxt=$("#searchtxt").val();
	var user_type=$("#user_type").val();
	var url="<?php echo $this->webroot.'admin/ManageUsers/index/'; ?>";
	url+='searchtxt:'+searchtxt+'/user_type:'+user_type;
	window.location=url;
}

</script>
