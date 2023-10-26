 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Create New Admin User</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('AdminUser'); ?>
                <div class="box-body">
                   <?php echo $this->Form->input('full_name',array('label'=>'Full Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('mail_id',array('label'=>'E-Mail ID','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('user_id',array('label'=>'User ID (Login ID)','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                    <?php echo $this->Form->input('pass',array('label'=>'Password','type'=>'password', 'class' => 'form-control', 'div' => 'form-group'));?>
                    <?php echo $this->Form->input('cnf_pass',array('label'=>'Confirm Password','type'=>'password', 'class' => 'form-control', 'div' => 'form-group'));?>
                    <?php echo $this->Form->input('is_active',array('default'=>'1', 'class' => 'form-control', 'div' => 'form-group'));?>
                    
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
