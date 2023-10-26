<script type="text/javascript" src="<?php echo $base_url;?>js/ckeditor/ckeditor.js"></script>
<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Upload Test Report</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('UploadtestResult', array('type' =>'file','onsubmit'=>'return check_test_report_form();'));?> 
                <div class="box-body">
                 <?php echo $this->Form->input('doctorid',array('label'=>'Select Doctor','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $doctorList, 'onchange' => 'return getpatient(this.value);'));?>
                 <?php echo $this->Form->input('userid',array('label'=>'Select Patient','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $patientList));?>
             
                 <?php 
                    echo $this->Form->input('uploaded_file',array('label'=>'Upload Test Report','type'=>'file', 'class' => 'form-control','id'=>'uploaded_file', 'div' => 'form-group'));
                 ?>
                   <?php echo $this->Form->input('status', array('label' => 'Status', 'class' => 'form-control', 'div' => 'form-group','type' => 'select', 'options' => array('1'=>'Publish','0' =>'Unpublish')));?> 
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
          $("#UploadtestResultPatientid").html(data);
        }
      }
    });
  }
}
function check_test_report_form(){
    var fuData = document.getElementById('uploaded_file');
    var FileUploadPath = fuData.value;
    if(FileUploadPath != ''){
       var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
       //alert(Extension);
        if (Extension == "doc" || Extension == "docx" || Extension == "pdf" || Extension == "txt") {
            return true;
        }else{
          alert("Upload only file types of doc,pdf,docx and txt. ");
            return false;
          
        }
        
    } 
}
</script>
