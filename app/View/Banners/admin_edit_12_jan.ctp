 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Banner</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Banner', array('type' => 'file')); ?>
                <div class="box-body">
                   <?php echo $this->Form->input('banner_id');?>
                 <?php echo $this->Form->input('banner_title',array('label'=>'Banner Title','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('banner_caption',array('label'=>'Caption','type'=>'textarea', 'class' => 'form-control', 'div' => 'form-group'));?>
                    <?php echo $this->Form->input('banner_img',array('label' => 'Image','type' => 'file','onchange'=>'hideImg()', 'class' => 'form-control', 'div' => 'form-group'));?>
                    <div id='prev_img'><img src="<?php echo $this->webroot.'files/banner/'.$this->request->data['Banner']['banner_img']?>" style="width:80px; height:80px" /></div>
                  <?php echo $this->Form->input('status', array('label' => 'Status', 'class' => 'form-control', 'div' => 'form-group','type' => 'select', 'options' => array('1','Publish','0' =>'Unpublish')));?>  
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->

      

    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <!-- /.box -->
    </div><!--/.col (right) -->
</div>   <!-- /.row -->
</section><!-- /.content -->
<script>
function hideImg(){
	$("#prev_img").attr('style','display:none');
	
	
	}
</script>
