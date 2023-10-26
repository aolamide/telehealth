<?php //$this->custom->
	$loginType=$this->Session->read('loginType');
	$loginId=$this->Session->read('loginID');
	$availabityTimeId=$this->Session->read('AvailabityTimeId');
	$sessionDetail=$this->Custom->appointmentSession($loginId,$availabityTimeId,$loginType);
	//pr($sessionDetail);
	if(!empty($sessionDetail)){
		$joinStats=$sessionDetail['Appointment']['join_status'];
	}else{
		$joinStats="";
		}
	if($loginType=='D'){
		$docType=$this->Custom->docType($loginId);
		//echo $docType;
	}
?>

<!--===================Create Session And Join Session==========-->
	<div class="col-md-12">
         <div style="float:left;width:100%;text-align:right;margin-bottom:15px;">
       		<div id="connect_patient" style="color:#FF8080"></div>
            <div id="session_result_create_ajax" style="display:none;">
            	<?php if($loginType=="P"){?>
                        	<p style="color:#060; font-weight:bold;">Waiting for doctor to join.<br> Please Have Patience !!!</p>
                        <?php } else if($loginType=="D"){?>
                        	<p style="color:#060; font-weight:bold;">patient Waiting  to join !!!</p>
                        <?php }?>
            	
            </div>
             <div id="session_result_join_ajax" style="display:none;">
            	<?php if($loginType=="P"){?>
                        	<p style="color:#060; font-weight:bold;">Doctor is available now. <a href="<?php echo $base_url;?>html" target="_blank" class="btn btn-info">click here to start consultation</a></p>
                        <?php } else if($loginType=="D"){?>
                        	<p style="color:#060; font-weight:bold;">patient is available now. <a href="<?php echo $base_url;?>html" target="_blank" class="btn btn-info">click here to start consultation</a></p>
                        <?php }?>
            	
            </div>
            
            <a href="javascript:void(0);" class="session_button" id="create_session" style="display:none; text-decoration:none;" onclick="return create_session();">Create Session</a>
            <a href="javascript:void(0);" class="session_button" id="join_session" style="display:none; text-decoration:none;" onclick="return join_session();">Join Session</a>
        
        </div>
     </div>
     
<!--===================Create Session And Join Session==========-->

<div class="col-md-3 col-sm-4 logininnerpage_leftmain">
            
                <!-- <h2>Register a patient </h2> -->
            
                <div class="logininnerpage_left">
              
                    <ul>
                        <li><a href="<?php echo $base_url; ?>dashboard/"<?php if($this->request->params['action']=='index'){?> class="active"<?php }?>>Dashboard</a></li>
                        <li><a href="<?php echo $base_url; ?>dashboards/ViewProfile" <?php if($this->request->params['action']=='ViewProfile'){?>class="active"<?php }?>>View Profile</a></li>
                        <li><a href="<?php echo $base_url; ?>dashboards/ChangePassword" <?php if($this->request->params['action']=='ChangePassword'){?>class="active"<?php }?>>Change Password</a></li>
                        <?php if($loginType=="D"){?>

                        	<?php if($docType==1){ //Full- Time Doctor?>	
                        		<li><a href="<?php echo $base_url; ?>dashboards/fulltimeavilability" <?php if($this->request->params['action']=='fulltimeavilability'){?>class="active"<?php }?>>Manage Availabity</a></li>
                        	<?php }else{?>
	                        	<li><a href="<?php echo $base_url; ?>dashboards/ManageAvailability" <?php if($this->request->params['action']=='ManageAvailability'){?>class="active"<?php }?>>Manage Availabity</a></li>
	                        <?php }?>

	                        <li><a href="<?php echo $base_url; ?>appdetails/editprofiledoctor" <?php if($this->request->params['action']=='editprofiledoctor'){?>class="active"<?php }?>>Edit Profile</a></li> 
	                        <li><a href="<?php echo $base_url; ?>dashboards/savediagnosys" <?php if($this->request->params['action']=='savediagnosys'){?>class="active"<?php }?>>Save Diagnosis</a></li>
	                        <li><a href="<?php echo $base_url; ?>dashboards/uploadtestlist" <?php if($this->request->params['action']=='uploadtestlist'){?>class="active"<?php }?>>Test Reports List</a></li>
	                        <li><a href="<?php echo $base_url; ?>dashboards/patienthistory" <?php if($this->request->params['action']=='patienthistory'){?>class="active"<?php }?>>View Patient History</a></li>

	                         <li><a href="<?php echo $base_url; ?>dashboards/selectdate" <?php if($this->request->params['action']=='selectdate'){?>class="active"<?php }?>>View Patients Attended</a></li>
                        <?php }?>
                         <?php if($loginType=="P"){?>
	                         <li><a href="<?php echo $base_url; ?>dashboards/EditProfilePatient" <?php if($this->request->params['action']=='EditProfilePatient'){?>class="active"<?php }?>>Edit Profile</a></li>
							 <li><a href="<?php echo $base_url; ?>dashboards/doctoravailable" <?php if($this->request->params['action']=='doctoravailable'){?>class="active"<?php }?>>Available Doctors </a></li>

	                        <li><a href="<?php echo $base_url; ?>dashboards/selectdoctor" <?php if($this->request->params['action']=='AddAppointment' || $this->request->params['action']=='selectdoctor' || $this->request->params['action']=='availabilitydate'){?>class="active"<?php }?>>Add Appointment</a></li> 
	                        <li><a href="<?php echo $base_url; ?>dashboards/ManageAppointment" <?php if($this->request->params['action']=='ManageAppointment'){?>class="active"<?php }?>>Manage Appointment</a></li>
	                        <li><a href="<?php echo $base_url; ?>dashboards/uploadtest" <?php if($this->request->params['action']=='uploadtest'){?>class="active"<?php }?>>upload Test result</a></li>
	                        <li><a href="<?php echo $base_url; ?>dashboards/uploadtestlist" <?php if($this->request->params['action']=='uploadtestlist'){?>class="active"<?php }?>>Test Reports List</a></li>
	                        <li><a href="<?php echo $base_url; ?>dashboards/diagnosyslist" <?php if($this->request->params['action']=='diagnosyslist'){?>class="active"<?php }?>>Diagnosis Report</a></li>
							 <!-- <li><a href="<?php //echo $base_url; ?>appdetails/feedback" <?php //if($this->request->params['action']=='feedback'){?>class="active"<?php //}?>>Feedback</a></li> -->
							  
	                        
                        <?php }?>
                        <?php if($loginType=='H'){?>
                        	<li><a href="<?php echo $base_url; ?>dashboards/editprofilehospital" <?php if($this->request->params['action']=='editprofilehospital'){?>class="active"<?php }?>>Edit Profile</a></li>
                        	<?php /*?><li><a href="<?php echo $base_url; ?>dashboards/selectdoctorhospital" <?php if($this->request->params['action']=='AddAppointment' || $this->request->params['action']=='selectdoctorhospital' || $this->request->params['action']=='availabilitydate'){?>class="active"<?php }?>>Add Appointment</a></li> 
	                        <li><a href="<?php echo $base_url; ?>dashboards/manageappointmenthospital" <?php if($this->request->params['action']=='manageappointmenthospital'){?>class="active"<?php }?>>Manage Appointment</a></li><?php */?>
	                        <li><a href="<?php echo $base_url; ?>dashboards/viewhospitaldoctors" <?php if($this->request->params['action']=='viewhospitaldoctors'){?>class="active"<?php }?>>View Doctors</a></li>
	                        <li><a href="<?php echo $base_url; ?>dashboards/viewhospitalpatients" <?php if($this->request->params['action']=='viewhospitalpatients'){?>class="active"<?php }?>>View Patients</a></li>
                        <?php }?>
                         
                         <?php if($loginType=='PH'){?>
                         <li><a href="<?php echo $base_url; ?>dashboards/selectPatientDoc" <?php if($this->request->params['action']=='viewPrescription'){?>class="active"<?php }?>>View Prescription</a></li>
                         <?php }?>

                         <?php if($loginType=='L'){?>
                         <li><a href="<?php echo $base_url; ?>dashboards/testReports" <?php if($this->request->params['action']=='testReports'){?>class="active"<?php }?>>View Tests Assigned</a></li>
                         <?php }?>

                    </ul>
                    
                </div>
            </div>
 <?php if(($loginType=='D' && $docType==0) ||$loginType =='P' ){?>           
<script type="text/javascript">
	/*============Create Session and Join Session================= */
		$(document).ready(function(){
			var callAjax = function(){
			  $.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/check_appointmnet_session",
				success:function(data){
				  //console.log(data);
				  if(data=="create"){ 
					$('#create_session').css('display','inline-block');
				  }else{
					$('#create_session').css('display','none');
				  }
				  if(data=="join"){
					 $('#join_session').css('display','inline-block');
				  }else{
					  $('#join_session').css('display','none');
				  }
				}
			  });
			}
			setInterval(callAjax,10000);
	});
	function create_session(){
		$.ajax({
			  type:"POST",
				   url:"<?php echo $base_url; ?>dashboards/create_session",
				   success: function(data){
					  // console.log(data);
					  if(data==1){
						  //$('div#thedialog').css('display','block');
						   //$('div#thedialog').dialog('open');
						  // $('#myModal').modal('show');
						  //setTimeout(function(){ $('#session_result_create_ajax').css('display','block'); }, 10000);
						  $('#create_session').css('display','none');
						  $('#session_result_create_ajax').delay(10000).css('display','block');
						  
					  }else{
						  //$('#session_result_create').css('display','none');
						  $('#session_result_create_ajax').css('display','none');
					  }
				   }
			 });
	}
	
	
	function join_session(){
		$.ajax({
			  type:"POST",
				   url:"<?php echo $base_url; ?>dashboards/join_session",
				   success: function(data){
					   //console.log(data);
					   if(data==1){
						   $('#session_result_create_ajax').css('display','none');
						  $('#join_session').css('display','none');
						    $('#session_result_join_ajax').delay(10000).css('display','block');
					   }else{
						    //$('#session_result_join').css('display','none');
							 $('#session_result_join_ajax').css('display','none');
					   }
				   }
			 });
	}
	
	$(document).ready(function(){
		//setInterval(join_session,1000);
		var checkSession = function(){
			  $.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/chk_session_stat",
				success:function(data){
				  //console.log(data);
				  if(data==1){
					  $('#session_result_create_ajax').css('display','block');
				  }else if(data==2){
					  $('#session_result_create_ajax').css('display','none');
					  $('#session_result_join_ajax').css('display','block');
				  }else if(data==3){
					  $('#session_result_create_ajax').css('display','none');
					  $('#session_result_join_ajax').css('display','none');
					  
				  }
				  else if(data==0){
					   $('#session_result_create_ajax').css('display','none');
					  $('#session_result_join_ajax').css('display','none');
				  }
				  
				}
			  });
			}
			setInterval(checkSession,10000);
	});

	/*============Create Session and Join Session================= */
</script>
<?php }?>
<?php if($loginType=='D' && $docType==1){?>
<script type="text/javascript">
$(document).ready(function(){
			var checkPatient = function(){
			  $.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/check_available_patient",
				success:function(data){
				  //console.log(data);
				  	if(data!=0){
				  		$('#connect_patient').html(data);
					}else{
						$('#connect_patient').html('');
					}
				}
			  });
			}
			setInterval(checkPatient,10000);
	});


function start_conv_patient(id){	//regular appointment id
		$.ajax({
			  type:"POST",
				   url:"<?php echo $base_url; ?>appdetails/start_conv_patient",
				   data:"id="+id,
				   success: function(data){ console.log(data);
					  if(data==0){	//No patient is on que connect with doctor
					  	window.location='<?php echo $base_url;?>html/index2.php';
					  }else{
						  $('#quedata').html('<p><Font color="red">Error In Starting Conversastion !! Please Try Again</Font></p>');
					  }
				   }
			 });
}
</script>
<?php }?>
<?php if($loginType=='D' && $docType==1){?>
<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    //var idleInterval = setInterval(timerIncrement, 1000); // 1 sec

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
	//console.log(idleTime);
	if(idleTime < 300){
		$.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/set_doctor_active",
				success:function(data){
				  //console.log(data);
				}
			  });
		
	}
    if (idleTime >= 300) { // 5 minutes
       // window.location.reload();
	   //alert('You are Idle');
	   $.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/set_doctor_idle",
				success:function(data){
				  //console.log(data);
				}
			  });
    }
	
}
</script>  
<?php }?>

