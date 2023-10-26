<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
function searchTxt()
{
	var searchtxt=$("#searchtxt").val();
	var blankchk=/\S/;
	if(!blankchk.test(searchtxt))
	{
		//$("#searchtxt").css("border-color","#F00");
		//return false;
		window.location="<?php echo $base_url;?>admin/Banners/";
	}
	else
	{
		window.location="<?php echo $base_url;?>admin/Banners/search/"+searchtxt;
	}
}
$( document ).ready(function() {
$('.bannerinput').keypress(function (e) {
  if (e.which == 13) {
    var searchtxt=$("#searchtxt").val();
	var blankchk=/\S/;
	if(!blankchk.test(searchtxt))
	{
		//$("#searchtxt").css("border-color","#F00");
		//return false;
		window.location="<?php echo $base_url;?>admin/Banners/";
	}
	else
	{
		window.location="<?php echo $base_url;?>admin/Banners/search/"+searchtxt;
	}
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
                                    <h3 class="box-title">Manage Banners</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text"  placeholder="Search Banner" name="searchtxt" id="searchtxt" class="form-control input-sm pull-right bannerinput" style="width: 150px;"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" name="searchbutn" id="searchbutn" onclick="return searchTxt();" ><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                       <tr>
			<th style="width:5%"><?php echo $this->Paginator->sort('banner_id','SL#'); ?></th>
			
			<th style="width:20%"><?php echo $this->Paginator->sort('banner_img', 'Image'); ?></th>
            <th style="width:20%"><?php echo $this->Paginator->sort('banner_title','Title'); ?></th>
			<th style="width:20%"><?php echo $this->Paginator->sort('banner_caption', 'Caption'); ?></th>
			<th style="width:20%"><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions" style="width:10%"><?php echo __('Actions'); ?></th>
	</tr>
										<?php
                                        if(!empty($banners))
                                        {
                                            $bannercount=1;
                                         foreach ($banners as $banner): ?>
                                        <tr>
                                            <td><?php echo $bannercount; ?>&nbsp;</td>
                                           
                                            <td><img src="<?php echo $base_url;?>/files/banner/<?php echo h($banner['Banner']['banner_img']); ?>" style="width:80px; height:80px" alt="<?php echo h($banner['Banner']['banner_title']); ?>" /> &nbsp;</td>
                                             <td><!-- <a href="<?php echo $base_url;?>admin/Banners/view/<?php echo $banner['Banner']['banner_id'];?>"><?php echo h($banner['Banner']['banner_title']); ?></a> -->
                                                <?php echo h($banner['Banner']['banner_title']); ?>
                                             &nbsp;</td>
                                            <td><?php echo h($banner['Banner']['banner_caption']); ?>&nbsp;</td>
                                            <td><?php echo date("d-m-Y",strtotime($banner['Banner']['created'])); ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $banner['Banner']['banner_id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $banner['Banner']['banner_id']), null, __('Are you sure you want to delete # %s?', $banner['Banner']['banner_title'])); ?>
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
