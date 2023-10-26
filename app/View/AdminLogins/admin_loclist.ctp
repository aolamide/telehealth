<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
function searchTxt()
{
	var searchtxt=$("#searchtxt").val();
	var county_id=$("#county_id").val();
	var blankchk=/\S/;
	var url = new Array();
	if(blankchk.test(searchtxt))
	{
		//$("#searchtxt").css("border-color","#F00");
		//return false;
		url.push('srchtxt:'+searchtxt);
	}
	
	if(blankchk.test(county_id))
	{
		//$("#searchtxt").css("border-color","#F00");
		//return false;
		url.push('countyid:'+county_id);
	}
	var urlstring=url.join("/");
	window.location="<?php echo $base_url;?>admin/AdminLogins/loclist/"+urlstring;
}
$( document ).ready(function() {
$('.bannerinput').keypress(function (e) {
  if (e.which == 13) {
   var searchtxt=$("#searchtxt").val();
	var county_id=$("#county_id").val();
	var blankchk=/\S/;
	var url = new Array();
	if(blankchk.test(searchtxt))
	{
		//$("#searchtxt").css("border-color","#F00");
		//return false;
		url.push('srchtxt:'+searchtxt);
	}
	
	if(blankchk.test(county_id))
	{
		//$("#searchtxt").css("border-color","#F00");
		//return false;
		url.push('countyid:'+county_id);
	}
	var urlstring=url.join("/");
	window.location="<?php echo $base_url;?>admin/AdminLogins/loclist/"+urlstring;
    return false;    //<---- Add this line
  }
});
});
</script>
 <!-- Main content -->
 <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Locations</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text"  placeholder="Search location" name="searchtxt" id="searchtxt" class="form-control input-sm pull-right bannerinput" style="width: 150px;" value="<?php echo $srchtxt;?>"/>
                                            <select id='county_id'  class="form-control input-sm pull-right" style="width: 150px; margin-right:5px;" >
                                    <option value=''>-Select-</option>
                                    <?php
                                    foreach($options as $option){
                                        ?>
                                        <option value='<?php echo $option['MasterCountry']['country_id'];?>' <?php if($option['MasterCountry']['country_id']==$countyid && @$countyid!='') echo 'selected=selected';?>><?php echo $option['MasterCountry']['country_name'];?></option>
                                        <?php }?>
                                    </select>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" name="searchbutn" id="searchbutn" onclick="return searchTxt();" ><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
			<th style="width:5%"><?php echo $this->Paginator->sort('location_id','SL#'); ?></th>
			
			<th style="width:20%"><?php echo $this->Paginator->sort('country_id', 'County'); ?></th>
            <th style="width:20%"><?php echo $this->Paginator->sort('location_name','Location'); ?></th>
			<th class="actions" style="width:10%"><?php echo __('Actions'); ?></th>
	</tr>
										<?php
                                        if(!empty($locations))
                                        {
                                            $bannercount=1;
                                         foreach ($locations as $location): ?>
                                        <tr>
                                            <td><?php echo $bannercount; ?>&nbsp;</td>
                                           
                                            <td><?php echo $this->Custom->region_nm($location['MasterLocation']['country_id']); ?> &nbsp;</td>
                                             <td><?php echo $location['MasterLocation']['location_name'];?>&nbsp;</td>
                                           
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'editloc', $location['MasterLocation']['location_id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteloc', $location['MasterLocation']['location_id']), null, __('Are you sure you want to delete # %s?', $location['MasterLocation']['location_name'])); ?>
                                            </td>
                                        </tr>
                                    <?php 
                                    $bannercount++;
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
