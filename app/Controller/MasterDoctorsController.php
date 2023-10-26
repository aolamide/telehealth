<?php
App::uses('AppController', 'Controller');
/**
 * MasterDoctors Controller
 *
 * @property MasterDoctor $MasterDoctor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MasterDoctorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter()
	{
		if(!$this->Session->check('adminUser'))
		{
			$this->redirect(Router::url('/admin/', true));
		}
		else
		{
			$uid=$this->Session->read('adminUser');
			$this->loadModel('AdminLogin');
			$userres=$this->AdminLogin->find('first', array('conditions' => array('uid' => $uid)));
			$this->set('adminRes', $userres);
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MasterDoctor->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array('login_tytpe' => 'D'),
			'order' => array('id' => 'desc')
			);
		$this->set('masterDoctors', $this->Paginator->paginate('MasterDoctor'));
		$this->layout="manage_admin";
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MasterDoctor->exists($id)) {
			throw new NotFoundException(__('Invalid master doctor'));
		}
		$options = array('conditions' => array('MasterDoctor.' . $this->MasterDoctor->primaryKey => $id));
		$this->set('masterDoctor', $this->MasterDoctor->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//=========Service List fetch=========
		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);

		//=========Hospital List fetch=========
		$this->loadModel('Hospital');
		$options['joins'] = array(array('table' => 'master_users', 'alias' => 'MasterUsers', 'type' => 'LEFT', 'conditions' => array( 'MasterUsers.id = Hospital.user_id',
        )  ));

        $options['conditions'] = array('MasterUsers.status' => 1,'MasterUsers.login_tytpe'=>'H');

		$hospitalList = array('' => 'Select Hospital');
		$hospitalList += $this->Hospital->find('list',$options);
		$this->set('hospitalList', $hospitalList);
		//======================================
		if ($this->request->is('post')) {
			//pr($this->request);exit;
			//=======Check For Password same with Conf. Password===========//
			$pwdData=$this->request->data['MasterDoctor']['user_pass'];
			$confPwd=$this->request->data['MasterDoctor']['cnf_pass'];
			$uname=$this->request->data['MasterDoctor']['user_name'];
			$email=$this->request->data['MasterDoctor']['email_id'];
			$checkemail=$this->MasterDoctor->find('first', array('conditions' => array('email_id' => $email ,'login_tytpe'=>'D')));
			$checkUname=$this->MasterDoctor->find('first', array('conditions' => array('user_name' => $uname)));
			if($pwdData!=$confPwd){
				$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
			}else if(count($checkUname)>0){
				//=========Check unique email Validation================//
				$this->Session->setFlash(__('User Name Already Exists.'));
			}else if(count($checkemail)>0){
				$this->Session->setFlash(__('Email-Id Already Exists.'));
			}else{
						//======================================================//	
				//Reference ID generation============
				$lastUser = $this->MasterDoctor->find('first', array('conditions' => array('login_tytpe' => 'D'), 'order' => array('id' => 'desc')));
				if(count($lastUser)>0){
					$userLastID = $lastUser['MasterDoctor']['id'];
					$lastid=$lastUser['MasterDoctor']['ref_id'];
					$lastno = ($lastid!='') ? explode("R",$lastid) : 10000;
					$increaseNo = intval($lastno[1])+1;
					$refID = "DR".$increaseNo; 
				}else{
					$refID = "DR10001";
				}
				$this->request->data['MasterDoctor']['ref_id'] = $refID;
				$this->request->data['MasterDoctor']['login_tytpe']='D';
				$this->request->data['MasterDoctor']['dob']=date('Y-m-d', strtotime($this->request->data['MasterDoctor']['dob']));
						
				$pwd = base64_encode($this->request->data['MasterDoctor']['user_pass']);
				$this->request->data['MasterDoctor']['user_pass'] = $pwd;
				$this->MasterDoctor->create();
				if ($this->MasterDoctor->save($this->request->data)) {
					$insertID = $this->MasterDoctor->getLastInsertId();

					//=========Servies Add Functionality========================
					if(isset($this->request->data['AssignService']['serviceid']) && !empty($this->request->data['AssignService']['serviceid'])){
						$serviceArr = $this->request->data['AssignService']['serviceid'];
						foreach($serviceArr as $service){
							//pr($service);
							$this->request->data['AssignService']['serviceid']=$service;
							$this->request->data['AssignService']['userid']=$insertID;
							$this->loadModel('AssignService');
							$this->AssignService->create();
							$this->AssignService->save($this->request->data);
						}
					}
					//==========================================================
					//===========User meta field Add functionality==================
					if(isset($this->request->data['attr_field'])){
						$attr_field = $this->request->data['attr_field'];
							if(!empty($attr_field)){
								$this->loadModel('UserMeta');
								foreach ($attr_field as $attrIndex => $attrValue) {
								//=========CV upload functionality=============
								if($attrIndex=='doctor_cv'){
									$fileData=$attrValue;
									if($fileData['name']!='')
									{
										$doctor_cv=time().$fileData['name'];
										move_uploaded_file($fileData['tmp_name'],WWW_ROOT.'files/cv/'.$doctor_cv);
										$attrValue=$doctor_cv;
									}else{
										$attrValue='';
									}
								}
								//=============================================================	
								//=========Passport photo upload functionality=============
								if($attrIndex=='passport_photo'){
									$fileData=$attrValue;
									if($fileData['name']!='')
									{
										$profileImg=time().$fileData['name'];
										move_uploaded_file($fileData['tmp_name'],WWW_ROOT.'files/passport/'.$profileImg);
										$attrValue=$profileImg;
									}else{
										$attrValue='';
									}
								}
								//=============================================================

								//===========Hospital Assign Save functionality===================
								/*if($attrIndex=='hospitalid'){
									$fileData=$attrValue;
									if($fileData['name']!='')
									{
										//$profileImg=time().$fileData['name'];
										//move_uploaded_file($fileData['tmp_name'],WWW_ROOT.'files/passport/'.$profileImg);
										$attrValue=$attrValue;
									}else{
										$attrValue='';
									}
								}*/

								//================================================================	
								$metaFields=array('user_id' => $insertID, 'meta_key' => $attrIndex, 'meta_value' => $attrValue);
								$this->UserMeta->create();
								$this->UserMeta->save($metaFields);
							}
						}
					}
					//==================================================================
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
							$this->Hospital->save($this->request->data);
							$hospitalID = $this->Hospital->getLastInsertId();
						}
						$this->loadModel('UserMeta');
						$this->UserMeta->create();
						$this->UserMeta->save(array('user_id' => $insertID, 'meta_key' => 'hospitalid', 'meta_value' => $hospitalID));

					}*/
					//================================================================


					$this->Session->setFlash(__('Doctor registered successfully'));
					return $this->redirect(array('action' => 'index'));
						
					} else {
								$this->Session->setFlash(__('The Doctor detail could not be saved. Please fill all required field to proceed.'));
							}
						}
			}
		$this->layout='add_admin';
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MasterDoctor->exists($id)) {
			//throw new NotFoundException(__('Invalid master doctor'));
		 return $this->redirect(array('action' => 'index'));
		}
		
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

		//=========Hospital List fetch=========
		$this->loadModel('Hospital');
		$options['joins'] = array(array('table' => 'master_users', 'alias' => 'MasterUsers', 'type' => 'LEFT', 'conditions' => array( 'MasterUsers.id = Hospital.user_id',
        )  ));

        $options['conditions'] = array('MasterUsers.status' => 1,'MasterUsers.login_tytpe'=>'H');

		$hospitalList = array('' => 'Select Hospital');
		$hospitalList += $this->Hospital->find('list',$options);
		$this->set('hospitalList', $hospitalList);
		//======================================
		//pr($serviceArr);exit;

		//=========Service List fetch=========
		$this->loadModel('ServiceType');
		$serviceList = array('' => 'Select Services');
		$serviceList += $this->ServiceType->find('list', array('conditions' => array('status' => 1), 'order' => array('service_name' => 'asc')));
		$this->set('serviceList', $serviceList);

		

		//===============================================//

		if ($this->request->is(array('post', 'put'))) {
			
			//=======Check For Password same with Conf. Password===========//
			$pwdData=$this->request->data['MasterDoctor']['user_pass'];
			$confPwd=$this->request->data['MasterDoctor']['cnf_pass'];
			$uname=$this->request->data['MasterDoctor']['user_name'];
			$email=$this->request->data['MasterDoctor']['email_id'];
			$checkUname=$this->MasterDoctor->find('first', array('conditions' => array('id !=' => $id, 'user_name' => $uname)));
			$checkemail=$this->MasterDoctor->find('first', array('conditions' => array('id !=' => $id,'email_id' => $email ,'login_tytpe'=>'D')));
			if($pwdData!=$confPwd){
				$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
			}else if(count($checkUname)>0){
				$this->Session->setFlash(__('User Name Already Exists.'));
			}else if(count($checkemail)>0){
				$this->Session->setFlash(__('Email-Id Already Exists.'));
			}else{
				$this->request->data['MasterDoctor']['dob']=date('Y-m-d', strtotime($this->request->data['MasterDoctor']['dob']));
				
				
					//=========Check unique email Validation================//
					
					
					//======================================================//

						$pwd = base64_encode($this->request->data['MasterDoctor']['user_pass']);
						$this->request->data['MasterDoctor']['user_pass'] = $pwd;
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
							
					//==========================================================

					//===========User meta field Add functionality==================
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
						//==================================================================
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
						//================================================================
							$this->Session->setFlash(__('Doctor detail updated successfully'));
							return $this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The Doctor detail could not be saved. Please fill all required field to proceed.'));
						}
					}
				
			
		} else {
			$options = array('conditions' => array('MasterDoctor.' . $this->MasterDoctor->primaryKey => $id));
			$this->request->data = $this->MasterDoctor->find('first', $options);
		}
		$this->layout='add_admin';
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MasterDoctor->id = $id;
		if (!$this->MasterDoctor->exists()) {
			throw new NotFoundException(__('Invalid master doctor'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('Appointment');
		$apptChk=$this->Appointment->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('DiagnosysReport');
		$dChk=$this->DiagnosysReport->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('UploadtestResult');
		$testChk=$this->UploadtestResult->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('DoctorAvailability');
		$availableChk=$this->DoctorAvailability->find('first', array('conditions' => array('doctor_id' => $id)));
		$this->loadModel('RegularAppointment');
		$fulltimeAppoint=$this->RegularAppointment->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('Feedback');
		$feedbacks=$this->Feedback->find('first', array('conditions' => array('doctorid' => $id)));

		if(count($apptChk)>0 || count($dChk)>0 || count($testChk)>0 || count($availableChk)>0 || count($fulltimeAppoint)>0 || count($feedbacks)>0){
			$this->Session->setFlash(__('to Delete this Doctor First delete its related data or <a href="http://'.$_SERVER['HTTP_HOST'].Router::url('/admin/MasterDoctors/deleterelate/').$id.'" style="color:#ff0000">click here</a> to delete its related data and that Doctor'));
		}else if ($this->MasterDoctor->delete()) {
			//====Delete User meta functionality======
			$this->loadModel('UserMeta');
			$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
			//========================================

			//====Delete Service Assigned functionality======
			$this->loadModel('AssignService');
			$delServiceAssign=$this->AssignService->deleteAll(array('userid' => $id));
			//========================================
			$this->Session->setFlash(__('The doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * deleterelate method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_deleterelate($id = null) {
		//echo $id;exit;
		$this->MasterDoctor->id = $id;
		if (!$this->MasterDoctor->exists()) {
			throw new NotFoundException(__('Invalid master user'));
		}
		
		$this->loadModel('Appointment');
		$apptChk=$this->Appointment->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('DiagnosysReport');
		$dChk=$this->DiagnosysReport->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('UploadtestResult');
		$testChk=$this->UploadtestResult->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('DoctorAvailability');
		$availableChk=$this->DoctorAvailability->find('first', array('conditions' => array('doctor_id' => $id)));
		$this->loadModel('RegularAppointment');
		$fulltimeAppoint=$this->RegularAppointment->find('first', array('conditions' => array('doctorid' => $id)));
		$this->loadModel('Feedback');
		$feedbacks=$this->Feedback->find('first', array('conditions' => array('doctorid' => $id)));

		if(count($apptChk)>0){
			$deleteappt=$this->Appointment->deleteAll(array('doctorid' => $id));
		}
		if(count($dChk)>0){
			$deletediagno=$this->DiagnosysReport->deleteAll(array('doctorid' => $id));
		}
		if(count($testChk)>0){
			$deleteTest=$this->UploadtestResult->deleteAll(array('doctorid' => $id));
		}
		if(count($availableChk)>0){
			$deleteAvailablity=$this->DoctorAvailability->deleteAll(array('doctor_id' => $id));
		}
		if(count($fulltimeAppoint)>0){
			$deleteRegularApnt=$this->RegularAppointment->deleteAll(array('doctorid' => $id));
		}
		if(count($feedbacks)>0){
			$deleteRegularApnt=$this->Feedback->deleteAll(array('doctorid' => $id));
		}
		if ($this->MasterDoctor->delete()) {
			//====Delete User meta functionality======
			$this->loadModel('UserMeta');
			$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
			//========================================

			//====Delete Service Assigned functionality======
			$this->loadModel('AssignService');
			$delServiceAssign=$this->AssignService->deleteAll(array('userid' => $id));
			//========================================
			$this->Session->setFlash(__('The doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * set_status_inactive method
 *Author: Rajesh
 *Date:08th jan-2016
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_set_status_inactive ($id = null) {
		$this->MasterDoctor->id = $id;
		if (!$this->MasterDoctor->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterDoctor->saveField('status','0')){
			$this->Session->setFlash(__('Doctor Deactivated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * set_status_active method
 *Author: Rajesh
 *Date:08th jan-2016
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_set_status_active($id = null) {
		$this->MasterDoctor->id = $id;
		if (!$this->MasterDoctor->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterDoctor->saveField('status','1')){
			$this->Session->setFlash(__('Doctor Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
