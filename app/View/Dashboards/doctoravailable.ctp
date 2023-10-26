<?php 
//$curDay= date("D");
$curday= strtolower(date("D"));
?>
<!--===================================Banner Section===================================-->

<?php echo $this->element('top-dashboard');?>
<!--===================================About Us Welcome===================================-->

<div class="logininnerpage">
    <div class="container">
        <div class="row">
     <!--===================Create Session And Join Session==========-->
	<div class="col-md-12">
         <div style="float:left;width:100%;text-align:right;margin-bottom:15px;">
           <div id="quedata" style="color:#FF8080"></div>
            <div id="quedata1" style="color:#FF8080; display:none;"></div>
            
        </div>
        
     </div>
     
<!--===================Create Session And Join Session==========-->   
<div class="col-md-12 logininnerpage2">
    <div class="row">
			<?php echo $this->element('left-dashboard');?>
           
           <!--===================================Profile Detail===================================-->
                          
                
                <div class="col-md-8 col-sm-8" id="avilabledoc">
                    <div class="row">
                    <?php
                        if(!empty($doctorAvailablelists)){//pr($doctorAvailablelists);
                            foreach($doctorAvailablelists as $doctorAvailablelists){
                        		$totaltiming='';
								$starttiming=$doctorAvailablelists['DoctorAvailability'][$curday.'_start_time'];
								$endtiming=$doctorAvailablelists['DoctorAvailability'][$curday.'_end_time'];
								if(!empty($starttiming) && !empty($endtiming)){
									$totaltiming=$starttiming.' to '.$endtiming;
								}else{
									$totaltiming='N/A';
								}
								 $passport_photo = $this->Custom->BapCustUniGetUserMeta($doctorAvailablelists['MasterUser']['id'], 'passport_photo');
								 if($passport_photo !=""){
									 $passport= $base_url.'files/passport/'.$passport_photo;
								 }else{
									 $passport= $base_url.'images/docmale.png';
								 }
								 /*===========Set Doctor Available Status(online,busy,idle)===========*/
									$checkconversastion=$this->Custom->checkDocConv($doctorAvailablelists['MasterUser']['id']);
									if($checkconversastion ==1){
										$statsImage=$base_url.'images/busy_icon.png';
									}else if($doctorAvailablelists['MasterUser']['idle_status']==0){
										$statsImage=$this->webroot.'images/idle_icon.png';
									}else{
										$statsImage=$this->webroot.'images/online_icon.png';
									}
								/*===========Set Doctor Available Status(online,busy,idle)===========*/
                    ?>
                        <div class="col-md-4 col-sm-4">
                        	<a href="javascript:void(0);" onclick="return check_available_fulltime_doctor(<?php echo $doctorAvailablelists['MasterUser']['id'] ; ?>);">
                            <div class="doctoravailable_box"><img src="<?php echo $statsImage;?>">
                                <img src="<?php echo $passport;?>" width="128px;" height="128px;">
                                <p><?php echo stripslashes(ucwords($doctorAvailablelists['MasterUser']['name']));?></p>
                                <p><?php echo 'Time: '.$totaltiming;?></p>
                            </div>
                            </a>
                        </div>
                    <?php } }?>
                    </div>
                    <hr>
                     <div class="row">
                     <?php
                        if(!empty($allregulardocs)){//pr($allregulardocs);
                            foreach($allregulardocs as $allregulardoc){
                            	$totaltiming='';
								$starttiming=$allregulardoc['DoctorAvailability'][$curday.'_start_time'];
								$endtiming=$allregulardoc['DoctorAvailability'][$curday.'_end_time'];
								$totaltiming=$starttiming.' to '.$endtiming;
								$passport_photo = $this->Custom->BapCustUniGetUserMeta($allregulardoc['MasterUser']['id'], 'passport_photo');
								 if($passport_photo !=""){
									 $passport= $base_url.'files/passport/'.$passport_photo;
								 }else{
									 $passport= $base_url.'images/docmale.png';
								 }
								
                    ?>
                    	<div class="col-md-4 col-sm-4">
                        	<!--<a href="javascript:void(0);" onclick="return set_appoint_fulltime_doc(<?php echo $allregulardoc['MasterUser']['id'] ; ?>);">-->
                            <div class="doctoravailable_box">
                                <img src="<?php echo $passport;?>" width="128px;" height="128px;">
                                <p><?php echo stripslashes(ucwords($allregulardoc['MasterUser']['name']));?></p>
                                <p><?php echo 'Time: '.$totaltiming ;?></p>
                            </div>
                            <!--</a>-->
                        </div>
                    <?php } }?>
                     </div>

                </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>

<script type="text/javascript">

function check_available_fulltime_doctor(docid){
		$.ajax({
			  type:"POST",
				   url:"<?php echo $base_url; ?>dashboards/check_fulltime_doctor_avail",
				   data:"doctorid="+docid,
				   success: function(data){
					  if(data==0){	//No patient is on que connect with doctor
					  	window.location='<?php echo $base_url;?>html/index2.php';
					  }else{
						  $('#quedata').html(data);
					  }
				   }
			 });
}
function set_appoint_fulltime_doc(docid){
		$.ajax({
			  type:"POST",
				   url:"<?php echo $base_url; ?>dashboards/set_appoint_advance_fulltimedoc",
				   data:"doctorid="+docid,
				   success: function(data){
						  $('#quedata').html(data);
				   }
			 });
}

function create_queue(docid){
	//alert(docid);
	$.ajax({
			  type:"POST",
				   url:"<?php echo $base_url; ?>dashboards/set_queue_patient",
				   data:"doctorid="+docid,
				   success: function(data){
					   //console.log(data);
					  if(data==0){	
					  	$('#quedata').html('<p>You are already in Queue !!!</p>');
					  }else if(data==1){
						$('#quedata').html('<p>You are in the Que Now !!Please have patience !!</p>'); 					 
					  }else if(data==2){
						$('#quedata').html('<p>Error While Creating the Queue!!! please Try Again !!</p>'); 					 
					  }
				   }
			 });
}

function create_queue_unavailable(docid){
	//alert(docid);
	$.ajax({
			  type:"POST",
				   url:"<?php echo $base_url; ?>dashboards/set_queue_patient_unavailable_doc",
				   data:"doctorid="+docid,
				   success: function(data){
					   //console.log(data);
					  if(data==0){	
					  	$('#quedata').html('<p>You are already in Queue !!!</p>');
					  }else if(data==1){
						$('#quedata').html('<p>You are in the Que Now !!Please have patience !!</p>'); 					 
					  }else if(data==2){
						$('#quedata').html('<p>Error While Creating the Queue!!! please Try Again !!</p>'); 					 
					  }
				   }
			 });
}


$(document).ready(function(){
			var checkAvailabledoc = function(){
			  $.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/check_available_doc",
				success:function(data){
				  //console.log(data);
				  $('#avilabledoc').html(data);
				}
			  });
			}
			setInterval(checkAvailabledoc,10000);
			//setInterval(check_connection,10000);
			setInterval(check_doc_connect,10000);
	});

/*function check_connection(){
		$.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/check_connected_patient",
				success:function(data){
				  //console.log(data);
				  	if(data==1){
						$('#quedata').css('display','none');
						$('#quedata1').css('display','block');
				  		 $('#quedata1').html('<p>Click Here to Start Conversastion</p><a href="<?php echo $base_url;?>html/index2.php" class="btn btn-info" id="create_session1" style="text-decoration:none;">Click Here</a>');
					}else if(data==0){
						$('#quedata1').html('');
						$('#quedata1').css('display','none');
						$('#quedata').css('display','block');
						}
				}
			  });
	}*/
/*==============Checking For Appointment ================*/	
function check_doc_connect(){
		$.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/check_doc_connect",
				success:function(data){
				  //console.log(data);
				  	/*if(data==1){
				  		 $('#quedata').html('<p>Click Here to Start Conversastion</p><a href="<?php echo $base_url;?>html/index2.php" class="btn btn-info" id="create_session1" style="text-decoration:none;">Click Herer</a>');
					}*/
					 $('#quedata').html(data);
				}
			  });
	}
/*==============Set Appointment For Queue Patient ================*/	
function set_connect_patient(id){
		$.ajax({
				method:'POST',
				url:"<?php echo $base_url; ?>dashboards/set_appoint_queue_patient",
				data:"id="+id,
				success:function(data){
				  //console.log(data);
				  	if(data==1){
				  		window.location='<?php echo $base_url;?>html/index2.php'; 
					}else{
					 	$('#quedata').html('<p style="color: red;">Error In Connecting!! Please Try Again !!</p>');
					}
				}
			  });
	}
</script>
