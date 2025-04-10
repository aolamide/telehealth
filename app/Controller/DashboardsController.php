<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Dashboards Controller
 *
 * @property Dashboard $Dashboard
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DashboardsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Cookie','RequestHandler');

	public function beforeFilter()
	{
		$this->set('pageID', 0);
		if(!$this->Session->check('loginID'))
		{
			$this->redirect(Router::url('/', true));
		}
		else
		{
			$loginID=$this->Session->read('loginID');
			$loginType=$this->Session->read('loginType');
			$this->loadModel('MasterUser');
			$userres=$this->MasterUser->find('first', array('conditions' => array('id' => $loginID)));
			$this->set('LoginRes', $userres);
			$this->set('loginType',$loginType);

			$this->loadModel("SocialIcon");
			$social_options = array(
			'order' =>array('SocialIcon.orderno' => 'asc')
			);
			$this->set('socialSettings',$this->SocialIcon->find('all',$social_options));

			/* Sitesetting Dynamic Function */
			$this->loadModel("Sitesetting");
			$this->set('siteSettings',$this->Sitesetting->find('first'));

		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dashboard->recursive = 0;
		$this->set('dashboards', $this->Paginator->paginate());
		if($this->Session->read('loginType')=='D'){
			$doctor_id=$this->Session->read('loginID');
			$this->loadModel('DoctorAvailability');
			$availbilityList=$this->DoctorAvailability->find('all', array('conditions' => array('status' => 1,'doctor_id' => $doctor_id)));
			$this->set('availbilityList', $availbilityList);

		}
		$this->layout="user_dashboard";
	}
/**
 * ManageAvailability method
 * Author Rajesh
 * Date : 21st Dec 2015
 * @return void
 */
	public function ManageAvailability(){
		//echo 1;exit;
		$this->Dashboard->recursive = 0;
		if ($this->request->is('post')) {
		//=============Check Availability=================
				$this->loadModel('DoctorAvailability');
				$this->loadModel('DoctoravailableSlot');
				$doc_id=$this->Session->read('loginID');
				@$start_time=$this->request->data['DoctorAvailability']['start_time'];
				$start_time = date("H:i:s", strtotime($start_time));
				@$end_time=$this->request->data['DoctorAvailability']['end_time'];
				$end_time = date("H:i:s", strtotime($end_time));
				@$app_date=$this->request->data['DoctorAvailability']['app_date'];
				$checkAvailabity = $this->DoctorAvailability->find('all', array('conditions' => array('doctor_id' => $doc_id,'status' => 1,'start_time <='=>$start_time,'end_time >='=>$start_time
				, 'date(app_date)'=>date("Y-m-d",strtotime($app_date)) ) ));
				if(count($checkAvailabity)>0){
					$this->Session->setFlash(__('You have already booked !! Please try with other date/time'));
				}else{
					$this->DoctorAvailability->create();
					$this->request->data['DoctorAvailability']['doctor_id']=$doc_id;
					$this->request->data['DoctorAvailability']['status']=0;
					$this->request->data['DoctorAvailability']['app_date']=date("Y-m-d",strtotime($this->request->data['DoctorAvailability']['app_date']));

					if ($this->DoctorAvailability->save($this->request->data)) {

						/*=============================*/
						$doc_start_time=strtotime($this->request->data['DoctorAvailability']['start_time']);
						$doc_end_time=strtotime($this->request->data['DoctorAvailability']['end_time']);
						$available_total_time=round(abs($doc_start_time - $doc_end_time) / 60,2);
						$availablecnt=intval($available_total_time/20);
						$insertID = $this->DoctorAvailability->getLastInsertId();
						for ($x = 0; $x <= $availablecnt; $x++) {
						    if($x==0){
						    	$start=date("H:i:s", $doc_start_time);
						    	$end=date("H:i:s", strtotime('+20 minutes', $doc_start_time));
						    	if($end>$end_time){
						    		$end=$end_time;
						    	}
						    }else{
						    	$doc_start_time=$this->settimetwentymin($doc_start_time);
						    	$start=date("H:i:s", $doc_start_time);
						    	$end=date("H:i:s", strtotime('+20 minutes', $doc_start_time));
						    	if($end>=$end_time){
						    		$end=$end_time;
						    	}
						    }
						    $slotstartTime=$start;
						    $slotendTime=$end;

						    $docSlotFields=array('doc_id' => $doc_id, 'avalability_id' => $insertID, 'start_time' => $slotstartTime, 'end_time'=>$slotendTime);
						    $this->DoctoravailableSlot->create();
							$this->DoctoravailableSlot->save($docSlotFields);
						}

						/*=============================*/

						$this->Session->setFlash(__('Availability has been saved.'));
					} else {
						$this->Session->setFlash(__('The Availability could not be saved. Please, try again.'));
					}
				}
			}
		$this->set('dashboards', $this->Paginator->paginate());
		$this->layout="doctor_availabilty";
	}
/**
 * ViewProfile method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function ViewProfile(){
		$this->loadModel('MasterUser');
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');
		$userres=$this->MasterUser->find('first', array('conditions' => array('id' => $loginID)));
		$this->set('UserRes', $userres);

		if($loginType=="H"){
			$this->loadModel('Hospital');
			$hospitalDet=$this->Hospital->find('first',array('conditions' =>array('user_id'=>$loginID)));
			$this->set('hospitalDet',$hospitalDet);
		}
		$this->layout="view_profile";
		$this->set('loginType',$loginType);
	}
/**
 * viewdoctor method
 * Author Chittaranjan
 * Date : 28th Dec 2015
 * @return void
 */
	public function viewdoctor($doctorid=''){
		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'ManageAppointment'));
		}
		$this->loadModel('MasterUser');
		$userres=$this->MasterUser->find('first', array('conditions' => array('id' => $doctorid)));
		$this->set('UserRes', $userres);
		$this->layout="view_profile";
	}
/**
 * uploadtest method
 * Author Chittaranjan
 * Date : 28th Dec 2015
 * @return void
 */
	public function uploadtest(){
		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post')) {
			if($this->request->data['UploadtestResult']['uploaded_file']['name']!='')
			{
				$testimg=time().$this->request->data['UploadtestResult']['uploaded_file']['name'];
				move_uploaded_file($this->request->data['UploadtestResult']['uploaded_file']['tmp_name'],WWW_ROOT.'files/testresult/'.$testimg);
				$this->request->data['UploadtestResult']['uploaded_file']=$testimg;
			}
			$loginID=$this->Session->read('loginID');
			$this->request->data['UploadtestResult']['userid']=$loginID;
			$this->request->data['UploadtestResult']['status']=1;
			$this->loadModel('UploadtestResult');
			$this->UploadtestResult->create();
			if ($this->UploadtestResult->save($this->request->data)) {
				$this->Session->setFlash(__('Test result uploaded successfully'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Test result uploading failed'));
			}
		}
		$this->loadModel('MasterUser');
		$doctorList=array('' => 'Select Doctor');
		$doctorList +=$this->MasterUser->find('list', array('conditions' => array('status' => 1, 'login_tytpe' => 'D'),'fields' => array('id','name')));
		$this->set('doctorList', $doctorList);
		$this->layout="add_appointment";
	}
/**
 * AddAppointment method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function AddAppointment(){
		if($this->Session->read('loginType') == 'D'){
			$this->redirect(array('action' => 'index'));
		}
		if(!$this->Session->check('doctorid')){
			$this->redirect(array('action' => 'selectdoctor'));
		}
		if(!$this->Session->check('appt_serviceid')){
			$this->redirect(array('action' => 'selectdoctor'));
		}
		if(!$this->Session->check('availableID')){
			$this->redirect(array('action' => 'availabilitydate'));
		}

		//echo 1;exit;
		$this->Dashboard->recursive = 0;
		//=========Location List fetch=========
		$this->loadModel('Location');
		$locationList = array('' => 'Select Location');
		$locationList += $this->Location->find('list', array('order' => array('location_name' => 'asc')));
		$this->set('locationList', $locationList);
		//=========Service List fetch=========
		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1), 'order' => array('fname' => 'asc')));
		$this->set('doctorList', $doctorList);
		//=========Availability List fetch=========
		/*$this->loadModel('DoctorAvailability');
		$availabilityList = array('' => 'Select Time');
		$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('status' => 1), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		$this->set('availabilityList', $availabilityList);*/
		//pr($this->Session->read('doctorid'));


		$this->loadModel('DoctorAvailability');
		$this->loadModel('Appointment');
		$availabledetail = $this->DoctorAvailability->find('first', array('conditions' => array('id' => $this->Session->read('availableID'))));
		if(count($availabledetail)>0){
			$appointDate=$availabledetail['DoctorAvailability']['app_date'];
		}
		$docID=$this->Session->read('doctorid');
		$avaialbleID=array();
		$availableSlotId=array();
		$options = array('conditions' => array('doctorid'=>$docID,'appointment_date'=>$appointDate));
		$chkAppointAvailble=$this->Appointment->find('all', $options);
		if(count($chkAppointAvailble)>0){
			//pr($chkAppointAvailble);exit();
			foreach ($chkAppointAvailble as $chkAppointAvailble) {
				array_push($avaialbleID, $chkAppointAvailble['Appointment']['appointment_availbility']);
				array_push($availableSlotId, $chkAppointAvailble['Appointment']['appoint_book_slut']);
			}
			//pr($availableSlotId);exit;
		}


		$availabilityList = array('' => 'Select Time');
		$availabilityList+= $this->DoctorAvailability->find('list', array('conditions' => array('DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $appointDate, 'DoctorAvailability.doctor_id' => $docID), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		//$availabilityList+= $this->DoctorAvailability->find('list', array('conditions' => array('DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $appointDate, 'DoctorAvailability.doctor_id' => $docID), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		$this->set('availabilityList', $availabilityList);

		$this->loadModel('DoctoravailableSlot');
		$availabilitySlot = array('' => 'Select Time');
		$availabilitySlot+= $this->DoctoravailableSlot->find('list', array('conditions' => array('NOT'=>array('id'=>$availableSlotId),'DoctoravailableSlot.avalability_id'=>$this->Session->read('availableID'),'DoctoravailableSlot.doc_id' =>$docID), 'fields' => array('id', 'fulltime')));
		//pr($availabilitySlot);exit;
		$this->set('availabilitySlot', $availabilitySlot);

		if ($this->request->is('post')) {
			//=============Check Appointment=================
			$this->loadModel('Appointment');
			$serviceid=$this->request->data['Appointment']['serviceid'];
			if(!empty($serviceid)){
				$this->request->data['Appointment']['serviceid'] = implode(",",$serviceid);
			}
			$doc_id=$this->request->data['Appointment']['doctorid'];
			$appointment_date=$this->request->data['Appointment']['appointment_date'];
			$this->request->data['Appointment']['appointment_date'] = date("Y-m-d",strtotime($appointment_date));
			$appointment_availbility=$this->request->data['Appointment']['appointment_availbility'];
			$appoint_book_slut=$this->request->data['Appointment']['appoint_book_slut'];
			$checkAppointment = $this->Appointment->find('all', array('conditions' => array('doctorid' => $doc_id,'status IN' => array(1,0),'appointment_availbility' => $appointment_availbility,'appoint_book_slut'=>$appoint_book_slut, 'date(appointment_date)'=>date("Y-m-d",strtotime($appointment_date)) ) ));

			if(count($checkAppointment)>0){
				$this->Session->setFlash(__('Appointment Already Booked !! Please try with other date/time'));
			}else{
				$this->Appointment->create();
				$this->request->data['Appointment']['patientid']=$this->Session->read('loginID');
				$this->request->data['Appointment']['status']=0;
				if ($this->Appointment->save($this->request->data)) {
					//==============Mail appointment to doctor==============
					$this->loadModel('MasterUser');
					$doctorSessionID=$this->Session->read('doctorid');
					$doctorRes=$this->MasterUser->find('first', array('conditions' => array('id' => $doctorSessionID)));

					$loginID=$this->Session->read('loginID');
					$loginType=$this->Session->read('loginType');
					$userRes=$this->MasterUser->find('first', array('conditions' => array('id' => $loginID)));

					$this->loadModel('Location');
				 	$locationDet=$this->Location->find('first',array('conditions'=>array('id'=>$this->request->data['Appointment']['locationid'])));
				 	$serviceString=array();
				 	if(!empty($serviceid)){
				 		foreach ($serviceid as $serviceKey => $serviceVal) {
				 			$this->loadModel('ServiceType');
				 			$serviceDet=$this->ServiceType->find('first',array('conditions'=>array('id'=>$serviceVal)));
				 			array_push($serviceString, $serviceDet['ServiceType']['service_name']);
				 		}
				 	}

				 	$availability_id = $this->request->data['Appointment']['appointment_availbility'];
				 	$this->loadModel('DoctorAvailability');
					$availabilityDetail = $this->DoctorAvailability->find('first', array('conditions' => array('status' => 1, 'id' => $availability_id)));

					$availability_slot_id = $this->request->data['Appointment']['appoint_book_slut'];
					$this->loadModel('DoctoravailableSlot');
					$availableSlotDetail = $this->DoctoravailableSlot->find('first', array('conditions' => array('id' => $availability_slot_id)));

					$this->loadModel("Sitesetting");
					$siteDetail = $this->Sitesetting->find('first');
					$doctorMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

									<tr>

										<td align="left" colspan="3">Dear '.stripslashes($doctorRes['MasterUser']['fname'].' '.$doctorRes['MasterUser']['lname']).'</td>

									</tr>

									<tr>

									<td colspan="3">Patient '.stripslashes($userRes['MasterUser']['fname'].' '.$userRes['MasterUser']['lname']).' request an appointment from '.$siteDetail['Sitesetting']['logo_title'].'. Below are the appointment detail.</td>

									</tr>
									<tr>

									<td><strong>Location</strong></td>
									<td><strong>:</strong></td>
									<td>'.$locationDet['Location']['location_name'].'</td>

									</tr>
									<tr>

									<td><strong>Services</strong></td>
									<td><strong>:</strong></td>
									<td>'.implode(", ", $serviceString).'</td>

									</tr>
									<tr>

									<td><strong>Patient Name</strong></td>
									<td><strong>:</strong></td>
									<td>'.stripslashes($userRes['MasterUser']['fname'].' '.$userRes['MasterUser']['lname']).'</td>

									</tr>
									<tr>
									<td><strong>Appointment Date</strong></td>
									<td><strong>:</strong></td>
									<td>'.date("d-m-Y",strtotime($this->request->data['Appointment']['appointment_date'])).'</td>
									</tr>
									<tr>
									<td><strong>Appointment Time</strong></td>
									<td><strong>:</strong></td>
									<td>'.$availableSlotDetail['DoctoravailableSlot']['start_time'].' To '.$availableSlotDetail['DoctoravailableSlot']['end_time'].'</td>
									</tr>

									<tr>

										<td align="left">&nbsp;</td>

									</tr>

									<tr>

										<td align="left" valign="middle">Thank You</td>

									</tr>

									<tr>

										<td align="left" valign="middle">The '.$siteDetail['Sitesetting']['logo_title'].' Team</td>

									</tr>

								</table>';
								$subject="A new Appoinement from ".$siteDetail['Sitesetting']['logo_title'];
							$Email = new CakeEmail('default');
							$Email->to($doctorRes['MasterUser']['email_id']);

							$Email->subject($subject);

							//$Email->replyTo($adminemail);

							$Email->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));

							$Email->emailFormat('both');

							//$Email->headers();

							//$Email->send($doctorMsg);
					//===============================
					$this->Session->delete('appt_serviceid');
					$this->Session->delete('doctorid');
					$this->Session->delete('availableID');
					$this->Session->setFlash(__('Appointment Booked successfully.'));
				} else {
					$this->Session->setFlash(__('Appointment Booking Failed'));
				}
			}
		}else{
			$this->request->data['Appointment']['serviceid']=$this->Session->read('appt_serviceid');
			$this->request->data['Appointment']['doctorid']=$this->Session->read('doctorid');
			$this->request->data['Appointment']['appointment_availbility']=$this->Session->read('availableID');
			$this->request->data['Appointment']['appoint_book_slut']=$this->Session->read('availabilitySlotID');
			$this->loadModel('DoctorAvailability');
			$availabledetail = $this->DoctorAvailability->find('first', array('conditions' => array('id' => $this->Session->read('availableID'))));
			if(count($availabledetail)>0){
				$this->request->data['Appointment']['appointment_date']=$availabledetail['DoctorAvailability']['app_date'];
			}
		}
		$this->set('dashboards', $this->Paginator->paginate());
		$this->layout="add_appointment";
	}

	public function doctorservice(){

		$ServiceId=$this->request->data['serviceID'];
		$ServiceIds= explode(',',$ServiceId);
		$this->loadModel('MasterUser');
		$this->loadModel('AssignService');
		$doctor_ids=array();
		$conditions=array();
		if(!empty($ServiceIds)){
			$tblCount=1;
			$tblSecCount=2;
			$queryString='';
			foreach($ServiceIds as $singServiceID){
				if($tblCount==1){
				$queryString="SELECT * FROM `assign_services` WHERE serviceid=".$singServiceID;
				$queryString="select t".$tblCount.".* from (".$queryString.") as t".$tblCount." left join assign_services as t".$tblSecCount." on t".$tblSecCount.".`userid`=t".$tblCount.".userid group by t".$tblCount.".userid";
				}else{
					$queryString="select t".$tblCount.".* from (".$queryString.") as t".$tblCount." left join assign_services as t".$tblSecCount." on t".$tblSecCount.".`userid`=t".$tblCount.".userid where t".$tblSecCount.".serviceid=".$singServiceID." group by t".$tblCount.".userid";
				}
				$tblCount+=2;
				$tblSecCount+=2;
			}
			$seviceDet=$this->AssignService->query($queryString);
			$tblIndex = 't'.(intval($tblCount)-2);
			//$seviceDet=$this->AssignService->find('all', array('conditions' => array('AND'=>$conditions)));
			foreach($seviceDet as $seviceDets){
				$doctorID=$seviceDets[$tblIndex]['userid'];
				array_push($doctor_ids, $doctorID);
			}
			$doctorids=(array_unique($doctor_ids));
			$doctorsList = $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1,'doc_type' => 0 ,'id'=>$doctorids), 'order' => array('fname' => 'asc'),'fields'=>array('id','name')));

				echo '<select name="data[Appointment][doctorid]" id="doctor" class="form-control" required="required">
				<option value="">Select Doctor</option>';
					 foreach ($doctorsList as $key => $value) {
					echo '<option value="'.$key.'">'.$value.'</option>';
					}
				echo'</select>';

		}

		exit;
	}

	public function availbility($id=''){
		if($this->request->is('post')){
			$appointWhr = array('status IN' => array(1,0));
			$whr=array(array('status' => 1));

			if(isset($this->request->data['doctor'])){
				$doctor = $this->request->data['doctor'];
				array_push($whr, array('doctor_id' => $doctor));
				$appointWhr+=array('doctorid' => $doctor);
			}if(isset($this->request->data['dateval'])){
				$dateval = date("Y-m-d", strtotime($this->request->data['dateval']));
				array_push($whr, array('date(app_date)' => $dateval));
				$appointWhr+=array('date(appointment_date)' => $dateval);
			}
			$this->loadModel('DoctorAvailability');
			$getList=$this->DoctorAvailability->find('all', array('conditions' => array('AND' =>$whr)));
			if(count($getList)>0){
				?>
				<option value="">Select Time</option>
				<?php
				if($id!=''){
					$appointWhr+=array('id !=' => $id);
				}
				foreach($getList as $getListRes){
					$availabilityID = $getListRes['DoctorAvailability']['id'];
					/*if($id!=''){
						array_push($appointWhr, array('id !=' => $id));
						array_push($appointWhr, array('appointment_availbility' => $availabilityID ));
						//$appwhr=array(array('id !=' => $id),array('appointment_availbility' => $availabilityID ));
					}else{
						array_push($appointWhr, array('appointment_availbility' => $availabilityID ));
						//$appwhr=array(array('appointment_availbility' => $availabilityID ));
					}*/
					if (array_key_exists('appointment_availbility', $appointWhr)) {
						//echo "enter";
						$appointWhr['appointment_availbility'] = $availabilityID;
					}else{

						$appointWhr+=array('appointment_availbility' => $availabilityID );
					}

					$this->loadModel('Appointment');
					//pr($appointWhr);
					$chkAppointment = $this->Appointment->find('first', array('conditions' => array('AND' => $appointWhr)));

					if(count($chkAppointment)<=0){
					?>
					<option value="<?php echo $getListRes['DoctorAvailability']['id'];?>"><?php echo stripslashes($getListRes['DoctorAvailability']['start_time']." To ".$getListRes['DoctorAvailability']['end_time']);?></option>
					<?php
					}
				}
			}
		}
		exit();
	}

	public function availbility_slot($id=''){
		if($this->request->is('post')){
			$appointWhr = array('status IN' => array(1,0));
			//$whr=array(array('status' => 1));
			$whr=array();

			if(isset($this->request->data['availability_slot_id'])){
				$doctor = $this->request->data['doctor'];
				$availability_slot_id = $this->request->data['availability_slot_id'];
				array_push($whr, array('doc_id' => $doctor,'avalability_id'=>$availability_slot_id));
				$appointWhr+=array('doctorid' => $doctor);
			}

			$this->loadModel('DoctoravailableSlot');
			$this->loadModel('Appointment');

			$getList=$this->DoctoravailableSlot->find('all', array('conditions' => array('AND' =>$whr)));
			if(count($getList)>0){
				?>
				<option value="">Select Time</option>
				<?php
				if($id!=''){
					$appointWhr+=array('id !=' => $id);
				}
				foreach($getList as $getListRes){
					$availabilitySlotID = $getListRes['DoctoravailableSlot']['id'];
					//echo $availabilityID;

					if (array_key_exists('appoint_book_slut', $appointWhr)) {
						//echo "enter";
						$appointWhr['appoint_book_slut'] = $availabilitySlotID;
					}else{

						$appointWhr+=array('appoint_book_slut' => $availabilitySlotID );
					}
					//array_push($appointWhr, array('status' => 0 ));
					//pr($appointWhr);
					$chkAppointment = $this->Appointment->find('first', array('conditions' => array('AND' => $appointWhr)));
					if(count($chkAppointment)<=0){
					?>
					<option value="<?php echo $getListRes['DoctoravailableSlot']['id'];?>"><?php echo stripslashes($getListRes['DoctoravailableSlot']['start_time']." To ".$getListRes['DoctoravailableSlot']['end_time']);?></option>
					<?php
					}
				}

			}
		}
		exit();
	}
/**
 * ManageAppointment method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function ManageAppointment(){
		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}

		$this->loadModel('MasterUser');
		$this->loadModel('Appointment');
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');
		$appointDet=$this->Appointment->find('all', array('conditions' => array('patientid' => $loginID)));
		$this->set('appointmentDetails', $appointDet);
		//pr($appointDet);
		$this->layout="manage_appointment";
		$this->set('loginType',$loginType);
	}

/**
 * delete_appointment method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function delete_appointment($id = null){
		$this->loadModel('Appointment');
		$this->Appointment->id = $id;
		if ($this->Appointment->delete()) {
			$this->Session->setFlash(__('The appointment has been cancelled.'));
		} else {
			$this->Session->setFlash(__('The appointment could not be cancelled. Please, try again.'));
		}
		return $this->redirect(array('action' => 'ManageAppointment'));
	}

/**
 * EditAppointment method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function EditAppointment($id = null){
		$this->loadModel('Appointment');
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid appointment'));
		}

		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}

		//=========Location List fetch=========
		$this->loadModel('Location');
		$locationList = array('' => 'Select Location');
		$locationList += $this->Location->find('list', array('order' => array('location_name' => 'asc')));
		$this->set('locationList', $locationList);
		//=========Service List fetch=========
		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1), 'order' => array('fname' => 'asc')));
		$this->set('doctorList', $doctorList);


		if ($this->request->is(array('post', 'put'))) {
			//=============Check Appointment=================
			$serviceid=$this->request->data['Appointment']['serviceid'];
			if(!empty($serviceid)){
				$this->request->data['Appointment']['serviceid'] = implode(",",$serviceid);
			}
				$doc_id=$this->request->data['Appointment']['doctorid'];
				$appointment_date=$this->request->data['Appointment']['appointment_date'];
				$this->request->data['Appointment']['appointment_date'] = date("Y-m-d",strtotime($appointment_date));
				$appointment_availbility=$this->request->data['Appointment']['appointment_availbility'];
				$appoint_book_slut=$this->request->data['Appointment']['appoint_book_slut'];
				$checkAppointment = $this->Appointment->find('all', array('conditions' => array('id !=' => $this->request->data['Appointment']['id'],'doctorid' => $doc_id,'status' => 1,'appointment_availbility' => $appointment_availbility ,'appoint_book_slut'=>$appoint_book_slut, 'date(appointment_date)'=>date("Y-m-d",strtotime($appointment_date)) ) ));
				if(count($checkAppointment)>0){
					$this->Session->setFlash(__('Appointment Already Booked. Please try another'));
					$this->request->data['Appointment']['serviceid']=$serviceid;
				}else{
					if ($this->Appointment->save($this->request->data)) {
						$this->Session->setFlash(__('Appointment Modified successfully'));
					} else {
						$this->request->data['Appointment']['serviceid']=$serviceid;
						$this->Session->setFlash(__('Appointment Modifying Failed'));
					}
				}
			//===============================================
		} else {
			$options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
			$this->request->data = $this->Appointment->find('first', $options);
			$this->request->data['Appointment']['serviceid'] = (!empty($this->request->data['Appointment']['serviceid']))?explode(",",$this->request->data['Appointment']['serviceid']) : '';
			//=========Doctor List fetch=========
			$this->loadModel('MasterUser');
			$doctorList = array('' => 'Select Doctor');
			$doctorList += $this->MasterUser->find('list', array(
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'assign_services',
	                        'alias' => 'AssignService',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = AssignService.userid')
	                    ),
					 ),
				'conditions' => array('MasterUser.login_tytpe' => 'D', 'MasterUser.status' => 1), 'order' => array('MasterUser.fname' => 'asc')));
			$this->set('doctorList', $doctorList);
			//=========Availability List fetch=========
			/*$this->loadModel('DoctorAvailability');
			$availabilityList = array('' => 'Select Time');
			$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $this->request->data['Appointment']['appointment_date'], 'DoctorAvailability.doctor_id' => $this->request->data['Appointment']['doctorid']), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
			$this->set('availabilityList', $availabilityList);*/
			$avaialbleID=array();
			$availableSlotId=array();
			$this->loadModel('Appointment');

			$options = array('conditions' => array('doctorid'=>$this->request->data['Appointment']['doctorid'],'appointment_date'=>$this->request->data['Appointment']['appointment_date'],'id !='=>$id));
			$chkAppointAvailble=$this->Appointment->find('all', $options);
			if(count($chkAppointAvailble)>0){
				foreach ($chkAppointAvailble as $chkAppointAvailble) {
					array_push($avaialbleID, $chkAppointAvailble['Appointment']['appointment_availbility']);
					array_push($availableSlotId, $chkAppointAvailble['Appointment']['appoint_book_slut']);
				}
				//pr($avaialbleID);exit;
			}
			$this->loadModel('DoctorAvailability');
			$availabilityList = array('' => 'Select Time');
			//$availabilityList+= $this->DoctorAvailability->find('list', array('conditions' => array('NOT'=>array('id'=>$avaialbleID),'DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $this->request->data['Appointment']['appointment_date'], 'DoctorAvailability.doctor_id' => $this->request->data['Appointment']['doctorid']), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
			$availabilityList+= $this->DoctorAvailability->find('list', array('conditions' => array('DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $this->request->data['Appointment']['appointment_date'], 'DoctorAvailability.doctor_id' => $this->request->data['Appointment']['doctorid']), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
			$this->set('availabilityList', $availabilityList);

			$this->loadModel('DoctoravailableSlot');
			$availabilitySlot = array('' => 'Select Time');
			$availabilitySlot+= $this->DoctoravailableSlot->find('list', array('conditions' => array('NOT'=>array('id'=>$availableSlotId),'DoctoravailableSlot.avalability_id'=>$this->request->data['Appointment']['appointment_availbility'],'DoctoravailableSlot.doc_id' => $this->request->data['Appointment']['doctorid']), 'fields' => array('id', 'fulltime')));
			$this->set('availabilitySlot', $availabilitySlot);
		}
		$this->layout='add_appointment';

	}
/**
 * change_password method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function ChangePassword($id = null){
		$this->loadModel('MasterUser');
		$loginID=$this->Session->read('loginID');
		if ($this->request->is(array('post', 'put'))) {

			$userres=$this->MasterUser->find('first', array('conditions' => array('id' => $loginID)));
			$currentPassword=$userres['MasterUser']['user_pass'];
			$userCurPassword=$this->request->data['Register']['user_cur_pass'];
			$userNewPassword=$this->request->data['Register']['user_new_pass'];
			$userConfPassword=$this->request->data['Register']['cnf_pass'];
			if($currentPassword==base64_encode($userCurPassword)){
				if($userNewPassword==$userConfPassword){
					$userPassword=base64_encode($userConfPassword);
					$this->MasterUser->id = $loginID;
					if($this->MasterUser->saveField('user_pass', $userPassword)){
						$this->Session->setFlash(__('Password updated successfully'));
					}else{
						$this->Session->setFlash(__('Error in Updation'));
					}
				}else{
					$this->Session->setFlash(__('Mismatch in Password'));
				}

			}else{
				$this->Session->setFlash(__('Invalid Current Password'));
			}
		}
		$this->layout='add_appointment';
	}

/**
 * EditProfilePatient method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function EditProfilePatient($id = null){
		$this->loadModel('MasterUser');
		$loginID=$this->Session->read('loginID');
		$id=$loginID;
		//=========Country List fetch=========
		$this->loadModel('MasterCountry');
		$countryList = array('' => 'Select Country');
		$countryList += $this->MasterCountry->find('list', array('order' => array('country_name' => 'asc')));
		$this->set('countryList', $countryList);
		//=========Stae List fecth==========
		//=========Hospital List fetch=========
		$this->loadModel('Hospital');
		$options['joins'] = array(array('table' => 'master_users', 'alias' => 'MasterUsers', 'type' => 'LEFT', 'conditions' => array( 'MasterUsers.id = Hospital.user_id',
        )  ));

        $options['conditions'] = array('MasterUsers.status' => 1,'MasterUsers.login_tytpe'=>'H');

		$hospitalList = array('' => 'Select Hospital');
		$hospitalList += $this->Hospital->find('list',$options);
		$this->set('hospitalList', $hospitalList);
		//======================================

		$this->loadModel('MasterState');
		$stateList = array('' => 'Select State');
		$this->set('stateList', $stateList);
		if ($this->request->is(array('post', 'put'))) {
			$options = array('conditions' => array('MasterUser.' . $this->MasterUser->primaryKey => $id));
			$userData = $this->MasterUser->find('first', $options);
			$this->request->data['MasterUser']['user_name']=$userData['MasterUser']['user_name'];
			$this->request->data['MasterUser']['user_pass']=$userData['MasterUser']['user_pass'];

			if ($this->MasterUser->save($this->request->data)) {

					//===========User meta field Add functionality==================
					if(isset($this->request->data['attr_field'])){
						$attr_field = $this->request->data['attr_field'];
						$insertID = $this->request->data['MasterUser']['id'];
							if(!empty($attr_field)){
								$this->loadModel('UserMeta');
								foreach ($attr_field as $attrIndex => $attrValue) {
									$metaChk = $this->UserMeta->find('first', array('conditions' => array('meta_key' => $attrIndex, 'user_id' => $insertID)));
									if(count($metaChk)>0){
										$metaFields=array('id' => $metaChk['UserMeta']['id'], 'user_id' => $insertID, 'meta_key' => $attrIndex, 'meta_value' => $attrValue);
										$this->UserMeta->save($metaFields);
									}else{
									$metaFields=array('user_id' => $insertID, 'meta_key' => $attrIndex, 'meta_value' => $attrValue);
									$this->UserMeta->create();
									$this->UserMeta->save($metaFields);
								}
							}
						}
					}
					//==================================================================
					$this->Session->setFlash(__('Profile updated successfully'));
					//return $this->redirect(array('action' => 'index'));
				}else {
					$this->Session->setFlash(__('The patient detail could not be saved. Please fill all required field to proceed.'));
				}

		}else{
			$options = array('conditions' => array('MasterUser.' . $this->MasterUser->primaryKey => $id));
			$this->request->data = $this->MasterUser->find('first', $options);
		}
		$this->layout='add_appointment';
		$this->set('id', $loginID);
	}
/**
 * selectdoctor method
 * Author Chittaranjan Sahoo
 * Date : 23rd Dec 2015
 * Description: Select doctor for appointment
 * @return void
 */
	public function selectdoctor(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'H')){
			$this->redirect(array('action' => 'index'));
		}
		$this->set('title_for_layout','Select Doctor');

		if($this->request->is('post')){
			$doctorid=$this->request->data['Appointment']['doctorid'];
			$serviceid=$this->request->data['Appointment']['serviceid'];
			$this->Session->write('doctorid',$doctorid);
			$this->Session->write('appt_serviceid',$serviceid);
			$this->redirect(array('action' => 'availabilitydate'));
		}else{
			//=========Service List fetch=========

		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);
			//=========Doctor List fetch=========
		if($this->Session->check('doctorid')){
			$this->request->data['Appointment']['doctorid']=$this->Session->read('doctorid');
		}
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1, 'doc_type' => 0), 'order' => array('fname' => 'asc'),'fields'=>array('id','name')));
		$this->set('doctorList', $doctorList);
		}

		$this->layout="add_appointment";

	}
/**
 * Availability method
 * Author Chittaranjan Sahoo
 * Date : 23rd Dec 2015
 * Description: availbility date and time show according to the Doctor
 * @return void
 */
	public function availabilitydate(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'H')){
			$this->redirect(array('action' => 'index'));
		}
		if(!$this->Session->check('doctorid')){
			$this->redirect(array('action' => 'selectdoctor'));
		}
		$doctor_id = $this->Session->read('doctorid');
		$this->loadModel('DoctorAvailability');

		/*$availbilityList=$this->DoctorAvailability->find('all', array('conditions' => array('status' => 1,'doctor_id' => $doctor_id)));
		$this->set('availbilityList', $availbilityList);
		$this->layout="add_appointment";*/

		/*======Changed on 22nd Feb by rajesh==============*/
		$this->loadModel('DoctoravailableSlot');
		$availbilityList=$this->DoctorAvailability->find('all', array('conditions' => array('status' => 1,'doctor_id' => $doctor_id)));
		//pr($availbilityList);exit;
		$options['joins'] = array(
		    array('table' => 'doctor_availability',
		        'alias' => 'DoctorAvailability',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'DoctorAvailability.id = DoctoravailableSlot.avalability_id	',
		        )
		    )
		);
		$availableSlots=$this->DoctoravailableSlot->find('all', $options);

		if(!empty($availableSlots) && count($availableSlots)>0){
			//pr($availableSlots);exit;
			$this->set('availableSlots', $availableSlots);
		}
			$this->set('availbilityList', $availbilityList);


		//$this->set('availbilityList', $availbilityList);
		$this->layout="add_appointment";

		/*======Changed on 22nd Feb by rajesh==============*/

	}
/**
 * Availability Chk method
 * Author Chittaranjan Sahoo
 * Date : 23rd Dec 2015
 * Modified By Rajesh Kumar Sahoo
 * Modified Date: 24th Feb 2016
 * Description: availbility date and time show according to the Doctor
 * @return void
 */
	/*public function chkavailability(){
		if(!$this->Session->check('doctorid')){
			$this->redirect(array('action' => 'selectdoctor'));
		}
		$loginType=$this->Session->read('loginType');
		if($loginType=='H'){
			$patientid = $this->Session->read('patientid');
		}else{
			$patientid = $this->Session->read('loginID');
		}

		$doctorid = $this->Session->read('doctorid');
		$currentDate=date("Y-m-d");
		$availabilityDetail=$this->request->data['availabilityDetail'];
		//pr($availabilityDetail);exit;
		$availArr=explode("::",$availabilityDetail);
		$availabilityID=$availArr[0];
		$aptDate=$availArr[1];
		$this->loadModel('Appointment');
		//'patientid'=>$patientid,
		$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate, 'status IN' => array(1, 0))));
		if(count($availbilityList)>0){
			if(count($availbilityList)>0 && $availbilityList['Appointment']['join_status']==0 && $currentDate > $aptDate){
	            echo 3;// appointment booked Time expired(appointment Unsuccessfully)
	          }else if(count($availbilityList)>0 && ($availbilityList['Appointment']['join_status']==1 || $availbilityList['Appointment']['join_status']==2 || $availbilityList['Appointment']['join_status']==3) && $currentDate > $aptDate){
	            echo 4;// appointment booked Time expired(appointment successfully)
	          }else if(count($availbilityList)>0  && $currentDate < $aptDate){
	            echo 5;// appointment booked and time is upcoming
	          }else{
				echo 0;
			}
		}else{
			if($currentDate > $aptDate){
				echo 2; //time expired without booking
			}else{
			echo 1; //Time slot availble for book
		}
			$this->Session->write('availableID', $availabilityID);
		}
	exit();
	}*/



	public function chkavailability(){
		if(!$this->Session->check('doctorid')){
			$this->redirect(array('action' => 'selectdoctor'));
		}
		$loginType=$this->Session->read('loginType');
		if($loginType=='H'){
			$patientid = $this->Session->read('patientid');
		}else{
			$patientid = $this->Session->read('loginID');
		}

		$doctorid = $this->Session->read('doctorid');
		$currentDate=date("Y-m-d");
		$currentTime=date("H:i:s");
		$availabilityDetail=$this->request->data['availabilityDetail'];

		$this->loadModel('DoctoravailableSlot');
		$this->loadModel('Appointment');

		$availArr=explode("::",$availabilityDetail);
		//pr($availArr);exit;
		$chkSlotAvail=$availArr[2];
		if($chkSlotAvail == "slot_available"){
			$availabilitySlotID=$availArr[0];
			$aptDate=$availArr[1];
			$start_time=$availArr[3];
			$end_time=$availArr[4];
			$availabilityID=$availArr[5];
			$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'appoint_book_slut'=>$availabilitySlotID,'date(appointment_date)' => $aptDate, 'status IN' => array(1, 0))));
			$this->Session->write('availabilitySlotID', $availabilitySlotID);
		}else {
			$availabilityID=$availArr[0];
			$aptDate=$availArr[1];
			$start_time=$availArr[3];
			$end_time=$availArr[4];
			$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate, 'status IN' => array(1, 0))));
		}



		if(count($availbilityList)>0){
			if(count($availbilityList)>0 && $availbilityList['Appointment']['join_status']==0 && $currentDate > $aptDate && $currentTime > $end_time){
	            echo 3;// appointment booked Time expired(appointment Unsuccessfully)
	          }else if(count($availbilityList)>0 && ($availbilityList['Appointment']['join_status']==1 || $availbilityList['Appointment']['join_status']==2 || $availbilityList['Appointment']['join_status']==3) && $currentDate > $aptDate){
	            echo 4;// appointment booked Time expired(appointment successfully)
	          }else if(count($availbilityList)>0  && $currentDate < $aptDate){
	            echo 5;// appointment booked and time is upcoming
	          }else if(count($availbilityList)>0 && ($availbilityList['Appointment']['status']==1)  && $currentDate <= $aptDate && $currentTime < $end_time){
	            echo 6;// appointment booked and time is upcoming
	          }else{
				echo 0;
			}
		}else{
			if($currentDate >= $aptDate && $currentTime > $end_time){
				echo 2; //time expired without booking
			}else{
			echo 1; //Time slot availble for book
		}
			$this->Session->write('availableID', $availabilityID);
		}
	exit();
	}
	/**
 * Appointment booked Chk method
 * Author Chittaranjan Sahoo
 * Date : 24th Dec 2015
 * Description: check appointment
 * @return void
 */
	/*public function chkappointmentAvl(){

		$doctorid = $this->Session->read('loginID');
		$availabilityDetail=$this->request->data['availabilityDetail'];
		$availArr=explode("::",$availabilityDetail);
		$availabilityID=$availArr[0];
		$aptDate=$availArr[1];
		$this->loadModel('Appointment');
		//'patientid'=>$patientid,
		$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate)));
		if(count($availbilityList)>0 && $availbilityList['Appointment']['status']==1){
			//echo $availbilityList['Appointment']['id'];
			$response = array('errmsg' =>1, 'apptid' => $availbilityList['Appointment']['id']);
		}else if(count($availbilityList)>0 && $availbilityList['Appointment']['status']==0){
			$response = array('errmsg' =>2, 'apptid' => $availbilityList['Appointment']['id']);
		}else if(count($availbilityList)>0 && $availbilityList['Appointment']['status']==2){
			$response = array('errmsg' =>0);
		}else{
			$response = array('errmsg' =>0);
		}
		echo json_encode($response);
	exit();
	}*/

	public function chkappointmentAvl(){

		$doctorid = $this->Session->read('loginID');
		$availabilityDetail=$this->request->data['availabilityDetail'];
		$this->loadModel('Appointment');
		$this->loadModel('DoctoravailableSlot');
		$currentTime=date("H:i:s");

		$availArr=explode("::",$availabilityDetail);
		//pr($availArr);exit;
		$chkSlotAvail=$availArr[2];
		if($chkSlotAvail == "slot_available"){
			$availabilitySlotID=$availArr[0];
			$aptDate=$availArr[1];
			$start_time=$availArr[3];
			$end_time=$availArr[4];
			$availabilityID=$availArr[5];
			$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'appoint_book_slut'=>$availabilitySlotID,'date(appointment_date)' => $aptDate)));
			$this->Session->write('availabilitySlotID', $availabilitySlotID);
		}else{
			$availabilityID=$availArr[0];
			$aptDate=$availArr[1];
			$start_time=$availArr[3];
			$end_time=$availArr[4];
			$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate)));
		}

		//'patientid'=>$patientid,
		//$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate)));
		if(count($availbilityList)>0 && $availbilityList['Appointment']['status']==1){
			//echo $availbilityList['Appointment']['id'];
			$response = array('errmsg' =>1, 'apptid' => $availbilityList['Appointment']['id']);
		}else if(count($availbilityList)>0 && $availbilityList['Appointment']['status']==0){
			$response = array('errmsg' =>2, 'apptid' => $availbilityList['Appointment']['id']);
		}else if(count($availbilityList)>0 && $availbilityList['Appointment']['status']==2){
			$response = array('errmsg' =>0);
		}else{
			$response = array('errmsg' =>0);
		}
		echo json_encode($response);
	exit();
	}

/**
 * check_appointmnet_session method
 * Author Rajesh Sahoo
 * Date : 23rd Dec 2015
 * Description: Checking Appointment
 * @return void
 */
	public function check_appointmnet_session(){
		$this->loadModel('MasterUser');
		$this->loadModel('Appointment');
		$this->loadModel('DoctorAvailability');
		$this->loadModel('DoctoravailableSlot');
		$cur_date=date('Y-m-d');
		$cur_time=date("H:i:s");
		$id=$this->Session->read('loginID');
		//echo $id;exit;
		$userDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$id)));
		if($userDetail['MasterUser']['is_online']==1){	//Check For Login Status
		 		$userType=$userDetail['MasterUser']['login_tytpe'];
		 		if($userType=="D"){		//Doctor login
		 			$AppointmentDetatils=$this->Appointment->find('all',array('conditions'=>array('doctorid'=>$id , 'appointment_date'=>$cur_date ,'status'=>1)));
		 			//pr($AppointmentDetatils);
		 			if(!empty($AppointmentDetatils) && count($AppointmentDetatils)>0){	//Check Whether Doctor is available for that day

			 			 	foreach($AppointmentDetatils as $AppointmentDetatil){

							$patientDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatil['Appointment']['patientid'])));
			 				if($patientDetail['MasterUser']['is_online']==1){ 	//Check whether patient is online or not

			 			 		 $AvailabityId=$AppointmentDetatil['Appointment']['appointment_availbility'];
			 			 		 $AvailableSlotId=$AppointmentDetatil['Appointment']['appoint_book_slut'];
			 			 		 $checkAvailabity=$this->DoctorAvailability->find('first', array('conditions' => array('id'=>$AvailabityId,'doctor_id' => $id,'status' => 1,'start_time <='=>$cur_time,'end_time >='=>$cur_time
									, 'date(app_date)'=>$cur_date )));

								//pr($checkAvailabity);
			 			 		 if(!empty($checkAvailabity)){	//Check the time for Appointment within doctor available
			 			 		 	//$session_appointment_staus='true';

		 			 		 		$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'doc_id'=>$id,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));
		 			 		 		if(!empty($checkAvailabitySlot)){
		 			 		 			//pr($checkAvailabitySlot);exit;
		 			 		 			$session_status_type=$AppointmentDetatil['Appointment']['session_status_type'];
		 			 		 			$session_join_status=$AppointmentDetatil['Appointment']['join_status'];

		 			 		 			if($session_join_status== '0' || $session_join_status== '1' ){
			 			 		 			//$this->set('AvailabityTimeId', $AvailabityId);
				 			 		 		$this->Session->write('AvailabityTimeId',$AvailabityId);
				 			 		 		$this->Session->write('AvailabitySlotId',$AvailableSlotId);
				 			 		 		if($session_status_type==NULL){
				 			 		 			echo  $session_appointment_staus="create";
					 			 		 	}else if($session_status_type=='P'){
					 			 		 		echo  $session_appointment_staus="join";
					 			 		 	}
			 			 		 		}
		 			 		 		}
			 			 		 	//echo $session_join_status;
			 			 		 }
			 			 	}
			 			 }
		 			 }else{
		 			 	echo $session_appointment_staus='false';	//No Appointment For that Day
		 			 }
		 		}else{	//patient login
		 			$AppointmentDetatils=$this->Appointment->find('all',array('conditions'=>array('patientid'=>$id , 'appointment_date'=>$cur_date ,'status'=>1)));
		 			//pr($AppointmentDetatils);

	 					if(!empty($AppointmentDetatils) && count($AppointmentDetatils)>0){	//Check Whether Doctor is available for that day


		 			 			foreach($AppointmentDetatils as $AppointmentDetatil){

									$docDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatil['Appointment']['doctorid'])));	 			 						if($docDetail['MasterUser']['is_online']==1){
				 			 		 $AvailabityId=$AppointmentDetatil['Appointment']['appointment_availbility'];
				 			 		 $AvailableSlotId=$AppointmentDetatil['Appointment']['appoint_book_slut'];
				 			 		 $doc_id=$AppointmentDetatil['Appointment']['doctorid'];

				 			 		 $checkAvailabity=$this->DoctorAvailability->find('first', array('conditions' => array('id'=>$AvailabityId,'doctor_id' => $doc_id,'status' => 1,'start_time <='=>$cur_time,'end_time >='=>$cur_time
										, 'date(app_date)'=>$cur_date )));

				 			 		 if(!empty($checkAvailabity)){	//Check the time for Appointment

					 			 		$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'doc_id'=>$doc_id,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));
			 			 		 		if(!empty($checkAvailabitySlot)){
			 			 		 			//pr($checkAvailabitySlot);exit;
			 			 		 			$session_status_type=$AppointmentDetatil['Appointment']['session_status_type'];
			 			 		 			$session_join_status=$AppointmentDetatil['Appointment']['join_status'];

			 			 		 			if($session_join_status== '0' || $session_join_status== '1' ){
				 			 		 			//$this->set('AvailabityTimeId', $AvailabityId);
					 			 		 		$this->Session->write('AvailabityTimeId',$AvailabityId);
					 			 		 		$this->Session->write('AvailabitySlotId',$AvailableSlotId);
					 			 		 		if($session_status_type==NULL){
					 			 		 			echo  $session_appointment_staus="create";
						 			 		 	}else if($session_status_type=='D'){
						 			 		 		echo  $session_appointment_staus="join";
						 			 		 	}
				 			 		 		}
			 			 		 		}
				 			 		 }
				 			 	}
				 			}
			 			 }else{
			 			 	echo $session_appointment_staus='false';	//No Appointment For that Day
			 			 }
		 			}



		 		}

		exit;
	}

/**
 * create_session method
 * Author Rajesh Sahoo
 * Date : 24th Dec 2015
 * Description: Create Session With Doctor or Patient
 * @return void
 */
	public function create_session(){
		$this->loadModel('Appointment');
		$this->loadModel('DoctoravailableSlot');
		$this->loadModel('MasterUser');
		$loginID=$this->Session->read('loginID');
		$userType=$this->Session->read('loginType');
		$AvailabityTimeId=$this->Session->read('AvailabityTimeId');
		$AvailableSlotId=$this->Session->read('AvailabitySlotId');
		$cur_date=date('Y-m-d');
		$cur_time=date("H:i:s");

		if($userType=="D"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('doctorid'=>$loginID , 'appointment_date'=>$cur_date ,'appointment_availbility'=>$AvailabityTimeId,'appoint_book_slut'=>$AvailableSlotId ,'status'=>1)));
			if(!empty($AppointmentDetatils)){
				$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));
				$patientDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatils['Appointment']['patientid'])));
		 		if($patientDetail['MasterUser']['is_online']==1){	//Chek whether patient is online..

					if(!empty($checkAvailabitySlot)){
					 	$this->Appointment->id = $AppointmentDetatils['Appointment']['id'];
						if($this->Appointment->saveField('join_status', 1)){
							$this->Appointment->saveField('session_status_type', $userType);
							echo 1;
						}
					}
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}
		}else{
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('patientid'=>$loginID , 'appointment_date'=>$cur_date,'appointment_availbility'=>$AvailabityTimeId ,'appoint_book_slut'=>$AvailableSlotId ,'status'=>1)));

			if(!empty($AppointmentDetatils)){
				$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));
				$docDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatils['Appointment']['doctorid'])));
		 		if($docDetail['MasterUser']['is_online']==1){	//Chek whether doctor is online..

					if(!empty($checkAvailabitySlot)){
					 	$this->Appointment->id = $AppointmentDetatils['Appointment']['id'];
						if($this->Appointment->saveField('join_status', 1)){
							$this->Appointment->saveField('session_status_type', $userType);
							echo 1;
						}
					}
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}
		}
		exit();
	}

/**
 * Join Session method
 * Author Rajesh Sahoo
 * Date : 24th Dec 2015
 * Description: Create Session With Doctor or Patient
 * @return void
 */
	public function join_session(){
		$this->loadModel('Appointment');
		$this->loadModel('DoctoravailableSlot');
		$this->loadModel('MasterUser');
		$loginID=$this->Session->read('loginID');
		$userType=$this->Session->read('loginType');
		$AvailabityTimeId=$this->Session->read('AvailabityTimeId');
		$AvailableSlotId=$this->Session->read('AvailabitySlotId');
		$cur_date=date('Y-m-d');
		$cur_time=date("H:i:s");


		if($userType=="D"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('doctorid'=>$loginID , 'appointment_date'=>$cur_date ,'appointment_availbility'=>$AvailabityTimeId ,'appoint_book_slut'=>$AvailableSlotId ,'status'=>1)));

			if(!empty($AppointmentDetatils)){
				$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));
				$patientDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatils['Appointment']['patientid'])));
		 		if($patientDetail['MasterUser']['is_online']==1){	//Chek whether doctor is online..
					if(!empty($checkAvailabitySlot)){

						$this->Appointment->id = $AppointmentDetatils['Appointment']['id'];
						if($this->Appointment->saveField('join_status', 2)){
							echo 1;
						}
					}
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}

		}else if($userType=="P"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('patientid'=>$loginID , 'appointment_date'=>$cur_date,'appointment_availbility'=>$AvailabityTimeId ,'appoint_book_slut'=>$AvailableSlotId ,'status'=>1)));

			if(!empty($AppointmentDetatils)){
				$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));
				$docDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatils['Appointment']['doctorid'])));
		 		if($docDetail['MasterUser']['is_online']==1){	//Chek whether doctor is online..
					if(!empty($checkAvailabitySlot)){

						$this->Appointment->id = $AppointmentDetatils['Appointment']['id'];
						if($this->Appointment->saveField('join_status', 2)){
							echo 1;
						}
					}
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}

		}
		exit();
	}

	/**
 * Join Session method
 * Author Rajesh Sahoo
 * Date : 24th Dec 2015
 * Description: Create Session With Doctor or Patient
 * @return void
 */
	public function chk_session_stat(){
		$this->loadModel('Appointment');
		$this->loadModel('DoctoravailableSlot');
		$this->loadModel('MasterUser');
		$loginID=$this->Session->read('loginID');
		$userType=$this->Session->read('loginType');
		$AvailabityTimeId=$this->Session->read('AvailabityTimeId');
		$AvailableSlotId=$this->Session->read('AvailabitySlotId');
		$cur_date=date('Y-m-d');
		$cur_time=date("H:i:s");

		if($userType=="D"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('doctorid'=>$loginID , 'appointment_date'=>$cur_date ,'appointment_availbility'=>$AvailabityTimeId ,'appoint_book_slut'=>$AvailableSlotId,'status'=>1)));

			if(!empty($AppointmentDetatils)){
				$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));

				$patientDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatils['Appointment']['patientid'])));
		 		if($patientDetail['MasterUser']['is_online']==1){	//Chek whether doctor is online..

					if(!empty($checkAvailabitySlot)){
						echo $AppointmentDetatils['Appointment']['join_status'];
					}
				}
			}else{
				echo 0;
			}

		}else if($userType=="P"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('patientid'=>$loginID , 'appointment_date'=>$cur_date,'appointment_availbility'=>$AvailabityTimeId  ,'appoint_book_slut'=>$AvailableSlotId,'status'=>1)));

			if(!empty($AppointmentDetatils)){
				$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId,'start_time <='=>$cur_time,'end_time >='=>$cur_time)));

				$docDetail=$this->MasterUser->find('first',array('conditions'=>array('id'=>$AppointmentDetatils['Appointment']['doctorid'])));
		 		if($docDetail['MasterUser']['is_online']==1){
					if(!empty($checkAvailabitySlot)){
						echo $AppointmentDetatils['Appointment']['join_status'];
					}
				}
			}else{
				echo 0;
			}

		}
		exit();
	}

/**
 * uploadtestlist method
 * Author Rajesh
 * Date : 26-02-2016
 * @return void
 */
	public function uploadtestlist(){
		if($this->Session->read('loginType') != 'D'){
			$this->redirect(array('action' => 'index'));
		}
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');

		$this->loadModel('LabtestReport');
		$this->loadModel('DiagnosysReport');
		//$testReportDet=$this->LabtestReport->find('all', array('conditions' => array('doctorid' => $loginID , 'status'=>1),'order'=>array('id'=>'desc')));
		$testReportDet=$this->LabtestReport->find('all', array(
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'diagnosys_reports',
	                        'alias' => 'DiagnosysReport',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('LabtestReport.diagnosis_id = DiagnosysReport.id')
	                    ),
					 ),
				'conditions' => array('DiagnosysReport.doctorid' => $loginID)));
		$this->set('testReportDet', $testReportDet);
		//pr($testReportDet);exit;

		$this->layout="manage_appointment";
	}



/**
 * uploadtestlist method
 * Author Rajessh
 * Date : 26-02-2016
 * @return void
 */
public function edituploadtest($id){
		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->loadModel('UploadtestResult');
			$voptions = array('conditions' => array('UploadtestResult.' . $this->UploadtestResult->primaryKey => $id));
			$resultTest = $this->UploadtestResult->find('first', $voptions);

			if($this->request->data['UploadtestResult']['uploaded_file']['name']!='')
			{
				$testimg=time().$this->request->data['UploadtestResult']['uploaded_file']['name'];
				move_uploaded_file($this->request->data['UploadtestResult']['uploaded_file']['tmp_name'],WWW_ROOT.'files/testresult/'.$testimg);
				$this->request->data['UploadtestResult']['uploaded_file']=$testimg;
				@unlink(WWW_ROOT.'files/news/'.$resultTest['UploadtestResult']['uploaded_file']);
			}else{
				$this->request->data['UploadtestResult']['uploaded_file']=$resultTest['UploadtestResult']['uploaded_file'];
			}

			$loginID=$this->Session->read('loginID');
			$this->request->data['UploadtestResult']['userid']=$loginID;
			$this->request->data['UploadtestResult']['status']=1;

			//$this->UploadtestResult->create();
			//pr($this->request->data);exit;
			if ($this->UploadtestResult->save($this->request->data)) {
				$this->Session->setFlash(__('Test result uploaded successfully'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Test result uploading failed'));
			}
		}else{
			$this->loadModel('UploadtestResult');
			$options = array('conditions' => array('UploadtestResult.' . $this->UploadtestResult->primaryKey => $id));
			$this->request->data = $this->UploadtestResult->find('first', $options);
		}
		$this->loadModel('MasterUser');
		$doctorList=array('' => 'Select Doctor');
		$doctorList +=$this->MasterUser->find('list', array('conditions' => array('status' => 1, 'login_tytpe' => 'D')));
		$this->set('doctorList', $doctorList);
		$this->layout="add_appointment";
	}
/**
 * savediagnosys method
 * Author Rajessh
 * Date : 30th Dec 2015
 * @return void
 */
	public function savediagnosys(){

		if($this->Session->read('loginType')== 'P' || $this->Session->read('loginType')== 'H' || $this->Session->read('loginType')== 'PH' || $this->Session->read('loginType')== 'L'){
			$this->redirect(array('action' => 'index'));
		}
		$this->loadModel('TestMaster');
		$testList=array('' => 'Select Tests');
		$testList += $this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testList', $testList);


		/*$testList=$this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);
		pr($testList);exit;*/
		if ($this->request->is('post')) {
			//pr($this->request->data);exit;
			$loginID=$this->Session->read('loginID');
			$this->request->data['DiagnosysReport']['doctorid']=$loginID;
			$this->request->data['DiagnosysReport']['status']=1;
			$this->loadModel('DiagnosysReport');

			$testid=$this->request->data['DiagnosysReport']['testid'];
			if(!empty($testid)){
				$this->request->data['DiagnosysReport']['testid'] = implode(",",$testid);
			}

			$this->DiagnosysReport->create();
			if ($this->DiagnosysReport->save($this->request->data)) {
				$insertID = $this->DiagnosysReport->getLastInsertId();
				//Test result save functionality============
				/*$this->loadModel('DiagnosysTest');
				$testid = $this->request->data['DiagnosysTest']['testid'];
				$test_res = $this->request->data['DiagnosysTest']['test_res'];
				if(!empty($testid)){
					foreach($testid as $testIndex => $testVal){
						$this->DiagnosysTest->create();
						$save=$this->DiagnosysTest->save(array('diagnosys_id' => $insertID, 'test_type' => $testVal, 'test_result' => $test_res[$testIndex]));
					}
				}*/
				//==========================================
				$this->Session->setFlash(__('Test result Saved successfully'));
				//return $this->redirect(array('action' => 'index'));
				unset($this->request->data);
			} else {
				$this->Session->setFlash(__('Test result saving failed'));
			}
		}

		$loginID=$this->Session->read('loginID');
		$this->loadModel('MasterUser');
		$patientList=array('' => 'Select Patient');

		//echo $this->Session->read('doc_type');
#=====check the doctor type===========

		$doc_det=$this->MasterUser->find('first',array('conditions'=>array('id'=>$this->Session->read('loginID'))));

		if($doc_det['MasterUser']['doc_type']== '1'){

			 $patientList +=$this->MasterUser->find('list', array(
			'joins' => array(
				        array(
				            'table' => 'regular_appointments',
				            'alias' => 'Appointment',
				            'type' => 'LEFT',
				            'conditions' => array(
				                'Appointment.patientid = MasterUser.id'
				            )
				        )
				    ),
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'P', 'Appointment.doctorid' => $loginID, 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		}
		else
		{

		$patientList +=$this->MasterUser->find('list', array(
			'joins' => array(
				        array(
				            'table' => 'appointments',
				            'alias' => 'Appointment',
				            'type' => 'LEFT',
				            'conditions' => array(
				                'Appointment.patientid = MasterUser.id'
				            )
				        )
				    ),
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'P', 'Appointment.doctorid' => $loginID, 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		}
		$this->set('patientList', $patientList);
		$this->layout="add_appointment";
	}

/**
 * uploadtestlist method
 * Author Rajessh
 * Date : 29th Dec 2015
 * @return void
 */
	public function diagnosyslist(){
		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');

		$this->loadModel('DiagnosysReport');

		$ReportDet=$this->DiagnosysReport->find('all', array('conditions' => array('patientid' => $loginID)));

		$this->set('diagnosysReportDet', $ReportDet);

		$this->layout="manage_appointment";
	}

/**
 * viewdiagnosys method
 * Author Rajessh
 * Date : 30th Dec 2015
 * @return void
 */
	public function viewdiagnosys($id = null) {
		$this->loadModel('DiagnosysReport');
		if (!$this->DiagnosysReport->exists($id)) {
			throw new NotFoundException(__('Invalid Diagnosys Report'));
		}
		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}

		$options = array('conditions' => array('DiagnosysReport.' . $this->DiagnosysReport->primaryKey => $id));
		$this->set('diagnosysReport', $this->DiagnosysReport->find('first', $options));

		$this->layout="manage_appointment";
	}

/**
 * editprofilehospital method
 * Author Rajesh
 * Date : 4th Jan 2016
 * @return void
 */
	public function editprofilehospital($id = null){
		$this->loadModel('MasterHospital');
		$loginID=$this->Session->read('loginID');
		$id=$loginID;


		if ($this->request->is(array('post', 'put'))) {
			$options = array('conditions' => array('MasterHospital.' . $this->MasterHospital->primaryKey => $id));
			$userData = $this->MasterHospital->find('first', $options);
			$this->request->data['MasterHospital']['user_name']=$userData['MasterHospital']['user_name'];
			$this->request->data['MasterHospital']['user_pass']=$userData['MasterHospital']['user_pass'];

			if ($this->MasterHospital->save($this->request->data)) {

					//===========User meta field Add functionality==================
					if(isset($this->request->data['attr_field'])){
						$attr_field = $this->request->data['attr_field'];
						$insertID = $this->request->data['MasterHospital']['id'];
							if(!empty($attr_field)){
								$this->loadModel('UserMeta');
								foreach ($attr_field as $attrIndex => $attrValue) {
									$metaChk = $this->UserMeta->find('first', array('conditions' => array('meta_key' => $attrIndex, 'user_id' => $insertID)));
									//========Passport Photo upload functionality=========
									if($attrIndex=='hospital_logo'){
										$fileData=$attrValue;
										if($fileData['name']!='')
										{
											if(count($metaChk)>0){
												@unlink(WWW_ROOT.'files/hospital_logo/'.$metaChk['UserMeta']['meta_value']);
											}
											$profileImg=time().$fileData['name'];
											move_uploaded_file($fileData['tmp_name'],WWW_ROOT.'files/hospital_logo/'.$profileImg);
											$attrValue=$profileImg;
										}else{
											if(count($metaChk)>0){
												$attrValue=$metaChk['UserMeta']['meta_value'];
											}else{
												$attrValue='';
											}
										}
									}
									//===========================================================

									if(count($metaChk)>0){
										$metaFields=array('id' => $metaChk['UserMeta']['id'], 'user_id' => $insertID, 'meta_key' => $attrIndex, 'meta_value' => $attrValue);
										$this->UserMeta->save($metaFields);
									}else{
										$metaFields=array('user_id' => $insertID, 'meta_key' => $attrIndex, 'meta_value' => $attrValue);
										$this->UserMeta->create();
										$this->UserMeta->save($metaFields);
									}
								}
							}

						}

					//==================================================================


					//===========Hospital Detail Save functionality===================

						//==============Modified Code===============//
						$this->loadModel('Hospital');
						$hospitalChk = $this->Hospital->find('first', array('conditions' => array('user_id' => $id)));
						$this->Hospital->id = $hospitalChk['Hospital']['id'];
						$this->Hospital->save($this->request->data);
						//==========================================//
					//==================================================================
					$this->Session->setFlash(__('Profile updated successfully'));
					//return $this->redirect(array('action' => 'index'));
				}else {
					$this->Session->setFlash(__('The hospital detail could not be saved. Please fill all required field to proceed.'));
				}

		}else{
			$options = array('conditions' => array('MasterHospital.' . $this->MasterHospital->primaryKey => $id));
			$this->request->data = $this->MasterHospital->find('first', $options);
		}
		$this->layout='add_appointment';
		$this->set('id', $loginID);
	}

	/**
 * selectdoctorhospital method
 * Author Rajesh Kumar Sahoo
 * Date : 4th Jan 2016
 * Description: Select doctor for appointment
 * @return void
 */
	/*public function selectdoctorhospital(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')  ){
			$this->redirect(array('action' => 'index'));
		}

		$this->set('title_for_layout','Select Doctor');
		$loginID=$this->Session->read('loginID');
		if($this->request->is('post')){
			$doctorid=$this->request->data['Appointment']['doctorid'];
			$serviceid=$this->request->data['Appointment']['serviceid'];
			$patientid=$this->request->data['Appointment']['patientid'];
			$this->Session->write('doctorid',$doctorid);
			$this->Session->write('appt_serviceid',$serviceid);
			$this->Session->write('patientid',$patientid);
			$this->redirect(array('action' => 'availabilitydatehospital'));
		}else{
			//=========Service List fetch=========

			$this->loadModel('ServiceType');
			$serviceList = array('' => 'Select Services');
			$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
			$this->set('serviceList', $serviceList);
				//=========Doctor List fetch=========
			if($this->Session->check('doctorid')){
				$this->request->data['Appointment']['doctorid']=$this->Session->read('doctorid');
			}
			$this->loadModel('MasterUser');
			$doctorList = array('' => 'Select Doctor');
			$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1), 'order' => array('fname' => 'asc')));
			$this->set('doctorList', $doctorList);

			//=========Patient List fetch=========
			if($this->Session->check('patientid')){
				$this->request->data['Appointment']['patientid']=$this->Session->read('patientid');
			}

			//==================================
			$this->loadModel('Hospital');
			$hospitalDet=$this->Hospital->find('first', array('conditions' => array('user_id'=>$loginID)));
			$hospitalId=$hospitalDet['Hospital']['id'];

			$this->loadModel('UserMeta');
			$UserMetaDets=$this->UserMeta->find('all', array('conditions' => array('meta_key'=>'hospitalid','meta_value'=>$hospitalId)));
			$userArr=array();
			foreach ($UserMetaDets as $UserMetaDet) {
				array_push($userArr, $UserMetaDet['UserMeta']['user_id']);
			}
			if(!empty($userArr)){
				$patientList = array('' => 'Select Patient');
				$patientList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'P', 'status' => 1 , 'id'=>$userArr), 'order' => array('fname' => 'asc')));
				$this->set('patientList', $patientList);
			}

			//pr($patientList);exit;
		}

		$this->layout="add_appointment";

	}*/

/**
 * availabilitydatehospital method
 * Author Rajesh Kumar Sahoo
 * Date : 4th jan 2016
 * Description: availbility date and time show according to the Doctor
 * @return void
 */
	/*public function availabilitydatehospital(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}
		if((!$this->Session->check('doctorid'))&&(!$this->Session->check('patientid'))){
			$this->redirect(array('action' => 'selectdoctorhospital'));
		}
		$doctor_id = $this->Session->read('doctorid');
		$patient_id = $this->Session->read('patientid');
		$this->loadModel('DoctorAvailability');
		$availbilityList=$this->DoctorAvailability->find('all', array('conditions' => array('status' => 1,'doctor_id' => $doctor_id)));
		$this->set('availbilityList', $availbilityList);
		$this->layout="add_appointment";

	}*/

/**
 * chkavailabilityhospital Chk method
 * Author Rajesh kumar Sahoo
 * Date : 23rd Dec 2015
 * Description: availbility date and time show according to the Doctor
 * @return void
 */
	public function chkavailabilityhospital(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'selectdoctorhospital'));
		}
		$loginType=$this->Session->read('loginType');
		if($loginType=='H'){
			$patientid = $this->Session->read('patientid');
		}else{
			$patientid = $this->Session->read('loginID');
		}

		$doctorid = $this->Session->read('doctorid');

		$availabilityDetail=$this->request->data['availabilityDetail'];
		$availArr=explode("::",$availabilityDetail);
		$availabilityID=$availArr[0];
		$aptDate=$availArr[1];
		$this->loadModel('Appointment');
		//'patientid'=>$patientid,
		$availbilityList=$this->Appointment->find('first',array('conditions'=>array('doctorid' => $doctorid, 'appointment_availbility' => $availabilityID,'date(appointment_date)' => $aptDate, 'status IN' => array(1, 0))));
		if(count($availbilityList)>0){
			echo 0;
		}else{
			echo 1;
			$this->Session->write('availableID', $availabilityID);
		}
	exit();
	}

/**
 * addappointmenthospital method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function addappointmenthospital(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}
		if((!$this->Session->check('doctorid'))&&(!$this->Session->check('patientid'))){
			$this->redirect(array('action' => 'selectdoctorhospital'));
		}

		if(!$this->Session->check('appt_serviceid')){
			$this->redirect(array('action' => 'selectdoctorhospital'));
		}
		if(!$this->Session->check('availableID')){
			$this->redirect(array('action' => 'availabilitydatehospital'));
		}

		//echo 1;exit;
		$loginID=$this->Session->read('loginID');
		$this->Dashboard->recursive = 0;
		//=========Location List fetch=========
		$this->loadModel('Location');
		$locationList = array('' => 'Select Location');
		$locationList += $this->Location->find('list', array('order' => array('location_name' => 'asc')));
		$this->set('locationList', $locationList);
		//=========Service List fetch=========
		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1), 'order' => array('fname' => 'asc')));
		$this->set('doctorList', $doctorList);
		//=========Availability List fetch=========
		$this->loadModel('DoctorAvailability');
		$availabilityList = array('' => 'Select Time');
		$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('status' => 1), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		$this->set('availabilityList', $availabilityList);

		//=========Patient List fetch According To Hospital=========
		$this->loadModel('Hospital');
		$hospitalDet=$this->Hospital->find('first', array('conditions' => array('user_id'=>$loginID)));
		$hospitalId=$hospitalDet['Hospital']['id'];

		$this->loadModel('UserMeta');
		$UserMetaDets=$this->UserMeta->find('all', array('conditions' => array('meta_key'=>'hospitalid','meta_value'=>$hospitalId)));
		$userArr=array();
		foreach ($UserMetaDets as $UserMetaDet) {
			array_push($userArr, $UserMetaDet['UserMeta']['user_id']);
		}

		$patientList = array('' => 'Select Patient');
		$patientList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'P', 'status' => 1 , 'id IN'=>$userArr), 'order' => array('fname' => 'asc')));
		$this->set('patientList', $patientList);
		//==============================================

		if ($this->request->is('post')) {
			//=============Check Appointment=================
			$this->loadModel('Appointment');
			$serviceid=$this->request->data['Appointment']['serviceid'];
			if(!empty($serviceid)){
				$this->request->data['Appointment']['serviceid'] = implode(",",$serviceid);
			}
			$doc_id=$this->request->data['Appointment']['doctorid'];
			$appointment_date=$this->request->data['Appointment']['appointment_date'];
			$this->request->data['Appointment']['appointment_date'] = date("Y-m-d",strtotime($appointment_date));
			$appointment_availbility=$this->request->data['Appointment']['appointment_availbility'];
			$checkAppointment = $this->Appointment->find('all', array('conditions' => array('doctorid' => $doc_id,'status IN' => array(1,0),'appointment_availbility' => $appointment_availbility, 'date(appointment_date)'=>date("Y-m-d",strtotime($appointment_date)) ) ));

			if(count($checkAppointment)>0){
				$this->Session->setFlash(__('Appointment Already Booked !! Please try with other date/time'));
			}else{
				$this->Appointment->create();
				$this->request->data['Appointment']['patientid']=$this->Session->read('patientid');
				$this->request->data['Appointment']['status']=0;
				$this->request->data['Appointment']['hospitalid']=$this->Session->read('loginID');
				if ($this->Appointment->save($this->request->data)) {
					//==============Mail appointment to doctor==============
					$this->loadModel('MasterUser');
					$doctorSessionID=$this->Session->read('doctorid');
					$doctorRes=$this->MasterUser->find('first', array('conditions' => array('id' => $doctorSessionID)));

					/*$loginID=$this->Session->read('loginID');
					$loginType=$this->Session->read('loginType');
					$userRes=$this->MasterUser->find('first', array('conditions' => array('id' => $loginID)));*/

					$loginType=$this->Session->read('loginType');
					$patientid=$this->Session->read('patientid');
					$userRes=$this->MasterUser->find('first', array('conditions' => array('id' => $patientid)));

					$this->loadModel('Location');
				 	$locationDet=$this->Location->find('first',array('conditions'=>array('id'=>$this->request->data['Appointment']['locationid'])));
				 	$serviceString=array();
				 	if(!empty($serviceid)){
				 		foreach ($serviceid as $serviceKey => $serviceVal) {
				 			$this->loadModel('ServiceType');
				 			$serviceDet=$this->ServiceType->find('first',array('conditions'=>array('id'=>$serviceVal)));
				 			array_push($serviceString, $serviceDet['ServiceType']['service_name']);
				 		}
				 	}

				 	$availability_id = $this->request->data['Appointment']['appointment_availbility'];
				 	$this->loadModel('DoctorAvailability');
					$availabilityDetail = $this->DoctorAvailability->find('first', array('conditions' => array('status' => 1, 'id' => $availability_id)));
					$this->loadModel("Sitesetting");
					$siteDetail = $this->Sitesetting->find('first');
					$doctorMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

									<tr>

										<td align="left" colspan="3">Dear '.stripslashes($doctorRes['MasterUser']['fname'].' '.$doctorRes['MasterUser']['lname']).'</td>

									</tr>

									<tr>

									<td colspan="3">Patient '.stripslashes($userRes['MasterUser']['fname'].' '.$userRes['MasterUser']['lname']).' request an appointment from '.$siteDetail['Sitesetting']['logo_title'].'. Below are the appointment detail.</td>

									</tr>
									<tr>

									<td><strong>Location</strong></td>
									<td><strong>:</strong></td>
									<td>'.$locationDet['Location']['location_name'].'</td>

									</tr>
									<tr>

									<td><strong>Services</strong></td>
									<td><strong>:</strong></td>
									<td>'.implode(", ", $serviceString).'</td>

									</tr>
									<tr>

									<td><strong>Patient Name</strong></td>
									<td><strong>:</strong></td>
									<td>'.stripslashes($userRes['MasterUser']['fname'].' '.$userRes['MasterUser']['lname']).'</td>

									</tr>
									<tr>
									<td><strong>Appointment Date</strong></td>
									<td><strong>:</strong></td>
									<td>'.date("d-m-Y",strtotime($this->request->data['Appointment']['appointment_date'])).'</td>
									</tr>
									<tr>
									<td><strong>Appointment Time</strong></td>
									<td><strong>:</strong></td>
									<td>'.$availabilityDetail['DoctorAvailability']['start_time'].' To '.$availabilityDetail['DoctorAvailability']['end_time'].'</td>
									</tr>

									<tr>

										<td align="left">&nbsp;</td>

									</tr>

									<tr>

										<td align="left" valign="middle">Thank You</td>

									</tr>

									<tr>

										<td align="left" valign="middle">The '.$siteDetail['Sitesetting']['logo_title'].' Team</td>

									</tr>

								</table>';
								$subject="A new Appoinement from ".$siteDetail['Sitesetting']['logo_title'];
							$Email = new CakeEmail('default');
							$Email->to($doctorRes['MasterUser']['email_id']);

							$Email->subject($subject);

							//$Email->replyTo($adminemail);

							$Email->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));

							$Email->emailFormat('both');

							//$Email->headers();

							$Email->send($doctorMsg);
					//===============================
					$this->Session->delete('appt_serviceid');
					$this->Session->delete('doctorid');
					$this->Session->delete('availableID');
					$this->Session->setFlash(__('Appointment Booked successfully.'));
				} else {
					$this->Session->setFlash(__('Appointment Booking Failed'));
				}
			}
		}else{
			$this->request->data['Appointment']['serviceid']=$this->Session->read('appt_serviceid');
			$this->request->data['Appointment']['doctorid']=$this->Session->read('doctorid');
			$this->request->data['Appointment']['appointment_availbility']=$this->Session->read('availableID');
			$this->loadModel('DoctorAvailability');
			$availabledetail = $this->DoctorAvailability->find('first', array('conditions' => array('id' => $this->Session->read('availableID'))));
			if(count($availabledetail)>0){
				$this->request->data['Appointment']['appointment_date']=$availabledetail['DoctorAvailability']['app_date'];
			}
		}
		$this->set('dashboards', $this->Paginator->paginate());
		$this->layout="add_appointment";
	}
/**
 * manageappointmenthospital method
 * Author Rajesh
 * Date : 4th Jan 2016
 * @return void
 */
	/*public function manageappointmenthospital(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}

		$this->loadModel('MasterUser');
		$this->loadModel('Appointment');
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');
		$appointDet=$this->Appointment->find('all', array('conditions' => array('hospitalid' => $loginID)));
		$this->set('appointmentDetails', $appointDet);

		$this->layout="manage_appointment";
		$this->set('loginType',$loginType);
	}*/
/**
 * EditAppointment method
 * Author Rajesh
 * Date : 22nd Dec 2015
 * @return void
 */
	public function editappointmenthospital($id = null){
		$this->loadModel('Appointment');
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid appointment'));
		}

		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}
		$loginID=$this->Session->read('loginID');
		//=========Location List fetch=========
		$this->loadModel('Location');
		$locationList = array('' => 'Select Location');
		$locationList += $this->Location->find('list', array('order' => array('location_name' => 'asc')));
		$this->set('locationList', $locationList);
		//=========Service List fetch=========
		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1), 'order' => array('fname' => 'asc')));
		$this->set('doctorList', $doctorList);
		//=========Availability List fetch=========
		$this->loadModel('DoctorAvailability');
		$availabilityList = array('' => 'Select Time');
		$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('status' => 1), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		$this->set('availabilityList', $availabilityList);

		//=========Patient List fetch According To Hospital=========
		$this->loadModel('Hospital');
		$hospitalDet=$this->Hospital->find('first', array('conditions' => array('user_id'=>$loginID)));
		$hospitalId=$hospitalDet['Hospital']['id'];

		$this->loadModel('UserMeta');
		$UserMetaDets=$this->UserMeta->find('all', array('conditions' => array('meta_key'=>'hospitalid','meta_value'=>$hospitalId)));
		$userArr=array();
		foreach ($UserMetaDets as $UserMetaDet) {
			array_push($userArr, $UserMetaDet['UserMeta']['user_id']);
		}

		$patientList = array('' => 'Select Patient');
		$patientList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'P', 'status' => 1 , 'id IN'=>$userArr), 'order' => array('fname' => 'asc')));
		$this->set('patientList', $patientList);
		//==============================================

		if ($this->request->is(array('post', 'put'))) {
			//=============Check Appointment=================
			$serviceid=$this->request->data['Appointment']['serviceid'];
			if(!empty($serviceid)){
				$this->request->data['Appointment']['serviceid'] = implode(",",$serviceid);
			}
				$doc_id=$this->request->data['Appointment']['doctorid'];
				$appointment_date=$this->request->data['Appointment']['appointment_date'];
				$this->request->data['Appointment']['appointment_date'] = date("Y-m-d",strtotime($appointment_date));
				$appointment_availbility=$this->request->data['Appointment']['appointment_availbility'];
				$checkAppointment = $this->Appointment->find('all', array('conditions' => array('id !=' => $this->request->data['Appointment']['id'],'doctorid' => $doc_id,'status' => 1,'appointment_availbility' => $appointment_availbility, 'date(appointment_date)'=>date("Y-m-d",strtotime($appointment_date)) ) ));
				if(count($checkAppointment)>0){
					$this->Session->setFlash(__('Appointment Already Booked. Please try another'));
					$this->request->data['Appointment']['serviceid']=$serviceid;
				}else{
					if ($this->Appointment->save($this->request->data)) {
						$this->Session->setFlash(__('Appointment Modified successfully'));
					} else {
						$this->request->data['Appointment']['serviceid']=$serviceid;
						$this->Session->setFlash(__('Appointment Modifying Failed'));
					}
				}
			//===============================================
		} else {
			$options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
			$this->request->data = $this->Appointment->find('first', $options);
			$this->request->data['Appointment']['serviceid'] = (!empty($this->request->data['Appointment']['serviceid']))?explode(",",$this->request->data['Appointment']['serviceid']) : '';
			//=========Doctor List fetch=========
			$this->loadModel('MasterUser');
			$doctorList = array('' => 'Select Doctor');
			$doctorList += $this->MasterUser->find('list', array(
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'assign_services',
	                        'alias' => 'AssignService',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = AssignService.userid')
	                    ),
					 ),
				'conditions' => array('MasterUser.login_tytpe' => 'D', 'MasterUser.status' => 1), 'order' => array('MasterUser.fname' => 'asc')));
			$this->set('doctorList', $doctorList);
			//=========Availability List fetch=========
			$this->loadModel('DoctorAvailability');
			$availabilityList = array('' => 'Select Time');
			$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $this->request->data['Appointment']['appointment_date'], 'DoctorAvailability.doctor_id' => $this->request->data['Appointment']['doctorid']), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
			$this->set('availabilityList', $availabilityList);
		}
		$this->layout='add_appointment';

	}
/**
 * viewhospitaldoctors method list doctors under that hopital
 * Author Rajesh
 * Date : 4th Jan 2016
 * @return void
 */
	public function viewhospitaldoctors(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}
		$this->set('title_for_layout','View Doctors');

		$loginID=$this->Session->read('loginID');
		$this->loadModel('Hospital');
		$hospitalDet=$this->Hospital->find('first', array('conditions' => array('user_id'=>$loginID)));
		$hospitalId=$hospitalDet['Hospital']['id'];

		$this->loadModel('UserMeta');
		$UserMetaDets=$this->UserMeta->find('all', array('conditions' => array('meta_key'=>'hospitalid','meta_value'=>$hospitalId)));
		$userArr=array();
		foreach ($UserMetaDets as $UserMetaDet) {
			array_push($userArr, $UserMetaDet['UserMeta']['user_id']);
		}
		if(!empty($userArr)){
			$docList = $this->MasterUser->find('all', array('conditions' => array('login_tytpe' => 'D', 'status' => 1 , 'id'=>$userArr), 'order' => array('fname' => 'asc')));
			$this->set('docList', $docList);
		}
		$this->layout="manage_appointment";
	}
/**
 * viewhospitalpatients method list Patients under that hopital
 * Author Rajesh
 * Date : 4th Jan 2016
 * @return void
 */
	public function viewhospitalpatients(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}
		$this->set('title_for_layout','View Patients');

		$loginID=$this->Session->read('loginID');
		$this->loadModel('Hospital');
		$hospitalDet=$this->Hospital->find('first', array('conditions' => array('user_id'=>$loginID)));
		$hospitalId=$hospitalDet['Hospital']['id'];

		$this->loadModel('UserMeta');
		$UserMetaDets=$this->UserMeta->find('all', array('conditions' => array('meta_key'=>'hospitalid','meta_value'=>$hospitalId)));
		$userArr=array();
		if(!empty($UserMetaDets)){
			foreach ($UserMetaDets as $UserMetaDet) {
				array_push($userArr, $UserMetaDet['UserMeta']['user_id']);
			}
		}
		if(!empty($userArr)){
			$patientList = $this->MasterUser->find('all', array('conditions' => array('login_tytpe' => 'P', 'status' => 1 , 'id'=>$userArr), 'order' => array('fname' => 'asc')));
			$this->set('patientList', $patientList);
		}

		$this->layout="manage_appointment";
	}
/**
 * viewpatient method
 * Author Rajesh
 * Date : 4th Jan 2015
 * @return void
 */
	public function viewpatient($patientid=''){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}
		$this->loadModel('MasterUser');
		$userres=$this->MasterUser->find('first', array('conditions' => array('id' => $patientid)));
		$this->set('UserRes', $userres);
		$this->layout="view_profile";
	}
/**
 * downloadTest method used for download test report files
 * Author Rajessh
 * Date : 29th Dec 2015
 * @return void
 */
	public function downloadTest($id){
		$path =WWW_ROOT.'files/testresult/'.$id;
		$this->response->file($path, array(
	        'download' => false,
	        'name' => $id,
    	));
    return $this->response;


	}
/**
 * patienthistory method to list patient Diagnosys history
 * Author Chittaranjan sahoo
 * Date : 06-01-2016
 * @return void
 */
	public function patienthistory(){
		if(($this->Session->read('loginType') == 'H') || ($this->Session->read('loginType') == 'P') || ($this->Session->read('loginType') == 'PH') || ($this->Session->read('loginType') == 'L')){
			$this->redirect(array('action' => 'index'));
		}
		//======Last Appointment date============
		//Appointment
		//=======================================
		$this->loadModel('RegularAppointment');
		//$data11=$this->RegularAppointment->query('SELECT * FROM master_users where id='.$this->Session->read('loginID'));
		$doc_det=$this->MasterUser->find('first',array('conditions'=>array('id'=>$this->Session->read('loginID'))));
	    //pr($doc_det);
		if($doc_det['MasterUser']['doc_type']== '1' && $this->Session->read('loginType')== 'D'){

			$this->Paginator->settings=array(
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'diagnosys_reports',
	                        'alias' => 'DiagnosysReport',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('RegularAppointment.patientid=DiagnosysReport.patientid')
	                    ),
					 ),
		        'conditions' => array('RegularAppointment.doctorid' => $this->Session->read('loginID'), 'DiagnosysReport.patientid !=' => '', 'DiagnosysReport.status' => 1),
		        'group' => "DiagnosysReport.id",
		        'order' => array('DiagnosysReport.id' => 'asc'),
		        'fields' => array('DiagnosysReport.*')
			);
			$this->set('historyList', $this->Paginator->paginate('RegularAppointment'));
			/*$historyList=$this->RegularAppointment->find('all', array(
			'joins' =>
	                  array(
	                    array(
	                        'table' => 'diagnosys_reports',
	                        'alias' => 'DiagnosysReport',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('RegularAppointment.patientid=DiagnosysReport.patientid')
	                    ),
					 ),
	        'conditions' => array('RegularAppointment.doctorid' => $this->Session->read('loginID'), 'DiagnosysReport.patientid !=' => '', 'DiagnosysReport.status' => 1),
	        'group' => "DiagnosysReport.id",
	        'order' => array('DiagnosysReport.id' => 'asc'),
	        'fields' => array('DiagnosysReport.*')
			));*/
			//pr($patientList);exit;
		}
		else{

			$loginID=$this->Session->read('loginID');
			$this->loadModel('Appointment');
			/*$historyList=$this->Appointment->find('all', array(
				'joins' =>
		                  array(
		                    array(
		                        'table' => 'diagnosys_reports',
		                        'alias' => 'DiagnosysReport',
		                        'type' => 'left',
		                        'conditions'=> array('Appointment.patientid=DiagnosysReport.patientid')
		                    ),
						 ),
		        'conditions' => array('Appointment.doctorid' => $loginID, 'DiagnosysReport.patientid !=' => '', 'DiagnosysReport.status' => 1),
		        'group' => "DiagnosysReport.id",
		        'order' => array('DiagnosysReport.id' => 'asc'),
		        'fields' => array('DiagnosysReport.*')
				));*/
				$this->Paginator->settings=array(
				'joins' =>
		                  array(
		                    array(
		                        'table' => 'diagnosys_reports',
		                        'alias' => 'DiagnosysReport',
		                        'type' => 'left',
		                        'conditions'=> array('Appointment.patientid=DiagnosysReport.patientid')
		                    ),
						 ),
		        'conditions' => array('Appointment.doctorid' => $loginID, 'DiagnosysReport.patientid !=' => '', 'DiagnosysReport.status' => 1),
		        'group' => "DiagnosysReport.id",
		        'order' => array('DiagnosysReport.id' => 'asc'),
		        'fields' => array('DiagnosysReport.*')
				);
			$this->set('historyList', $this->Paginator->paginate('Appointment'));
		}
		//$this->set('historyList', $historyList);
		//pr($historyList);
		$this->layout="manage_appointment";

	}
/**
 * viewhistory method to view patient Diagnosys history Detail
 * Author Chittaranjan sahoo
 * Date : 06-01-2016
 * @return void
 */
	public function viewhistory($dignosysID=''){
		if(($this->Session->read('loginType') == 'H') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}

		$loginID=$this->Session->read('loginID');
		$this->loadModel('DiagnosysReport');
		$historyDetail=$this->DiagnosysReport->find('first', array(
	        'conditions' => array('DiagnosysReport.id' => $dignosysID, 'DiagnosysReport.status' => 1),
			));
		$this->set('historyDetail', $historyDetail);
		$this->layout="view_profile";
	}
/**
 * viewuser method to view user Detail
 * Author Chittaranjan sahoo
 * Date : 06-01-2016
 * @return void
 */
	public function viewuser($userid=''){

		$this->loadModel('MasterUser');
		$userDetail=$this->MasterUser->find('first', array(
	        'conditions' => array('MasterUser.id' => $userid, 'MasterUser.status' => 1),
			));
		$this->set('UserRes', $userDetail);
		$this->layout="view_profile";
	}
/**
 * doctoravailble method to view Availble Regular doctors
 * Author Rajesh sahoo
 * Date : 15-01-2016
 * @return void
 */
	public function doctoravailable(){
		if(($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'H')){
			$this->redirect(array('action' => 'index'));
		}

		$this->Dashboard->recursive = 0;
		$this->loadModel('MasterUser');
		$this->loadModel('DoctorAvailability');
		//$this->loadModel('RegularAppointment');
		$curdate= date('Y-m-d');
		$curtime= date("H:i:s");
		$curDay= date("D");
		$curday= strtolower($curDay);
		$availabledocs = array();
		$availbeRegulardoctors=$this->MasterUser->find('all',array(
				'fields' => array('MasterUser.id', 'MasterUser.name', 'MasterUser.idle_status','DoctorAvailability.'.$curday.'_start_time','DoctorAvailability.'.$curday.'_end_time'),
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'doctor_availability',
	                        'alias' => 'DoctorAvailability',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = DoctorAvailability.doctor_id')
	                    ),
					 ),
				'conditions' => array('MasterUser.login_tytpe' => 'D','MasterUser.is_online' => 1,'DoctorAvailability.status' => 1,'DoctorAvailability.'.$curday.'_start_time <='=>$curtime,'DoctorAvailability.'.$curday.'_end_time >='=>$curtime, 'MasterUser.status' => 1, 'MasterUser.doc_type'=>1), 'order' => array('MasterUser.fname' => 'asc')));
		foreach($availbeRegulardoctors as $availbeRegulardoc){
			array_push($availabledocs, $availbeRegulardoc['MasterUser']['id']);
		}
		/*===========Show All Full Time Doctors==========*/
		$allAvailbeRegulardoctors=$this->MasterUser->find('all',array(
				'fields' => array('MasterUser.id', 'MasterUser.name','DoctorAvailability.'.$curday.'_start_time','DoctorAvailability.'.$curday.'_end_time'),
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'doctor_availability',
	                        'alias' => 'DoctorAvailability',
	                        'type' => 'INNER',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = DoctorAvailability.doctor_id')
	                    ),
					 ),
				'conditions' => array('MasterUser.id !='=>$availabledocs,'MasterUser.login_tytpe' => 'D','DoctorAvailability.status' => 1,'MasterUser.status' => 1, 'MasterUser.doc_type'=>1,'DoctorAvailability.doc_type'=>1), 'order' => array('MasterUser.fname' => 'asc')));
		/*=====================================================*/
		//pr( $allAvailbeRegulardoctors);
		$this->set('doctorAvailablelists', $availbeRegulardoctors);
		//$this->set('doctoridlestats', $availbeRegulardoc['MasterUser']['idle_status']);
		$this->set('allregulardocs', $allAvailbeRegulardoctors);
		$this->layout="user_dashboard";
	}

/**
 * check_available_doc method for checking Available Docotr in ech 10 Sec interval
 * Author Rajesh Sahoo
 * Date : 19th Jan 2016
 * @return void
 */
	public function check_available_doc(){
		if($this->request->is('post')){
			$this->loadModel('MasterUser');
			$this->loadModel('DoctorAvailability');
			$curdate= date('Y-m-d');
			$curtime= date("H:i:s");
			$curDay= date("D");
			$curday= strtolower($curDay);
			$availabledocs = array();
			$availbeRegulardoctors=$this->MasterUser->find('all',array(
				'fields' => array('MasterUser.id', 'MasterUser.name', 'MasterUser.idle_status','DoctorAvailability.'.$curday.'_start_time','DoctorAvailability.'.$curday.'_end_time'),
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'doctor_availability',
	                        'alias' => 'DoctorAvailability',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = DoctorAvailability.doctor_id')
	                    ),
					 ),
				'conditions' => array('MasterUser.login_tytpe' => 'D','MasterUser.is_online' => 1,'DoctorAvailability.status' => 1,'DoctorAvailability.'.$curday.'_start_time <='=>$curtime,'DoctorAvailability.'.$curday.'_end_time >='=>$curtime, 'MasterUser.status' => 1, 'MasterUser.doc_type'=>1,'DoctorAvailability.doc_type'=>1), 'order' => array('MasterUser.fname' => 'asc')));

echo '<div class="row">';
			if(!empty($availbeRegulardoctors)){
                foreach($availbeRegulardoctors as $doctorAvailablelist){
                	array_push($availabledocs, $doctorAvailablelist['MasterUser']['id']);
                	/*========Set is Available to 1 =============*/
                	$this->loadModel('RegularAppointment');
                	//$this->RegularAppointment->doctorid = $doctorAvailablelist['MasterUser']['id'];
                	//$this->RegularAppointment->saveField('is_available', 1);
                	$this->RegularAppointment->updateAll(
					    array('is_available' => 1),
					    array('doctorid' => $doctorAvailablelist['MasterUser']['id'])
					);
                	/*===========================================*/

                	$totaltiming='';
					$starttiming=$doctorAvailablelist['DoctorAvailability'][$curday.'_start_time'];
					$endtiming=$doctorAvailablelist['DoctorAvailability'][$curday.'_end_time'];
					if(!empty($starttiming) && !empty($endtiming)){
						$totaltiming=$starttiming.' to '.$endtiming;
					}else{
						$totaltiming='N/A';
					}
					/*===========Check For Doctor Image===========*/
					$this->loadModel('UserMeta');
					$docImageRes=$this->UserMeta->find('first', array('conditions' => array('user_id' => $doctorAvailablelist['MasterUser']['id'], 'meta_key' => 'passport_photo')));
					if($docImageRes['UserMeta']['meta_value']!=""){
						$docImage=$this->webroot.'files/passport/'.$docImageRes['UserMeta']['meta_value'];
					}else{
						$docImage=$this->webroot.'images/docmale.png';
					}
					/*===========Check For Doctor Passport Image===========*/
					/*===========Set Doctor Available Status(online,busy,idle)===========*/
						/*=======Check doctor is busy (in conversation)=======*/
							$checkconversastion=$this->RegularAppointment->find('first', array('conditions' => array('doctorid'=>$doctorAvailablelist['MasterUser']['id'],'is_conv '=>1,'status'=>1,'is_connected'=>1,'is_available'=>1,'DATE(`created`)'=>$curdate)));
							if(count($checkconversastion)>0){
								$statsImage=$this->webroot.'images/busy_icon.png';
							}else if($doctorAvailablelist['MasterUser']['idle_status']==0){
								$statsImage=$this->webroot.'images/idle_icon.png';
							}else{
								$statsImage=$this->webroot.'images/online_icon.png';
							}
						/*=======Check doctor is busy (in conversation)====*/
					/*===========Set Doctor Available Status(online,busy,idle)===========*/
                	echo '<div class="col-md-4 col-sm-4"><a href="javascript:void(0);" onclick="return check_available_fulltime_doctor('.$doctorAvailablelist['MasterUser']['id'].');"><div class="doctoravailable_box"><img src="'.$statsImage.'"><img src="'.$docImage.'" width="128px;" height="128px;"><p>'.stripslashes(ucwords($doctorAvailablelist['MasterUser']['name'])).'</p><p>Time: '.$totaltiming.'</p></div></a></div>';
                }
            }
			echo '</div> <hr>';
#============all regular doctors==================
$allAvailbeRegulardoctors=$this->MasterUser->find('all',array(
				'fields' => array('MasterUser.id', 'MasterUser.name','DoctorAvailability.'.$curday.'_start_time','DoctorAvailability.'.$curday.'_end_time'),
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'doctor_availability',
	                        'alias' => 'DoctorAvailability',
	                        'type' => 'INNER',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = DoctorAvailability.doctor_id')
	                    ),
					 ),
				'conditions' => array('MasterUser.id !='=>$availabledocs,'MasterUser.login_tytpe' => 'D','DoctorAvailability.status' => 1,'MasterUser.status' => 1, 'MasterUser.doc_type'=>1,'DoctorAvailability.doc_type'=>1), 'order' => array('MasterUser.fname' => 'asc')));

## ================all regular doctors end============<img src="'.$this->webroot.'images/onlineicon.png">
			#================fetch all regular doctors===========#
			if(!empty($allAvailbeRegulardoctors)){
                foreach($allAvailbeRegulardoctors as $alldoctorAvailablelist){//echo 1;
					$daID=$alldoctorAvailablelist['MasterUser']['id'];
					$totaltiming='';
					$starttiming=$alldoctorAvailablelist['DoctorAvailability'][$curday.'_start_time'];
					$endtiming=$alldoctorAvailablelist['DoctorAvailability'][$curday.'_end_time'];
					if(!empty($starttiming) && !empty($endtiming)){
						$totaltiming=$starttiming.' to '.$endtiming;
					}else{
						$totaltiming='N/A';
					}
					/*===========Check For Doctor Image===========*/
					$this->loadModel('UserMeta');
					$docImageRes=$this->UserMeta->find('first', array('conditions' => array('user_id' => $alldoctorAvailablelist['MasterUser']['id'], 'meta_key' => 'passport_photo')));
					if($docImageRes['UserMeta']['meta_value']!=""){
						$docImage=$this->webroot.'files/passport/'.$docImageRes['UserMeta']['meta_value'];
					}else{
						$docImage=$this->webroot.'images/docmale.png';
					}
					/*===========Check For Doctor Passport Image===========*/
                	//echo '<div class="col-md-4 col-sm-4"><a href="javascript:void(0);" onclick="return set_appoint_fulltime_doc('.$alldoctorAvailablelist['MasterUser']['id'].');"><div class="doctoravailable_box"><img src="'.$this->webroot.'images/docmale.png"><p>'.stripslashes(ucwords($alldoctorAvailablelist['MasterUser']['name'])).'</p> <p>Time: '.$totaltiming.'</p></div></a></div>';
                	echo '<div class="col-md-4 col-sm-4"><div class="doctoravailable_box"><img src="'.$docImage.'" width="128px;" height="128px;"><p>'.stripslashes(ucwords($alldoctorAvailablelist['MasterUser']['name'])).'</p> <p>Time: '.$totaltiming.'</p></div></div>';
                }
            }

			#==============fetch all regulr doctors end==========#
		}
		exit();
	}

/**
 * Set Availabilty for full time doctor
 * Author Rajesh sahoo
 * Date : 18-01-2016
 * @return void
 */
	public function fulltimeavilability() {
		$doc_id=$this->Session->read('loginID');

		if ($this->request->is(array('post', 'put'))) {//echo 1;exit;

			$this->loadModel('DoctorAvailability');
			//=========check Whether doctor availabilty is present or not========
			$availableChk=$this->DoctorAvailability->find('first', array('conditions' => array('doc_type' => 1,'doctor_id'=>$doc_id)));
			//pr($availableChk);exit;
			$this->DoctorAvailability->create();
			$this->request->data['DoctorAvailability']['doctor_id']=$doc_id;
			$this->request->data['DoctorAvailability']['doc_type']=1;//For Full time Doctors
			$this->request->data['DoctorAvailability']['status']=1;

			if(count($availableChk)>0){
				$this->DoctorAvailability->id = $availableChk['DoctorAvailability']['id'];
				if ($this->DoctorAvailability->save($this->request->data)) {
					$this->Session->setFlash(__('Availability has been saved.'));
				} else {
					$this->Session->setFlash(__('The Availability could not be saved. Please, try again.'));
				}
			}else{
				if ($this->DoctorAvailability->save($this->request->data)) {
					$this->Session->setFlash(__('Availability has been saved.'));
				} else {
					$this->Session->setFlash(__('The Availability could not be saved. Please, try again.'));
				}
			}
		}else {
			$this->loadModel('DoctorAvailability');
			$this->request->data['DoctorAvailability']['doctor_id']=$doc_id;
			$options = array('conditions' => array('doctor_id'=>$doc_id));
			$this->request->data = $this->DoctorAvailability->find('first', $options);

		}

		$this->layout="doctor_availabilty";
	}

/**
 * check_fulltime_doctor_avail method for checking available doctors
 * Author Rajesh Sahoo
 * Date : 19th Jan 2016
 * @return void
 */
	public function check_fulltime_doctor_avail(){
		if($this->request->is('post')){
			$doctorid = $this->request->data['doctorid'];
			$this->loadModel('RegularAppointment');
			$this->loadModel('DoctorAvailability');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			$curDay= date("D");
			$curday= strtolower($curDay);
			$cur_time=date("H:i:s");

			$doc_detail=$this->DoctorAvailability->find('first', array('conditions' => array('doctor_id' => $doctorid,'status'=>1,'doc_type '=>1)));
			$doc_start_time=strtotime($doc_detail['DoctorAvailability'][$curday.'_start_time']);
			$doc_end_time=strtotime($doc_detail['DoctorAvailability'][$curday.'_end_time']);
			$available_total_time=round(abs($doc_start_time - $doc_end_time) / 60,2);
			//echo $available_total_time;exit;
			$max_patients_attend=intval($available_total_time/20);	//Maximum Patients Can Attend on that day for each patient 20 min.
			//=========Check For Toal Patient Appointed====
			$totalPatientsAppointed=$this->RegularAppointment->find('count', array('conditions' => array('doctorid' => $doctorid,'status'=>1, 'DATE(`created`)'=>$cur_date)));
			//echo $totalPatientsAppointed; echo " Max-patient: ".$max_patients_attend;exit;
			if($totalPatientsAppointed <= $max_patients_attend){

				//==============Check Whether patient has appointment or not======
				$checkPatientConnected=$this->RegularAppointment->find('first', array('conditions' => array('patientid' => $loginID,'status'=>1,'is_connected '=>1 ,'DATE(`created`)'=>$cur_date)));	//Check Whether patient is connecte to any doc
				$checkPatient=$this->RegularAppointment->find('first', array('conditions' => array('doctorid' => $doctorid,'is_conv !='=>2,'status'=>1,'patientid '=>$loginID ,'DATE(`created`)'=>$cur_date)));
				$availableChk=$this->RegularAppointment->find('all', array('conditions' => array('doctorid' => $doctorid,'is_conv !='=>2,'status'=>1,'patientid !='=>$loginID ,'DATE(`created`)'=>$cur_date)));

				if(!empty($checkPatientConnected) && count($checkPatientConnected)>0){
					$docDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $checkPatientConnected['RegularAppointment']['doctorid'],'status'=>1,'login_tytpe '=>'D')));
					echo '<p>You are already in conversation with :'.stripslashes($docDetail['MasterUser']['name']).'</p>';
				}else if(count($checkPatient)>0){
					$queNum=count($availableChk);
					echo '<p>Your Position On The Queue is :'.$checkPatient['RegularAppointment']['orderno'].' ! Please Be Patient!!</p>';
				}else if(count($availableChk)>0){
					$queNum=count($availableChk);
					//echo $queNum;  //Return que Position of the patient
					echo '<p>Your Postion On The Queue is : '.$queNum.'</p><a href="javascript:void(0);" class="btn btn-info" id="create_session1" style="text-decoration:none;" onclick="return create_queue('.$doctorid.');">Click Here To Be In Queue</a>';
				}else{
					$this->request->data['RegularAppointment']['doctorid']=$doctorid;
					$this->request->data['RegularAppointment']['patientid']=$loginID;
					$this->request->data['RegularAppointment']['is_conv']=0;
					$this->request->data['RegularAppointment']['status']=1;
					$this->request->data['RegularAppointment']['orderno']=1;
					$this->request->data['RegularAppointment']['is_connected']=1;
					$this->request->data['RegularAppointment']['is_available']=1;
					//$this->request->data['RegularAppointment']['conv_start_time']=$cur_time;

					if($this->RegularAppointment->save($this->request->data)){
						$insertID = $this->RegularAppointment->getLastInsertId();
						$this->Session->write('patientID', $loginID);
						$this->Session->write('doctorID', $doctorid);
						$this->Session->write('appoint_id', $insertID);
						echo 0;
					}
				}
			}else{
				$this->loadModel('MasterUser');
				$docDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $doctorid,'status'=>1,'login_tytpe '=>'D')));
				echo '<p>Appointment for The Doctor '.stripslashes($docDetail['MasterUser']['name']).' is not Available for Today!!</p>';
			}
		}
		exit();
	}

	/**
 * set_appoint_fulltime_doc method for book appointment to doctors who are not available
 * Author Rajesh Sahoo
 * Date : 25th Jan 2016
 * @return void
 */
	public function set_appoint_advance_fulltimedoc(){
		if($this->request->is('post')){
			$doctorid = $this->request->data['doctorid'];
			$this->loadModel('RegularAppointment');
			$this->loadModel('DoctorAvailability');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			$curDay= date("D");
			$curday= strtolower($curDay);
			$doc_detail=$this->DoctorAvailability->find('first', array('conditions' => array('doctor_id' => $doctorid,'status'=>1,'doc_type '=>1)));
			$doc_start_time=strtotime($doc_detail['DoctorAvailability'][$curday.'_start_time']);
			$doc_end_time=strtotime($doc_detail['DoctorAvailability'][$curday.'_end_time']);
			$available_total_time=round(abs($doc_start_time - $doc_end_time) / 60,2);
			$max_patients_attend=$available_total_time/20;	//Maximum Patients Can Attend on that day for each patient 20 min.

			//=========Check For Toal Patient Appointed====
			$totalPatientsAppointed=$this->RegularAppointment->find('count', array('conditions' => array('doctorid' => $doctorid,'status'=>1, 'DATE(`created`)'=>$cur_date)));
			if($totalPatientsAppointed <= $max_patients_attend){

				//==============Check Whether patient has appointment or not======
				$checkPatient=$this->RegularAppointment->find('first', array('conditions' => array('doctorid' => $doctorid,'is_conv !='=>2,'status'=>1,'patientid '=>$loginID)));
				$availableChk=$this->RegularAppointment->find('all', array('conditions' => array('doctorid' => $doctorid,'is_conv !='=>2,'status'=>1,'patientid !='=>$loginID)));

				if(count($checkPatient)>0){
					//$queNum=count($availableChk);
					echo '<p>Your Position On The Queue is :'.$checkPatient['RegularAppointment']['orderno'].' ! Please Be Patient!!</p>';
				}else if(count($availableChk)>0){
					$queNum=count($availableChk);
					//echo $queNum;  //Return que Position of the patient
					echo '<p>Your Postion On The Queue is : '.$queNum.'</p><a href="javascript:void(0);" class="btn btn-info" id="create_session1" style="text-decoration:none;" onclick="return create_queue_unavailable('.$doctorid.');">Click Here To Be In Queue</a>';
				}else{
					$this->request->data['RegularAppointment']['doctorid']=$doctorid;
					$this->request->data['RegularAppointment']['patientid']=$loginID;
					$this->request->data['RegularAppointment']['is_conv']=0;
					$this->request->data['RegularAppointment']['status']=1;
					$this->request->data['RegularAppointment']['orderno']=1;
					$this->request->data['RegularAppointment']['is_connected']=1;
					$this->request->data['RegularAppointment']['is_available']=0;

					if($this->RegularAppointment->save($this->request->data)){
						echo '<p>Your Appointment Booked Successfully !!!<br> Please Wait For doctor to Available !!</p>';
					}
				}
			}else{
				$this->loadModel('MasterUser');
				$docDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $doctorid,'status'=>1,'login_tytpe '=>'D')));
				echo '<p>Appointment for The Doctor '.stripslashes($docDetail['MasterUser']['name']).' is not Available for Today!!</p>';
			}

		}
		exit();
	}

/**
 * set_queue_patient method for seting in the que
 * Author Rajesh Sahoo
 * Date : 19th Jan 2016
 * @return void
 */
	public function set_queue_patient(){
		if($this->request->is('post')){
			$doctorid = $this->request->data['doctorid'];
			$this->loadModel('RegularAppointment');
			$this->loadModel('DoctorAvailability');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			$curDay= date("D");
			$curday= strtolower($curDay);

			$availableChk=$this->RegularAppointment->find('first', array('conditions' => array('doctorid' => $doctorid,'is_conv !='=>1,'status'=>1,'patientid !='=>$loginID,'DATE(`created`)'=>$cur_date), 'order' => array('id' => 'desc')));
			if($availableChk>0){
				$this->loadModel('RegularAppointment');
				$prevOrderNo=$availableChk['RegularAppointment']['orderno'];
				$curOrderNo=$prevOrderNo+1;
				$this->request->data['RegularAppointment']['doctorid']=$doctorid;
				$this->request->data['RegularAppointment']['patientid']=$loginID;
				$this->request->data['RegularAppointment']['is_conv']=0;
				$this->request->data['RegularAppointment']['status']=1;
				$this->request->data['RegularAppointment']['orderno']=$curOrderNo;
				$this->request->data['RegularAppointment']['is_connected']=0;
				$this->request->data['RegularAppointment']['is_available']=1;
				if($this->RegularAppointment->save($this->request->data)){
					echo 1;
				}else{
					echo 2;
				}
			}else{ //Doctor is available for conversastion
				echo 0;

			}
		}
		exit();
	}
/**
 * set_queue_patient method for seting in the que
 * Author Rajesh Sahoo
 * Date : 19th Jan 2016
 * @return void
 */
	public function set_queue_patient_unavailable_doc(){
		if($this->request->is('post')){
			$doctorid = $this->request->data['doctorid'];
			$this->loadModel('RegularAppointment');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			$availableChk=$this->RegularAppointment->find('first', array('conditions' => array('doctorid' => $doctorid,'is_conv !='=>1,'status'=>1,'patientid !='=>$loginID,'DATE(`created`)'=>$cur_date), 'order' => array('id' => 'desc')));
			if($availableChk>0){
				$this->loadModel('RegularAppointment');
				$prevOrderNo=$availableChk['RegularAppointment']['orderno'];
				$curOrderNo=$prevOrderNo+1;
				$this->request->data['RegularAppointment']['doctorid']=$doctorid;
				$this->request->data['RegularAppointment']['patientid']=$loginID;
				$this->request->data['RegularAppointment']['is_conv']=0;
				$this->request->data['RegularAppointment']['status']=1;
				$this->request->data['RegularAppointment']['orderno']=$curOrderNo;
				$this->request->data['RegularAppointment']['is_connected']=0;
				$this->request->data['RegularAppointment']['is_available']=0;
				if($this->RegularAppointment->save($this->request->data)){
					echo 1;
				}else{
					echo 2;
				}
			}else{ //Doctor is available for conversastion
				echo 0;

			}
		}
		exit();
	}
/**
 * check_available_patient method for checking available Patients
 * Author Rajesh Sahoo
 * Date : 20th Jan 2016
 * @return void
 */
	public function check_available_patient(){
		if($this->request->is('post')){
			$this->loadModel('RegularAppointment');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			$cur_time=date("H:i:s");
			//==============Check Whether patient has appointment or not======
			$checkPatient=$this->RegularAppointment->find('first', array('conditions' => array('doctorid' => $loginID,'is_conv !='=>2,'status'=>1,'is_connected'=>1,'is_available'=>1,'DATE(`created`)'=>$cur_date)));

			if(count($checkPatient)>0){
				$this->loadModel('MasterUser');
				$patientDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $checkPatient['RegularAppointment']['patientid'],'status'=>1,'login_tytpe '=>'P')));
				//echo 1;
				if(!empty($patientDetail)){
					echo '<p style="color:green;">Please <a href="javascript:void(0);" class="btn btn-info" id="create_session123" style="text-decoration:none;" onclick="return start_conv_patient('.$checkPatient['RegularAppointment']['id'].');">Click To Start Consultation</a> With '.$patientDetail['MasterUser']['name'].'</p>';
				}
			}else{
				echo 0;
			}

		}
		exit();
	}



/**
 * check_connected_patient method for checking available Patients
 * Author Rajesh Sahoo
 * Date : 20th Jan 2016
 * @return void
 */
	public function check_connected_patient(){
		if($this->request->is('post')){
			$this->loadModel('RegularAppointment');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			//==============Check Whether patient has appointment or not======
			$checkPatient=$this->RegularAppointment->find('first', array('conditions' => array('patientid' => $loginID,'is_conv '=>1,'status'=>1,'is_connected'=>1,'is_available'=>1,'DATE(`created`)'=>$cur_date)));

			if(count($checkPatient)>0){
				echo 1;
			}else{
				echo 0;
			}

		}
		exit();
	}

/**
 * check_doc_connect method for checking if the waiting patient is available for connecting to doctor
 * Author Rajesh Sahoo
 * Date : 27th Jan 2016
 * @return void
 */
	public function check_doc_connect(){
		if($this->request->is('post')){
			$this->loadModel('RegularAppointment');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			//==============Check Whether patient is connected to doctor======
			$chkconnectedPatient=$this->RegularAppointment->find('first', array('conditions' => array('patientid' => $loginID,'is_conv !='=>2,'status'=>1,'is_connected'=>1,'is_available'=>1,'DATE(`created`)'=>$cur_date)));
			if(count($chkconnectedPatient)>0){
				$this->loadModel('MasterUser');
				$docDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $chkconnectedPatient['RegularAppointment']['doctorid'],'status'=>1,'login_tytpe '=>'D')));
				if($docDetail['MasterUser']['is_online']==1){
					echo '<p> Doctor : '.ucwords(stripslashes($docDetail['MasterUser']['name'])).' is Available Now</p><a href="'.$this->webroot.'html/index2.php" class="btn btn-info" id="create_session1" style="text-decoration:none;">Click Here To Start Consultation</a>'; //ptient is connecetd to doctor
				}
			}else{
				$getpatientAppointDets=$this->RegularAppointment->find('all', array('conditions' => array('patientid' => $loginID,'is_conv !='=>2,'status'=>1,'DATE(`created`)'=>$cur_date)));
				if(!empty($getpatientAppointDets) && count($getpatientAppointDets)>0){

					foreach($getpatientAppointDets as $getpatientAppointDet){
						$query='select * from `regular_appointments` as RegularAppointment where id = (select max(id) from regular_appointments where  id < "'.$getpatientAppointDet['RegularAppointment']['id'].'" and doctorid="'.$getpatientAppointDet['RegularAppointment']['doctorid'].'" and DATE(`created`)="'.$cur_date.'")';
						//echo $query;
						$patientDet=$this->RegularAppointment->query($query);
						//pr($patientDet);
						if(!empty($patientDet)){
							if($patientDet[0]['RegularAppointment']['is_conv']==2){
								$this->loadModel('MasterUser');
								$docDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $patientDet[0]['RegularAppointment']['doctorid'],'status'=>1,'login_tytpe '=>'D')));
								if($docDetail['MasterUser']['is_online']==1){

									echo '<p class="col-md-12" style="line-height:40px;"> Doctor  '.ucwords(stripslashes($docDetail['MasterUser']['name'])).' is Available Now <a href="javascript:void(0);" class="btn btn-info" id="create_session1" style="text-decoration:none;" onclick="return set_connect_patient('.$getpatientAppointDet['RegularAppointment']['id'].');">Click Here To Start Consultation</a></p>';
								}
							}
						}

					}
				}
			}


		}
		exit();
	}
/**
 * set_appoint_queue_patient method for setting conneted patient
 * Author Rajesh Sahoo
 * Date : 20th Jan 2016
 * @return void
 */
	public function set_appoint_queue_patient(){
		if($this->request->is('post')){
			$this->loadModel('RegularAppointment');
			$id = $this->request->data['id'];
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');

			$appointDet=$this->RegularAppointment->find('first',array('conditions' => array('id' => $id)));

			$setISConnected=$this->RegularAppointment->updateAll(
					    array('is_connected' => 1),
					    array('id' => $id)
					);

			if($setISConnected){

				$setOtherAppointsataus=$this->RegularAppointment->updateAll(
					    array('status' => 0),
					    array('patientid' => $loginID,'DATE(created)'=>$cur_date ,'id !=' => $id)
					);
				if(!empty($appointDet)){
					$doctorid=$appointDet['RegularAppointment']['doctorid'];
				}
				$this->Session->write('patientID', $loginID);
				$this->Session->write('doctorID', $doctorid);
				$this->Session->write('appoint_id', $id);
				echo 1;
			}else{
				echo 0;
			}

		}
		exit();
	}
/**
 * set_doctor_idle method for setting docotor idle
 * Author Rajesh Sahoo
 * Date : 20th Jan 2016
 * @return void
 */
	public function set_doctor_idle(){
		if($this->request->is('post')){
			$this->loadModel('MasterUser');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$this->MasterUser->id = $loginID;
			$this->MasterUser->saveField('idle_status', 0);
		}
		exit();
	}

/**
 * viewPrescription method to view prescription (used for pharmacy)
 * Author Rajesh sahoo
 * Date : 22-02-2016
 * @return void
 */
	public function viewPrescription($dignosysID=''){
		if(($this->Session->read('loginType') == 'H') || ($this->Session->read('loginType') == 'P') || ($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'L')){
			$this->redirect(array('action' => 'index'));
		}
		$this->loadModel('DiagnosysReport');
		$doctorid=$this->Session->read('doctorid');
		$patientid=$this->Session->read('patientid');

		$PrescriptionDet=$this->DiagnosysReport->find('all', array('conditions' => array('patientid' => $patientid,'doctorid'=>$doctorid,'pharmacy_pad !='=>'')));

		$this->set('PrescriptionDet', $PrescriptionDet);
		$this->layout="view_profile";
	}

/**
 * selectPatientDoc method to Select Doctor and patient prescription (used for pharmacy)
 * Author Rajesh sahoo
 * Date : 22-02-2016
 * @return void
 */
	public function selectPatientDoc(){
		if(($this->Session->read('loginType') == 'H') || ($this->Session->read('loginType') == 'P') || ($this->Session->read('loginType') == 'D') || ($this->Session->read('loginType') == 'L')){
			$this->redirect(array('action' => 'index'));
		}

		//=========Doctor List fetch=========
			$this->loadModel('MasterUser');
			$doctorList = array('' => 'Select Doctor');
			$doctorList += $this->MasterUser->find('list', array(
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'diagnosys_reports',
	                        'alias' => 'DiagnosysReport',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = DiagnosysReport.doctorid')
	                    ),
					 ),
				'conditions' => array('MasterUser.login_tytpe' => 'D', 'MasterUser.status' => 1), 'order' => array('MasterUser.fname' => 'asc') ,'fields'=>array('id','name')));
			$this->set('doctorList', $doctorList);

			//=========Patient List fetch=========
			$this->loadModel('MasterUser');
			$patientList = array('' => 'Select Patient');
			$patientList+= $this->MasterUser->find('list', array(
				'joins' =>
	                  array(
	                    array(
	                        'table' => 'diagnosys_reports',
	                        'alias' => 'DiagnosysReport',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('MasterUser.id = DiagnosysReport.patientid')
	                    ),
					 ),
				'conditions' => array('MasterUser.login_tytpe' => 'P', 'MasterUser.status' => 1), 'order' => array('MasterUser.fname' => 'asc')));
			$this->set('patientList', $patientList);
		 //pr($patientList);

		$this->set('title_for_layout','View Prescription');

		if($this->request->is('post')){

			$doctorid=$this->request->data['DiagnosysReport']['doctorid'];
			$patientid=$this->request->data['DiagnosysReport']['patientid'];
			$this->Session->write('doctorid',$doctorid);
			$this->Session->write('patientid',$patientid);
			$this->redirect(array('action' => 'viewPrescription'));
		}

		$this->layout="view_profile";
	}

/**
 * testReports method
 * Author Rajessh
 * Date : 26-02-2016
 * @return void
 */
	public function testReports(){
		if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');

		$this->loadModel('DiagnosysReport');

		$testReportDet=$this->DiagnosysReport->find('all', array('conditions' => array('testid !=' => 0 ,'status'=>1)));

		$this->set('testReportDet', $testReportDet);

		$this->layout="manage_appointment";
	}

/**
 * uploadtest method
 * Author Rajesh
 * Date : 26-02-2016
 * @return void
 */
	public function uploadtestResults($id=''){
		if($this->Session->read('loginType')== 'D' || $this->Session->read('loginType')== 'P' || $this->Session->read('loginType')== 'H' || $this->Session->read('loginType')== 'PH'){
			$this->redirect(array('action' => 'index'));
		}

		$this->loadModel('LabtestReport');
		$this->loadModel('DiagnosysReport');
		$this->loadModel('MasterUser');
		$testReportDet=$this->DiagnosysReport->find('first', array('conditions' => array('id' => $id)));
		if(!empty($testReportDet)){
			$doctorid=$testReportDet['DiagnosysReport']['doctorid'];
			$patientid=$testReportDet['DiagnosysReport']['patientid'];
			$doctorDet=$this->MasterUser->find('first', array('conditions' => array('id' => $doctorid)));
			$patientDet=$this->MasterUser->find('first', array('conditions' => array('id' => $patientid)));
		}

		if ($this->request->is('post')) {

			$loginID=$this->Session->read('loginID');
			$this->request->data['LabtestReport']['diagnosis_id']=$id;
			$this->request->data['LabtestReport']['lab_id']=$loginID;
			$this->request->data['LabtestReport']['status']=1;

			if($this->request->data['LabtestReport']['uploaded_file']['name']!='')
			{
				$testimg=time().$this->request->data['LabtestReport']['uploaded_file']['name'];
				move_uploaded_file($this->request->data['LabtestReport']['uploaded_file']['tmp_name'],WWW_ROOT.'files/testresult/'.$testimg);
				$this->request->data['LabtestReport']['uploaded_file']=$testimg;
			}
			$this->LabtestReport->create();
			if ($this->LabtestReport->save($this->request->data)) {
				//return $this->redirect(array('action' => 'index'));
				//============Mail to both patient and doctor=========
					$this->loadModel("Sitesetting");
					$siteDetail = $this->Sitesetting->find('first');
					$doctorMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

									<tr>

										<td align="left" colspan="3">Dear '.stripslashes($doctorDet['MasterUser']['name']).'</td>

									</tr>

									<tr>

									<td colspan="3">Test Result For the Patient '.stripslashes($patientDet['MasterUser']['name']).' is available now.</td>

									</tr>
									<tr>

									<tr>

										<td align="left">&nbsp;</td>

									</tr>

									<tr>

										<td align="left" valign="middle">Thank You</td>

									</tr>

									<tr>

										<td align="left" valign="middle">The '.$siteDetail['Sitesetting']['logo_title'].' Team</td>

									</tr>

								</table>';
							$patientMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

									<tr>

										<td align="left" colspan="3">Dear '.stripslashes($patientDet['MasterUser']['name']).'</td>

									</tr>

									<tr>

									<td colspan="3">Test Result is available now.</td>

									</tr>
									<tr>

									<tr>

										<td align="left">&nbsp;</td>

									</tr>

									<tr>

										<td align="left" valign="middle">Thank You</td>

									</tr>

									<tr>

										<td align="left" valign="middle">The '.$siteDetail['Sitesetting']['logo_title'].' Team</td>

									</tr>

								</table>';

						if($doctorDet['MasterUser']['email_id']!=""){
							$subject="Lab Test Reports from ".$siteDetail['Sitesetting']['logo_title'];
							$Email = new CakeEmail('default');
							$Email->to($doctorDet['MasterUser']['email_id']);
							$Email->subject($subject);
							$Email->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));

							$Email->emailFormat('both');
							$Email->send($doctorMsg);
						}


							//===========patient Email========
						if($patientDet['MasterUser']['email_id']!=""){
							$emailpatient = new CakeEmail('default');
							$emailpatient->to($patientDet['MasterUser']['email_id']);
							$emailpatient->subject($subject);
							$emailpatient->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));
							$emailpatient->emailFormat('both');
							$emailpatient->send($patientMsg);
						}

				//============Mail to both patient and doctor=========
				$this->Session->setFlash(__('Test result uploaded successfully'));
			} else {
				$this->Session->setFlash(__('Test result uploading failed'));
			}
		}

		$this->layout="add_appointment";
	}
/**
 * viewuploadtests method
 * Author Rajesh
 * Date : 26-02-2016
 * @return void
 */
	public function viewuploadtests($id=''){
		if($this->Session->read('loginType')== 'D' || $this->Session->read('loginType')== 'P' || $this->Session->read('loginType')== 'H' || $this->Session->read('loginType')== 'PH'){
			$this->redirect(array('action' => 'index'));
		}

		$this->loadModel('LabtestReport');
		$this->loadModel('DiagnosysReport');
		$this->loadModel('MasterUser');

		$testReportDets=$this->LabtestReport->find('all', array('conditions' => array('diagnosis_id' => $id ,'status'=>1)));
		$this->set('testReportDets', $testReportDets);


		$this->layout="add_appointment";
	}

/**
 * selectdate method
 * Author Rajesh Sahoo
 * Date : 26-02-2016
 * Description: Select doctor for appointment
 * @return void
 */
	public function selectdate(){
		if(($this->Session->read('loginType') != 'D')){
			$this->redirect(array('action' => 'index'));
		}
		$this->set('title_for_layout','Select Date');

		if($this->request->is('post')){
			$fromDate=$this->request->data['Appointment']['fromdate'];
			$toDate=$this->request->data['Appointment']['todate'];
			$this->Session->write('fromDatesrh',$fromDate);
			$this->Session->write('toDatesrh',$toDate);
			$this->redirect(array('action' => 'patientAttend'));
		}

		$this->layout="add_appointment";
	}
/**
 * patientAttend method
 * Author Rajesh Sahoo
 * Date : 26-02-2016
 * Description: patientAttend for appointment
 * @return void
 */

	public function patientAttend(){
		if(($this->Session->read('loginType') != 'D')){
			$this->redirect(array('action' => 'index'));
		}
		$this->set('title_for_layout','Number Of Patient Attended');

		$loginID=$this->Session->read('loginID');
		$this->loadModel('Appointment');
		$this->loadModel('RegularAppointment');
		$this->loadModel('MasterUser');
		$fromDate=$this->Session->read('fromDatesrh');
		$toDate=$this->Session->read('toDatesrh');

		$fromDate=date('Y-m-d',strtotime($fromDate));
		$toDate=date('Y-m-d',strtotime($toDate));

		$doc_det=$this->MasterUser->find('first',array('conditions'=>array('id'=>$loginID)));
		if($doc_det['MasterUser']['doc_type']== '1'){
			$this->Paginator->settings=array(
				'conditions' => array('doctorid'=>$loginID,'is_conv in'=>array(1,2),'status'=>1,'created >='=>$fromDate,'created <='=>$toDate),
				'order' => array('id' => 'desc')
			);
			$this->set('patientList', $this->Paginator->paginate('RegularAppointment'));
			$this->set('mod','RegularAppointment');
		}else{
			$this->Paginator->settings=array(
				'conditions' => array('doctorid'=>$loginID,'join_status in'=>array(2,3),'status'=>1,'created >='=>$fromDate,'created <='=>$toDate),
				'order' => array('id' => 'desc')
			);
			$this->set('patientList', $this->Paginator->paginate('Appointment'));
			$this->set('mod','Appointment');
		}


		$this->layout="add_appointment";
	}


/**
 * set_doctor_active method for setting docotor idle
 * Author Rajesh Sahoo
 * Date : 20th Jan 2016
 * @return void
 */
	public function set_doctor_active(){
		if($this->request->is('post')){
			$this->loadModel('MasterUser');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$this->MasterUser->id = $loginID;
			$this->MasterUser->saveField('idle_status', 1);

		}exit();
	}

	public function settimetwentymin($time){
		return strtotime('+20 minutes', $time);
		//return date("H:i", strtotime('+20 minutes', $time));

	}
}
