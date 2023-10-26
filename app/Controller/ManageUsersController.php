<?php
App::uses('AppController', 'Controller');
/**
 * ManageUsers Controller
 *
 * @property ManageUser $ManageUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ManageUsersController extends AppController {

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
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->loadModel("ManageUser");
		$user_type=@$this->request->params['named']['user_type'];
		$searchtxt=@$this->request->params['named']['searchtxt'];
		if($searchtxt!='' || $user_type){
		if($user_type==3){
			$this->Paginator->settings = array('conditions' => array( 'OR' => array(
            array('ManageUser.first_name LIKE ' => '%'.$searchtxt.'%'),
            array('ManageUser.last_name LIKE ' => '%'.$searchtxt.'%'),
			array('CONCAT(ManageUser.first_name," ",ManageUser.last_name) LIKE ' => '%'.$searchtxt.'%'),
			array('ManageUser.email LIKE ' => '%'.$searchtxt.'%'),
			array('ManageUser.telephone1 LIKE ' => '%'.$searchtxt.'%'),
			array('ManageUser.postal_code LIKE ' => '%'.$searchtxt.'%')
        )), 'order' =>array('ManageUser.user_id' => 'desc'), 'limit' => 10);
		}else{
			$this->Paginator->settings = array('conditions' => array( 'OR' => array(
            array('ManageUser.first_name LIKE ' => '%'.$searchtxt.'%'),
            array('ManageUser.last_name LIKE ' => '%'.$searchtxt.'%'),
			array('CONCAT(ManageUser.first_name," ",ManageUser.last_name) LIKE ' => '%'.$searchtxt.'%'),
			array('ManageUser.email LIKE ' => '%'.$searchtxt.'%'),
			array('ManageUser.telephone1 LIKE ' => '%'.$searchtxt.'%'),
			array('ManageUser.postal_code LIKE ' => '%'.$searchtxt.'%')
        ),'AND'=>array('ManageUser.user_type_id '=>$user_type)), 'order' =>array('ManageUser.user_id' => 'desc'), 'limit' => 10);
		}
				
			 
		
			$this->set('manageUsers', $this->Paginator->paginate('ManageUser'));
			
			$this->set('searchtxt', $searchtxt);
			$this->set('s_ut', @$this->request->params['named']['user_type']);
			
		}else{
			$this->ManageUser->recursive = 0;
			 $this->Paginator->settings = array('order' =>array('ManageUser.user_id' => 'desc'), 'limit' => 10);
		$this->set('manageUsers', $this->Paginator->paginate('ManageUser'));
		}
		$this->loadModel('UserMembership');
		$userMembership=$this->UserMembership->find('all', array("conditions" => array("status" => 1), "order" => array("memb_id" => "desc")));
		$this->set("userMembership", $userMembership);
		$this->layout="manage_admin";
		
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ManageUser->exists($id)) {
			throw new NotFoundException(__('Invalid manage user'));
		}
		$options = array('conditions' => array('ManageUser.' . $this->ManageUser->primaryKey => $id));
		$this->set('manageUser', $this->ManageUser->find('first', $options));
		$this->layout="view_admin";
		$this->loadModel('UserTotalCredit');
		$creditRes=$this->UserTotalCredit->find('first', array('conditions' => array('user_id' => $id)));
		$this->set('userCredits', $creditRes);
		
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$this->loadModel('MasterCountry');
		$country = $this->MasterCountry->find('list', array('fields'=>array('MasterCountry.country_id','MasterCountry.country_name')));
		$this->set('country',$country);
		
		$this->loadModel('MasterUserType');
		$user_type = $this->MasterUserType->find('list', array('fields'=>array('MasterUserType.ut_id','MasterUserType.user_type')));
		$this->set('user_type',$user_type);
		
		if(isset($this->request->data['c_id']) && !empty($this->request->data['c_id'])){
			$contry_id = $this->request->data['c_id'];
			$this->loadModel('MasterLocation');
			$locations = $this->MasterLocation->find('list', array('conditions'=>array('MasterLocation.country_id'=>$contry_id),'fields'=>array('MasterLocation.location_id','MasterLocation.location_name')));
			$loc = json_encode($locations);
			print_r($loc);exit;
		}
		
		if ($this->request->is('post')) {
			$this->ManageUser->create();
			
			if ($this->ManageUser->save($this->request->data)) {
				$this->Session->setFlash(__('The manage user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manage user could not be saved. Please, try again.'));
			}
		}
		$this->layout="add_admin";
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->loadModel('MasterCountry');
		$country = $this->MasterCountry->find('list', array('fields'=>array('MasterCountry.country_id','MasterCountry.country_name')));
		$this->set('country',$country);
		
		$this->loadModel('MasterUserType');
		$user_type = $this->MasterUserType->find('list', array('fields'=>array('MasterUserType.ut_id','MasterUserType.user_type')));
		$this->set('user_type',$user_type);
		
		if(isset($this->request->data['c_id']) && !empty($this->request->data['c_id'])){
			$contry_id = $this->request->data['c_id'];
			$this->loadModel('MasterLocation');
			$locations = $this->MasterLocation->find('list', array('conditions'=>array('MasterLocation.country_id'=>$contry_id),'fields'=>array('MasterLocation.location_id','MasterLocation.location_name')));
			$loc = json_encode($locations);
			print_r($loc);exit;
		}
		
		if (!$this->ManageUser->exists($id)) {
			//throw new NotFoundException(__('Invalid manage user'));
			return $this->redirect(array('action' => 'index'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ManageUser->save($this->request->data)) {
				$this->Session->setFlash(__('The manage user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manage user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ManageUser.' . $this->ManageUser->primaryKey => $id));
			$this->request->data = $this->ManageUser->find('first', $options);
		}
		$this->layout="add_admin";
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ManageUser->id = $id;
		if (!$this->ManageUser->exists()) {
			throw new NotFoundException(__('Invalid manage user'));
		}
		$this->loadModel('RequestPart');
	$count=$this->RequestPart->find('count',array('conditions'=>array('RequestPart.user_id' => $id)));
	$this->loadModel('PostAd');
	$postoptions=array('conditions' => array('PostAd.user_id' => $id));
	$postadcount=$this->PostAd->find('count', $postoptions);
		$this->request->onlyAllow('post', 'delete');
		if($count<=0 && $postadcount<=0)
		{
		if ($this->ManageUser->delete()) {
			$this->Session->setFlash(__('The manage user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The manage user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
		}
		else
		{
			$this->Session->setFlash(__('First delete its related offers and ads to delete this User. '));
			return $this->redirect(array('action' => 'index'));
		}
		$this->layout="manage_admin";
	}
	
	/**
 * sendMessage method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sendMessage($id) {
		//print_r($this->request);
		return $this->redirect(array('action' => 'index'));
	}
	function admin_changeStatus(){
	$this->layout='ajax';
	$this->LoadModel("ManageUser");
	$is_active=$this->request->data['is_active'];
	$user_id=$this->request->data['user_id'];
	$this->ManageUser->id=$user_id;
	if($is_active==1){
		$this->ManageUser->saveField("wrong_login_attempt",0);
	}
	if($this->ManageUser->saveField("is_active",$is_active)){
		echo 1;exit;
	}else{
		echo 0;exit;
	}
   }
   public function admin_ispremium()
   {
	   if($this->request->is('post'))
	   {
		   $userid=$this->request->data['userid'];
		   $premium=$this->request->data['premium'];
		  $save=$this->ManageUser->save(array('user_id' => $userid, 'is_premium' => $premium));
		  if($save)
		  {
			  echo 1;
		  }
		  else
		  {
			  echo 2;
		  }
	   }
	  exit;
   }
   /**
 * Rating Method method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_rating($id = null) {
		if (!$this->ManageUser->exists($id)) {
			throw new NotFoundException(__('Invalid manage user'));
		}
				 $userprofileid=$id;
				 $this->set('userid', $userprofileid);
				$user=$this->Session->read('User');
				$this->loadModel('MasterUser');
				$userDetail=$this->MasterUser->find('first', array('conditions' => array('user_id' =>$userprofileid)));
				$this->set('title_for_layout',$userDetail['MasterUser']['first_name'].' '. $userDetail['MasterUser']['last_name']."'s Profile");
				$this->loadModel('UserRating');
				$userrating=$this->UserRating->find('all', array('conditions' => array('user_id' => $userprofileid), 'order' => array('rating_id' => 'desc')));
				$this->set('userRating',$userrating);
				
				$raceiveasbuyer=$this->UserRating->find('all', array('conditions' => array('user_id' => $userprofileid, 'rating_type' => 2), 'order' => array('rating_id' => 'desc')));
				$this->set('raceiveasbuyer',$raceiveasbuyer);
				$receivedtheseller=$this->UserRating->find('all', array('conditions' => array('user_id' => $userprofileid, 'rating_type' => 1), 'order' => array('rating_id' => 'desc')));
				$this->set('receivedtheseller',$receivedtheseller);
				//==================
				// grade count query
				//====================
				$allpositivegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 1), 'order' => array('rating_id' => 'desc')));
				$this->set('allpositivegrade',$allpositivegrade);
				$allneutralgrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 0), 'order' => array('rating_id' => 'desc')));
				$this->set('allneutralgrade',$allneutralgrade);
				$allnegativegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => -1), 'order' => array('rating_id' => 'desc')));
				$this->set('allnegativegrade',$allnegativegrade);
				$last6month=date("Y-m-d H:i:s", strtotime("-6 months"));
				$lastyr=date("Y-m-d H:i:s", strtotime("-12 months"));
				$lastmonth=date("Y-m-d 00:00:00", strtotime("-1 months"));
				$currentdate=date('Y-m-d H:i:s');
				//---------Last Year-----------
				$lastyrpositivegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 1 ,'created >=' => $lastyr, 'created <=' => $currentdate), 'order' => array('rating_id' => 'desc')));
				$this->set('lastyrpositivegrade',$lastyrpositivegrade);
				$lastyrneutralgrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 0,'created >=' => $lastyr, 'created <=' => $currentdate), 'order' => array('rating_id' => 'desc')));
				$this->set('lastyrneutralgrade',$lastyrneutralgrade);
				$lastyrnegativegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => -1,'created >=' => $lastyr, 'created <=' =>$currentdate ), 'order' => array('rating_id' => 'desc')));
				$this->set('lastyrnegativegrade',$lastyrnegativegrade);
				//----------------------------
				//---------Last ^ Month-----------
				$last6mthpositivegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 1 ,'created >=' => $last6month, 'created <=' => $currentdate), 'order' => array('rating_id' => 'desc')));
				$this->set('last6mthpositivegrade',$last6mthpositivegrade);
				$last6mthneutralgrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 0,'created >=' => $last6month, 'created <=' => $currentdate), 'order' => array('rating_id' => 'desc')));
				$this->set('last6mthneutralgrade',$last6mthneutralgrade);
				$last6mthnegativegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => -1,'created >=' => $last6month, 'created <=' =>$currentdate ), 'order' => array('rating_id' => 'desc')));
				$this->set('last6mthnegativegrade',$last6mthnegativegrade);
				//----------------------------
				//---------Last Month-----------
				$lastmthpositivegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 1 ,'created >=' => $lastmonth, 'created <=' => $currentdate), 'order' => array('rating_id' => 'desc')));
				$this->set('lastmthpositivegrade',$lastmthpositivegrade);
				$lastmthneutralgrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => 0,'created >=' => $lastmonth, 'created <=' => $currentdate), 'order' => array('rating_id' => 'desc')));
				$this->set('lastmthneutralgrade',$lastmthneutralgrade);
				$lastmthnegativegrade=$this->UserRating->find('count', array('conditions' => array('user_id' => $userprofileid, 'grade' => -1,'created >=' => $lastmonth, 'created <=' =>$currentdate ), 'order' => array('rating_id' => 'desc')));
				$this->set('lastmthnegativegrade',$lastmthnegativegrade);
				//----------------------------
				//==================
				// grade count query
				//====================
				$this->layout="view_admin";
	}
	public function upgrademember()
	{
		if($this->request->is('post'))
		{
			$uid=$this->request->data['uid'];
			$memid=$this->request->data['memid'];
			$this->loadModel('UserMembership');
			$UserMembership=$this->UserMembership->find('first', array('conditions' => array('status' => 1, 'memb_id' => $memid), 'order' => array('price' => 'desc')));
				$this->request->data['UpgradeMembership']['user_id']=$uid;
				$this->request->data['UpgradeMembership']['member_type']=$UserMembership['UserMembership']['memb_id'];
				$this->request->data['UpgradeMembership']['payment_method']='';
				$this->request->data['UpgradeMembership']['payment_status']=1;
				$this->request->data['UpgradeMembership']['plan_status']=1;
				$this->request->data['UpgradeMembership']['price']=$UserMembership['UserMembership']['price'];
				$this->request->data['UpgradeMembership']['credit']=$UserMembership['UserMembership']['credits'];
				$this->loadModel('UpgradeMembership');
				if($this->UpgradeMembership->save($this->request->data))
				{
					$insertid=$this->UpgradeMembership->getLastInsertId();
					$this->loadModel('UserCreditAccount');
					$creditchk=$this->UserCreditAccount->find('first', array('conditions' => array('user_id' => $uid)));
					if(count($creditchk)>0)
					{
						$credit_id=$creditchk['UserCreditAccount']['credit_id'];
						$updatecredit=$creditchk['UserCreditAccount']['credits']+$UserMembership['UserMembership']['credits'];
						$options=array('credit_id' => $credit_id, 'upgrade_id' => $insertid, 'user_id' => $uid, 'credits' => $updatecredit);
						$this->UserCreditAccount->save($options);
						$updcreditid=$credit_id;
					}
					else
					{
						$updatecredit=$UserMembership['UserMembership']['credits'];
						$options=array('upgrade_id' => $insertid, 'user_id' => $uid, 'credits' => $updatecredit);
						$this->UserCreditAccount->save($options);
						$updcreditid=$this->UserCreditAccount->getLastInsertId();
					}
					if($updcreditid!='')
					{
						$this->loadModel('AddCredit');
						$this->request->data['AddCredit']['credit_id']=$updcreditid;
						$this->request->data['AddCredit']['credits']=$UserMembership['UserMembership']['credits'];
						$this->AddCredit->save($this->request->data);
						echo 1;
					}
				}
		}
		exit();
	}
}