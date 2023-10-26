<!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Uploaded Reports</h3>
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
											<th><?php echo __('Patient'); ?></th>
											<th><?php echo __('Doctor'); ?></th>
                                            <th><?php echo __('Disease Name'); ?></th>
                                            <th><?php echo __('Test Assigned'); ?></th>
                                            <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                       <?php 
                                       		if(!empty($testReportDet) && count($testReportDet)>0){
                                       			$cnt=0;
                                       			foreach ($testReportDet as $reportDet): $cnt++;
                                                $diagnosisID=$reportDet['LabtestReport']['diagnosis_id'];
                                                 $diagnosisDet=$this->Custom->getdiagnosisDet($diagnosisID);
                                                //pr($diagnosisDet);
                                                $testDetail=$this->Custom->testAssigned($diagnosisDet['DiagnosysReport']['testid']);
                                       	?>
                                       <tr>
                                            <td><?php echo $cnt; ?>&nbsp;</td>
                                            <td><?php echo $patientDetail=$this->Custom->userDet($diagnosisDet['DiagnosysReport']['patientid']); ?>&nbsp;</td>
                                            <td><?php echo $doctorDetail=$this->Custom->userDet($diagnosisDet['DiagnosysReport']['doctorid']); ?>&nbsp;</td>
                                             <td><?php echo stripslashes($diagnosisDet['DiagnosysReport']['disease_name']); ?>&nbsp;</td>
                                             <td>
                                               <?php if( !empty($testDetail)){
                                                          $i=0;
                                                          $cnt=count($testDetail);
                                                          foreach($testDetail as $testDetails){$i++;
                                                              echo $testDetails;
                                                              if($i!=$cnt){
                                                                  echo "&nbsp;,&nbsp;";
                                                              }
                                                          }
                                                      }
                                                ?>   
                                             &nbsp;
                                             </td>
                                           <td><?php 
                                            if($reportDet['LabtestReport']['status'] == 1){
                                            echo $this->Html->link(__('Active'), array('action' => 'set_status_inactive_test', $reportDet['LabtestReport']['id']), array('style' => 'color:green;'));
                                            }else{
                                            echo $this->Html->link(__('In-Active'), array('action' => 'set_status_active_test', $reportDet['LabtestReport']['id']), array('style' => 'color:red;'));
                                            }
                                            ?></td>
                                            <td class="actions">

                                                <?php 
                                                    //echo $this->Html->link(__('Edit'), array('action' => 'edittest', $reportDet['UploadtestResult']['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'testdelete', $reportDet['LabtestReport']['id']), null, __('Are you sure you want to delete # %s?', $reportDet['LabtestReport']['id'])); ?>
                                                <a href="<?php echo $base_url; ?>Reports/downloadTest/<?php echo $reportDet['LabtestReport']['uploaded_file'];?>" target="_blank" >Download Report</a>
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

