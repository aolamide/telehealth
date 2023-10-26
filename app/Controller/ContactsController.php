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
			$this->Session->destroy();
//			if($this->Session->check('6_letters_code') && $this->Session->read('6_letters_code')==$this->request->data['Contacts']['security_code']){
			if(true){
			$this->Contacts->create();
			if ($this->Contacts->save($this->request->data)) {
				$this->Session->setFlash(__('Your Request saved successfully !!!'));
				unset($this->request->data);
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Contact Request saving failed'));
			}
		   }else{
				$this->Session->setFlash(__('Incorrect Security Code.'));
			}
		}
	}

}
