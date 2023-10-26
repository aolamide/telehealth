<?php
App::uses('AppController', 'Controller');
/**
 * DoctorAvailabilities Controller
 *
 * @property DoctorAvailability $DoctorAvailability
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DoctorAvailabilitiesController extends AppController {

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
		$this->DoctorAvailability->recursive = 0;
		$this->Paginator->settings=array(
			'conditions' => array('doc_type'=>0),
			'order' => array('id' => 'desc')
		);
		$this->set('doctorAvailabilities', $this->Paginator->paginate());
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
		if (!$this->DoctorAvailability->exists($id)) {
			throw new NotFoundException(__('Invalid doctor availability'));
		}
		$options = array('conditions' => array('DoctorAvailability.' . $this->DoctorAvailability->primaryKey => $id));
		$this->set('doctorAvailability', $this->DoctorAvailability->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1,'doc_type'=>0), 'order' => array('fname' => 'asc'),'fields'=>array('id','name')));
		$this->set('doctorList', $doctorList);

		$this->loadModel('DoctoravailableSlot');

		if ($this->request->is('post')) {
			//=============Check Availability=================
				$doc_id=$this->request->data['DoctorAvailability']['doctor_id'];
				$start_time=$this->request->data['DoctorAvailability']['start_time'];
				$start_time = date("H:i:s", strtotime($start_time));
				$end_time=$this->request->data['DoctorAvailability']['end_time'];
				$end_time = date("H:i:s", strtotime($end_time));
				$app_date=$this->request->data['DoctorAvailability']['app_date'];
				$checkAvailabity = $this->DoctorAvailability->find('all', array('conditions' => array('doctor_id' => $doc_id,'status' => 1,'start_time <='=>$start_time,'end_time >='=>$start_time
				, 'date(app_date)'=>date("Y-m-d",strtotime($app_date)) ) ));
				if(count($checkAvailabity)>0){
					$this->Session->setFlash(__('Doctor is not Available !! Please try with other date/time'));
				}else{
					$this->DoctorAvailability->create();
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

						$this->Session->setFlash(__('The doctor availability has been saved.'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The doctor availability could not be saved. Please, try again.'));
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
		if (!$this->DoctorAvailability->exists($id)) {
			throw new NotFoundException(__('Invalid doctor availability'));
		}
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'doc_type'=>0), 'order' => array('fname' => 'asc'),'fields'=>array('id','name')));
		$this->set('doctorList', $doctorList);

		$this->loadModel('DoctoravailableSlot');
		$this->loadModel('Appointment');
		if ($this->request->is(array('post', 'put'))) {
			//=============Check Availability=================
				$doc_id=$this->request->data['DoctorAvailability']['doctor_id'];
				$start_time=$this->request->data['DoctorAvailability']['start_time'];
				$start_time = date("H:i:s", strtotime($start_time));
				$end_time=$this->request->data['DoctorAvailability']['end_time'];
				$end_time = date("H:i:s", strtotime($end_time));
				$app_date=$this->request->data['DoctorAvailability']['app_date'];
				$checkAvailabity = $this->DoctorAvailability->find('all', array('conditions' => array('doctor_id' => $doc_id,'status' => 1,'start_time <='=>$start_time,'end_time >='=>$start_time
				, 'date(app_date)'=>date("Y-m-d",strtotime($app_date)),'id !='=>$id ) ));

				$checkAppoint=$this->Appointment->find('all',array('conditions'=>array('doctorid' => $doc_id,'appointment_availbility'=>$id)));


				if(count($checkAvailabity)>0){
					$this->Session->setFlash(__('Doctor is not Available !! Please try with other date/time'));
				}else if(count($checkAppoint)>0){
					$this->Session->setFlash(__('Apppointment Already Been Booked Within This Time Period!!'));
				}else{
					if ($this->DoctorAvailability->save($this->request->data)) {

						//========================================//
						if($this->DoctoravailableSlot->deleteAll(array('avalability_id' => $id))){

							$doc_start_time=strtotime($this->request->data['DoctorAvailability']['start_time']);
							$doc_end_time=strtotime($this->request->data['DoctorAvailability']['end_time']);
							$available_total_time=round(abs($doc_start_time - $doc_end_time) / 60,2);
							$availablecnt=intval($available_total_time/20);
							$insertID = $id;
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
						}
						//========================================//

						$this->Session->setFlash(__('The doctor availability has been saved.'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The doctor availability could not be saved. Please, try again.'));
					}
				}
		} else {
			$options = array('conditions' => array('DoctorAvailability.' . $this->DoctorAvailability->primaryKey => $id));
			$this->request->data = $this->DoctorAvailability->find('first', $options);
		}
		$this->layout="add_admin";
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->DoctorAvailability->id = $id;
		if (!$this->DoctorAvailability->exists()) {
			throw new NotFoundException(__('Invalid doctor availability'));
		}
		$this->request->onlyAllow('post', 'delete');

		$this->loadModel('Appointment');
		$apptChk=$this->Appointment->find('first', array('conditions' => array('appointment_availbility' => $id)));
		if(count($apptChk)>0){
			$this->Session->setFlash(__('to Delete this Doctor Availability First delete its related data or <a href="http://'.$_SERVER['HTTP_HOST'].Router::url('/admin/DoctorAvailabilities/deleterelate/').$id.'" style="color:#ff0000">click here</a> to delete its related data and that Doctor Availability'));
		}else if ($this->DoctorAvailability->delete()) {
			$this->Session->setFlash(__('The doctor availability has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor availability could not be deleted. Please, try again.'));
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
		$this->DoctorAvailability->id = $id;
		if (!$this->DoctorAvailability->exists()) {
			throw new NotFoundException(__('Invalid doctor availability'));
		}
		
		
		$this->loadModel('Appointment');
		$apptChk=$this->Appointment->find('first', array('conditions' => array('appointment_availbility' => $id)));
		if(count($apptChk)>0){
			$diagTestChk=$this->Appointment->deleteAll(array('appointment_availbility' => $id));
		}
		
		if ($this->DoctorAvailability->delete()) {
			$this->Session->setFlash(__('The doctor availability has been deleted.'));
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
		$this->DoctorAvailability->id = $id;
		if (!$this->DoctorAvailability->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->DoctorAvailability->saveField('status','0')){
			$this->Session->setFlash(__('Doctor Availability Deactivated Successfully'));
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
		$this->DoctorAvailability->id = $id;
		if (!$this->DoctorAvailability->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->DoctorAvailability->saveField('status','1')){
			$this->Session->setFlash(__('Doctor Availability Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_addfulltimedoc method
 *
 * @return void
 */
	public function admin_addfulltimedoc() {
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1,'doc_type'=>1), 'order' => array('fname' => 'asc'),'fields'=>array('id','name')));
		$this->set('doctorList', $doctorList);

		if ($this->request->is('post')) {
			 //=============Check Availability=================
			$doc_id=$this->request->data['DoctorAvailability']['doctor_id'];
			$this->request->data['DoctorAvailability']['doc_type']=1;//For Full time Doctors
			$this->request->data['DoctorAvailability']['status']=1;
			
			$checkAvailabity = $this->DoctorAvailability->find('first', array('conditions' => array('doctor_id' => $doc_id,'doc_type'=>1 )));
			if(count($checkAvailabity)>0){
				$this->Session->setFlash(__('Availability For this Doctor has Already Saved!!'));
			}else{
				$this->DoctorAvailability->create();
				if ($this->DoctorAvailability->save($this->request->data)) {
						$this->Session->setFlash(__('The doctor availability has been saved.'));
					return $this->redirect(array('action' => 'fulltimedocavailable'));
			 		} else {
			 			$this->Session->setFlash(__('The doctor availability could not be saved. Please, try again.'));
			 		}
			 	}
		}
		$this->layout='add_admin';
	}

	/**
 * admin_index method
 *
 * @return void
 */
	public function admin_fulltimedocavailable() {
		$this->DoctorAvailability->recursive = 0;
		$this->Paginator->settings=array(
			'conditions' => array('doc_type'=>1),
			'order' => array('id' => 'desc')
		);
		$this->set('fulltimeDocAvails', $this->Paginator->paginate());
		$this->layout="manage_admin";
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_editfulltimedoc($id = null) {
		if (!$this->DoctorAvailability->exists($id)) {
			throw new NotFoundException(__('Invalid doctor availability'));
		}
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'doc_type'=>1), 'order' => array('fname' => 'asc') ,'fields'=>array('id','name')));
		$this->set('doctorList', $doctorList);

		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['DoctorAvailability']['doc_type']=1;//For Full time Doctors
			$this->request->data['DoctorAvailability']['status']=1;
			$this->DoctorAvailability->create();
			if ($this->DoctorAvailability->save($this->request->data)) {
					$this->Session->setFlash(__('The doctor availability has been saved.'));
				return $this->redirect(array('action' => 'fulltimedocavailable'));
	 		} else {
	 			$this->Session->setFlash(__('The doctor availability could not be saved. Please, try again.'));
	 		}
			 	
		} else {
			$options = array('conditions' => array('DoctorAvailability.' . $this->DoctorAvailability->primaryKey => $id));
			$this->request->data = $this->DoctorAvailability->find('first', $options);
		}
		$this->layout="add_admin";
	}

/**
* Search method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
	public function admin_search_fulltimedoc($searchtxt='') {

		if($searchtxt =='onlinedoctor')
		{
			$this->set('title_for_layout', 'Docotor Availabilities');
			$curdate= date('Y-m-d');
			$curtime= date("H:i:s");
			$curDay= date("D");
			$curday= strtolower($curDay);
			$this->Paginator->settings = array('conditions' => array('status'=>1,'doc_type'=>1,''.$curday.'_start_time <='=>$curtime,''.$curday.'_end_time >='=>$curtime));
			$this->set('fulltimeDocAvails', $this->Paginator->paginate());
			$this->set('searchtxt', $searchtxt);
		}
		else
		{
			$this->redirect(Router::url('/', true).'DoctorAvailabilities/fulltimedocavailable');
		}
		$this->layout="manage_admin";
	}

/**
* Search method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
	public function admin_search() {


		$start_date=date('Y-m-d',strtotime($this->request->query['start_date']));
		$end_date=date('Y-m-d',strtotime($this->request->query['end_date']));
		
		if($start_date !="" && $end_date !="")
		{
			$this->set('title_for_layout', 'Docotor Availabilities');
			
			$this->Paginator->settings = array('conditions' => array('doc_type'=>0,'app_date >='=>$start_date ,'app_date <='=>$end_date),'order' => array('id' => 'desc'));
			$this->set('doctorAvailabilities', $this->Paginator->paginate());
			$this->set('start_date', $start_date);
			$this->set('end_date', $end_date);
		}
		else
		{
			$this->redirect(Router::url('/', true).'DoctorAvailabilities/');
		}
		$this->layout="manage_admin";
	}

	public function settimetwentymin($time){
		return strtotime('+20 minutes', $time);
		//return date("H:i", strtotime('+20 minutes', $time));

	}
}
