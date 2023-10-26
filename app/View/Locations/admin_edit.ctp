<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Location</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
           		<?php echo $this->Form->create('Location'); ?>
                   <?php echo $this->Form->input('id');?>
                 <?php echo $this->Form->input('location_name',array('label'=>'Location Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
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
