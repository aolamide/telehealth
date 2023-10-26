<?php
 //$serchdate=date('Y-m-d',strtotime($serchdate));
?>
<section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Feedback Reports</h3>
                                    <div class="box-tools">
                                      </div>  
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
                                            <th><?php echo $this->Paginator->sort('id', 'SL#'); ?></th>
                                            <th><?php echo $this->Paginator->sort('user_id', 'Patient'); ?></th>
                                            <th><?php echo $this->Paginator->sort('doctorid','Doctor'); ?></th>
                                            <th><?php echo $this->Paginator->sort('rate','Rating (out of 5)'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created', 'Appointment Date'); ?></th>
                                            <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                       <?php 
                                            if(!empty($patientFeedbacks) && count($patientFeedbacks)>0){//pr($convReports);
                                                $cnt=0;
                                                foreach ($patientFeedbacks as $patientFeedback): $cnt++;
                                        ?>
                                       <tr>
                                            <td><?php echo $cnt; ?>&nbsp;</td>
                                            <td><?php echo $patientDetail=$this->Custom->userDet($patientFeedback['Feedback']['user_id']); ?>&nbsp;</td>
                                            <td><?php echo $docDetail=$this->Custom->userDet($patientFeedback['Feedback']['doctorid']); ?>&nbsp;</td>
                                             <td><?php echo h($patientFeedback['Feedback']['rate']); ?>&nbsp;</td>
                                           <td><?php echo h(date("d-m-Y",strtotime($patientFeedback['Feedback']['created']))); ?>&nbsp;</td>
                                           
                                            <td class="actions">

                                                <?php echo $this->Html->link(__('View'), array('action' => 'viewfeedback', $patientFeedback['Feedback']['id'])); ?>
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

<script type="text/javascript">
 $(".datepicker").datepicker({
			
			changeYear: true,
			changeMonth: true,
			maxDate : 0,
			dateFormat: 'yy-mm-dd',
			
	});
	
function enterSrch(e){
	//alert(e.which);
	if(e.which==13){
		searchTxt();
	}
}
function searchTxt(){
	var srchdate=$("#srchdate").val();
	var doc=$("#doctor_id").val();
	var url="<?php echo $this->webroot.'admin/Reports/fulltimeappointsearch/'; ?>";
	url+='srchdate:'+srchdate+'/doc:'+doc;
	window.location=url;
}
</script>	