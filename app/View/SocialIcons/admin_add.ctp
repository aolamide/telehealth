<script>
$( document ).ready(function() {
  //alert( "ready!" );
   
 function scrollUpToSucc()
{
jQuery('html, body').animate({
scrollTop: jQuery("#MasterUserFname").offset().top - 40}, 500);
}


$('#MasterUserAdminEditForm').submit(function(){
	var emailfield=$('#MasterUserEmailId').val();
	
	if(emailfield.trim()!=''){
	  var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
     if(!re.test(emailfield)){
		//alert("Please enter a valid email"); 
		$('#err_emailfield').html('<p style="color:red;padding-left:20px;">Please Enter A Valid email_id</p>');
		
		scrollUpToSucc();
		$('#MasterUserEmailId').focus();
		 return false;
		 }
		 else {
			 return (re.test(emailfield));
			 }
	}
	
	
	});
	
});

</script>
<!-- Main content -->
<section class="content">
<div class="row">
    <!--  left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Social Icon</h3>

            </div><!-- /.box-header -->
            <!-- form start -->
           
                <div class="box-body">
                    <a class="btn btn-info" href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Reference Icon Class</a>
                 <?php echo $this->Form->create('SocialIcon',array('enctype' => 'multipart/form-data')); ?>
                  <?php
				  echo $this->Form->input('social_name',array('class' => 'form-control', 'div' => 'form-group'));
                  //echo $this->Form->input('is_iamge',array('field','type' => 'radio','options' => array(1 => 'Image',0 => 'Icon Class'),'class' => 'form-control', 'div' => 'form-group'));?>
                  <div class="form-group">
                    <input type="radio" id="is_iamge" value='1' name="data[SocialIcon][is_iamge]" onclick="block_icon();" >
                    <label>Image</label> &nbsp;&nbsp;  
                    <input type="radio" id="is_icon" value='0' name="data[SocialIcon][is_iamge]" checked="checked" onclick="show_icon();">
                    <label>Icon Class</label>  
                  </div>
                  <div class="form-group" id="social_image" style="display:none;">
                    <?php echo $this->Form->input('social_img',array('label'=>'Social Image','type'=>'file','class' => 'form-control', 'required'=>'false'));?>
                  </div>
                  <div class="form-group" id="social_icon">
                    <?php echo $this->Form->input('social_icon',array('class' => 'form-control', 'div' => 'form-group','required'=>'false')); ?>
                  </div>
        		  <?php 
                  //echo $this->Form->input('social_img',array('label'=>'Social Image','type'=>'file','class' => 'form-control', 'div' => 'form-group'));
        		  echo $this->Form->input('social_link',array('class' => 'form-control', 'div' => 'form-group'));
        		  echo $this->Form->input('orderno',array('class' => 'form-control', 'div' => 'form-group'));
				  
		/*echo $this->Form->input('brand_name',array('class' => 'form-control', 'div' => 'form-group'));
		
		echo $this->Form->input('flag',array('options'=>@$brand,'label'=>'Parent','selected'=>0,'class' => 'form-control', 'div' => 'form-group'));
		$status=array('0'=>'Inactive','1'=>'Active');
		echo $this->Form->input('status',array('label'=>'Status','options'=>$status,'selected'=>1,'class' => 'form-control', 'div' => 'form-group'));*/
		//echo $this->Form->input('status');
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

