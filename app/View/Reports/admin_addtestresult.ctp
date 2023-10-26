<script type="text/javascript">
$(function() {
	
	$('#PatienttestReportTestType').change(function() {
        var test_type=$(this).val();
        var dataVal = "test_type="+test_type;
        $.ajax({
                   type:"POST",
                   url:"<?php echo $base_url;?>admin/Reports/getsubtest",
                   data:dataVal,
                   success: function(data){
                      $('#PatienttestReportSubTestType').html(data);
                      // console.log(data);
                   }
               });
    }); 	
});
</script>
<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Test Result</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('PatienttestReport'); ?> 
                <div class="box-body">
                 <?php echo $this->Form->input('doctorid',array('label'=>'Select Doctor','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $doctorList, 'required'=>'required','onchange' => 'return getpatient(this.value);'));?>
                 <?php echo $this->Form->input('patientid',array('label'=>'Select Patient','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'required'=>'required', 'options' => $patientList));?>
                  <?php echo $this->Form->input('test_type',array('label' => 'Select Test type', 'default'=>0, 'class' => 'form-control', 'div' => 'form-group', 'required'=>'required', 'options' => $testparentList));?>
                  <?php echo $this->Form->input('sub_test_type',array('label' => 'Select Sub Test',  'class' => 'form-control', 'div' => 'form-group','options' => array('0' => 'Select')));?>
                   <?php echo $this->Form->input('test_result',array('label'=>'Test Result', 'required'=>'required','type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                   <?php echo $this->Form->input('status', array('label' => 'Status', 'class' => 'form-control', 'div' => 'form-group','type' => 'select', 'options' => array('1','Publish','0' =>'Unpublish')));?> 
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
<script type="text/javascript">
function getpatient(doctorval){
  if(doctorval!=''){
    $.ajax({
      type: "POST",
      url: "<?php echo $base_url;?>admin/reports/getpatient/",
      data: "doctorval="+doctorval,
      success: function(data){
        if(data){
          $("#DiagnosysReportPatientid").html(data);
        }
      }
    });
  }
}
</script>