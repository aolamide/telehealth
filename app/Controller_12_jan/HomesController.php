<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Homes Controller
 */
class HomesController extends AppController {

	public $components = array('Paginator', 'Session', 'Cookie', 'RequestHandler');
	
	public function index()
	{
		$this->layout='home';
		/* Banner Dynamic Function */
		$this->loadModel('Banner');
		$bannerRes=$this->Banner->find('all', array(
								'conditions' => array('status' => 1), 
								'order' => 'rand()',
								'limit'=> 1
								));
		$this->set('bannerRes',$bannerRes);

		/* Home Tab Dynamic Function */
		$this->loadModel('Hometab');
		$homeTab=$this->Hometab->find('all', array(
								'conditions' => array('status' => 1), 
								'order' =>array('Hometab.id' => 'asc')
								));
		$this->set('homeTab',$homeTab);
		//pr($homeTab);
	}
	/*
	* Action Name: login
	* Author Name: Chittaranjan Sahoo
	* Date: 18-12-2015
	*/
	public function login(){
		if($this->request->is('post')){
			$username= $this->request->data['username'];
			$pwd = $this->request->data['pwd'];
			$pwd = base64_encode($pwd);
			$this->loadModel('MasterUser');
			$inactiveloginChk = $this->MasterUser->find('first', array('conditions' => array('user_name' =>$username, 'user_pass' => $pwd, 'status' => 0)));
			$loginChk = $this->MasterUser->find('first', array('conditions' => array('user_name' =>$username, 'user_pass' => $pwd, 'status' => 1)));
			if(count($loginChk)>0){
				$this->Session->write('loginID', $loginChk['MasterUser']['id']);
				$this->Session->write('loginType', $loginChk['MasterUser']['login_tytpe']);
				/*============Set login Status==========*/
				$this->MasterUser->id = $loginChk['MasterUser']['id'];
				$this->MasterUser->saveField('is_online', '1');

				/*============Set login Status==========*/
				echo 1;
			}else if(count($inactiveloginChk)>0){
				echo 3;
			}else{
				echo 2;
			}
		}
		exit();
	}
	/*
	* Action Name: Logout
	* Author Name: Chittaranjan Sahoo
	* Date: 18-12-2015
	*/
	public function logout(){
		if($this->request->is('post')){
			if($this->Session->check('loginID')){
				/*============Set login Status==========*/
				$loginID=$this->Session->read('loginID');
				$this->loadModel('MasterUser');
				$this->MasterUser->id = $loginID;
				$this->MasterUser->saveField('is_online', '0');

				/*============Set login Status==========*/
				
				$this->Session->delete('loginID');
				if($this->Session->check('loginType')){
					if($this->Session->read('loginType') == 'P'){
						if($this->Session->check('doctorid')){
							$this->Session->delete('doctorid');
						}
						if($this->Session->check('appt_serviceid')){
							$this->Session->delete('appt_serviceid');
						}
						if($this->Session->check('availableID')){
							$this->Session->delete('availableID');
						}
					}
					$this->Session->delete('loginType');
				}
				echo 1;
			}else{
				echo 2;
			}
		}
		exit();
	}
	public function confirm_email()
	{
		if(isset($this->request->params['named']['id']))
		{
			$id=$this->request->params['named']['id'];
			$this->LoadModel("NewsLetter");
			$this->NewsLetter->id=$id;
			if($this->NewsLetter->saveField("status",1)){
				$this->redirect(Router::url('/Homes/index/confirm:1', true));
			}else{
				$this->redirect(Router::url('/Homes/index/confirm:1', true));
			}
		}
		exit;
	}
	public function newsletter()
	{
		if($this->request->is('post'))
		{
			//pr($this->request->data);exit;
			//pr($this->request->data);exit;
			$this->loadModel('NewsLetter');
			$rec_exists=$this->NewsLetter->find('all',array('conditions'=>array('NewsLetter.news_email'=>$this->request->data['NewsLetter']['news_email'])));
			if(count($rec_exists)<=0)
			{
				if($this->NewsLetter->save($this->request->data))
				{
					$insertid=$this->NewsLetter->getLastInsertId();
					$link=Router::url('/Homes/confirm_email/id:'.$insertid, true);
					//Mail functionality start here
					$message = '<table width="400" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" colspan="2">Dear '.stripslashes($this->request->data['NewsLetter']['news_email']).',</td>
						</tr>
						<tr>
						<td>You have successfully subscribed news leter in Inheath, so to receive any more newsletters confirm your E-Mail ID click on <a href="'.$link.'">here</a> or paste the below url in your browser<br>'.$link.'.</td>
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
							<td>'.stripslashes($this->request->data['NewsLetter']['news_email']).'</td>
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
						$to_email=$this->request->data['NewsLetter']['news_email'];
						$Email = new CakeEmail('default');
						$Email->to($to_email);
						$Email->subject('Inhealth :: News Letter Confirmation');
						$Email->replyTo($siteemailID);
						$Email->from (array($siteemailID => 'Inhealth'));
						$Email->emailFormat('both');
						//$Email->headers();
						$Email->send($message);
						
						//Admin Mail-----------------
						$adminEmail = new CakeEmail('default');
						$adminEmail->to($siteemailID);
						$adminEmail->subject('Inhealth :: Account creation');
						$adminEmail->replyTo($siteemailID);
						$adminEmail->from (array($to_email => 'Inhealth'));
						$adminEmail->emailFormat('both');
						//$Email->headers();
						$adminEmail->send($adminMsg);
						//----------------------------
						}
					echo 1;
				}
				else
				{
					echo 2;
				}
			}
			else
			{
				echo 3;
			}
		}
		exit;
	}
}
