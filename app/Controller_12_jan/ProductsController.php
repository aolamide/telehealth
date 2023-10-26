<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property DezComponent $Dez
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Dez', 'Session');

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
		$this->set('title_for_layout', 'Manage Products');
		$this->Product->recursive = 0;
		$this->Paginator->settings = array('order' =>array('Product.id' => 'desc'), 'limit' => 10);
		$this->set('products', $this->Paginator->paginate());
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			$this->request->data['Product']['slug']=$this->Dez->slug('Product',$this->request->data['Product']['title']);

			if($this->request->data['Product']['img']['name']!=''){
				$productimg=time().$this->request->data['Product']['img']['name'];
				move_uploaded_file($this->request->data['Product']['img']['tmp_name'],WWW_ROOT.'files/product/'.$productimg);
				$this->request->data['Product']['img']=$productimg;
			}
			if($this->request->data['Product']['pdf']['name']!=''){
				$productpdf=time().$this->request->data['Product']['pdf']['name'];
				move_uploaded_file($this->request->data['Product']['pdf']['tmp_name'],WWW_ROOT.'files/product/'.$productpdf);
				$this->request->data['Product']['pdf']=$productpdf;
			}

			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$voptions = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$product=$this->Product->find('first', $voptions);
			$this->request->data['Product']['slug']=$this->Dez->slug('Product',$this->request->data['Product']['title'],$id,'id');

			if($this->request->data['Product']['img']['name']!=''){
				$productimg=time().$this->request->data['Product']['img']['name'];
				move_uploaded_file($this->request->data['Product']['img']['tmp_name'],WWW_ROOT.'files/product/'.$productimg);
				$this->request->data['Product']['img']=$productimg;
				@unlink(WWW_ROOT.'files/product/'.$product['Product']['img']);
			}
			else
			{
				$this->request->data['Product']['img']=$product['Product']['img'];
			}

			if($this->request->data['Product']['pdf']['name']!=''){
				$productpdf=time().$this->request->data['Product']['pdf']['name'];
				move_uploaded_file($this->request->data['Product']['pdf']['tmp_name'],WWW_ROOT.'files/product/'.$productpdf);
				$this->request->data['Product']['pdf']=$productpdf;
				@unlink(WWW_ROOT.'files/product/'.$product['Product']['pdf']);
			}
			else
			{
				$this->request->data['Product']['pdf']=$product['Product']['pdf'];
			}

			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
