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
		$doctorList +=$this->MasterUser->find('list', array('conditions' => array('status' => 1, 'login_tytpe' => 'D')));
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
		$this->loadModel('DoctorAvailability');
		$availabilityList = array('' => 'Select Time');
		$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('status' => 1), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		$this->set('availabilityList', $availabilityList);

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
			$doctorsList = $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1 ,'id'=>$doctorids), 'order' => array('fname' => 'asc')));
			
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
			$appointWhr = array(array('status IN' => array(1,0)));
			$whr=array(array('status' => 1));

			if(isset($this->request->data['doctor'])){
				$doctor = $this->request->data['doctor'];
				array_push($whr, array('doctor_id' => $doctor));
				array_push($appointWhr, array('doctorid' => $doctor));
			}if(isset($this->request->data['dateval'])){
				$dateval = date("Y-m-d", strtotime($this->request->data['dateval']));
				array_push($whr, array('date(app_date)' => $dateval));
				array_push($appointWhr, array('date(appointment_date)' => $dateval));
			}
			$this->loadModel('DoctorAvailability');
			$getList=$this->DoctorAvailability->find('all', array('conditions' => array('AND' =>$whr)));
			if(count($getList)>0){
				?>
				<option value="">Select Time</option>
				<?php
				foreach($getList as $getListRes){
					$availabilityID = $getListRes['DoctorAvailability']['id'];
					if($id!=''){
						array_push($appointWhr, array('id !=' => $id));
						array_push($appointWhr, array('appointment_availbility' => $availabilityID ));
						//$appwhr=array(array('id !=' => $id),array('appointment_availbility' => $availabilityID ));
					}else{
						array_push($appointWhr, array('appointment_availbility' => $availabilityID ));
						//$appwhr=array(array('appointment_availbility' => $availabilityID ));
					}
					$this->loadModel('Appointment');	
					pr($appointWhr);
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
		//=========Availability List fetch=========
		$this->loadModel('DoctorAvailability');
		$availabilityList = array('' => 'Select Time');
		$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('status' => 1), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		$this->set('availabilityList', $availabilityList);

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
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1), 'order' => array('fname' => 'asc')));
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
		$availbilityList=$this->DoctorAvailability->find('all', array('conditions' => array('status' => 1,'doctor_id' => $doctor_id)));
		$this->set('availbilityList', $availbilityList);
		$this->layout="add_appointment";

	}
/**
 * Availability Chk method
 * Author Chittaranjan Sahoo 
 * Date : 23rd Dec 2015
 * Description: availbility date and time show according to the Doctor
 * @return void
 */
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
		$availabilityDetail=$this->request->data['availabilityDetail'];
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
	}
	/**
 * Appointment booked Chk method
 * Author Chittaranjan Sahoo 
 * Date : 24th Dec 2015
 * Description: check appointment
 * @return void
 */
	public function chkappointmentAvl(){
		
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
		 			 		 $AvailabityId=$AppointmentDetatil['Appointment']['appointment_availbility'];
		 			 		 $checkAvailabity=$this->DoctorAvailability->find('first', array('conditions' => array('id'=>$AvailabityId,'doctor_id' => $id,'status' => 1,'start_time <='=>$cur_time,'end_time >='=>$cur_time
				, 'date(app_date)'=>$cur_date )));
							//pr($checkAvailabity);	
		 			 		 if(!empty($checkAvailabity)){	//Check the time for Appointment
		 			 		 	//$session_appointment_staus='true';
		 			 		 	$session_status_type=$AppointmentDetatil['Appointment']['session_status_type'];
		 			 		 	$session_join_status=$AppointmentDetatil['Appointment']['join_status'];
		 			 		 	//echo $session_join_status;
		 			 		 	if($session_join_status== '0' || $session_join_status== '1' ){
		 			 		 		//$this->set('AvailabityTimeId', $AvailabityId);
		 			 		 		$this->Session->write('AvailabityTimeId',$AvailabityId);
		 			 		 		if($session_status_type==NULL){
		 			 		 		echo  $session_appointment_staus="create";
			 			 		 	}else if($session_status_type=='P'){
			 			 		 	echo  $session_appointment_staus="join";
			 			 		 	}
									
		 			 		 	}
		 			 		 	
		 			 		 }
		 			 	}
		 			 }else{
		 			 	echo $session_appointment_staus='false';	//No Appointment For that Day
		 			 }
		 		}else{	//patient login
		 			$AppointmentDetatils=$this->Appointment->find('all',array('conditions'=>array('patientid'=>$id , 'appointment_date'=>$cur_date ,'status'=>1)));
		 			 if(!empty($AppointmentDetatils) && count($AppointmentDetatils)>0){	//Check Whether Doctor is available for that day		 			 	
		 			 	foreach($AppointmentDetatils as $AppointmentDetatil){
		 			 		 $AvailabityId=$AppointmentDetatil['Appointment']['appointment_availbility'];
		 			 		 $doc_id=$AppointmentDetatil['Appointment']['doctorid'];
		 			 		 $checkAvailabity=$this->DoctorAvailability->find('first', array('conditions' => array('id'=>$AvailabityId,'doctor_id' => $doc_id,'status' => 1,'start_time <='=>$cur_time,'end_time >='=>$cur_time
				, 'date(app_date)'=>$cur_date )));
							//pr($checkAvailabity);	
		 			 		 if(!empty($checkAvailabity)){	//Check the time for Appointment
		 			 		 	//$session_appointment_staus='true';
		 			 		 	$session_status_type=$AppointmentDetatil['Appointment']['session_status_type'];
		 			 		 	$session_join_status=$AppointmentDetatil['Appointment']['join_status'];
		 			 		 	if($session_join_status== '0' || $session_join_status== '1'){
		 			 		 		//$this->set('AvailabityTimeId', $AvailabityId);
		 			 		 		$this->Session->write('AvailabityTimeId',$AvailabityId);
			 			 		 	if($session_status_type==NULL){
			 			 		 		echo $session_appointment_staus="create";

			 			 		 	}else if($session_status_type=='D'){
			 			 		 		echo $session_appointment_staus="join";
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
		$loginID=$this->Session->read('loginID');
		$userType=$this->Session->read('loginType');
		$AvailabityTimeId=$this->Session->read('AvailabityTimeId');
		$cur_date=date('Y-m-d');

		if($userType=="D"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('doctorid'=>$loginID , 'appointment_date'=>$cur_date ,'appointment_availbility'=>$AvailabityTimeId ,'status'=>1)));
		}else{
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('patientid'=>$loginID , 'appointment_date'=>$cur_date,'appointment_availbility'=>$AvailabityTimeId  ,'status'=>1)));
		}

		if(!empty($AppointmentDetatils)){
			 $this->Appointment->id = $AppointmentDetatils['Appointment']['id'];
			if($this->Appointment->saveField('join_status', 1)){
				$this->Appointment->saveField('session_status_type', $userType);
				echo 1;
			}
		}else{
			echo 0;
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
		$loginID=$this->Session->read('loginID');
		$userType=$this->Session->read('loginType');
		$AvailabityTimeId=$this->Session->read('AvailabityTimeId');
		$cur_date=date('Y-m-d');

		if($userType=="D"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('doctorid'=>$loginID , 'appointment_date'=>$cur_date ,'appointment_availbility'=>$AvailabityTimeId ,'status'=>1)));
		}else if($userType=="P"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('patientid'=>$loginID , 'appointment_date'=>$cur_date,'appointment_availbility'=>$AvailabityTimeId  ,'status'=>1)));
		}

		if(!empty($AppointmentDetatils)){
			 $this->Appointment->id = $AppointmentDetatils['Appointment']['id'];
			if($this->Appointment->saveField('join_status', 2)){
			echo 1;	
			}
				//$this->Appointment->saveField('session_status_type', $userType);
				
		}else{
			echo 0;
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
		$loginID=$this->Session->read('loginID');
		$userType=$this->Session->read('loginType');
		$AvailabityTimeId=$this->Session->read('AvailabityTimeId');
		$cur_date=date('Y-m-d');

		if($userType=="D"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('doctorid'=>$loginID , 'appointment_date'=>$cur_date ,'appointment_availbility'=>$AvailabityTimeId ,'status'=>1)));
		}else if($userType=="P"){
			$AppointmentDetatils=$this->Appointment->find('first',array('conditions'=>array('patientid'=>$loginID , 'appointment_date'=>$cur_date,'appointment_availbility'=>$AvailabityTimeId  ,'status'=>1)));
		}

		if(!empty($AppointmentDetatils)){
			
			//$this->Appointment->saveField('session_status_type', $userType);
				echo $AppointmentDetatils['Appointment']['join_status'];
		}else{
			echo 0;
		}
		
		exit();
	}

/**
 * uploadtestlist method
 * Author Rajessh 
 * Date : 29th Dec 2015
 * @return void
 */
	public function uploadtestlist(){
		/*if($this->Session->read('loginType')== 'D'){
			$this->redirect(array('action' => 'index'));
		}*/
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');

		$this->loadModel('UploadtestResult');
		if($loginType=="P"){
			$testReportDet=$this->UploadtestResult->find('all', array('conditions' => array('userid' => $loginID ,'status'=>1)));
		}else if($loginType=="D"){
			$testReportDet=$this->UploadtestResult->find('all', array('conditions' => array('doctorid' => $loginID , 'status'=>1)));
		}
		
		$this->set('testReportDet', $testReportDet);

		$this->layout="manage_appointment";
	}
/**
 * uploadtestlist method
 * Author Rajessh 
 * Date : 29th Dec 2015
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
		if($this->Session->read('loginType')== 'P' || $this->Session->read('loginType')== 'H'){
			$this->redirect(array('action' => 'index'));
		}
		$this->loadModel('TestMaster');
		$testparentList=array(0 => 'None');
		$testparentList += $this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);
		
		/*$testList=$this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);
		pr($testList);exit;*/
		if ($this->request->is('post')) {
			//pr($this->request->data);exit;
			$loginID=$this->Session->read('loginID');
			$this->request->data['DiagnosysReport']['doctorid']=$loginID;
			$this->request->data['DiagnosysReport']['status']=1;
			$this->loadModel('DiagnosysReport');
			$this->DiagnosysReport->create();
			if ($this->DiagnosysReport->save($this->request->data)) {
				$insertID = $this->DiagnosysReport->getLastInsertId();
				//Test result save functionality============
				$this->loadModel('DiagnosysTest');
				$testid = $this->request->data['DiagnosysTest']['testid'];
				$test_res = $this->request->data['DiagnosysTest']['test_res'];
				if(!empty($testid)){
					foreach($testid as $testIndex => $testVal){
						$this->DiagnosysTest->create();
						$save=$this->DiagnosysTest->save(array('diagnosys_id' => $insertID, 'test_type' => $testVal, 'test_result' => $test_res[$testIndex]));
					}
				}
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
	public function selectdoctorhospital(){
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
			
			$patientList = array('' => 'Select Patient');
			$patientList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'P', 'status' => 1 , 'id IN'=>$userArr), 'order' => array('fname' => 'asc')));
			$this->set('patientList', $patientList);
			//pr($patientList);exit;
		}
		
		$this->layout="add_appointment";

	}

/**
 * availabilitydatehospital method
 * Author Rajesh Kumar Sahoo 
 * Date : 4th jan 2016
 * Description: availbility date and time show according to the Doctor
 * @return void
 */
	public function availabilitydatehospital(){
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

	}

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
	public function manageappointmenthospital(){
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
	}
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

		$docList = $this->MasterUser->find('all', array('conditions' => array('login_tytpe' => 'D', 'status' => 1 , 'id IN'=>$userArr), 'order' => array('fname' => 'asc')));
		$this->set('docList', $docList);
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
		foreach ($UserMetaDets as $UserMetaDet) {
			array_push($userArr, $UserMetaDet['UserMeta']['user_id']);
		}
		
		$patientList = $this->MasterUser->find('all', array('conditions' => array('login_tytpe' => 'P', 'status' => 1 , 'id IN'=>$userArr), 'order' => array('fname' => 'asc')));
		$this->set('patientList', $patientList);
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
        'download' => true,
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
		if(($this->Session->read('loginType') == 'H') || ($this->Session->read('loginType') == 'P')){
			$this->redirect(array('action' => 'index'));
		}
		//======Last Appointment date============
		//Appointment
		//=======================================
		$loginID=$this->Session->read('loginID');
		$this->loadModel('Appointment');
		$historyList=$this->Appointment->find('all', array(
			'joins' =>
	                  array(
	                    array(
	                        'table' => 'diagnosys_reports',
	                        'alias' => 'DiagnosysReport',
	                        'type' => 'left',
	                        'foreignKey' => false,
	                        'conditions'=> array('Appointment.patientid=DiagnosysReport.patientid')
	                    ),
					 ),
	        'conditions' => array('Appointment.doctorid' => $loginID, 'DiagnosysReport.patientid !=' => '', 'DiagnosysReport.status' => 1),
	        'group' => "DiagnosysReport.id",
	        'order' => array('DiagnosysReport.id' => 'asc'),
	        'fields' => array('DiagnosysReport.*')
			));
		$this->set('historyList', $historyList);
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
}
