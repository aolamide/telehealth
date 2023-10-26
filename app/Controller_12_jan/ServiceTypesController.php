<?php
App::uses('AppController', 'Controller');
/**
 * ServiceTypes Controller
 *
 * @property ServiceType $ServiceType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ServiceTypesController extends AppController {

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
		$this->ServiceType->recursive = 0;
		$this->Paginator->settings=array(
			'order' => array('id' => 'desc')
			);
		$this->set('serviceTypes', $this->Paginator->paginate());
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
		if (!$this->ServiceType->exists($id)) {
			throw new NotFoundException(__('Invalid service type'));
		}
		$options = array('conditions' => array('ServiceType.' . $this->ServiceType->primaryKey => $id));
		$this->set('serviceType', $this->ServiceType->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$serviceName = $this->request->data['ServiceType']['service_name'];
			$serviceChk = $this->ServiceType->find('first', array('conditions' => array('service_name' => mysql_real_escape_string($serviceName))));
			if(count($serviceChk)>0){
				$this->Session->setFlash(__('Service Type already exists. Please try again.'));
			}else{
				$this->ServiceType->create();
				if ($this->ServiceType->save($this->request->data)) {
					$this->Session->setFlash(__('Service Type saved successfully.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Service Type Saving failed. Please fill up all the required field to proceed'));
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
		if (!$this->ServiceType->exists($id)) {
			throw new NotFoundException(__('Invalid service type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$serviceName = $this->request->data['ServiceType']['service_name'];
			$serviceChk = $this->ServiceType->find('first', array('conditions' => array('service_name' => mysql_real_escape_string($serviceName), 'id !=' =>$id )));
			if(count($serviceChk)>0){
				$this->Session->setFlash(__('Service Type already exists. Please try again.'));
			}else{
					if ($this->ServiceType->save($this->request->data)) {
						$this->Session->setFlash(__('Service Type Updated successfully'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('Service Type Updating failed. Please fill up all field to proceed'));
					}
				}
		} else {
			$options = array('conditions' => array('ServiceType.' . $this->ServiceType->primaryKey => $id));
			$this->request->data = $this->ServiceType->find('first', $options);
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
		$this->ServiceType->id = $id;
		if (!$this->ServiceType->exists()) {
			throw new NotFoundException(__('Invalid service type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ServiceType->delete()) {
			$this->Session->setFlash(__('Service Type deleted successfully.'));
		} else {
			$this->Session->setFlash(__('Service Type deleting failed.'));
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
		$this->ServiceType->id = $id;
		if (!$this->ServiceType->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->ServiceType->saveField('status','0')){
			$this->Session->setFlash(__('Service Type Deactivated Successfully'));
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
		$this->ServiceType->id = $id;
		if (!$this->ServiceType->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->ServiceType->saveField('status','1')){
			$this->Session->setFlash(__('Service Type Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
