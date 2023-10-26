<?php
App::uses('AppController', 'Controller');
/**
 * TestMasters Controller
 *
 * @property TestMaster $TestMaster
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TestMastersController extends AppController {

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
		$this->TestMaster->recursive = 0;
		$this->Paginator->settings=array(
			'order' => array('id' => 'desc')
			);
		$this->set('testMasters', $this->Paginator->paginate());
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
		if (!$this->TestMaster->exists($id)) {
			throw new NotFoundException(__('Invalid test master'));
		}
		$options = array('conditions' => array('TestMaster.' . $this->TestMaster->primaryKey => $id));
		$this->set('testMaster', $this->TestMaster->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {

		$testparentList=array(0 => 'None');
		$testparentList += $this->TestMaster->find('list', array('conditions' => array('parent_id'=>0,'status' => 1), array('order' => array('test_name' => 'asc'))));

		$this->set('testparentList', $testparentList);
		$tests_ids = array();
		if ($this->request->is('post')) {
			$this->TestMaster->create();
			$test_name=$this->request->data['TestMaster']['test_name'];
			$parent_id=$this->request->data['TestMaster']['parent_id'];

			/*=========Check Parent Test ================*/
			if($parent_id==0){
				$chkTest=$this->TestMaster->find('first', array('conditions' => array('parent_id'=>0,'test_name' => $test_name)));
				if(count($chkTest)>0){
					$this->Session->setFlash(__('Test name Already Exist.'));
				}
			}else{
			/*=========Check Test Exist Under that parent Category ================*/
				$chkAlltests=$this->TestMaster->find('all', array('conditions' => array('parent_id'=>$parent_id,'test_name' => $test_name)));
				//pr($chkAlltests);exit;
				if(count($chkAlltests)>0){
					$this->Session->setFlash(__('Test Under This Parrent Already Exist.'));
				}else{
					if ($this->TestMaster->save($this->request->data)) {
						$this->Session->setFlash(__('The Tests has been saved.'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The Tests could not be saved. Please, try again.'));
					}

				}
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
		if (!$this->TestMaster->exists($id)) {
			//throw new NotFoundException(__('Invalid test master'));
		return $this->redirect(array('action' => 'index'));
		}

		$testparentList=array(0 => 'None');
		$testparentList += $this->TestMaster->find('list', array('conditions' => array('parent_id'=>0,'status' => 1,'id !='=>$id), array('order' => array('test_name' => 'asc'))));
		$this->set('testparentList', $testparentList);

		if ($this->request->is(array('post', 'put'))) {
			$test_name=$this->request->data['TestMaster']['test_name'];
			$chkTest=$this->TestMaster->find('first', array('conditions' => array('parent_id'=>0,'test_name' => $test_name , 'id !='=>$id)));
			if(count($chkTest)>0){
				$this->Session->setFlash(__('Test name Already Exist.'));
			}else{
				if ($this->TestMaster->save($this->request->data)) {
					$this->Session->setFlash(__('The test master has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The test master could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('TestMaster.' . $this->TestMaster->primaryKey => $id));
			$this->request->data = $this->TestMaster->find('first', $options);
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
		$this->TestMaster->id = $id;
		if (!$this->TestMaster->exists()) {
			throw new NotFoundException(__('Invalid test master'));
		}
		$this->request->onlyAllow('post', 'delete');

		$this->loadModel('DiagnosysTest');
		$diagTestChk=$this->DiagnosysTest->find('first', array('conditions' => array('test_type' => $id)));
		if(count($diagTestChk)>0){
			$this->Session->setFlash(__('to Delete this Test First delete its related data or <a href="http://'.$_SERVER['HTTP_HOST'].Router::url('/admin/TestMasters/deleterelate/').$id.'" style="color:#ff0000">click here</a> to delete its related data and that Test'));
		}else if ($this->TestMaster->delete()) {
			//============Check For the child Tests==========//
			$childTests= $this->TestMaster->find('all', array('conditions' => array('parent_id' => $id)));
			if(count($childTests)>0){
				$this->TestMaster->deleteAll(array('parent_id' => $id));
			}

			//================================================//
			$this->Session->setFlash(__('The test master has been deleted.'));
		} else {
			$this->Session->setFlash(__('The test master could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
 * deleterelate method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_deleterelate($id = null) {
		//echo $id;exit;
		$this->TestMaster->id = $id;
		if (!$this->TestMaster->exists()) {
			throw new NotFoundException(__('Invalid test master'));
		}

		$this->loadModel('DiagnosysTest');
		$diagTestChk=$this->DiagnosysTest->find('first', array('conditions' => array('test_type' => $id)));


		if(count($diagTestChk)>0){
			$diagTestChk=$this->DiagnosysTest->deleteAll(array('test_type' => $id));

			$childunderTests= $this->TestMaster->find('all', array('conditions' => array('parent_id' => $id)));
			if(count($childunderTests)>0){
				foreach($childunderTests as $childunderTest){
					$this->DiagnosysTest->deleteAll(array('test_type' => $childunderTest['TestMaster']['id']));
				}
			}
		}

		if ($this->TestMaster->delete()) {
			//============Check For the child Tests==========//
			$childTests= $this->TestMaster->find('all', array('conditions' => array('parent_id' => $id)));
			if(count($childTests)>0){
				$this->TestMaster->deleteAll(array('parent_id' => $id));
			}

			//================================================//
			$this->Session->setFlash(__('The test master has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient could not be deleted. Please, try again.'));
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
		$this->TestMaster->id = $id;
		if (!$this->TestMaster->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->TestMaster->saveField('status','0')){
			$this->Session->setFlash(__('Test Deactivated Successfully'));
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
		$this->TestMaster->id = $id;
		if (!$this->TestMaster->exists($id)) {
			throw new NotFoundException(__('Invalid admin user'));
		}
		if($this->TestMaster->saveField('status','1')){
			$this->Session->setFlash(__('Test Activated Successfully'));
		}else{
			$this->Session->setFlash(__('Error in Deactivating'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
