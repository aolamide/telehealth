<script type="text/javascript" src="<?php echo $base_url;?>js/ckeditor/ckeditor.js"></script>
<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add New Diagnosis</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('DiagnosysReport'); ?> 
                <div class="box-body">
                 <?php echo $this->Form->input('doctorid',array('label'=>'Select Doctor','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $doctorList, 'onchange' => 'return getpatient(this.value);'));?>
                 <?php echo $this->Form->input('patientid',array('label'=>'Select Patient','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $patientList));?>
                 
                 <?php echo $this->Form->input('disease_name',array('label' => 'Disease Name','type' => 'text','onchange'=>'hideImg()', 'class' => 'form-control', 'div' => 'form-group'));?>
                 <?php echo $this->Form->input('diagnosys_detail',array('label' => 'Diagnosis Detail','type' => 'textarea','class' => 'form-control ckeditor', 'div' => 'form-group'));?>

                 <?php echo $this->Form->input('testid',array('label' => 'Assign Tests','type'=>'select','multiple' => 'multiple', 'class' => 'form-control', 'div' => 'form-group', 'options' => $testList));?>

                 <?php echo $this->Form->input('pharmacy_pad',array('label'=>'Prescription Pad (For Pharmacy Use)','type'=>'textarea', 'class' => 'form-control ckeditor', 'div' => 'form-group'));?>
                  
                  <?php /*?><div class="form-group">
                    
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th scope="col" id="showtxtbox">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Select Test</th>
                                          </tr>
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:15px;">
                                                <?php echo $this->Form->input('testid',array('name' => 'data[DiagnosysTest][testid][]', 'label' => false, 'default'=>0, 'class' => 'form-control', 'div' => 'form-group', 'options' => $testparentList));?>
                                            </th>
                                          </tr>
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Test Result</th>
                                          </tr>
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:15px;">
                                                 <?php echo $this->Form->input('test_res',array('name' => 'data[DiagnosysTest][test_res][]', 'label'=>false,'type'=>'text', 'class' => 'form-control', 'div' => 'form-group'));?>
                                            </th>
                                          </tr>
                                        </table>
                                      <input type="hidden" name="slider_count" id="slider_count" value="1" />
                                    </th>
                                    <tr>
                                        <td colspan="2">
                                        <input type="button" class="actionBtn" value="+Add More"  onclick="dothat();"/>
                                        </td>
                                     </tr>
                                  </tr>
                                </table>
                  </div><?php */?>
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
function dothat()
{
  var count = $("#slider_count").val();
  if(count ==""){
    count=0;
  }
  //alert(count);
  count = parseInt(count) + 1;
  $("#slider_count").val(count);
  $("#showtxtbox").append('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="new_box' + count + '"><tr><th align="right" valign="middle" scope="col" style="padding-bottom:5px;"><input type="button" onclick="closeInfoDesc(' + count + ')" value="&times;" /></th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Select Test</th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:15px;"><select name="data[DiagnosysTest][testid][]" class="form-control" id="DiagnosysReportTestid"><?php foreach ($testparentList as $key => $value) {?><option value="<?php echo $key;?>"><?php echo $value;?></option><?php } ?></select></th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Test Result</th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:15px;"><input name="data[DiagnosysTest][test_res][]" class="form-control" type="text" id="DiagnosysReportTestRes"></th></tr></table>');
}

function closeInfoDesc(num_val)
{
  var count = $("#slider_count").val();
  $("#new_box" + num_val).remove();
  $("#new_div" + num_val).remove();
}
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
