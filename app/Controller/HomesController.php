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
				$this->MasterUser->saveField('idle_status', '1');

				/*============Set login Status==========*/
				/*============Insert into Login Details==========*/
				$this->loadModel('LoginDetail');
				$login_time=date('Y-m-d H:i:s');
				$saveData['LoginDetail']['uid']=$this->MasterUser->id;
				$saveData['LoginDetail']['login_time']=$login_time;
				$this->LoginDetail->save($saveData);
				/*============Insert into Login Details==========*/



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
				$this->MasterUser->saveField('idle_status', '0');

				/*============Set login Status==========*/

				/*============update Login Details==========*/
				$this->loadModel('LoginDetail');
				$logout_time=date('Y-m-d H:i:s');
				$logDet = $this->LoginDetail->find('first', array('conditions' => array('uid' =>$loginID),'order' => array('id' => 'desc')));
				
				$this->LoginDetail->id = $logDet['LoginDetail']['id'];
				$this->LoginDetail->saveField('logout_time', $logout_time);
				/*============Insert into Login Details==========*/
				
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

	public function sendMailAppointment(){
		$this->loadModel('MasterUser');
		$this->loadModel('Appointment');
		$this->loadModel('DoctoravailableSlot');
		$cur_date=date('Y-m-d');
		$cur_time=date("H:i");
		

		$appointdetails = $this->Appointment->find('all', array('conditions' => array('status' =>1,'join_status'=>0,'appointment_date'=>$cur_date )));
		if(!empty($appointdetails)){ //pr($appointdetails);
			foreach($appointdetails as $appointdetail){
				$AvailableSlotId=$appointdetail['Appointment']['appoint_book_slut'];
				$doctorDet=$this->MasterUser->find('first', array('conditions' => array('id' => $appointdetail['Appointment']['doctorid'])));
				$patientDet=$this->MasterUser->find('first', array('conditions' => array('id' => $appointdetail['Appointment']['patientid'])));

				$checkAvailabitySlot=$this->DoctoravailableSlot->find('first',array('conditions'=>array('id'=>$AvailableSlotId)));
				//pr($checkAvailabitySlot);
				$start_time=$checkAvailabitySlot['DoctoravailableSlot']['start_time'];
				$start_time=strtotime($start_time);
				$oneHrbefStartTime=date('H:i',strtotime('-1 hour', $start_time));
				/*==========Appointmail Send 1hr before Appointment===========*/
				if($cur_time == $oneHrbefStartTime){

					//============Mail to both patient and doctor=========
					$this->loadModel("Sitesetting");
					$siteDetail = $this->Sitesetting->find('first');
					$doctorMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

									<tr>

										<td align="left" colspan="3">Dear '.stripslashes($doctorDet['MasterUser']['name']).'</td>

									</tr>

									<tr>

									<td colspan="3">Appointment with patient '.stripslashes($patientDet['MasterUser']['name']).' is after one hour. </td>

									</tr>
									
									<tr>
									<td><strong>Appointment Time</strong></td>
									<td><strong>:</strong></td>
									<td>'.$checkAvailabitySlot['DoctoravailableSlot']['fulltime'].'</td>
									</tr>
									
									<tr>

										<td align="left">&nbsp;</td>

									</tr>

									<tr>

										<td align="left" valign="middle">Thank You</td>

									</tr>

									<tr>

										<td align="left" valign="middle">The '.$siteDetail['Sitesetting']['logo_title'].' Team</td>

									</tr>

								</table>';
							$patientMsg = '<table width="400" border="0" cellspacing="0" cellpadding="0">

									<tr>

										<td align="left" colspan="3">Dear '.stripslashes($patientDet['MasterUser']['name']).'</td>

									</tr>

									<tr>

									<td colspan="3">Appointment with doctor '.stripslashes($doctorDet['MasterUser']['name']).' is after one hour.</td>

									</tr>
									<tr>
									
									<tr>

										<td align="left">&nbsp;</td>

									</tr>

									<tr>

										<td align="left" valign="middle">Thank You</td>

									</tr>

									<tr>

										<td align="left" valign="middle">The '.$siteDetail['Sitesetting']['logo_title'].' Team</td>

									</tr>

								</table>';	

						if($doctorDet['MasterUser']['email_id']!=""){
							$subject="Lab Test Reports from ".$siteDetail['Sitesetting']['logo_title'];
							$Email = new CakeEmail('default');
							$Email->to($doctorDet['MasterUser']['email_id']);
							$Email->subject($subject);
							$Email->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));

							$Email->emailFormat('both');
							$Email->send($doctorMsg);
						}		
							

							//===========patient Email========
						if($patientDet['MasterUser']['email_id']!=""){
							$emailpatient = new CakeEmail('default');
							$emailpatient->to($patientDet['MasterUser']['email_id']);
							$emailpatient->subject($subject);
							$emailpatient->from (array($siteDetail['Sitesetting']['site_email'] => $siteDetail['Sitesetting']['logo_title']));
							$emailpatient->emailFormat('both');
							$emailpatient->send($patientMsg);
						}	

					//============Mail to both patient and doctor=========

				}

			}
			
		}
		//$date = date('Y-m-d H:i:s', strtotime('-1 hour'));
		
		exit;
	}

	public function end_regular_appoint(){
		$this->loadModel('RegularAppointment');
		$cur_date=date('Y-m-d');
		$cur_time=date("H:i");

		$chkRegAppoints=$this->RegularAppointment->find('all', array('conditions' => array('status' => 1, 'is_conv in'=>array(0,1))));
		foreach($chkRegAppoints as $regularAppoint){
			$appointDate=$regularAppoint['RegularAppointment']['created'];
			if($regularAppoint['RegularAppointment']['conv_start_time']!=""){
				$conv_start_time=$regularAppoint['RegularAppointment']['conv_start_time'];
				$conv_end_time=date('H:i',strtotime('+20 minutes',strtotime($conv_start_time)));
			}

			if($cur_date > $appointDate){
					$this->RegularAppointment->id = $regularAppoint['RegularAppointment']['id'];
					$this->RegularAppointment->saveField('is_conv', 2);
					$this->RegularAppointment->saveField('is_connected', 0);
				
			}else if($conv_start_time !=""){
				if($cur_time >= $conv_end_time){
						$this->RegularAppointment->id = $regularAppoint['RegularAppointment']['id'];
						$this->RegularAppointment->saveField('is_conv', 2);
						$this->RegularAppointment->saveField('is_connected', 0);
				}
			}

		}
		exit;
	}
}
