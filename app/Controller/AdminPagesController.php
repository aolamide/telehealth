<?php
App::uses('AppController', 'Controller');
/**
 * AdminPages Controller
 *
 * @property AdminPage $AdminPage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdminPagesController extends AppController {

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
		$this->AdminPage->recursive = 0;
		$this->Paginator->settings=array(
			'order' => array('pid' => 'desc')
			);
		$this->set('adminPages', $this->Paginator->paginate());
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
		if (!$this->AdminPage->exists($id)) {
			throw new NotFoundException(__('Invalid admin page'));
		}
		$options = array('conditions' => array('AdminPage.' . $this->AdminPage->primaryKey => $id));
		$this->set('adminPage', $this->AdminPage->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AdminPage->create();
			$this->request->data['AdminPage']['page_slug']=$this->gen_slug($this->request->data['AdminPage']['page_name']);
			
			if ($this->AdminPage->save($this->request->data)) {
				$this->Session->setFlash(__('The admin page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin page could not be saved. Please, try again.'));
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
		if (!$this->AdminPage->exists($id)) {
			//throw new NotFoundException(__('Invalid admin page'));
		return $this->redirect(array('action' => 'index'));
		}
		if ($this->request->is(array('post', 'put'))) {
		$this->request->data['AdminPage']['page_slug']=$this->gen_slug($this->request->data['AdminPage']['page_name']);
		//unset($this->request->data['AdminPage']['page_slug']);
			if ($this->AdminPage->save($this->request->data)) {
				$this->Session->setFlash(__('The admin page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdminPage.' . $this->AdminPage->primaryKey => $id));
			$this->request->data = $this->AdminPage->find('first', $options);
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
		$this->AdminPage->id = $id;
		if (!$this->AdminPage->exists()) {
			throw new NotFoundException(__('Invalid admin page'));
		}
//		$this->request->allowMethod('post', 'delete');

		$this->loadModel('MasterMenu');
		$menuPageChk=$this->MasterMenu->find('first', array('conditions' => array('menu_link' => $id)));
		if(count($menuPageChk)>0){
			$this->Session->setFlash(__('Page Can not be deleted !! Deallocate the page from menu and then delete !!'));
		}else if ($this->AdminPage->delete()) {
			$this->Session->setFlash(__('The admin page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The admin page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
		$this->layout="manage_admin";
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
		$this->AdminPage->id = $id;
		if (!$this->AdminPage->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->AdminPage->saveField('is_active','0')){
			$this->Session->setFlash(__('Deactivated Successfully'));
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
		$this->AdminPage->id = $id;
		if (!$this->AdminPage->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->AdminPage->saveField('is_active','1')){
			$this->Session->setFlash(__('Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	
	public function gen_slug($str){
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

	return $clean;
	}
}
