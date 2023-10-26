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
            <?php echo $this->Form->create('Managetimeout', array('type' => 'file')); ?>
                
                <div class="box-body">
                <?php echo $this->Form->input('id');?>
                 
<?php //print_r($timeoutres);?>

                 <?php echo $this->Form->input('min_log_off_time',array('label'=>'LogOff Time (in minute)','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $timeoutres['Managetimeout']['min_log_off_time']));?>

                  <?php echo $this->Form->input('min_consultation_time',array('label'=>'Cunsultation Time (in minute)','type'=>'text', 'class' => 'form-control', 'div' => 'form-group', 'value' => $timeoutres['Managetimeout']['min_consultation_time']));?>


                 
                
               
                  </div>

                  <!-- /.box-body -->

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