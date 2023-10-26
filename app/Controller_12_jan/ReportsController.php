<?php
App::uses('AppController', 'Controller');
//App::import('Vendor', 'Excel_XML');
App::import('Vendor', 'Excel1', array('file' => 'Excel/excel.class.php'));
/**
 * Reports Controller
 *
 * @property Report $Report
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReportsController extends AppController {

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
		$this->Report->recursive = 0;
		$this->set('reports', $this->Paginator->paginate());
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
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		$this->set('report', $this->Report->find('first', $options));

		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Report->create();
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
			$this->request->data = $this->Report->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Report->delete()) {
			$this->Session->setFlash(__('The report has been deleted.'));
		} else {
			$this->Session->setFlash(__('The report could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * contact_export
 *Author: Rajesh Kumar Sahoo
 * @throws NotFoundException
 * @param export=contact
 * @return void
 */

	public function admin_contact_export(){
		if($this->request->params['export']='contact'){
			$data_array = array(array('Sl#','Name','Email ID','Phone No', 'Message'));

			$contactList=$this->Report->find('all');
			//print_r($contactList);
			$contactNo=1;
			foreach ($contactList as $contactListRes) {
					array_push($data_array, array( 
					$contactNo,
					ucfirst(stripslashes($contactListRes['Report'] ['first_name']))." ".ucfirst(stripslashes($contactListRes['Report'] ['last_name'])), 
					stripslashes($contactListRes['Report'] ['user_email']),
					stripslashes($contactListRes['Report'] ['phone']),
					nl2br(stripslashes($contactListRes['Report'] ['detail'])),
					
				));
				$contactNo++;

				
			}
			$xls = new Excel_XML('UTF-8', false, 'Contact Request');
			$xls->addArray($data_array);
			$xls->generateXML(time().'-contact-request');
		
		}exit;
	}

/**
 * testreportlist method 
 * Author Rajessh 
 * Date : 29th Dec 2015
 * @return void
 */
	public function admin_testreportlist()
	 {
		
	 	$this->loadModel('UploadtestResult');
	 	$testReportDet=$this->UploadtestResult->find('all');
		//$this->set('testReportDet', $testReportDet);
		
	 	$this->set('testReportDet', $this->Paginator->paginate('UploadtestResult'));
	 	$this->set('title_for_layout', 'Test Report List');
	 	$this->layout="manage_admin";
		/*$this->set('testReportDet', $this->Paginator->paginate());
		$this->layout="manage_admin";*/
	 }

/**
 * diagnosysreaport method 
 * Author Rajesh 
 * Date : 30th Dec 2015
 * @return void
 */
	public function admin_diagnosysreaport()
	 {
		
	 	$this->loadModel('DiagnosysReport');
	 	//$diagnosysReportDet=$this->DiagnosysReport->find('all');
		
	 	$this->set('diagnosysReportDets', $this->Paginator->paginate('DiagnosysReport'));
	 	$this->set('title_for_layout', 'Diagnosys Report List');
	 	$this->layout="manage_admin";
	 }
/**
 * viewdiagnosys method 
 * Author Rajesh 
 * Date : 30th Dec 2015
 * @return void
 */
	public function admin_viewdiagnosys($id = null) {
		$this->loadModel('DiagnosysReport');
		if (!$this->DiagnosysReport->exists($id)) {
			throw new NotFoundException(__('Invalid Diagnosys Report'));
		}

		$options = array('conditions' => array('DiagnosysReport.' . $this->DiagnosysReport->primaryKey => $id));
		$this->set('diagnosysReport', $this->DiagnosysReport->find('first', $options));

		$this->layout="view_admin";
	}

/**
 * conversiondet method 
 * Author Rajesh 
 * Date : 5th Jan 2016
 * @return void
 */
	public function admin_conversation($id = null) {
		$this->loadModel('Appointment');
		
		//$this->set('convReports', $this->Appointment->find('all', array('conditions' => array('join_status IN' => array(2,3), 'status' => 1), 'order' => array('doctorid' => 'asc'))));
		$this->Paginator->settings = array('conditions' => array('Appointment.join_status IN' => array(2,3) ,'status' => 1),'limit' => 10 );
		$this->set('convReports', $this->Paginator->paginate('Appointment'));
		$this->layout="view_admin";
	}
/**
 * viewconversation method 
 * Author Rajesh 
 * Date : 5th Jan 2016
 * @return void
 */
	public function admin_viewconversation($id = null) {
		$this->loadModel('Chat');
		$this->loadModel('Appointment');
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid Conversation Report'));
		}
		$appointDet = $this->Appointment->find('first', array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id, 'status' => 1)));
		$doctorID = $appointDet['Appointment']['doctorid'];
		$patientID = $appointDet['Appointment']['patientid'];
		//pr($appointDet);exit;
		$options = array('conditions' => array('Chat.from_id IN' => array($doctorID,$patientID), 'Chat.to_id IN' => array($doctorID,$patientID)), 'order' => array('cid' => 'asc'));
		$this->set('conversationDetails', $this->Chat->find('all', $options));

		$this->layout="view_admin";
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
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_dignosisdelete($id = null) {
		$this->loadModel('DiagnosysReport');
		$this->DiagnosysReport->id = $id;
		if (!$this->DiagnosysReport->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DiagnosysReport->delete()) {
			$this->Session->setFlash(__('Deleted Successfully'));
		} else {
			$this->Session->setFlash(__('Deleting failed'));
		}
		return $this->redirect(array('action' => 'diagnosysreaport'));
	}
/**
 * admin_adddignosis method 
 * Author Chittaranjan Sahoo 
 * Date : 08-01-2016
 * @return void
 */
	public function admin_adddignosis(){
		
		$this->loadModel('TestMaster');
		$testparentList=array(0 => 'None');
		$testparentList += $this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);
		
		/*$testList=$this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);
		pr($testList);exit;*/
		if ($this->request->is('post')) {
			//pr($this->request->data);exit;
			//$this->request->data['DiagnosysReport']['status']=1;
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
				return $this->redirect(array('action' => 'diagnosysreaport'));
				unset($this->request->data);
			} else {
				$this->Session->setFlash(__('Test result saving failed'));
			}
		}
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
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'P', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('patientList', $patientList);

		$doctorList=array('' => 'Select Doctor');
		$doctorList +=$this->MasterUser->find('list', array(
			'joins' => array(
				        array(
				            'table' => 'appointments',
				            'alias' => 'Appointment',
				            'type' => 'LEFT',
				            'conditions' => array(
				                'Appointment.doctorid = MasterUser.id'
				            )
				        )
				    ),
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'D', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('doctorList', $doctorList);
		$this->layout="add_admin";
	}
/**
 * admin_editdignosis method 
 * Author Chittaranjan Sahoo 
 * Date : 08-01-2016
 * @return void
 */
	public function admin_editdignosis($id=''){
		
		$this->loadModel('TestMaster');
		$testparentList=array(0 => 'None');
		$testparentList += $this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);
		
		/*$testList=$this->TestMaster->find('list', array('conditions' => array('status' => 1), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);
		pr($testList);exit;*/
		if ($this->request->is(array('post', 'put'))) {
			$this->loadModel('DiagnosysReport');
			if ($this->DiagnosysReport->save($this->request->data)) {
				$insertID = $this->request->data['DiagnosysReport']['id'];
				//Test result save functionality============
				$this->loadModel('DiagnosysTest');
				$this->DiagnosysTest->query("delete from diagnosys_test where diagnosys_id = '".$insertID."'");
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
				return $this->redirect(array('action' => 'diagnosysreaport'));
				//unset($this->request->data);
			} else {
				$this->Session->setFlash(__('Test result saving failed'));
			}
		}else{
			$this->loadModel('DiagnosysReport');
			$this->request->data=$this->DiagnosysReport->find('first', array('conditions' => array('id' => $id)));
		}
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
			'conditions' => array('MasterUser.status' => 1, 'Appointment.doctorid' => $this->request->data['DiagnosysReport']['doctorid'], 'MasterUser.login_tytpe' => 'P', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('patientList', $patientList);

		$doctorList=array('' => 'Select Doctor');
		$doctorList +=$this->MasterUser->find('list', array(
			'joins' => array(
				        array(
				            'table' => 'appointments',
				            'alias' => 'Appointment',
				            'type' => 'LEFT',
				            'conditions' => array(
				                'Appointment.doctorid = MasterUser.id'
				            )
				        )
				    ),
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'D', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('doctorList', $doctorList);
		$this->layout="add_admin";
	}
	public function admin_getpatient(){
		if($this->request->is('post')){
			$doctorid=$this->request->data['doctorval'];
			$this->loadModel('MasterUser');
			$patientList =$this->MasterUser->find('list', array(
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
				'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'P', 'Appointment.status' => 1, 'Appointment.doctorid' => $doctorid),
				'fields' =>array('id','name')
				));
			if(count($patientList)>0){
				?>
				<option value="">Select Patient</option>
				<?php
				foreach ($patientList as $patientid => $patientName) {
					?>
					<option value="<?php echo $patientid;?>"><?php echo $patientName;?></option>
					<?php
				}
			}
		}
		exit();
	}
/**
 * admin_addtest method 
 * Author Rajesh Kumar Sahoo 
 * Date : 11-01-2016
 * @return void
 */
	public function admin_addtest(){
		if ($this->request->is('post')) {
			$this->loadModel('UploadtestResult');
			if($this->request->data['UploadtestResult']['uploaded_file']['name']!='')
			{
				$testimg=time().$this->request->data['UploadtestResult']['uploaded_file']['name'];
				move_uploaded_file($this->request->data['UploadtestResult']['uploaded_file']['tmp_name'],WWW_ROOT.'files/testresult/'.$testimg);
				$this->request->data['UploadtestResult']['uploaded_file']=$testimg;
			}
			$this->UploadtestResult->create();
			if ($this->UploadtestResult->save($this->request->data)) {
				$this->Session->setFlash(__('Test result uploaded successfully'));
				return $this->redirect(array('action' => 'testreportlist'));
				unset($this->request->data);
			} else {
				$this->Session->setFlash(__('Test result uploading failed'));
			}
		}
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
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'P', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('patientList', $patientList);

		$doctorList=array('' => 'Select Doctor');
		$doctorList +=$this->MasterUser->find('list', array(
			'joins' => array(
				        array(
				            'table' => 'appointments',
				            'alias' => 'Appointment',
				            'type' => 'LEFT',
				            'conditions' => array(
				                'Appointment.doctorid = MasterUser.id'
				            )
				        )
				    ),
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'D', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('doctorList', $doctorList);
		$this->layout="add_admin";
	}
/**
 * admin_edittest method 
 * Author Rajesh Kumar Sahoo 
 * Date : 11-01-2016
 * @return void
 */
	public function admin_edittest($id){
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
			$this->UploadtestResult->create();
			if ($this->UploadtestResult->save($this->request->data)) {
				$this->Session->setFlash(__('Test result Updated successfully'));
				return $this->redirect(array('action' => 'testreportlist'));
			} else {
				$this->Session->setFlash(__('Test result Updating failed'));
			}
		}
		$this->loadModel('UploadtestResult');
		$this->loadModel('MasterUser');
		$options = array('conditions' => array('UploadtestResult.' . $this->UploadtestResult->primaryKey => $id));
		$this->request->data = $this->UploadtestResult->find('first', $options);

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
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'P', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('patientList', $patientList);

		$doctorList=array('' => 'Select Doctor');
		$doctorList +=$this->MasterUser->find('list', array(
			'joins' => array(
				        array(
				            'table' => 'appointments',
				            'alias' => 'Appointment',
				            'type' => 'LEFT',
				            'conditions' => array(
				                'Appointment.doctorid = MasterUser.id'
				            )
				        )
				    ),
			'conditions' => array('MasterUser.status' => 1, 'MasterUser.login_tytpe' => 'D', 'Appointment.status' => 1),
			'fields' =>array('id','name')
			));
		$this->set('doctorList', $doctorList);
		$this->layout="add_admin";
	}
/**
 * admin_testdelete method 
 * Author Rajesh Kumar Sahoo 
 * Date : 11-01-2016
 * @return void
 */
	public function admin_testdelete($id = null) {
		$this->loadModel('UploadtestResult');
		$this->UploadtestResult->id = $id;
		if (!$this->UploadtestResult->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UploadtestResult->delete()) {
			$this->Session->setFlash(__('Deleted Successfully'));
		} else {
			$this->Session->setFlash(__('Deleting failed'));
		}
		return $this->redirect(array('action' => 'testreportlist'));
	}
/**
 * set_status_inactive method
 *Author: Rajesh
 *Date:08th jan-2016
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_set_status_inactive_test ($id = null) {
		$this->loadModel('UploadtestResult');
		$this->UploadtestResult->id = $id;
		if (!$this->UploadtestResult->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->UploadtestResult->saveField('status','0')){
			$this->Session->setFlash(__('Deactivated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'testreportlist'));
	}
/**
 * set_status_active method
 *Author: Rajesh
 *Date:08th jan-2016
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_set_status_active_test($id = null) {
		$this->loadModel('UploadtestResult');
		$this->UploadtestResult->id = $id;
		if (!$this->UploadtestResult->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->UploadtestResult->saveField('status','1')){
			$this->Session->setFlash(__('Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'testreportlist'));
	}
}
