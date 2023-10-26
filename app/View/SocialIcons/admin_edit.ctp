<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Admin Edit Social Icon</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
			<?php echo $this->Form->create('SocialIcon',array('enctype' => 'multipart/form-data')); ?>
                <div class="box-body">
               <?php 
			   echo $this->Form->input('social_id');
				echo $this->Form->input('social_name',array('type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
				//echo $this->Form->input('social_img',array('type'=>'file','label'=>'Social Image', 'onchange'=>'changeImg(this.id)' ,'class' => 'form-control', 'div' => 'form-group'));

                $checkVal=$this->request->data['SocialIcon']['is_iamge'];
                if($checkVal==1){
                    $checked_image='checked="checked"';
                    $img_disp_style='';
                }else{
                   $checked_image='';
                   $img_disp_style='display:none;'; 
                }
                if($checkVal==0){
                    $checked_icon='checked="checked"';
                    $icon_disp_style='';
                }else{
                    $checked_icon='';
                    $icon_disp_style='display:none;';
                }

				?>
                <div class="form-group">
                    <input type="radio" id="is_iamge" value='1' name="data[SocialIcon][is_iamge]" <?php echo $checked_image;?>>
                    <label>Image</label> &nbsp;&nbsp;  
                    <input type="radio" id="is_icon" value='0' name="data[SocialIcon][is_iamge]" <?php echo $checked_icon;?>>
                    <label>Icon Class</label>  
                </div>
                <div class="form-group" id="social_image" style="<?php echo $img_disp_style;?>">
                    <?php echo $this->Form->input('social_img',array('label'=>'Social Image','type'=>'file','class' => 'form-control'));?>
                </div>
                <div class="form-group" id="social_icon" style="<?php echo $icon_disp_style;?>">
                 <a class="btn btn-info" href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Reference Icon Class</a>
                    <?php echo $this->Form->input('social_icon',array('class' => 'form-control', 'div' => 'form-group')); ?>
                </div>
				<div id="hid_div" style="<?php echo $img_disp_style;?>">
                <input type="hidden" name="hid_img" id="hid_img" value="<?php echo $this->request->data['SocialIcon']['social_img'];?>">
                <input type="hidden" name="prev_hid_img" id="hid_img" value="<?php echo $this->request->data['SocialIcon']['social_img'];?>">
                <?php if($this->request->data['SocialIcon']['social_img']!=""){?>
                <img src="<?php echo $this->webroot.'files/socialicon/'.$this->request->data['SocialIcon']['social_img']; ?>" style="width:32px;height:32px;">
                <?php }?>
                </div>
				<?php
				echo $this->Form->input('social_link',array('type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
				echo $this->Form->input('orderno',array('label'=>'Order No','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
		
			    ?>   
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
function changeImg(id){
	var img_name=$("#"+id).val();
	if(img_name!=''){
		$("#hid_img").val('');
		$("#hid_div").attr("style","display:none");
		}
	}
</script>

