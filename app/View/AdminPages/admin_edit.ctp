<script src="<?php echo $this->webroot; ?>js/ckeditor/ckeditor.js"></script>

<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Pages</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
			<?php echo $this->Form->create('AdminPage'); ?>
                <div class="box-body">
               <?php 
			   
			   echo $this->Form->input('pid');
		echo $this->Form->input('page_name',array('type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));
        echo $this->Form->input('page_title',array('class' => 'form-control', 'div' => 'form-group'));
        echo $this->Form->input('page_desc',array('label'=>'Page Content','class'=>'ckeditor form-control', 'div' => 'form-group'));
        echo $this->Form->input('sor_desc',array('label'=>'Short Content','class'=>'form-control', 'div' => 'form-group'));
		echo $this->Form->input('meta_title',array( 'class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('meta_desc',array( 'class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('meta_keywords',array( 'class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('is_active',array( 'class' => 'form-control', 'div' => 'form-group'));
		
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



