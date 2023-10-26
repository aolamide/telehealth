<?php
App::uses('AppController', 'Controller');
/**
 * MasterMenus Controller
 *
 * @property MasterMenu $MasterMenu
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MasterMenusController extends AppController {

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
		$this->set('title_for_layout', 'Manage Menu');
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MasterMenu->recursive = 0;
		$this->set('masterMenus', $this->Paginator->paginate());
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
		if (!$this->MasterMenu->exists($id)) {
			throw new NotFoundException(__('Invalid master menu'));
		}
		$options = array('conditions' => array('MasterMenu.' . $this->MasterMenu->primaryKey => $id));
		$this->set('masterMenu', $this->MasterMenu->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->loadModel('AdminPage');
		$pageList=array('' => 'Select Page');
		$pageList +=$this->AdminPage->find('list', array('conditions' => array('is_active' => 1), 'order' => array('page_title' => 'asc')));
			$this->set('pageList', $pageList);
			$menuparentList=array(0 => 'None');
			$menuparentList += $this->MasterMenu->find('list', array('order' => array('menu_name' => 'asc')));
			/*'conditions' => array('menu_parent' => 0),*/
			$this->set('menuparentList', $menuparentList);

		if ($this->request->is('post')) {
			$this->MasterMenu->create();
			if ($this->MasterMenu->save($this->request->data)) {
				$this->Session->setFlash(__('New Menu saving successfully'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('New Menu saving failed'));
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
		if (!$this->MasterMenu->exists($id)) {
			//throw new NotFoundException(__('Invalid master menu'));
		 return $this->redirect(array('action' => 'index'));
		}
		$this->loadModel('AdminPage');
		$pageList=array('' => 'Select Page');
		$pageList +=$this->AdminPage->find('list', array('conditions' => array('is_active' => 1), 'order' => array('page_title' => 'asc')));
			$this->set('pageList', $pageList);

			$menuparentList=array(0 => 'None');
			$menuparentList += $this->MasterMenu->find('list', array('order' => array('menu_name' => 'asc')));
			$this->set('menuparentList', $menuparentList);
			
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MasterMenu->save($this->request->data)) {
				$this->Session->setFlash(__('New Menu updated Successfully'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('New Menu updating Successfully'));
			}
		} else {
			$options = array('conditions' => array('MasterMenu.' . $this->MasterMenu->primaryKey => $id));
			$this->request->data = $this->MasterMenu->find('first', $options);
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
		$this->MasterMenu->id = $id;
		if (!$this->MasterMenu->exists()) {
			throw new NotFoundException(__('Invalid master menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MasterMenu->delete()) {
			$this->Session->setFlash(__('Menu Deleted Successfully'));
		} else {
			$this->Session->setFlash(__('Menu Deleting Failed'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function getpagelink(){
		if ($this->request->is('post')) {
			$page=$this->request->data['page'];
			if($page=='yes'){
				$this->loadModel('AdminPage');
				$pageList=array('' => 'Select Page');
				$pageList +=$this->AdminPage->find('list', array('conditions' => array('is_active' => 1), 'order' => array('page_title' => 'asc')));
					if(count($pageList)>0){
					
						?>
						<div class="form-group customerLink required" style="display: block;"><label for="MasterMenuMenuLink">Menu Link</label><select name="data[MasterMenu][menu_link]" class="form-control" id="MasterMenuMenuLink" required="required">
							<option value="">Select Page</option>
							<?php
							foreach($pageList as $pageslug => $pageName){?>
							<option value="<?php echo $pageslug;?>"><?php echo $pageName;?></option>
							<?php }?>
							</select></div>
						<?php
				}
			}else{
				?>
				<div class="form-group customerLink required" style="display: block;"><label for="MasterMenuMenuLink">Menu Link</label>
				<input type="text" name="data[MasterMenu][menu_link]" class="form-control" id="MasterMenuMenuLink" required="required">
						</div>
				<?php
			}
		}
		exit();
	}
}
