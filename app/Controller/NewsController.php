<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class NewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Dez');
	
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
		$this->set('title_for_layout', 'Manage News');
		$this->News->recursive = 0;
		$this->Paginator->settings=array(
			'order' => array('news_id' => 'desc')
			);
		$this->set('news', $this->Paginator->paginate());
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
		$this->set('title_for_layout', 'News Detail');
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
		$this->layout="manage_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('title_for_layout', 'Add News');
		if ($this->request->is('post')) {
			if($this->request->data['News']['news_img']['name']!='')
			{
				$newsimg=time().$this->request->data['News']['news_img']['name'];
				move_uploaded_file($this->request->data['News']['news_img']['tmp_name'],WWW_ROOT.'files/news/'.$newsimg);
				$this->request->data['News']['news_img']=$newsimg;
			}
			$this->request->data['News']['slug']=$this->Dez->slug('News',$this->request->data['News']['news_title']);
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		}
		$this->layout="manage_admin";
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Edit News');
		if (!$this->News->exists($id)) {
			//throw new NotFoundException(__('Invalid news'));
			return $this->redirect(array('action' => 'index'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$voptions = array('conditions' => array('News.' . $this->News->primaryKey => $id));
				$newsres=$this->News->find('first', $voptions);
			if($this->request->data['News']['news_img']['name']!='')
			{
				$newsimg=time().$this->request->data['News']['news_img']['name'];
				move_uploaded_file($this->request->data['News']['news_img']['tmp_name'],WWW_ROOT.'files/news/'.$newsimg);
				$this->request->data['News']['news_img']=$newsimg;
				
				@unlink(WWW_ROOT.'files/news/'.$newsres['News']['news_img']);
			}
			else
			{
				$this->request->data['News']['news_img']=$newsres['News']['news_img'];
			}
			$this->request->data['News']['slug']=$this->Dez->slug('News',$this->request->data['News']['news_title'], $id, 'news_id');
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
		$this->layout="manage_admin";
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$voptions = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$newsres=$this->News->find('first', $voptions);
		$this->request->onlyAllow('post', 'delete');
		if ($this->News->delete()) {
			@unlink(WWW_ROOT.'files/news/'.$newsres['News']['news_img']);
			$this->Session->setFlash(__('The news has been deleted.'));
		} else {
			$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
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
		$this->News->id = $id;
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->News->saveField('status','0')){
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
		$this->News->id = $id;
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->News->saveField('status','1')){
			$this->Session->setFlash(__('Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
