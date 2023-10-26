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
            <?php echo $this->Form->create('MasterLocation', array('type' => 'file')); ?>
                <div class="box-body">
                <?php echo $this->Form->input('location_id');?>
                 <?php echo $this->Form->input('country_id',array('label'=>'Select County','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $countyList, 'required' => 'required'));?>
 				 <?php echo $this->Form->input('location_name',array('label' => 'Locations','type' => 'text','class' => 'form-control', 'required' => 'required', 'div' => 'form-group'));?>
                 
           
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