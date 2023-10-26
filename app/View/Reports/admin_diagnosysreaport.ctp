<!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Diagnosis Reports</h3>
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
                                            <th><?php echo $this->Paginator->sort('disease_name','Disease'); ?></th>
											<th><?php echo $this->Paginator->sort('patientid', 'Patient '); ?></th>
											<th><?php echo $this->Paginator->sort('doctorid','Doctor'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created','Reported Date'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                       <?php 
                                       		if(!empty($diagnosysReportDets) && count($diagnosysReportDets)>0){
                                       			$cnt=0;
                                       			foreach ($diagnosysReportDets as $reportDet): $cnt++;
                                       	?>
                                       <tr>
                                            <td><?php echo $cnt; ?>&nbsp;</td>
                                             <td><?php echo h($reportDet['DiagnosysReport']['disease_name']); ?>&nbsp;</td>
                                            <td><?php echo $patientDetail=$this->Custom->userDet($reportDet['DiagnosysReport']['patientid']); ?>&nbsp;</td>
                                            <td><?php echo $doctorDetail=$this->Custom->userDet($reportDet['DiagnosysReport']['doctorid']); ?>&nbsp;</td>
                                           <td><?php echo date("d-m-Y",strtotime($reportDet['DiagnosysReport']['created'])); ?>&nbsp;</td>
                                            <td class="actions">

                                                <?php echo $this->Html->link(__('View'), array('action' => 'viewdiagnosys', $reportDet['DiagnosysReport']['id'])); ?>
                                                 <?php echo $this->Html->link(__('Edit'), array('action' => 'editdignosis', $reportDet['DiagnosysReport']['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('action' => 'dignosisdelete', $reportDet['DiagnosysReport']['id']), null, __('Are you sure you want to delete # %s?', $reportDet['DiagnosysReport']['disease_name'])); ?>
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

