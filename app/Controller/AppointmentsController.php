<?php
App::uses('AppController', 'Controller');
/**
 * Appointments Controller
 *
 * @property Appointment $Appointment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AppointmentsController extends AppController {

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
		$this->Appointment->recursive = 0;
		$this->Paginator->settings=array(
			'order' => array('id' => 'desc')
		);
		$this->set('appointments', $this->Paginator->paginate());
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
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid appointment'));
		}
		$options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
		$this->set('appointment', $this->Appointment->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
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
		//=========Patient List fetch=========
		$this->loadModel('MasterUser');
		$patientList = array('' => 'Select Patient');
		$patientList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'P', 'status' => 1), 'order' => array('fname' => 'asc')));
		$this->set('patientList', $patientList);
		//=========Doctor List fetch=========
		$this->loadModel('MasterUser');
		$doctorList = array('' => 'Select Doctor');
		$doctorList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1,'doc_type'=>0), 'order' => array('fname' => 'asc')));
		$this->set('doctorList', $doctorList);
		//=========Availability List fetch=========
		$this->loadModel('DoctorAvailability');
		$availabilityList = array('' => 'Select Time');
		$availabilityList += $this->DoctorAvailability->find('list', array('conditions' => array('status' => 1,'doc_type'=>0), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
		$this->set('availabilityList', $availabilityList);

		if ($this->request->is('post')) {

			//=============Check Appointment=================
			$serviceid=$this->request->data['Appointment']['serviceid'];
			if(!empty($serviceid)){
				$this->request->data['Appointment']['serviceid'] = implode(",",$serviceid);
			}
				$doc_id=$this->request->data['Appointment']['doctorid'];
				$appointment_date=$this->request->data['Appointment']['appointment_date'];
				$this->request->data['Appointment']['appointment_date'] = date("Y-m-d",strtotime($appointment_date));
				$appointment_availbility=$this->request->data['Appointment']['appointment_availbility'];
				$appoint_book_slut=$this->request->data['Appointment']['appoint_book_slut'];
				/*'start_time BETWEEN ? and ?'=>array($start_time, $end_time),*/
				$checkAppointment = $this->Appointment->find('all', array('conditions' => array('doctorid' => $doc_id,'status IN' => array(1,0),'appointment_availbility' => $appointment_availbility,'appoint_book_slut'=>$appoint_book_slut, 'date(appointment_date)'=>date("Y-m-d",strtotime($appointment_date)) ) ));
				if(count($checkAppointment)>0){
					$this->Session->setFlash(__('Appointment Already Booked. Please try another'));
					$this->request->data['Appointment']['serviceid']=$serviceid;
				}else{
					$this->Appointment->create();
					if ($this->Appointment->save($this->request->data)) {

						$this->Session->setFlash(__('Appointment Booked successfully'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->request->data['Appointment']['serviceid']=$serviceid;
						$this->Session->setFlash(__('Appointment Booking Failed'));
					}
				}
			//===============================================

			
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
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid appointment'));
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
		//=========Patient List fetch=========
		$this->loadModel('MasterUser');
		$patientList = array('' => 'Select Patient');
		$patientList += $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'P', 'status' => 1), 'order' => array('fname' => 'asc')));
		$this->set('patientList', $patientList);

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
				/*'start_time BETWEEN ? and ?'=>array($start_time, $end_time),*/
				$appoint_book_slut=$this->request->data['Appointment']['appoint_book_slut'];
				$checkAppointment = $this->Appointment->find('all', array('conditions' => array('id !=' => $this->request->data['Appointment']['id'],'doctorid' => $doc_id,'status IN' => array(1,0),'appointment_availbility' => $appointment_availbility ,'appoint_book_slut'=>$appoint_book_slut, 'date(appointment_date)'=>date("Y-m-d",strtotime($appointment_date)) ) ));
				if(count($checkAppointment)>0){
					$this->Session->setFlash(__('Appointment Already Booked. Please try another'));
					$this->request->data['Appointment']['serviceid']=$serviceid;
				}else{
					if ($this->Appointment->save($this->request->data)) {

						$this->Session->setFlash(__('Appointment Modified successfully'));
						return $this->redirect(array('action' => 'index'));
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
			$avaialbleID=array();
			$availableSlotId=array();
			$options = array('conditions' => array('doctorid'=>$this->request->data['Appointment']['doctorid'],'appointment_date'=>$this->request->data['Appointment']['appointment_date'],'id !='=>$id));
			$chkAppointAvailble=$this->Appointment->find('all', $options);
			if(count($chkAppointAvailble)>0){
				//pr($chkAppointAvailble);exit();
				foreach ($chkAppointAvailble as $chkAppointAvailble) {
					array_push($avaialbleID, $chkAppointAvailble['Appointment']['appointment_availbility']);
					array_push($availableSlotId, $chkAppointAvailble['Appointment']['appoint_book_slut']);
				}
				//pr($avaialbleID);exit;
			}
			//pr($availableSlotId);exit;
			$this->loadModel('DoctorAvailability');
			$availabilityList = array('' => 'Select Time');
			//$availabilityList+= $this->DoctorAvailability->find('list', array('conditions' => array('NOT'=>array('id'=>$avaialbleID),'DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $this->request->data['Appointment']['appointment_date'], 'DoctorAvailability.doctor_id' => $this->request->data['Appointment']['doctorid']), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
			$availabilityList+= $this->DoctorAvailability->find('list', array('conditions' => array('DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $this->request->data['Appointment']['appointment_date'], 'DoctorAvailability.doctor_id' => $this->request->data['Appointment']['doctorid']), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
			/*$doctorAvailble=$this->DoctorAvailability->find('list', array('conditions' => array('DoctorAvailability.status' => 1,'date(DoctorAvailability.app_date)' => $this->request->data['Appointment']['appointment_date'], 'DoctorAvailability.doctor_id' => $this->request->data['Appointment']['doctorid']), 'order' => array('created' => 'asc'), 'fields' => array('id', 'name')));
			foreach ($doctorAvailble as $key => $value) {
				if(!in_array($key, $avaialbleID)){
					$availabilityList +='<option value="'.$key.'">'.$avaialbleID.'</option>';
				 }
			}*/
			$this->set('availabilityList', $availabilityList);


			$this->loadModel('DoctoravailableSlot');
			$availabilitySlot = array('' => 'Select Time');
			$availabilitySlot+= $this->DoctoravailableSlot->find('list', array('conditions' => array('NOT'=>array('id'=>$availableSlotId),'DoctoravailableSlot.avalability_id'=>$this->request->data['Appointment']['appointment_availbility'],'DoctoravailableSlot.doc_id' => $this->request->data['Appointment']['doctorid']), 'fields' => array('id', 'fulltime')));
			//pr($availabilitySlot);
			$this->set('availabilitySlot', $availabilitySlot);
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
		$this->Appointment->id = $id;
		if (!$this->Appointment->exists()) {
			throw new NotFoundException(__('Invalid appointment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Appointment->delete()) {
			$this->Session->setFlash(__('The appointment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The appointment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_doctorservice(){
		
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
			$doctorsList = $this->MasterUser->find('list', array('conditions' => array('login_tytpe' => 'D', 'status' => 1 ,'id'=>$doctorids,'doc_type'=>0), 'order' => array('fname' => 'asc')));
			
				echo '<select name="data[Appointment][doctorid]" id="doctor" class="form-control" required="required">
				<option value="">Select Doctor</option>';
					 foreach ($doctorsList as $key => $value) {
					echo '<option value="'.$key.'">'.$value.'</option>';
					}
				echo'</select>';
			
		}

		exit;
	}
	public function admin_availbility($id=''){
		if($this->request->is('post')){
			$appointWhr = array('status IN' => array(1,0));
			$whr=array(array('status' => 1));

			if(isset($this->request->data['doctor'])){
				$doctor = $this->request->data['doctor'];
				array_push($whr, array('doctor_id' => $doctor));
				$appointWhr+=array('doctorid' => $doctor);
			}if(isset($this->request->data['dateval'])){
				$dateval = date("Y-m-d", strtotime($this->request->data['dateval']));
				array_push($whr, array('date(app_date)' => $dateval));
				$appointWhr+=array('date(appointment_date)' => $dateval);
			}
			$this->loadModel('DoctorAvailability');

			$getList=$this->DoctorAvailability->find('all', array('conditions' => array('AND' =>$whr)));
			if(count($getList)>0){
				?>
				<option value="">Select Time</option>
				<?php
				if($id!=''){
					$appointWhr+=array('id !=' => $id);
				}
				foreach($getList as $getListRes){
					$availabilityID = $getListRes['DoctorAvailability']['id'];
					//echo $availabilityID;
					
					/*if (array_key_exists('appointment_availbility', $appointWhr)) {
						//echo "enter";
						$appointWhr['appointment_availbility'] = $availabilityID;
					}else{
							
						$appointWhr+=array('appointment_availbility' => $availabilityID );
					}
					
					$chkAppointment = $this->Appointment->find('first', array('conditions' => array('AND' => $appointWhr)));
					if(count($chkAppointment)<=0){*/
					?>
					<option value="<?php echo $getListRes['DoctorAvailability']['id'];?>"><?php echo stripslashes($getListRes['DoctorAvailability']['start_time']." To ".$getListRes['DoctorAvailability']['end_time']);?></option> 
					<?php 
					//}
				}
				
			}
		}
		exit();
	}

	public function admin_availbility_slot($id=''){
		if($this->request->is('post')){
			$appointWhr = array('status IN' => array(1,0));
			//$whr=array(array('status' => 1));
			$whr=array();

			if(isset($this->request->data['availability_slot_id'])){
				$doctor = $this->request->data['doctor'];
				$availability_slot_id = $this->request->data['availability_slot_id'];
				array_push($whr, array('doc_id' => $doctor,'avalability_id'=>$availability_slot_id));
				$appointWhr+=array('doctorid' => $doctor);
			}
			
			$this->loadModel('DoctoravailableSlot');

			$getList=$this->DoctoravailableSlot->find('all', array('conditions' => array('AND' =>$whr)));
			if(count($getList)>0){
				?>
				<option value="">Select Time</option>
				<?php
				if($id!=''){
					$appointWhr+=array('id !=' => $id);
				}
				foreach($getList as $getListRes){
					$availabilitySlotID = $getListRes['DoctoravailableSlot']['id'];
					//echo $availabilityID;
					
					if (array_key_exists('appoint_book_slut', $appointWhr)) {
						//echo "enter";
						$appointWhr['appoint_book_slut'] = $availabilitySlotID;
					}else{
							
						$appointWhr+=array('appoint_book_slut' => $availabilitySlotID );
					}
					//array_push($appointWhr, array('status' => 0 ));
					//pr($appointWhr);
					$chkAppointment = $this->Appointment->find('first', array('conditions' => array('AND' => $appointWhr)));
					if(count($chkAppointment)<=0){
					?>
					<option value="<?php echo $getListRes['DoctoravailableSlot']['id'];?>"><?php echo stripslashes($getListRes['DoctoravailableSlot']['start_time']." To ".$getListRes['DoctoravailableSlot']['end_time']);?></option> 
					<?php 
					}
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
		$this->Appointment->id = $id;
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->Appointment->saveField('status','0')){
			$this->Session->setFlash(__('Appointment Deactivated Successfully'));
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
		$this->Appointment->id = $id;
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->Appointment->saveField('status','1')){
			$this->Session->setFlash(__('Appointment Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
