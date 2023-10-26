<script type="text/javascript" src="<?php echo $base_url;?>js/ckeditor/ckeditor.js"></script>
 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Update Home Tab</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
           <?php echo $this->Form->create('Hometab', array('type' => 'file'));
           echo $this->Form->input('id');
           ?>
                <div class="box-body">
                   <?php echo $this->Form->input('title',array('label'=>'Title','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('content',array('label'=>'Description','type'=>'textarea', 'class' => 'form-control ckeditor', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('img',array('label'=>'Image','type'=>'file', 'class' => 'form-control', 'div' => 'form-group'));
                 if($this->request->data['Hometab']['img']!=''){
                 ?>
                  <img src="<?php echo $base_url;?>files/hometab/<?php echo $this->request->data['Hometab']['img'];?>" style="width:70px;" />
                <?php
					}
                 echo $this->Form->input('status',array('label'=>'Status','type'=>'select', 'options' => array(1=> 'Active', 0 => 'Inactive'), 'class' => 'form-control', 'div' => 'form-group'));?>
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


