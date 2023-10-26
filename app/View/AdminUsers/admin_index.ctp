 <!-- Main content -->

 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Users</h3>
                                    <div class="box-tools pull-right">
                                  <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/AdminUsers/add'">Add New User</button>
                                       
                                </div>
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
                                            <th><?php echo $this->Paginator->sort('uid','SL#'); ?></th>
                                            <th><?php echo $this->Paginator->sort('full_name'); ?></th>
                                            <th><?php echo $this->Paginator->sort('mail_id'); ?></th>
                                            <th><?php echo $this->Paginator->sort('user_id','User ID'); ?></th>
                                            <th><?php echo $this->Paginator->sort('pass','Password'); ?></th>
                                            <th><?php echo $this->Paginator->sort('is_active', 'Status'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created','Date'); ?></th>
                                            <th><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php $i=0; foreach ($adminUsers as $adminUser): ?>
                                        <tr>
                                            <td><?php //echo h($adminUser['AdminUser']['uid']);
				echo ++$i;		
 			 ?></td>
                                            <td><?php echo h($adminUser['AdminUser']['full_name']); ?></td>
                                            <td><?php echo h($adminUser['AdminUser']['mail_id']); ?></td>
                                            <td><?php echo h($adminUser['AdminUser']['user_id']); ?></td>
                                            <td>
                                                <span id="pwd_div<?php echo $adminUser['AdminUser']['uid'];?>" style="display:none;">
                                                <?php 
                                                if($login_user_id ==$adminUser['AdminUser']['uid'] or $login_user_id ==2 ){?>
                                                    <?php echo (stripslashes($adminUser['AdminUser']['pass']));?></span><span id="stardiz<?php echo $adminUser['AdminUser']['uid'];?>">******</span>&nbsp;&nbsp;
                                                    <a href="javascript:void(0);" id="pwdlink<?php echo $adminUser['AdminUser']['uid'];?>" onclick="showpwdFun(1,<?php echo $adminUser['AdminUser']['uid'];?>);">View</a>
                                                
                                                <?php }else{ ?>
                                                </span><span>******</span>&nbsp;&nbsp;

                                                  <?php  }?>
                                            </td>
                                            <td><?php 
											if($adminUser['AdminUser']['is_active'] == 1){
                                                if($login_user_id==2 and $adminUser['AdminUser']['uid']!=2){
                                                    echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $adminUser['AdminUser']['uid']), array('style' => 'color:green;'));
                                                }else{
                                                    echo "<font color=green>Active</font>";
                                                }
											}else{
                                                if($login_user_id==2 and $adminUser['AdminUser']['uid']!=2){
                                                    echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $adminUser['AdminUser']['uid']), array('style' => 'color:red;'));
                                                }else{
                                                    echo "<font color=red>In-Active</font>";
                                                }
											    
											}
											?></td>
											<td><?php echo h(date("d-m-Y",strtotime($adminUser['AdminUser']['created']))); ?>&nbsp;</td>
											<td class="actions">
												<?php //echo $this->Html->link(__('View'), array('action' => 'view', $adminUser['AdminUser']['uid'])); ?>
												<?php 
                                                if($login_user_id ==$adminUser['AdminUser']['uid'] or $login_user_id ==2 ){
                                                echo $this->Html->link(__('Edit'), array('action' => 'edit', $adminUser['AdminUser']['uid'])); 
                                                }?>
												<?php 
												if($login_user_id ==2 && $adminUser['AdminUser']['uid']!=2){echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adminUser['AdminUser']['uid']), array(), __('Are you sure you want to delete # %s?', $adminUser['AdminUser']['full_name']));} ?>
											</td>
                                        </tr>
                                        <?php endforeach; ?>
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
<script type="text/javascript">
    function showpwdFun(showval, idval){
        if(showval==1){
            $("#stardiz"+idval).hide(500);
            $("#pwd_div"+idval).show(500);
            $("#pwdlink"+idval).attr("onclick", "showpwdFun(0, "+idval+")");
        }else{
            $("#pwd_div"+idval).hide(500);
            $("#stardiz"+idval).show(500);
            $("#pwdlink"+idval).attr("onclick", "showpwdFun(1, "+idval+")");
        }
    }
</script>