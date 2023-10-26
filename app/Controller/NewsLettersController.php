<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * NewsLetters Controller
 *
 * @property NewsLetter $NewsLetter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NewsLettersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');
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
		$this->set('title_for_layout','View Subscriber');
		$this->NewsLetter->recursive = 0;
		$this->set('newsLetters', $this->Paginator->paginate());
		$this->layout="manage_admin";
	}
/**
 * admin_compose_mail method
 *
 * @return void
 */
	public function admin_compose_mail() {
		$this->set('title_for_layout','Compose Mail');
		$this->loadModel('NewsletterTemplate');
		$this->NewsletterTemplate->recursive = 0;
		$this->Paginator->settings = array('order' => array('NewsletterTemplate.compose_id' => 'desc'));
		$this->set('newsletterTemplate', $this->Paginator->paginate('NewsletterTemplate'));
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
		if (!$this->NewsLetter->exists($id)) {
			throw new NotFoundException(__('Invalid Newsletter'));
		}
		$options = array('conditions' => array('NewsLetter.' . $this->NewsLetter->primaryKey => $id));
		$this->set('newsLetter', $this->NewsLetter->find('first', $options));
		$this->layout="view_admin";
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->NewsLetter->create();
			//pr($this->request->data);exit;
			
			if ($this->NewsLetter->save($this->request->data)) {
			$this->Session->setFlash(__('The  Newsletter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The  News Letter could not be saved. Please, try again.'));
			}
					
			}
		$this->layout="add_admin";
	}
/**
 * admin_add_compose_mail method
 *
 * @return void
 */
	public function admin_compose_mail_add() {
		$this->set('title_for_layout','Add Template');
		$this->loadModel('NewsletterTemplate');
		if($this->request->is('post'))
		{
			if($this->NewsletterTemplate->save($this->request->data))
			{
				$this->Session->setFlash(__('Composed Mail Successfully'));
				return $this->redirect(array('action' => 'compose_mail'));
			}
			else
			{
				$this->Session->setFlash(__('Composed Mail Failed'));
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
		if (!$this->NewsLetter->exists($id)) {
			//throw new NotFoundException(__('Invalid  Newsletter'));
		return $this->redirect(array('action' => 'index'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//pr($this->request->data);exit;
		
					if ($this->NewsLetter->save($this->request->data)) {
					$this->Session->setFlash(__('The  Newsletter has been saved.'));
					return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The  Newsletter could not be saved. Please, try again.'));
					}
				
		} else {
			$options = array('conditions' => array('NewsLetter.' . $this->NewsLetter->primaryKey => $id));
			$this->request->data = $this->NewsLetter->find('first', $options);
			//pr($this->request->data);
		}
		$this->layout="add_admin";
	
	}
/**
 * admin_add_compose_mail method
 *
 * @return void
 */
	public function admin_compose_mail_edit($id = null) {
		$this->loadModel('NewsletterTemplate');
		if (!$this->NewsletterTemplate->exists($id)) {
			return $this->redirect(array('action' => 'compose_mail'));
		}
		$this->set('title_for_layout','Add Template');
		
		if($this->request->is(array('post', 'put')))
		{
			if($this->NewsletterTemplate->save($this->request->data))
			{
				$this->Session->setFlash(__('Composed Mail Successfully'));
				return $this->redirect(array('action' => 'compose_mail'));
			}
			else
			{
				$this->Session->setFlash(__('Composed Mail Failed'));
			}
		}
		else
		{
			$options = array('conditions' => array('NewsletterTemplate.' . $this->NewsletterTemplate->primaryKey => $id));
			$this->request->data = $this->NewsletterTemplate->find('first', $options);
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
		$this->NewsLetter->id = $id;
		if (!$this->NewsLetter->exists()) {
			return $this->redirect(array('action' => 'index'));
		}
		
		//$this->request->onlyAllow('post', 'delete');
		if ($this->NewsLetter->delete()) {
			
			$this->Session->setFlash(__('The Newsletter  has been deleted.'));
		} else {
			$this->Session->setFlash(__('The  Newsletter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
		$this->layout="manage_admin";
	}
	public function admin_compose_mail_delete($id = null)
	{
		$this->loadModel('NewsletterTemplate');
		$this->NewsletterTemplate->id = $id;
		if (!$this->NewsletterTemplate->exists()) {
			return $this->redirect(array('action' => 'compose_mail'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->NewsletterTemplate->delete()) {
			
			$this->Session->setFlash(__('The Compose mail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Compose mail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'compose_mail'));
	}
	/*
		change the status
	*/
	function changeStatus(){//print_r($this->request->data);exit;
	$this->layout='ajax';
	$this->LoadModel("NewsLetter");
	$status=$this->request->data['status'];
	$nl_id=$this->request->data['news_letter_id'];
	$this->NewsLetter->id=$nl_id;
	if($this->NewsLetter->saveField("status",$status)){
		echo 1;
	}else{
		echo 0;
	}
	exit;
   }
   public function admin_resend($id=null)
   {
	  $this->NewsLetter->id = $id;
		if (!$this->NewsLetter->exists()) {
			return $this->redirect(array('action' => 'index'));
		} 
		$options = array('conditions' => array('NewsLetter.' . $this->NewsLetter->primaryKey => $id));
		$subscribedata = $this->NewsLetter->find('first', $options);
		
					$link=Router::url('/Homes/confirm_email/id:'.$id, true);
					//Mail functionality start here
					$message = '<table width="400" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" colspan="2">Dear '.stripslashes($subscribedata['NewsLetter']['news_email']).',</td>
						</tr>
						<tr>
						<td>You have successfully subscribed news leter in Inhealth, so to receive any more newsletters confirm your E-Mail ID click on <a href="'.$link.'">here</a> or paste the below url in your browser<br>'.$link.'.</td>
						</tr>
						<tr>
							<td align="left">&nbsp;</td>
						</tr>
						<tr>
							<td align="left" valign="middle">Thank You</td>
						</tr>
						<tr>
							<td align="left" valign="middle">Inhealth</td>
						</tr>
					</table>';
					$adminMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" colspan="2">Dear Admin,</td>
						</tr>
						<tr>
						<td colspan="2">A new user subscribed news letter on your site. below is the user subscribe detail</td>
						</tr>
						<tr>
							<td align="left" colspan="2">&nbsp;</td>
						</tr>
						
						<tr>
							<td>E-Mail ID: </td>
							<td>'.stripslashes($subscribedata['NewsLetter']['news_email']).'</td>
						</tr>
						<tr>
							<td align="left" valign="middle">Thank You</td>
						</tr>
						<tr>
							<td align="left" valign="middle">Inhealth</td>
						</tr>
					</table>';
					if($this->RequestHandler->getClientIp()!='127.0.0.1' && $this->RequestHandler->getClientIp()!='192.168.1.239')
					{
							$this->loadModel('AdminUser');
							$siteemail=$this->AdminUser->find('first', array('AdminUser.uid' => 2));
							if(!empty($siteemail)){$siteemailID=$siteemail['AdminUser']['mail_id'];}else{$siteemailID='info@inhealth.com';}
						$to_email=$subscribedata['NewsLetter']['news_email'];
						$Email = new CakeEmail('default');
						$Email->to($to_email);
						$Email->subject('Inhealth :: Re send News letter confirmation');
						$Email->replyTo(array($siteemailID => 'Inhealth'));
						$Email->from (array($siteemailID => 'Inhealth'));
						$Email->emailFormat('both');
						//$Email->headers();
						$Email->send($message);
						
						//Admin Mail-----------------
						$adminEmail = new CakeEmail('default');
						$adminEmail->to($siteemailID);
						$adminEmail->subject('Inhealth :: Re send News letter confirmation');
						$adminEmail->replyTo(array($siteemailID => 'Inhealth'));
						$adminEmail->from (array($to_email => 'Inhealth'));
						$adminEmail->emailFormat('both');
						//$Email->headers();
						$adminEmail->send($adminMsg);
						//----------------------------
						}
					$this->Session->setFlash(__('Mail re sent successfully to subscriber to confirm the E-Mail ID.'));
					return $this->redirect(array('action' => 'index'));
				
   }
 /**
 * admin_mail_to_subscriber method
 *`
 * @return void
 */
	public function admin_mail_to_subscriber() {
		$this->set('title_for_layout','Mail To Subscriber');
		$subscribelist=array('' => 'Selet Subscriber');
		$subscribelist+=$this->NewsLetter->find('list', array('conditions' => array('NewsLetter.status' => 1), 'fields' => array('news_email', 'news_email'), 'order' => array('news_letter_id' => 'desc')));
		$this->set('subscribelist',$subscribelist);
		$this->loadModel('NewsletterTemplate');
		$compose_list=array('' => 'Selet Subject');
		$compose_list+=$this->NewsletterTemplate->find('list', array('conditions' => array('NewsletterTemplate.compose_status' => 1, 'NewsletterTemplate.user_type ' => 3), 'fields' => array('compose_id', 'mail_subject'), 'order' => array('compose_id' => 'desc')));
		$this->set('compose_list',$compose_list);
		if($this->request->is('post'))
		{
			$this->loadModel('MailToSubscriber');
			
			if(!empty($this->request->data['MailToSubscriber']['mail_list']))
			{
				$mail_list=$this->request->data['MailToSubscriber']['mail_list'];
				$this->request->data['MailToSubscriber']['mail_list']=implode(',',$mail_list);
			}
			else
			{
				$mail_list=array();
			}
		  
			//pr($this->request->data);exit;
			
				if($this->MailToSubscriber->save($this->request->data))
				{	//pr($mail_list);
					if(!empty($mail_list))
					{
						$this->loadModel('AdminUser');
						$siteemail=$this->AdminUser->find('first', array('AdminUser.uid' => 2));
						$compose_id=$this->request->data['MailToSubscriber']['compose_id'];
						$compose_detail=$this->NewsletterTemplate->find('first', array('conditions' => array('compose_id' => $compose_id)));
						$subject=stripslashes($compose_detail['NewsletterTemplate']['mail_subject']);
						if(!empty($siteemail)){$siteemailID=$siteemail['AdminUser']['mail_id'];}else{$siteemailID='info@inhealth.com';}
						foreach($mail_list as $to_email)
						{
							$message=stripslashes($compose_detail['NewsletterTemplate']['mail_body']);
							$subscribedetail=$this->NewsLetter->find('first', array('conditions' => array('NewsLetter.status' => 1, 'NewsLetter.news_email' => $to_email)));
							if(!empty($subscribedetail))
							{
								$message=str_replace("{Name}", $subscribedetail['NewsLetter']['news_email'],$message);
							}
							if($this->RequestHandler->getClientIp()!='127.0.0.1' && $this->RequestHandler->getClientIp()!='192.168.1.239')
							{
								$Email = new CakeEmail('default');
								$Email->to($to_email);
								$Email->subject($subject);
								$Email->replyTo(array($siteemailID => 'Inhealth'));
								$Email->from (array($siteemailID => 'Inhealth'));
								$Email->emailFormat('both');
								//$Email->headers();
								$Email->send($message);
	
								}
						}
					}
					$this->Session->setFlash(__('Email Sent Successfully'));
					return $this->redirect(array('action' => 'mail_to_subscriber_list'));
				}
				else
				{
					$this->Session->setFlash(__('Composed Mail Failed'));
				}
			
		}
		$this->layout="manage_admin";
	}
 /**
 * admin_mail_to_subscriber_list method
 *
 * @return void
 */
	public function admin_mail_to_subscriber_list() {
		$this->set('title_for_layout','Mail To Subscriber List');
		$this->loadModel('MailToSubscriber');
		$this->MailToSubscriber->recursive = 0;
		$this->Paginator->settings = array('order' => array('MailToSubscriber.mail_id' => 'desc'));
		$this->set('mailToSubscriber', $this->Paginator->paginate('MailToSubscriber'));
		$this->layout="manage_admin";
	}
	/**
 * admin_sent_delete method
 *
 * @return void
 */
	public function admin_sent_delete($id=null) {
		$this->set('title_for_layout','Mail To Subscriber List');
		$this->loadModel('MailToSubscriber');
		$this->MailToSubscriber->id = $id;
		if (!$this->MailToSubscriber->exists()) {
			return $this->redirect(array('action' => 'mail_to_subscriber_list'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->MailToSubscriber->delete()) {
			
			$this->Session->setFlash(__('Delete Successfully'));
		} else {
			$this->Session->setFlash(__('Deleting Failed'));
		}
		return $this->redirect(array('action' => 'mail_to_subscriber_list'));
	}
	public function admin_chageEmailList()
	{
		if($this->request->is('post'))
		{
			$usertype=$this->request->data['usertype'];
			if($usertype==3)
			{
				$userlist=$this->NewsLetter->find('all', array('conditions' => array('status' => 1), 'order' => array('news_letter_id' => 'desc')));
				if(!empty($userlist))
				{
					?>
                    <option value="">Select Subscriber</option>
                    <option value="all">All</option>
                    <?php
					foreach($userlist as $userres)
					{
						$fetchuser=$userres['NewsLetter'];
					?>
					<option value="<?php echo $fetchuser['news_email'];?>"><?php echo $fetchuser['news_email'];?></option>
					<?php
					}
				}
			}
			else if($usertype==1 || $usertype==2)
			{
				$this->loadModel('SubscribeAlert');
				//$userlist=$this->MasterUser->find('all', array('conditions' => array('is_active' => 1, 'user_type_id' => $usertype, 'wrong_login_attempt <=' => 3), 'order' => array('user_id' => 'desc')));
				$userOptions=array('joins' =>
							  array(
								array(
									'table' => 'master_users',
									'alias' => 'MasterUser',
									'type' => 'left',
									'foreignKey' => false,
									'conditions'=> array('MasterUser.user_id = SubscribeAlert.user_id')
								)          
							 ),
						'conditions' => array('AND' =>
						array('MasterUser.user_type_id' => $usertype),
						array('MasterUser.is_active' => 1),
						array('MasterUser.wrong_login_attempt <=' => 3)
						),
						'fields' => array('MasterUser.*'),
			  			'order' => array('MasterUser.user_id' => 'desc'));
						$userlist=$this->SubscribeAlert->find('all', $userOptions);
				if(!empty($userlist))
				{
					?>
                    <option value="">Select Subscriber</option>
                    <option value="all">All</option>
                    <?php
					foreach($userlist as $userres)
					{
						$fetchuser=$userres['MasterUser'];
					?>
					<option value="<?php echo $fetchuser['user_id'];?>"><?php echo $fetchuser['first_name'].' '.$fetchuser['last_name'];?></option>
					<?php
					}
				}
			}
		}
		exit();
	}
	public function admin_changeCompose()
	{
		if($this->request->is('post'))
		{
			$usertype=$this->request->data['usertype'];
			$this->loadModel('NewsletterTemplate');
			$composelist=$this->NewsletterTemplate->find('all', array('conditions' => array('compose_status' => 1, 'user_type' => $usertype), 'order' => array('compose_id' => 'desc')));
				if(!empty($composelist))
				{
					?>
                    <option value="">Select Subject</option>
                    <?php
					foreach($composelist as $composeres)
					{
						$composeResult=$composeres['NewsletterTemplate'];
					?>
					<option value="<?php echo $composeResult['compose_id'];?>"><?php echo $composeResult['mail_subject'];?></option>
					<?php
					}
				}
		}
		exit;
	}
	public function admin_changeBrand()
	{
		if($this->request->is('post'))
		{
			$usertype=$this->request->data['usertype'];
			$this->loadModel('ManageBrand');
			$brandlist=$this->ManageBrand->find('all', array('conditions' => array('status' => 1, 'flag' => 0), 'order' => array('brand_name' => 'asc')));
				if(!empty($brandlist))
				{
					?>
                     <div class="form-group required">
                        <label for="MailToSubscriberBrandlist">Select Brands</label>
                        <select name="data[MailToSubscriber][brandlist][]" class="form-control" id="MailToSubscriberBrandlist" required="required" multiple="multiple">
                    	<option value="">Select Brands</option>
                    <?php
					foreach($brandlist as $brandRes)
					{
						$brandResult=$brandRes['ManageBrand'];
					?>

					<option value="<?php echo $brandResult['brand_id'];?>"><?php echo $brandResult['brand_name'];?></option>
					<?php
					}
					?>
                     </select>
                    </div>
                    <?php
				}
		}
		exit;
	}
	public function admin_changeCategory()
	{
		if($this->request->is('post'))
		{
			$usertype=$this->request->data['usertype'];
			$this->loadModel('ManageCategory');
			$brandlist=$this->ManageCategory->find('all', array('conditions' => array('status' => 1, 'flag' => 0), 'order' => array('category_name' => 'asc')));
				if(!empty($brandlist))
				{
					?>
                     <div class="form-group required">
                        <label for="MailToSubscriberBrandlist">Select Categories</label>
                        <select name="data[MailToSubscriber][categorylist][]" class="form-control" id="MailToSubscriberCategorylist" required="required" multiple="multiple">
                    	<option value="">Select Categories</option>
                    <?php
					foreach($brandlist as $brandRes)
					{
						$brandResult=$brandRes['ManageCategory'];
					?>

					<option value="<?php echo $brandResult['category_id'];?>"><?php echo $brandResult['category_name'];?></option>
					<?php
					}
					?>
                     </select>
                    </div>
                    <?php
				}
		}
		exit;
	}
	public function admin_changeCounty()
	{
		if($this->request->is('post'))
		{
			$usertype=$this->request->data['usertype'];
			$this->loadModel('MasterCountry');
			$brandlist=$this->MasterCountry->find('all', array('order' => array('country_name' => 'asc')));
				if(!empty($brandlist))
				{
					?>
                     <div class="form-group required">
                        <label for="MailToSubscriberBrandlist">Select Counties</label>
                        <select name="data[MailToSubscriber][countylist][]" class="form-control" id="MailToSubscriberCountylist" required="required" multiple="multiple">
                    	<option value="">Select Counties</option>
                    <?php
					foreach($brandlist as $brandRes)
					{
						$brandResult=$brandRes['MasterCountry'];
					?>

					<option value="<?php echo $brandResult['country_id'];?>"><?php echo $brandResult['country_name'];?></option>
					<?php
					}
					?>
                     </select>
                    </div>
                    <?php
				}
		}
		exit;
	}
}