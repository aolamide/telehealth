<?php
$menu='';
	class CustomHelper extends AppHelper {
		/*
		Total Notice
		*/
		public function totalNotice($noticetype='')
		{
			App::import('Model','Notice');
			$Notice=new Notice();
			if($noticetype!='')
			{
				$totnotice=$Notice->find('count', array('conditions' => array('Notice.status' => 0, 'user_id' => 0, 'Notice.notice_type' => $noticetype)));
			}
			else
			{
				$totnotice=$Notice->find('count', array('conditions' => array('Notice.status' => 0, 'user_id' => 0)));
			}
			return ($totnotice);
		}
		/*
		Get User Meta Data
		*/
		public function BapCustUniGetUserMeta($userid='', $metakey=''){
			App::import('Model', 'UserMeta');
			$UserMeta= new UserMeta();
			$UserMetaRes=$UserMeta->find('first', array('conditions' => array('user_id' => $userid, 'meta_key' => $metakey)));	
			return (@$UserMetaRes['UserMeta']['meta_value']);
		}
		/*
		Get state Data By Country
		*/
		public function BapCustUniGetStateByCountry($countryID=''){
			App::import('Model', 'MasterState');
			$MasterState= new MasterState();
			$MasterStateRes=$MasterState->find('list', array('conditions' => array('country_id' => $countryID)));	
			return ($MasterStateRes);
		}
		/*
		Get hospital BY hospital ID
		*/
		public function BapCustUniGethospitalByID($hospitalID=''){
			App::import('Model', 'Hospital');
			$Hospital= new Hospital();
			$HospitalDetail=$Hospital->find('first', array('conditions' => array('id' => $hospitalID)));	
			return ($HospitalDetail);
		}

		/*
		generate short content of data
		Author: Rajesh
		Date:14th Dec 2015
		*/
		public function getShortContent($char,$content)
		{
		  $prg_details=strip_tags(stripslashes($content));
		  $pp_details=substr($prg_details,0,$char);
		  if(strlen($content)>$char)
		  {
			  $blg_1 = explode(' ',str_replace($pp_details,'',$prg_details));
			  $pp_details.=$blg_1[0].'...';
		  }
		  return $pp_details;
		}
		/*
		Menu by ID
		Author: Chittaranjan Sahoo
		Date: 16th Dec 2015
		*/ 
		public function BapCustUnimenuByID($id='')
		{
		  App::import('Model', 'MasterMenu');
			$MasterMenu= new MasterMenu();
			$menuDetail=$MasterMenu->find('first', array('conditions' => array('id' => $id)));	
			return ($menuDetail);
		}
		/*
		Page by ID
		Author: Chittaranjan Sahoo
		Date: 16th Dec 2015
		*/ 
		public function BapCustUniPageByID($id='')
		{
		  App::import('Model', 'AdminPage');
			$AdminPage= new AdminPage();
			$pageDetail=$AdminPage->find('first', array('conditions' => array('pid' => $id)));	
			return ($pageDetail);
		}
		/*
		Nav Menu Generation
		Author: Chittaranjan Sahoo
		Date: 16th Dec 2015
		*/ 
		public function BapCustUniNavMenu($parent=0, $location='', $pageID='', $basePath='', $cleanMenu=0, $startTag="<ul>", $endtag="</ul>")
		{
			global $menu;
			if($cleanMenu==1){$menu='';}
		  App::import('Model', 'MasterMenu');
			$MasterMenu= new MasterMenu();
			$menuRes=$MasterMenu->find('all', array('order' => array('ordering' => 'asc'), 'conditions' => array('menu_position' => $location, 'menu_parent' => $parent)));	
				
			if(!empty($menuRes)){
				$menu.=$startTag;
				foreach($menuRes as $menuRsult){
					$assignType= $menuRsult['MasterMenu']['assign_type'];
					$menu_link= $menuRsult['MasterMenu']['menu_link'];
					$menu_name= stripslashes($menuRsult['MasterMenu']['menu_name']);
					$parentID= stripslashes($menuRsult['MasterMenu']['id']);
					//echo $pageID." ".$menu_link;
					$menuActive=($pageID==$menu_link)?' class="active"':'';
					if($assignType==1){
						$linkURL=$menu_link;
					}else{
						$pageDetail = $this->BapCustUniPageByID($menu_link);
						if($menu_link==8){
							$linkURL=$basePath."contact/";
						}else{
						$linkURL=$basePath."pages/".$pageDetail['AdminPage']['page_slug'];
					}

					}
					$menu.='<li><a href="'.$linkURL.'"'.$menuActive.'>'.$menu_name.'</a>';
					$this->BapCustUniNavMenu($parentID, $location, $pageID, $basePath);
					$menu.='</li>';
				}
				$menu.= $endtag;
			}
			return $menu;
		}
		
		
		
		/*
		list Assigned Services To doctor
		Author: Rajesh
		Date:18th Dec 2015
		*/
		public function serviseAssigned($userid='')
		{
		 	App::import('Model', 'AssignService');
		 	App::import('Model', 'ServiceType');
			$AssignService= new AssignService();
			$ServiceType= new ServiceType;
			$serviceTypDet=array();
			$serviceDetail=$AssignService->find('all', array('conditions' => array('userid' => $userid)));	
			//return ($serviceDetail);
			if(!empty($serviceDetail)){
				foreach($serviceDetail as $services){
					$serviceID=$services['AssignService']['serviceid'];
					$serviceTypeDetail=$ServiceType->find('all',array('conditions'=>array('id'=>$serviceID)));
					//pr($serviceTypeDetail);
					//echo $serviceTypeDetail[0]['ServiceType']['service_name'];
					array_push($serviceTypDet, $serviceTypeDetail[0]['ServiceType']['service_name']);
				}
			}
			return $serviceTypDet;
		}
		/*
		Get Doctor BY  ID
		Author: Rajesh
		Date:21st Dec 2015
		*/
		public function GetDoctorById($doctorId=''){
			App::import('Model', 'MasterUser');
			$MasterUser= new MasterUser();
			$HospitalDetail=$MasterUser->find('first', array('conditions' => array('id' => $doctorId,'login_tytpe' => 'D')));	
			return ($HospitalDetail);
		}

		/*
		list services Appointed
		Author: Rajesh
		Date:21st Dec 2015
		*/
		public function serviceApponint($id='')
		{
		 	App::import('Model', 'Appointment');
		 	App::import('Model', 'ServiceType');
			$Appointment= new Appointment();
			$ServiceType= new ServiceType;
			$serviceTypDet=array();
			$ServiceIds= explode(',',$id);
			//return ($serviceDetail);
			if(!empty($ServiceIds)){
				foreach($ServiceIds as $serviceID){
					$serviceTypeDetail=$ServiceType->find('all',array('conditions'=>array('id'=>$serviceID)));
					//pr($serviceTypeDetail);
					//echo $serviceTypeDetail[0]['ServiceType']['service_name'];
					array_push($serviceTypDet, $serviceTypeDetail[0]['ServiceType']['service_name']);
				}
			}

			return $serviceTypDet;
		}

		/*
		list services Appointed
		Author: Rajesh
		Date:25th Feb 2016
		*/
		public function testAssigned($id=0)
		{
		 	App::import('Model', 'DiagnosysReport');
		 	App::import('Model', 'TestMaster');
			$TestMaster= new TestMaster();
			$DiagnosysReport= new DiagnosysReport;
			if($id !=0){
				$testTypDet=array();
				$testIds= explode(',',$id);
				//return ($serviceDetail);
				if(!empty($testIds)){
					foreach($testIds as $testId){
						$testTypeDetail=$TestMaster->find('all',array('conditions'=>array('id'=>$testId)));
						//pr($testTypeDetail);
						//echo $serviceTypeDetail[0]['ServiceType']['service_name'];
						array_push($testTypDet, $testTypeDetail[0]['TestMaster']['test_name']);
					}
				}

				return $testTypDet;
			}
			
		}
		/*
		Location Detail
		Author: Rajesh
		Date:21st Dec 2015
		*/
		public function locationDet($id='')
		{
		 	App::import('Model', 'Location');
		 	$Location= new Location();
		 	$locationDet=$Location->find('first',array('conditions'=>array('id'=>$id)));
		 	return (@$locationDet['Location']['location_name']);
		}

		/*
		patient Detail
		Author: Rajesh
		Date:21st Dec 2015
		*/
		public function userDet($id='')
		{
		 	App::import('Model', 'MasterUser');
		 	$MasterUser= new MasterUser();
		 	$userDet=$MasterUser->find('first',array('conditions'=>array('id'=>$id)));
		 	return (@$userDet['MasterUser']['fname']." ".$userDet['MasterUser']['lname']);
		}
		
		/*
		Appointment time Detail
		Author: Rajesh
		Date:21st Dec 2015
		*/
		public function AppointmentTimeDet($id='')
		{
		 	App::import('Model', 'DoctorAvailability');
		 	$DoctorAvailability= new DoctorAvailability();
		 	$timeDetail=$DoctorAvailability->find('first',array('conditions'=>array('id'=>$id)));
		 	return (@$timeDetail['DoctorAvailability']['start_time']."-".@$timeDetail['DoctorAvailability']['end_time']);
		}

		/*
		Appointment time Detail
		Author: Rajesh
		Date:21st Dec 2015
		*/
		public function AppointmentTimeDetail($id='')
		{
		 	App::import('Model', 'DoctorAvailability');
		 	$DoctorAvailability= new DoctorAvailability();
		 	$timeDetail=$DoctorAvailability->find('first',array('conditions'=>array('id'=>$id)));
		 	return (@$timeDetail['DoctorAvailability']['name']);
		}

		/*
		Appointment time Detail
		Author: Rajesh
		Date:19th Feb 2016
		*/
		public function AppointmentTimeAvailDet($id='')
		{
		 	App::import('Model', 'DoctoravailableSlot');
		 	$DoctoravailableSlot= new DoctoravailableSlot();
		 	$timeDetail=$DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$id)));
		 	return (@$timeDetail['DoctoravailableSlot']['start_time']."-".@$timeDetail['DoctoravailableSlot']['end_time']);
		}

		/*
		Appointment time Detail
		Author: Rajesh
		Date:19th Feb 2016
		*/
		public function AppointmentTimeAvailDetail($id='')
		{
		 	App::import('Model', 'DoctoravailableSlot');
		 	$DoctoravailableSlot= new DoctoravailableSlot();
		 	$timeDetail=$DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$id)));
		 	return (@$timeDetail['DoctoravailableSlot']['fulltime']);
		}

		/*
		Appointment time Detail
		Author: Rajesh
		Date:21st Dec 2015
		*/
		public function CheckAppointmnetSession($id='')
		{
		 	App::import('Model', 'MasterUser');
		 	App::import('Model', 'Appointment');
		 	App::import('Model', 'DoctorAvailability');
		 	$MasterUser= new MasterUser();
		 	$Appointment= new Appointment();
		 	$DoctorAvailability= new DoctorAvailability();
		 	$cur_date=date('Y-m-d');
		 	//$session_appointment= array();

		 	//date_default_timezone_set('Asia/Calcutta');
		 	 $cur_time=date("H:i:s");
		 	$userDetail=$MasterUser->find('first',array('conditions'=>array('id'=>$id)));
		 	if($userDetail['MasterUser']['is_online']==1){	//Check For Login Status
		 		$userType=$userDetail['MasterUser']['login_tytpe'];
		 		if($userType=="D"){		//Doctor login
		 			 
		 			 $AppointmentDetatils=$Appointment->find('all',array('conditions'=>array('doctorid'=>$id , 'appointment_date'=>$cur_date ,'status'=>1)));
		 			 if(!empty($AppointmentDetatils) && count($AppointmentDetatils)>0){	//Check Whether Doctor is available for that day		 			 	
		 			 	foreach($AppointmentDetatils as $AppointmentDetatil){
		 			 		 $AvailabityId=$AppointmentDetatil['Appointment']['appointment_availbility'];
		 			 		 $checkAvailabity=$DoctorAvailability->find('first', array('conditions' => array('id'=>$AvailabityId,'doctor_id' => $id,'status' => 1,'start_time <='=>$cur_time,'end_time >='=>$cur_time
				, 'date(app_date)'=>$cur_date )));
							//pr($checkAvailabity);	
		 			 		 if(!empty($checkAvailabity)){	//Check the time for Appointment
		 			 		 	//$session_appointment_staus='true';
		 			 		 	$session_status_type=$AppointmentDetatil['Appointment']['session_status_type'];
		 			 		 	if($session_status_type==NULL){
		 			 		 		$session_appointment_staus="create";
		 			 		 	}else if($session_status_type=='P'){
		 			 		 		$session_appointment_staus="join";
		 			 		 	}
		 			 		 }
		 			 	}
		 			 }else{
		 			 	$session_appointment_staus='false';	//No Appointment For that Day
		 			 }
		 		}else{	//patient login
		 			$AppointmentDetatils=$Appointment->find('all',array('conditions'=>array('patientid'=>$id , 'appointment_date'=>$cur_date ,'status'=>1)));
		 			 if(!empty($AppointmentDetatils) && count($AppointmentDetatils)>0){	//Check Whether Doctor is available for that day		 			 	
		 			 	foreach($AppointmentDetatils as $AppointmentDetatil){
		 			 		 $AvailabityId=$AppointmentDetatil['Appointment']['appointment_availbility'];
		 			 		 $doc_id=$AppointmentDetatil['Appointment']['doctorid'];
		 			 		 $checkAvailabity=$DoctorAvailability->find('first', array('conditions' => array('id'=>$AvailabityId,'doctor_id' => $doc_id,'status' => 1,'start_time <='=>$cur_time,'end_time >='=>$cur_time
				, 'date(app_date)'=>$cur_date )));
							//pr($checkAvailabity);	
		 			 		 if(!empty($checkAvailabity)){	//Check the time for Appointment
		 			 		 	//$session_appointment_staus='true';
		 			 		 	$session_status_type=$AppointmentDetatil['Appointment']['session_status_type'];
		 			 		 	if($session_status_type==NULL){
		 			 		 		$session_appointment_staus="create";

		 			 		 	}else if($session_status_type=='P'){
		 			 		 		$session_appointment_staus="join";
		 			 		 	}
		 			 		 }
		 			 	}
		 			 }else{
		 			 	$session_appointment_staus='false';	//No Appointment For that Day
		 			 }

		 		}
		 	}
		 	return @$session_appointment_staus;


		}
		/*
		Appointment check Detail
		Author: Chittaranjan sahoo
		Date:21st Dec 2015
		*/
		public function BapCustUniappoAvailableChk($patientid='', $doctorid='',$availabilityID ='', $aptDate='',$appoint_book_slut='')
		{
		 	App::import('Model', 'Appointment');
		 	$Appointment= new Appointment();

		 	//$chk=$Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'appoint_book_slut'=>$appoint_book_slut,'date(appointment_date)' => $aptDate, 'status IN' => array(1,0))));
		 	//'patientid'=>$patientid, 
		 	if($appoint_book_slut!=""){ 
		 		$chk=$Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'appoint_book_slut'=>$appoint_book_slut,'date(appointment_date)' => $aptDate, 'status IN' => array(1,0))));
		 	}else{
		 		$chk=$Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate, 'status IN' => array(1,0))));
		 	}
		 	
		 	
		 	return($chk);
		}
		/*
		Appointment all status check Detail
		Author: Chittaranjan sahoo
		Date:28 Dec 2015
		*/
		public function BapCustUniappoAllAvailableChk($patientid='', $doctorid='',$availabilityID ='', $aptDate='')
		{
		 	App::import('Model', 'Appointment');
		 	$Appointment= new Appointment();
		 	//'patientid'=>$patientid, 
		 	$chk=$Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate)));
		 	return($chk);
		}

		/*
		Appointment Session Detail
		Author: Rajesh sahoo
		Date:24th Dec 2015
		*/
		public function appointmentSession($loginID="",$availabilityID="",$loginType="")
		{

		 	App::import('Model', 'Appointment');
		 	$Appointment= new Appointment();
		 	$cur_date=date('Y-m-d');
		 	if($loginType=="D"){
		 		$chk=$Appointment->find('first',array('conditions'=>array('doctorid' => $loginID, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $cur_date, 'status' => 1)));
			}else{
				$chk=$Appointment->find('first',array('conditions'=>array('patientid' => $loginID, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $cur_date, 'status' => 1)));
			}
		 	
		 	return($chk);
		}

		function BapCustUniGetTemplate($compose_id)
		{
			App::import('Model','NewsletterTemplate');
			$NewsletterTemplate=new NewsletterTemplate();
			$composeDetail=$NewsletterTemplate->find('first', array('conditions' => array('compose_id' => $compose_id)));
			return($composeDetail);
		}
		/*
		GetHospitalDetail
		Author: Rajesh sahoo
		Date:31st Dec 2015
		*/
		public function GethospitalDetByID($hospitalID=''){
			App::import('Model', 'Hospital');
			$Hospital= new Hospital();
			$HospitalDetail=$Hospital->find('first', array('conditions' => array('user_id' => $hospitalID)));	
			return ($HospitalDetail);
		}

		/*
		GetCountryDetail
		Author: Rajesh sahoo
		Date:4th Jan 2016
		*/
		public function GetcountryDetByID($countryID=''){
			App::import('Model', 'MasterCountry');
			$MasterCountry= new MasterCountry();
			$countryDetail=$MasterCountry->find('first', array('conditions' => array('country_id' => $countryID)));	
			return ($countryDetail);
		}
		/*
		GetstateDetByID
		Author: Rajesh sahoo
		Date:4th Jan 2016
		*/
		public function GetstateDetByID($countryID='',$stateID=''){
			App::import('Model', 'MasterState');
			$MasterState= new MasterState();
			$stateDetail=$MasterState->find('first', array('conditions' => array('country_id' => $countryID , 'location_id'=> $stateID)));	
			return ($stateDetail);
		}

		/*
		User Detail
		Author: Rajesh
		Date:05-01-2016
		*/
		public function userDetail($id='')
		{
		 	App::import('Model', 'MasterUser');
		 	$MasterUser= new MasterUser();
		 	$userDet=$MasterUser->find('first',array('conditions'=>array('id'=>$id)));
		 	return @$userDet;
		}

		/*
		Page by ID
		Author: Rajesh
		Date:05-01-2016
		*/ 
		public function getParentTest($id='')
		{
		  App::import('Model', 'TestMaster');
			$TestMaster= new TestMaster();
			$testDetail=$TestMaster->find('first', array('conditions' => array('id' => $id)));	
			return ($testDetail);
		}
		/*
		get patient history test results
		Author: Chittaranjan Sahoo
		Date:06-01-2016
		*/ 
		public function BapCustUnihistoryTestResults($dignosysID='')
		{
		  App::import('Model', 'DiagnosysTest');
			$DiagnosysTest= new DiagnosysTest();
			$testresultList=$DiagnosysTest->find('all', array('conditions' => array('diagnosys_id' => $dignosysID)));	
			return ($testresultList);
		}
		/*
		list services
		Author: Chittaranjan sahoo
		Date:08-01-2016
		*/
		public function BapCustUniServiceList()
		{
		 	App::import('Model', 'ServiceType');
			
			$ServiceType= new ServiceType;

					$res=$ServiceType->find('all',array('conditions'=>array('status'=>1), 'order' => array('service_name' => 'asc')));
				

			return($res);
		}
		/*
		list test dignosis report
		Author: Chittaranjan sahoo
		Date:08-01-2016
		*/
		public function BapCustUnitestDignosisList($id='')
		{
		 	App::import('Model', 'DiagnosysTest');
			
			$DiagnosysTest= new DiagnosysTest;

					$res=$DiagnosysTest->find('all',array('conditions'=>array('diagnosys_id'=>$id), 'order' => array('id' => 'asc')));
				

			return($res);
		}
		/*
		*show 3 Product rondomly 
		*Author: Rajesh kumar sahoo
		*Date:08-01-2016
		*/
		public function showProductrand()
		{
		 	App::import('Model', 'Product');
			
			$Product= new Product;
			$res=$Product->find('all',array('conditions'=>array('status'=>1), 'order' => 'rand()' , 'limit'=>3));
			//pr($res);
			return($res);
		}
		/*
		Doctor Type 
		Author: Rajesh
		Date:18th Jan 2015
		*/
		public function docType($id='')
		{
		 	App::import('Model', 'MasterUser');
		 	$MasterUser= new MasterUser();
		 	$docDet=$MasterUser->find('first',array('conditions'=>array('id'=>$id,'login_tytpe'=>'D','status'=>1)));
		 	return ($docDet['MasterUser']['doc_type']);
		}

		/*
		checkDocConv Type 
		Author: Rajesh
		Date:29th Jan 2015
		*/
		public function checkDocConv($id='')
		{
		 	App::import('Model', 'RegularAppointment');
		 	$RegularAppointment= new RegularAppointment();
		 	$curdate= date('Y-m-d');
		 	$appDocDet=$RegularAppointment->find('first',array('conditions'=>array('doctorid'=>$id,'is_conv '=>1,'status'=>1,'is_connected'=>1,'is_available'=>1,'DATE(`created`)'=>$curdate)));
		 	if(count($appDocDet)>0){
		 		return 1;
		 	}
		}

		/*
		chek available slots 
		Author: Rajesh
		Date:22nd Feb 2015
		*/
		public function chekAvailableSlots($doc_id='',$avalability_id=''){
			App::import('Model', 'DoctoravailableSlot');
			$DoctoravailableSlot= new DoctoravailableSlot();
			$availableSlots=$DoctoravailableSlot->find('all', array('conditions'=>array('doc_id'=>$doc_id,'avalability_id'=>$avalability_id)));
			if(count($availableSlots)>0){
				return $availableSlots;
		 		/*foreach ($availableSlots as $availableSlot) {
		 			//pr($availableSlot);
		 			return $availableSlot;
		 		}*/
		 	}
		}

		public function getdiagnosisDet($id=''){
			App::import('Model', 'DiagnosysReport');
			$DiagnosysReport= new DiagnosysReport();
			$diagnoDet=$DiagnosysReport->find('first', array('conditions'=>array('id'=>$id,'status'=>1)));
			if(!empty($diagnoDet)){
				return $diagnoDet;
			}
		}
}
	
?>	