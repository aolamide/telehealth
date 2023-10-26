<!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Test Result Reports</h3>
                                    <div class="box-tools">
                                        <div class="box-tools pull-right">
                                           
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th><?php echo $this->Paginator->sort('id', 'SL#'); ?></th>
											<th><?php echo $this->Paginator->sort('patientid', 'Patient '); ?></th>
											<th><?php echo $this->Paginator->sort('doctorid','Doctor'); ?></th>
                                            <th><?php echo $this->Paginator->sort('test_type','Test Type'); ?></th>
                                             <th><?php echo $this->Paginator->sort('sub_test_type','Sub Test'); ?></th>
                                            <th><?php echo $this->Paginator->sort('test_result','Test Result'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created','Reported Date'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                       <?php 
                                       		if(!empty($tesrResullDets) && count($tesrResullDets)>0){
                                       			$cnt=0;
                                       			foreach ($tesrResullDets as $reportDet): $cnt++;
                                       	?>
                                       <tr>
                                            <td><?php echo $cnt; ?>&nbsp;</td>
                                            <td><?php echo $patientDetail=$this->Custom->userDet($reportDet['PatienttestReport']['patientid']); ?>&nbsp;</td>
                                            <td><?php echo $doctorDetail=$this->Custom->userDet($reportDet['PatienttestReport']['doctorid']); ?>&nbsp;</td>
                                            <td><?php  $testType=$this->Custom->getParentTest($reportDet['PatienttestReport']['test_type']); 
                                                echo $testType['TestMaster']['test_name'];
                                            ?>&nbsp;</td>
                                            <td><?php  $testType=$this->Custom->getParentTest($reportDet['PatienttestReport']['sub_test_type']); 
													if(!empty($testType)){
                                                		echo $testType['TestMaster']['test_name'];
													}else{echo "None";}
                                            ?>&nbsp;</td>
                                            <td><?php echo h($reportDet['PatienttestReport']['test_result'])?>&nbsp;</td>
                                           <td><?php echo date("d-m-Y",strtotime($reportDet['PatienttestReport']['created'])); ?>&nbsp;</td>
                                            <td class="actions">

                                                <?php //echo $this->Html->link(__('View'), array('action' => 'viewtestresult', $reportDet['PatienttestReport']['id'])); ?>
                                                 <?php echo $this->Html->link(__('Edit'), array('action' => 'edittestresult', $reportDet['PatienttestReport']['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('action' => 'testresultdelete', $reportDet['PatienttestReport']['id']), null, __('Are you sure you want to delete # %s?', $reportDet['PatienttestReport']['id'])); ?>
                                                <!-- <a href="<?php echo $base_url; ?>Reports/downloadTest/<?php echo $reportDet['UploadtestResult']['uploaded_file'];?>" target="_blank" >Download Report</a> -->
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

