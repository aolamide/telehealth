 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Pages</h3>
                                   <!-- <div class="box-tools">
                                        <div class="input-group">
                                          Brand :<select id='prnt_brnd_id'>
		<option value='' <?php if(@$par_brnd=='') echo "selected=selected";?>>-Select-</option>
		<?php
		foreach($parent AS $key => $val){
			?>
			<option value='<?php echo $key;?>' <?php if($key==@$par_brnd && @$par_brnd!='') echo 'selected=selected';?>><?php echo $val;?></option>
			<?php }?>
		</select>
                                            <input type="text" placeholder="Search Brand" name="searchtxt" id="searchtxt" onkeypress='enterSrch(event);' class="form-control input-sm pull-right" style="width: 150px;" value="<?php echo @$searchtxt;?>">
                                            <div class="input-group-btn">
                               <button type="button" class="btn btn-sm btn-default" name="searchbutn" id="searchbutn" onclick="return searchTxt();" > <i class="fa fa-search"></i></button>
                                              
                                            </div>
                                        </div>
                                        <div>
				 
	</div>
                                    </div>-->
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
			<th><?php echo $this->Paginator->sort('pid','SL#'); ?></th>
			<th><?php echo $this->Paginator->sort('page_name'); ?></th>
			<th><?php echo $this->Paginator->sort('page_title'); ?></th>
	
			<th style="width:30%"><?php echo $this->Paginator->sort('sor_desc','Short Description'); ?></th>
			<th><?php echo $this->Paginator->sort('created','Date'); ?></th>
			<th><?php echo $this->Paginator->sort('modified','Last Modified Date'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active','Status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
                                        <?php
										$pageno=$this->request->params['paging']['AdminPage']['page'];
									$perpage=$this->request->params['paging']['AdminPage']['limit'];
									if(!empty($adminPages))
									{
										if($pageno!=1)
										{
											
											$pagecount=$perpage*$pageno;
											$pagecount=($pagecount-$perpage)+1;
										}
										else
										{
											$pagecount=1;	
										} 
										foreach ($adminPages as $adminPage): ?>
                                       <tr>
		<td><?php echo $pagecount; ?>&nbsp;</td>
		<td><?php
			echo $this->Html->link(__($adminPage['AdminPage']['page_name']), array('action' => 'admin_view', $adminPage['AdminPage']['pid']));
		 ?>&nbsp;</td>
		<td><?php
			echo stripslashes($adminPage['AdminPage']['page_title']);
		 ?>&nbsp;</td>
		<td><?php echo h($adminPage['AdminPage']['sor_desc']); ?>&nbsp;</td>
		<td><?php echo h(date("d/m/Y",strtotime($adminPage['AdminPage']['created']))); ?>&nbsp;</td>
		<td><?php echo h(date("d/m/Y",strtotime($adminPage['AdminPage']['modified']))); ?>&nbsp;</td>
		<td><?php 
		if($adminPage['AdminPage']['is_active'] == 1){
			echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $adminPage['AdminPage']['pid']), array('style' => 'color:green;'));
        }else{
            echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $adminPage['AdminPage']['pid']), array('style' => 'color:red;'));
        }
		?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $adminPage['AdminPage']['pid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adminPage['AdminPage']['pid']), array(), __('Are you sure you want to delete # %s?', $adminPage['AdminPage']['page_title'])); ?>
		</td>
	</tr>
                                        <?php 
										$pagecount++;
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
	var brand_id=id.substring(0,id.indexOf('_'));
	var status=$("#"+id).val();
	var url="<?php echo $this->webroot.'ManageBrands/changeStatus'; ?>";
	$.post(url,{'brand_id':brand_id,'status':status},function(res){
		if(res==1){
			alert("Status Updated successfully");
		}else{
			alert("Status not updated");
		}
	});
}
function searchTxt(){
	var searchtxt=$("#searchtxt").val().trim();
	var flag=$("#prnt_brnd_id").val();
	var url="<?php echo $this->webroot.'admin/ManageBrands/index/'; ?>";
	url+='searchtxt:'+searchtxt+'/flag:'+flag;
	window.location=url;
}
function enterSrch(e){
	//alert(e.which);
	if(e.which==13){
		searchTxt();
	}
}
</script>

