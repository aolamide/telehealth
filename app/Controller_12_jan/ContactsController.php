<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Homes Controller
 */
class ContactsController extends AppController {

	public $components = array('Paginator', 'Session', 'Cookie', 'RequestHandler');
	
	public function index()
	{
		$this->loadModel('Contacts');
		$this->layout='contact';
		if ($this->request->is('post')) {
			$this->Contacts->create();
			if ($this->Contacts->save($this->request->data)) {
				$this->Session->setFlash(__('Your Request saved successfully !!!'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Contact Request saving failed'));
			}
		}
	}
	
}
