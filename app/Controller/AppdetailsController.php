<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Appdetails Controller
 *
 * @property Appdetail $Appdetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AppdetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
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
 * dashboard_index method
 *
 * @return void
 */
	public function dashboard_detail($id='') {
		$this->set('title_for_layout', 'Appointment Detail');
		if($this->Session->read('loginType')=='P'){
			$this->redirect(array('action' => 'dashboard'));
		}
		$this->loadModel('MasterUser');
		$this->loadModel('Appointment');
		$loginID=$this->Session->read('loginID');
		$loginType=$this->Session->read('loginType');
		$appointDet=$this->Appointment->find('first', array('conditions' => array('id' => $id, 'doctorid' => $loginID)));
		$this->set('appointmentDetails', $appointDet);

		$this->layout="manage_appointment";
		$this->set('loginType',$loginType);
	}

/**
 * dashboard_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function dashboard_view($id = null) {
		if (!$this->Appdetail->exists($id)) {
			throw new NotFoundException(__('Invalid appdetail'));
		}
		$options = array('conditions' => array('Appdetail.' . $this->Appdetail->primaryKey => $id));
		$this->set('appdetail', $this->Appdetail->find('first', $options));
	}

/**
 * dashboard_add method
 *
 * @return void
 */
	public function dashboard_add() {
		if ($this->request->is('post')) {
			$this->Appdetail->create();
			if ($this->Appdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The appdetail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The appdetail could not be saved. Please, try again.'));
			}
		}
	}

/**
 * dashboard_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function dashboard_edit($id = null) {
		if (!$this->Appdetail->exists($id)) {
			throw new NotFoundException(__('Invalid appdetail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Appdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The appdetail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The appdetail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Appdetail.' . $this->Appdetail->primaryKey => $id));
			$this->request->data = $this->Appdetail->find('first', $options);
		}
	}

/**
 * dashboard_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function dashboard_delete($id = null) {
		$this->Appdetail->id = $id;
		if (!$this->Appdetail->exists()) {
			throw new NotFoundException(__('Invalid appdetail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Appdetail->delete()) {
			$this->Session->setFlash(__('The appdetail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The appdetail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * dashboard_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 
 public function editprofiledoctor($id=null){
	 if($this->Session->read('loginType') == 'P'){
			$this->redirect(array('action' => 'index'));
		}
		$loginID=$this->Session->read('loginID');
		$id=$loginID;

		//===============Service Assigned=================//
		$this->loadModel('AssignService');
		$assignServiceList=$this->AssignService->find('all', array('conditions' => array('userid' => $id)));
		//pr($assignServiceList);exit;
		$serviceArr=array();
		if(!empty($assignServiceList)){
			foreach($assignServiceList as $assignList){
				//echo $assignList['AssignService']['serviceid'];
				array_push($serviceArr, $assignList['AssignService']['serviceid']);
			}
		}
		$this->set('selectedService', $serviceArr);

		//=========Service List fetch=========
		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);

		$this->loadModel('MasterDoctor');
		//=================================================

		//=========Hospital List fetch=========
		$this->loadModel('Hospital');
		$options['joins'] = array(array('table' => 'master_users', 'alias' => 'MasterUsers', 'type' => 'LEFT', 'conditions' => array( 'MasterUsers.id = Hospital.user_id',
        )  ));

        $options['conditions'] = array('MasterUsers.status' => 1,'MasterUsers.login_tytpe'=>'H');

		$hospitalList = array('' => 'Select Hospital');
		$hospitalList += $this->Hospital->find('list',$options);
		$this->set('hospitalList', $hospitalList);
		//======================================
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['MasterDoctor']['dob']=date('Y-m-d', strtotime($this->request->data['MasterDoctor']['dob']));
			$options = array('conditions' => array('MasterDoctor.' . $this->MasterDoctor->primaryKey => $id));
			$userData = $this->MasterDoctor->find('first', $options);
			$this->request->data['MasterDoctor']['user_name']=$userData['MasterDoctor']['user_name'];
			$this->request->data['MasterDoctor']['user_pass']=$userData['MasterDoctor']['user_pass'];

			if ($this->MasterDoctor->save($this->request->data)) {
				$insertID = $this->request->data['MasterDoctor']['id'];

				//=========Servies Add Functionality========================
				$delServiceAssign=$this->AssignService->deleteAll(array('userid' => $id));
				if(isset($this->request->data['AssignService']['serviceid']) && !empty($this->request->data['AssignService']['serviceid'])){
					$serviceArr = $this->request->data['AssignService']['serviceid'];
					foreach($serviceArr as $service){
						//pr($service);
						$this->request->data['AssignService']['serviceid']=$service;
						$this->request->data['AssignService']['userid']=$id;
						$this->loadModel('AssignService');
						$this->AssignService->create();
						$this->AssignService->save($this->request->data);
					}
				}
				//=================================================================

				//===========User meta field Add functionality=====================
				if(isset($this->request->data['attr_field'])){
						$attr_field = $this->request->data['attr_field'];
							if(!empty($attr_field)){
								$this->loadModel('UserMeta');
								foreach ($attr_field as $attrIndex => $attrValue) {
									$metaChk = $this->UserMeta->find('first', array('conditions' => array('meta_key' => $attrIndex, 'user_id' => $insertID)));
									//========Passport Photo upload functionality=========
									if($attrIndex=='passport_photo'){
										$fileData=$attrValue;
										if($fileData['name']!='')
										{
											if(count($metaChk)>0){
												@unlink(WWW_ROOT.'files/passport/'.$metaChk['UserMeta']['meta_value']);
											}
											$profileImg=time().$fileData['name'];
											move_uploaded_file($fileData['tmp_name'],WWW_ROOT.'files/passport/'.$profileImg);
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
									//========CV upload functionality=========
									if($attrIndex=='doctor_cv'){
										$fileData=$attrValue;
										if($fileData['name']!='')
										{
											if(count($metaChk)>0){
												@unlink(WWW_ROOT.'files/cv/'.$metaChk['UserMeta']['meta_value']);
											}
											$doctorCV=time().$fileData['name'];
											move_uploaded_file($fileData['tmp_name'],WWW_ROOT.'files/cv/'.$doctorCV);
											$attrValue=$doctorCV;
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
				//=================================================================
				//===========Hospital Detail Save functionality===================
					/*if($this->request->data['Hospital']['hospital_name']!=''){
						$hospitalName = $this->request->data['Hospital']['hospital_name'];
						$this->loadModel('Hospital');
						//=========Hospital Check functionality============
						$hospitalChk = $this->Hospital->find('first', array('conditions' => array('hospital_name' => $hospitalName)));
						//=================================================
						if(count($hospitalChk)>0){
							$hospitalID = $hospitalChk['Hospital']['id'];
						}else{
							$this->Hospital->create();
							$this->request->data['Hospital']['user_id'] = $insertID;
							//print_r($this->request->data);exit;
							$this->Hospital->save($this->request->data);
							$hospitalID = $this->Hospital->getLastInsertId();
						}
						$this->loadModel('UserMeta');
						$secmetaChk = $this->UserMeta->find('first', array('conditions' => array('meta_key' => 'hospitalid', 'user_id' => $insertID)));
						if(count($secmetaChk)>0){
							$this->UserMeta->save(array('id' => $secmetaChk['UserMeta']['id'], 'user_id' => $insertID, 'meta_key' => 'hospitalid', 'meta_value' => $hospitalID));

						}else{
						$this->UserMeta->create();
						$this->UserMeta->save(array('user_id' => $insertID, 'meta_key' => 'hospitalid', 'meta_value' => $hospitalID));
						}
					}*/
				//=================================================================
				$this->Session->setFlash(__('Profile updated successfully'));
			}else{
				$this->Session->setFlash(__('Profile detail could not be saved. Please fill all required field to proceed.'));
				}

		}else{
			$options = array('conditions' => array('MasterDoctor.' . $this->MasterDoctor->primaryKey => $id));
			$this->request->data = $this->MasterDoctor->find('first', $options);
		}
		//==================================================
		$this->layout='add_appointment';
		$this->set('id', $loginID);
 	}
	public function statusupdate($id='',$status=''){
		if($id!='' && $status!=''){
			$this->loadModel('Appointment');
			$statusUpdate=$this->Appointment->save(array('id' => $id, 'status' => $status));
			if($statusUpdate){
				$appointmentDetail=$this->Appointment->find("first", array('conditions' => array('id' => $id)));
				$doctorid=$appointmentDetail['Appointment']['doctorid'];
				$patientid=$appointmentDetail['Appointment']['patientid'];
				$this->loadModel('MasterUser');
				$patientDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $patientid)));
				$doctorDetail=$this->MasterUser->find('first', array('conditions' => array('id' => $doctorid)));

				$availability_id = $appointmentDetail['Appointment']['appointment_availbility'];
			 	$this->loadModel('DoctorAvailability');
				$availabilityDetail = $this->DoctorAvailability->find('first', array('conditions' => array('status' => 1, 'id' => $availability_id)));

				$availability_slot_id = $appointmentDetail['Appointment']['appoint_book_slut'];
				$this->loadModel('DoctoravailableSlot');
				$availableSlotDet= $this->DoctoravailableSlot->find('first', array('conditions' => array('id' => $availability_slot_id)));

				$this->loadModel("Sitesetting");
				$siteDetail = $this->Sitesetting->find('first');
				//=====Mail functionality=========
				//-------Doctor Mail Functionality----------
				$doctorMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

									<tr>

										<td align="left" colspan="3">Dear '.stripslashes($doctorDetail['MasterUser']['fname'].' '.$doctorDetail['MasterUser']['lname']).'</td>

									</tr>

									<tr>

									<td colspan="3">You have confirmed appointment of '.stripslashes($patientDetail['MasterUser']['fname'].' '.$patientDetail['MasterUser']['lname']).' at date '.date("d-m-Y",strtotime($appointmentDetail['Appointment']['appointment_date'])).'. and time '.$availableSlotDet['DoctoravailableSlot']['start_time'].' To '.$availableSlotDet['DoctoravailableSlot']['end_time'].'</td>

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
							if($doctorDetail['MasterUser']['email_id']!=""){
								$subject="Appoinement confirmation from ".$siteDetail['Sitesetting']['logo_title'];
								$Email = new CakeEmail('default');
								$Email->to($doctorDetail['MasterUser']['email_id']);

								$Email->subject($subject);
								//$Email->replyTo($adminemail);
								$Email->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));

								$Email->emailFormat('both');
								//$Email->headers();
								$Email->send($doctorMsg);
							}
					//--------------------------------------------------
					//-------Patient Mail Functionality----------
					$patientMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

										<tr>

											<td align="left" colspan="3">Dear '.stripslashes($patientDetail['MasterUser']['fname'].' '.$patientDetail['MasterUser']['lname']).'</td>

										</tr>

										<tr>

										<td colspan="3">Your Appointment confirmed by Dr. '.stripslashes($doctorDetail['MasterUser']['fname'].' '.$doctorDetail['MasterUser']['lname']).' at date '.date("d-m-Y",strtotime($appointmentDetail['Appointment']['appointment_date'])).'. and time '.$availableSlotDet['DoctoravailableSlot']['start_time'].' To '.$availableSlotDet['DoctoravailableSlot']['end_time'].' so ready to attain this particular time</td>

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

							if($patientDetail['MasterUser']['email_id']!=""){
								$subject="Appoinement confirmation from ".$siteDetail['Sitesetting']['logo_title'];
								
								$PEmail = new CakeEmail('default');
								$PEmail->to($patientDetail['MasterUser']['email_id']);
								$PEmail->subject($subject);
								//$PEmail->replyTo($adminemail);
								$PEmail->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));

								$PEmail->emailFormat('both');
								//$PEmail->headers();
								$PEmail->send($patientMsg);
							}	
					//--------------------------------------------------
					//===============================
				$this->redirect("/dashboard/appdetails/detail/".$id);
			}
			else{
				$this->redirect("/dashboard/appdetails/detail/".$id);
			}
			exit();
		}
	}
	
	/**
 * ViewProfile method
 * Author Ashok 
 * Date : 15th jan 2016
 * @return void
 */
	public function feedback($aptid=''){
		
		if($aptid!=""){
			$this->loadModel('Feedback');
			$loginID=$this->Session->read('loginID');
			$loginType=$this->Session->read('loginType');
			$this->loadModel('RegularAppointment');
			$AppointDets=$this->RegularAppointment->find('first', array('conditions' => array('id' => $aptid,'is_conv'=>2,'status'=>1)));

			if ($this->request->is('post')) {
				$this->Feedback->create();
				if(!empty($AppointDets)){
					$this->request->data['Feedback']['apt_id'] = $aptid;
					$this->request->data['Feedback']['doctorid'] = $AppointDets['RegularAppointment']['doctorid'];	
				}
				$chkFeedback=$this->Feedback->find('first', array('conditions' => array('apt_id' => $aptid)));
				if(!empty($chkFeedback)){
					$this->Feedback->id = $chkFeedback['Feedback']['id'];
					$this->request->data['Feedback']['apt_id'] = $aptid;
					$this->request->data['Feedback']['doctorid'] = $chkFeedback['Feedback']['doctorid'];
				}
				if ($this->Feedback->save($this->request->data)) {
					$this->Session->setFlash(__('Your Feedback has been saved.'));
				} else {
					$this->Session->setFlash(__('The Feedback could not be saved. Please, try again.'));
				}
			}
			$this->layout="user_dashboard";
		}else{
			$this->redirect(Router::url('/', true).'dashboard');
		}
		
	}
	
	/**
 * start_conv_patient method for Starting Conversastion with regular doctors
 * Author Rajesh Sahoo 
 * Date : 29th Feb 2016
 * @return void
 */

	public function start_conv_patient(){
		if($this->request->is('post')){
			$this->loadModel('RegularAppointment');
			$loginID=$this->Session->read('loginID');
			$userType=$this->Session->read('loginType');
			$cur_date=date('Y-m-d');
			$cur_time=date("H:i:s");
			$id = $this->request->data['id']; 
			//==============Check Whether patient has appointment or not======
			$checkRegularAppoint=$this->RegularAppointment->find('first', array('conditions' => array('id' => $id)));
			
			if(count($checkRegularAppoint)>0){
				$doctorid=$checkRegularAppoint['RegularAppointment']['doctorid'];
				$patientid=$checkRegularAppoint['RegularAppointment']['patientid'];

				if($checkRegularAppoint['RegularAppointment']['conv_start_time'] ==""){
					$this->RegularAppointment->id = $id;
					if($this->RegularAppointment->saveField('conv_start_time', $cur_time)){
						$this->RegularAppointment->saveField('is_conv', 1);
						$this->Session->write('appoint_id', $id);
						$this->Session->write('patientID', $patientid);
						$this->Session->write('doctorID', $doctorid);
					}
				}
				echo 0;
			}else{
				echo 1;
			}
			
		}
		exit();
	}
}
