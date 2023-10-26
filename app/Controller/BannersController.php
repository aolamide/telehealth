<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class BannersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler', 'Session');
	
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
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('title_for_layout', 'Manage Banners');
		$this->Banner->recursive = 0;
		$this->Paginator->settings = array('order' =>array('Banner.banner_id' => 'desc'), 'limit' => 10);
		$this->set('banners', $this->Paginator->paginate());
		$this->layout="manage_admin";
	}
/**
* Search method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
	public function admin_search($searchtxt='') {

		if($searchtxt!='')
		{
			$this->set('title_for_layout', 'Manage Banners');
			 $this->Paginator->settings = array('conditions' => array( 'OR' => array(
            array('Banner.banner_title LIKE ' => '%'.$searchtxt.'%'),
            array('Banner.banner_caption LIKE ' => '%'.$searchtxt.'%'),
        )), 'order' =>array('Banner.banner_id' => 'desc'), 'limit' => 10);
			$this->set('banners', $this->Paginator->paginate('Banner'));
			$this->set('searchtxt', $searchtxt);
		}
		else
		{
			
			$this->redirect(Router::url('/', true).'Banners');
		}
		$this->layout="manage_admin";
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
		$this->set('banner', $this->Banner->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if($this->request->data['Banner']['banner_img']['name']!='')
			{
				$bannerimg=time().$this->request->data['Banner']['banner_img']['name'];
				move_uploaded_file($this->request->data['Banner']['banner_img']['tmp_name'],WWW_ROOT.'files/banner/'.$bannerimg);
				$this->request->data['Banner']['banner_img']=$bannerimg;
			}
			$this->Banner->create();
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		}
		$this->layout="add_admin";
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$voptions = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
				$banres=$this->Banner->find('first', $voptions);
				//print_r($this->request->data);exit;
			if($this->request->data['Banner']['banner_img']['name']!='')
			{
				$bannerimg=time().$this->request->data['Banner']['banner_img']['name'];
				move_uploaded_file($this->request->data['Banner']['banner_img']['tmp_name'],WWW_ROOT.'files/banner/'.$bannerimg);
				$this->request->data['Banner']['banner_img']=$bannerimg;
				
				@unlink(WWW_ROOT.'files/banner/'.$banres['Banner']['banner_img']);
			}
			else
			{
				$this->request->data['Banner']['banner_img']=$banres['Banner']['banner_img'];
			}
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
		}
		$this->layout="add_admin";
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$voptions = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
		$banres=$this->Banner->find('first', $voptions);
		$this->request->onlyAllow('post', 'delete');
		if ($this->Banner->delete()) {
			@unlink(WWW_ROOT.'files/banner/'.$banres['Banner']['banner_img']);
			$this->Session->setFlash(__('The banner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The banner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
