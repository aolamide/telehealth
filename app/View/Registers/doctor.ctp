  <!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2>Doctor Registration - InHealth</h2>
                <!-- <p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p> -->

       </div>
    </div>
</div></div>



<!--===================================Contact Form===================================-->


<div class="register_main">
    <div class="container">
        <div class="row">
                
                <div class="col-md-12"><div class="row">
                
                
                <div class="col-md-8 col-sm-8">
                    <h2>Doctor Registration - InHealth</h2>
                   <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->create('Register', array('enctype' => 'multipart/form-data')); ?>     
                   
               <div class="form_heading"> Personal Informations</div>    
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">First Name</label>
<?php echo $this->Form->input('fname',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>


                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Last Name</label>
                <?php echo $this->Form->input('lname',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>
            </div>
            
            <hr class="register_from_clear">	
                    
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Email Address</label>
                <?php echo $this->Form->input('email_id',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Date of Birth</label>
                <?php echo $this->Form->input('dob',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>
            </div>
            
            <hr class="register_from_clear">
            
             <div class="row">
               
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Gender</label>
               <!--  <input name="" type="radio" value="">&nbsp;Male&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="">&nbsp;Female -->
                <?php echo $this->Form->input('gender',array('label'=>false,'type'=>'select', 'options' => array('' => 'Select Gender', 1 => 'Male', 0 => 'Female'), 'class' => 'register_from_input', 'div' => false));?>
                </div>
                 <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Select Hospital</label>
                <?php  //echo $this->Form->input('hospital_name',array('label'=>false,'name' => 'data[Hospital][hospital_name]','type'=>'text', 'class' => 'register_from_input', 'div' => false));
                 echo $this->Form->input('hospitalid',array('label'=>false, 'name' => 'data[attr_field][hospitalid]','type'=>'select', 'options' => $hospitalList, 'class' => 'register_from_input', 'div' => false));
                ?>
                </div>
               
            </div>
             <hr class="register_from_clear">
            
             <div class="row">
               
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Passport Photo</label>
                <?php   echo $this->Form->input('passport_photo',array('label'=>false, 'name' => 'data[attr_field][passport_photo]','type'=>'file', 'class' => 'register_from_input', 'div' => false));?>
                </div>
               
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Upload CV</label>
               <!--  <input name="" type="radio" value="">&nbsp;Male&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="">&nbsp;Female -->
                <?php  echo $this->Form->input('doctor_cv',array('label'=> false, 'name' => 'data[attr_field][doctor_cv]','type'=>'file', 'class' => 'register_from_input', 'div' => false));?>
                </div>
            </div>
             <hr class="register_from_clear">
            
             <div class="row">
                 <div class="col-md-6 col-sm-6 register_formbox required">
                 <label class="register_from_name">Select Services</label>
               <!--  <input name="" type="radio" value="">&nbsp;Male&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="">&nbsp;Female -->
                <?php  //echo $this->Form->input('doctor_cv',array('label'=> false, 'name' => 'data[attr_field][doctor_cv]','type'=>'file', 'class' => 'register_from_input', 'div' => false));?>
                <?php 
                    echo $this->Form->input('servicetype',array('label'=>false, 'name' => 'data[AssignService][serviceid]','type'=>'select', 'multiple' => 'multiple', 'options' => $serviceList, 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));
                ?>
                </div>

                <div class="col-md-6 col-sm-6 register_formbox required">
                <label class="register_from_name">Select Type</label>
                <?php  
                    echo $this->Form->input('doc_type',array('label'=>false,'type'=>'select', 'options' => array( 0 => 'Specialist (Appointment Only)', 1 => 'Regular'), 'class' => 'register_from_input', 'div' => false));
                ?>
                </div>
                
               
            </div>

            
            <hr class="register_from_clear">	
              
 			<div class="form_heading"> Login Informations</div>

              <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">User Name</label>
                	<?php echo $this->Form->input('user_name',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Password</label>
                <?php  echo $this->Form->input('user_pass',array('label'=>false,'type'=>'password', 'class' => 'register_from_input', 'div' => false));?>
                </div>
            </div>
            
            <hr class="register_from_clear">	
                    
                   
              <div class="form_heading"> Contact Informations</div>   
              <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Address</label>
                <?php echo $this->Form->input('address',array('label'=>false, 'name' => 'attr_field[address]', 'required' => 'required','type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
                </div>
                <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Mobile No</label>
                <?php echo $this->Form->input('mobile_no',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'onkeypress' => 'return onlyNumberKey(event);'));?>
                </div>
               
                 
            </div>
            
            
            
            <hr class="register_from_clear">
                   
                 
              <div class="row">
               <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Zip Code</label>
                <?php echo $this->Form->input('zipcode',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'onkeypress' => 'return onlyNumberKey(event);'));?>
                </div>

            </div>
            
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><?php //echo SECURITYCODE;?><label class="register_from_name">Enter Code</label>
                	<table width="100%" border="0">
                      <tr>
                        <td width="30%"><img src="<?php echo $this->webroot;?>captcha/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ></td>
                        <td width="20%" align="center"><a href='javascript: refreshCaptcha();'>
								<img src="<?php echo $this->webroot;?>img/captcha.png" style="top: 5px;position: relative;margin-left: 5px;" alt="">
							</a></td>
                        <td width="50%"><?php echo $this->Form->input('captcha_text',array('label'=>false, 'type'=>'text', 'class' => 'register_from_input', 'div' => false));?></td>
                      </tr>
                    </table>
                </div>
            </div> 
            
             <hr class="register_from_clear">
              
           <hr class="register_from_clear">    
              
             <div class="row">
                <div class="col-md-6 col-sm-6 register_formbox"><button class="allbtn4" type="submit">Submit</button></div>
            </div> 
                    
                
                
                </form>    
                    
                </div>
                


<!--==========================Right Section===========================-->

<?php echo $this->element('front-inner');?>

</div></div>



       </div>
    </div>
</div>
<script type="text/javascript">

	function refreshCaptcha(){
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	}

$(document).ready(function(){
$('#reload').click(function() {
          var captcha = $("#captcha_image");
           captcha.attr('src', captcha.attr('src')+'?'+Math.random());
          return false;
      });
});

	$(document).ready(function() {
		$("#sho").css("display", "none");
	});
	function chk_but(){
		if($("#trms").is(':checked'))
			$("#sho").css("display", "block"); // checked
			//$("#sho").attr('disabled','disabled');
		else
			$("#sho").hide(); 
	}

	function location_list(id){ 
		if(id){
			jQuery.ajax({
				type: "POST",
				url: "<?php echo $this->webroot.'MasterUsers/add/'?>",
				data: {"c_id":id},
				success: function(data){ 
				//alert(data);
					if(data != ''){ 
					//alert(data);
					   var listItems = "<select id='MasterUserLocalityId' name='data[MasterUser][locality_id]' class='form-control'>";
						/*$.each(data, function(key, value) {
							//console.log(key);console.log(value);
							listItems+= "<option value='" + key + "'>" + value + "</option>";
							alert(listItems);
						});*/
						listItems+=data;
						listItems+="</select>";
						//alert(listItems);
						$("#old_location").css("display", "none");
						$("#hh").html(listItems);
					}else{ 
						$("#hh").html('');
						$("#old_location").css("display", "block");
						$("#MasterUserLocalityId").css("display", "none");
					}
				}
			});
		}else{
			$("#hh").html('');
			$("#old_location").css("display", "block");
			$("#MasterUserLocalityId").css("display", "none");
		}
	}
	$('body').on('click', function(){ 
      var pas = $("#pwd").val(); 
	  var rpas = $("#rpwd").val();
	  if(pas && rpas){ 
		if(pas === rpas){
			$("#err_confpaw").html('');
		}else{
			$("#err_confpaw").html('Password and conformpassword should same.');
		}
		
	 }
    });
	
	
	function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : evt.keyCode; 
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
         return true;
    }
	
	function isAlphabet(e){
		var kc=(e.which) ? e.which : e.keyCode; 
		// 97->a 122->z 65->A 90->Z
		if(!((kc>=65 && kc <=90 )|| (kc >= 97 && kc <= 122) ) && kc!=8) {//alert(kc)
		e.preventDefault();
        }
	}
	 
	function chkPasslen(){
       var pass=$("#pwd").val().trim();
       if(pass){
       var len=pass.length;
        if(len<6){
         $("#pwd").val('');
        $("#err_msg_pass").removeAttr("style");
        }else{
         $("#err_msg_pass").attr("style","display:none");
       }
      }else{
       $("#pwd").val('');
      }
   }
   function chkEmail(){
   var email=$("#MasterUserEmail").val();
   var partn="^[a-z0-9._-]+@[a-z0-9]+\.[a-z]{2,6}$";
   var is_avl=email.match(partn);
   if(!is_avl){
     $("#MasterUserEmail").val('');
     $("#err_msg_email").removeAttr("style");
    }else{
      $("#err_msg_email").attr("style","display:none");
    }
  }
 
  $(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').on('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
	}); 
	return false;
	});
});
	
</script>