<?php
App::uses('AppController', 'Controller');
/**
 * MasterHospitals Controller
 *
 * @property MasterHospital $MasterHospital
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MasterHospitalsController extends AppController {

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
		$this->MasterHospital->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array('login_tytpe' => 'H'),
			'order' => array('id' => 'desc')
			);
		$this->set('masterHospitals', $this->Paginator->paginate('MasterHospital'));
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
		if (!$this->MasterHospital->exists($id)) {
			throw new NotFoundException(__('Invalid master doctor'));
		}
		$options = array('conditions' => array('MasterHospital.' . $this->MasterHospital->primaryKey => $id));
		$this->set('masterHospital', $this->MasterHospital->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		
		if ($this->request->is('post')) {
			//pr($this->request);exit;
			//Reference ID generation============
			$lastUser = $this->MasterHospital->find('first', array('conditions' => array('login_tytpe' => 'H'), 'order' => array('id' => 'desc')));
			if(count($lastUser)>0){
				$userLastID = $lastUser['MasterHospital']['id'];
				$lastid=$lastUser['MasterHospital']['ref_id'];
				$lastno = ($lastid!='') ? explode("O",$lastid) : 10000;
				$increaseNo = intval($lastno[1])+1;
				$refID = "HO".$increaseNo; 
			}else{
				$refID = "HO10001";
			}
			$this->request->data['MasterHospital']['ref_id'] = $refID;
			$this->request->data['MasterHospital']['login_tytpe']='H';
			//$this->request->data['MasterHospital']['dob']=date('Y-m-d', strtotime($this->request->data['MasterHospital']['dob']));
			$this->error=0;
			//=======Check For Password same with Conf. Password===========//
			$pwdData=$this->request->data['MasterHospital']['user_pass'];
			$confPwd=$this->request->data['MasterHospital']['cnf_pass'];
			if($pwdData!=$confPwd){
				$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
				$this->error=1;
			}
			//=======Check For Password same with Conf. Password===========//
			//==================Check For User Name========================//
			$uname=$this->request->data['MasterHospital']['user_name'];
			$checkUname=$this->MasterHospital->find('first', array('conditions' => array('user_name' => $uname)));
			if(count($checkUname)>0){
				$this->Session->setFlash(__('User Name Already Exists.'));
				$this->error=1;
				//pr($this->request->data);exit;
				
			}
			//==================Check For User Name========================//
			//=====================Check Email============================//
				$email=$this->request->data['MasterHospital']['email_id'];
				$this->loadModel('MasterUser');
				if($email!=""){
					$checkemail=$this->MasterUser->find('first', array('conditions' => array('email_id' => $email ,'login_tytpe'=>'H')));
					if(count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
						$this->error=1;
					}
				}
			//=====================Check Email============================//
			
			if($this->error==0){
				$pwd = base64_encode($this->request->data['MasterHospital']['user_pass']);
				$this->request->data['MasterHospital']['user_pass'] = $pwd;
				$this->MasterHospital->create();
				if ($this->MasterHospital->save($this->request->data)) {
					$insertID = $this->MasterHospital->getLastInsertId();
				
					//==========================================================
					//===========User meta field Add functionality==================
					if(isset($this->request->data['attr_field'])){
						$attr_field = $this->request->data['attr_field'];
							if(!empty($attr_field)){
								$this->loadModel('UserMeta');
								foreach ($attr_field as $attrIndex => $attrValue) {
								
								//=========Passport photo upload functionality=============
								if($attrIndex=='hospital_logo'){
									$fileData=$attrValue;
									if($fileData['name']!='')
									{
										$profileImg=time().$fileData['name'];
										move_uploaded_file($fileData['tmp_name'],WWW_ROOT.'files/hospital_logo/'.$profileImg);
										$attrValue=$profileImg;
									}else{
										$attrValue='';
									}
								}
								//=============================================================	
								$metaFields=array('user_id' => $insertID, 'meta_key' => $attrIndex, 'meta_value' => $attrValue);
								$this->UserMeta->create();
								$this->UserMeta->save($metaFields);
							}
						}
					}
					//==================================================================
					//===========Hospital Detail Save functionality===================

						//==============Modified Code===============//
						if($this->request->data['Hospital']['hospital_name']!=''){
							$this->request->data['Hospital']['user_id'] = $insertID;
							$this->loadModel('Hospital');
							$this->Hospital->save($this->request->data);
						}
						//==========================================//
				
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
					}*/
					//================================================================


					$this->Session->setFlash(__('Hospital registered successfully'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Hospital detail could not be saved. Please fill all required field to proceed.'));
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
		if (!$this->MasterHospital->exists($id)) {
			//throw new NotFoundException(__('Invalid master doctor'));
		return $this->redirect(array('action' => 'index'));
		 }
		
		//===============================================//

		if ($this->request->is(array('post', 'put'))) {
			$this->error=0;
			//=======Check For Password same with Conf. Password===========//
				$pwdData=$this->request->data['MasterHospital']['user_pass'];
				$confPwd=$this->request->data['MasterHospital']['cnf_pass'];
				if($pwdData!=$confPwd){
					$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
					$this->error=1;
				}
			//=======Check For Password same with Conf. Password===========//
			//==================Check For User Name========================//
				//$this->loadModel('MasterHospital');
				$uname=$this->request->data['MasterHospital']['user_name'];
				$checkUname=$this->MasterHospital->find('first', array('conditions' => array('id !=' => $id,'user_name' => $uname)));
				if(count($checkUname)>0){
					$this->Session->setFlash(__('User Name Already Exists.'));
					$this->error=1;
				}
			//==================Check For User Name========================//
			//=====================Check Email============================//
				$email=$this->request->data['MasterHospital']['email_id'];
				$this->loadModel('MasterUser');
				if($email!=""){
					$checkemail=$this->MasterUser->find('first', array('conditions' => array('id !=' => $id,'email_id' => $email ,'login_tytpe'=>'H')));
					if(count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
						$this->error=1;
					}
				}
			//=====================Check Email End========================//
				if($this->error==0){
					
						$pwd = base64_encode($this->request->data['MasterHospital']['user_pass']);
						$this->request->data['MasterHospital']['user_pass'] = $pwd;
							if ($this->MasterHospital->save($this->request->data)) {
								$insertID = $this->request->data['MasterHospital']['id'];
	
								
	
						//===========User meta field Add functionality==================
							if(isset($this->request->data['attr_field'])){
							$attr_field = $this->request->data['attr_field'];
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
								$this->Session->setFlash(__('Hospital detail updated successfully'));
								return $this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash(__('The Hospital detail could not be saved. Please fill all required field to proceed.'));
							}
						
				}
		} else {
			$options = array('conditions' => array('MasterHospital.' . $this->MasterHospital->primaryKey => $id));
			$this->request->data = $this->MasterHospital->find('first', $options);
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
		$this->MasterHospital->id = $id;
		if (!$this->MasterHospital->exists()) {
			throw new NotFoundException(__('Invalid master doctor'));
		}
		$this->request->onlyAllow('post', 'delete');

		$this->loadModel('Hospital');
		$dhospitalDet=$this->Hospital->find('first',array('conditions' =>array('user_id' => $id)));
		$hospitalID=$dhospitalDet['Hospital']['id'];
		//echo $hospitalID;exit;
		$this->loadModel('UserMeta');
		$checkHosp=$this->UserMeta->find('first',array('conditions' =>array('meta_key' => 'hospitalid' , 'meta_value' => $hospitalID)));

		if(count($checkHosp)>0 ){
			$this->Session->setFlash(__('to Delete this Hospital First delete its related data or <a href="http://'.$_SERVER['HTTP_HOST'].Router::url('/admin/MasterHospitals/deleterelate/').$id.'" style="color:#ff0000">click here</a> to delete its related data and that Hospital'));
		}else if ($this->MasterHospital->delete()) {
			//====Delete User meta functionality======
			$this->loadModel('UserMeta');
			$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
			//========================================

			//====Delete Service Assigned functionality======
			$this->loadModel('Hospital');
			$delServiceAssign=$this->Hospital->deleteAll(array('user_id' => $id));
			//========================================

			$this->Session->setFlash(__('The Hospital has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Hospital could not be deleted. Please, try again.'));
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
		$this->MasterHospital->id = $id;
		if (!$this->MasterHospital->exists()) {
			throw new NotFoundException(__('Invalid master doctor'));
		}
		
		$this->loadModel('Hospital');
		$dhospitalDet=$this->Hospital->find('first',array('conditions' =>array('user_id' => $id)));
		$hospitalID=$dhospitalDet['Hospital']['id'];
		$this->loadModel('UserMeta');
		$checkHosp=$this->UserMeta->find('first',array('conditions' =>array('meta_key' => 'hospitalid' , 'meta_value' => $hospitalID)));
		
		if(count($checkHosp)>0 ){
			$deletehosp=$this->UserMeta->deleteAll(array('meta_key' => 'hospitalid' , 'meta_value' => $hospitalID));
		}

		
		if ($this->MasterHospital->delete()) {
			//====Delete User meta functionality======
			$this->loadModel('UserMeta');
			$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
			//========================================

			//====Delete Service Assigned functionality======
			$this->loadModel('Hospital');
			$delServiceAssign=$this->Hospital->deleteAll(array('user_id' => $id));
			//========================================

			$this->Session->setFlash(__('The Hospital has been deleted.'));
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
		$this->MasterHospital->id = $id;
		if (!$this->MasterHospital->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterHospital->saveField('status','0')){
			$this->Session->setFlash(__('Hospital Deactivated Successfully'));
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
		$this->MasterHospital->id = $id;
		if (!$this->MasterHospital->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterHospital->saveField('status','1')){
			$this->Session->setFlash(__('Hospital Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
