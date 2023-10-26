<script type="text/javascript" src="<?php echo $base_url;?>js/ckeditor/ckeditor.js"></script>
<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Product</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Product', array('type' => 'file')); ?>
                <div class="box-body">
                   <?php echo $this->Form->input('id');?>
                 <?php echo $this->Form->input('title',array('label'=>'Product Title','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                 
                    <?php echo $this->Form->input('img',array('label' => 'Image','type' => 'file','onchange'=>'hideImg()', 'class' => 'form-control', 'div' => 'form-group'));?>
                    <div id='prev_img'><img src="<?php echo $this->webroot.'files/product/'.$this->request->data['Product']['img']?>" style="width:80px; height:80px" /></div>

                    <?php echo $this->Form->input('pdf',array('label' => 'Upload PDF','type' => 'file','onchange'=>'hideImg()', 'class' => 'form-control', 'div' => 'form-group'));?>
                    <?php if($this->request->data['Product']['pdf']!=""){?>
                        <a href="<?php echo $this->webroot.'files/product/'.$this->request->data['Product']['pdf'];?>" target="_blank">View Uploaded PDF</a>
                    <?php }?>    

                     <?php echo $this->Form->input('short_desc',array('label'=>'Short Description','type'=>'textarea', 'class' => 'form-control ckeditor', 'div' => 'form-group'));?>
                  <?php echo $this->Form->input('desc',array('label'=>'Description','type'=>'textarea', 'class' => 'form-control ckeditor', 'div' => 'form-group'));?>

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
