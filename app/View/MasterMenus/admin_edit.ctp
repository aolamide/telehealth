 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Menu</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('MasterMenu');
            	echo $this->Form->input('id');
             ?>
                <div class="box-body">
                   <?php echo $this->Form->input('menu_name',array('label'=>'Menu Name','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                   <?php echo $this->Form->input('assign_type',array('label'=>'Assign Type','type'=>'radio', 'id' => 'assigntype1', 'class' => 'form-control', 'div' => 'form-group', 'options' => array(0 => '&nbsp;&nbsp;Page&nbsp;&nbsp;', 1 => '&nbsp;&nbsp;Custom Link')));?>
                   <?php if($this->request->data['MasterMenu']['assign_type']==0){echo $this->Form->input('menu_link',array( 'class' => 'form-control', 'div' => 'form-group customerLink', 'options' => $pageList));}else{
                   	echo $this->Form->input('menu_link',array( 'type' => 'text', 'class' => 'form-control', 'div' => 'form-group customerLink'));
                   	}?>
                    <?php echo $this->Form->input('menu_position',array('class' => 'form-control', 'div' => 'form-group', 'options' => array('top' => 'Top', 'bottom' => 'Bottom','telehealth' => 'Telehealth Solution')));?>

                    <?php echo $this->Form->input('menu_parent',array('label' => 'Select Parent', 'class' => 'form-control', 'div' => 'form-group', 'options' => $menuparentList));?>

                     <?php echo $this->Form->input('ordering',array('label'=>'Order No','type'=>'number', 'class' => 'form-control', 'div' => 'form-group'));?>
                    
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


