<!-- Main content -->
 <section class="content">
                    
                     <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Faqs</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/Faqs/add'">Add Faq</button>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th style="width:5%"><?php echo $this->Paginator->sort('id','SL#'); ?></th>
                                            <th style="width:25%"><?php echo $this->Paginator->sort('title','Question'); ?></th>
                                            <th style="width:15%"><?php echo $this->Paginator->sort('orderno','Order No'); ?></th>
                                            <th style="width:15%"><?php echo $this->Paginator->sort('status','status'); ?></th>
                                            <th style="width:15%"><?php echo $this->Paginator->sort('created'); ?></th>
                                            <th class="actions" style="width:25%"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php
                                        if(!empty($faqs))
                                        {
                                            $faqcnt=1;
                                         foreach ($faqs as $faq): ?>
                                        <tr>
                                            <td><?php echo $faqcnt; ?>&nbsp;</td>
                                            <td><?php echo h($faq['Faq']['title']); ?>&nbsp;</td>
                                            <td><?php echo h($faq['Faq']['orderno']); ?>
                                            </td>
                                            <td>
                                            <?php 
                                                if($faq['Faq']['status'] == 1){
                                                    echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive', $faq['Faq']['id']), array('style' => 'color:green;'));
                                                }else{
                                                    echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active', $faq['Faq']['id']), array('style' => 'color:red;'));
                                                }      
                                             ?>
                                            &nbsp;</td>
                                            <td><?php echo date("d-m-Y",strtotime($faq['Faq']['created'])); ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $faq['Faq']['id'])); ?>
                                               <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $faq['Faq']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $faq['Faq']['id']), null, __('Are you sure you want to delete # %s?', $faq['Faq']['title'])); ?>
                                            </td>
                                        </tr>
                                    <?php 
                                    $faqcnt++;
                                    endforeach;
                                    
                                        }else
                                        {?>
                                        <tr>
                                            <td colspan="6">No Location Found&nbsp;</td>
                                        </tr>
                                        <?php }?>
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