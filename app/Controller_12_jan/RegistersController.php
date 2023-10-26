<?php
App::uses('AppController', 'Controller');
/**
 * Registers Controller
 *
 * @property Register $Register
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RegistersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout="register";
	}
/**
 * patient method
 *
 * @return void
 */
	public function patient() {
		//=========Country List fetch=========
		$this->loadModel('MasterCountry');
		$countryList = array('' => 'Select Country');
		$countryList += $this->MasterCountry->find('list', array('order' => array('country_name' => 'asc')));
		$this->set('countryList', $countryList);
		//=========Stae List fecth==========
		$this->loadModel('MasterState');
		$stateList = array('' => 'Select State');
		$this->set('stateList', $stateList);

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

			//Reference ID generation============
			$lastUser = $this->Register->find('first', array('conditions' => array('login_tytpe' => 'P'), 'order' => array('id' => 'desc')));
			if(count($lastUser)>0){
				$userLastID = $lastUser['Register']['id'];
				$lastid=$lastUser['Register']['ref_id'];
				$lastno = ($lastid!='') ? explode("A",$lastid) : 10000;
				$increaseNo = intval($lastno[1])+1;
				$refID = "PA".$increaseNo; 
			}else{
				$refID = "PA10001";
			}
			$this->request->data['Register']['ref_id'] = $refID;
			$this->request->data['Register']['patient_id'] = rand(10, 100000);
			//==================================================

			$this->request->data['Register']['login_tytpe']='P';
			$this->request->data['Register']['dob']=date('Y-m-d', strtotime($this->request->data['Register']['dob']));
			//$uname=$this->request->data['Register']['user_name'];
			//$checkUname=$this->Register->find('first', array('conditions' => array('user_name' => $uname)));
				//=======Check For Password same with Conf. Password===========//
			$pwdData=$this->request->data['Register']['user_pass'];
			$confPwd=$this->request->data['Register']['cnf_pass'];
			$uname=$this->request->data['Register']['user_name'];
			$email=$this->request->data['Register']['email_id'];
			if($email!=''){
			$checkemail=$this->Register->find('first', array('conditions' => array('email_id' => $email ,'login_tytpe'=>'P')));
		}else{$checkemail=array();}
			$checkUname=$this->Register->find('first', array('conditions' => array('user_name' => $uname)));
			if($pwdData!=$confPwd){
				$this->Session->setFlash(__('Mismatch in password. Please, try again.'));
			}
			else if(count($checkUname)>0){
				$this->Session->setFlash(__('User Name Already Exists.'));
			}else if($email!="" && count($checkemail)>0){
						$this->Session->setFlash(__('Email-Id Already Exists.'));
				}else{
							
					$pwd = base64_encode($this->request->data['Register']['user_pass']);
					$this->request->data['Register']['user_pass'] = $pwd;
					
				$this->Register->create();
					if ($this->Register->save($this->request->data)) {
						$insertID = $this->Register->getLastInsertId();
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
						$this->Session->setFlash(__('Patient has successfully registered&nbsp;&nbsp;<a href="http://'.$_SERVER['HTTP_HOST'].Router::url('/').'">Login</a>'));
						//return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The patient detail could not be saved. Please fill all required field to proceed.'));
					}
				}


		}
		$this->layout="register";
	}

/**
 * patient method
 *
 * @return void
 */
	public function doctor() {
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
			//Reference ID generation============
			$lastUser = $this->Register->find('first', array('conditions' => array('login_tytpe' => 'D'), 'order' => array('id' => 'desc')));
			if(count($lastUser)>0){
				$userLastID = $lastUser['Register']['id'];
				$lastid=$lastUser['Register']['ref_id'];
				$lastno = ($lastid!='') ? explode("R",$lastid) : 10000;
				$increaseNo = intval($lastno[1])+1;
				$refID = "DR".$increaseNo; 
			}else{
				$refID = "DR10001";
			}
			$this->request->data['Register']['ref_id'] = $refID;
			$this->request->data['Register']['login_tytpe']='D';
			$this->request->data['Register']['dob']=date('Y-m-d', strtotime($this->request->data['Register']['dob']));
			$uname=$this->request->data['Register']['user_name'];
			$email=$this->request->data['Register']['email_id'];
			$checkEmail=$this->Register->find('first', array('conditions' => array('email_id' => $email)));
			$checkUname=$this->Register->find('first', array('conditions' => array('user_name' => $uname)));
				if(count($checkUname)>0){
					$this->Session->setFlash(__('User Name Already Exists.'));
				}else if(count($checkEmail)>0){
					$this->Session->setFlash(__('Email Address Already Exists.'));
				}else{
					$pwd = base64_encode($this->request->data['Register']['user_pass']);
					$this->request->data['Register']['user_pass'] = $pwd;
				$this->Register->create();
				if ($this->Register->save($this->request->data)) {
					$insertID = $this->Register->getLastInsertId();

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
					return $this->redirect(array('action' => 'doctor'));
				} else {
					$this->Session->setFlash(__('The Doctor detail could not be saved. Please fill all required field to proceed.'));
				}
			}
		}
		$this->layout="register";
	}

/**
 * hospital method
 *Author: Rajesh
 *Created On: 31st Dec 2015
 * @return void
 */
	public function hospital() {

		if ($this->request->is('post')) {
			$lastUser = $this->Register->find('first', array('conditions' => array('login_tytpe' => 'H'), 'order' => array('id' => 'desc')));
			if(count($lastUser)>0){
				$userLastID = $lastUser['Register']['id'];
				$lastid=$lastUser['Register']['ref_id'];
				$lastno = ($lastid!='') ? explode("O",$lastid) : 10000;
				$increaseNo = intval($lastno[1])+1;
				$refID = "HO".$increaseNo; 
			}else{
				$refID = "HO10001";
			}
			$this->request->data['Register']['ref_id'] = $refID;
			$this->request->data['Register']['login_tytpe']='H';
			$uname=$this->request->data['Register']['user_name'];
			$email=$this->request->data['Register']['email_id'];
			$checkEmail=$this->Register->find('first', array('conditions' => array('email_id' => $email)));
			$checkUname=$this->Register->find('first', array('conditions' => array('user_name' => $uname)));

			if(count($checkUname)>0){
				$this->Session->setFlash(__('User Name Already Exists.'));
			}else if(count($checkEmail)>0){
				$this->Session->setFlash(__('Email Address Already Exists.'));
			}else{
				$pwd = base64_encode($this->request->data['Register']['user_pass']);
				$this->request->data['Register']['user_pass'] = $pwd;
				$this->Register->create();
				if ($this->Register->save($this->request->data)) {
					$insertID = $this->Register->getLastInsertId();

					
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
							$this->loadModel('UserMeta');
							$this->UserMeta->create();
							$this->UserMeta->save(array('user_id' => $insertID, 'meta_key' => 'hospitalid', 'meta_value' => $hospitalID));

						}*/
						//================================================================


					$this->Session->setFlash(__('Hospital registered successfully'));
					return $this->redirect(array('action' => 'hospital'));
				} else {
					$this->Session->setFlash(__('The Hospital detail could not be saved. Please fill all required field to proceed.'));
				}
			}
		}
		$this->layout="register";
	}

	public function getstate(){
		
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
}
