<?php
App::uses('AppController', 'Controller');
/**
 * MasterLabs Controller
 *
 * @property MasterLab $MasterLab
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MasterLabsController extends AppController {

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
		$this->MasterLab->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array('login_tytpe' => 'L'),
			'order' => array('id' => 'desc')
			);
		$this->set('MasterLabs', $this->Paginator->paginate('MasterLab'));
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
		if (!$this->MasterLab->exists($id)) {
			throw new NotFoundException(__('Invalid pharamasist'));
		}
		$options = array('conditions' => array('MasterLab.' . $this->MasterLab->primaryKey => $id));
		$this->set('MasterLab', $this->MasterLab->find('first', $options));
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
			$lastUser = $this->MasterLab->find('first', array('conditions' => array('login_tytpe' => 'L'), 'order' => array('id' => 'desc')));
			if(count($lastUser)>0){
				$userLastID = $lastUser['MasterLab']['id'];
				$lastid=$lastUser['MasterLab']['ref_id'];
				$lastno = ($lastid!='') ? explode("A",$lastid) : 10000;
				$increaseNo = intval($lastno[1])+1;
				$refID = "LA".$increaseNo; 
			}else{
				$refID = "LA10001";
			}
			$this->request->data['MasterLab']['ref_id'] = $refID;
			$this->request->data['MasterLab']['login_tytpe']='L';
			$this->error=0;
			//=======Check For Password same with Conf. Password===========//
			$pwdData=$this->request->data['MasterLab']['user_pass'];
			$confPwd=$this->request->data['MasterLab']['cnf_pass'];
			if($pwdData!=$confPwd){
				$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
				$this->error=1;
			}
			//=======Check For Password same with Conf. Password===========//
			//==================Check For User Name========================//
			$uname=$this->request->data['MasterLab']['user_name'];
			$checkUname=$this->MasterLab->find('first', array('conditions' => array('user_name' => $uname)));
			if(count($checkUname)>0){
				$this->Session->setFlash(__('User Name Already Exists.'));
				$this->error=1;
				//pr($this->request->data);exit;
				
			}
			//==================Check For User Name========================//
			//=====================Check Email============================//
				$email=$this->request->data['MasterLab']['email_id'];
				$this->loadModel('MasterUser');
				if($email!=""){
					$checkemail=$this->MasterUser->find('first', array('conditions' => array('email_id' => $email ,'login_tytpe'=>'L')));
					if(count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
						$this->error=1;
					}
				}
			//=====================Check Email============================//
			
			if($this->error==0){
				$pwd = base64_encode($this->request->data['MasterLab']['user_pass']);
				$this->request->data['MasterLab']['user_pass'] = $pwd;
				$this->MasterLab->create();
				if ($this->MasterLab->save($this->request->data)) {
					$insertID = $this->MasterLab->getLastInsertId();
				
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
					
					$this->Session->setFlash(__('Lab registered successfully'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Lab detail could not be saved. Please fill all required field to proceed.'));
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
		if (!$this->MasterLab->exists($id)) {
			//throw new NotFoundException(__('Invalid master doctor'));
		return $this->redirect(array('action' => 'index'));
		 }
		
		//===============================================//

		if ($this->request->is(array('post', 'put'))) {
			$this->error=0;
			//=======Check For Password same with Conf. Password===========//
				$pwdData=$this->request->data['MasterLab']['user_pass'];
				$confPwd=$this->request->data['MasterLab']['cnf_pass'];
				if($pwdData!=$confPwd){
					$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
					$this->error=1;
				}
			//=======Check For Password same with Conf. Password===========//
			//==================Check For User Name========================//
				//$this->loadModel('MasterLab');
				$uname=$this->request->data['MasterLab']['user_name'];
				$checkUname=$this->MasterLab->find('first', array('conditions' => array('id !=' => $id,'user_name' => $uname)));
				if(count($checkUname)>0){
					$this->Session->setFlash(__('User Name Already Exists.'));
					$this->error=1;
				}
			//==================Check For User Name========================//
			//=====================Check Email============================//
				$email=$this->request->data['MasterLab']['email_id'];
				$this->loadModel('MasterUser');
				if($email!=""){
					$checkemail=$this->MasterUser->find('first', array('conditions' => array('id !=' => $id,'email_id' => $email ,'login_tytpe'=>'L')));
					if(count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
						$this->error=1;
					}
				}
			//=====================Check Email End========================//
				if($this->error==0){
						$pwd = base64_encode($this->request->data['MasterLab']['user_pass']);
						$this->request->data['MasterLab']['user_pass'] = $pwd;
							if ($this->MasterLab->save($this->request->data)) {
								$insertID = $this->request->data['MasterLab']['id'];
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
							
								$this->Session->setFlash(__('Lab detail updated successfully'));
								return $this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash(__('The Lab detail could not be saved. Please fill all required field to proceed.'));
							}
						
				}
		} else {
			$options = array('conditions' => array('MasterLab.' . $this->MasterLab->primaryKey => $id));
			$this->request->data = $this->MasterLab->find('first', $options);
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
		$this->MasterLab->id = $id;
		if (!$this->MasterLab->exists()) {
			throw new NotFoundException(__('Invalid master doctor'));
		}
		$this->request->onlyAllow('post', 'delete');

		$this->loadModel('UserMeta');
		if ($this->MasterLab->delete()) {
			//====Delete User meta functionality======
			$this->loadModel('UserMeta');
			$deleteUserMeta=$this->UserMeta->deleteAll(array('user_id' => $id));
			//========================================

			$this->Session->setFlash(__('The Lab has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Lab could not be deleted. Please, try again.'));
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
		$this->MasterLab->id = $id;
		if (!$this->MasterLab->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterLab->saveField('status','0')){
			$this->Session->setFlash(__('Lab Deactivated Successfully'));
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
		$this->MasterLab->id = $id;
		if (!$this->MasterLab->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->MasterLab->saveField('status','1')){
			$this->Session->setFlash(__('Lab Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
