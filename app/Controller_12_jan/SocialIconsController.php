<?php
App::uses('AppController', 'Controller');
/**
 * SocialIcons Controller
 *
 * @property SocialIcon $SocialIcon
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SocialIconsController extends AppController {

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
		$this->SocialIcon->recursive = 0;
		$this->set('socialIcons', $this->Paginator->paginate());
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
		if (!$this->SocialIcon->exists($id)) {
			throw new NotFoundException(__('Invalid social icon'));
		}
		$options = array('conditions' => array('SocialIcon.' . $this->SocialIcon->primaryKey => $id));
		$this->set('socialIcon', $this->SocialIcon->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SocialIcon->create();
			//pr($this->request->data);exit;
			$img_dtls=$this->request->data['SocialIcon']['social_img'];
			$icon_dtls=$this->request->data['SocialIcon']['social_icon'];
			if($img_dtls['name']!=''){
				$img_name=time().'_'.$img_dtls['name'];
				if(move_uploaded_file($img_dtls['tmp_name'],'files/socialicon/'.$img_name)){
						$this->request->data['SocialIcon']['social_img']=$img_name;
						if ($this->SocialIcon->save($this->request->data)) {
						$this->Session->setFlash(__('The social icon has been saved.'));
							return $this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The social icon could not be saved. Please, try again.'));
						}
					}else{
						$this->Session->setFlash(__('The social icon could not be saved. Please, try again.'));
						}
			}else{
				//$this->Session->setFlash(__('Choose a social Image.'));
				if($icon_dtls!=''){
					$this->request->data['SocialIcon']['social_img']='';
					if ($this->SocialIcon->save($this->request->data)) {
						$this->Session->setFlash(__('The social icon has been saved.'));
							return $this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The social icon could not be saved. Please, try again.'));
						}
					}
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
		if (!$this->SocialIcon->exists($id)) {
			throw new NotFoundException(__('Invalid social icon'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$icon_dtls=$this->request->data['SocialIcon']['social_icon'];
			//pr($this->request->data);exit;
			$hid_img=$this->request->data['hid_img'];
			if($hid_img!='' && isset($hid_img)){
				$this->request->data['SocialIcon']['social_img']=$hid_img;
					if ($this->SocialIcon->save($this->request->data)) {
					$this->Session->setFlash(__('The social icon has been saved.'));
					return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The social icon could not be saved. Please, try again.'));
					}
			}else{
					
				$img_dtls=$this->request->data['SocialIcon']['social_img'];
				if($img_dtls['name']!=''){
					$img_name=time().'_'.$img_dtls['name'];
					if(move_uploaded_file($img_dtls['tmp_name'],'files/socialicon/'.$img_name)){
						@unlink(WWW_ROOT.'files/socialicon/'.$this->request->data['prev_hid_img']);
						$this->request->data['SocialIcon']['social_img']=$img_name;
						if ($this->SocialIcon->save($this->request->data)) {
							$this->Session->setFlash(__('The social icon has been saved.'));
							return $this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The social icon could not be saved. Please, try again.'));
						}
					}
				}else{
				//$this->Session->setFlash(__('Choose a social Image.'));
					if($icon_dtls!=''){
						$this->request->data['SocialIcon']['social_img']='';
						if ($this->SocialIcon->save($this->request->data)) {
							$this->Session->setFlash(__('The social icon has been saved.'));
								return $this->redirect(array('action' => 'index'));
						} else {
								$this->Session->setFlash(__('The social icon could not be saved. Please, try again.'));
						}
					}
				}
			}
			
			
		} else {
			$options = array('conditions' => array('SocialIcon.' . $this->SocialIcon->primaryKey => $id));
			$this->request->data = $this->SocialIcon->find('first', $options);
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
		$this->SocialIcon->id = $id;
		if (!$this->SocialIcon->exists()) {
			throw new NotFoundException(__('Invalid social icon'));
		}
		$img_name_arr=$this->SocialIcon->find('first',array('conditions'=>array('SocialIcon.social_id'=>$id)));
		$img_name=$img_name_arr['SocialIcon']['social_img'];
		//$this->request->onlyAllow('post', 'delete');
		if ($this->SocialIcon->delete()) {
			@unlink(WWW_ROOT.'files/socialicon/'.$img_name);
			$this->Session->setFlash(__('The social icon has been deleted.'));
		} else {
			$this->Session->setFlash(__('The social icon could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
		$this->layout="manage_admin";
	}
}
