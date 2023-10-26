
<?php
$loginID=$this->Session->read('loginID');
?>
<!--===================================Banner Section===================================-->

<?php echo $this->element('top-dashboard');?>
<!--===================================About Us Welcome===================================-->

<div class="logininnerpage">
    <div class="container">
        <div class="row">
        
<div class="col-md-12 logininnerpage2">
    <div class="row">
			<?php echo $this->element('left-dashboard');?>
           
           <!--===================================Profile Detail===================================-->
            <div class="col-md-8 col-sm-8">
                <?php echo $this->Session->flash(); ?>
                    <h2>Save Diagnosis</h2>
                                <?php echo $this->Form->create('DiagnosysReport'); ?> 
                    <div class="row">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Patient</label>
                            <?php echo $this->Form->input('patientid',array('label'=>false,'type'=>'select', 'class' => 'register_from_input', 'div' => false, 'options' => $patientList));?>
                        </div>  
                        
                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Disease Name</label>
                             <?php echo $this->Form->input('disease_name',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                        </div>  
                        <hr class="register_from_clear">
                        <div class="col-md-10 col-sm-6 register_formbox required">
                            <label class="register_from_name">Diagnosis Detail</label>
                             <?php echo $this->Form->input('diagnosys_detail',array('label'=>false,'type'=>'textarea', 'class' => 'register_from_input ckeditor', 'div' => false));?>
                        </div>

                        <hr class="register_from_clear">
                        <div class="col-md-10 col-sm-6 register_formbox required">
                            <label class="register_from_name">Assign Tests</label>
                             <?php echo $this->Form->input('testid',array('label'=>false,'type'=>'select','multiple' => 'multiple', 'class' => 'register_from_input', 'div' => false, 'options' => $testList));?>
                        </div>

                        <hr class="register_from_clear">
                        <div class="col-md-10 col-sm-6 register_formbox required">
                            <label class="register_from_name">Prescription Pad (For Pharmacy Use)</label>
                             <?php echo $this->Form->input('pharmacy_pad',array('label'=>false,'type'=>'textarea', 'class' => 'register_from_input ckeditor', 'div' => false));?>
                        </div>

                        

                        <hr class="register_from_clear">
                        <?php /*?><div class="col-md-7 col-sm-6 register_formbox required">
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th scope="col" id="showtxtbox">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Select Test</th>
                                          </tr>
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:15px;">
                                                <?php echo $this->Form->input('testid',array('name' => 'data[DiagnosysTest][testid][]', 'label' => false, 'default'=>0, 'class' => 'register_from_input', 'div' => false, 'options' => $testparentList));?>
                                            </th>
                                          </tr>
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Test Result</th>
                                          </tr>
                                          <tr>
                                            <th align="left" valign="middle" scope="col" style="padding-bottom:15px;">
                                                 <?php echo $this->Form->input('test_res',array('name' => 'data[DiagnosysTest][test_res][]', 'label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
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

                         <!--<hr class="register_from_clear">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Test Result</label>
                            <?php echo $this->Form->input('test_res',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                            
                        </div>-->
                        

                        <hr class="register_from_clear">
                        
                        <div class="col-md-6 col-sm-6 register_formbox">
                            <button class="allbtn4" type="submit"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
<script type="text/javascript">
/*function dothat()
{
	var count = $("#slider_count").val();
	if(count ==""){
		count=0;
	}
	//alert(count);
	count = parseInt(count) + 1;
	$("#slider_count").val(count);
	$("#showtxtbox").append('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="new_box' + count + '"><tr><th align="right" valign="middle" scope="col" style="padding-bottom:5px;"><input type="button" onclick="closeInfoDesc(' + count + ')" value="&times;" /></th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Select Test</th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:15px;"><select name="data[DiagnosysTest][testid][]" class="register_from_input" id="DiagnosysReportTestid"><?php foreach ($testparentList as $key => $value) {?><option value="<?php echo $key;?>"><?php echo $value;?></option><?php } ?></select></th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:5px;">Test Result</th></tr><tr><th align="left" valign="middle" scope="col" style="padding-bottom:15px;"><input name="data[DiagnosysTest][test_res][]" class="register_from_input" type="text" id="DiagnosysReportTestRes"></th></tr></table>');
}

function closeInfoDesc(num_val)
{
	var count = $("#slider_count").val();
	$("#new_box" + num_val).remove();
	$("#new_div" + num_val).remove();
}*/
</script>