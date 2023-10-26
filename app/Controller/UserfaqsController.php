<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class UserfaqsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Dez');
	
	

/**
 * admin_index method
 *
 * @return void
 */
	public function index() {
		$this->set('title_for_layout', 'Manage Faq');
		$this->Userfaq->recursive = 0;
		$this->Paginator->settings=array(
			'order' => array('id' => 'desc')
			);
		$this->set('userfaqs', $this->Paginator->paginate());
		$this->layout="userfaq";
	}


}
