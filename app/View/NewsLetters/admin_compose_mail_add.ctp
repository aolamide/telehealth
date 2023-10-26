<script type="text/javascript" src="<?php echo $base_url;?>js/ckeditor/ckeditor.js"></script>
<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Compose Mail</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('NewsletterTemplate'); ?>
                <div class="box-body">
                <label><input type="radio" name="data[NewsletterTemplate][user_type]" id="news_user_type" class="news_user_type" value="3" checked="checked" />&nbsp;Subscriber</label>&nbsp;&nbsp;
                <!-- <label><input type="radio" name="data[NewsletterTemplate][user_type]" id="news_user_type" class="news_user_type" value="1" />&nbsp;Buyer</label>&nbsp;&nbsp;
                <label><input type="radio" name="data[NewsletterTemplate][user_type]" id="news_user_type" class="news_user_type" value="2" />&nbsp;Seller</label> -->
                 <span id="brandappend"></span>
                  <?php
		echo $this->Form->input('mail_subject',array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
		echo $this->Form->input('mail_body',array('label' => 'Mail Body(<i>To dynamically retrive the user name use code:</i> {Name})','class' => 'form-control ckeditor', 'div' => 'form-group'));
		$status=array('0'=>'Inactive','1'=>'Active');
		echo $this->Form->input('compose_status',array('label'=>'Status','options'=>$status,'selected'=>1,'class' => 'form-control', 'div' => 'form-group'));
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

