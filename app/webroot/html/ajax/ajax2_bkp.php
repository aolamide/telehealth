<?php 
include("../includes/config.php");

function testDet($tstid=''){
	//echo "select * from test_masters where id='".$tstid."'" ."<br>";
	$testDets=mysql_query("select * from test_masters where id='".$tstid."'")or die(mysql_error());
	if(mysql_num_rows($testDets)>0){
		$testDet=mysql_fetch_assoc($testDets);
		return $testDet['test_name'];
	}
}

if(isset($_REQUEST['task']) && $_REQUEST['task'] == 'getSubtest')
{
    if($_REQUEST['test_type'] !=""){
    	$subTests=mysql_query("select id,test_name from test_masters where parent_id='".$_REQUEST['test_type']."' and status=1")or die(mysql_error());
    		echo "<option value=''>Select</option>";
    	while($subTestlists = mysql_fetch_assoc($subTests)){ ?>
    		<option value="<?php echo $subTestlists['id'];?>"><?php echo $subTestlists['test_name'];?></option>
    	<?php }
	}
}

if(isset($_REQUEST['task']) && $_REQUEST['task'] == 'testformSubmit')
{
	//print_r($_REQUEST);
		$doctorid=$_SESSION['doctorID'];
		$patientid=$_SESSION['patientID'];
		$created=date('Y-m-d H:i:s');
		$appoint_type=1;	//Regular appointment
		$appoint_id=$_SESSION['appoint_id'];

		if($_FILES['ecg']['name']!='')
		{	
			$original_path='../../files/vital_sign_reports/';
			$path = $_FILES['ecg']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$newimg=time()."-".$path;
			
			//move_uploaded_file($_FILES['ecg']['tmp_name'],$original_path.$newimg);
			move_uploaded_file($_FILES['ecg']['tmp_name'], $original_path.$newimg);
			
			
		}else{
			$newimg='';
		}

		$temperature=$_POST["temperature"];
		$blood_pressure=$_POST["blood_pressure"];
		$spo2=$_POST["spo2"];
		$heart_rate=$_POST["heart_rate"];
		$blood_glucose=$_POST["blood_glucose"];
		$body_mass=$_POST["body_mass"];
		$height=$_POST["height"];
		$blood_group=$_POST["blood_group"];
		$blood_type=$_POST["blood_type"];
		$ecg=$newimg;
		$symptoms=$_POST["symptoms"];

		$checkResultQuery="select * from vitalsign_result where doctorid='".$doctorid."' and patientid='".$patientid."' and appoint_type='".$appoint_type."' and appoint_id='".$appoint_id."' ";
		$checkResultsData=mysql_query($checkResultQuery);
		//echo $checkResultQuery;
		if(mysql_num_rows($checkResultsData)>0){
			$resultData=mysql_fetch_assoc($checkResultsData);
			$query = "update vitalsign_result set appoint_type='".$appoint_type."',appoint_id='".$appoint_id."',temperature='".$temperature."',blood_pressure='".$blood_pressure."',spo2='".$spo2."',heart_rate='".$heart_rate."',blood_glucose='".$blood_glucose."',body_mass='".$body_mass."',height='".$height."',blood_group='".$blood_group."',blood_type='".$blood_type."',ecg='".$ecg."',symptoms='".$symptoms."' where id='".$resultData['id']."'";
		}else{
			$query = "INSERT INTO vitalsign_result set doctorid='".$doctorid."',patientid='".$patientid."',appoint_type='".$appoint_type."',appoint_id='".$appoint_id."',temperature='".$temperature."',blood_pressure='".$blood_pressure."',spo2='".$spo2."',heart_rate='".$heart_rate."',blood_glucose='".$blood_glucose."',body_mass='".$body_mass."',height='".$height."',blood_group='".$blood_group."',blood_type='".$blood_type."',ecg='".$ecg."',symptoms='".$symptoms."', created='".$created."' ";
		}

		//echo $query;
		if(mysql_query($query)){
			echo 1;
		}else{
			echo 0;
		}


		
}

if(isset($_REQUEST['task']) && $_REQUEST['task'] == 'getTestresult')
{
	$doctorid=$_SESSION['doctorID'];
	$patientid=$_SESSION['patientID'];
	$appoint_id=$_SESSION['appoint_id'];
	$created=date('Y-m-d');
	$patientTestDetailsql="select * from vitalsign_result where doctorid='".$doctorid."' and patientid='".$patientid."' and appoint_type =1 and appoint_id='".$appoint_id."' and date(created)='".$created."'";
														
	$patientTestDet=mysql_query($patientTestDetailsql)or die(mysql_error());
	
	if(mysql_num_rows($patientTestDet)>0){
		while($patientTestDetails = mysql_fetch_assoc($patientTestDet)){ //print_r($patientTestDet);
                   //echo "";
				  $result= "<tr><th width='15%' height='27' align='left'>Temperature</th>
                        <td width='1%'>:</td>
    					<td>".stripslashes($patientTestDetails['temperature'])."</td>
                    </tr>
                     
                    <tr height='5px'><td colspan='3'></td></tr>
                    
                    <tr>
                        <th width='15%' height='27' align='left'>Blood Pressure</th>
                        <td width='1%'>:</td>
    					<td>
						".stripslashes($patientTestDetails['blood_pressure'])."</td>
                    </tr>
                     
                    <tr height='5px'><td colspan='3'></td></tr>
                    
                     <tr><th width='15%' height='27' align='left'>Spo2</th>
                        <td width='1%'>:</td>
    					<td>".stripslashes($patientTestDetails['spo2'])."</td>
                    </tr>

                    <tr>
                        <th width='15%' height='27' align='left'>Heart Rate</th>
                        <td width='1%'>:</td>
    					<td>
						".stripslashes($patientTestDetails['heart_rate'])."</td>
                    </tr>
                     
                    <tr height='5px'><td colspan='3'></td></tr>
                    
                     <tr><th width='15%' height='27' align='left'>Blood Gloucse</th>
                        <td width='1%'>:</td>
    					<td>".stripslashes($patientTestDetails['blood_glucose'])."</td>
                    </tr>

                    <tr>
                        <th width='15%' height='27' align='left'>Body Mass</th>
                        <td width='1%'>:</td>
    					<td>
						".stripslashes($patientTestDetails['body_mass'])."</td>
                    </tr>
                     
                    <tr height='5px'><td colspan='3'></td></tr>
                    
                     <tr><th width='15%' height='27' align='left'>Height</th>
                        <td width='1%'>:</td>
    					<td>".stripslashes($patientTestDetails['height'])."</td>
                    </tr>

                    <tr>
                        <th width='15%' height='27' align='left'>Blood Type</th>
                        <td width='1%'>:</td>
    					<td>
						".stripslashes($patientTestDetails['blood_type'])."</td>
                    </tr>
                     
                    <tr height='5px'><td colspan='3'></td></tr>
                    
                     <tr><th width='15%' height='27' align='left'>ECG</th>
                        <td width='1%'>:</td>
    					<td><a href='".SITEURL."/files/vital_sign_reports/".stripslashes($patientTestDetails['ecg'])."' target='_blank'>Click Here To View Report</a></td>
                    </tr>

                     <tr>
                        <th width='15%' height='27' align='left'>Symptoms</th>
                        <td width='1%'>:</td>
    					<td>
						".stripslashes($patientTestDetails['symptoms'])."</td>
                    </tr>
                     
                 
                   
				   
					";	
                echo $result;
                 }
	}
}

if(isset($_REQUEST['task']) && $_REQUEST['task'] == 'end_conversastion')
{
   $updatequery=mysql_query('update regular_appointments set is_conv=2 , is_connected=0 where id="'.$_SESSION['appoint_id'].'"')or die(mysql_error());
   if($updatequery){
	   echo 0;	
   }else{
	   echo 1;
   }
}

if(isset($_REQUEST['task']) && $_REQUEST['task'] == 'set_end_btn')
{
   $RegappointDet=mysql_query('select * from regular_appointments where id="'. $_SESSION['appoint_id'].'"')or die(mysql_error());
	if(mysql_num_rows($RegappointDet)>0){
		$appntDet=mysql_fetch_assoc($RegappointDet);
		 $conv_start_time=$appntDet['conv_start_time'];
			
		if($conv_start_time !=""){
			echo '<input type="button" class="btn-danger" name="end_button" value="End Conversation" onClick="return end_conversation();" style="border-radius:25px;padding: 8px 30px;display: inline-block;width: auto;font-size: 20px;margin-left: 10px;"><div class="end_msg"></div>';
		}
	}
}
				
   
