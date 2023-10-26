<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Subscriber</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('NewsLetter'); ?>
                <div class="box-body">
                  <?php
				  echo $this->Form->input('news_letter_id');
		//echo $this->Form->input('news_name',array('class' => 'form-control', 'div' => 'form-group'));
		
		echo $this->Form->input('news_email',array('class' => 'form-control', 'div' => 'form-group'));
		$status=array('0'=>'Not Confirmed','1'=>'Confirmed');
		echo $this->Form->input('status',array('label'=>'Status','options'=>$status,'selected'=>1,'class' => 'form-control', 'div' => 'form-group', 'selected' => $this->request->data['NewsLetter']['status']));
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

