 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Properties</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
           <?php echo $this->Form->create('Theme');
		   echo $this->Form->input('theme_id');
		   $tagoption=array('' =>'Select', 'p' => 'Paragraph', 'a' => 'Anchor', 'li' => 'Listing', 'div' => 'Division', 'h1' => 'Heading 1', 'h2' => 'Heading 2', 'h3' => 'Heading 3', 'h4' => 'Heading 4', 'h5' => 'Heading 5', 'h6' => 'Heading 6', 'body' => 'Body', '*' => 'all');
		   $sizeoption=array('' =>'Select', '9px' => '9px', '10px' => '10px', '12px' => '12px', '14px' => '14px', '16px' => '16px', '18px' => '18px', '24px' => '24px', '36px' => '36px','small' =>'small', 'medium' => 'medium', 'large' => 'Large', 'smaller' => 'smaller', 'larger' => 'Larger');
		    ?>
                <div class="box-body">
                
                   <?php echo $this->Form->input('html_tag',array('label'=>'Select Tags','type'=>'select', 'options' => $tagoption, 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('font_size',array('label'=>'Font Size','type'=>'select', 'options' => $sizeoption, 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('font_color',array('label'=>'Font Color','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
<?php echo $this->Form->input('status',array('label'=>'Status','type'=>'select', 'options' => array(1=> 'Active', 0 => 'Inactive'), 'class' => 'form-control', 'div' => 'form-group'));?>
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
