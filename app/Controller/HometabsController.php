<?php
App::uses('AppController', 'Controller');
/**
 * Hometabs Controller
 *
 * @property Hometab $Hometab
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HometabsController extends AppController {

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
		$this->Hometab->recursive = 0;
		$this->Paginator->settings=array(
			'order' => array('id' => 'desc')
			);
		$this->set('hometabs', $this->Paginator->paginate());
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
		if (!$this->Hometab->exists($id)) {
			throw new NotFoundException(__('Invalid hometab'));
		}
		$options = array('conditions' => array('Hometab.' . $this->Hometab->primaryKey => $id));
		$this->set('hometab', $this->Hometab->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('title_for_layout', 'Add Hometab');
		if ($this->request->is('post')) {
			if($this->request->data['Hometab']['img']['name']!='')
			{
				$img=time().$this->request->data['Hometab']['img']['name'];
				move_uploaded_file($this->request->data['Hometab']['img']['tmp_name'],WWW_ROOT.'files/hometab/'.$img);
				$this->request->data['Hometab']['img']=$img;
			}else{
				$this->request->data['Hometab']['img']='';
			}
			$this->Hometab->create();
			if ($this->Hometab->save($this->request->data)) {
				$this->Session->setFlash(__('Home Tab saved successfully'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Home Tab saving failed'));
			}
		}
		$this->layout="add_admin";
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Update Hometab');
		if ($this->request->is(array('post', 'put'))) {
			$voptions = array('conditions' => array('Hometab.' . $this->Hometab->primaryKey => $id));
				$hometabres=$this->Hometab->find('first', $voptions);
			if($this->request->data['Hometab']['img']['name']!='')
			{
				$img=time().$this->request->data['Hometab']['img']['name'];
				move_uploaded_file($this->request->data['Hometab']['img']['tmp_name'],WWW_ROOT.'files/hometab/'.$img);
				$this->request->data['Hometab']['img']=$img;
				@unlink(WWW_ROOT.'files/hometab/'.$hometabres['Hometab']['img']);
			}else
			{
				$this->request->data['Hometab']['img']=$hometabres['Hometab']['img'];
			}
			$this->Hometab->create();
			if ($this->Hometab->save($this->request->data)) {
				$this->Session->setFlash(__('Home Tab updated successfully'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Home Tab saving failed'));
			}
		}else {
			$options = array('conditions' => array('Hometab.' . $this->Hometab->primaryKey => $id));
			$this->request->data = $this->Hometab->find('first', $options);
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
		$this->Hometab->id = $id;
		if (!$this->Hometab->exists()) {
			throw new NotFoundException(__('Invalid hometab'));
		}
		$voptions = array('conditions' => array('Hometab.' . $this->Hometab->primaryKey => $id));
		$hometabres=$this->Hometab->find('first', $voptions);
		@unlink(WWW_ROOT.'files/hometab/'.$hometabres['Hometab']['img']);
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hometab->delete()) {
			$this->Session->setFlash(__('Home Tab Deleted successfully'));
		} else {
			$this->Session->setFlash(__('Home Tab deleting failed'));
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
		$this->Hometab->id = $id;
		if (!$this->Hometab->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->Hometab->saveField('status','0')){
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
		$this->Hometab->id = $id;
		if (!$this->Hometab->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->Hometab->saveField('status','1')){
			$this->Session->setFlash(__('User Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
