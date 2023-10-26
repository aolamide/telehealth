<?php
App::uses('AppController', 'Controller');
/**
 * MasterPharmasists Controller
 *
 * @property MasterPharmasist $MasterPharmasist
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MasterPharmasistsController extends AppController {

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
		$this->MasterPharmasist->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array('login_tytpe' => 'PH'),
			'order' => array('id' => 'desc')
			);
		$this->set('MasterPharmasists', $this->Paginator->paginate('MasterPharmasist'));
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
		if (!$this->MasterPharmasist->exists($id)) {
			throw new NotFoundException(__('Invalid pharamasist'));
		}
		$options = array('conditions' => array('MasterPharmasist.' . $this->MasterPharmasist->primaryKey => $id));
		$this->set('MasterPharmasist', $this->MasterPharmasist->find('first', $options));
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
			$lastUser = $this->MasterPharmasist->find('first', array('conditions' => array('login_tytpe' => 'PH'), 'order' => array('id' => 'desc')));
			if(count($lastUser)>0){
				$userLastID = $lastUser['MasterPharmasist']['id'];
				$lastid=$lastUser['MasterPharmasist']['ref_id'];
				$lastno = ($lastid!='') ? explode("H",$lastid) : 10000;
				$increaseNo = intval($lastno[1])+1;
				$refID = "PH".$increaseNo; 
			}else{
				$refID = "PH10001";
			}
			$this->request->data['MasterPharmasist']['ref_id'] = $refID;
			$this->request->data['MasterPharmasist']['login_tytpe']='PH';
			$this->error=0;
			//=======Check For Password same with Conf. Password===========//
			$pwdData=$this->request->data['MasterPharmasist']['user_pass'];
			$confPwd=$this->request->data['MasterPharmasist']['cnf_pass'];
			if($pwdData!=$confPwd){
				$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
				$this->error=1;
			}
			//=======Check For Password same with Conf. Password===========//
			//==================Check For User Name========================//
			$uname=$this->request->data['MasterPharmasist']['user_name'];
			$checkUname=$this->MasterPharmasist->find('first', array('conditions' => array('user_name' => $uname)));
			if(count($checkUname)>0){
				$this->Session->setFlash(__('User Name Already Exists.'));
				$this->error=1;
				//pr($this->request->data);exit;
				
			}
			//==================Check For User Name========================//
			//=====================Check Email============================//
				$email=$this->request->data['MasterPharmasist']['email_id'];
				$this->loadModel('MasterUser');
				if($email!=""){
					$checkemail=$this->MasterUser->find('first', array('conditions' => array('email_id' => $email ,'login_tytpe'=>'PH')));
					if(count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
						$this->error=1;
					}
				}
			//=====================Check Email============================//
			
			if($this->error==0){
				$pwd = base64_encode($this->request->data['MasterPharmasist']['user_pass']);
				$this->request->data['MasterPharmasist']['user_pass'] = $pwd;
				$this->MasterPharmasist->create();
				if ($this->MasterPharmasist->save($this->request->data)) {
					$insertID = $this->MasterPharmasist->getLastInsertId();
				
					//==========================================================
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
					
					$this->Session->setFlash(__('Pharamsist registered successfully'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Pharamsist detail could not be saved. Please fill all required field to proceed.'));
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
		if (!$this->MasterPharmasist->exists($id)) {
			//throw new NotFoundException(__('Invalid master doctor'));
		return $this->redirect(array('action' => 'index'));
		 }
		
		//===============================================//

		if ($this->request->is(array('post', 'put'))) {
			$this->error=0;
			//=======Check For Password same with Conf. Password===========//
				$pwdData=$this->request->data['MasterPharmasist']['user_pass'];
				$confPwd=$this->request->data['MasterPharmasist']['cnf_pass'];
				if($pwdData!=$confPwd){
					$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
					$this->error=1;
				}
			//=======Check For Password same with Conf. Password===========//
			//==================Check For User Name========================//
				//$this->loadModel('MasterPharmasist');
				$uname=$this->request->data['MasterPharmasist']['user_name'];
				$checkUname=$this->MasterPharmasist->find('first', array('conditions' => array('id !=' => $id,'user_name' => $uname)));
				if(count($checkUname)>0){
					$this->Session->setFlash(__('User Name Already Exists.'));
					$this->error=1;
				}
			//==================Check For User Name========================//
			//=====================Check Email============================//
				$email=$this->request->data['MasterPharmasist']['email_id'];
				$this->loadModel('MasterUser');
				if($email!=""){
					$checkemail=$this->MasterUser->find('first', array('conditions' => array('id !=' => $id,'email_id' => $email ,'login_tytpe'=>'PH')));
					if(count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
						$this->error=1;
					}
				}
			//=====================Check Email End========================//
				if($this->error==0){
						$pwd = base64_encode($this->request->data['MasterPharmasist']['user_pass']);
						$this->request->data['MasterPharmasist']['user_pass'] = $pwd;
							if ($this->MasterPharmasist->save($this->request->data)) {
								$insertID = $this->request->data['MasterPharmasist']['id'];
						//===========User meta field Add functionality==================
							if(isset($this->request->data['attr_field'])){
							$attr_field = $this->request->data['attr_field'];
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
							
								$this->Session->setFlash(__('Pharamsist detail updated successfully'));
								return $this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash(__('The Pharamsist detail could not be saved. Please fill all required field to proceed.'));
							}
						
				}
		} else {
			$options = array('conditions' => array('MasterPharmasist.' . $this->MasterPharmasist->primaryKey => $id));
			$this->request->data = $this->MasterPharmasist->find('first', $options);
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
		$this->MasterPharmasist->id = $id;
		if (!$this->MasterPharmasist->exists()) {
			throw new NotFoundException(__('Invalid master doctor'));
		}
		$this->request->onlyAllow('post', 'delete');

		$this->loadModel('UserMeta');
		if ($this->MasterPharmasist->delete()) {
			//====Delete User meta functionality======
			$this->loadModel('UserMeta');
			$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
			//========================================

			$this->Session->setFlash(__('The Pharmasist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Pharmasist could not be deleted. Please, try again.'));
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
		$this->MasterPharmasist->id = $id;
		if (!$this->MasterPharmasist->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterPharmasist->saveField('status','0')){
			$this->Session->setFlash(__('Pharmasist Deactivated Successfully'));
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
		$this->MasterPharmasist->id = $id;
		if (!$this->MasterPharmasist->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterPharmasist->saveField('status','1')){
			$this->Session->setFlash(__('Pharmasist Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
