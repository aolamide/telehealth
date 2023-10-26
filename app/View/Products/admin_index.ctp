 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Products</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/Products/add'">Add Product</button>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
											<th style="width:5%"><?php echo $this->Paginator->sort('id','SL#'); ?></th>
											
											<th style="width:20%"><?php echo $this->Paginator->sort('img', 'Image'); ?></th>
								            <th style="width:20%"><?php echo $this->Paginator->sort('title','Title'); ?></th>
											<th style="width:20%"><?php echo $this->Paginator->sort('slug', 'Slug'); ?></th>
											<th style="width:20%"><?php echo $this->Paginator->sort('created'); ?></th>
											<th class="actions" style="width:10%"><?php echo __('Actions'); ?></th>
										</tr>
										<?php
                                        if(!empty($products))
                                        {
                                            $productcount=1;
                                         foreach ($products as $product): ?>
                                        <tr>
                                            <td><?php echo $productcount; ?>&nbsp;</td>
                                           
                                            <td><img src="<?php echo $base_url;?>files/product/<?php echo h($product['Product']['img']); ?>" style="width:80px; height:80px" alt="<?php echo h($product['Product']['title']); ?>" /> &nbsp;</td>
                                        	<td><a href="<?php echo $base_url;?>admin/Products/view/<?php echo $product['Product']['id'];?>"><?php echo h($product['Product']['title']); ?></a>&nbsp;</td>
                                            <td><?php echo h($product['Product']['slug']); ?>&nbsp;</td>
                                            <td><?php echo date("d-m-Y",strtotime($product['Product']['created'])); ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['title'])); ?>
                                            </td>
                                        </tr>
                                    <?php 
                                    $productcount++;
                                    endforeach;
                                    
                                        }else
                                        {?>
                                        <tr>
                                            <td colspan="6">No Banner Found&nbsp;</td>
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
