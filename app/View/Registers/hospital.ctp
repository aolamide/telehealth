  <!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2>Hospital Registration - InHealth</h2>
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
                    <h2>Hospital Registration - InHealth</h2>
                    <?php echo $this->Session->flash(); ?>
            	    <?php echo $this->Form->create('Register', array('enctype' => 'multipart/form-data')); ?>     
                   
               		<div class="form_heading"> Personal Informations</div> 
                       
                     <div class="row">
                       <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Hospital Name</label>
                        <?php  echo $this->Form->input('hospital_name',array('label'=>false,'name' => 'data[Hospital][hospital_name]','type'=>'text', 'class' => 'register_from_input', 'div' => false, 'required'=>'required'));?>
                        </div>
        
        
                       <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Hospital Details/Location</label>
                        <?php echo $this->Form->input('hospital_detail',array('label'=>false,'name' => 'data[Hospital][hospital_detail]','type'=>'textarea', 'class' => 'register_from_input', 'div' => false, 'required'=>'required'));
                        ?>
                        </div>
                    </div>
            
            		 <hr class="register_from_clear">	
                    
                     <div class="row">
                        <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Hospital ID</label>
                        <?php echo $this->Form->input('hospital_id',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                        </div>
        
                        <div class="col-md-6 col-sm-6 register_formbox"><label class="register_from_name">Email Address</label>
                        <?php echo $this->Form->input('email_id',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'required' => 'required'));?>
                        </div>
                        
                    </div>
            
             		<hr class="register_from_clear">
            
                     <div class="row">
                         <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Hospital Logo</label>
                        <?php   echo $this->Form->input('hospital_logo',array('label'=>false, 'name' => 'data[attr_field][hospital_logo]','type'=>'file', 'class' => 'register_from_input', 'div' => false));?>
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
                   
                    <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Contact No</label>
                    <?php echo $this->Form->input('mobile_no',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false, 'onkeypress' => 'return onlyNumberKey(event);'));?>
                    </div>
                   <div class="col-md-6 col-sm-6 register_formbox required"><label class="register_from_name">Alternate Contact No</label>
                    <?php echo $this->Form->input('emrg_no',array('label'=>false,'type'=>'text', 'class' => 'register_from_input', 'div' => false));?>
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

                
<div class="col-md-4 col-sm-4 register_right">




    <div class="row">
    	<div class="col-md-12">
            <div class="register_right_box">
             	<h3>Benefits</h3> 
                 <ul>
                 	<li>General Health care </li>
                 	<li>General Health care</li>
                 	<li>General Health care</li>
                 	<li>General Health care</li>
                 	<li>General Health care</li>
                 	<li>General Health care</li>
                 </ul> 
            </div>
        </div>
    </div>
    
    



  <!--   <div class="row">
    	<div class="col-md-12">
            <div class="register_right_box2">
             	<h3>Category</h3> 
                 <ul>
                 	<li><a href="#">Hospital</a></li>
                 	<li><a href="#">Hospital</a></li>
                 	<li><a href="#">Lorem Ipsum is simply</a></li>
                 	<li><a href="#">Lorem Ipsum is simply</a></li>
                 	<li><a href="#">Hospital</a></li>
                 	<li><a href="#">Lorem Ipsum is simply</a></li>
                 	<li><a href="#">Hospital</a></li>
                 </ul> 
            </div>
        </div>
    </div> -->




    <div class="row">
    	<div class="col-md-12">
            <div class="register_right_box3">
             	<h3>Recent News</h3> 
                  <ul>
                
                	<li>
                    	<a href="#">
                    	<img src="<?php echo $base_url; ?>images/recent-news-pics1.jpg" alt="">
                    	</a>
                    	
						<div class="forumpage_rightbox_sec1">
                            <div class="forumpage_rightbox_sec1_main"><big><a href="#">Geometric Landscapes </a></big>
                           </div> 
                           		<small>October 20, 2015</small>
                        </div>
                    </li>
                	<li>
                    	<a href="#">
                    	<img src="<?php echo $base_url; ?>images/recent-news-pics2.jpg" alt="">
                    	</a>
                    	
						<div class="forumpage_rightbox_sec1">
                            <div class="forumpage_rightbox_sec1_main"><big><a href="#">Geometric Landscapes </a></big>
                           </div> 
                           		<small>October 20, 2015</small>
                        </div>
                    </li>
                	<li>
                    	<a href="#">
                    	<img src="<?php echo $base_url; ?>images/recent-news-pics3.jpg" alt="">
                    	</a>
                    	
						<div class="forumpage_rightbox_sec1">
                            <div class="forumpage_rightbox_sec1_main"><big><a href="#">Geometric Landscapes </a></big>
                           </div> 
                           		<small>October 20, 2015</small>
                        </div>
                    </li>
                	<li>
                    	<img src="<?php echo $base_url; ?>images/recent-news-pics1.jpg" alt="">
						<div class="forumpage_rightbox_sec1">
                            <div class="forumpage_rightbox_sec1_main"><big><a href="#">Geometric Landscapes </a></big>
                           </div> 
                           		<small>October 20, 2015</small>
                        </div>
                    </li>
                    
                    
                    
                    
                </ul>
            </div>
        </div>
    </div>





    
    
    
    
    
</div>


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