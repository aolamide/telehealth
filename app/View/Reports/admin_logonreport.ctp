<section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">User Log-On Reports</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                           
                                           <!-- <a href="<?php echo $base_url;?>admin/Reports/contact_export?export=contact" class="btn btn-primary btn-flat" target="'_blank" style="color:white;">Export To Excel</a> -->
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th><?php echo $this->Paginator->sort('id', 'SL#'); ?></th>

                                            <th><?php echo $this->Paginator->sort('uid','User'); ?></th>
                                            <th><?php echo $this->Paginator->sort('login_time', 'Login Time'); ?></th>
                                            <th><?php echo $this->Paginator->sort('logout_time', 'Logout Time'); ?></th>
                                            <!-- <th class="actions"><?php //echo __('Actions'); ?></th> -->
                                    </tr>
                                       <?php 
                                            if(!empty($logonDets) && count($logonDets)>0){//pr($convReports);
                                                $cnt=0;
                                                foreach ($logonDets as $logonDet): $cnt++;
                                        ?>
                                       <tr>
                                            <td><?php echo $cnt; ?>&nbsp;</td>
                                            <td><?php echo $userDetail=$this->Custom->userDet($logonDet['LoginDetail']['uid']); ?>&nbsp;</td>
                                            
                                           <td><?php echo h(date("d-m-Y H:i:s",strtotime($logonDet['LoginDetail']['login_time']))); ?>&nbsp;</td>
                                           <td>
                                           <?php 
                                                if(!empty($logonDet['LoginDetail']['logout_time'])){
                                                  echo h(date("d-m-Y H:i:s",strtotime($logonDet['LoginDetail']['logout_time'])));
                                                }else{echo "N/A";}
                                                 
                                            ?>&nbsp;
                                            </td>
                                              
                                           
                                        </tr>
                                    <?php
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

