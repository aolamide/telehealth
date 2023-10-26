<?php
App::uses('AppController', 'Controller');
/**
 * MasterUsers Controller
 *
 * @property MasterUser $MasterUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MasterUsersController extends AppController {

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
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MasterUser->recursive = 0;
		$this->Paginator->settings=array(
			'conditions' => array('login_tytpe' => 'P'),
			'order' => array('id' => 'desc')
			);
		$this->set('masterUsers', $this->Paginator->paginate());
		$this->layout="manage_admin";
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MasterUser->exists($id)) {
			throw new NotFoundException(__('Invalid master user'));
		}
		$options = array('conditions' => array('MasterUser.' . $this->MasterUser->primaryKey => $id));
		$this->set('masterUser', $this->MasterUser->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {

		//=========Country List fetch=========
		$this->loadModel('MasterCountry');
		$countryList = array('' => 'Select Country');
		$countryList += $this->MasterCountry->find('list', array('order' => array('country_name' => 'asc')));
		$this->set('countryList', $countryList);
		//=========Stae List fecth==========
		$this->loadModel('MasterState');
		$stateList = array('' => 'Select State');
		$this->set('stateList', $stateList);
		//==========Submit Post Functionality==========
		//=========Hospital List fetch=========
		$this->loadModel('Hospital');
		$options['joins'] = array(array('table' => 'master_users', 'alias' => 'MasterUsers', 'type' => 'LEFT', 'conditions' => array( 'MasterUsers.id = Hospital.user_id',
        )  ));

        $options['conditions'] = array('MasterUsers.status' => 1,'MasterUsers.login_tytpe'=>'H');

		$hospitalList = array('' => 'Select Hospital');
		$hospitalList += $this->Hospital->find('list',$options);
		$this->set('hospitalList', $hospitalList);
		//===============================================================
		if ($this->request->is('post')) {
			//print_r($this->request->data);exit;
				//Reference ID generation============
				$lastUser = $this->MasterUser->find('first', array('conditions' => array('login_tytpe' => 'P'), 'order' => array('id' => 'desc')));
				if(count($lastUser)>0){
					$userLastID = $lastUser['MasterUser']['id'];
					$lastid=$lastUser['MasterUser']['ref_id'];
					$lastno = ($lastid!='') ? explode("A",$lastid) : 10000;
					$increaseNo = intval($lastno[1])+1;
					$refID = "PA".$increaseNo; 
				}else{
					$refID = "PA10001";
				}
				$this->request->data['MasterUser']['ref_id'] = $refID;
				//==================================================

				$this->request->data['MasterUser']['login_tytpe']='P';
				$this->request->data['MasterUser']['dob']=date('Y-m-d', strtotime($this->request->data['MasterUser']['dob']));
				$uname=$this->request->data['MasterUser']['user_name'];
				//==============Check user name=====================//
				$checkUname=$this->MasterUser->find('first', array('conditions' => array('user_name' => $uname)));
				//=====================Check Email===================//
				$email=$this->request->data['MasterUser']['email_id'];
				if($email!=''){
				$checkemail=$this->MasterUser->find('first', array('conditions' => array('email_id' => $email ,'login_tytpe'=>'P')));
			}else{$checkemail=array();}
				
				//=======Check For Password same with Conf. Password===========//
				$pwdData=$this->request->data['MasterUser']['user_pass'];
				$confPwd=$this->request->data['MasterUser']['cnf_pass'];
				if($pwdData!=$confPwd){
					$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
				}else if(count($checkUname)>0){
					$this->Session->setFlash(__('User Name Already Exists.'));
				}else if($email!="" && count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
				}else{
				$pwd = base64_encode($this->request->data['MasterUser']['user_pass']);
				$this->request->data['MasterUser']['user_pass'] = $pwd;
					$this->MasterUser->create();
					if ($this->MasterUser->save($this->request->data)) {
						$insertID = $this->MasterUser->getLastInsertId();
						//===========User meta field Add functionality==================
						if(isset($this->request->data['attr_field'])){
							$attr_field = $this->request->data['attr_field'];
								if(!empty($attr_field)){
									$this->loadModel('UserMeta');
									foreach ($attr_field as $attrIndex => $attrValue) {
									$metaFields=array('user_id' => $insertID, 'meta_key' => $attrIndex, 'meta_value' => $attrValue);
									$this->UserMeta->create();
									$this->UserMeta->save($metaFields);
								}
							}
						}
						//==================================================================
						$this->Session->setFlash(__('Patient has successfully registered'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The patient detail could not be saved. Please fill all required field to proceed.'));
					}
				}
		}
		$this->layout='add_admin';
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MasterUser->exists($id)) {
			throw new NotFoundException(__('Invalid master user'));
		}
		//=========Hospital List fetch=========
		$this->loadModel('Hospital');
		$options['joins'] = array(array('table' => 'master_users', 'alias' => 'MasterUsers', 'type' => 'LEFT', 'conditions' => array( 'MasterUsers.id = Hospital.user_id',
        )  ));

        $options['conditions'] = array('MasterUsers.status' => 1,'MasterUsers.login_tytpe'=>'H');

		$hospitalList = array('' => 'Select Hospital');
		$hospitalList += $this->Hospital->find('list',$options);
		$this->set('hospitalList', $hospitalList);
		//===============================================================
		
		//=========Country List fetch=========
		$this->loadModel('MasterCountry');
		$countryList = array('' => 'Select Country');
		$countryList += $this->MasterCountry->find('list', array('order' => array('country_name' => 'asc')));
		$this->set('countryList', $countryList);
		//=========Stae List fecth==========
		$this->loadModel('MasterState');
		$stateList = array('' => 'Select State');
		$this->set('stateList', $stateList);
		if ($this->request->is(array('post', 'put'))) {
			//=======Check For Password same with Conf. Password===========//
			$pwdData=$this->request->data['MasterUser']['user_pass'];
			$confPwd=$this->request->data['MasterUser']['cnf_pass'];
			$uname=$this->request->data['MasterUser']['user_name'];
			$email=$this->request->data['MasterUser']['email_id'];
			if($email!=''){
			$checkemail=$this->MasterUser->find('first', array('conditions' => array('email_id' => $email ,'login_tytpe'=>'P', 'id !=' => $id)));
		}else{$checkemail=array();}
			$checkUname=$this->MasterUser->find('first', array('conditions' => array('user_name' => $uname, 'id !=' => $id)));
			if($pwdData!=$confPwd){
				$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
			}
			else if(count($checkUname)>0){
				$this->Session->setFlash(__('User Name Already Exists.'));
			}else if($email!="" && count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
				}else{
					$pwd = base64_encode($this->request->data['MasterUser']['user_pass']);
					$this->request->data['MasterUser']['user_pass'] = $pwd;
					if ($this->MasterUser->save($this->request->data)) {
						//print_r($this->request->data);exit;
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
						$this->Session->setFlash(__('Patient has updated successfully'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The patient detail could not be saved. Please fill all required field to proceed.'));
					}
				}
			
		} else {
			$options = array('conditions' => array('MasterUser.' . $this->MasterUser->primaryKey => $id));
			$this->request->data = $this->MasterUser->find('first', $options);
		}
	$this->layout='add_admin';
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MasterUser->id = $id;
		if (!$this->MasterUser->exists()) {
			throw new NotFoundException(__('Invalid master user'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('Appointment');
			$apptChk=$this->Appointment->find('first', array('conditions' => array('patientid' => $id)));
			$this->loadModel('DiagnosysReport');
			$dChk=$this->DiagnosysReport->find('first', array('conditions' => array('patientid' => $id)));
			$this->loadModel('UploadtestResult');
			$testChk=$this->UploadtestResult->find('first', array('conditions' => array('userid' => $id)));
			if(count($apptChk)>0 || count($dChk)>0 || count($testChk)>0){
				$this->Session->setFlash(__('to Delete this patient First delete its related data or <a href="http://'.$_SERVER['HTTP_HOST'].Router::url('/admin/MasterUsers/deleterelate/').$id.'" style="color:#ff0000">click here</a> to delete its related data and that patient'));
			}else if ($this->MasterUser->delete()) {
				//====Delete User meta functionality======
				$this->loadModel('UserMeta');
				$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
				//========================================
				$this->Session->setFlash(__('The Patient has been deleted.'));
			
		} else {
			$this->Session->setFlash(__('The patient could not be deleted. Please, try again.'));
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
		$this->MasterUser->id = $id;
		if (!$this->MasterUser->exists()) {
			throw new NotFoundException(__('Invalid master user'));
		}
		$this->loadModel('Appointment');
			$apptChk=$this->Appointment->find('first', array('conditions' => array('patientid' => $id)));
			$this->loadModel('DiagnosysReport');
			$dChk=$this->DiagnosysReport->find('first', array('conditions' => array('patientid' => $id)));
			$this->loadModel('UploadtestResult');
			$testChk=$this->UploadtestResult->find('first', array('conditions' => array('userid' => $id)));
			if(count($apptChk)>0){
				$deleteappt=$this->Appointment->deleteAll(array('patientid' => $id));
			}
			if(count($dChk)>0){
				$deletediagno=$this->DiagnosysReport->deleteAll(array('patientid' => $id));
			}
			if(count($testChk)>0){
				$deleteTest=$this->UploadtestResult->deleteAll(array('userid' => $id));
			}
			 if ($this->MasterUser->delete()) {
				//====Delete User meta functionality======
				$this->loadModel('UserMeta');
				$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
				//========================================
				$this->Session->setFlash(__('The Patient has been deleted.'));
			
		} else {
			$this->Session->setFlash(__('The patient could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_getstate(){
		
		if($this->request->is('post')){
			$countryID= $this->request->data['countryID'];
			$this->loadModel('MasterState');
			
			$MasterStateRes=$this->MasterState->find('all', array('conditions' => array('country_id' => $countryID)));
			?>
					<option value="">Select State</option>
					<?php
			if(count($MasterStateRes)>0){
				
				foreach ($MasterStateRes as $stateResult) {
					?>
					<option value="<?php echo $stateResult['MasterState']['location_id']; ?>"><?php echo $stateResult['MasterState']['location_name']; ?></option>
					<?php
				}
			}
		}
		exit();
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
		$this->MasterUser->id = $id;
		if (!$this->MasterUser->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterUser->saveField('status','0')){
			$this->Session->setFlash(__('User Deactivated Successfully'));
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
		$this->MasterUser->id = $id;
		if (!$this->MasterUser->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterUser->saveField('status','1')){
			$this->Session->setFlash(__('User Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
