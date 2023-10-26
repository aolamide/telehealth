<script type="text/javascript" src="<?php echo $base_url;?>js/ckeditor/ckeditor.js"></script>
 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add New Service Type</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
           <?php echo $this->Form->create('ServiceType', array('type' => 'file'));?>
                <div class="box-body">
                   <?php echo $this->Form->input('service_name',array('label'=>'Service Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>

                 <?php echo $this->Form->input('service_time',array('label'=>'Service Duration(min)','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'onkeypress' => 'return onlyNumberKey(event)'));?>
                  <?php echo $this->Form->input('service_desc',array('label'=>'Service Description','type'=>'textarea', 'class' => 'form-control ckeditor', 'div' => 'form-group'));?>
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


