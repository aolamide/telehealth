 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
               
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Sitesetting', array('type' => 'file')); ?>
                <div class="box-body">
                <?php echo $this->Form->input('id');?>
                 <?php echo $this->Form->input('logo_title',array('label'=>'Logo Title','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['logo_title']));?>
 				 <?php echo $this->Form->input('logo_image',array('label' => 'Logo Image','type' => 'file','class' => 'form-control', 'div' => 'form-group'));?>
                 <div id='prev_img'><img src="<?php echo $base_url.'files/site_logo/'.$settingres['Sitesetting']['logo_image'];?>" style="width:180px;" /></div>
                  <?php echo $this->Form->input('sml_logo_image',array('label' => 'Small Logo Image','type' => 'file','class' => 'form-control', 'div' => 'form-group'));?>
                 
                <div id='prev_img'>
                <img src="<?php echo $base_url.'files/site_logo/'.$settingres['Sitesetting']['sml_logo_image'];?>" style="width:100px;" /></div>
              <?php echo $this->Form->input('site_phone',array('label'=>'Site Phone','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['site_phone']));?>
               <?php echo $this->Form->input('site_email',array('label'=>'Site Email','type'=>'email', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['site_email']));?>
               <?php echo $this->Form->input('copyright',array('label'=>'copyright','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['copyright']));?>
                <?php echo $this->Form->input('meta_title',array('label'=>'Meta Title','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['meta_title']));?>
                <?php echo $this->Form->input('meta_desc',array('label'=>'Meta Description','type'=>'textarea', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['meta_desc']));?>
                <?php echo $this->Form->input('meta_keyword',array('label'=>'Meta Keyword','type'=>'textarea', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['meta_keyword']));?>
                <div class="form-group">
                    <h2>Contact Information</h2>
                </div>
                <?php echo $this->Form->input('contact_address',array('label'=>'Address','type'=>'textarea', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['contact_address']));?>
                <?php echo $this->Form->input('website',array('label'=>'Website','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['website']));?>
                <?php echo $this->Form->input('contact_map',array('label'=>'Map','type'=>'textarea', 'class' => 'form-control', 'div' => 'form-group', 'value' => $settingres['Sitesetting']['contact_map']));?>
                  </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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