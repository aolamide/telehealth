<?php
App::uses('AppController', 'Controller');
/**
 * AdminLogins Controller
 *
 * @property AdminLogin $AdminLogin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdminLoginsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('title_for_layout', 'Admin Login');

		if($this->request->is('post'))
		{
			if(isset($this->request->data['login']))
			{
				$userid=$this->request->data['userid'];
				$password=$this->request->data['password'];
				//$checklogin=$this->AdminLogin->find('first', array('conditions' => array('user_id' => $userid, 'pass' => $password, 'is_active' =>1)));
				$checklogin=$this->AdminLogin->find('first', array('conditions' => array('user_id' => $userid, 'pass' => $password)));
				if(count($checklogin)>0)
				{
					$checkActiveUser=$this->AdminLogin->find('first', array('conditions' => array('user_id' => $userid, 'pass' => $password, 'is_active' =>1)));
					if(count($checkActiveUser)>0){
						$this->Session->write('adminUser',$checkActiveUser['AdminLogin']['uid']);
						$this->redirect(Router::url('/admin/AdminLogins/dashboard', true));
					}else{
						$this->Session->setFlash(__('Your Account has not Activated !! Please Contact with Admin'));
					}
					/*$this->Session->write('adminUser',$checklogin['AdminLogin']['uid']);
					$this->redirect(Router::url('/admin/AdminLogins/dashboard', true));*/
				}
				else
				{
					$this->Session->setFlash(__('Incorrect User ID / Password'));
				}
			}
		}
		$this->layout="admin_login";
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('title_for_layout', 'Admin Login');
		if($this->request->is('post'))
		{
			if(isset($this->request->data['login']))
			{
				$userid=$this->request->data['userid'];
				$password=$this->request->data['password'];
				$checklogin=$this->AdminLogin->find('first', array('conditions' => array('user_id' => $userid, 'pass' => $password, 'is_active' =>1)));
				if(count($checklogin)>0)
				{
					$this->Session->write('adminUser',$checklogin['AdminLogin']['uid']);
					$this->redirect(Router::url('/admin/AdminLopgins/dashboard', true));
				}
				else
				{
					$this->Session->setFlash(__('Incorrect User ID / Password'));
				}
			}
		}
		$this->layout="admin_login";
	}
/**
 * admin_dashboard method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_dashboard()
	{
		if(!$this->Session->check('adminUser'))
		{
			$this->redirect(Router::url('/admin/', true));
		}
		$uid=$this->Session->read('adminUser');
		$userres=$this->AdminLogin->find('first', array('conditions' => array('uid' => $uid)));
		$this->set('adminRes', $userres);
		$this->set('title_for_layout', 'Admin Dashboard');
		$this->layout="admin_dashboard";
	}
	public function signOut()
	{
		$this->Session->delete('adminUser');
		if(!$this->Session->check('adminUser'))
		{
		echo 1;
		}
		else
		{
			echo 2;
		}
		exit;
	}
	public function noticeStatus()
	{
		if($this->request->is('post'))
		{
			if(isset($this->request->data['noticetype']))
			{
				$this->loadModel('Notice');
				//$result=$this->Notice->query("select * from notice where status='1' and user_id!='' and notice_type='".$this->request->data['noticetype']."'");
				//echo "select * from notice where status='1' and user_id!='' and notice_type='".$this->request->data['noticetype']."'";
				$result=$this->Notice->find('first', array('conditions' => array('status' => 0, 'user_id !=' => 0, 'notice_type' => $this->request->data['noticetype'])));
				$update=$this->Notice->query("update notice set status='1' where notice_type='".$this->request->data['noticetype']."'");
				if(isset($result['Notice']['user_id']) && ($this->request->data['noticetype']=='buyer-rate' || $this->request->data['noticetype']=='seller-rate'))
				{
					echo "/".$result['Notice']['user_id'];
				}
			}
			else
			{
				echo 2;
			}
		}
		else
		{
			echo 2;
		}
		exit;
	}
		public function admin_sitesetting()
	 {
		 $this->loadModel('Sitesetting');
		  $settingres=$this->Sitesetting->find('first', array('conditions' => array('id' => 1)));
			 $this->set('settingres', $settingres);
		 if(!$this->Session->check('adminUser'))
		{
			$this->redirect(Router::url('/admin/', true));
		}
		$uid=$this->Session->read('adminUser');
		$userres=$this->AdminLogin->find('first', array('conditions' => array('uid' => $uid)));
		$this->set('adminRes', $userres);
		$this->set('title_for_layout', 'Site Setting');
		 if($this->request->is(array('post', 'put')))
		  {
			  //pr($this->request->data);exit;
		  	if($this->request->data['Sitesetting']['logo_image']['name']!='')
			  {
				  
				  $logo_img= time().$this->request->data['Sitesetting']['logo_image']['name'];
				  move_uploaded_file($this->request->data['Sitesetting']['logo_image']['tmp_name'],WWW_ROOT.'files/site_logo/'.$logo_img);
				  $this->request->data['Sitesetting']['logo_image']=$logo_img;
				  @unlink(WWW_ROOT.'files/site_logo/'.$settingres['Sitesetting']['logo_image']);
				  
			  }
			  else
			  {
			  	 
				  $this->request->data['Sitesetting']['logo_image']=@$settingres['Sitesetting']['logo_image'];
			  }
			  if($this->request->data['Sitesetting']['sml_logo_image']['name']!='')
			  {
				  
				  $logo_img= time().$this->request->data['Sitesetting']['sml_logo_image']['name'];
				  move_uploaded_file($this->request->data['Sitesetting']['sml_logo_image']['tmp_name'],WWW_ROOT.'files/site_logo/'.$logo_img);
				  $this->request->data['Sitesetting']['sml_logo_image']=$logo_img;
				  @unlink(WWW_ROOT.'files/site_logo/'.$settingres['Sitesetting']['sml_logo_image']);
				  
			  }
			  else
			  {

				  $this->request->data['Sitesetting']['sml_logo_image']=@$settingres['Sitesetting']['sml_logo_image'];
			  }
			  $this->request->data['Sitesetting']['id']=1;
			  if($this->Sitesetting->save($this->request->data))
				  {
					  
					  $this->Session->setFlash(__('Site Setting Updated Sucessfully'));
					   $settingres=$this->Sitesetting->find('first', array('conditions' => array('id' => 1)));
						 $this->set('settingres', $settingres);
					 // return $this->redirect(array('action' => 'index'));
				  }
			 
		  }
		  
			 
		  $this->layout="add_admin";
	 }


}
